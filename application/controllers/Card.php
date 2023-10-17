<?php
class Card extends DF_Controller {
    function __Construct()
    {
        parent::__construct();
		$this->load->model('cases_model');
		$this->load->model('items_model');
    }
    public function index($id)
    {
		if (empty($id)) show_error('id не найден');
		$card = $this->cases_model->get_by(array('type' => 2,'id' => $id));
		if (empty($card)) show_error('Кейс не найден');
		$card->max = $this->items_model->get_max(array('case_id' => $card->id),'award','max')->award;
		$items = $this->items_model->get_by(array('case_id' => $id),TRUE);
        $this->data['title'] = 'Открытие кейса';
		$this->data['card'] = $card;
		$this->data['items'] = $items;
        $this->data['load'] = 'case/card';
        $this->load->view('template', $this->data);
    }
}
?>