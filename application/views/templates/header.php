<?php defined('BASEPATH') OR exit('No direct script access allowed');
$version = 'crmv000_01';
?>
<!DOCTYPE html>
<html lang="en-us">
	<head>
    	<meta name="robots" content="nofollow, noindex" />
		<meta charset="utf-8">
		<title>Masafi - <?php echo $title?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo HTTP_CSS_PATH?>bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo HTTP_CSS_PATH?>font-awesome.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo HTTP_CSS_PATH?>smartadmin-production-plugins.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo HTTP_CSS_PATH?>smartadmin-production.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo HTTP_CSS_PATH?>smartadmin-skins.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo HTTP_CSS_PATH?>main.css<?php //echo '?'.$version?>">
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo HTTP_CSS_PATH?>bootstrap-datepicker3.min.css">
		<link rel="shortcut icon" href="<?php echo HTTP_APP_IMAGES_PATH?>shuraa-icon.png" type="image/png">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">


		<!--================================================== -->

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->


		<script data-pace-options='{ "restartOnRequestAfter": true }' src="<?php echo HTTP_JS_PATH?>plugin/pace/pace.min.js"></script>

		<!-- #PLUGINS -->
		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
		<script src="<?php echo HTTP_JS_PATH?>jquery.min.js"></script>
		<script>
			if (!window.jQuery) {
				document.write('<script src="<?php echo HTTP_JS_PATH?>libs/jquery-2.1.1.min.js"><\/script>');
			}
		</script>

		<script src="<?php echo HTTP_JS_PATH?>jquery-ui.min.js"></script>
		<script>
			if (!window.jQuery.ui) {
				document.write('<script src="<?php echo HTTP_JS_PATH?>libs/jquery-ui-1.10.3.min.js"><\/script>');
			}
		</script>

        <script src="https://use.fontawesome.com/fa545e23b4.js"></script>









	</head>

	<body class="menu-on-top smart-style-3">
		<header id="header">
			<div id="logo-group">
				<span id="logo"> <img src="<?php echo HTTP_IMAGES_PATH ?>masafi-logo.png" alt="Masafi"> </span>
				<span id="activity" class="activity-dropdown"> <i class="fa fa-user"></i> <b id="" class="badge badger"> 0 </b> </span>
				<div class="ajax-dropdown">
					<div class="btn-group btn-group-justified" data-toggle="buttons">
						<label class="btn btn-warning">

							Msgs (<b class="badger">0</b>) </label>

					</div>

					<div class="ajax-notifications custom-scroll" style="opacity: 1;">
					<ul id="top-notification" class="notification-body">




						</ul>
				   </div>

					<span> Last updated on: 12/12/2013 9:43AM
						<button type="button" data-loading-text="<i class='fa fa-refresh fa-spin'></i> Loading..." class="btn btn-xs btn-default pull-right">
							<i class="fa fa-refresh"></i>
						</button> </span>

				</div>
			</div>
			<div class="project-context hidden-xs">

				<span class="label"><b><?php  echo $this->ion_auth->get_users_groups()->row()->description?></b> Logged in </span>
				<span class="project-selector dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php  echo $this->ion_auth->user()->row()->first_name;?></span>
				<?php /*?><ul class="dropdown-menu">
					<li>
						<a href="javascript:void(0);">Online e-merchant management system - attaching integration with the iOS</a>
					</li>
					<li>
						<a href="javascript:void(0);">Notes on pipeline upgradee</a>
					</li>
					<li>
						<a href="javascript:void(0);">Assesment Report for merchant account</a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="javascript:void(0);"><i class="fa fa-power-off"></i> Clear</a>
					</li>
				</ul><?php */?>

			</div>
				<div class="header-center-block"><h1>Masafi</h1></div>

			<div class="pull-right">

				<div id="hide-menu" class="btn-header pull-right">
					<span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
				</div>

				<ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
					<li style="    margin-top: 9px;">
							<a title="Logout" href="<?php echo base_url('logout')?>/" class="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i class="fa fa-sign-out fa-lg"></i> <strong><u>L</u>ogout</strong> <?php  echo $this->ion_auth->user()->row()->first_name;?></a>

					</li>
				</ul>

				<div id="fullscreen" class="btn-header transparent pull-right">
					<span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Full Screen"><i class="fa fa-arrows-alt"></i></a> </span>
				</div>

			</div>

		</header>
		<aside id="left-panel">
			<div class="login-info">
				<span>

					<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
						<img src="<?php echo HTTP_IMAGES_PATH?>avatars/male.png" title="<?php  echo $this->ion_auth->user()->row()->first_name;?>" class="online" />
						<span>
							<?php  echo $this->ion_auth->get_users_groups()->row()->description?>
						</span>
						<i class="fa fa-angle-down"></i>
					</a>

				</span>
			</div>
			<nav>

				<ul>
					<li <?php echo ($title=='Users')?'class="active"': '';?>>
						<a href="<?php echo base_url('/')?>"><i class="fa fa-home" aria-hidden="true"></i>
 <span class="menu-item-parent">DASHBOARD</span></a>
					</li>
					<li <?php echo ($title=='Users')?'class="active"': '';?>>
						<a href="<?php echo base_url('customers/')?>"><i class="fa fa-lg fa-fw fa-user"></i> <span class="menu-item-parent">CUSTOMERS</span></a>
					</li>
				<?php if($this->ion_auth->is_admin()){?>

					<li <?php echo ($title=='Users')?'class="active"': '';?>>
						<a href="<?php echo base_url('auth')?>"><i class="fa fa-lg fa-fw fa-user-o"></i> <span class="menu-item-parent">USERS</span></a>
					</li>

				 <?php }else{?>

					<li <?php echo ($title=='Settings')?'class="active"': '';?>>
						<a href="<?php echo base_url('auth/change_password')?>"><i class="fa fa-lg fa-fw fa-cog"></i> <span class="menu-item-parent">SETTINGS</span></a>
					</li>


					<?php }?>



				</ul>
			</nav>


			<span class="minifyme" data-action="minifyMenu"> <i class="fa fa-arrow-circle-left hit"></i> </span>

		</aside>
