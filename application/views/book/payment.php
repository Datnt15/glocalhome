<style type="text/css">
label {position: relative;color: #6A7C94;font-weight: 400;height: 48px;line-height: 48px;margin-bottom: 10px;display: block;}
label > span {float: left;}
.field {background: white;box-sizing: border-box;font-weight: 400;border: 1px solid #CFD7DF;border-radius: 25px !important;color: #32315E;outline: none;height: 48px;line-height: 48px;padding: 0 20px;cursor: text;width: 76%;float: right;}
.field::-webkit-input-placeholder { color: #CFD7DF; }
.field::-moz-placeholder { color: #CFD7DF; }
.field:-ms-input-placeholder { color: #CFD7DF; }
.field:focus, .field.StripeElement--focus { border-color: #F99A52; }
button {float: left;display: block;background-image: linear-gradient(-180deg, #F8B563 0%, #F99A52 100%);box-shadow: 0 1px 2px 0 rgba(0,0,0,0.10), inset 0 -1px 0 0 #E57C45;color: white;border-radius: 25px !important;border: 0;margin-top: 20px;font-size: 17px;font-weight: 500;width: 100%;height: 48px;line-height: 48px;outline: none;}
button:focus {background: #EF8C41;}
button:active {background: #E17422;}
.outcome {float: left;width: 100%;padding-top: 8px;min-height: 20px;text-align: center;}
.success, .error {display: none;font-size: 13px;}
.success.visible, .error.visible {display: inline;}
.error {color: #E4584C;}
.success {color: #F8B563;}
.success .token {font-weight: 500;font-size: 13px;}
</style>
<h2><?= lang('book-fill-content-title')?></h2>
<div class="space-30"></div>
<div class="col-xs-12 col-sm-12 col-md-6" id="room-info">
    <?= $room_template ?>
</div>
<div class="col-xs-12 col-sm-12 col-md-6">
    <script src="https://js.stripe.com/v3/"></script>
    <form method="POST" action="">
        <label>
            <span><?= lang('home-input-fullname') ?></span>
            <input name="cardholder-name" class="field" placeholder="John Doe/Nguyễn Văn A" value="<?= $book['customer_name'] ?>" />
        </label>
        <label>
            <span><?= lang('home-input-phone') ?></span>
            <input name="customer_phone" class="field" placeholder="(123) 456-7890" type="tel" value="<?= $book['customer_phone'] ?>" />
        </label>
        <label>
            <span><?= lang('home-input-mail') ?></span>
            <input name="customer_email" class="field" placeholder="example@gmail.com" value="<?= $book['customer_email'] ?>" />
        </label>
        <label>
            <span>Card</span>
            <div id="card-element" class="field"></div>
        </label>
        <button type="submit">Pay <?= $book['total_fee'] ?></button>
        <div class="outcome">
            <div class="error" role="alert"></div>
            <div class="success">
                Success! Your Stripe token is <span class="token"></span>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    var _currency = "<?= $currency ?>", _total = parseInt("<?= $book['total_fee'] ?>");
</script>

<div class="clearfix"></div>
<div class="space-30"></div>