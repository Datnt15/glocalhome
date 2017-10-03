<h2><?= lang('book-done-title')?></h2>
<div class="space-30"></div>
<div class="col-xs-12 col-sm-12 col-md-6" id="room-info">
    <?= $room_template ?>
</div>
<div class="col-xs-12 col-sm-12 col-md-6">
    <div class="row">
        <h3><?= lang('book-guest-info') ?></h3>
        <div class="col-xs-12 col-sm-4">
            <i class="fa fa-users"></i> <strong><?= $book['customer_name'] ?></strong>
        </div>
        <div class="col-xs-12 col-sm-4">
            <i class="fa fa-phone"></i> <strong><?= $book['customer_phone'] ?></strong>
        </div>
        <div class="col-xs-12 col-sm-4">
            <i class="fa fa-envelope-o"></i> <strong><?= $book['customer_email'] ?></strong>
        </div>
    </div>
    <hr>
    <div class="row">
        <h3><?= lang('book-book-info') ?></h3>
        <div class="col-xs-12 col-sm-4">
            <?= lang('tooltip-title') ?>: <strong><?= $book['room_no'] ?></strong>
        </div>
        <div class="col-xs-12 col-sm-4">
            <?= lang('book-total') ?>: <strong><?= $book['total_fee'] ?></strong>
        </div>
        <div class="col-xs-12 col-sm-4">
            <?= lang('book-payment-status') ?>: <strong><?= $book['status'] == 1 ? lang('book-filled-status') : lang('book-paid-status') ?></strong>
        </div>
        <br>
        <br>
        <div class="col-xs-12 col-sm-12">
            <?= lang('book-date-range') ?>: <strong><?= $book['date_range'] ?></strong>
        </div>
    </div>
    <hr>
    <div class="row">
        <h3><?= lang('book-other-request') ?></h3>
        <?= $book['other_request'] ?>
        <div class="col-xs-12 col-sm-4"></div>
    </div>
</div>

<div class="clearfix"></div>
<div class="space-30"></div>