<?php

    class Account_model extends CI_Model {
            
        function create_member(){

            $username = $this->input->post('name');
            $userfirstname = explode(" ", $username);
            $splited_name = count($userfirstname,0);
            if($splited_name == 2){
                $formatted_first_name = mb_convert_case($userfirstname[0], MB_CASE_TITLE, "UTF-8");
                $formatted_middle_name = "";
                $formatted_first_lname = mb_convert_case($userfirstname[1], MB_CASE_TITLE, "UTF-8");
                $formatted_second_lname = "";
            }elseif($splited_name == 3){
                $formatted_first_name = mb_convert_case($userfirstname[0], MB_CASE_TITLE, "UTF-8");
                $formatted_middle_name = "";
                $formatted_first_lname = mb_convert_case($userfirstname[1], MB_CASE_TITLE, "UTF-8");
                $formatted_second_lname = mb_convert_case($userfirstname[2], MB_CASE_TITLE, "UTF-8");
            }elseif($splited_name == 4){
                $formatted_first_name = mb_convert_case($userfirstname[0], MB_CASE_TITLE, "UTF-8");
                $formatted_middle_name = mb_convert_case($userfirstname[1], MB_CASE_TITLE, "UTF-8");
                $formatted_first_lname = mb_convert_case($userfirstname[2], MB_CASE_TITLE, "UTF-8");
                $formatted_second_lname = mb_convert_case($userfirstname[3], MB_CASE_TITLE, "UTF-8");
            }else{
                $formatted_first_name = mb_convert_case($userfirstname[0], MB_CASE_TITLE, "UTF-8");
                $formatted_middle_name = "";
                $formatted_first_lname = mb_convert_case($userfirstname[1], MB_CASE_TITLE, "UTF-8");
                $formatted_second_lname = "";
            }
            $formatted_full_name = mb_convert_case($this->input->post('name'), MB_CASE_TITLE, "UTF-8");
            $create_new_member = array(
                'user_fname' => $formatted_first_name,
                'user_mname' => $formatted_middle_name,
                'user_lname1' => $formatted_first_lname,
                'user_lname2' => $formatted_second_lname,
                'user_fullname' => $formatted_full_name,
                'user_type' => 'patron', // always a patron until the user changes it to restaurant in their profile
                'user_email' => $this->input->post('email'),
                'user_pwd' => md5($this->input->post('password'))
            );
            $insert = $this->db->insert('users', $create_new_member);
            if($insert){
              return $insert;  
            }else{
                return FALSE;
            }
            
        }
    }

?>