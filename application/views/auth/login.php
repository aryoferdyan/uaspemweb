<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>
        Login
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/css/style.css">
    <!-- Favicon -->
    <link href="<?php echo base_url(); ?>assets/img/fingerprint.png" rel="icon" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link href="<?php echo base_url(); ?>assets/assets_argon/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="<?php echo base_url(); ?>assets/assets_argon/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
    <!--End of Tawk.to Script-->
</head>

<body>
    <img class="wave" src="<?php echo base_url(); ?>assets/img/bg.png">
    <div class="container">
        <div class="img">
            <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_rycdh53q.json" background="transparent" speed="1" style="width: 500px; height: 400px;" loop autoplay></lottie-player>
        </div>
        <div class="login-content">
            <?php echo form_open('auth/cheklogin'); ?>
            <form action="" method="post">
                <?php
                $status_login = $this->session->userdata('status_login');
                if (empty($status_login)) {
                    $message = "Silahkan login untuk masuk ke aplikasi";
                } else {
                    $message = $status_login;
                }
                ?>
                <img src="<?php echo base_url(); ?>assets/img/about.svg">
                <h2 class="title"></h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="div">
                        <h5></h5>
                        <input placeholder="username/email" type="text" class="form-control" name="email" required="">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5></h5>
                        <input type="password" placeholder="password" class="form-control" name="password" required="">
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" style="background-color: #003b6f" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/login/js/main.js"></script>
    <script src="<?php echo base_url(); ?>assets/assets_argon/js/plugins/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/assets_argon/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js">
    </script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <!--   Optional JS   -->
    <!--   Argon JS   -->
    <script src="<?php echo base_url(); ?>assets/assets_argon/js/argon-dashboard.min.js?v=1.1.0"></script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
</body>

</html>