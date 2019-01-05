<?php

    class Calendar_model extends CI_Model {
            
		function generate_calendar($all_restaurants){
			
			$year = date('Y');
			$month = date('m');
			$today = date('j');
			if($all_restaurants){
			    $restaurant_id = $this->uri->segment(3, 0);
				$sql = "SELECT event_day FROM events WHERE event_year = '$year' AND event_month = '$month' AND event_day >= '$today'";
				$next_prev_url = base_url().'results/events';
                $events_type = 'multiEvents';
			}else{
				$restaurant_id = $this->uri->segment(3, 0);
				$sql = "SELECT event_day FROM events WHERE rest_id = '$restaurant_id' AND event_year = '$year' AND event_month = '$month' AND event_day >= '$today'";
				$next_prev_url = base_url().'results/restaurant';
                $events_type = 'singleEvent';
			}
			$data_values = array();
			$data_urls = array();
			$data = array();
			$query = $this->db->query($sql);
			$result = $query->result_array();
			if ($query->num_rows() > 0){
				foreach($query->result_array() as $row){
					array_push($data_values, $row['event_day']);
					array_push($data_urls, base_url().'results/events/'.$year.'/'.$month.'/'.$row['event_day']);
				}
				$data = array_combine($data_values, $data_urls);
			}
			$prefs = array (
				'start_day'    => 'monday',
				'show_next_prev'  => TRUE,
				'next_prev_url'   => $next_prev_url,
				'template' => '
					{table_open}<table id="restCalendar" border="0" cellpadding="0" cellspacing="0" class="calendar lightBg" width="100%">{/table_open}
					{heading_row_start}<tr>{/heading_row_start}
					{heading_previous_cell}<th>&nbsp;</th>{/heading_previous_cell}
					{heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
					{heading_next_cell}<th><a id="nextMonth" href="{next_url}"data-eventtype="'.$events_type.'"><span class="glyphicon glyphicon-chevron-right"></span></a></th>{/heading_next_cell}
					{heading_row_end}</tr>{/heading_row_end}
					{week_row_start}<tr>{/week_row_start}
					{week_day_cell}<td>{week_day}</td>{/week_day_cell}
					{week_row_end}</tr>{/week_row_end}
					{cal_row_start}<tr>{/cal_row_start}
					{cal_cell_start}<td>{/cal_cell_start}
					{cal_cell_content}<a href="{content}"  class="getEvents" data-eventtype="'.$events_type.'" data-restid="'.$restaurant_id.'">{day}</a>{/cal_cell_content}
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
			
		} // generate_calendar ends
		
		function get_events($all_restaurants){
			
			$year = date('Y');
			$month = date('m');
			$today = date('j');
            $offset = $this->uri->segment(3, 0);
			if($all_restaurants){
				$sql = "SELECT * FROM events WHERE event_year = '$year' AND event_month = '$month' AND event_day >= '$today' ORDER BY event_fulldate LIMIT 5 OFFSET $offset";
				$query = $this->db->query($sql);
	            if ($query->num_rows() > 0){
	                foreach($query->result() as $row){
	                    $data[] = $row;
	                }
	                return $data;
	            }else{
	            	return FALSE;
	            }
			}else{
				$restaurant_id = $this->uri->segment(3, 0);
				$sql = "SELECT * FROM events WHERE rest_id = '$restaurant_id' AND event_year = '$year' AND event_month = '$month' AND event_day >= '$today' LIMIT 1";
				$query = $this->db->query($sql);
	            if ($query->num_rows() > 0){
	               $row = $query->row_array();
	               return $row;
	            }else{
	            	return FALSE;
	            }
			}
			
		} // get_events ends
		
		function count_events(){
		    $year = date('Y');
            $month = date('m');
            $today = date('j');
            $sql = "SELECT * FROM events WHERE event_year = '$year' AND event_month = '$month' AND event_day >= '$today' ORDER BY event_fulldate";
            $query = $this->db->query($sql);
            return $query->num_rows();
		}
		        
    } /* Calendar_model ends */

?>