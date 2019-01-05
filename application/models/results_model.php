<?php

    class Results_model extends CI_Model {
            
        function get_restaurant(){
            $restaurant_id = $this->uri->segment(3, 0);
            if($restaurant_id){
                $sql = "SELECT * FROM restaurants WHERE rest_id = '$restaurant_id' LIMIT 1";
                $query = $this->db->query($sql);
                if ($query->num_rows() > 0){
                   $row = $query->row_array();
                   return $row;
                }
            }else{
                return FALSE;
            }
        } // get_restaurant ends
        
        function get_restaurants(){
        	$rest_filter_by = $this->uri->segment(3, 0);
        	$rest_filter_value = $this->uri->segment(4, 0);
        	$results_by_cat = array('food'=>'rest_cuisine', 'ratings'=>'rest_category', 'location'=>'rest_province', 'prices'=>'rest_prices');
        	
        	foreach($results_by_cat as $results_by_cat_key => $key){
        		if($results_by_cat_key == $rest_filter_by){
        			$column_name = $key;
        		}
        	}
        	
        	$offset = $this->uri->segment(5, 0);
        	if($rest_filter_value){
        		if($rest_filter_value == "sanjose"){
        			$rest_filter_value = "San José";
        		}
        		$sql = "SELECT * FROM restaurants WHERE $column_name='$rest_filter_value' ORDER BY $column_name LIMIT 10 OFFSET $offset";
        		$query = $this->db->query($sql);
        		if($query->num_rows() > 0){
	        		foreach($query->result() as $row){
	        			$data[] = $row;
	        		}
	        		return $data;
        		}else {
        			return false;
        		}
        	}
        } // get_restaurant ends
        
        function count_restaurants(){
        	$restaurant_rating = $this->uri->segment(3, 0);
        	$sql = "SELECT * FROM restaurants WHERE rest_category = '$restaurant_rating'";
        	$query = $this->db->query($sql);
        	return $query->num_rows();
        }
        
        function get_user_ratings(){
        	$restaurant_rating = $this->uri->segment(3, 0);
        	$offset = $this->uri->segment(5, 0);
        	$sql = "SELECT * FROM ratings WHERE rest_id='$restaurant_rating' ORDER BY rating_timestamp DESC LIMIT 10 OFFSET $offset";
        	$ratings = $this->db->query($sql);
        	if ($ratings->num_rows() > 0){
        		foreach($ratings->result() as $row){
        			$ratings_result[] = $row;
        		}
        		return $ratings_result;
        	}
        }
        
        function count_user_ratings(){
        	$restaurant_rating = $this->uri->segment(3, 0);
        	$sql = "SELECT * FROM ratings WHERE rest_id = '$restaurant_rating'";
        	$query = $this->db->query($sql);
        	return $query->num_rows();
        }
        
        function count_low_user_ratings(){
        	$restaurant_rating = $this->uri->segment(3, 0);
        	$sql = "SELECT * FROM ratings WHERE rest_id = '$restaurant_rating' AND rating_average < 3";
        	$query = $this->db->query($sql);
        	return $query->num_rows();
        }
        
        function count_mid_user_ratings(){
        	$restaurant_rating = $this->uri->segment(3, 0);
        	$sql = "SELECT * FROM ratings WHERE rest_id = '$restaurant_rating' AND rating_average >= 3 AND rating_average < 4";
        	$query = $this->db->query($sql);
        	return $query->num_rows();
        }
        
        function count_high_user_ratings(){
        	$restaurant_rating = $this->uri->segment(3, 0);
        	$sql = "SELECT * FROM ratings WHERE rest_id = '$restaurant_rating' AND rating_average >= 4";
        	$query = $this->db->query($sql);
        	return $query->num_rows();
        }
        
        function average_user_ratings(){
        	$restaurant_rating = $this->uri->segment(3, 0);
        	$sql = "SELECT AVG(rating_average) FROM ratings WHERE rest_id = '$restaurant_rating'";
        	$query = $this->db->query($sql);
        	$ratings_average = $query->row_array();
        	return $ratings_average;
        }
                
    } /* login model ends */

?>