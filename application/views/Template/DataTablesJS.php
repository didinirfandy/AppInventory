<!-- jQuery -->
<script src="<?= base_url(); ?>assetsApp/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>assetsApp/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url(); ?>assetsApp/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assetsApp/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assetsApp/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>assetsApp/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assetsApp/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>assetsApp/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assetsApp/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url(); ?>assetsApp/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>assetsApp/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>assetsApp/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>assetsApp/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>assetsApp/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assetsApp/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url(); ?>assetsApp/dist/js/demo.js"></script>
<!-- Toastr -->
<script src="<?= base_url(); ?>assetsApp/plugins/toastr/toastr.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url(); ?>assetsApp/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Time active -->
<script src="<?= base_url(); ?>assetsApp/dist/js/custom/time.js"></script>
<!-- moment -->
<script src="<?= base_url(); ?>assetsApp/plugins/moment/moment.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url(); ?>assetsApp/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- jquery-validation -->
<script src="<?= base_url(); ?>assetsApp/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url(); ?>assetsApp/plugins/jquery-validation/additional-methods.min.js"></script>

<!-- date-range-picker -->
<script src="<?= base_url(); ?>assetsApp/plugins/daterangepicker/daterangepicker.js"></script>
<!-- MagciSuggest -->
<!-- <script src="assetsApp/MagicSuggest/magicsuggest-min.js"></script> -->

<!-- Reload Page -->
<script type="text/javascript">
    $(function() {
        var refresh_rate = 120; //<-- In seconds, change to your needs
        var last_user_action = 0;
        var lost_focus = true;
        var focus_margin = 120; // If we lose focus more then the margin we want to refresh
        var allow_refresh = true; // on off sort of switch

        function keydown(evt) {
            if (!evt) evt = event;
            if (evt.keyCode == 192) {
                // Shift+TAB
                toggle_on_off();
            }
        } // function keydown(evt)


        function toggle_on_off() {
            if (can_i_refresh) {
                allow_refresh = false;
                console.log("Auto Refresh Off");
            } else {
                allow_refresh = true;
                console.log("Auto Refresh On");
            }
        }

        function reset() {
            last_user_action = 0;
            // console.log("Reset");
        }

        function windowHasFocus() {
            lost_focus = false;
            console.log(" <~ Has Focus");
        }

        function windowLostFocus() {
            lost_focus = true;
            console.log(" <~ Lost Focus");
        }

        setInterval(function() {
            last_user_action++;
            refreshCheck();
        }, 1000);

        function can_i_refresh() {
            if (last_user_action >= refresh_rate && lost_focus && allow_refresh) {
                return true;
            }
            return false;
        }

        function refreshCheck() {
            var focus = window.onfocus;

            if (can_i_refresh()) {
                window.location.reload(); // If this is called no reset is needed
                reset(); // We want to reset just to make sure the location reload is not called.
            } else {
                // console.log("Timer");
            }
        }

        window.addEventListener("focus", windowHasFocus, false);
        window.addEventListener("blur", windowLostFocus, false);
        window.addEventListener("click", reset, false);
        window.addEventListener("mousemove", reset, false);
        window.addEventListener("keypress", reset, false);
        window.onkeyup = keydown;
    });
</script>