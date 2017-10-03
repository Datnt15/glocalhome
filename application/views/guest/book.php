<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase"> Managed Booking Request</span>
                </div>
            </div>
            <div class="portlet-body">
                <?php if (count($books)): ?>
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
                                <th> Room </th>
                                <th> Book No </th>
                                <th> Username </th>
                                <th> Email </th>
                                <th> Phone </th>
                                <th> Range </th>
                                <th> Total </th>
                                <th> Status </th>
                                <th> View </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($books as $book): ?>
                            <tr class="odd gradeX">
                                <td> <?= $book['room_no'] ?> </td>
                                <td> <?= $book['book_no'] ?> </td>
                                <td> <?= $book['customer_name'] ?> </td>
                                <td> <?= $book['customer_email'] ?> </td>
                                <td> <?= $book['customer_phone'] ?> </td>
                                <td> <?= $book['date_range'] ?> </td>
                                <td> <?= $book['total_fee'] ?> </td>
                                <?php switch ($book['status']) {
                                    case FILLED_INFO:?>
                                        <td>
                                            <span class="label label-sm label-warning"> Waiting to be paid </span>
                                        </td>
                                        <td> 
                                            <a href="<?= base_url('book/payment/'.$book['book_no']) ?>" class="btn btn-outline green">
                                                <i class="fa fa-pencil"></i>
                                            </a> 
                                        </td>
                                    <?php break;
                                    case PAID:?>
                                        <td>
                                            <span class="label label-sm label-success"> Paid </span>
                                        </td>
                                        <td> 
                                            <a href="<?= base_url('book/done/'.$book['book_no']) ?>" class="btn btn-outline green">
                                                <i class="fa fa-eye"></i>
                                            </a> 
                                        </td>
                                    <?php break;
                                    case DONE:?>
                                        <td>
                                            <span class="label label-sm label-success"> Approved </span>
                                        </td>
                                        <td> 
                                            <a href="<?= base_url('book/done/'.$book['book_no']) ?>" class="btn btn-outline green">
                                                <i class="fa fa-eye"></i>
                                            </a> 
                                        </td>
                                    <?php break;

                                    default:
                                        // code...
                                        break;
                                } ?>
                                
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