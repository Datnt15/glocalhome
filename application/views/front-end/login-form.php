<h4 class="text-center">
    <img src="assets/img/logo-white.png" class="img-responsive logo" alt="page logo">
    <?= lang('login-title') ?>
</h4>
<div class="social-line text-center">
	<!-- <button class="btn btn-round btn-twitter">
        <i class="fa fa-twitter"></i>
    </button> -->
    <button class="btn btn-round btn-google" onclick="ggLogin()">
        <i class="fa fa-google"></i>
    </button>
    <button class="btn btn-round btn-facebook" onclick="fbLogin()">
        <i class="fa fa-facebook"> </i>
    </button>
    <p class="description text-center"><?= lang('home-log-classical') ?></p>
    <div class="clearfix"></div>
</div>
<form class="col-sm-8 col-sm-offset-2" method="POST" onsubmit="return login(event);">
	<div class="input-group input-group-lg">
		<span class="input-group-addon">
			<i class="fa fa-users"></i>
		</span>
		<input type="text" class="form-control" name="username" placeholder="<?= lang('home-input-username') ?>" required>
	</div>
	<br>
	<input type="hidden" name="accessToken" value="<?= $accessToken; ?>">
	
	<div class="input-group input-group-lg">
		<span class="input-group-addon">
			<i class="fa fa-lock fa-lg"></i>
		</span>
		<input type="password" placeholder="<?= lang('home-input-password') ?>" name="password" class="form-control" required />
	</div>

	<div class="checkbox">
		<input class="tgl tgl-input" id="cb2" type="checkbox" name="remember" checked>
		<label class="tgl-btn" for="cb2"></label>
		<label for="cb2">
			<?= lang('home-remember') ?>
		</label>
	</div> 
	<div class="form-group">
		<button class="btn-book" class="form-control"><?= lang('home-login') ?></button>
	</div>
    <p class="text-center">
        <a class="carousel-control" href="#myCarousel" data-slide="next">
            <i class="fa fa-pencil fa-lg"></i> <?= lang('home-not-a-member') ?>
        </a>
    </p>
</form>