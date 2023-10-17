<?php
class Admin_Controller extends MY_Controller {
	function __Construct() {
        parent::__construct();
        if (user('group') != 2) die(show_error());
    }
}
?>