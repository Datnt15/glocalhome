                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="page-footer">
        <div class="page-footer-inner"> <?php echo date("Y"); ?> &copy; <?= lang('theme-author') ?>
            <a target="_blank" href="mailto:tiendatbt19@gmail.com">Nguyễn Tiến Đạt</a> &nbsp;|&nbsp;
            <a href="https://fb.com.ntd.15" title="Contact me on facebook" class="btn blue btn-outline" target="_blank">
                <i class="fa fa-facebook"></i>
            </a> 
            <a href="mailto:tiendatbt19@gmail.com" title="Tell me you request" class="btn red btn-outline">
                <i class="fa fa-envelope"></i>
            </a>
            <a href="tel:01662727846" title="Talk to me" class="btn green btn-outline">
                <i class="fa fa-phone"></i>
            </a>
        </div>
        <div class="scroll-to-top btn btn-outline yellow">
            <i class="fa fa-angle-double-up fa-lg"></i>
        </div>
    </div> -->
    <script type="text/javascript">
        var days = months = [], cancelText = applyText = '';
        applyText = "<?= lang('book-apply') ?>";
        cancelText = "<?= lang('book-cancel') ?>";
        <?php if ($language == 'english'): ?>
            days = ["Su","Mo","Tu","We","Th","Fr","Sa"];
            months =  ["January","February","March","April","May","June","July","August","September","October","November","December"];
        <?php else: ?>
            days = ["Hai","Ba","Tư","Năm","Sáu","Bảy","CN"];
            months =  ["Tháng Giêng","Tháng Hai","Tháng Ba","Tháng Tư","Tháng Năm","Tháng Sáu","Tháng Bảy","Tháng Tám","Tháng Chín","Tháng Mười","Tháng Mười Một","Tháng Chạp"];
        <?php endif ?>
    </script>
    <?php if ($step == 2): ?>
        <script src="assets/js/payment.js" type="text/javascript"></script>
    <?php endif ?>
    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/moment.min.js" type="text/javascript"></script>
    <script src="assets/js/daterangepicker.min.js" type="text/javascript"></script>
    <script src="assets/js/toastr.min.js" type="text/javascript"></script>
    <script src="assets/js/book.js" type="text/javascript"></script>
    <?php if ($this->session->flashdata('type')): ?>
        <script type="text/javascript">
            jQuery(document).ready(function() {   
                toastr['<?= $this->session->flashdata('type') ?>']('<?= $this->session->flashdata('msg'); ?>', '<?= $this->session->flashdata('title') ?>');
            });
        </script>
    <?php endif ?>
</body>
</html>
