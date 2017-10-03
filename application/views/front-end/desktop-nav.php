<nav id="menu-desktop" class="hidden-xs text-center">
	<ul class="pull-left">
		<li class='menu-item'>
			<a href="">
				<img src="assets/img/home.png" class="img-20">
				<?= lang('menu-home') ?>
			</a>
	    </li>
	    <li class='menu-item'>
	      	<a href="location">
	      		<img src="assets/img/location.png" class="img-20">
	      		<?= lang('menu-location') ?>
	      	</a>
	    </li>
	    <li class='menu-item'>
	      	<a href="faq">
	      		<img src="assets/img/faq.png" class="img-20">
	      		<?= lang('menu-faq') ?>
	      	</a>
	    </li>
	    <li class='menu-item'>
	      	<a href="assets/data/official-glocalhome-room-rates.pdf">
	      		<img src="assets/img/rate.png" class="img-20">
	      		<?= lang('menu-rate') ?>
	      	</a>
	    </li>
    </ul>
    <img src="assets/img/logo-white.png" class="brand-img">
    <ul class="pull-right">
	    <?php if (count($user)): ?>
	    	<li class='menu-item'>
		      	<a href="<?= $user['type'] == USER_TYPE ? 'guest' : 'admin' ?>" class="guest">
		      		<img src="assets/img/guest.png" class="img-20">
		      		<?= lang('menu-guest') ?>
	      		</a>
		    </li>
		    <li class='menu-item'>
		      	<a href="logout" class="logout">
		      			
		      		<img src="assets/img/turn-off.png" class="img-20">
		      		<?= lang('menu-logout') ?>
	      		</a>
		    </li>
		    
		<?php else: ?>
			<li class='menu-item'>
		      	<a href="javascript:void(0);" onclick="get_login_form()" class="login-link">
		      		<img src="assets/img/login-white.png" class="img-20">
		      		<?= lang('login-title') ?>
	      		</a>
		    </li>
	    <?php endif ?>
	    <li class='menu-item'>
	    	<?php if ($language == 'english') {?>
		      	<a href='vi'  aria-label="Tiếng Việt">
		      		<img src="assets/img/vi.png" class="img-25">
		      	</a>
	    	<?php } else { ?>
		    	
	    		<a href='en'  aria-label="English">
	    			<img src="assets/img/uk.ico" class="img-25">
	    		</a>
	    	<?php } ?>
	    </li>
	</ul>
</nav>