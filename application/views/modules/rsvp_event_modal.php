		<div class="modal fade" id="rsvpEvent">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form class="rsvpEventForm" action="/reservations/request" method="post" novalidate="novalidate" data-bubble-pos="top">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-user"></span> Para cuantas personas?</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row" id="eventLocationTime"></div>
                            <fieldset>
                                <input type="hidden" value="" name="restId" id="restId" />
                                <input type="hidden" value="" name="eventId" id="eventId" />
                                <label>Para cuantas personas desea la reservaci&oacute;n?</label>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input class="form-control input" type="number" value="2" name="eventGuests" id="eventGuests" placeholder="<?=$this->lang->line('search_widget_placeholder5')?>" required="required">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-plus"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">&nbsp;</div>
                                </div>
                                <div class="row">
                                    <small>Su reservación será confirmada por el restaurante.</small>
                                </div>
                            </fieldset>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                <?=$this->lang->line('button_modal_close')?> <span class="glyphicon glyphicon-remove"></span>
                            </button>
                            <input id="eventReservationRequest" type="submit" class="btn btn-primary" value="Solicitar" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="reservationSuccess">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Y&aacute; solicit&eacute; la reservaci&oacute;n &nbsp;&nbsp;<span class="glyphicon glyphicon-ok statusOk"></span></h4>
					</div>
					<div class="modal-body">
						<p>
							Solicit&eacute; una reservaci&oacute;n para el restaurante 
							<span id="restName"></span>, para <span id="party"></span> personas a las 
							<span id="time"></span> del <span id="date"></span>.
							<br /><br />
							<small><?=$this->lang->line('search_widget_disclaimer')?></small>
						</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">
							<?=$this->lang->line('button_modal_close')?> <span class="glyphicon glyphicon-remove"></span>
						</button>
						<a href="/profile/reservations" class="btn btn-primary pull-right">
							Ver la reservaci&oacute;n 
							<span class="glyphicon glyphicon-glass"></span>
						</a>
					</div>
				</div>
			</div>
		</div>