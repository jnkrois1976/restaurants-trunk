<div class="container mainWrapper">
	<?php include('application/views/modules/rsvp_event_modal.php'); ?>
	<?php include('application/views/modules/change_reservation_modal.php'); ?>
	<?php include('application/views/modules/cancel_reservation_modal.php'); ?>
	<?php include('application/views/modules/create_review_modal.php'); ?>
	<div class="container mainContent lightBg">
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-9">
					<div class="restProfile lightBgInverted">
						<?php if($get_restaurant): ?>
						<h1>Restaurante <?=$get_restaurant['rest_name']?></h1>
						<div class="restBanner">
							<img src="/images/banners/1000/1000.jpg" width="841px" />
						</div>
						<ul class="nav nav-tabs" id="myTab">
							<li class="active">
								<a class="skuPageSmoothScroll" href="#restSumary" data-toggle="tab">Restaurante <span class="glyphicon glyphicon-cutlery"></span></a>
							</li>
							<li>
								<a class="skuPageSmoothScroll" href="#restGallery" data-toggle="tab">Galer&iacute;a <span class="glyphicon glyphicon-picture"></span></a>
							</li>
							<li>
								<a class="skuPageSmoothScroll" href="#restMenu" data-toggle="tab">Men&uacute; <span class="glyphicon glyphicon-list"></span></a>
							</li>
							<li>
								<a class="skuPageSmoothScroll" href="#restEvents" data-toggle="tab">Eventos <span class="glyphicon glyphicon-bullhorn"></span></a>
							</li>
							<li>
								<a class="skuPageSmoothScroll" href="#restReviews" data-toggle="tab">Opiniones <span class="glyphicon glyphicon-comment"></span></a>
							</li>
							<li>
								<a class="skuPageSmoothScroll" href="#restRatings" data-toggle="tab">Calificaciones <span class="glyphicon glyphicon-ok"></span></a>
							</li>
							<li>
								<a class="skuPageSmoothScroll" href="#restServices" data-toggle="tab">Servicios <span class="glyphicon glyphicon-briefcase"></span></a>
							</li>
							<li>
								<a class="skuPageSmoothScroll" href="#restInfo" data-toggle="tab">Informaci&oacute;n <span class="glyphicon glyphicon-info-sign"></span></a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="restSumary">
							    <div class="row">
    								<div class="col-lg-4">
    									<p>
    										<?=$get_restaurant['rest_slogan']?><br /><br />
    										<?=$get_restaurant['rest_moto']?>
    									</p>
    								</div>
    								<div class="col-lg-8">
    								    <table cellpadding="0" cellspacing="0" width="100%" border="0">
    								        <colgroup>
    								            <col width="30%"/>
    								            <col width="70%"/>
    								        </colgroup>
    								        <tbody>
    								            <tr>
    								                <td>Categor&iacute;a:</td>
    								                <td>
    								                    <?php 
    								                        for($i = 0; $i < $get_restaurant['rest_category']; $i++){
    								                            echo '<span class="glyphicon glyphicon-star gold"></span>';
    								                        }
    								                    ?>
								                    </td>
    								            </tr>
    								            <tr>
                                                    <td>Tipo de cocina:</td>
                                                    <td><?=$get_restaurant['rest_cuisine_name']?></td>
                                                </tr>
                                                <tr>
                                                    <td>Rango de precios:</td>
                                                    <td>
                                                        <?php 
                                                            for($i = 0; $i < $get_restaurant['rest_prices']; $i++){
                                                                echo '<span class="glyphicon glyphicon-usd usd"></span>';
                                                            }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Lista de vinos:</td>
                                                    <td>
                                                        <?php if($get_restaurant['rest_wine_list'] == 1): ?>
                                                            <span class="glyphicon glyphicon-ok statusOk"></span>
                                                        <?php elseif($get_restaurant['rest_wine_list'] == 0): ?>
                                                            <span class="glyphicon glyphicon-remove attention"></span>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Licores nacionales:</td>
                                                    <td>
                                                        <?php if($get_restaurant['rest_domestic_lic'] == 1): ?>
                                                            <span class="glyphicon glyphicon-ok statusOk"></span>
                                                        <?php elseif($get_restaurant['rest_domestic_lic'] == 0): ?>
                                                            <span class="glyphicon glyphicon-remove attention"></span>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Licores importados:</td>
                                                    <td>
                                                        <?php if($get_restaurant['rest_import_lic'] == 1): ?>
                                                            <span class="glyphicon glyphicon-ok statusOk"></span>
                                                        <?php elseif($get_restaurant['rest_import_lic'] == 0): ?>
                                                            <span class="glyphicon glyphicon-remove attention"></span>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Sala de eventos:</td>
                                                    <td>
                                                        <?php if($get_restaurant['rest_event_hall'] == 1): ?>
                                                            <span class="glyphicon glyphicon-ok statusOk"></span>
                                                        <?php elseif($get_restaurant['rest_event_hall'] == 0): ?>
                                                            <span class="glyphicon glyphicon-remove attention"></span>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Men&uacute; para ni&ntilde;os:</td>
                                                    <td>
                                                        <?php if($get_restaurant['rest_kids_menu'] == 1): ?>
                                                            <span class="glyphicon glyphicon-ok statusOk"></span>
                                                        <?php elseif($get_restaurant['rest_kids_menu'] == 0): ?>
                                                            <span class="glyphicon glyphicon-remove attention"></span>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Tarjetas aceptadas:</td>
                                                    <td>
                                                        <img src="/images/visa.png" /> <img src="/images/mastercard.png" /> <img src="/images/amex.png" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Parqueo privado:</td>
                                                    <td>
                                                        <?php if($get_restaurant['rest_parking'] == 1): ?>
                                                            <span class="glyphicon glyphicon-ok statusOk"></span>
                                                        <?php elseif($get_restaurant['rest_parking'] == 0): ?>
                                                            <span class="glyphicon glyphicon-remove attention"></span>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                
    								        </tbody>
    								    </table>
    								</div>
								</div>
							</div>
							<div class="tab-pane" id="restGallery">
								<div id="carousel-example-generic" class="carousel slide">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="item active">
                                            <img src="/images/galleries/1000/1000_01.jpg">
                                        </div>
                                         <div class="item">
                                            <img src="/images/galleries/1000/1000_02.jpg">
                                        </div>
                                         <div class="item">
                                            <img src="/images/galleries/1000/1000_03.jpg">
                                        </div>
                                         <div class="item">
                                            <img src="/images/galleries/1000/1000_04.jpg">
                                        </div>
                                         <div class="item">
                                            <img src="/images/galleries/1000/1000_05.jpg">
                                        </div>
                                    </div>
                                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"> <span class="icon-prev"></span> </a>
                                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next"> <span class="icon-next"></span> </a>
                                </div>
							</div>
							<div class="tab-pane" id="restMenu">menu</div>
							<div class="tab-pane" id="restEvents">
								<div class="row">
									<div id="restEventCalendar" class="col-lg-4">
										<?=$generate_calendar?>
									</div>
									<div id="eventDescWrapper" class="col-lg-8">
										<?php if($get_events): ?>
										<?php
	                                        setlocale(LC_TIME, "es_ES"); 
	                                        $event_date_time = strftime("%e de %B, %Y", mktime(0, 0, 0, $get_events['event_month'], $get_events['event_day'], $get_events['event_year']));
	                                    ?>
									    <div class="eventDescription lightBg">
    										<img src="/images/events/<?=$get_events['rest_id']?>/<?=$get_events['event_id']?>.jpg" style="display:none;" />
    										<img src="http://lorempixel.com/g/535/210/food/Su-evento-aqui/">
    										<h4><?=$get_events['event_name']?></h4>
    										<h5><?=$event_date_time.' a las '.date("g:i a", strtotime($get_events['event_time']))?>.</h5>
    										<p>
    										    <?=$get_events['event_category']?>.<br /><br />
                                                <?=$get_events['event_details']?><br />
    										</p>
				                            <div class="actions">
		                                    	<div class="col-lg-12">
				                                    <?php 
				                                    $user_has_reservation = false;
				                                    	if ($get_user_reservations){
						                                    foreach($get_user_reservations as $get_user_reservations_row){
						                                    	if($get_events['event_id'] == $get_user_reservations_row->event_id){
						                                    		$user_has_reservation = true;
						                                    	}
						                                    }
				                                    	}
				                                    ?>
				                                    <?php if($user_has_reservation): ?>
				                                    	<div class="col-lg-4">
				                                    		<a href="/profile/reservations/<?=$get_events['event_id']?>" class="btn btn-primary pull-right">
								    							Ver Reservaci&oacute;n
								    						</a>
				                                    	</div>
				                                    	<div class="col-lg-4">
					                                        <a href="#changeReservationModal" class="btn btn-warning pull-right changeReservation" data-restid="<?=$get_events['rest_id']?>" data-eventid="<?=$get_events['event_id']?>" data-toggle="modal" >
								    							Cambiar Reservaci&oacute;n
								    						</a>
							    						</div>
							    						<div class="col-lg-4">
								    						<a href="#cancelReservation" class="btn btn-danger pull-right cancelReservation" data-eventid="<?=$get_events['event_id']?>" data-toggle="modal" >
								    							Cancelar Reservaci&oacute;n
								    						</a>
							    						</div>
				                                    <?php elseif (!$user_has_reservation): ?>
				                                    	<a class="btn btn-primary pull-right rsvpEvent" data-restid="<?=$get_events['rest_id']?>" data-eventid="<?=$get_events['event_id']?>" data-toggle="modal" href="#rsvpEvent">
						                                    Solicitar reservaci&oacute;n para este evento
						                                    <span class="glyphicon glyphicon-cutlery"></span>
						                                </a>
				                                    <?php endif;?>
		                                    	</div>
                                    		</div>
										</div>
										<?php elseif(!$get_events): ?>
											<div class="eventDescription">
												No hay eventos programados este mes.
											</div>
										<?php endif; ?>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="restReviews">
								<div class="row">
									<div class="col-lg-12">
										<div class="col-lg-6">
											<h3>Opiniones de los clientes</h3>
											<p class="small">
												Filtrar:
												<button type="button" class="btn btn-default btn-xs scoreCatShowAll">Todas</button>
												<button data-scorecat="highRating" type="button" class="btn btn-primary btn-xs scoreCat">Altas</button>
												<button data-scorecat="midRating" type="button" class="btn btn-warning btn-xs scoreCat">Medias</button>
												<button data-scorecat="lowRating" type="button" class="btn btn-danger btn-xs scoreCat">Bajas</button>
											</p>
										</div>
										<div class="col-lg-6">
											<a class="btn btn-primary pull-right makeComment" data-restid="1000" data-toggle="modal" href="#createReview">
												D&eacute; su opinion
												<span class="glyphicon glyphicon-comment"></span>
											</a>
										</div>
									</div>
									<?php if ($get_user_ratings):?>
										<?php foreach ($get_user_ratings as $get_user_ratings_row):?>
											<?php
				                            	setlocale(LC_TIME, "es_ES");
				                                $break_date = explode('-', $get_user_ratings_row->rating_date);
				                                $rating_date = strftime("%e de %B, %Y", mktime(0, 0, 0, $break_date[1], $break_date[2], $break_date[0]));
				                            ?>
											<div class="userRating lightBg col-lg-12">
												<div class="col-lg-12">
													<div class="col-lg-7"><h4>Opinion de <?=$get_user_ratings_row->user_name." en ".$get_user_ratings_row->user_province?>:</h4></div>
													<div class="col-lg-5"><h4 class="pull-right">Fecha: <?=$rating_date?></h4></div>
												</div>
												<div class="col-lg-12">
													<div class="col-lg-6 custReview">
														<p><?=$get_user_ratings_row->user_review?></p>
													</div>
													<div class="col-lg-3 custScores">
														<h6>Criterios:</h6>
														<ul>
															<li>Comida: <span class="restUserScore pull-right"><?=$get_user_ratings_row->rating_food?></span></li>
															<li>Servicio: <span class="restUserScore pull-right"><?=$get_user_ratings_row->rating_service?></span></li>
															<li>Ambiente: <span class="restUserScore pull-right"><?=$get_user_ratings_row->rating_ambient?></span></li>
															<li>Precios: <span class="restUserScore pull-right"><?=$get_user_ratings_row->rating_prices?></span></li>
															<li>Limpieza: <span class="restUserScore pull-right"><?=$get_user_ratings_row->rating_clean?></span></li>
														</ul>
													</div>
													<div class="col-lg-3 custScore">
														<h6>Calificaci&oacute;n de <?=$get_user_ratings_row->user_name?></h6>
														<?php 
															$rating_formatted = $get_user_ratings_row->rating_average;
															$rating_level = "";
															if($rating_formatted < 3){
																$rating_level = "lowRating";
															}elseif ($rating_formatted >= 3 && $rating_formatted < 4){
																$rating_level = "midRating";
															}elseif ($rating_formatted >= 4){
																$rating_level = "highRating";
															}
															if(strlen($rating_formatted) == 1){
																$rating_formatted = $get_user_ratings_row->rating_average.".0";
															}
														?>
														<p class="<?=$rating_level?>"><?=$rating_formatted?></p>
													</div>
												</div>
											</div>
										<?php endforeach;?>
										<div class="col-lg-12"><?php echo $this->pagination->create_links(); ?></div>
									<?php elseif (!$get_user_ratings):?>
										<h4>Nadie ha dado su opini&oacute;n acerca de este restaurante.</h4>
									<?php endif;?>
								</div>
							</div>
							<div class="tab-pane" id="restRatings">
								<table>
									<colgroup>
										<col width="20%" />
										<col width="20%" />
										<col width="20%" />
										<col width="20%" />
										<col width="20%" />
									</colgroup>
									<thead>
										<tr>
											<th>Total general de calificaciones</th>
											<th>Total de calificaciones bajas</th>
											<th>Total de calificaciones medias</th>
											<th>Total de calificaciones altas</th>
											<th>Calificacion promedio</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="custScore">
												<p><?=$count_user_ratings ?></p>
											</td>
											<td class="custScore">
												<p class="lowRating"><?=$count_low_user_ratings ?></p>
											</td>
											<td class="custScore">
												<p class="midRating"><?=$count_mid_user_ratings ?></p>
											</td>
											<td class="custScore">
												<p class="highRating"><?=$count_high_user_ratings ?></p>
											</td>
											<td class="custScore">
												<?php 
													$average_rating = number_format($average_user_ratings['AVG(rating_average)'], 1);
													if($average_rating < 3){
														$rating_level = "lowRating";
													}elseif ($average_rating >= 3 && $average_rating < 4){
														$rating_level = "midRating";
													}elseif ($average_rating >= 4){
														$rating_level = "highRating";
													}
												?>
												<p class="<?=$rating_level?>"><?=$average_rating?></p>
											</td>
										</tr>
									</tbody>
									<tfoot>
										<tr>
											<td>&nbsp;</td>
											<td><a href="#restReviews" class="btn btn-danger jumpToReviews preventDefault" data-review="lowRating">Ver calificaciones</a></td>
											<td><a href="#restReviews" class="btn btn-warning jumpToReviews preventDefault" data-review="midRating">Ver calificaciones</a></td>
											<td><a href="#restReviews" class="btn btn-primary jumpToReviews preventDefault" data-review="highRating">Ver calificaciones</a></td>
											<td>&nbsp;</td>
										</tr>
									</tfoot>
								</table>
							</div>
							<div class="tab-pane" id="restServices">
							    <span>Ofrecemos los siguientes servicios adicionales:</span><br /><br />
							    <ul>
							        <li>Sal&oacute;n privado para bodas, quincea&ntilde;os, almuerzos ejecutivos</li>
							        <li>Catering estilo buffet o a la carta</li>
							        <li>Otros servicios</li>
							        <li>Otros servicios</li>
							        <li>Otros servicios</li><br />
							    </ul>
							</div>
							<div class="tab-pane" id="restInfo">
							    <table cellpadding="0" cellspacing="0" width="100%" border="0">
                                    <colgroup>
                                        <col width="30%"/>
                                        <col width="70%"/>
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td>Tel&eacute;fono:</td>
                                            <td><?=$get_restaurant['rest_phone']?></td>
                                        </tr>
                                        <tr>
                                            <td>Direcci&oacute;n:</td>
                                            <td>
                                                <?=$get_restaurant['rest_district']." de ".$get_restaurant['rest_county'].", ".$get_restaurant['rest_province']?><br />
                                                <?=$get_restaurant['rest_address']?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Email:</td>
                                            <td><?=$get_restaurant['rest_email']?></td>
                                        </tr>
                                        <tr>
                                            <td>P&aacute;gina web:</td>
                                            <td><?=$get_restaurant['rest_website']?></td>
                                        </tr>
                                        <tr>
                                            <td>P&aacute;gina en Facebook:</td>
                                            <td><?=$get_restaurant['rest_fb_page']?></td>
                                        </tr>
                                        <tr>
                                            <td>Fax:</td>
                                            <td><?=$get_restaurant['rest_fax']?></td>
                                        </tr>
                                        <tr>
                                            <td>Horario:</td>
                                            <td><?=$get_restaurant['rest_hours']?></td>
                                        </tr>
                                    </tbody>
                                </table>
							</div>
						</div>
						<?php elseif(!$get_restaurant): ?>
							this restaurant does not exist
						<?php endif; ?>
					</div>
				</div>
				<div class="col-lg-3"></div>
			</div>
		</div>
	</div>
</div>
