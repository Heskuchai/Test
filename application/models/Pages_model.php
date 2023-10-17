<?php
class pages_model extends MY_Model {
	protected $table_name = 'pages';
	public $rules = array(
	'title' => array('field' => 'title', 'label' => '���������', 'rules' => 'trim|required|max_length[100]|xss_clean'),
	'body' => array('field' => 'body', 'label' => '����������', 'rules' => 'trim|required'),
	);

	public function get_new() {
		$pages = new stdClass();
		$pages->title = '';
		$pages->body = '';
		return $pages;
	}

}
?>
