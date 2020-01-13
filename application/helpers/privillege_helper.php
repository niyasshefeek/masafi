<?php if (!defined('BASEPATH')) exit('No direct script access allowed');




//privilege
function check_privilege($id,$user_id){

	$session = array(
		'privillege_id'  => $id,
        'privillege_on' => TRUE
	);

	$CI =& get_instance();
	$CI->load->library('session');
	$CI->session->set_userdata($session);
    // You may need to load the model if it hasn't been pre-loaded
    $CI->load->model('masafi_model');
	return $CI->masafi_model->get_modules_by_page($id,$user_id);

}

function helper_session(){

	$CI =& get_instance();
	$CI->load->library('session');
	$CI->lang->load('auth');


}
