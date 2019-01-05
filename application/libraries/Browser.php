<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

	class Browser {
	
	    public function browser_detect(){
	        $CI =& get_instance();
			if($CI->agent->is_browser('MSIE')){
				if(floor($CI->agent->version()) < 9){
					redirect('/misc/browser_upgrade');
				}
			}
	    }
	}

?>