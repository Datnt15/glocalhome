<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
	<div class="carousel-inner">
		<div class="item active">
			<div class="col-xs-12 gallery-content col-sm-6">
				<?php if (count($gallery)): ?>
					<div id="gallery-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
						    <li data-target="#gallery-carousel" data-slide-to="0" class="active"></li>
							<?php for ($i = 1; $i < count($gallery); $i++) {
							    echo '<li data-target="#gallery-carousel" data-slide-to="'.$i.'"></li>';
							} ?>
						</ol>
						<!-- Wrapper for slides -->
						<div class="carousel-inner" role="listbox">
						    <div class="item active">
						  		<img src="<?= $gallery[0] ?>" alt="<?= $gallery[0] ?>">
							      
						    </div>
						    <?php for ($i = 1; $i < count($gallery); $i++) {
							    echo '<div class="item"><img src="'.$gallery[$i].'" alt="'.$gallery[$i].'"></div>';
							} ?>
						</div>
					</div>
				<?php else: ?>
					<img src="<?= $room['room_thumbnail'] ?>" class="img-responsive" alt="<?= $room['room_no'] ?>">
				<?php endif ?>
			</div>
			<div class="col-xs-12 col-sm-6">
				<h2><?= lang('room-title') . ' ' . $room['room_no'] ?></h2>
				<div class="text-left">
					<div class="h5">
						<img src="assets/img/bed.png" style="width: 25px;"> 
						<span class="badge-xs">
							<strong><?= $room['room_beds'] ?></strong>
						</span>
					</div>

					<div class="h5">
						<img src="assets/img/stretch.png" style="width: 25px;"> 
						<span class="badge-xs">
							<strong><?= $room['room_size'] ?></strong> m<sup>2</sup>
						</span>
					</div>

					<div class="h5">
						<img src="assets/img/daily.png"> 
						<span class="badge-xs">
							<strong><?= number_format($room['room_daily_tax'], 0, '.', ' ') ?></strong> 
							<sup><?= $currency ?></sup>
						</span>
					</div>

					<div class="h5">
						<img src="assets/img/weekly.png"> 
						<span class="badge-xs">
							<strong><?= number_format($room['room_weekly_tax'], 0, '.', ' ') ?></strong> 
							<sup><?= $currency ?></sup>
						</span>
					</div>
							
					<div class="h5">
						<img src="assets/img/monthly.png"> 
						<span class="badge-xs">
							<strong><?= number_format($room['room_monthly_tax'], 0, '.', ' ') ?></strong> 
							<sup><?= $currency ?></sup>
						</span>
					</div>
							
					<div class="space-30"></div>
					<button id="book-this" class="btn-book carousel-control" data-room="<?= $room['room_no'] ?>" href="#myCarousel" data-slide="next">
						<?= lang('room-login-btn') ?>
					</button>
				</div>
			</div>
		</div>
	    <div class="item">
        	<?= $login_form; ?>
		</div> 
		<div class="item">
			<?= $register_form; ?>
		</div>
	</div>
</div>
<div class="clearfix"></div>
