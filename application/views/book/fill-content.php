<h2><?= lang('book-fill-content-title') . ' ' . $room['room_no'] ?></h2>

<form role='form' method="POST" action="" id="book-form">
    <div class="form-body">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label><?= lang('home-input-fullname') ?></label>
                <div class="input-icon left">
                    <i class="fa fa-user"></i>
                    <input class="form-control input-circle" placeholder="John Doe/Nguyễn Văn A" type="text" name="customer_name" value="<?= $user['fullname'] ?>" required> 
                </div>
                <p class="help-block h6"><?= lang('book-fullname-helper') ?></p>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label><?= lang('home-input-mail') ?></label>
                        <div class="input-icon left">
                            <i class="fa fa-envelope-o"></i>
                            <input class="form-control input-circle" placeholder="example@gmail.com" type="email" name="customer_email" value="<?= $user['email'] ?>" required> 
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label><?= lang('home-input-phone') ?></label>
                        <div class="input-icon left">
                            <i class="fa fa-phone"></i>
                            <input class="form-control input-circle" placeholder="+84 987 456 123" type="number" name="customer_phone" value="<?= $user['phone'] ?>" required> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label><?= lang('book-date-range') ?></label>
                <div class="input-icon left">
                    <i class="fa fa-calendar"></i>
                    <input class="form-control input-circle input-daterange" type="text" name="book_date_range" required> 
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-warning">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <h4 class="panel-title" style="color: #333;">
                                        <?= lang('book-other-request') ?>: 
                                    </h4>
                                </a>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <div class="md-checkbox">
                                                <input type="checkbox" id="wanna_check_in_late" name="wanna_check_in_late" class="md-check">
                                                <label for="wanna_check_in_late">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> <?= lang('book-late-check') ?> 
                                                </label>
                                            </div>
                                            <div class="collapse row">
                                                <div class="input-icon left">
                                                    <i class="fa fa-calendar-check-o fa-lg"></i>
                                                    <input type="text" name="new_check_in_time" class="form-control datetimepicker  input-circle">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <div class="md-checkbox">
                                                <input type="checkbox" name="wanna_check_in_soon" id="wanna_check_in_soon" class="md-check">
                                                <label for="wanna_check_in_soon">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> <?= lang('book-check-soon') ?>
                                                </label>
                                            </div>
                                            <div class="collapse row">
                                                <div class="input-icon left">
                                                    <i class="fa fa-calendar-check-o fa-lg"></i>
                                                    <input type="text" name="new_check_in_time" class="form-control datetimepicker  input-circle">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        
                                    <div class="col-xs-12">
                                        <div class="md-checkbox">
                                            <input type="checkbox" name="register_airport_pickup" id="register_airport_pickup" class="md-check">
                                            <label for="register_airport_pickup">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span> <?= lang('book-airport-pickup') ?> 
                                            </label>
                                        </div>
                                        <div class="collapse row">
                                            <textarea class="form-control" rows="3" name="flight-info" placeholder="<?= lang('book-airport-pickup-helper') ?>"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="room_daily_tax" value="<?= $room['room_daily_tax'] ?>">
            <input type="hidden" name="room_weekly_tax" value="<?= $room['room_weekly_tax'] ?>">
            <input type="hidden" name="room_monthly_tax" value="<?= $room['room_monthly_tax'] ?>">
            <input type="hidden" name="currency" value="<?= $currency ?>">
            <input type="hidden" name="accessToken" value="<?= $accessToken ?>">
            <div class="row">
                <div class="col-xs-9">
                    <?= lang('book-total-rent') ?>
                    <i class="fa fa-question-circle" id="rent_info" aria-hidden="true" data-toggle="popover" data-trigger="hover" title="<?= lang('book-price-detail') ?>" data-placement="top" data-html="true" data-content="<table class='table table-striped'><tr><td><span class='text-muted'><?= lang('book-monthly-price') ?></span></td><td></td></tr><tr><td><?= number_format($room['room_monthly_tax'], 0, '.', ' ') ?><sup><?= $currency ?></sup> x 0 <?= lang('book-month') ?></td><td>0 <sup><?= $currency ?></sup></td></tr><tr><td><span class='text-muted'><?= lang('book-weekly-price') ?></span></td><td></td></tr><tr><td><?= number_format($room['room_weekly_tax'], 0, '.', ' ') ?><sup><?= $currency ?></sup> x 0 <?= lang('book-week') ?></td><td>0 <sup><?= $currency ?></sup></td></tr><tr><td><span class='text-muted'><?= lang('book-daily-price') ?></span></td><td></td></tr><tr><td><?= number_format($room['room_daily_tax'], 0, '.', ' ') ?><sup><?= $currency ?></sup> x 0 <?= lang('book-day') ?></td><td>0 <sup><?= $currency ?></sup></td></tr><tr><td><b><?= lang('book-total-rent') ?></b></td><td>0 <sup><?= $currency ?></sup></td></tr></table>"></i>
                </div>
                <div class="col-xs-3 text-right">
                    <span id="rent_fee">0</span> <sup><?= $currency ?></sup>
                </div>
                <br>
                <br>
                <div class="col-xs-9">
                    <?= lang('book-service') ?>
                    <i class="fa fa-question-circle" aria-hidden="true" data-toggle="popover" data-trigger="hover" title="<?= lang('book-other-service') ?>" data-placement="top" data-html="true" data-content="<table class='table table-striped'><tr><td><?= lang('book-service-clean') ?></td><td>0 <sup><?= $currency ?></sup></td></tr><tr><td><?= lang('book-service-parking') ?></td><td>0 <sup><?= $currency ?></sup></td></tr></table>"></i>
                </div>
                <div class="col-xs-3 text-right">
                    0 <sup><?= $currency ?></sup>
                </div>
                <div class="col-xs-12"><hr></div>
                <div class="col-xs-9">
                    <strong><?= lang('book-total') ?></strong>
                </div>
                <div class="col-xs-3 text-right">
                    <span id="total_fee">0</span> <sup><?= $currency ?></sup>
                </div>
                <div class="col-xs-12">
                    <div class="space-30"></div>
                    <button class="btn btn-outline btn-circle btn-lg yellow form-control">
                        <?= lang('room-book-btn') ?>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6" id="room-info">
            <?= $room_template ?>
        </div>
    </div>
</form>

<script type="text/javascript">
    var _invalidDate = [];
    <?php if (count($invalidDates)): ?>
        <?php foreach ($invalidDates as $booked_date): ?>
            _invalidDate.push("<?= $booked_date['date_range'] ?>");
        <?php endforeach ?>
    <?php endif ?>
</script>