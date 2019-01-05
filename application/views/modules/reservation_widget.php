								<div class="searchWidget">
        				            <h3><?=$this->lang->line('search_widget_title')?></h3>
        				            <form class="registerForm" action="/profile/reservations" method="post" data-bubble-pos="top" data-required-login="true" novalidate="novalidate">
                                        <fieldset>
                                        
                                                <div class="col-lg-12">
                                                    <div class="form-group searchWidgetFlyoutWrapper">
                                                        <label><?=$this->lang->line('search_widget_label1')?></label>
                                                        <input id="searchWidgetName" class="form-control input-sm searchWidgetName" type="text" placeholder="<?=$this->lang->line('search_widget_placeholder1')?>" required="required">
                                                        <!--<label><?=$this->lang->line('search_widget_label2')?></label>
                                                        <input type="text" placeholder="<?=$this->lang->line('search_widget_placeholder2')?>">-->
                                                        <div class="searchWidgetFlyout">
                                                        	<ul class="searchWidgetListResult"></ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <label><?=$this->lang->line('search_widget_label3')?></label>
                                                                <div class="input-group">
                                                                	<?php setlocale(LC_MONETARY, 'es_CR'); ?>
                                                                    <input id="reservationWidgetDate" class="form-control input-sm" type="date" placeholder="<?=$this->lang->line('search_widget_placeholder3')?>" required="required" min="<?=date('Y-m-d')?>" max="<?=date('Y-m-d', strtotime('+365 days'))?>">
                                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="col-lg-12">
                                                	<div class="col-lg-5">
                                                    	<div class="form-group">
                                                        	<label><?=$this->lang->line('search_widget_label4')?></label>
                                                            <div class="input-group">
                                                            	<input id="reservationWidgetTime" class="form-control input-sm" type="time" placeholder="<?=$this->lang->line('search_widget_placeholder4')?>" required="required">
                                                                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label><?=$this->lang->line('search_widget_label5')?></label>
                                                                <input id="reservationWidgetParty" class="form-control input-sm" type="number" placeholder="<?=$this->lang->line('search_widget_placeholder5')?>" required="required">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6"></div>
                                                </div>
                                                <div class="col-lg-12">
                                                	<div class="col-lg-12">
                                                    	<input id="reservationWidgetSubmit" type="submit" class="btn btn-primary btn-lg" value="<?=$this->lang->line('search_widget_submit')?>" />
                                                    </div>
                                                </div>
                                        </fieldset>
                                    </form>
                                    <small><?=$this->lang->line('search_widget_disclaimer')?></small>
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
