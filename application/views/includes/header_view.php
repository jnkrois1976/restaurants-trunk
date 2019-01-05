<?php
    /* page arrays */
    $province = array('sanjose' =>'San José', 'alajuela' => 'Alajuela', 'heredia' => 'Heredia', 'cartago' => 'Cartago', 'puntarenas' => 'Puntarenas', 'limon' => 'Limón', 'guanacaste' => 'Guanacaste');
    $location_labels[0] = $this->lang->line('label_select_province');
    $location_labels[1] = $this->lang->line('label_select_county');
    $location_labels[2] = $this->lang->line('label_select_district');
    $location_placeholders[0] = $this->lang->line('placeholder_select_province');
    $location_placeholders[1] = $this->lang->line('placeholder_select_county');
    $location_placeholders[2] = $this->lang->line('placeholder_select_district');
    $location_data[0] = (isset($data['user_query'])) ? $data['user_query']['user_province'] : FALSE;
    $location_data[1] = (isset($data['user_query'])) ? $data['user_query']['user_county'] : FALSE;
    $location_data[2] = (isset($data['user_query'])) ? $data['user_query']['user_district'] : FALSE;
    $location_data[3] = (isset($data['user_query'])) ? $data['user_query']['user_location_set'] : FALSE;
    $location_session_data[0] = $this->session->userdata('user_province');
    $location_session_data[1] = $this->session->userdata('user_county');
    $location_session_data[2] = $this->session->userdata('user_district');
    $location_session_data[3] = $this->session->userdata('user_location_set');
    $location_session_data[4] = $this->session->userdata('user_preference');
    $location_session_data[5] = $this->session->userdata('is_logged_in');
    $food_types = array('it' =>  'Italiana', 
			'mx' =>  'Mexicana', 
			'id' =>  'Hindu', 
			'th' =>  'Tailandesa',
			'cn' =>  'China',
			'jp' =>  'Japonesa',
			'gk' =>  'Griega',
			'in' =>  'Internacional',
			'fr' =>  'Francesa',
			'sp' =>  'Española',
			'md' =>  'Mediterranea',
			'lb' =>  'Libanesa',
			'tk' =>  'Turca',
			'mc' =>  'Marroqui',
			'gm' =>  'Alemana',
			'cr' =>  'Caribeña',
			'br' =>  'Brazileña',
			'pt' =>  'Portuguesa',
			'cb' =>  'Cubana',
			'ar' =>  'Argentina',
			'tp' =>  'Tîpica',
			'pr' =>  'Peruana');
    
?>
<!DOCTYPE html>
<html class="no-js" >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?=$this->lang->line('head_title')?></title>
        <meta name="description" content="<?=$this->lang->line('head_desc')?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="/favicon.ico" />
        <link rel="stylesheet" href="/css/bootstrap3/bootstrap.css" />
        <link rel="stylesheet" href="/css/jquery_ui/jquery-ui.css" />
        <link rel="stylesheet" href="/css/format.css" />
        <link rel="stylesheet" href="/css/layout.css" />
        <script src="/js/libs/modernizr_v2-6-2.js"></script>
        <script src="/js/page_model.js"></script>
    </head>
    <body class="<?php echo $data['page_class']; ?>">
        <div id="validateBubble" class="attentionBg" tabindex="0">
            <span id="errorMessage"></span>
            <span id="bubbleArrow" class="validateArrow"></span>
        </div>
        <div class="modal fade" id="sessionExpired">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-warning-sign"></span> <?=$this->lang->line('headline_session_expired') ?></h4>
                    </div>
                    <div class="modal-body">
                        <p>
                            <?=$this->lang->line('site_expired_session')?>
                            <br /><br />
                            <a href="/" id="toolSessionExpired" data-toggle="tooltip" data-animation="auto left" title="<?=$this->lang->line('tooltip_session_expired')?>"><?=$this->lang->line('link_return_home')?></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php if($location_session_data[5] == FALSE): ?>
        <div class="modal fade" id="registerModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form class="registerForm" action="/account/create" method="post" novalidate="novalidate" data-bubble-pos="top">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-user"></span> <?=$this->lang->line('header_link_register')?></h4>
                        </div>
                        <div class="modal-body">
                            <fieldset>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label><?=$this->lang->line('label_input_username')?></label>
                                            <div class="input-group">
                                                <input name="name" class="form-control input-sm" type="text" placeholder="<?=$this->lang->line('placeholder_input_username')?>" required="required" autocomplete="off"/>
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label><?=$this->lang->line('label_input_email')?></label>
                                            <div class="input-group">
                                                <input name="email" class="form-control input-sm" type="email" placeholder="<?=$this->lang->line('placeholder_input_email')?>" required="required" autocomplete="off"/>
                                                <span class="input-group-addon"><span class=" glyphicon glyphicon-envelope"></span></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label><?=$this->lang->line('label_input_pwd')?></label>
                                            <div class="input-group">
                                                <input name="password" class="form-control input-sm" type="password" placeholder="<?=$this->lang->line('placeholder_input_pwd')?>" required="required" autocomplete="off" />
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label><?=$this->lang->line('label_input_pwd_confirm')?></label>
                                            <div class="input-group">
                                                <input class="form-control input-sm" type="password" placeholder="<?=$this->lang->line('placeholder_input_pwd_confirm')?>" required="required" autocomplete="off" />
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4"></div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-default">
                                <?=$this->lang->line('button_modal_erase')?> <span class="glyphicon glyphicon-refresh"></span>
                            </button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                <?=$this->lang->line('button_modal_close')?> <span class="glyphicon glyphicon-remove"></span>
                            </button>
                            <input type="submit" class="btn btn-primary" value="<?=$this->lang->line('button_modal_register')?>" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <section class="login">
            <div class="container">
                <div class="row loginBox">
                    <div class="col-lg-12">
                        <div class="loginForm">
                            <form action="/login/validate" method="post" novalidate="novalidate" data-bubble-pos="bottom">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label><?=$this->lang->line('label_input_email')?></label>
                                        <input name="email" id="loginEmail" type="text" value="jnkrois@gmail.com" class="form-control input-sm" placeholder="<?=$this->lang->line('placeholder_input_email')?>" required="required" autocomplete="off" />
                                    </div>
                                </div>
                                 <div class="col-lg-3">
                                    <div class="form-group">
                                        <label><?=$this->lang->line('label_input_pwd')?></label>
                                        <input name="password" type="password" value="juanca3015" class="form-control input-sm" placeholder="<?=$this->lang->line('placeholder_input_pwd')?>" required="required" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="form-group">
                                        <label>&nbsp;</label><br />
                                        <input type="submit" class="btn btn-primary btn-sm" value="<?=$this->lang->line('header_link_login')?>" />
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <label>&nbsp;</label><br />
                                    <div class="alert alert-danger pull-left">
                                        <?=$this->lang->line('server_error_login_failed')?> <span class="glyphicon glyphicon-warning-sign"></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-12">
                            <div class="col-lg-6">
                                <small>&nbsp;&nbsp;&nbsp;<a href="<?=$this->lang->line('header_link_lang_url')?>" class="normalLink"><?=$this->lang->line('link_forgot_pwd')?></a></small>
                            </div>
                            <div class="col-lg-6">
                                <a href="#" class="normalLink pull-right closeLogin preventDefault" id="closeLogin"><?=$this->lang->line('button_modal_close')?> <span class="glyphicon glyphicon-remove"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>
    	<section class="header">
    		<div class="container">
    			<div class="row">
    				<div class="col-lg-12">
						<div class="col-lg-2 logo"></div>
						<div class="col-lg-6">
							<div class="form-group">
    							<div id="mainSearchInputWrapper" class="input-group">
      								<input id="mainSearchInput" type="text" class="form-control input-lg" placeholder="Busque por nombre o tipo de comida... ">
      								<div class="input-group-addon"><span class="glyphicon glyphicon-search info" aria-hidden="true"></span></div>
    							</div>
  							</div>
  							<div class="col-lg-12 mainSearchFlyoutWrapper">
  								<div class="mainSearchFlyout">
  									<div class="col-lg-12">
  										<?php
  											if ($this->session->userdata('user_province')){
  												$location = $this->session->userdata('user_province'); 
  											}else {
  												$location = "todo el país";
  											}
  										?>
  										<h3>Resultados en <?=$location;?></h3>&rarr;
  										<a data-toggle="modal" href="#myModal" class="preventDefault"><span class="glyphicon glyphicon-map-marker"></span> Cambiar ubicación</a>
  										<hr />
  									</div>
  									<div class="col-lg-12">
	  									<div class="col-lg-6">
		  									<h3>Restaurantes</h3>
		  									<ul class="mainSearchResults"></ul>
		  								</div>
		  								<div class="col-lg-6">
		  									<h3>Categorias</h3>
		  									<ul class="categoryResults"></ul>
										</div>
	  								</div>
  								</div>
  							</div>
						</div>
						<div class="col-lg-4 topLinks hidden-phone">
					        <div class="col-lg-12">
					            <a href="<?=$this->lang->line('header_link_lang_url')?>" class="normalLink">
                                    <span class="glyphicon glyphicon-globe"></span> <?=$this->lang->line('header_link_lang')?>
                                </a>
                                &nbsp;|&nbsp;
								<?php
                                    $this->load->view('includes/top_links_view');
                                ?>
							</div>
						    <div class="col-lg-12">
								<span class="restCounter">
									<?=$this->lang->line('page_home_avail_rest').' '.$this->session->userdata('total_restaurants');?>
								</span>
							</div>
						</div>
    				</div>
    			</div>
    		</div>
    	</section>
    	<nav class="navWrapper darkBg">
    		<div class="container">
	    		<div class="navbar navbar-inverse">
                    <ul class="nav mainNav navbar-nav">
                        <li><a href="/"><span class="glyphicon glyphicon-home"></span> <?=$this->lang->line('nav_home_link0') ?></a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#"><span class="glyphicon glyphicon-bookmark"></span> <?=$this->lang->line('nav_home_link1') ?><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-submenu">
                                    <a><span class="glyphicon glyphicon-star"></span> <?=$this->lang->line('nav_home_sublink0') ?> &rsaquo;</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/results/categories/ratings/5"><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span></a></li>
                                        <li><a href="/results/categories/ratings/4"><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span></a></li>
                                        <li><a href="/results/categories/ratings/3"><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span></a></li>
                                        <li><a href="/results/categories/ratings/2"><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span></a></li>
                                        <li><a href="/results/categories/ratings/1"><span class="glyphicon glyphicon-star"></span></a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a><span class="glyphicon glyphicon-globe"></span> <?=$this->lang->line('nav_home_sublink1') ?> &rsaquo;</a>
                                    <ul class="dropdown-menu">
                                    	<?php foreach($food_types as $food_types_row => $key): ?>
                                        <li><a href="/results/categories/food/<?=$food_types_row?>"><?=$key?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a><span class="glyphicon glyphicon-map-marker"></span> <?=$this->lang->line('nav_home_sublink2') ?> &rsaquo;</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/results/categories/location/sanjose"><?=$this->lang->line('nav_home_sublink2_item0')?></a></li>
                                        <li><a href="/results/categories/location/heredia"><?=$this->lang->line('nav_home_sublink2_item1')?></a></li>
                                        <li><a href="/results/categories/location/alajuela"><?=$this->lang->line('nav_home_sublink2_item2')?></a></li>
                                        <li><a href="/results/categories/location/cartago"><?=$this->lang->line('nav_home_sublink2_item3')?></a></li>
                                        <li><a href="/results/categories/location/puntarenas"><?=$this->lang->line('nav_home_sublink2_item4')?></a></li>
                                        <li><a href="/results/categories/location/guanacaste"><?=$this->lang->line('nav_home_sublink2_item5')?></a></li>
                                        <li><a href="/results/categories/location/limon"><?=$this->lang->line('nav_home_sublink2_item6')?></a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a><span class="glyphicon glyphicon-usd"></span> <?=$this->lang->line('nav_home_sublink3') ?> &rsaquo;</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/results/categories/prices/5"><span class="glyphicon glyphicon-usd"></span><span class="glyphicon glyphicon-usd"></span><span class="glyphicon glyphicon-usd"></span><span class="glyphicon glyphicon-usd"></span><span class="glyphicon glyphicon-usd"></span></a></li>
                                        <li><a href="/results/categories/prices/4"><span class="glyphicon glyphicon-usd"></span><span class="glyphicon glyphicon-usd"></span><span class="glyphicon glyphicon-usd"></span><span class="glyphicon glyphicon-usd"></span></a></li>
                                        <li><a href="/results/categories/prices/3"><span class="glyphicon glyphicon-usd"></span><span class="glyphicon glyphicon-usd"></span><span class="glyphicon glyphicon-usd"></span></a></li>
                                        <li><a href="/results/categories/prices/2"><span class="glyphicon glyphicon-usd"></span><span class="glyphicon glyphicon-usd"></span></a></li>
                                        <li><a href="/results/categories/prices/1"><span class="glyphicon glyphicon-usd"></span></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="/results/events"><span class="glyphicon glyphicon-calendar"></span> <?=$this->lang->line('nav_home_link2') ?></a></li>
                        <li><a href="/results/specials"><span class="glyphicon glyphicon-certificate"></span> <?=$this->lang->line('nav_home_link3') ?></a></li>
                        <li><a href="/results/recommendations"><span class="glyphicon glyphicon-thumbs-up"></span> <?=$this->lang->line('nav_home_link4') ?></a></li>
                    </ul>
                    <ul class="nav navbar-nav pull-right">
                        <li>
                            <a data-toggle="modal" href="#myModal" class="preventDefault">
                                <span class="glyphicon glyphicon-map-marker"></span> 
                                <?php if($location_session_data[5] == FALSE && $location_data[3] == FALSE): ?>
                                	<?=$this->lang->line('nav_home_link5') ?>
                                <?php elseif($location_session_data[5] == TRUE && $location_data[3] == TRUE): ?>
                                	<?=$this->lang->line('nav_home_link6').$location_session_data[0].' > '.$location_session_data[1].' > '.$location_session_data[2]?>
                                <?php endif; ?>
                            </a>
                            <?php include('application/views/modules/location_widget.php'); ?>
                        </li>
                        <li>
                            &nbsp;
                            <?php if($this->session->userdata('user_location_set') == 'true'): ?>
                                <span id="locationActive" class="glyphicon glyphicon-ok statusOk allCaps locationIndicator test1" data-toggle="tooltip" data-animation="auto right" title="Su ubicaci&oacute;n predeterminada est&aacute; activa!"></span>
                            <?php elseif($location_session_data[5] == FALSE && $location_data[3] == FALSE): ?>
                                <span id="locationActive" class="glyphicon glyphicon-remove attention allCaps locationIndicator test2" data-toggle="tooltip" data-animation="auto right" title="Su ubicaci&oacute;n predeterminada est&aacute; desactivada!"></span>
                            <?php elseif($location_session_data[5] == TRUE && $location_data[3] == FALSE): ?>
                                <span id="locationActive" class="glyphicon glyphicon-remove attention allCaps locationIndicator test3" data-toggle="tooltip" data-animation="auto right" title="Su ubicaci&oacute;n predeterminada est&aacute; desactivada!"></span>
                            <?php elseif($location_session_data[5] == TRUE && $location_data[3] == TRUE): ?>
                                <span id="locationActive" class="glyphicon glyphicon-ok statusOk allCaps locationIndicator test4" data-toggle="tooltip" data-animation="auto right" title="Su ubicaci&oacute;n predeterminada est&aacute; activa!"></span>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
    		</div>
    	</nav>