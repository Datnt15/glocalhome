<!-- END PAGE HEADER-->
<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal form-row-seperated" action="" method="POST">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> <?= lang('edit-room-title'). ' - ' . $room['room_no'] ?></span>
                    </div>
                    <div class="actions btn-set">
                        <button class="btn green btn-lg btn-outline">
                            <i class="fa fa-check"></i> <?= lang('edit-room-save-change') ?>
                        </button>
                        <a class="btn green btn-lg btn-outline" style="padding-top: 8px" href="<?= base_url('admin/add-new-room') ?>">
                            <i class="fa fa-plus"></i> <?= lang('edit-add-new-room') ?>
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="tabbable-custom">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_general" data-toggle="tab">
                                <i class="icon-grid fa-lg"></i> <?= lang('edit-room-general') ?> </a>
                            </li>
                            <li>
                                <a href="#tab_images" data-toggle="tab">
                                <i class="icon-camera fa-lg"></i> <?= lang('edit-room-gallery') ?> </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <!-- General options -->
                            <div class="tab-pane active" id="tab_general">
                                <p></p>
                                <div class="form-body">
                                    <div class="form-group col-xs-12 col-sm-6">
                                        <label class="col-md-4 control-label"><?= lang('room-table-no') ?>:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="room[room_no]" placeholder="" required="" value="<?= $room['room_no'] ?>"> 
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-sm-6">
                                        <label class="col-md-4 control-label"><?= lang('room-table-beds') ?>:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="room[room_beds]" placeholder="" required="" value="<?= $room['room_beds'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-sm-6">
                                        <label class="col-md-4 control-label"><?= lang('room-table-size') ?> (m<sup>2</sup>):
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="room[room_size]" placeholder="" required="" value="<?= $room['room_size'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-sm-6">
                                        <label class="col-md-4 control-label"><?= lang('room-table-daily-tax') ?>:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="room[room_daily_tax]" placeholder="" required="" value="<?= $room['room_daily_tax'] ?>">
                                            <span class="help-block"> <?= lang('edit-room-helper-currency') ?> </span>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-sm-6">
                                        <label class="col-md-4 control-label"><?= lang('room-table-weekly-tax') ?>:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="room[room_weekly_tax]" placeholder="" required="" value="<?= $room['room_weekly_tax'] ?>">
                                            <span class="help-block"> <?= lang('edit-room-helper-currency') ?> </span>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-sm-6">
                                        <label class="col-md-4 control-label"><?= lang('room-table-monthly-tax') ?>:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="room[room_monthly_tax]" placeholder="" required="" value="<?= $room['room_monthly_tax'] ?>">
                                            <span class="help-block"> <?= lang('edit-room-helper-currency') ?> </span>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="accessToken" id="accessToken" value="<?= $accessToken ?>">
                                <div class="clearfix"></div>
                            </div>

                            <!-- Gallery -->
                            <div class="tab-pane" id="tab_images">
                                <div class="row fileupload-buttonbar">
                                    <div id="gallery" class="col-xs-12">
                                        <span class="help-block"> <?= lang('edit-room-helper-gallery') ?> </span>
                                        <?php foreach ($gallery as $img): ?>
                                            <div class="mt-element-overlay">
                                                <div class="mt-overlay-3 mt-overlay-3-icons" style="width: auto; height: 200px; margin: 5px">
                                                    <?php if ($room['room_thumbnail']==$img['meta_value']): ?>
                                                        <div class="mt-element-ribbon">
                                                            <div class="ribbon ribbon-left ribbon-shadow ribbon-border-dash-hor ribbon-color-success">
                                                                <div class="ribbon-sub ribbon-clip ribbon-left"></div> Thumbnail
                                                            </div>
                                                        </div>
                                                    <?php endif ?>
                                                    <img src="<?= $img['meta_value'] ?>" style="width: auto; height: 200px">
                                                    <div class="mt-overlay no-background">
                                                        <ul class="mt-info">
                                                            <li>
                                                                <a href="javascript:;" data-id="<?= $img['id'] ?>" data-room="<?= $img['room_id'] ?>" data-value="<?= $img['meta_value'] ?>" class="btn default btn-outline tooltips set_thumbnail" data-original-title="Set as thumbnail">
                                                                    <i class="fa fa-image"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;" data-id="<?= $img['id']; ?>" data-room="<?= $img['room_id']; ?>" data-value="<?= $img['meta_value'] ?>" class="btn default btn-outline tooltips delete_image" data-original-title="Remove this Image">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-lg-7">
                                        <!-- The fileinput-button span is used to style the file input field as button -->
                                        <label for="file_input" class="btn btn-outline sbold green-haze" id="blockui_sample_1_3">
                                            <i class="fa fa-plus"></i>
                                            <span id="btn-text"> Add files... </span>
                                        </label>
                                        <input class="hidden" id="file_input" data-room="<?= $room['id'] ?>" type="file" name="files[]" multiple=""> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>