<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase"> Managed Users</span>
                </div>
            </div>
            <div class="portlet-body">
                <?php if (count($users)): ?>
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
                    </div>
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                        <thead>
                            <tr>
                                <th><?= lang('user-table-username') ?></th>
                                <th><?= lang('user-table-email') ?></th>
                                <th><?= lang('user-table-phone') ?></th>
                                <th><?= lang('user-table-address') ?></th>
                                <th><?= lang('user-table-fullname') ?> </th>
                                <th><?= lang('user-table-book') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                            <tr>
                                <td> <?= $user['username'] ?> </td>
                                <td> <?= $user['email'] ?> </td>
                                <td> <?= $user['phone'] ?> </td>
                                <td> <?= $user['address'] ?> </td>
                                <td> <?= $user['fullname'] ?> </td>
                                <td> <?= $user['type'] ?> </td>
                                <td>  </td>
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