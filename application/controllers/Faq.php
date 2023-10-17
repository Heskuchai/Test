<?php
class Faq extends DF_Controller {
    function __Construct()
    {
    	parent::__construct();
        $this->load->model('faq_model');

    }
    public function index($id)
    {
  	$this->data['faq'] = $this->faq_model->get($id);
    $this->data['title'] = 'Частые вопросы';
    $this->data['load'] = 'faq';
    $this->load->view('template', $this->data);
    }
}
?>
