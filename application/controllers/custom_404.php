<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Custom_404 extends CI_Controller {
	 
	    public function __construct() {
	            parent::__construct(); 
                $this->setlang->set_lang();             
	    }
        
        public function user_query(){
            $this->load->model('profile_model');
            $get_user = $this->profile_model->get_user();
            return $get_user;
        }

	    public function index() {
	 		$page['main_content'] = 'misc/custom_404_view';
            $page_class = "error_404";
            $data = array('page_class' => $page_class, 'user_query' => $this->user_query());
            $this->load->view('includes/template_view', array('page' => $page, 'data' =>$data));
	    }
	 
	}
?>