<!-- jQuery -->
<script src="<?= base_url(); ?>assetsApp/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url(); ?>assetsApp/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)

    $(".welcome").Toasts('create', {
        title: 'Welcome',
        autohide: true,
        delay: 3000,
        body: 'Aplikasi Inventory'
    });
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>assetsApp/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url(); ?>assetsApp/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url(); ?>assetsApp/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url(); ?>assetsApp/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url(); ?>assetsApp/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url(); ?>assetsApp/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url(); ?>assetsApp/plugins/moment/moment.min.js"></script>
<script src="<?= base_url(); ?>assetsApp/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url(); ?>assetsApp/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url(); ?>assetsApp/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url(); ?>assetsApp/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assetsApp/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url(); ?>assetsApp/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url(); ?>assetsApp/dist/js/pages/dashboard.js"></script>
<!-- Toastr -->
<script src="<?= base_url(); ?>assetsApp/plugins/toastr/toastr.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url(); ?>assetsApp/plugins/select2/js/select2.full.min.js"></script>
<!-- Time active -->
<script src="<?= base_url(); ?>assetsApp/dist/js/custom/time.js"></script>
<!-- date-range-picker -->
<script src="<?= base_url(); ?>assetsApp/plugins/daterangepicker/daterangepicker.js"></script>

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
            console.log("Reset");
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
                console.log("Timer");
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