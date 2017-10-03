<!-- END PAGE HEADER-->
<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal form-row-seperated" action="" method="POST" enctype="multipart/form-data">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> <?= lang('add-room-title') ?></span>
                    </div>
                    <div class="actions btn-set">
                        <button class="btn green btn-lg btn-outline">
                            <i class="fa fa-check"></i> <?= lang('edit-room-save-change') ?>
                        </button>
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
                                            <input type="text" class="form-control" name="room[room_no]" placeholder="" required="" value=""> 
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-sm-6">
                                        <label class="col-md-4 control-label"><?= lang('room-table-beds') ?>:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="room[room_beds]" placeholder="" required="" value="">
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-sm-6">
                                        <label class="col-md-4 control-label"><?= lang('room-table-size') ?> (m<sup>2</sup>):
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="room[room_size]" placeholder="" required="" value="">
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-sm-6">
                                        <label class="col-md-4 control-label"><?= lang('room-table-daily-tax') ?>:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="room[room_daily_tax]" placeholder="" required="" value="">
                                            <span class="help-block"> <?= lang('edit-room-helper-currency') ?> </span>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-sm-6">
                                        <label class="col-md-4 control-label"><?= lang('room-table-weekly-tax') ?>:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="room[room_weekly_tax]" placeholder="" required="" value="">
                                            <span class="help-block"> <?= lang('edit-room-helper-currency') ?> </span>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-sm-6">
                                        <label class="col-md-4 control-label"><?= lang('room-table-monthly-tax') ?>:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="room[room_monthly_tax]" placeholder="" required="" value="">
                                            <span class="help-block"> <?= lang('edit-room-helper-currency') ?> </span>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="add-new-room-accessToken" id="accessToken" value="<?= $accessToken ?>">
                                <div class="clearfix"></div>
                            </div>

                            <!-- Gallery -->
                            <div class="tab-pane" id="tab_images">
                                <div class="row fileupload-buttonbar">
                                    <div class="clearfix"></div>
                                    <div class="col-lg-7">
                                        <!-- The fileinput-button span is used to style the file input field as button -->
                                        <label for="file_input" class="btn btn-outline sbold green-haze" id="blockui_sample_1_3">
                                            <i class="fa fa-plus"></i>
                                            <span id="btn-text"> Add files... </span>
                                        </label>
                                        <input class="hidden" id="file_input" data-room="" type="file" name="files[]" multiple=""> 
                                        <!-- The table listing the files available for upload/download -->
                                    </div>
                                </div>
                                <table role="presentation" class="table table-striped clearfix">
                                    <tbody class="files"> </tbody>
                                </table>
                                <div id="preview"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>