<?php
class moneyexit extends Admin_Controller {
	function __Construct() {
        parent::__construct();
		$this->load->model('withdraw_model');
    }
	
	public function index($id){
		$per  = 20; 
		$trd = $id;
		if(empty($trd)) $trd =1;
		$curp = $trd-1;
		$moneyexit = $this->withdraw_model->get_bynum($per,$curp,array('status' => 1));
		$this->data['moneyexit'] = $moneyexit;
		$count = $this->withdraw_model->get_count(array('status' => 1));
		$this->data['count'] = $count;
		$this->data['pagination'] = $this->pagination($count,$curp,'/admin/moneyexit/p/',$per);
		$this->data['load'] = 'admin/moneyexit/moneyexit';
		$this->load->view('admin/template',$this->data);
	}
	public function del($id){
		$this->withdraw_model->save(array('status' => 2) , $id);
		redirect('/admin/moneyexit');
	}
	private function pagination($count,$page,$backurl,$per) {
		$this->load->library('pagination');
		$ord_per_page = $per;
		$maxpage = ceil($count / $ord_per_page);
		$config['base_url'] = $backurl;
		$config['total_rows'] = $maxpage;
		$config['per_page'] = 1; 
		$config['uri_segment'] = 4;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] = 2;
		$config['first_link'] = 'В начало';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'В конец';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$this->pagination->initialize($config); 

		return $this->pagination->create_links();
	}
	
}
?>