<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Account extends CI_Controller {
            
        function __construct(){
            parent::__construct();
			/* need to create a more secure way of checking if the request comes from the actual form */
        }
        
        public function create(){
            
            $this->load->model('account_model');
            $query = $this->account_model->create_member();
            if($query){
                $this->load->model('login_model');
                $query_login = $this->login_model->validate();
                if($query_login){
                    $user_id = $query_login['user_id'];
                    $member_name = $query_login['user_fname'];
                    $user_name = $query_login['user_email'];
                    $data = array(
                        'user_id' => $user_id,
                        'member_name' => $member_name,
                        'user_name' => $user_name,
                        'is_logged_in' => true,
                        'accountcreated' => true
                    );
                    $this->session->set_userdata($data);
                    if(site_url() == 'http://restaurantes506.local/'){
                        $mail_server = 'localhost';
                    }elseif(site_url() == 'http://dev.restaurantes506.com/' || site_url() == 'http://restaurantes506.com/'){
                        $mail_server = 'relay-hosting.secureserver.net';
                    }
                    $email_template = '
                        <html>
                            <head>
                                <title>Mensaje de restaurantes506.com</title>
                            </head>
                            <body>
                                <table cellpadding="1" cellspacing="2" border="0" width="600">
                                    <tr>
                                        <td><img src="'.site_url().'svg/logo_v1.svg" alt="restaurantes506.com"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Su cuenta en restaurantes506.com ha sido creada. Sin embargo debe ser autenticada para poder utilizar algunas funciones.<br /><br />
                                            Por favor haga click <a href="'.base_url("misc/authenticate_account/".$user_id).'">AQU&Iacute;</a> para autenticar su cuenta.<br /><br />
                                            O bien puede copiar y pegar el siguiente link en la barra de direcci&oacute;n de su navegador:<br />
                                            '.base_url("misc/authenticate_account/".$user_id).'<br /><br />
                                            Una vez que haya autenticado su cuenta, podr&aacute; utilizar el sitio sin restricciones.<br /><br />
                                            Gracias.
                                        </td>
                                    </tr>
                                </table>
                            </body>
                        </html>
                    ';
                    $config['protocol'] = 'sendmail';
                    $config['mailpath'] = '/usr/sbin/sendmail';
                    $config['smtp_host'] = $mail_server;
                    $config['smtp_port'] = '25';
                    $config['mailtype'] = 'html';
                    $this->email->initialize($config);
                    $this->email->from('manager@restaurantes506.com', 'restaurantes506.com');
                    //$this->email->to($user_name);
                    $this->email->to('jnkrois@gmail.com');
                    $this->email->reply_to('noreply@restaurantes506.com');
                    $this->email->subject('Su cuenta en restaurantes506.com ha sido creada.');
                    $this->email->message($email_template);
                    $send_message = $this->email->send();
                    redirect('profile/new_member');
                    /*if($send_message){
                        redirect('profile/new_member');
                    }else{
                        echo "something went wrong";
                    }*/
                }else{
                    return FALSE; // redirect to a controller that handles the error
                }
            }

        } /* create ends */
        
    } /* account ends */

?>
