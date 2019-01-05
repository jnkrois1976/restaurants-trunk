		<div class="modal fade" id="cancelReservation">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form class="cancelReservationForm" action="/reservations/cancel" method="post" novalidate="novalidate" data-bubble-pos="top">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-user"></span> Cancelar Reservaci&oacute;n</h4>
                        </div>
                        <div class="modal-body">
                            <fieldset>
                                <input type="hidden" value="" name="eventId" id="cancelEventId" />
                                <div class="row">
                                    <div class="col-lg-8">
                                    	Esta seguro que desea cancelar la reservaci&oacute;n?
                                    </div>
                                    <div class="col-lg-4">&nbsp;</div>
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
                            <input id="cancelReservationRequest" type="submit" class="btn btn-danger" value="Cancelar Reservaci&oacute;n" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="cancelReservationSuccess">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Y&aacute; solicit&eacute cancelar su reservaci&oacute;n &nbsp;&nbsp;<span class="glyphicon glyphicon-ok statusOk"></span></h4>
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
					</div>
				</div>
			</div>
		</div>