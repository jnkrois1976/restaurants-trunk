<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form  data-bubble-pos="top">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-map-marker"></span> <?=$this->lang->line('nav_home_link5') ?></h4>
                </div>
                <div class="modal-body">
                    <fieldset>
                        <div class="row">
                            <div class="col-lg-12">
                                <div>
                                    <?php if($location_session_data[3] == FALSE && $location_data[3] == FALSE): ?>
                                        <h4>No ha establecido su ubicaci&oacute;n</h4>
                                        <?php if($location_session_data[5] == FALSE): ?>
                                            Ingrese al sitio para cambiar su ubicaci&oacute;n permanentemente, o puede establecer temporalmente su provincia, cant&oacute;n y distrito seleccionando las suguientes opciones:<br />
                                        <?php elseif($location_session_data[5] == TRUE): ?>
                                            Puede establecer temporal o permanentemente su provincia, cant&oacute;n y distrito seleccionando las suguientes opciones:<br />
                                        <?php endif; ?>
                                    <?php elseif($location_session_data[3] == TRUE && $location_data[3] == FALSE): ?>
                                        Su ubicaci&oacute;n temporal es la siguiente:<br />
                                        <strong><i><?=$location_session_data[0]." > ".$location_session_data[1]." > ".$location_session_data[2]?></i></strong><br /><br />
                                        Seleccione una ubicaci&oacute;n diferente si lo desea o ingrese al sitio para cambiar su ubicaci&oacute;n permanentemente.
                                    <?php elseif($location_session_data[3] == FALSE && $location_data[3] == TRUE): ?>
                                        Su ubicaci&oacute;n establecida es la siguiente:<br />
                                        <strong><i><?=$location_data[0]." > ".$location_data[1]." > ".$location_data[2]?></i></strong><br /><br />
                                        Seleccione una ubicaci&oacute;n diferente si lo desea y escoja si la quiere cambiar temporal o permanentemente.
                                    <?php elseif($location_session_data[3] == TRUE && $location_data[3] == TRUE): ?>
                                        Su ubicaci&oacute;n permanente es la siguiente:<br />
                                        <strong><i><?=$location_data[0]." > ".$location_data[1]." > ".$location_data[2]?></i></strong><br /><br />
                                        Su ubicaci&oacute;n temporal (usaremos esta para sus busquedas) es la siguiente:<br />
                                        <strong><i><?=$location_session_data[0]." > ".$location_session_data[1]." > ".$location_session_data[2]?></i></strong><br /><br />
                                        Seleccione una ubicaci&oacute;n diferente si lo desea y escoja si la quiere cambiar temporal o permanentemente.
                                    <?php endif; ?>
                                </div><br />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group update_location_required">
                                    <label class="update_province"><?=$location_labels[0]?></label>
                                    <select id="locationWidgetProvince" type="select" class="form-control" name="provincia" data-province="update_province">
                                        <option value=""><?=$location_placeholders[0]?></option>
                                        <?php foreach($province as $province_option => $key): ?>
                                            <option value='<?=$key?>'><?=$key?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group update_location_optional">    
                                    <label><?=$location_labels[1]?></label>
                                    <select id="locationWidgetCounty" class="form-control" disabled="disabled" name="canton" data-county="update_county">
                                        <option value=""><?=$location_placeholders[1]?></option>
                                    </select>
                                </div>
                                <div class="form-group update_location_optional">   
                                    <label><?=$location_labels[2]?></label>
                                    <select id="locationWidgetDistrict" type="select" type="select" class="form-control" disabled="disabled" name="distrito" data-district="update_district"> 
                                        <option value=""><?=$location_placeholders[2]?></option>
                                    </select>
                                </div>
                                <?php if($location_session_data[5] == FALSE): ?>
                                    <input class="hiddenFromLayout" type="radio" name="setLocation" value="temporary" disabled="disabled" checked="checked">
                                <?php elseif($location_session_data[5] == TRUE): ?>
                                    <span>Definir mi ubicaci&oacute;n.</span>
                                    <div class="radio">
                                    <label>
                                        <input type="radio" name="setLocation" value="permanent" disabled="disabled">
                                            Permanentemente </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="setLocation" value="temporary" disabled="disabled" checked="checked">
                                            Temporalmente</label>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-4">&nbsp;</div>
                        </div>
                    </fieldset>
                    <a href="#" id="toolTipLocation" data-toggle="tooltip" class="preventDefault" data-animation="auto right" title="<?=$this->lang->line('tooltip_modal_location')?>"><?=$this->lang->line('link_modal_location')?></a>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-default clear_values">
                        <?=$this->lang->line('button_modal_erase')?> <span class="glyphicon glyphicon-refresh"></span>
                    </button>
                    <button id="closeLocationWidget" type="button" class="btn btn-default" data-dismiss="modal">
                        <?=$this->lang->line('button_modal_close') ?>
                    </button>
                    <?php $submit_btn_text = $this->lang->line('button_modal_update'); ?>
                    <?php if($location_session_data[3] == FALSE && $location_data[3] == FALSE): ?>
                        <?php $submit_btn_text = $this->lang->line('button_modal_activate'); ?>
                    <?php endif; ?>
                    <input id="setUserLocation" type="submit" class="btn btn-primary" value="<?=$submit_btn_text?>" disabled="disabled" />
                </div>
            </form>
        </div>
    </div>
</div>