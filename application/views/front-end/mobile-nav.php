<nav class='menu visible-xs'>
	<input class='menu-toggler' id='menu-toggler' type='checkbox'>
	<label for='menu-toggler'></label>
	<ul id="ios-nav-menu">
	    <li class='menu-item'>
			<a href="javascript:void(0)"  aria-label="<?= lang('menu-home') ?>"></a>
	    </li>
	    <li class='menu-item'>
	      	<a href="javascript:void(0)"  aria-label="<?= lang('menu-location') ?>"></a>
	    </li>
	    <li class='menu-item'>
	      	<a href="javascript:void(0)"  aria-label="<?= lang('menu-faq') ?>"></a>
	    </li>
	    <li class='menu-item'>
	      	<a href="javascript:void(0)"  aria-label="<?= lang('menu-rate') ?>"></a>
	    </li>
	    <?php if (count($user)): ?>
	    	<li class='menu-item' data-menuanchor>
		      	<a href="<?= $user['type'] == USER_TYPE ? 'guest' : 'admin' ?>" class="guest"  aria-label="<?= lang('menu-guest') ?>"></a>
		    </li>
		    <li class='menu-item' data-menuanchor>
		      	<a href="logout" class="logout"  aria-label="<?= lang('menu-logout') ?>"></a>
		    </li>
		    
		<?php else: ?>
			<li class='menu-item' data-menuanchor>
		      	<a href="javascript:void(0);" onclick="get_login_form()" class="login-link" aria-label="<?= lang('login-title') ?>"></a>
		    </li>
	    <?php endif ?>
	    <li class='menu-item'>
	    	<?php if ($language == 'english') {?>
		      	<a href='vi'  aria-label="Tiếng Việt">
		      		<img src="assets/img/vi.png" class="img-35"></a>
	    	<?php } else { ?>
	    		<a href='en'  aria-label="English">
	    			<img src="assets/img/uk.ico" class="img-35"></a>
	    	<?php } ?>
	    </li>
	</ul>
</nav>
<label class="menu-btn" for="menu-toggler"></label>