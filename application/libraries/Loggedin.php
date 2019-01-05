<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

	class Loggedin {
		
		function is_logged_in(){
			$CI =& get_instance();
	        $is_logged_in = $CI->session->userdata('is_logged_in');
	        if(!isset($is_logged_in) || $is_logged_in != true){
	            redirect(base_url().'misc/locked_profile');
	        }else{
	        	return $is_logged_in;
	        }
	    } // is_logged_in ends
		
	} // Loggedin class ends

?>