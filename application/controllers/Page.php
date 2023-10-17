<?php
class Page extends DF_Controller {
    function __Construct()
    {
        parent::__construct();
        $this->load->model('pages_model');
        
    }
    public function index($id)
    {
		$this->data['page'] = $this->pages_model->get($id);
		if (empty($this->data['page'])) die(show_404());
        $this->data['title'] = $this->data['page']->title;
        $this->data['load'] = 'page';
        $this->load->view('template', $this->data);
	}
}
?>