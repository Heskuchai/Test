<?php
class wins extends Admin_Controller {
	function __Construct() {
        parent::__construct();
		$this->load->model('win_model');
		$this->load->model('users_model');
    }
	
	public function index($id){
		$per  = 20; 
		$trd = $id;
		if(empty($trd)) $trd =1;
		$curp = $trd-1;
		$wins = $this->win_model->get_bynum($per,$curp,array());
		foreach ($wins as $win) {
			$win->nickname = $this->users_model->get($win->user_id)->nickname;
		}
		$this->data['wins'] = $wins;
		$count = $this->win_model->get_count();
		$this->data['count'] = $count;
		$this->data['pagination'] = $this->pagination($count,$curp,'/admin/wins/p/',$per);
		$this->data['load'] = 'admin/wins/wins';
		$this->load->view('admin/template',$this->data);
	}
	public function export(){
 		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=wins(".date("Y-m-d H:i:s").").xls");
		header("Pragma: no-cache");
		header("Expires: 0");  
		$wins = $this->win_model->get_by(array('status' => 1));
		$this->data['wins'] = $wins;
		$this->load->view('admin/wins/export',$this->data);
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