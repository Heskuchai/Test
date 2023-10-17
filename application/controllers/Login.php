<?php
class login extends DF_Controller {
	function __Construct() {
        parent::__construct();
		$this->load->model('users_model');
    }
	public function index()
	{
		if ($this->session->id != user('id')) redirect('/login/logout');
		if (empty($_POST['token'])) redirect('/');
		$s = file_get_contents('http://ulogin.ru/token.php?token=' . $_POST['token'] .'&host=' . $_SERVER['HTTP_HOST']);
        $user_data = (object)json_decode($s, true);
		if (empty($s)) die(redirect('/'));
		if ($user_data->network != 'vkontakte') die(redirect('/'));
		$user = $this->users_model->get_by(array('network_id' => no($user_data->uid), 'network' => $user_data->network));
		if (empty($user)) {
			$data = array('nickname' => no($user_data->nickname) , 'network_id' => no($user_data->uid) , 'avatar' => no($user_data->photo) ,'network' =>$user_data->network);
			$id = $this->users_model->save($data);
			$user = $this->users_model->get_by(array('id' => $id));
		}
		$this->session->set_userdata(array('id' => $user->id));
		redirect('/');
	}
	public function logout()
	{
     $this->session->sess_destroy();
	   redirect('/');
	}
}
