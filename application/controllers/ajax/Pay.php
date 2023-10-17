<?php
class Pay extends DF_Controller {
	function __Construct() {
        parent::__construct();
    }
	public function merchant()
	{
		$sum = (int)$_POST['sum'];
		if (empty($this->session->id)) $error = 'Вы не авторизованы!';
    if ($sum < config('min_bet')) $error = 'Минимальная сумма пополнения '. config('min_bet').' Р';
		if (!empty($error)) die(json_encode(array('status' => false, 'text' => $error)));
        $order_id     = user('id');
        $order_amount = preg_replace('~[^0-9]+~', '', $sum);
        $sign         = md5( config('f_id') . ':' . $order_amount . ':' . config('f_key_1') . ':' . $order_id);
        $url = 'http://www.free-kassa.ru/merchant/cash.php?m=' .  config('f_id') . '&oa=' . $order_amount . '&o=' . $order_id . '&s=' . $sign . '&lang=ru';
		die(json_encode(array('status' => 'success','url' => $url)));

	}

}
