<?php
class Top extends DF_Controller {
	function __Construct() {
        parent::__construct();
		$this->load->model('users_model');
		$this->load->model('win_model');
    }
	public function index()
	{
		function compare_func($a, $b)
		{
    		if ($a->cases == $b->cases) {
        		return 0;
    		}
    		return ($a->cases < $b->cases) ? -1 : 1;
		}
		$users = $this->users_model->get();
		foreach($users as $user) {
			$user->cases = count($this->win_model->get_by(array('user_id' => $user->id) , TRUE));
			$user->mmoney = $this->win_model->get_sum(array('user_id' => $user->id) , 'award')->award;
			if (empty($user->mmoney)) $user->mmoney = 0;
			if (empty($user->cases)) $user->cases = 0;
		}
		usort($users, "compare_func");
		$users = array_reverse($users);
		$top = $users;
		array_splice($top, 5);
		unset($users[0]);unset($users[1]);unset($users[2]);unset($users[3]);unset($users[4]);
		array_splice($users, 19);
		$this->data['top'] = $top;
		$this->data['users'] = $users;
        $this->data['title'] = 'Топ игроков';
        $this->data['load'] = 'top';
        $this->load->view('template', $this->data);
	}

}
