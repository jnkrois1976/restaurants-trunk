		<div class="modal fade" id="createReview">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form class="createReviewForm" action="/profile/create_review" method="post" novalidate="novalidate" data-bubble-pos="top" data-required-login="true">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-user"></span> Agregar su opini&oacute;n</h4>
                        </div>
                        <div class="modal-body">
                            <fieldset>
                                <input type="hidden" value="<?=$this->uri->segment(3, 0)?>" name="reviewRestId" id="reviewRestId" />
                                <input type="hidden" value="<?=$this->session->userdata('user_id')?>" name="reviewUserId" id="reviewUserId" />
                                <input type="hidden" value="<?=$this->session->userdata('member_name')?>" name="reviewUserName" id="reviewUserName" />
                                <input type="hidden" value="<?=$this->session->userdata('user_province')?>" name="reviewUserProvince" id="reviewUserProvince" />
                                <input type="hidden" value="<?=date('Y-m-d')?>" name="reviewDate" id="reviewDate" />
                                    <div class="col-lg-12">
                                    	<h4>Que le pareci&oacute; este restaurante?</h4>
                                    	<textarea id="userReview" class="form-control" rows="3" placeholder="Digite su comentario..." required="required"></textarea>
                                    	<div class="col-lg-9 sliderWrapper">
											<label for="rateFood">Que tal estuvo la comida?</label>
											<input type="text" id="rateFood" readonly style="display:none;border:0; color:#f6931f; font-weight:bold;">
											<div class="col-lg-12">
												<table width="100%">
													<colgroup>
														<col width="20%">
														<col width="60%">
														<col width="20%">
													</colgroup>
													<tr>
														<td>P&eacute;sima</td>
														<td>
															<div id="sliderFood">
																<table class="visualRange">
																	<colgroup>
																		<col width="5%">
																		<col width="40%">
																		<col width="10%">
																		<col width="40%">
																		<col width="5%">
																	</colgroup>
																	<tr>
																		<td class="first">1</td>
																		<td>2</td>
																		<td>3</td>
																		<td>4</td>
																		<td class="last">5</td>
																	</tr>
																</table>
															</div>
														</td>
														<td align="right">Excelente</td>
													</tr>
												</table>
											</div>
										</div>
										<div class="col-lg-9 sliderWrapper">
											<label for="rateService">Que tal estuvo el servicio?</label>
											<input type="text" id="rateService" readonly style="display:none;border:0; color:#f6931f; font-weight:bold;">
											<div class="col-lg-12">
												<table width="100%">
													<colgroup>
														<col width="20%">
														<col width="60%">
														<col width="20%">
													</colgroup>
													<tr>
														<td>P&eacute;simo</td>
														<td>
															<div id="sliderService">
																<table class="visualRange">
																	<colgroup>
																		<col width="5%">
																		<col width="40%">
																		<col width="10%">
																		<col width="40%">
																		<col width="5%">
																	</colgroup>
																	<tr>
																		<td class="first">1</td>
																		<td>2</td>
																		<td>3</td>
																		<td>4</td>
																		<td class="last">5</td>
																	</tr>
																</table>
															</div>
														</td>
														<td align="right">Excelente</td>
													</tr>
												</table>
											</div>
										</div>
										<div class="col-lg-9 sliderWrapper">
											<label for="rateAmbient">Que tal estuvo el ambiente?</label>
											<input type="text" id="rateAmbient" readonly style="display:none;border:0; color:#f6931f; font-weight:bold;">
											<div class="col-lg-12">
												<table width="100%">
													<colgroup>
														<col width="20%">
														<col width="60%">
														<col width="20%">
													</colgroup>
													<tr>
														<td>P&eacute;simo</td>
														<td>
															<div id="sliderAmbient">
																<table class="visualRange">
																	<colgroup>
																		<col width="5%">
																		<col width="40%">
																		<col width="10%">
																		<col width="40%">
																		<col width="5%">
																	</colgroup>
																	<tr>
																		<td class="first">1</td>
																		<td>2</td>
																		<td>3</td>
																		<td>4</td>
																		<td class="last">5</td>
																	</tr>
																</table>
															</div>
														</td>
														<td align="right">Excelente</td>
													</tr>
												</table>
											</div>
										</div>
										<div class="col-lg-9 sliderWrapper">
											<label for="ratePrices">Que le parecieron los precios?</label>
											<input type="text" id="ratePrices" readonly style="display:none;border:0; color:#f6931f; font-weight:bold;">
											<div class="col-lg-12">
												<table width="100%">
													<colgroup>
														<col width="20%">
														<col width="60%">
														<col width="20%">
													</colgroup>
													<tr>
														<td>Buenos</td>
														<td>
															<div id="sliderPrices">
																<table class="visualRange">
																	<colgroup>
																		<col width="5%">
																		<col width="40%">
																		<col width="10%">
																		<col width="40%">
																		<col width="5%">
																	</colgroup>
																	<tr>
																		<td class="first">1</td>
																		<td>2</td>
																		<td>3</td>
																		<td>4</td>
																		<td class="last">5</td>
																	</tr>
																</table>
															</div>
														</td>
														<td align="right">Muy altos</td>
													</tr>
												</table>
											</div>
										</div>
										<div class="col-lg-9 sliderWrapper">
											<label for="rateClean">Que le parecio la limpieza?</label>
											<input type="text" id="rateClean" readonly style="display:none;border:0; color:#f6931f; font-weight:bold;">
											<div class="col-lg-12">
												<table width="100%">
													<colgroup>
														<col width="20%">
														<col width="60%">
														<col width="20%">
													</colgroup>
													<tr>
														<td>P&eacute;sima</td>
														<td>
															<div id="sliderClean">
																<table class="visualRange">
																	<colgroup>
																		<col width="5%">
																		<col width="40%">
																		<col width="10%">
																		<col width="40%">
																		<col width="5%">
																	</colgroup>
																	<tr>
																		<td class="first">1</td>
																		<td>2</td>
																		<td>3</td>
																		<td>4</td>
																		<td class="last">5</td>
																	</tr>
																</table>
															</div>
														</td>
														<td align="right">Excelente</td>
													</tr>
												</table>
											</div>
										</div>
                                    </div>
                            </fieldset>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                <?=$this->lang->line('button_modal_close')?> <span class="glyphicon glyphicon-remove"></span>
                            </button>
                            <input id="createUserReview" type="submit" class="btn btn-primary" value="Agregar Opini&oacute;n" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="createReviewSuccess">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Y&aacute; agregu&eacute; su opini&oacute;n &nbsp;&nbsp;<span class="glyphicon glyphicon-ok statusOk"></span></h4>
					</div>
					<div class="modal-body">
						<p>
							<small>Gracias</small>
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