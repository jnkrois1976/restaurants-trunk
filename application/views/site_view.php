        <section class="mainContent">
        	<div class="container topSection darkBg">
        		<div class="row">
        		    <div class="col-lg-12">
        				    <div class="col-lg-3">
        				        <?php include('application/views/modules/reservation_widget.php'); ?>
        				    </div>
        				    <div class="col-lg-9 slideshow hidden-phone">
        				        <div id="carousel-example-generic" class="carousel slide">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="active item">
                                            <img src="/images/carousel/slide1.jpg" />
                                            <div class="carousel-caption">
                                                <span>
                                                    <h1>Burgers</h1>
                                                    <p>
                                                        The best Sushi in town<br />
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                        <br /><br />
                                                        <a href="/results/restaurant/1000" class="btn btn-primary pull-right"><?=$this->lang->line('button_view_restaurant')?> <span class="glyphicon glyphicon-glass"></span></a>
                                                    </p>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <img src="/images/carousel/slide2.jpg" />
                                            <div class="carousel-caption">
                                                <span>
                                                    <h1>Desserts</h1>
                                                    <p>
                                                        The best Sushi in town<br />
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                        <br /><br />
                                                        <a href="#" class="btn btn-primary pull-right"><?=$this->lang->line('button_view_restaurant')?> <span class="glyphicon glyphicon-glass"></span></a>
                                                    </p>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <img src="/images/carousel/slide3.jpg" />
                                            <div class="carousel-caption">
                                                <span>
                                                    <h1>Sushi</h1>
                                                    <p>
                                                        The best Sushi in town<br />
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                        <br /><br />
                                                        <a href="#" class="btn btn-primary pull-right"><?=$this->lang->line('button_view_restaurant')?> <span class="glyphicon glyphicon-glass"></span></a>
                                                    </p>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        				    </div>
				    </div>
        		</div>
        	</div>
            <div class="container middleSection lightBg">
                <div class="row">
                    <div class="col-lg-12">
                        <h3><?=$this->lang->line('headline_daily_deals')?></h3>
                    </div>
                    <div class="col-lg-12">
                        <?php for($i = 1; $i < 5; $i++): ?>
                        <div class="thumbnail lightBgInverted">
                            <h4>Thumbnail label</h4>
                            <img src="/images/home_promo/middle_box<?=$i?>.jpg" alt="">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            <div class="actions">
                                <a href="#" class="btn btn-primary btn-xs"><?=$this->lang->line('button_get_coupon')?> <span class="glyphicon glyphicon-gift"></span></a>
                            </div>
                        </div>
                        <?php endfor; ?>
                        <div class="thumbnail lightBgInverted">
                            <h4>Thumbnail label</h4>
                            <img src="/images/home_promo/middle_box5.jpg" alt="">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, lorem ipsum dolor sit amet, consectetur.</p>
                            <div class="actions">
                                <a href="#" class="btn btn-primary btn-xs"><?=$this->lang->line('button_get_coupon')?> <span class="glyphicon glyphicon-gift"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        	<div class="container bottomSection">
            	<div class="row hidden-phone">
            	    <div class="col-lg-12">
                        <div class="thumbnail lightBg">
                            <h3><?=$this->lang->line('headline_highlighted_restaurants')?></h3>
                            <img src="/images/home_promo/box1.jpg" alt="">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
                            </p>
                            <div class="actions">
                                <a href="#" class="btn btn-primary"><?=$this->lang->line('button_view_restaurants')?> <span class="glyphicon glyphicon-star-empty"></span></a>
                            </div>
                        </div>
                   
                        <div class="thumbnail lightBg">
                            <h3><?=$this->lang->line('headline_popular_restaurants')?></h3>
                            <img src="/images/home_promo/box2.jpg" alt="">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                            <div class="actions">
                                <a href="#" class="btn btn-primary"><?=$this->lang->line('button_view_restaurants')?> <span class="glyphicon glyphicon-heart"></span></a>
                            </div>
                        </div>
                    
                        <div class="thumbnail lightBg">
                            <h3><?=$this->lang->line('headline_recomended_restaurants')?></h3>
                            <img src="/images/home_promo/box3.jpg" alt="">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                            <div class="actions">
                                <a href="#" class="btn btn-primary"><?=$this->lang->line('button_view_restaurants')?> <span class="glyphicon glyphicon-thumbs-up"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>