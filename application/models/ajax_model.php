<?php

//include 'ChromePhp.php';
/*ChromePhp::log('hello world');
ChromePhp::log($_SERVER);

// using labels
foreach ($_SERVER as $key => $value) {
    ChromePhp::log($key, $value);
}

// warnings and errors
ChromePhp::warn('this is a warning');
ChromePhp::error('this is an error');
 * 
 */

    class Ajax_model extends CI_Model {
        
        function get_counties(){
            $post_province = $this->input->post('user_province');
            $county_query = "SELECT DISTINCT canton FROM locations WHERE provincia = '$post_province' ORDER BY canton ASC";
            $counties = $this->db->query($county_query);
            if ($counties->num_rows() > 0){
                foreach($counties->result() as $row){
                    $counties_result[] = $row;
                }
                return $counties_result;
            }
        } // get_counties end
        
        function get_districts(){
            $post_county = $this->input->post('user_county');
            $districts_query = "SELECT DISTINCT distrito FROM locations WHERE canton = '$post_county' ORDER BY distrito ASC";
            $districts = $this->db->query($districts_query);
            if ($districts->num_rows() > 0){
                foreach($districts->result() as $row){
                    $districts_result[] = $row;
                }
                return $districts_result;
            }
        } // get_counties end
        
        function update_user_location(){
            $user_id = $this->session->userdata('user_id');
            $user_province = $this->input->post('user_province');
            $user_county = $this->input->post('user_county');
            $user_district = $this->input->post('user_district');
            $user_location_set = TRUE;
            $update_user_location = array('user_province' => $user_province, 'user_county' => $user_county, 'user_district' => $user_district, 'user_location_set' => $user_location_set);
            $this->db->where('user_id' , $user_id);
            $this->db->update('users', $update_user_location);
        } // get_counties end
        
        function generate_ajax_calendar($restaurant_id, $event_type, $year, $month, $day){
            $data_values = array();
			$data_urls = array();
			$data = array();
			$current_month = date('m');
			$today = date('j');
            if($restaurant_id == '0'){
                if($month == $current_month){
                    $sql = "SELECT event_day FROM events WHERE event_year = '$year' AND event_month = '$month' AND event_day >= '$today'";
                }else{
                    $sql = "SELECT event_day FROM events WHERE event_year = '$year' AND event_month = '$month'";
                }
                $events_type = 'multiEvents';
            }else{
                if($month == $current_month){
                    $sql = "SELECT event_day FROM events WHERE rest_id = '$restaurant_id' AND event_year = '$year' AND event_month = '$month' AND event_day >= '$today'";
                }else{
                    $sql = "SELECT event_day FROM events WHERE rest_id = '$restaurant_id' AND event_year = '$year' AND event_month = '$month'";
                }
                $events_type = 'singleEvent';
            }
			
			$query = $this->db->query($sql);
			$result = $query->result_array();
			if ($query->num_rows() > 0){
				foreach($result as $row){
					array_push($data_values, $row['event_day']);
					array_push($data_urls, base_url().'results/events/'.$year.'/'.$month.'/'.$row['event_day']);
				}
				$data = array_combine($data_values, $data_urls);
			}
            $prefs = array (
               'start_day'    => 'monday',
               'show_next_prev'  => TRUE,
               'next_prev_url'   => base_url().'results/restaurant',
               'template' => '
                   {table_open}<table id="restCalendar" border="0" cellpadding="0" cellspacing="0" class="calendar lightBg" width="100%">{/table_open}
                   {heading_row_start}<tr>{/heading_row_start}
                   {heading_previous_cell}<th><a id="prevMonth" href="{previous_url}"data-eventtype="'.$events_type.'"><span class="glyphicon glyphicon-chevron-left"></span></a></th>{/heading_previous_cell}
                   {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
                   {heading_next_cell}<th><a id="nextMonth" href="{next_url}"data-eventtype="'.$events_type.'"><span class="glyphicon glyphicon-chevron-right"></span></a></th>{/heading_next_cell}
                   {heading_row_end}</tr>{/heading_row_end}
                   {week_row_start}<tr>{/week_row_start}
                   {week_day_cell}<td>{week_day}</td>{/week_day_cell}
                   {week_row_end}</tr>{/week_row_end}
                   {cal_row_start}<tr>{/cal_row_start}
                   {cal_cell_start}<td class="event">{/cal_cell_start}
                   {cal_cell_content}<a href="{content}" class="getEvents" data-eventtype="'.$events_type.'" data-restid="'.$restaurant_id.'">{day}</a>{/cal_cell_content}
                   {cal_cell_content_today}<div class="highlight"><a href="{content}" class="getEvents" data-eventtype="'.$events_type.'" data-restid="'.$restaurant_id.'">{day}</a></div>{/cal_cell_content_today}
                   {cal_cell_no_content}{day}{/cal_cell_no_content}
                   {cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}
                   {cal_cell_blank}&nbsp;{/cal_cell_blank}
                   {cal_cell_end}</td>{/cal_cell_end}
                   {cal_row_end}</tr>{/cal_row_end}
                   {table_close}</table>{/table_close}
                ');
            $this->load->library('calendar', $prefs);
            return $this->calendar->generate($year, $month, $data);
        } // generate_ajax_calendar ends
        
        function get_ajax_events($restaurant_id, $event_type, $year, $month, $day){
            $current_month = date('m');
            $today = date('j');
        	$all_rest_events = ($event_type == "multiEvents")? '5': '1';
            
            if($restaurant_id == '0'){
                if($current_month == $month){
                    if($day == '0'){
                        $sql = "SELECT * FROM events WHERE event_year = '$year' AND event_month = '$current_month' AND event_day >= '$today' ORDER BY event_day ASC LIMIT $all_rest_events";
                    }else{
                        $sql = "SELECT * FROM events WHERE event_year = '$year' AND event_month = '$current_month' AND event_day = '$day' ORDER BY event_day ASC LIMIT $all_rest_events";
                    }
                }else{
                    if($day == '0'){
                        $sql = "SELECT * FROM events WHERE event_year = '$year' AND event_month = '$month' AND event_day >= '$day' LIMIT $all_rest_events";
                    }else{
                        $sql = "SELECT * FROM events WHERE event_year = '$year' AND event_month = '$month' AND event_day = '$day' LIMIT $all_rest_events";
                    }
                }
            }else{
                if($current_month == $month){
                    if($day == '0'){
                        $sql = "SELECT * FROM events WHERE rest_id = '$restaurant_id' AND event_year = '$year' AND event_month = '$current_month' AND event_day >= '$day' LIMIT $all_rest_events";
                    }else{
                        $sql = "SELECT * FROM events WHERE rest_id = '$restaurant_id' AND event_year = '$year' AND event_month = '$current_month' AND event_day = '$day' LIMIT $all_rest_events";
                    }
                }else{
                    if($day == '0'){
                        $sql = "SELECT * FROM events WHERE rest_id = '$restaurant_id' AND event_year = '$year' AND event_month = '$month' AND event_day >= '$day' LIMIT $all_rest_events";
                    }else{
                        $sql = "SELECT * FROM events WHERE rest_id = '$restaurant_id' AND event_year = '$year' AND event_month = '$month' AND event_day = '$day' LIMIT $all_rest_events";
                    }
                }
            }
            
            $this->load->model('profile_model');
            $get_user_reservations = $this->profile_model->get_user_reservations();
            
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0){
                setlocale(LC_TIME, "es_ES"); 
                foreach($query->result() as $row){
                    $event_date_time = strftime("%e de %B, %Y", mktime(0, 0, 0, $row->event_month, $row->event_day, $row->event_year));
                    
                    $user_has_reservation = false;
                    if ($get_user_reservations){
	                    foreach($get_user_reservations as $get_user_reservations_row){
	                    	if($row->event_id == $get_user_reservations_row->event_id){
	                    		$user_has_reservation = true;
	                    	}
	                    }
                    }
                    
                    $snippet = '
                        <div class="eventDescription lightBg">
                            <img src="/images/events/'.$row->rest_id.'/'.$row->event_id.'.jpg" style="display:none" />
                            <img src="http://lorempixel.com/g/535/210/food/Su-evento-aqui/">
                            <h4>'.$row->event_name.' - Restaurante '.$row->rest_name.'</h4>
                            <h5>'.$event_date_time.' a las '.date("g:i a", strtotime($row->event_time)).'.</h5>
                            <p>
                                '.$row->event_category.'.<br /><br />
                                '.$row->event_details.'<br />
                            </p>
                            <div class="actions">
                                <a class="btn btn-primary pull-right rsvpEvent" data-restid="'.$row->rest_id.'" data-eventid="'.$row->event_id.'" data-toggle="modal" href="#rsvpEvent">
                                    Solicitar reservaci&oacute;n para este evento
                                    <span class="glyphicon glyphicon-cutlery"></span>
                                </a>
                            </div>
                        </div>
                    ';
                    
                    $snippet2 = '
                        <div class="eventDescription lightBg">
                            <img src="/images/events/'.$row->rest_id.'/'.$row->event_id.'.jpg" style="display:none" />
                            <img src="http://lorempixel.com/g/535/210/food/Su-evento-aqui/">
                            <h4>'.$row->event_name.' - Restaurante '.$row->rest_name.'</h4>
                            <h5>'.$event_date_time.' a las '.date("g:i a", strtotime($row->event_time)).'.</h5>
                            <p>
                                '.$row->event_category.'.<br /><br />
                                '.$row->event_details.'<br />
                            </p>
                            <div class="actions">
                            	<div class="col-lg-12">
                                	<div class="col-lg-4">
                                    	<a href="/profile/reservations/'.$row->event_id.'" class="btn btn-primary pull-right">
				    						Ver Reservaci&oacute;n
			    						</a>
                                    </div>
		                            <div class="col-lg-4">
			                        	<a href="#changeReservationModal" class="btn btn-warning pull-right changeReservation" data-restid="'.$row->rest_id.'" data-eventid="'.$row->event_id.'" data-toggle="modal" >
						    				Cambiar Reservaci&oacute;n
					    				</a>
				    				</div>
					    			<div class="col-lg-4">
						    			<a href="#cancelReservation" class="btn btn-danger pull-right cancelReservation" data-eventid="'.$row->event_id.'" data-toggle="modal" >
						    				Cancelar Reservaci&oacute;n
				    					</a>
				    				</div>
                            	</div>
                            </div>
                        </div>
                    ';
                    if ($user_has_reservation){
                    	echo $snippet2;
                    }elseif (!$user_has_reservation){
                    	echo $snippet;
                    }
                    
                }
            }else{
                $no_event = '<div class="eventDescription attention">No hay eventos programados este mes.</div>';
                echo $no_event;
            }
        } // get_ajax_events ends
                
        function get_current_event(){
            $event_id = $this->input->post('event_id');
            $sql = "SELECT * FROM events WHERE event_id = '$event_id' LIMIT 1";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0){
                $row = $query->row_array();
                //ChromePhp::log(json_encode($row));
                echo json_encode($row);
            }else{
                echo FALSE;
            }
        } // get_ajax_event ends
        
        function get_matched_restaurants(){
        	$name_value = $this->input->post('name_value');
        	$rest_names = array();
        	$rest_ids = array();
        	$sql = "SELECT * FROM restaurants WHERE rest_name LIKE '%$name_value%' ORDER BY rest_name ASC LIMIT 10";
        	$query = $this->db->query($sql);
        	$restaurants = $query->result_array();
        	if ($query->num_rows() > 0){
        		foreach($restaurants as $row){
        			array_push($rest_ids, $row['rest_id']);
        			array_push($rest_names, $row['rest_name']);
        		}
        		$data = array_combine($rest_ids, $rest_names);
        		return $data;
        	}
        	
        }
        
        function get_search_restaurants	(){
        	$input_value = $this->input->post('input_value');
        	$current_location = $this->session->userdata('user_province');
        	if ($current_location){
        		$sql = "SELECT rest_id, rest_name, rest_cuisine, rest_cuisine_name, rest_province FROM restaurants WHERE rest_name LIKE '%$input_value%' OR rest_province LIKE '%$current_location%' OR rest_cuisine_name LIKE '%$input_value%' ORDER BY rest_name ASC LIMIT 10";
        	}else {
        		$sql = "SELECT rest_id, rest_name, rest_cuisine, rest_cuisine_name, rest_province FROM restaurants WHERE rest_name LIKE '%$input_value%' OR rest_cuisine_name LIKE '%$input_value%' ORDER BY rest_name ASC LIMIT 10";
        	}
        	
        	$restaurants = $this->db->query($sql);
        	if ($restaurants->num_rows() > 0){
        		foreach($restaurants->result() as $row){
        			$restaurants_result[] = $row;
        		}
        		return $restaurants_result;
        	}
        }
        
        function get_widget_restaurant(){
        	$rest_id = $this->input->post('rest_id');
        	$sql = "SELECT * FROM restaurants WHERE rest_id=$rest_id LIMIT 1";
        	$query = $this->db->query($sql);
        	if ($query->num_rows() > 0){
        		$row = $query->row_array();
        		//ChromePhp::log(json_encode($row));
        		return $row;
        	}else{
        		return  FALSE;
        	}        	 
        }
        
        function request_reservation(){
        	$query = $this->db->get('reservations');
        	$create_reservation = array(
        		'user_id' => $this->input->post("user_id"),
        		'user_fullname' => $this->input->post("user_fullname"),
        		'user_email' => $this->input->post("user_email"),
        		'user_phone' => $this->input->post("user_phone"),
        		'rest_id' => $this->input->post("rest_id"),
        		'rest_name' => $this->input->post("rest_name"),
        		'rest_phone' => $this->input->post("rest_phone"),
        		'rest_province' => $this->input->post("rest_province"),
        		'rest_county' => $this->input->post("rest_county"),
        		'rest_district' => $this->input->post("rest_district"),
        		'rest_address' => $this->input->post("rest_address"),
        		'rest_email' => $this->input->post("rest_email"),
        		'rest_website' => $this->input->post("rest_website"),
        		'rest_hours' => $this->input->post("rest_hours"),
        		'rest_credit_cards' => $this->input->post("rest_credit_cards"),
        		'rest_slogan' => $this->input->post("rest_slogan"),
        		'event_id' => $this->input->post("event_id"),
        		'event_name' => $this->input->post("event_name"),
        		'reservation_time' => $this->input->post("reservation_time"),
        		'reservation_date' => $this->input->post("reservation_date"),
        		'reservation_party' => $this->input->post("reservation_party"),
        		'reservation_sent' => $this->input->post("reservation_sent"),
        		'reservation_confirmed' => $this->input->post("reservation_confirmed"),
        		'reservation_cancelled' => $this->input->post("reservation_cancelled"),
        		'reservation_admin_verified' => 0
        	);
        	$insert = $this->db->insert('reservations', $create_reservation);
        	if($insert){
        		return true;
        	}else {
        		return false;
        	}
        }
        
        function change_reservation(){
        	$event_id = $this->input->post("event_id");
        	$reservation_time = $this->input->post("reservation_time");
        	$reservation_party = $this->input->post("reservation_party");
        	$change_reservation_data = array('reservation_time' => $reservation_time, 'reservation_party' => $reservation_party);
        	$this->db->where('event_id', $event_id);
        	$change_reservation = $this->db->update('reservations', $change_reservation_data);
        	return $change_reservation;
        }
        
        function cancel_reservation(){
        	$event_id = $this->input->post("event_id");
        	$cancel_reservation = $this->db->delete('reservations', array('event_id' => $event_id));
        	return $cancel_reservation;
        }
        
        function create_user_review(){
        	$create_new_review = array(
        		'rest_id' => $this->input->post('rest_id'),
        		'user_id' => $this->input->post('user_id'),
        		'user_name' => $this->input->post('user_name'),
        		'user_province' => $this->input->post('user_province'),
        		'rating_date' => $this->input->post('rating_date'),
        		'user_review' => $this->input->post('user_review'),
        		'rating_food' => $this->input->post('rating_food'),
        		'rating_service' => $this->input->post('rating_service'),
        		'rating_ambient' => $this->input->post('rating_ambient'),
        		'rating_prices' => $this->input->post('rating_prices'),
        		'rating_clean' => $this->input->post('rating_clean'),
        		'rating_average' => $this->input->post('rating_average'),
        		'admin_verified' => 0
        	);
        	$insert = $this->db->insert('ratings', $create_new_review);
        	if($insert){
        		return true;
        	}else {
        		return false;
        	}
        }
        
                
    } // Ajax_model ends
    
?>