<?php

    if($data['user_query']['user_type'] == 'patron'){
        $user_type = $this->lang->line('profile_usertype1');
    }elseif($data['user_query']['user_type'] == 'restaurant'){
        $user_type = $this->lang->line('profile_usertype2');
    }

?>
<div class="container mainWrapper">
	<div class="container mainContent lightBg">
		<div class="row profileWrapper">
			<div class="col-lg-12">
                <div class="col-lg-6"><h3><?=$this->lang->line('profile_generic_greeting').' '.$this->session->userdata('member_name')?></h3></div>
                <div class="col-lg-6"><span class="pull-right"><h3><?=$this->lang->line('headline_my_profile')?></h3></span></div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-8">
                    <table class="table table-striped table-bordered table-hover" cellpadding="0" cellspacing="0" border="0" width="100%">
                        <colgroup>
                            <col width="30%" />
                            <col width="50%" />
                            <col width="20%" />
                        </colgroup>
                        <thead>
                            <?php if($data['user_query']['user_profilestatus'] == 0): ?>
                            <tr class="attnBlock attentionBg">
                                <th colspan="3" class="centerContent">
                                    <?=$this->lang->line('attention_profile_incomplete')?>
                                </th>
                            </tr>
                            <?php endif; ?>
                            <tr>
                                <th colspan="3">
                                    <?=$this->lang->line('headline_user_info')?>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?=$this->lang->line('label_profile_id')?></td>
                                <td><?=$data['user_query']['user_id']?></td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td><?=$this->lang->line('label_profile_category')?></td>
                                <td><?=$user_type?></td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td><?=$this->lang->line('label_profile_fname')?></td>
                                <td><?=$data['user_query']['user_fname']?></td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td><?=$this->lang->line('label_profile_mname')?></td>
                                <td><?=$data['user_query']['user_mname']?></td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td><?=$this->lang->line('label_profile_lname1')?></td>
                                <td><?=$data['user_query']['user_lname1']?></td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td><?=$this->lang->line('label_profile_lname2')?></td>
                                <td><?=$data['user_query']['user_lname2']?></td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td><?=$this->lang->line('label_profile_email')?></td>
                                <td><?=$data['user_query']['user_email']?></td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td><?=$this->lang->line('label_profile_phone')?></td>
                                <td><?=$data['user_query']['user_phone']?></td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td><?=$this->lang->line('label_profile_fax')?></td>
                                <td><?=$data['user_query']['user_fax']?></td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td><?=$this->lang->line('label_profile_province')?></td>
                                <td><?=$data['user_query']['user_province']?></td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td><?=$this->lang->line('label_profile_county')?></td>
                                <td><?=$data['user_query']['user_county']?></td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td><?=$this->lang->line('label_profile_district')?></td>
                                <td><?=$data['user_query']['user_district']?></td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td><?=$this->lang->line('label_profile_address')?></td>
                                <td><?=$data['user_query']['user_address']?></td>
                                <td>&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4">
                    <div class="insideCol lightBgInverted pull-right">
                        <h3>Le gustar&iacute;a crear su propio restaurante virtual?</h3>
                        <p>
                            Para crear su propio restaurante virtual aqu&iacute; en este sitio, solo requerimos que cumpla
                            con un simple proceso de verificaci&oacute;n.<br /><br />
                            Una vez que se haya verificado que su restaurante es leg&iacute;timo, podr&aacute; crear uno virtual.<br /><br />
                            Su restaurante virtual incluye:
                            <ul>
                                <li>Galleria de fotos</li>
                                <li>Men&uacute; en l&iacute;nea</li>
                                <li>Recepci&oacute;n de reservaciones en l&iacute;nea</li>
                                <li>Recepci&oacute;n de ordenes en l&iacute;nea</li>
                                <li>Calendario de eventos especiales</li>
                                <li>Entre otros...</li>
                            </ul>
                            Lo mejor de todo es que es gratis! A qui&eacute;n no le gustan las cosas gratis?
                        </p>
                        <a href="/profile/create_rest" class="btn btn-primary btn-lg allCaps">
                            <?=$this->lang->line('link_create_rest')?> <span class="glyphicon glyphicon-cog"></span>
                        </a>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>
