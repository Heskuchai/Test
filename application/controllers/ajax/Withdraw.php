<?php
class Withdraw extends DF_Controller {
	function __Construct() {
        parent::__construct();
		$this->load->model('users_model');
		$this->load->model('withdraw_model');
        if (empty($this->session->id)) die();
    }
	public function create()
	{
	   $money = user('wf_coint');
	   $email = no($_POST['email']);
	   if ($money < 1) $error = 'У вас недостаточно средств!';
	   if (empty($email)) $error = 'Вы не указали email!';
	   if (!empty($error)) die(json_encode(array('status' => false, 'text' => $error)));
	   $this->withdraw_model->save(array('user_id' => $this->session->id , 'money' => $money , 'email' => $email));
	   $this->users_model->save(array('wf_coint' => 0),$this->session->id);
	   die(json_encode(array('status' => 'success','text' => 'Ваша заявка будет обработана в течении 24 ч.')));
	}

}
