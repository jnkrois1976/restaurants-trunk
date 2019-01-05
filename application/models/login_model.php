<?php

    class Login_model extends CI_Model {
            
        function validate(){
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            $sql = "SELECT * FROM users WHERE user_email = '$email' AND user_pwd = '$password'";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0){
               $row = $query->row_array();
               return $row;
            }else{
                return FALSE;
            }
        } /* validate ends */
        
    } /* login model ends */

?>