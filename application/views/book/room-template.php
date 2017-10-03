<div class="col-xs-12 gallery-content col-sm-12 col-md-8 col-md-offset-2">
    <?php if (count($gallery)): ?>
        <div id="gallery-carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#gallery-carousel" data-slide-to="0" class="active"></li>
                <?php for ($i = 1; $i < count($gallery); $i++) {
                    echo '<li data-target="#gallery-carousel" data-slide-to="'.$i.'"></li>';
                } ?>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="<?= $gallery[0] ?>" alt="<?= $gallery[0] ?>">
                      
                </div>
                <?php for ($i = 1; $i < count($gallery); $i++) {
                    echo '<div class="item"><img src="'.$gallery[$i].'" alt="'.$gallery[$i].'"></div>';
                } ?>
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#gallery-carousel" role="button" data-slide="prev">
                <img src="assets/img/left.png" class="img-25">
            </a>
            <a class="right carousel-control" href="#gallery-carousel" role="button" data-slide="next">
                <img src="assets/img/right.png" class="img-25">
            </a>
        </div>
    <?php else: ?>
        <img src="<?= $room['room_thumbnail'] ?>" class="img-responsive" alt="<?= $room['room_no'] ?>">
    <?php endif ?>
</div>
<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
    <div class="space-30"></div>
    <div class="text-left">
        <div class="h5">
            <img src="assets/img/bed.png" style="width: 25px;"> 
            <span class="badge-xs">
                <strong><?= $room['room_beds'] ?></strong>
            </span>
        </div>

        <div class="h5">
            <img src="assets/img/stretch.png" style="width: 25px;"> 
            <span class="badge-xs">
                <strong><?= $room['room_size'] ?></strong> m<sup>2</sup>
            </span>
        </div>

        <div class="h5">
            <img src="assets/img/daily.png"> 
            <span class="badge-xs">
                <strong><?= number_format($room['room_daily_tax'], 0, '.', ' ') ?></strong> 
                <sup><?= $currency ?></sup>
            </span>
        </div>

        <div class="h5">
            <img src="assets/img/weekly.png"> 
            <span class="badge-xs">
                <strong><?= number_format($room['room_weekly_tax'], 0, '.', ' ') ?></strong> 
                <sup><?= $currency ?></sup>
            </span>
        </div>
                
        <div class="h5">
            <img src="assets/img/monthly.png"> 
            <span class="badge-xs">
                <strong><?= number_format($room['room_monthly_tax'], 0, '.', ' ') ?></strong> 
                <sup><?= $currency ?></sup>
            </span>
        </div>
        <div class="text-justify">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. 
        </div>
    </div>

</div>
<div class="clearfix"></div>