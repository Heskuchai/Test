<?php
class Tech extends DF_Controller {
    function __Construct()
    {
    	parent::__construct();
        $this->load->model('pages_model');

    }
    public function index($id)
    {
    	$this->data['tech'] = $this->pages_model->get($id);
		if (empty($this->data['tech'])) die(show_404());
        $this->data['title'] = 'Техническая поддержка';
        $this->data['load'] = 'tech';
        $this->load->view('template', $this->data);
	}
}
?>
