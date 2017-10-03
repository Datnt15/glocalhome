            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
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
        </div>
    </div>
    <!-- END CONTAINER -->
</div>

<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/js.cookie.min.js" type="text/javascript"></script>
<script src="assets/js/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/js/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap-editable.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap3-typeahead.min.js" type="text/javascript"></script>
<script src="assets/js/select2.full.min.js" type="text/javascript"></script>
<script src="assets/js/datatable.min.js" type="text/javascript"></script>
<script src="assets/js/datatables-2.min.js" type="text/javascript"></script>
<script src="assets/js/datatables.bootstrap.js" type="text/javascript"></script>
<script src="assets/js/toastr.min.js" type="text/javascript"></script>
<script src="assets/js/app.min.js" type="text/javascript"></script>
<script src="assets/js/profile.js" type="text/javascript"></script>
<?php if ($this->session->flashdata('type')): ?>
<script type="text/javascript">
jQuery(document).ready(function() {   
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "positionClass": "toast-top-right",
        "onclick": null,
        "showDuration": "1000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    toastr['<?= $this->session->flashdata('type') ?>']('<?= $this->session->flashdata('msg'); ?>', '<?= $this->session->flashdata('title') ?>');
});
</script>
<?php endif ?>
<!-- END CORE PLUGINS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="assets/js/layout.min.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>