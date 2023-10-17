<?php
class DF_Controller extends MY_Controller {
	function __Construct() {
        parent::__construct();
		$this->load->model('pages_model');
		$this->load->model('users_model');
		$this->load->model('withdraw_model');
		$this->load->model('win_model');
		$this->load->helper('cookie');
		$wins = $this->win_model->get_lm(10);
		if (!empty($this->session->id)) $user_wins = $this->win_model->get_by_lm(array('user_id' => user('id') ),40);
		foreach ($wins as $win) $win->user = $this->users_model->get($win->user_id);
        $this->data['wins'] = $wins;
		$this->data['wt'] = $this->withdraw_model->get_by(array('user_id' => $this->session->id),TRUE);
		$this->data['pages'] = $this->pages_model->get();
	    $this->data['user_wins'] = $user_wins;
    }

}
?>
