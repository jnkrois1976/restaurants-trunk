<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ALL);

class Site_object extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->setlang->set_lang();
    }
    
    public function provinces(){
        $province = array('San José', 'Alajuela', 'Heredia', 'Cartago', 'Puntarenas', 'Limón', 'Guanacaste');
            $province_names = array();
            foreach($province as $value){
                array_push($province_names, $value);
            } 
            echo json_encode($province_names);
    }
	            
    public function error_messages(){
        $generic_errors = array(
			'ErrorInputEmpty' => $this->lang->line('error_input_empty'),
			'ErrorSelectEmpty' => $this->lang->line('error_select_empty'),
			'ErrorInputTextOnly' => $this->lang->line('error_input_text_only'),
			'ErrorInputNumbersOnly' => $this->lang->line('error_input_numbers_only'),
			'ErrorValidEmail' => $this->lang->line('error_valid_email'),
			'ErrorInputPwdConfirm' => $this->lang->line('error_input_pwd_confirm'),
			'ErrorEmailExist' => $this->lang->line('error_email_exist'),
			'ErrorValidDate' => $this->lang->line('error_valid_date'),
			'ErrorValidTime' => $this->lang->line('error_valid_time'),
			'ErrorNotLoggedIn' => $this->lang->line('error_not_logged_in'),
        	'ErrorTextAreaEmpty' => 'Este campo de texto no puede quedar vacio'
			);
			
		echo json_encode($generic_errors);
		
    } // function new member ends
    
    public function server_error_messages(){
        $server_errors = array(
			'ServerErrorLoginFailed' => $this->lang->line('server_error_login_failed')
			);
			
		echo json_encode($server_errors);
		
    } // function new member ends
    
    public function user_info(){
        $user_name = $this->session->userdata('user_name');
        $member_name = $this->session->userdata('member_name');
        $user_id = $this->session->userdata('user_id');
        $logged_user = $this->session->userdata('is_logged_in');
        $user_fullname = $this->session->userdata('user_fullname');
        $user_email = $this->session->userdata('user_email');
        $user_phone = $this->session->userdata('user_phone');
        $user_province = $this->session->userdata('user_province');
        $user_info = array(
        		'UserName' => $user_name, 
        		'MemberName' => $member_name, 
        		'UserId' => $user_id,
        		'LoggedUser' => $logged_user,
        		'UserFullName' => $user_fullname, 
        		'UserEmail' => $user_email, 
        		'UserPhone' => $user_phone, 
        		'UserProvince' => $user_province
        );
        echo json_encode($user_info);
    } // user_info ends
    
} // class Site_object ends

