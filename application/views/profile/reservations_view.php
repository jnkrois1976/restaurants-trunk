<div class="container mainWrapper">
	<?php include('application/views/modules/change_reservation_modal.php'); ?>
	<?php include('application/views/modules/cancel_reservation_modal.php'); ?>
	<div class="container mainContent lightBg">
		<div class="row">
			<div class="col-lg-12">
				<h1>Sus Reservaciones</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-9">
		 			<?php if($get_active_reservations): ?>
		 				<?php if ($this->uri->segment(3, 0)): ?>
                        	<?php
                            	setlocale(LC_TIME, "es_ES");
                                $break_date = explode('-', $get_active_reservations['reservation_date']);
                                $event_date_time = strftime("%e de %B, %Y", mktime(0, 0, 0, $break_date[1], $break_date[2], $break_date[0]));
                            ?>
							<div class="reservationDetails lightBg col-lg-9">
								<div class="col-lg-12">
									<div class="col-lg-9">
										<h3>Restaurante <?= $get_active_reservations['rest_name']?></h3>
									</div>
									<div class="col-lg-3">
									<?php 
										if($get_active_reservations['reservation_confirmed'] == 1){
											$reservation_status = "Confirmada";
											$reservations_status_icon = "glyphicon-ok statusOk";
										}elseif ($get_active_reservations['reservation_confirmed'] == 0){
											$reservation_status = "Sin confirmar";
											$reservations_status_icon = "glyphicon-alert attention";
										}
									?>
										<h3><div style="text-align: right; margin-right:10px;"><?=$reservation_status?> <span class="glyphicon <?=$reservations_status_icon?>"></span></div></h3>
									</div>
								</div>
								<div class="col-lg-12"><hr /></div>
								<div class="col-lg-12">
									<div class="col-lg-4">
										<h4>Informaci&oacute;n de la reservaci&oacute;n</h4>
										<ul>
											<li>Para <?=$get_active_reservations['reservation_party']?> personas</li>
											<li><?= $event_date_time?></li>
											<li><?=date("g:i a", strtotime($get_active_reservations['reservation_time']))?></li>
										</ul>
									</div>
									<div class="col-lg-5">
										<h4>Informaci&oacute;n del Restaurante</h4>
										<ul>
											<li><?=$get_active_reservations['rest_phone']?></li>
											<li><?=$get_active_reservations['rest_email']?></li>
											<li><?=$get_active_reservations['rest_website']?></li>
											<li><?=$get_active_reservations['rest_hours']?></li>
											<li><?=$get_active_reservations['rest_district']." de ".$get_active_reservations['rest_county'].", ".$get_active_reservations['rest_province']?></li>
										</ul>
									</div>
									<div class="col-lg-3">
										<a href="#changeReservationModal" class="btn btn-warning pull-right changeReservation" data-restid="<?=$get_active_reservations['rest_id']?>" data-eventid="<?=$get_active_reservations['event_id']?>" data-toggle="modal" >
			    							Cambiar Reservaci&oacute;n
			    							<span class="glyphicon glyphicon-pencil"></span>
			    						</a>
			    						<br><br>
			    						<a href="#cancelReservation" class="btn btn-danger pull-right cancelReservation" data-eventid="<?=$get_active_reservations['event_id']?>" data-toggle="modal" >
			    							Cancelar Reservaci&oacute;n
			    							<span class="glyphicon glyphicon-remove"></span>
			    						</a>
									</div>
								</div>
							</div>
							<?php if (count($get_active_reservations) > 1): ?>
								<div class="col-lg-12">
									<a href="/profile/reservations" class="btn btn-primary pull-right">
		    							Ver todas las reservaciones
		    							<span class="glyphicon glyphicon-open-eye"></span>
		    						</a>
								</div>
							<?php endif;?>
						<?php elseif (!$this->uri->segment(3, 0)): ?>
							<?php foreach($get_active_reservations as $get_active_reservations_row): ?>
	                        	<?php
	                            	setlocale(LC_TIME, "es_ES");
	                                $break_date = explode('-', $get_active_reservations_row->reservation_date);
	                                $event_date_time = strftime("%e de %B, %Y", mktime(0, 0, 0, $break_date[1], $break_date[2], $break_date[0]));
	                            ?>
								<div class="reservationDetails lightBg col-lg-9">
									<div class="col-lg-12">
										<div class="col-lg-9">
											<h3>Restaurante <?= $get_active_reservations_row->rest_name?></h3>
										</div>
										<div class="col-lg-3">
										<?php 
											if($get_active_reservations_row->reservation_confirmed == 1){
												$reservation_status = "Confirmada";
												$reservations_status_icon = "glyphicon-ok statusOk";
											}elseif ($get_active_reservations_row->reservation_confirmed == 0){
												$reservation_status = "Sin confirmar";
												$reservations_status_icon = "glyphicon-alert attention";
											}
										?>
											<h3><div style="text-align: right; margin-right:10px;"><?=$reservation_status?> <span class="glyphicon <?=$reservations_status_icon?>"></span></div></h3>
										</div>
									</div>
									<div class="col-lg-12"><hr /></div>
									<div class="col-lg-12">
										<div class="col-lg-4">
											<h4>Informaci&oacute;n de la reservaci&oacute;n</h4>
											<ul>
												<li>Para <?=$get_active_reservations_row->reservation_party?> personas</li>
												<li><?= $event_date_time?></li>
												<li><?=date("g:i a", strtotime($get_active_reservations_row->reservation_time))?></li>
											</ul>
										</div>
										<div class="col-lg-5">
											<h4>Informaci&oacute;n del Restaurante</h4>
											<ul>
												<li><?=$get_active_reservations_row->rest_phone?></li>
												<li><?=$get_active_reservations_row->rest_email?></li>
												<li><?=$get_active_reservations_row->rest_website?></li>
												<li><?=$get_active_reservations_row->rest_hours?></li>
												<li><?=$get_active_reservations_row->rest_district." de ".$get_active_reservations_row->rest_county.", ".$get_active_reservations_row->rest_province?></li>
											</ul>
										</div>
										<div class="col-lg-3">
											<a href="#changeReservationModal" class="btn btn-warning pull-right changeReservation" data-restid="<?=$get_active_reservations_row->rest_id?>" data-eventid="<?=$get_active_reservations_row->event_id?>" data-toggle="modal" >
				    							Cambiar Reservaci&oacute;n
				    							<span class="glyphicon glyphicon-pencil"></span>
				    						</a>
				    						<br><br>
				    						<a href="#cancelReservation" class="btn btn-danger pull-right cancelReservation" data-eventid="<?=$get_active_reservations_row->event_id?>" data-toggle="modal" >
				    							Cancelar Reservaci&oacute;n
				    							<span class="glyphicon glyphicon-remove"></span>
				    						</a>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						<?php endif;?>
					<?php elseif (!$get_active_reservations): ?>
						<div class="reservationDetails lightBg col-lg-9">
                        	No tiene ninguna reservaci&oacute;n activa.
                        </div>
					<?php endif; ?>
					
					<?php if($get_past_reservations && !$this->uri->segment(3, 0)): ?>
						<h2>Reservaciones Pasadas</h2>
                    	<?php foreach($get_past_reservations as $get_past_reservations_row): ?>
                        	<?php
                            	setlocale(LC_TIME, "es_ES");
                                $break_date = explode('-', $get_past_reservations_row->reservation_date);
                                $event_date_time = strftime("%e de %B, %Y", mktime(0, 0, 0, $break_date[1], $break_date[2], $break_date[0]));
                            ?>
							<div class="reservationDetails lightBg col-lg-9">
								<h3>Restaurante <?= $get_past_reservations_row->rest_name?></h3>
								<hr>
								<div class="col-lg-12">
									<div class="col-lg-5">
										<h4>Informaci&oacute;n de la reservaci&oacute;n</h4>
										<ul>
											<li>Para <?=$get_past_reservations_row->reservation_party?> personas</li>
											<li><?= $event_date_time?></li>
											<li><?=date("g:i a", strtotime($get_past_reservations_row->reservation_time))?></li>
										</ul>
									</div>
									<div class="col-lg-4">
										<h4>Informaci&oacute;n del Restaurante</h4>
										<ul>
											<li><?=$get_past_reservations_row->rest_phone?></li>
											<li><?=$get_past_reservations_row->rest_email?></li>
											<li><?=$get_past_reservations_row->rest_website?></li>
											<li><?=$get_past_reservations_row->rest_hours?></li>
											<li><?=$get_past_reservations_row->rest_district." de ".$get_past_reservations_row->rest_county.", ".$get_past_reservations_row->rest_province?></li>
										</ul>
									</div>
									<div class="col-lg-3">
										<a href="/profile/reservations" class="btn btn-primary pull-right">
			    							Calificar Restaurante
			    							<span class="glyphicon glyphicon-pencil"></span>
			    						</a>
			    						<br><br>
			    						<a href="/profile/reservations" class="btn btn-primary pull-right">
			    							Hacer un comentario
			    							<span class="glyphicon glyphicon-bullhorn"></span>
			    						</a>
			    						<br><br>
			    						<a href="/profile/reservations" class="btn btn-danger pull-right">
			    							Tiene alguna queja?&nbsp;	
			    							<span class="glyphicon glyphicon-thumbs-down"></span>
			    						</a>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					<?php elseif (!$get_past_reservations && !$this->uri->segment(3, 0)): ?>
						<div class="reservationDetails lightBg col-lg-9">
                        	No tiene ninguna reservaci&oacute;n pasada.
                        </div>
					<?php endif; ?>
				</div>
				<div class="col-lg-3">advertisement</div>
			</div>
		</div>
	</div>
</div>
