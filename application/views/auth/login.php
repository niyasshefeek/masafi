<!DOCTYPE html>
<html lang="en-us">
	<head>
    	<meta name="robots" content="nofollow, noindex" />
		<meta charset="utf-8">
		<title>Masafi - <?php echo lang('login_heading');?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo HTTP_CSS_PATH?>bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo HTTP_CSS_PATH?>font-awesome.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo HTTP_CSS_PATH?>smartadmin-production-plugins.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo HTTP_CSS_PATH?>smartadmin-production.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo HTTP_CSS_PATH?>smartadmin-skins.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo HTTP_CSS_PATH?>lockscreen.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo HTTP_CSS_PATH?>main.css">
		<link rel="shortcut icon" href="<?php echo HTTP_APP_IMAGES_PATH?>shuraa-icon.png" type="image/png">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

	</head>

	<body class="menu-on-top login-page">

		<div id="main" role="main">

			<!-- MAIN CONTENT -->

			<?php echo form_open("auth/login",array('class' => 'lockscreen animated flipInY'));?>
				<div class="logo">
					<h1 class="semi-bold"></h1>
				</div>
				<div class="loginpage">
					<img src="<?php echo HTTP_IMAGES_PATH ?>masafi-logo.png" alt="Masafi" width="80" height="142" />
					<div>
                        <h1>login</h1>
						<p><?php echo lang('login_subheading');?></p>
						<div class="input-group">
                            <?php echo form_input($identity);?>
							<?php echo form_input($password);?>
                            <?php echo lang('login_remember_label', 'remember: ');?>
    						<?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
							<div class="input-group-btn">
								<button class="btn btn-primary login-button" type="submit">
									<i class="fa fa-key"></i>
								</button>
							</div>

						</div>
						<div style="color:red;font-size:15px;"><div id="infoMessage"><?php echo $message;?></div></div>
					</div>

				</div>

                <p class="font-xs margin-top-5">
					<?php /*?><a href="forgot_password"><?php echo lang('login_forgot_password');?></a> | <?php */?>Copyright Masafi <?php echo date('Y'); ?>.

				</p>
			<?php echo form_close();?>

		</div>

		<!--================================================== -->

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<script src="<?php echo HTTP_JS_PATH?>plugin/pace/pace.min.js"></script>

	    <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script> if (!window.jQuery) { document.write('<script src="<?php echo HTTP_JS_PATH?>libs/jquery-2.1.1.min.js"><\/script>');} </script>

	    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script> if (!window.jQuery.ui) { document.write('<script src="<?php echo HTTP_JS_PATH?>libs/jquery-ui-1.10.3.min.js"><\/script>');} </script>

		<!-- IMPORTANT: APP CONFIG -->
		<script src="<?php echo HTTP_JS_PATH?>app.config.js"></script>

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events
		<script src="<?php echo HTTP_JS_PATH?>plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> -->

		<!-- BOOTSTRAP JS -->
		<script src="<?php echo HTTP_JS_PATH?>bootstrap/bootstrap.min.js"></script>

		<!-- JQUERY VALIDATE -->
		<script src="<?php echo HTTP_JS_PATH?>plugin/jquery-validate/jquery.validate.min.js"></script>

		<!-- JQUERY MASKED INPUT -->
		<script src="<?php echo HTTP_JS_PATH?>plugin/masked-input/jquery.maskedinput.min.js"></script>

		<!--[if IE 8]>

			<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

		<![endif]-->

		<!-- MAIN APP JS FILE -->
		<script src="<?php echo HTTP_JS_PATH?>app.min.js"></script>

	</body>
</html>
