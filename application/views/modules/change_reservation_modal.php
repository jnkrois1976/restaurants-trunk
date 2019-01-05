		<div class="modal fade" id="changeReservationModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form class="changeReservationForm" action="/reservations/request" method="post" novalidate="novalidate" data-bubble-pos="top">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-user"></span> Cambiar Reservaci&oacute;n</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row" id="eventLocationTime"></div>
                            <fieldset>
                                <input type="hidden" value="" name="eventId" id="changeEventId" />
                                <label>Para cuantas personas desea la reservaci&oacute;n?</label>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input class="form-control input" type="number" value="2" name="ventGuests" id="changeEventGuests" placeholder="<?=$this->lang->line('search_widget_placeholder5')?>" required="required">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-plus"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">&nbsp;</div>
                                </div>
                                <div class="row">
                                	<div class="col-lg-12">
                                    	<div class="col-lg-4">
                                        	<div class="form-group">
                                            	<label><?=$this->lang->line('search_widget_label4')?></label>
                                                <div class="input-group">
                                                	<input id="changeEventTime" class="form-control input" type="time" placeholder="<?=$this->lang->line('search_widget_placeholder4')?>" required="required">
                                                	<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                            	</div>
                                        	</div>
                                     	</div>
                                	</div>
                                </div>
                                <div class="row">
                                    <small>El cambio de su reservación será confirmado por el restaurante.</small>
                                </div>
                            </fieldset>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                <?=$this->lang->line('button_modal_close')?> <span class="glyphicon glyphicon-remove"></span>
                            </button>
                            <input id="changeReservationRequest" type="submit" class="btn btn-primary" value="Solicitar cambio" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="changeReservationSuccess">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Y&aacute; solicit&eacute; el cambio de la reservaci&oacute;n &nbsp;&nbsp;<span class="glyphicon glyphicon-ok statusOk"></span></h4>
					</div>
					<div class="modal-body">
						<p>
							<small><?=$this->lang->line('search_widget_disclaimer')?></small>
						</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">
							<?=$this->lang->line('button_modal_close')?> <span class="glyphicon glyphicon-remove"></span>
						</button>
						<a href="" class="btn btn-primary pull-right" id="viewChangedReservation">
							Ver la reservaci&oacute;n 
							<span class="glyphicon glyphicon-glass"></span>
						</a>
					</div>
				</div>
			</div>
		</div>