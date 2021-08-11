<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INVENTORI :: Login </title>

    <!-- Icon Aplication -->
    <link rel="shortcut icon" type="image/ico" href="<?= base_url(); ?>assetsApp/dist/img/clipart.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>assetsApp/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url(); ?>assetsApp/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>assetsApp/dist/css/adminlte.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url(); ?>assetsApp/plugins/toastr/toastr.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h1><b>Inv</b> Plaza Meubel</h1>
            </div>
            <div class="card-body">
                <form action="<?= base_url('Login/actionLogin'); ?>" method="post" id="checkLogin">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" id="submit" name="submit" class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt"></i>&nbsp;&nbsp;Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url(); ?>assetsApp/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url(); ?>assetsApp/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(); ?>assetsApp/dist/js/adminlte.min.js"></script>
    <!-- jquery-validation -->
    <script src="<?= base_url(); ?>assetsApp/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?= base_url(); ?>assetsApp/plugins/jquery-validation/additional-methods.min.js"></script>
    <!-- Toastr -->
    <script src="<?= base_url(); ?>assetsApp/plugins/toastr/toastr.min.js"></script>

    <script type="text/javascript">
        $(function() {
            $("input[name='username']").focus();

            // $(".welcome").Toasts('create', {
            //     title: 'Welcome',
            //     autohide: true,
            //     delay: 3000,
            //     body: 'Aplikasi Inventory'
            // });

            let statusSuccess = "<?= $this->session->flashdata('notif'); ?>";
            let statusError = "<?= $this->session->flashdata('notifError'); ?>";

            if (statusSuccess) {
                toastr.success(statusSuccess);
            } else if (statusError) {
                toastr.warning(statusError);
            }

            $('#checkLogin').validate({
                rules: {
                    username: {
                        required: true
                    },
                    password: {
                        required: true
                    },
                },
                messages: {
                    username: {
                        required: "Please enter a username"
                    },
                    password: {
                        required: "Please provide a password"
                    }
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.input-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });

        });
    </script>
</body>

</html>