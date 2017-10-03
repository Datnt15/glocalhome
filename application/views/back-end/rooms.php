<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase"> Managed Rooms</span>
                </div>
                <div class="actions btn-set">
                    <a class="btn green btn-lg btn-outline" style="padding-top: 8px" href="<?= base_url('admin/add-new-room') ?>">
                        <i class="fa fa-plus"></i> <?= lang('edit-add-new-room') ?>
                    </a>
                </div>
            </div>
            <div class="portlet-body">
                <?php if (count($rooms)): ?>
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6 pull-right">
                                <div class="btn-group pull-right">
                                    <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:;">
                                                <i class="fa fa-print"></i> Print </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="delete-room-accessToken" value="<?= $accessToken ?>">

                    </div>
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th><?= lang('room-table-thumbnail') ?></th>
                                <th><?= lang('room-table-beds') ?></th>
                                <th><?= lang('room-table-size') ?></th>
                                <th><?= lang('room-table-daily-tax') ?></th>
                                <th><?= lang('room-table-weekly-tax') ?> </th>
                                <th><?= lang('room-table-monthly-tax') ?></th>
                                <th><?= lang('table-action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rooms as $room): ?>
                            <tr>
                                <td> <?= $room['room_no'] ?> </td>
                                <td> <img src="<?= $room['room_thumbnail'] ?>" width="100"> </td>
                                <td> <strong><?= $room['room_beds'] ?></strong> </td>
                                <td> <strong><?= $room['room_size'] ?></strong> m<sup>2</sup> </td>
                                <td> 
                                    <strong><?= number_format($room['room_daily_tax'], 0, '.', ' ') ?></strong> 
                                    <sup><?= $currency ?></sup> 
                                </td>
                                <td> 
                                    <strong><?= number_format($room['room_weekly_tax'], 0, '.', ' ') ?></strong> 
                                    <sup><?= $currency ?></sup> 
                                </td>
                                <td> 
                                    <strong><?= number_format($room['room_monthly_tax'], 0, '.', ' ') ?></strong> 
                                    <sup><?= $currency ?></sup> 
                                </td>
                                <td>
                                    <a href="<?= base_url('admin/view-room/'.$room['room_no']) ?>" class="btn btn-outline green">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="<?= base_url('admin/edit-room/'.$room['room_no']) ?>" class="btn btn-outline green">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="javascript:;" class="btn btn-outline red del-room" data-room="<?= $room['id'] ?>">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <h3>You don't have any book request!</h3>
                <?php endif ?>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>