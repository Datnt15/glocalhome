<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Glocal - <?= lang('home-sub-title') ?></title>
	<base href="<?= base_url() ?>">
	<meta name="author" content="Nguyễn Tiến Đạt" />
	<meta name="description" content="Glocal home cung cấp giải pháp căn hộ phức hợp trên khu vực Hồ Tây." />
	<meta name="keywords"  content="" />
	<meta name="Resource-type" content="Document" />
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<link rel="icon" href="assets/img/favicon.png" type="image/png"> 
	<link rel="stylesheet" type="text/css" href="assets/css/jquery.fullPage.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/slick.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/toastr.min.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/circle-menu.css" />
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;subset=vietnamese" rel="stylesheet"> 
	<script type="text/javascript">
		var intro_text = ['<?= lang('home-intro-3'); ?>','<?= lang('home-intro-4'); ?>', "<?= lang('home-intro-5'); ?>"],
			menu_anchor = ["<?= lang('menu-home') ?>", "<?= lang('menu-overview') ?>", "<?= lang('menu-booking') ?>", "<?= lang('menu-benefits') ?>", "<?= lang('menu-services') ?>", "<?= lang('menu-faq') ?>", "<?= lang('menu-waitlist') ?>"];
	</script>
</head>
<body>
	<div id="preloader">
		<img src="assets/img/logo-white.png" style="height: 80px;">
		<img src="assets/img/preload.gif">
	</div>
	<div id="menu-content"></div>
	
	<div id="fullpage">

		<!-- General -->
		<div class="section" id="section0">
			<img data-src="assets/img/logo.png" class="logo visible-xs">
			<div class="container">
				<div class="jumbotron">
					<h2 class="hidden-xs"><?= lang('home-intro-1'); ?></h2>
					<h3 class="hidden-xs">
						<?= lang('home-intro-2'); ?>
						<span id="intro_text"></span>
					</h3>
					<p><h3><?= lang('home-subcription-title') ?></h3></p>
					<h5 class="hidden-xs"><?= lang('home-subcription-helper-1') ?></h5>
					<h5 class="hidden-xs"><?= lang('home-subcription-helper-2') ?></h5>
					<h5 class="visible-xs"><?= lang('home-subcription-helper-xs') ?></h5>
					<br class="hidden-xs"><br class="hidden-xs">
					<form accept="" method="POST" class="form-inline" >
						<input type="hidden" name="accessToken" value="<?= $accessToken ?>">
						<div class="input-group input-group-lg">
						  	<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
						  	<input type="email" class="form-control" placeholder="<?= lang('home-input-mail'); ?>" required >
						</div>
					  	<button type="submit" class="btn-transparent" >
					  		<i class="fa fa-paper-plane-o" aria-hidden="true"></i> 
					  		<?= lang('home-subcription-btn') ?>
					  	</button>
					</form>
					<h3 style="margin-bottom: 20px;"><?= lang('home-rate-title') ?></h3>
					<a class="btn-transparent" href="<?= base_url('assets/data/official-glocalhome-room-rates.pdf') ?>" >
				  		<i class="fa fa-download" aria-hidden="true"></i> 
				  		<?= lang('home-rate-btn') ?>
				  	</a>
				</div>
			</div>
		</div>

		<!-- Overview -->
		<div class="section" id="section1">
			<div class="intro">
				<div class="container">
					<h1><?= lang('home-overview'); ?></h1>
					<h4 class="hidden-xs hidden-sm"><?= lang('home-overview-text'); ?></h4>
					<h4 class="hidden-xs hidden-sm" style="width: 60%; margin: 0 auto; line-height: 28px;"><?= lang('home-overview-text-2'); ?></h4>
					<h4 class="hidden-xs hidden-sm"><?= lang('home-overview-text-3'); ?></h4>
					<h4 class="hidden-xs hidden-sm"><?= lang('home-overview-text-4'); ?></h4>
					<div class="col-xs-6 col-sm-6 col-md-3">
						<div class="round-box" role="button" data-toggle="tooltip" data-placement="top" data-trigger="hover focus" title="And here's some amazing content. It's very engaging. Right?">
							<img data-src="assets/img/home.png" alt="<?= lang('home-room-type') ?>">
						</div>
						<h4><strong><?= lang('home-room-type') ?></strong></h4>
						<h5 class="muted-text"><?= lang('home-label-1') ?></h5>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-3">
						<div class="round-box" role="button" data-toggle="tooltip" data-placement="top" data-trigger="hover focus" title="And here's some amazing content. It's very engaging. Right?">
							<img data-src="assets/img/size.png" alt="<?= lang('home-room-size') ?>">
						</div>
						<h4><strong><?= lang('home-room-size') ?></strong></h4>
						<h5 class="muted-text"><?= lang('home-label-2') ?></h5>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-3">
						<div class="round-box" role="button" data-toggle="tooltip" data-placement="top" data-trigger="hover focus" title="And here's some amazing content. It's very engaging. Right?">
							<img data-src="assets/img/floor-plan.png" alt="<?= lang('home-available') ?>">
						</div>
						<h4><strong><?= lang('home-available') ?></strong></h4>
						<h5 class="muted-text"><?= lang('home-label-3') ?></h5>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-3">
						<div class="round-box" role="button" data-toggle="tooltip" data-placement="top" data-trigger="hover focus" title="And here's some amazing content. It's very engaging. Right?">
							<img data-src="assets/img/calendar.png" alt="<?= lang('home-finish-date') ?>">
						</div>
						<h4><strong><?= lang('home-finish-date') ?></strong></h4>
						<h5 class="muted-text"><?= lang('home-label-4') ?></h5>
					</div>
				</div>
			</div>
		</div>

		<!-- Booking -->
		<div class="section" id="section2">
			
			<?php for ($i = 1; $i < 5; $i++): ?>
				<div class="slide" id="slide<?= $i;?>">
					<div class="intro">
						<h2><?= str_replace('$1', $i, lang('home-floor-plan')) ?></h2>
						<canvas id="mycanvas<?= $i;?>"></canvas>
						<div class="room-tooltip">
							<?= lang('tooltip-title'); ?><span></span>
							<p class="helper"><?= lang('tooltip-helper') ?></p>
						</div>
					</div>
				</div>
			<?php endfor; ?>
		</div>

		<!-- Benifits -->
		<div class="section" id="section3">
			<div class="row">
				<div class="col-xs-12 col-sm-4">
					<div class="intro">
						<h1><?= lang('home-benefits-header') ?></h1>
						<h2 class="benifits-name hidden-xs"><?= lang('home-benefits-restaurant') ?></h2>
						<h5 class="hidden-xs benifits-sub">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					    consequat. Excepteur sint occaecat cupidatat non
					    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h5>
					</div>
				</div>
				<div class="col-xs-12 col-sm-8">
					<div class="slider-for">
					    <div class="slider-for__item">
					    	<h4 class="visible-xs"><?= lang('home-benefits-restaurant') ?></h4>
					    	<img data-src="assets/img/restaurant.jpg" class="img-responsive">
					    </div>
					    <div class="slider-for__item">
					    	<h4 class="visible-xs"><?= lang('home-benefits-tennis') ?></h4>
					    	<img data-src="assets/img/tennis-court.jpg" class="img-responsive">
					    </div>
					    <div class="slider-for__item">
					    	<h4 class="visible-xs"><?= lang('home-benefits-swimming') ?></h4>
					    	<img data-src="assets/img/swimming-pool.jpg" class="img-responsive">
					    </div>
					    <div class="slider-for__item">
					    	<h4 class="visible-xs"><?= lang('home-benefits-spa') ?></h4>
					    	<img data-src="assets/img/spa.jpg" class="img-responsive">
					    </div>
					    <div class="slider-for__item">
					    	<h4 class="visible-xs"><?= lang('home-benefits-office') ?></h4>
					    	<img data-src="assets/img/working-space.jpg" class="img-responsive">
					    </div>
					    <div class="slider-for__item">
					    	<h4 class="visible-xs"><?= lang('home-benefits-school') ?></h4>
					    	<img data-src="assets/img/school.jpg" class="img-responsive">
					    </div>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="col-xs-9 col-xs-offset-2 col-sm-6 col-sm-offset-2 col-md-4 col-md-offset-4" id="benifits-control">
					
					<div class="slider-nav">
					    <div class="slider-for__item item-nav" data-discribe="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					    consequat. Excepteur sint occaecat cupidatat non
					    proident, sunt in culpa qui officia deserunt mollit anim id est laborum." data-alt="<?= lang('home-benefits-restaurant') ?>">
					    	<div class="square-box">
					    		<img class="img-10" src="assets/img/restaurant.png" alt="<?= lang('home-benefits-restaurant') ?>">
					    	</div>
					    </div>
					    <div class="slider-for__item item-nav" data-discribe="Ut enim ad minim veniam,
					    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					    proident, sunt in culpa qui officia deserunt mollit anim id est laborum." data-alt="<?= lang('home-benefits-tennis') ?>">
					    	<div class="square-box">
					    		<img class="img-10" src="assets/img/tennis-court.png" alt="<?= lang('home-benefits-tennis') ?>">
					    	</div>
					    </div>
					    <div class="slider-for__item item-nav" data-discribe="Lorem tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					    proident, sunt in culpa qui officia deserunt mollit anim id est laborum." data-alt="<?= lang('home-benefits-swimming') ?>">
					    	<div class="square-box">
					    		<img class="img-10" src="assets/img/pool.png" alt="<?= lang('home-benefits-swimming') ?>">
					    	</div>
					    </div>
					    <div class="slider-for__item item-nav" data-discribe="incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, ullamco laboris nisi ut aliquip ex ea commodo
					    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					    proident, sunt in culpa qui officia deserunt mollit anim id est laborum." data-alt="<?= lang('home-benefits-spa') ?>">
					    	<div class="square-box">
					    		<img class="img-10" src="assets/img/spa.png" alt="<?= lang('home-benefits-spa') ?>">
					    	</div>
					    </div>
					    <div class="slider-for__item item-nav" data-discribe="Lincididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					    proident, sunt in culpa qui officia deserunt mollit anim id est laborum." data-alt="<?= lang('home-benefits-office') ?>">
					    	<div class="square-box">
					    		<img class="img-10" src="assets/img/working-space.png" alt="<?= lang('home-benefits-office') ?>">
					    	</div>
					    </div>
					    <div class="slider-for__item item-nav" data-discribe="Ut enim ad minim veniam,
					    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					    proident, sunt in culpa qui officia deserunt mollit anim id est laborum." data-alt="<?= lang('home-benefits-school') ?>">
					    	<div class="square-box">
					    		<img class="img-10" src="assets/img/school.png" alt="<?= lang('home-benefits-school') ?>">
					    	</div>
					    </div>
					</div>
				</div>
			</div>
		</div>

		<!-- Services -->
		<div class="section" id="section4">
			<div class="intro">
				<h1><?= lang('home-service-header') ?></h1>
			</div>
			<div class="container">
				<h3><?= lang('home-service-intro') ?></h3>
				<div class="row">
					<div class="col-xs-12 col-sm-4">
						<div class="service-content thumbnail" >
							<img src="assets/img/service-1.jpg" alt="<?= lang('home-service-room-title') ?>" class="serice-img img-responsive">
							<h3><?= lang('home-service-room-title') ?></h3>
							<p><strong class="text-danger"><?= lang('home-service-room-state') ?></strong></p>
							<p class="text-muted"><?= lang('home-service-room-intro-1') ?></p>
							<p class="text-muted"><?= lang('home-service-room-intro-2') ?></p>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4">
						<div class="service-content thumbnail" >
							<img src="assets/img/service-2.jpg" alt="<?= lang('home-service-customer-title') ?>" class="serice-img img-responsive">
							<h3><?= lang('home-service-customer-title') ?></h3>
							<p><strong class="text-danger"><?= lang('home-service-customer-state') ?></strong></p>
							<p class="text-muted"><?= lang('home-service-customer-intro-1') ?></p>
							<p class="text-muted"><?= lang('home-service-customer-intro-2') ?></p>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4">
						<div class="service-content thumbnail" >
							<img src="assets/img/service-3.jpg" alt="<?= lang('home-service-vehicle-title') ?>" class="serice-img img-responsive">
							<h3><?= lang('home-service-vehicle-title') ?></h3>
							<p><strong class="text-danger"><?= lang('home-service-vehicle-state') ?></strong></p>
							<p class="text-muted"><?= lang('home-service-vehicle-intro-1') ?></p>
							<p class="text-muted"><?= lang('home-service-vehicle-intro-2') ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>


		<!-- FAQs -->
		<div class="section" id="section5">
			<div class="intro">
				<h1 style="margin-bottom: 0"><?= lang('home-faq-header') ?></h1>
			</div>
			<div class="container">
				<h3><?= lang('home-faq-intro') ?></h3>
				<p ><?= lang('home-faq-helper') ?></p>
				<div class="row">
					<?php for($i = 0; $i < 5; $i++): ?>
						<div class="col-sm-4 col-xs-12">
							<div class="box-outline question-content">
								<img src="assets/img/question.png" alt="" class="img-responsive">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat.
							</div>
						</div>
					<?php endfor; ?>
					<div class="col-sm-4 col-xs-12">
						<div class="box-outline">
							<img src="assets/img/more.png" alt="" class="img-responsive">
							<h3><a href="faq"><?= lang('more-btn-text') ?></a></h3>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Contact -->
		<div class="section" id="section6">

			<div id="office_location"></div>

			<button data-toggle-text="<?= lang('home-view-map-btn-toggle') ?>" data-is-map-hide='1' id="view-map-btn"><?= lang('home-view-map-btn') ?></button>

			<div class="map-layer" id="gradient-layer"></div>

			<div class="content">
				<div class="container">
					<h1><?= lang('home-waitlist-title') ?></h1>
					<div class="row">
						<!-- Contact Info -->
						<div class="col-xs-12 col-sm-6 text-left">
							<div class="space-50"></div>
							<h4 class="hidden-xs"><?= lang('home-waitlist-intro-1') ?></h4>
							<h4 class="hidden-xs"><?= lang('home-waitlist-intro-2') ?></h4>
							<h1 class="hidden-xs"><?= lang('home-contact-title') ?>:</h1>
							<h3 class="hidden-xs">
								<i class="fa fa-map-marker"></i> 
								<?= lang('home-location-address') ?>
							</h3>
							<h4>
								<a href="tel:<?= lang('home-contact-phone') ?>" class="btn-black">
									<i class="fa fa-phone fa-lg"></i>
								</a>
								<span class="hidden-xs"><?= lang('home-contact-phone') ?></span>
								<div class="space-30"></div>
								<a href="mailto:<?= lang('home-contact-mail') ?>" class="btn-black">
									<i class="fa fa-envelope-o fa-lg"></i>
								</a>
								<span class="hidden-xs"><?= lang('home-contact-mail') ?></span>
							</h4>
							<h4 class="hidden-xs"><?= lang('home-location-intro') ?></h4>
						</div>
						<!-- Contact form -->
						<div class="col-xs-12 col-sm-6">
							<div class="space-50"></div>
							<form method="POST" action="" class="row">
								<input type="hidden" name="accessToken" value="<?= $accessToken ?>">
								<div class="col-xs-12 col-md-6">
									<div class="input-group input-group-lg">
									  	<span class="input-group-addon"><i class="fa fa-users"></i></span>
									  	<input type="text" class="form-control" placeholder="<?= lang('home-input-fullname'); ?>" required >
									</div>
								</div>
								<div class="col-xs-12 col-md-6">
									<div class="input-group input-group-lg">
									  	<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
									  	<input type="email" class="form-control" placeholder="<?= lang('home-input-mail'); ?>" required >
									</div>
								</div>
								<div class="col-xs-12">
									<div class="space-30"></div>
									<div class="form-group">
									  	<textarea class="input-lg" placeholder="<?= lang('home-input-message'); ?>" required ></textarea>
									</div>
								</div>
								<div class="col-xs-12 ">
									<div class="space-30"></div>
									  	<button type="submit" class="btn-transparent" >
									  		<i class="fa fa-paper-plane-o" aria-hidden="true"></i> 
									  		<?= lang('home-subcription-btn') ?>
									  	</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Login and Register Modal -->
	<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                		<i class="fa fa-times"></i>
                	</button>
                	<div id="room-modal-content"></div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
	<!--[if IE]>
		<script type="text/javascript">
			 var console = { log: function() {} };
		</script>
	<![endif]-->
	<script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery-migrate.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery-ui.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<script src="assets/js/scrolloverflow.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery.fullPage.min.js" type="text/javascript"></script>
	<script src="assets/js/typed.min.js" type="text/javascript"></script>
	<script src="assets/js/toastr.min.js" type="text/javascript"></script>
	<script src="assets/js/slick.min.js" type="text/javascript"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2kv75fGcu6a_Hb8pwjX6cChJQm5lghMw" async defer></script>
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<script src="assets/js/home.js" type="text/javascript"></script>
	<?php if ($this->session->flashdata('type')): ?>
	<script type="text/javascript">
	jQuery(window).load(function() {   
	    toastr.options = {
	        "closeButton": true,
	        "debug": false,
	        "positionClass": "toast-top-right",
	        "onclick": null,
	        "showDuration": "1000",
	        "hideDuration": "1000",
	        "timeOut": "5000",
	        "extendedTimeOut": "1000",
	        "showEasing": "swing",
	        "hideEasing": "linear",
	        "showMethod": "fadeIn",
	        "hideMethod": "fadeOut"
	    };
	    toastr['<?= $this->session->flashdata('type') ?>']('<?= $this->session->flashdata('msg'); ?>', '<?= $this->session->flashdata('title') ?>');
	});
	</script>
	<?php endif ?>
</body>
</html>