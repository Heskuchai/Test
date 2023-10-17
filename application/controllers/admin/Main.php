<?php
class main extends Admin_Controller {
	function __Construct() {
        parent::__construct();
		$this->load->model('settings_model');
    }
	public function index()
	{
		if (user('group') == 3) redirect('/admin/goods');
		if (user('group') == 4) redirect('/admin/support');
        $settings = $this->settings_model->get(1);
        $rules = $this->settings_model->rules;
        $this->form_validation->set_rules($rules);
        if ($_POST == TRUE) {
		    $data = $this->settings_model->array_from_post(array('site_name','price_main','f_id','fav_url','min_bet','f_key_1','f_key_2','logo_url','vk_url','e_mail'));
		    $this->settings_model->save($data, 1);
		    redirect('/admin/');
	    }
		$this->data['title'] = 'Настройки';
		$this->data['settings'] = $settings;
		$this->data['load'] = 'admin/settings';
		$this->load->view('admin/template',$this->data);
	}
	public function ex()
	{
	  $this->session->sess_destroy();
	  redirect('/');
	}
}
