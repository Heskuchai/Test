<?php
class Cases extends DF_Controller {
    function __Construct()
    {
        parent::__construct();
		$this->load->model('cases_model');
		$this->load->model('items_model');
    }
    public function index($id)
    {
		if (empty($id)) show_error('id не найден');
		$case = $this->cases_model->get_by(array('type' => 1,'id' => $id));
		if (empty($case)) show_error('Кейс не найден');
		$items = $this->items_model->get_by(array('case_id' => $id),TRUE);
		$data = array(array('day' => '1 день' , 'color' => '#00A4F1'),array('day' => '7 дней' , 'color' => '#8E25F0'),array('day' => '30 дней' , 'color' => '#CA1C97'),array('day' => 'Навсегда' , 'color' => '#F02828'),array('day' => 'Навсегда' , 'color' => '#DA9002'));
		foreach ($items as $item) {
			$item->day =  $data[$item->color]['day'];
			$item->color =  $data[$item->color]['color'];
		}
		$items_rulet = $items;
		shuffle($items_rulet);
		$this->data['items_rulet'] = $items_rulet;
        $this->data['title'] = 'Открытие кейса';
		$this->data['case'] = $case;
		$this->data['items'] = $items;
        $this->data['load'] = 'case/case';
        $this->load->view('template', $this->data);
    }
}
?>