<div class="container mainWrapper">
	<div class="container mainContent lightBg">
		<div class="row dashboardWrapper">
			<div class="col-lg-12">
				<div class="col-lg-6"><h3><?=$this->lang->line('profile_generic_greeting').' '.$this->session->userdata('member_name')?></h3></div>
				<div class="col-lg-6"><span class="pull-right"><h3><?=$this->lang->line('headline_dashboard')?></h3></span></div>
			</div>
			<?php if($data['user_query']['user_type'] == 'patron'): ?>
			    <div class="col-lg-12 dashBoxes">
    				<div class="col-lg-3">
    					<div class="insideCol lightBgInverted">
    						<h4><?=$this->lang->line('headline_my_reservations')?> <span class="glyphicon glyphicon-calendar"></span></h4>
    						<hr />
    						<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table table-striped">
    							<colgroup>
    								<col width="70%" />
    								<col width="30%" align="left" />
    							</colgroup>
    							<tbody>
    								<tr>
    									<td><?=$this->lang->line('dashboard_item1')?></td>
    									<td id="confirmedReservation" class="counterOk dashboxCounter">1</td>
    								</tr>
    								<tr>
    									<td><?=$this->lang->line('dashboard_item2')?></td>
    									<td id="requestedReservation" class="counterAttention dashboxCounter">2</td>
    								</tr>
    								<tr>
    									<td><?=$this->lang->line('dashboard_item3')?></td>
    									<td id="pastReservation" class="dashboxCounter">5</td>
    								</tr>
    							</tbody>
    						</table>
    						<a href="/profile/reservations" class="btn btn-primary">
    							<?=$this->lang->line('link_dash_reservations')?><span class="glyphicon glyphicon-eye-open"></span>
    						</a>
    					</div>
    				</div>
    				<div class="col-lg-3">
    					<div class="insideCol lightBgInverted">
    						<h4><?=$this->lang->line('headline_my_comments')?><span class="glyphicon glyphicon-comment"></span></h4>
    						<hr />
    						<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table table-striped">
    							<colgroup>
    								<col width="70%" />
    								<col width="30%" align="left" />
    							</colgroup>
    							<tbody>
    								<tr>
    									<td><?=$this->lang->line('dashboard_item4')?></td>
    									<td id="confirmedReservation" class="counterOk dashboxCounter">1</td>
    								</tr>
    								<tr>
    									<td><?=$this->lang->line('dashboard_item5')?></td>
    									<td id="requestedReservation" class="counterAttention dashboxCounter">2</td>
    								</tr>
    								<tr>
    									<td><?=$this->lang->line('dashboard_item6')?></td>
    									<td id="pastReservation" class="dashboxCounter">5</td>
    								</tr>
    							</tbody>
    						</table>
    						<a href="#" class="btn btn-primary">
    							<?=$this->lang->line('link_dash_comments')?><span class="glyphicon glyphicon-eye-open"></span>
    						</a>
    					</div>
    				</div>
    				<div class="col-lg-3">
    					<div class="insideCol lightBgInverted">
    						<h4><?=$this->lang->line('headline_my_favorites')?></span></h4>
    						<hr />
    						<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table table-striped">
    							<colgroup>
    								<col width="70%" />
    								<col width="30%" align="left" />
    							</colgroup>
    							<tbody>
    								<tr>
    									<td><?=$this->lang->line('dashboard_item7')?></td>
    									<td id="confirmedReservation" class="counterOk dashboxCounter">1</td>
    								</tr>
    								<tr>
    									<td><?=$this->lang->line('dashboard_item8')?></td>
    									<td id="requestedReservation" class="counterAttention dashboxCounter">2</td>
    								</tr>
    								<tr>
    									<td><?=$this->lang->line('dashboard_item9')?></td>
    									<td id="requestedReservation" class="dashboxCounter">2</td>
    								</tr>
    							</tbody>
    						</table>
    						<a href="#" class="btn btn-primary">
    							<?=$this->lang->line('link_dash_favorites')?><span class="glyphicon glyphicon-glass"></span>
    						</a>
    					</div>
    				</div>
    				<div class="col-lg-3">
    					<div class="insideCol lightBgInverted">
    						<h4><?=$this->lang->line('headline_my_profile')?><span class="glyphicon glyphicon-user"></span></h4>
    						<hr />
    						<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table table-striped">
                                <colgroup>
                                    <col width="70%" />
                                    <col width="30%" align="left" />
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td><?=$this->lang->line('dashboard_item10')?></td>
                                        <td height="88"><?=$data['user_query']['user_fullname']?></td>
                                    </tr>
                                    <tr>
                                        <td><?=$this->lang->line('dashboard_item11')?></td>
                                        <td height="88"><?=$data['user_query']['user_email']?></td>
                                    </tr>
                                    <tr>
                                        <td><?=$this->lang->line('dashboard_item13')?></td>
                                        <td height="88"><?=$data['user_query']['user_province']?></td>
                                    </tr>
                                </tbody>
                            </table>
    						<a href="/profile/user" class="btn btn-primary">
    							<?=$this->lang->line('link_dash_profile')?><span class="glyphicon glyphicon-pencil"></span>
    						</a>
    					</div>
    				</div>
				</div>
			<?php elseif($data['user_query']['user_type'] == 'restaurant'): ?>
			    <div class="col-lg-12 dashBoxes">
    				<div class="col-lg-3">
    					<div class="insideCol lightBgInverted">
    						<h4><?=$this->lang->line('headline_rest_reservations')?> <span class="glyphicon glyphicon-calendar"></span></h4>
    						<hr />
    						<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table table-striped">
                                <colgroup>
                                    <col width="70%" />
                                    <col width="30%" align="left" />
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td><?=$this->lang->line('dashboard_item1')?></td>
                                        <td id="confirmedReservation" class="counterOk dashboxCounter">1</td>
                                    </tr>
                                    <tr>
                                        <td><?=$this->lang->line('dashboard_item2')?></td>
                                        <td id="requestedReservation" class="counterAttention dashboxCounter">2</td>
                                    </tr>
                                    <tr>
                                        <td><?=$this->lang->line('dashboard_item3')?></td>
                                        <td id="pastReservation" class="dashboxCounter">5</td>
                                    </tr>
                                </tbody>
                            </table>
    					</div>
    				</div>
    				<div class="col-lg-3">
    					<div class="insideCol lightBgInverted">
    						<h4><?=$this->lang->line('headline_rest_comments')?><span class="glyphicon glyphicon-comment"></span></h4>
    						<hr />
    						<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table table-striped">
                                <colgroup>
                                    <col width="70%" />
                                    <col width="30%" align="left" />
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td><?=$this->lang->line('dashboard_item4')?></td>
                                        <td id="confirmedReservation" class="counterOk dashboxCounter">1</td>
                                    </tr>
                                    <tr>
                                        <td><?=$this->lang->line('dashboard_item5')?></td>
                                        <td id="requestedReservation" class="counterAttention dashboxCounter">2</td>
                                    </tr>
                                    <tr>
                                        <td><?=$this->lang->line('dashboard_item6')?></td>
                                        <td id="pastReservation" class="dashboxCounter">5</td>
                                    </tr>
                                </tbody>
                            </table>
    					</div>
    				</div>
    				<div class="col-lg-3">
    					<div class="insideCol lightBgInverted">
    						<h4><?=$this->lang->line('headline_rest_profile')?></h4>
    						<hr />
    						<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table table-striped">
                                <colgroup>
                                    <col width="70%" />
                                    <col width="30%" align="left" />
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td><?=$this->lang->line('dashboard_item14')?></td>
                                        <td id="confirmedReservation" class="counterOk dashboxCounter">1</td>
                                    </tr>
                                    <tr>
                                        <td><?=$this->lang->line('dashboard_item15')?></td>
                                        <td id="requestedReservation" class="counterAttention dashboxCounter">2</td>
                                    </tr>
                                    <tr>
                                        <td><?=$this->lang->line('dashboard_item16')?></td>
                                        <td id="requestedReservation" class="dashboxCounter">2</td>
                                    </tr>
                                </tbody>
                            </table>
    					</div>
    				</div>
    				<div class="col-lg-3">
    					<div class="insideCol lightBgInverted">
    						<h4><?=$this->lang->line('headline_rest_userinfo')?><span class="glyphicon glyphicon-user"></span></h4>
    						<hr />
    						<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table table-striped">
                                <colgroup>
                                    <col width="70%" />
                                    <col width="30%" align="left" />
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td><?=$this->lang->line('dashboard_item10')?></td>
                                        <td height="88"><?=$data['user_query']['user_fullname']?></td>
                                    </tr>
                                    <tr>
                                        <td><?=$this->lang->line('dashboard_item11')?></td>
                                        <td height="88"><?=$data['user_query']['user_email']?></td>
                                    </tr>
                                    <tr>
                                        <td><?=$this->lang->line('dashboard_item13')?></td>
                                        <td height="88"><?=$data['user_query']['user_province']?></td>
                                    </tr>
                                </tbody>
                            </table>
    					</div>
    				</div>
				</div>
				<div class="col-lg-12">&nbsp;</div>
				<div class="col-lg-12 centerContent">
			        <a href="http://admin.restaurantes506.com/" class="btn btn-primary btn-lg allCaps">
                        <?=$this->lang->line('link_dash_admin_console')?> <span class="glyphicon glyphicon-cog"></span>
                    </a>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
