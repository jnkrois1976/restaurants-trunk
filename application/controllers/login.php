<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Login extends CI_Controller {
        
        public function validate(){
            $this->load->model('login_model');
            $query = $this->login_model->validate();
            if($query){
                $data = array(
                    'user_name' => $this->input->post('email'),
                    'member_name' => $query['user_fname']." ".$query['user_mname'],
                    'user_id' => $query['user_id'],
                	'user_fullname' => $query['user_fullname'],
                	'user_email' => $query['user_email'],
                	'user_phone' => $query['user_phone'],
                	'user_province' => $query['user_province'],
                	'user_county' => $query['user_county'],
                	'user_district' => $query['user_district'],
                    'is_logged_in' => 'true'
                );
                $this->session->set_userdata($data);
                $this->load->view('/includes/top_links_view');
                $access_page = $this->agent->referrer();
                $check_origin = base_url().'misc/locked_profile';
                if($access_page == $check_origin){
                    redirect(base_url().'site/index');
                }else{
                    redirect($access_page);
                }
            }else{
                /* have to create a redirect to an actual controller when the login fails and the request was not made via ajax */
                //show_error('descripcion del error'); // this does not work because "show_error()", loads its own template
                $this->setlang->set_lang();
                $page['main_content'] = 'misc/generic_error_view';
                $page_class = "generic_error";
                $data = array('is_logged_in' => 'false');
                $this->session->set_userdata($data);   
                $data = array('page_class' => $page_class, 'user_loggedin' => FALSE);
                $this->load->view('includes/template_view', array('page' => $page, 'data' =>$data));
            }
        } /* validate ends */
        
    } /* login ends */
    
?>
