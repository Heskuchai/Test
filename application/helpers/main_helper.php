<?php
function config($name) {
	$ci = &get_instance();
	$config = $ci->db->get_where('config', array('id' => 1), 1)->row();
	return $config->$name;
}
function user($name) {
	$ci = &get_instance();
	$config = $ci->db->get_where('users', array('id' => $ci->session->id), 1)->row();
	return $config->$name;
}
function no($a)
{
    $a = stripslashes($a);
    $a = htmlspecialchars($a);
    $a = trim($a);
    $a = mysql_real_escape_string($a);
    return $a;
}
function curls($Url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $Url);
    curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}
function delphp($str) {
	$str = preg_replace('/((P|p)(H|h)(P|p))/i','[removed]', $str);
	$str = str_replace(array('<?', '?>','<%', '%>'), array('[removed]', '[removed]','[removed]', '[removed]'), $str); 
	return $str;
}