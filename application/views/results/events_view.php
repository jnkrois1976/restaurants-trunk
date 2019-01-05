<?php 
    setlocale(LC_TIME, "es_ES");
    $current_month = date('m');
    $format_month = strftime("%B", mktime(0, 0, 0, $current_month));
    //print_r($get_user_reservations);
?>
<div class="container mainWrapper">
    <?php include('application/views/modules/rsvp_event_modal.php'); ?>
    <?php include('application/views/modules/change_reservation_modal.php'); ?>
    <?php include('application/views/modules/cancel_reservation_modal.php'); ?>
	<div class="container mainContent lightBg">
	    <div class="row"></div>
	       <div class="col-lg-12">
	           <h1>Eventos del mes de <span id="monthName"><?=$format_month?></span></h1>
	       </div>
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-3">
				    <div id="restEventCalendar">
                        <?=$generate_calendar?>
                    </div>
				</div>
				<div class="col-lg-6">
				    <div id="eventDescWrapper">
                        <?php if($get_events): ?>
                            <?php foreach($get_events as $get_events_row): ?>
                                <?php
                                    setlocale(LC_TIME, "es_ES"); 
                                    $event_date_time = strftime("%e de %B, %Y", mktime(0, 0, 0, $get_events_row->event_month, $get_events_row->event_day, $get_events_row->event_year));
                                ?>
                                <div class="eventDescription lightBg">
                                    <img src="/images/events/<?=$get_events_row->rest_id.'/'.$get_events_row->event_id?>.jpg" style="display: none;"/>
                                    <img src="http://lorempixel.com/g/535/210/food/Su-evento-aqui/">
                                    <h4 class="eventTitle"><?=$get_events_row->event_name.' - Restaurante '.$get_events_row->rest_name?></h4>
                                    <h5 class="eventDateTime"><?=$event_date_time.' a las '.date("g:i a", strtotime($get_events_row->event_time))?>.</h5>
                                    <p>
                                        <?=$get_events_row->event_category?>.<br /><br />
                                        <?=$get_events_row->event_details?><br />
                                    </p>
                                    <div class="actions">
                                    	<div class="col-lg-12">
		                                    <?php 
		                                    $user_has_reservation = false;
		                                    	if ($get_user_reservations){
				                                    foreach($get_user_reservations as $get_user_reservations_row){
				                                    	if($get_events_row->event_id == $get_user_reservations_row->event_id){
				                                    		$user_has_reservation = true;
				                                    	}
				                                    }
		                                    	}
		                                    ?>
		                                    <?php if($user_has_reservation): ?>
		                                    	<div class="col-lg-4">
		                                    		<a href="/profile/reservations/<?=$get_events_row->event_id?>" class="btn btn-primary pull-right">
						    							Ver Reservaci&oacute;n
						    						</a>
		                                    	</div>
		                                    	<div class="col-lg-4">
			                                        <a href="#changeReservationModal" class="btn btn-warning pull-right changeReservation" data-restid="<?=$get_events_row->rest_id?>" data-eventid="<?=$get_events_row->event_id?>" data-toggle="modal" >
						    							Cambiar Reservaci&oacute;n
						    						</a>
					    						</div>
					    						<div class="col-lg-4">
						    						<a href="#cancelReservation" class="btn btn-danger pull-right cancelReservation" data-eventid="<?=$get_events_row->event_id?>" data-toggle="modal" >
						    							Cancelar Reservaci&oacute;n
						    						</a>
					    						</div>
		                                    <?php elseif (!$user_has_reservation): ?>
		                                    	<a class="btn btn-primary pull-right rsvpEvent" data-restid="<?=$get_events_row->rest_id?>" data-eventid="<?=$get_events_row->event_id?>" data-toggle="modal" href="#rsvpEvent">
		                                            Solicitar reservaci&oacute;n para este evento 
		                                            <span class="glyphicon glyphicon-cutlery"></span>
		                                        </a>
		                                    <?php endif;?>
                                    	</div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php elseif(!$get_events): ?>
                            <div class="eventDescription">
                                No hay eventos programados este mes.
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php echo $this->pagination->create_links(); ?>
				</div>
				<div class="col-lg-3">
					<div class="insideCol lightBgInverted">test</div>
				</div>
			</div>
		</div>
	</div>
</div>
