<?php

    class Profile_model extends CI_Model {
            
        function get_user(){
            $user_id = $this->session->userdata('user_id');
            if($user_id){
                $sql = "SELECT * FROM users WHERE user_id = '$user_id' LIMIT 1";
                $query = $this->db->query($sql);
                if ($query->num_rows() > 0){
                   $row = $query->row_array();
                   return $row;
                }
            }else{
                return FALSE;
            }
        }
        
        function get_active_reservations(){
        	$today = date('Y-m-d');
        	$user_id = $this->session->userdata('user_id');
        	$single_reservation = $this->uri->segment(3, 0);
        	$offset = $this->uri->segment(4, 0);
        	if($user_id){
        		//check for single reservation vs all reservations
        		if ($single_reservation){
        			$sql = "SELECT * FROM reservations WHERE user_id='$user_id' AND event_id='$single_reservation' LIMIT 1";
        			$query = $this->db->query($sql);
        			if ($query->num_rows() > 0){
        				$row = $query->row_array();
        				return $row;
        			}
        		}else {
        			$sql = "SELECT * FROM reservations WHERE user_id='$user_id' AND reservation_date >= '$today' ORDER BY reservation_date ASC LIMIT 10 OFFSET $offset";
        			$query = $this->db->query($sql);
        			$data = false;
        			if ($query->num_rows() > 0){
	        			foreach($query->result() as $row){
	        				$data[] = $row;
	        			}
	        			return $data;
        			}
        		}
        		
        		
        	}
        }
        
        function get_past_reservations(){
        	$today = date('Y-m-d');
        	$user_id = $this->session->userdata('user_id');
        	$offset = $this->uri->segment(3, 0);
        	if($user_id){
        		$sql = "SELECT * FROM reservations WHERE user_id='$user_id' AND reservation_date < '$today' ORDER BY reservation_date ASC LIMIT 10 OFFSET 0";
        		$query = $this->db->query($sql);
        		$data = false;
        		if ($query->num_rows() > 0){
	        		foreach($query->result() as $row){
	        			$data[] = $row;
	        		}
        		}
        		return $data;
        	}
        } /* get_past_reservations ends */
        
        function get_user_reservations(){
        	$user_id = $this->session->userdata('user_id');
        	$sql = "SELECT event_id FROM reservations WHERE user_id='$user_id'";
        	$query = $this->db->query($sql);
        	if ($query->num_rows() > 0){
        		foreach($query->result() as $row){
        			$data[] = $row;
        		}
        		return $data;
        	}else {
        		return false;
        	}
        	
        } /* get_user_reservations ends */
        
    } /* profile model ends */

?>