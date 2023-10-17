<?php
class pages extends Admin_Controller {
	function __Construct() {
        parent::__construct();
		$this->load->model('faq_model');
    }
	public function index()
	{
        $pages = $this->faq_model->get();
		$this->data['title'] = 'Страницы';
		$this->data['load'] = 'admin/pages/pages';
		$this->data['pages'] = $pages;
		$this->load->view('admin/template',$this->data);
	}
	public function edit($id)
	{
      $pages = $this->faq_model->get($id);
	  if (empty($pages) and !empty($id)) { die(show_404('')); }
      $rules = $this->faq_model->rules;
      $this->form_validation->set_rules($rules);
      if ($this->form_validation->run() == TRUE) {
		  $data = $this->faq_model->array_from_post(array('title','body'));
		$this->faq_model->save($data, $id);
		redirect('/admin/pages');
	  }
	  if (!empty($pages->title)) {
		  $this->data['title'] = 'Редактировать страницу : '.$pages->title.' .';
	  } else {
		  $this->data['title'] = 'Добавить страницу';
	  }
	  $this->data['pages'] = $pages;
	  $this->data['load'] = 'admin/pages/edit';
	  $this->load->view('admin/template',$this->data);

    }
    public function delete($id)
    {
        $this->faq_model->delete($id);
        redirect('admin/pages');
    }
}
