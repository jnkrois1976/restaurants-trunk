<div class="container mainWrapper">
	<div class="container mainContent lightBg">
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-9">
					<h1>Sus Reservaciones</h1>
					<?php if($get_restaurants): ?>
                    	<?php foreach($get_restaurants as $get_restaurants_row): ?>
                        	<?php
                            	setlocale(LC_TIME, "es_ES"); 
                                //$event_date_time = strftime("%e de %B, %Y", mktime(0, 0, 0, $get_restaurants_row->event_month, $get_restaurants_row->event_day, $get_restaurants_row->event_year));
                            ?>
                            <?=$get_restaurants_row->rest_id?>
                        <?php endforeach; ?>
                    <?php elseif(!$get_restaurants): ?>
                    	<div class="eventDescription">
                        	No hay restaurantes en esta categoria.
                        </div>
                    <?php endif; ?>
				</div>
				<div class="col-lg-3">
					<div class="insideCol lightBgInverted pull-right">test</div>
				</div>
			</div>
		</div>
	</div>
</div>
