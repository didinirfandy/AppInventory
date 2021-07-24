<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INMAN :: Login </title>

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
                <a href="<?= base_url(); ?>assetsApp/index2.html" class="h1"><b>Admin</b>Infentory</a>
            </div>
            <div class="card-body">
                <!-- <p class="login-box-msg">Sign in to start your session</p> -->

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
                            <button type="submit" id="submit" name="submit" class="btn btn-primary btn-block">Login</button>
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

            let status = "<?= $this->session->flashdata('notif'); ?>";
            console.log(status);
            if (status) {
                toastr.success(status);
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