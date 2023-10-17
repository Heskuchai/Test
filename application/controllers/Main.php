<?php
class Main extends DF_Controller {
    function __Construct()
    {
        parent::__construct();
		$this->load->model('items_model');
		$this->load->model('cases_model');
    $this->load->model('pages_model');
    }
    public function index()
    {
    $pages = $this->pages_model->get_by(array('show' => 1),TRUE);
		$cases = $this->cases_model->get_by(array('main' => 0,'status' => 2),TRUE);
		foreach ($cases as $id=>$case){
		    $cases->cases = json_decode(base64_decode($cases->cases),true);
		}
        $this->data['title'] = '';
		$this->data['cases'] = $cases;
        $this->data['load'] = 'cases';
        $this->load->view('template', $this->data);
    }
}
?>
