<?php
class Card extends DF_Controller {
	function __Construct() {
        parent::__construct();
		$this->load->model('users_model');
		$this->load->model('cases_model');
		$this->load->model('items_model');
		$this->load->model('win_model');
        // if (empty($this->session->id)) die();
    }
	public function rult()
	{
	   $case_id = (integer)$_POST['case_id'];
	   if (empty($this->session->id)) die();
	   $case = $this->cases_model->get_by(array('type' => 1,'id' => $case_id));
	   if (empty($case)) die();
	   if (user('money') < $case->price and !empty($case->id)) $res['error'] = array('refill' =>1 ); 
	   if (!empty($res)) die(json_encode($res));
	   $items = $this->items_model->get_by(array('case_id' => $case->id),TRUE);
	   shuffle($items);
	   $data = array(array('day' => '1 день' , 'color' => '#00A4F1'),array('day' => '7 дней' , 'color' => '#8E25F0'),array('day' => '30 дней' , 'color' => '#CA1C97'),array('day' => 'Навсегда' , 'color' => '#F02828'),array('day' => 'Навсегда' , 'color' => '#DA9002'));
	   $item = array('item' => array('color' => $items[0]->color , 'image' => $items[0]->image , 'name' => $items[0]->name, 'award' => $items[0]->award, 'day' => $data[$items[0]->color]['day'], 'color' => $data[$items[0]->color]['color']) , 'order_id' => $sell_id);
	   $this->win_model->save(array('user_id' => $this->session->id , 'case_id' => $case->id , 'award' => $items[0]->award , 'color' => $items[0]->color));
	   $user['money'] = user('money') - $case->price;
	   $user['wf_coint'] = user('wf_coint') + $items[0]->award;
	   $this->users_model->save($user,$this->session->id);
	   echo json_encode($item);
	}
	public function buy()
	{
	   $case_id = (int)$_POST['case_id'];
	   if ($case_id != 0) {
	      $case = $this->cases_model->get($case_id);
	      if (empty($case)) $error = 'Кейс не найден!';
	      if (empty($this->session->id)) $error = 'Вы не авторизованы!';
	      if (empty($error) and user('money') < $case->price)  $error = 'У вас недостаточно средств!';
	      if (!empty($error)) die(json_encode(array('status' => false, 'text' => $error)));
	      $items = $this->items_model->get_by(array('case_id' => $case->id),TRUE);
	      shuffle($items);
	      $user['money'] = user('money') - $case->price;
	      $user['wf_coint'] = user('wf_coint') + $items[0]->award;
	      $this->users_model->save($user,$this->session->id);
	      $this->win_model->save(array('user_id' => $this->session->id , 'case_id' => $case->id , 'award' => $items[0]->award , 'color' => $items[0]->color));
	   } else {
		   if (empty($this->session->id)) $error = 'Вы не авторизованы!';
		   if (empty($error) and user('money') < config('price_main'))  $error = 'У вас недостаточно средств!';
		   if (!empty($error)) die(json_encode(array('status' => false, 'text' => $error)));
		   $items = $this->items_model->get();
		   shuffle($items);
		   $user['money'] = user('money') - config('price_main');
		   $user['wf_coint'] = user('wf_coint') + $items[0]->award;
		   $this->users_model->save($user,$this->session->id);
		   $this->win_model->save(array('user_id' => $this->session->id , 'case_id' => 0 , 'award' => $items[0]->award , 'color' => $items[0]->color));
	   }
	   
	   $json = array('status' => 'success'  , 'text' => 'Ура! Теперь вы можете играть!');
	   $json['win'] = array('price' => $items[0]->award , 'color' => $items[0]->color); //Приз
	   $json['prize'][0] = array('price' => $items[1]->award , 'color' => $items[1]->color); // Первый item
	   $json['prize'][1] = array('price' => $items[2]->award , 'color' => $items[2]->color); // Второй item
	   $json['prize'][2] = array('price' => $items[3]->award , 'color' => $items[3]->color); // Последний ))
	   echo json_encode($json);
	}
	public function close()
	{
		
	}

}
