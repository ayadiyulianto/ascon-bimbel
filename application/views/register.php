<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login | OASSE - Bimbel Online</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
        ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('kiaalap/img/favicon.ico') ?>">
    <!-- Google Fonts
        ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('kiaalap/css/bootstrap.min.css') ?>">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('kiaalap/css/font-awesome.min.css') ?>">
    <!-- owl.carousel CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('kiaalap/css/owl.carousel.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('kiaalap/css/owl.theme.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('kiaalap/css/owl.transitions.css') ?>">
    <!-- animate CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('kiaalap/css/animate.css') ?>">
    <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('kiaalap/css/normalize.css') ?>">
    <!-- main CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('kiaalap/css/main.css') ?>">
    <!-- morrisjs CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('kiaalap/css/morrisjs/morris.css') ?>">
    <!-- mCustomScrollbar CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('kiaalap/css/scrollbar/jquery.mCustomScrollbar.min.css') ?>">
    <!-- metisMenu CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('kiaalap/css/metisMenu/metisMenu.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('kiaalap/css/metisMenu/metisMenu-vertical.css') ?>">
    <!-- calendar CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('kiaalap/css/calendar/fullcalendar.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('kiaalap/css/calendar/fullcalendar.print.min.css') ?>">
    <!-- buttons CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('kiaalap/css/buttons.css') ?>">

    <!-- forms CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('kiaalap/css/form/all-type-forms.css') ?>">
    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('kiaalap/style.css') ?>">
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('kiaalap/css/responsive.css') ?>">
    <!-- modernizr JS
        ============================================ -->
    <script src="<?php echo base_url('kiaalap/js/vendor/modernizr-2.8.3.min.js') ?>"></script>
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center custom-login">
				<h3>DAFTAR</h3>
				<p>This is the best app ever!</p>
			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <label style="color: blue">
                          <?php
                            $info=$this->session->flashdata('info');
                            if(!empty($info)) { echo $info;}
                          ?>
                        </label>
                        <label style="color: red">
                          <?php
                            $error=$this->session->flashdata('error');
                            if(!empty($error)) { echo $error;}
                            echo validation_errors();
                          ?>
                        </label>
                        <form id="loginForm" method="post">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>Username</label>
                                    <input type="text" required="required" name="username" class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Email</label>
                                    <input type="email" required="required" name="email" class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Password</label>
                                    <input type="password" required="required" name="password" class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Repeat Password</label>
                                    <input type="password" required="required" name="ulangipassword" class="form-control">
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-success btn-block loginbtn">Daftar</button>
                                <a class="btn btn-default btn-block" href="<?php echo base_url('auth/login') ?>">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
			</div>
			<div class="text-center login-footer">
				<p>Copyright © 2019. ASCON - Bimbel Online</p>
			</div>
		</div>   
    </div>
    <!-- jquery
        ============================================ -->
    <script src="<?php echo base_url('kiaalap/js/vendor/jquery-1.12.4.min.js') ?>"></script>
    <!-- bootstrap JS
        ============================================ -->
    <script src="<?php echo base_url('kiaalap/js/bootstrap.min.js') ?>"></script>
    <!-- wow JS
        ============================================ -->
    <script src="<?php echo base_url('kiaalap/js/wow.min.js') ?>"></script>
    <!-- price-slider JS
        ============================================ -->
    <script src="<?php echo base_url('kiaalap/js/jquery-price-slider.js') ?>"></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="<?php echo base_url('kiaalap/js/jquery.meanmenu.js') ?>"></script>
    <!-- owl.carousel JS
        ============================================ -->
    <script src="<?php echo base_url('kiaalap/js/owl.carousel.min.js') ?>"></script>
    <!-- sticky JS
        ============================================ -->
    <script src="<?php echo base_url('kiaalap/js/jquery.sticky.js') ?>"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="<?php echo base_url('kiaalap/js/jquery.scrollUp.min.js') ?>"></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="<?php echo base_url('kiaalap/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') ?>"></script>
    <script src="<?php echo base_url('kiaalap/js/scrollbar/mCustomScrollbar-active.js') ?>"></script>
    <!-- metisMenu JS
        ============================================ -->
    <script src="<?php echo base_url('kiaalap/js/metisMenu/metisMenu.min.js') ?>"></script>
    <script src="<?php echo base_url('kiaalap/js/metisMenu/metisMenu-active.js') ?>"></script>
    <!-- tab JS
        ============================================ -->
    <script src="<?php echo base_url('kiaalap/js/tab.js') ?>"></script>
    <!-- icheck JS
        ============================================ -->
    <script src="<?php echo base_url('kiaalap/js/icheck/icheck.min.js') ?>"></script>
    <script src="<?php echo base_url('kiaalap/js/icheck/icheck-active.js') ?>"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="<?php echo base_url('kiaalap/js/plugins.js') ?>"></script>
    <!-- main JS
        ============================================ -->
    <script src="<?php echo base_url('kiaalap/js/main.js') ?>"></script>
    <!-- tawk chat JS
        ============================================ -->
    <script src="<?php echo base_url('kiaalap/js/tawk-chat.js') ?>"></script>
</body>

</html>