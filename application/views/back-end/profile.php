<div class="row">
 	<div class="col-xs-12 col-sm-8 col-sm-offset-2">
 		<div class="portlet light">
 			<div class="portlet-title">
 				<div class="caption caption-md">
                    <span class="caption-subject font-blue-madison bold uppercase">
                    	<?= lang('guest-menu-profile') ?>
                    </span>
                    <small> (<?= lang('edit-profile-helper') ?>)</small>
                </div>
 			</div>
 			<div class="portlet-body">
 				<div class="row">
 					<div class="col-xs-12 col-sm-4">
 						<div class="profile-userpic">
                            <img src="<?= ($user['avatar'] == '') ? 'assets/img/placeholder.jpg' : $user['avatar'] ?>" class="img-responsive" alt=""> 
                        </div>
                        <div class="profile-usertitle">
                            <div class="profile-usertitle-name"> 
                            	<a href="javascript:;" id="fullname" data-type="text" data-emptytext="<?= lang('home-input-fullname') ?>" data-pk="1" data-original-title="<?= lang('home-input-fullname') ?>">
                            		<?= $user['fullname'] ?> 
                            	</a>
                            </div>
                            <div class="profile-usertitle-job"> <?= $language == 'vietnam' ? 'Thành viên' : 'Member' ?> </div>
                        </div>
 					</div>
 					<div class="col-xs-12 col-sm-8">
 						<div class="col-xs-12">
 							<span><i class="fa fa-envelope-o"></i></span>
 							<a href="javascript:;" id="email" data-type="email" data-emptytext="<?= lang('home-input-email') ?>" data-pk="1" data-original-title="<?= lang('home-input-email') ?>"> 
 								<?= $user['email'] ?>
 							</a>
 						</div>
 						<div class="col-xs-12">
 							<br>
 							<span><i class="fa fa-phone"></i></span>
 							<a href="javascript:;" id="phone" data-type="text" data-emptytext="<?= lang('home-input-phone') ?>" data-pk="1" data-original-title="<?= lang('home-input-phone') ?>"> 
 								<?= $user['phone'] ?>
 							</a>
 						</div>
 						<div class="col-xs-12">
 							<br>
 							<span><i class="fa fa-map-o"></i></span>
 							<a href="javascript:;" id="address" data-type="text" data-emptytext="<?= lang('home-input-address') ?>" data-pk="1" data-original-title="<?= lang('home-input-address') ?>"> 
 								<?= $user['address'] ?>
 							</a>
 						</div>
 						<div class="col-xs-12">
 							<br>
 							<span><i class="fa fa-address-book-o"></i></span>
 							<a href="javascript:;" id="passport_number" data-type="text" data-emptytext="<?= lang('home-input-pp') ?>" data-pk="1" data-original-title="<?= lang('home-input-pp') ?>"> 
 								<?= $user['passport_number'] ?>
 							</a>
 						</div>
 						<div class="col-xs-12">
 							<br>
 							<span><i class="fa fa-id-card-o"></i></span>
 							<a href="javascript:;" id="ID_number" data-emptytext="<?= lang('home-input-id-card') ?>" data-pk="1" data-original-title="<?= lang('home-input-id-card') ?>"> 
 								<?= $user['ID_number'] ?>
 							</a>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 </div> 