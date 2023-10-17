<?php
class Checkpay extends MY_Controller
{
    function __Construct()
    {
        parent::__construct();
		$this->load->model('users_model');
    }
    public function index()
    {
        function getIP()
        {
            if (isset($_SERVER['HTTP_X_REAL_IP']))
                return $_SERVER['HTTP_X_REAL_IP'];
            return $_SERVER['REMOTE_ADDR'];
        }
        if (!in_array(getIP(), array('136.243.38.147','136.243.38.149','136.243.38.150','136.243.38.151','136.243.38.189'))) die("hacking attempt!");
		
        $key1 = md5($_REQUEST['MERCHANT_ID'] . ':' . $_REQUEST['AMOUNT'] . ':' . config('f_key_2') . ':' . $_REQUEST['MERCHANT_ORDER_ID']);
        $key2 = $_REQUEST['SIGN'];
        
        if ($key1 == $key2) {
			$user = $this->users_model->get($_REQUEST['MERCHANT_ORDER_ID']);
            $data['money'] = $user->money + $_REQUEST['AMOUNT'];
            $this->users_model->save($data,$_REQUEST['MERCHANT_ORDER_ID']);
			echo 'ok';
        }
    }
}
?>