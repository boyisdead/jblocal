<?php
session_start();
include('server/connect.php');
if(isset($_SESSION['ssUsername2'])){$username=$_SESSION['ssUsername2'];}
else if(!isset($_SESSION['ssUsername2'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}


$id=base64_decode($_REQUEST['id']);

$sql="SELECT COUNT(*) FROM user WHERE username != '$username' ";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_assoc($result);
$num=$row['COUNT(*)'];
$numAll=$num;

$sql="SELECT * FROM user WHERE username = '$username'";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_assoc($result);
$iduser = $row['id'];

$sqlT="SELECT * FROM userDB2 WHERE id = '$id' ";
$resultT=mysql_query($sqlT)or die(mysql_error());
$rowT=mysql_fetch_assoc($resultT);



?>
<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Tracker process bar</title>
		<meta name="keywords" content="<?=$rowT['id']?>" />
		<meta name="description" content="Tracker process bar">
	

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
				<!-- Set Up the App Icon -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/img/ios/h/touch-icon-ipad-retina.png" />
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/img/ios/h/apple-touch-icon.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/img/ios/m/apple-touch-icon.png">
		<link rel="apple-touch-icon-precomposed" href="assets/img/ios/l/apple-touch-icon-precomposed.png">
		<link rel="icon" href="assets/images/ico/icon.png" type="image/gif" sizes="48x48">

		<!-- Load It Like A Native App -->
		<meta name="apple-touch-fullscreen" content="yes">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">


		<!-- Customize the Startup Screen -->
		<link rel="apple-touch-startup-image" href="assets/img/ios/l/apple-touch-startup-image-320x460.png"media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 1)">
		<link rel="apple-touch-startup-image" href="assets/img/ios/h/apple-touch-startup-image-640x920.png" media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 2)">
		<link rel="apple-touch-startup-image" href="assets/img/ios/h/apple-touch-startup-image-640x1096.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)">
		<link rel="apple-touch-startup-image" href="assets/img/ios/l/apple-touch-startup-image-768x1004.png" media="(device-width: 768px) and (device-height: 1024px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 1)">
		<link rel="apple-touch-startup-image" href="assets/img/ios/l/apple-touch-startup-image-748x1024.png" media="(device-width: 768px) and (device-height: 1024px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 1)">
		<link rel="apple-touch-startup-image" href="assets/img/ios/h/apple-touch-startup-image-1536x2008.png" media="(device-width: 768px) and (device-height: 1024px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2)">
		<link rel="apple-touch-startup-image" href="assets/img/ios/h/apple-touch-startup-image-1496x2048.png" media="(device-width: 768px) and (device-height: 1024px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 2)">


		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />

		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Specific Page Vendor CSS -->		<link rel="stylesheet" href="assets/vendor/select2/select2.css" />		
		<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />	
		<link rel="stylesheet" href="assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme1.css" />
		<link rel="stylesheet" href="assets/style.css" />
		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.js"></script>
	</head>
	<body class="loading-overlay-showing" data-loading-overlay>
		<span class="loading-overlay dark"> 
    		<span class="loader white"></span> 
		</span>
		<section class="body">
			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="Dashboard" class="logo">
						<img src="assets/images/logo.png?m=<?php echo filemtime('logo.png'); ?>" height="38"  />
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
			
					
			
					
					<span class="separator"></span>
			
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="avatar/<?=$row['Image']?>" width="35" height="35" alt="<?=$row['username']?>" class="img-circle" data-lock-picture="avatar/<?=$row['Image']?>" />
							</figure>
							<div class="profile-info" data-lock-name="<?=$row['username']?>" data-lock-email="<?=$rowme['email']?>">
								<span class="name"><?=$row['First_Name']?> <?=$row['Last_Name']?></span>
								<span class="role"><?=$row['position']?></span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="profile.php" onclick="clicksound.playclip()"><i class="fa fa-user"></i> My Profile</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="pages-lock-screen" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="server/logout.php?id=<?=$row['id']?>" onclick="clicksound.playclip()"><i class="fa fa-power-off"></i> Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">
				
					<div class="sidebar-header">
						<div class="sidebar-title">
							Navigation
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>
				
					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">
									<li>
										<a href="profile.php" onclick="clicksound.playclip()">
											<i class="fa fa-user " aria-hidden="true"></i>
											<span>User Profile</span>
										</a>
									</li>
									<li class="nav-expanded nav-active">
										<a href="owner.php" onclick="clicksound.playclip()">
											<i class="fa fa-gavel " aria-hidden="true"></i>
											<span>Owner DB</span>
										</a>
									</li>
									<li class="nav-parent ">
										<a>
											<i class="fa fa-user-secret" aria-hidden="true"></i>
											<span>All Candidate</span>
										</a>
										<ul class="nav nav-children">
<?php
$sqlc="SELECT * FROM user WHERE id != $iduser";
		$resultc=mysql_query($sqlc)or die(mysql_error());
		for($i=0;$rowc=mysql_fetch_assoc($resultc);$i++){
?>
											<li >
												<a href="All_candidate.php?id=<?=$rowc['id']?>">
													<i class="fa fa-user" aria-hidden="true"></i> <?=$rowc['username']?>
												</a>
											</li>
<?php
}
?>
										</ul>
									</li>
									
									<?php
									if($_SESSION['ssUserId']==4){
									?>	

									<li>
										<a href="Dashboard.php" onclick="clicksound.playclip()">
											<i class="fa fa-line-chart" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
									</li>

									<li >
										<a href="employee.php" onclick="clicksound.playclip()">
											<i class="fa fa-street-view" aria-hidden="true"></i>
											<span>Employee</span>
										</a>
									</li>
									
									<li class="nav-parent ">
										<a>
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<span>Email Subscriber</span>
										</a>
										<ul class="nav nav-children">
											<li >
												<a href="compose.php">
													 Compose
												</a>
											</li>
											<li>
												<a href="send_compose.php">
													 Send Email
												</a>
											</li>
											<li>
												<a href="send_compose_test.php">
													 Send Email test
												</a>
											</li>
											<li>
												<a href="compose_history.php">
													 History Email
												</a>
											</li>
										</ul>
									</li>
									<li>
										<a href="candidate.php" onclick="clicksound.playclip()">
											<i class="fa fa-users" aria-hidden="true"></i>
											<span>Candidate</span>
										</a>
									</li>
									<li class="nav-parent">
										<a>
											<i class="fa fa-linkedin-square " aria-hidden="true"></i>
											<span>User linkedin</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="user_linkedin.php">
													 User group 2
												</a>
											</li>
											<li>
												<a href="user_linkedin2.php">
													 User group 2
												</a>
											</li>
											
										</ul>
									</li>
									<li>
										<a href="category.php" onclick="clicksound.playclip()">
											<i class="fa fa-cubes" aria-hidden="true"></i>
											<span>Category</span>
										</a>
									</li>
									<li>
										<a href="job_level.php" onclick="clicksound.playclip()">
											<i class="fa fa-star-half-o" aria-hidden="true"></i>
											<span>Job level</span>
										</a>
									</li>
									<li>
										<a href="job.php" onclick="clicksound.playclip()">
											<i class="fa fa-cube" aria-hidden="true"></i>
											<span>Job</span>
										</a>
									</li>
									<li>
										<a href="Hot-job.php" onclick="clicksound.playclip()">
											<i class="fa fa-fire" aria-hidden="true"></i>
											<span>Hot Job</span>
										</a>
									</li>
									<li >
										<a href="Pick-job.php" onclick="clicksound.playclip()">
											<i class="fa fa-paw" aria-hidden="true"></i>
											<span>Pick Job</span>
										</a>
									</li>
									<li>
										<a href="job-ap.php" onclick="clicksound.playclip()">
											<i class="fa fa-building-o" aria-hidden="true"></i>
											<span>Job Apply</span>
										</a>
									</li>
									<li>
										<a href="job-refer.php" onclick="clicksound.playclip()">
											<i class="fa fa-user-plus" aria-hidden="true"></i>
											<span>Job Refer</span>
										</a>
									</li>
									<li>
										<a href="setting.php" onclick="clicksound.playclip()">
											<i class="fa fa-cog " aria-hidden="true"></i>
											<span>Setting</span>
										</a>
									</li>


									<?php
									}else{
									?>
									<li>
										<a href="Dashboard2.php" onclick="clicksound.playclip()">
											<i class="fa fa-line-chart" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
									</li>

									<?php	
									}
									?>
									

									
								</ul>
							</nav>
				
							
				
							<hr class="separator" />
				
							
						</div>
				
					</div>
				
				</aside>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Tracker process bar</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="Dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
								
								<li><span>Tracker process bar</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right" onclick="clicksound.playclip()"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
						<section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#"  class="panel-action panel-action-toggle" data-panel-toggle></a>
									
								</div>
						
								<h2 class="panel-title" style="font-size: 20px;">Tracker process bar Info</h2>
							</header>


							<div class="panel-body">

								<div class="col-md-12" style="padding-left: 0px;">

<div class="col-md-4" style="padding-left: 0px;">
<h4 style="    margin-bottom: 0px;"><i class="fa fa-smile-o"></i> <?=$rowT['First_Name']?> <?=$rowT['Last_Name']?></h4>
<a href="#Add_new_top" class="modal-with-zoom-anim mb-xs mt-xs mr-xs btn btn-sm btn-primary" style="margin-left:20px;"><i class="fa fa-plus"></i> New Job</a>



<!--  start model popup   -->


<div id="Add_new_top" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
										<form id="demo-form2" class="form-horizontal mb-lg"  action="process/owner/ownerInsert_Tr.php" method="post" enctype="multipart/form-data">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Tracker process bar <?=$row['username']?> ?</h2>
											</header>
											<div class="panel-body">
									<div id="showalert1"></div>
										
										<input name="id" type="hidden" id="id" value="<?=base64_encode($rowT['id'])?>"/>
										<input name="adid" type="hidden" id="id" value="<?=$iduser?>"/>
												
													
													

								                    <div class="form-group">
										                <label for="no" class="col-sm-3 control-label">Job id</label>
										                <div class="col-sm-7">
										                	<select data-plugin-selecttwo name="jobid" id="jobid" class="form-control populate select2-offscreen" required="required">
										                    <option value="0"> -- Choose Job -- </option>
										                        <?php
										                        $sql5="SELECT id, title FROM job_post";
																$result5=mysql_query($sql5)or die(mysql_error());
																for($i5=0;$row5=mysql_fetch_assoc($result5);$i5++){ 
																?>
										                   		<option value="<?=$row5['id']?>"><?=$row5['id']?> / <?=$row5['title']?></option>
										                   		<?php
										                   		}
										                   		?>
										                </select>
										                   <!-- <input type="text" name="code"  class="form-control" required=""> -->
										                </div>
										            </div>
<?php
if($rowT['file_cv'] == NULL){
	?>
<div class="form-group">
												<label class="col-md-3 control-label">CV File</label>
												<div class="col-md-9">
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<i class="fa fa-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Change</span>
																<span class="fileupload-new">Select file</span>
																<input type="file" name="Job_Description" />
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
														</div>
													</div>
												</div>
											</div>


<?php
}else{
	?>
<?php	
}
?>

										            

			

								                  			
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button type="submit" class="btn btn-primary " onclick="clicksound.playclip()">Update</button>
														<button class="btn btn-default modal-dismiss">Cancel</button>
													</div>
												</div>
											</footer>
											
										</section>
										</form>
									</div>


<!--  start model popup   -->






</div>


							<style type="text/css">
.wizard-progress, html.dark .wizard-progress {
    margin: 0 15px;
}
.wizard-progress .steps-progress, html.dark .wizard-progress .steps-progress {
    height: 2px;
    margin: 0 39px;
    position: relative;
    top: 15px;
    background: #cccccc;
}
.wizard-progress .steps-progress .progress-indicator, html.dark .wizard-progress .steps-progress .progress-indicator {
    background: #0088cc;
}
.wizard-progress .steps-progress .progress-indicator, html.dark .wizard-progress .steps-progress .progress-indicator {
    height: 100%;
    width: 0;
    background: #cccccc;
    -webkit-transition: width 0.2s ease-in;
    -moz-transition: width 0.2s ease-in;
    transition: width 0.2s ease-in;
}

.wizard-progress .wizard-steps, html.dark .wizard-progress .wizard-steps {
    list-style: none;
    margin: 0;
    padding: 15px 0 0;
    display: inline-block;
    width: 100%;
    font-size: 0;
    text-align: justify;
    -ms-text-justify: distribute-all-lines;
}
.wizard-progress .wizard-steps li, html.dark .wizard-progress .wizard-steps li {
    display: inline-block;
    vertical-align: top;
    min-width: 50px;
    max-width: 100px;
}
.wizard-progress .wizard-steps, html.dark .wizard-progress .wizard-steps {
    list-style: none;
    margin: 0;
    padding: 15px 0 0;
    display: inline-block;
    width: 100%;
    font-size: 0;
    text-align: justify;
    -ms-text-justify: distribute-all-lines;
}
.wizard-progress .wizard-steps li a, html.dark .wizard-progress .wizard-steps li a {
    position: relative;
    display: block;
    padding: 25px 11px 0;
    font-size: 11px;
    color: #33333f;
    font-weight: bold;
    line-height: 1;
    text-align: center;
    text-decoration: none;
    word-break: break-all;
}
.wizard-steps > li.active a, .wizard-steps > li.active a:hover, .wizard-steps > li.active a:focus {
    border-top-color: #0088cc;
}
.wizard-steps > li.active a, .wizard-steps > li.active a:hover, .wizard-steps > li.active a:focus {
    border-top-color: #0088cc;
}
.wizard-progress .wizard-steps li.active a span, html.dark .wizard-progress .wizard-steps li.active a span {
    color: #0088cc;
    border-color: #0088cc;
    background: white;
}

.wizard-progress .wizard-steps li.active1 a span, html.dark .wizard-progress .wizard-steps li.active1 a span {
    color: #3c763d;
    border-color: #3c763d;
    background: white;
}

.wizard-progress .wizard-steps li.active2 a span, html.dark .wizard-progress .wizard-steps li.active2 a span {
    color: #CC1E1E;
    border-color: #CC1E1E;
    background: white;
}



.wizard-progress .wizard-steps li a span, html.dark .wizard-progress .wizard-steps li a span {
    position: absolute;
    top: 0;
    left: 50%;
    display: block;
    background: #cccccc;
    color: white;
    line-height: 26px;
    text-align: center;
    margin-top: -15px;
    margin-left: -15px;
    width: 30px;
    height: 30px;
    border-radius: 35px;
    font-size: 13px;
    text-indent: -1px;
    border: 2px solid #cccccc;
    -webkit-transition: all 0.2s ease-in;
    -moz-transition: all 0.2s ease-in;
    transition: all 0.2s ease-in;
}

.wizard-progress .wizard-steps li a, html.dark .wizard-progress .wizard-steps li a {
    position: relative;
    display: block;
    padding: 25px 10px 0;
    font-size: 11px;
    color: #33333f;
    font-weight: bold;
    line-height: 1;
    text-align: center;
    text-decoration: none;
    word-break: break-all;
}
.wizard-steps > li.active a, .wizard-steps > li.active a:hover, .wizard-steps > li.active a:focus {
    border-top-color: #0088cc;
}
.panel-title {
    margin-top: 0;
    margin-bottom: 0;
    font-size: 12px;
    color: inherit;
}
.panel-body {
    padding: 25px 13px 10px;
}

.job-listing-type {
    line-height: 56px;
    float: left;
  
}

</style>


<div class="col-md-8">
        <div class="col-md-3">
           
                                                    <div class="wizard-progress">
                                            <ul class="wizard-steps">
                                                <li>
                                                    <a><span>1</span> Empty</a>
                                                </li>
                                            </ul>
                                        </div>
                                                                 
          
        </div>
        <div class="col-md-3">
             <div class="wizard-progress" style="    margin: 0 10px;">
                                            <ul class="wizard-steps">
                                               <li class="active">
                                                    <a><span><i class="fa fa-gavel"></i></span>Checking</a>
                                                </li>
                                            </ul>
                                        </div>
        </div>
        <div class="col-md-3">
             <div class="wizard-progress">
                                            <ul class="wizard-steps">
                                                <li class="active1">
                                                    <a><span><i class="fa fa-check"></i></span> Success</a>
                                                </li>
                                            </ul>
                                        </div>
        </div>
        <div class="col-md-3">
             <div class="wizard-progress">
                                            <ul class="wizard-steps">
                                                <li class="active2">
                                                    <a><span><i class="fa fa-times "></i></span> Reject</a>
                                                </li>
                                            </ul>
                                        </div>
        </div>



</div>

<hr>




<?php
$sql="SELECT * FROM job_owner WHERE ad_id='$iduser' AND user_id='$id' ";
$result=mysql_query($sql)or die(mysql_error());
$num=mysql_num_rows($result);


if($num == 0){
?>









<div class="row">
	<div class="col-md-3">
	<img src="images/smile.jpg" style="height:150px; margin: 0 auto;" class="img-responsive">	
	</div>
	<div class="col-md-9">
		<div class="alert alert-info fade in nomargin">
			<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
				<h4>Welcome to Tracker process bar!</h4>
				<p>We are extermely happy to announce our first admin. You can add new job for your cadidate. easily customization
					for Tracker process bar! Please click Add new job on Buttons.</p>
				<p>
				<a href="#Add_new" class="modal-with-zoom-anim btn btn-default mt-xs mb-xs" type="button"><i class="fa fa-plus "></i> Choose New Jobs</a>
				</p>
		</div>
	</div>
</div>


<!--  start model popup   -->


<div id="Add_new" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
										<form id="demo-form2" class="form-horizontal mb-lg"  action="process/owner/ownerInsert_Tr.php" method="post" enctype="multipart/form-data">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Tracker process bar <?=$row['username']?> ?</h2>
											</header>
											<div class="panel-body">
									<div id="showalert1"></div>
										
										<input name="id" type="hidden" id="id" value="<?=base64_encode($rowT['id'])?>"/>
										<input name="adid" type="hidden" id="id" value="<?=$iduser?>"/>
												
													
													

								                    <div class="form-group">
										                <label for="no" class="col-sm-3 control-label">Job id</label>
										                <div class="col-sm-7">
										                	<select data-plugin-selecttwo name="jobid" id="jobid" class="form-control populate select2-offscreen" required="required">
										                    <option value="0"> -- Choose Job -- </option>
										                        <?php
										                        $sql5="SELECT id, title FROM job_post";
																$result5=mysql_query($sql5)or die(mysql_error());
																for($i5=0;$row5=mysql_fetch_assoc($result5);$i5++){ 
																?>
										                   		<option value="<?=$row5['id']?>"><?=$row5['id']?> / <?=$row5['title']?></option>
										                   		<?php
										                   		}
										                   		?>
										                </select>
										                   <!-- <input type="text" name="code"  class="form-control" required=""> -->
										                </div>
										            </div>
<?php
if($rowT['file_cv'] == NULL){
	?>
<div class="form-group">
												<label class="col-md-3 control-label">CV File</label>
												<div class="col-md-9">
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<i class="fa fa-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Change</span>
																<span class="fileupload-new">Select file</span>
																<input type="file" name="Job_Description" />
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
														</div>
													</div>
												</div>
											</div>


<?php
}else{
	?>
<?php	
}
?>

										            

			

								                  			
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button type="submit" class="btn btn-primary " onclick="clicksound.playclip()">Update</button>
														<button class="btn btn-default modal-dismiss">Cancel</button>
													</div>
												</div>
											</footer>
											
										</section>
										</form>
									</div>


<!--  start model popup   -->

<?php
}else{

for($i=0;$row=mysql_fetch_assoc($result);$i++){ 


$sqlJ="SELECT * FROM job_post WHERE id = '$row[jobid]' ";
$resultJ=mysql_query($sqlJ)or die(mysql_error());
$rowJ=mysql_fetch_assoc($resultJ);


?>















<div class="row">

    <div class="col-md-3" >
<div class=" alert alert-dark">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<a target="_blank" href="../job-detail.php?id=<?=$rowJ['id']?>" class="alert-link"><i class="fa fa-briefcase"></i> JobID : <?=$rowJ['id']?></a>
</div>
         </div> 




         <div class="col-md-9">
<div class="wizard-progress">
                                            <div class="steps-progress">
                                                <div class="progress-indicator" style="width: 0%;"></div>
                                            </div>
                                            <ul class="wizard-steps">



                                                <li class="active1">
                                                    <a><span style="font-size:20px; padding-left:1px;"><i class="fa fa-check"></i></span> Owner:<?=$rowT['id']?></a>
                                                </li>


                                                
                                                <li class="active1">
                                                    <a target="_blank" class="tooltip-1" data-placement="top" href="../job-detail.php?id=<?=$rowJ['id']?>" data-original-title="<?=$rowJ['title']?>"><span><i class="fa fa-check"></i></span> Job ID :<?=$rowJ['id']?></a>
                                                </li>
                                               




                                                  <?php
                                                if($rowT['file_cv'] != NULL AND $rowT['file_cv'] != "-"){
                                                ?>   
                                                <li class="active1">
                                                    <a target="_blank" class="tooltip-1" data-placement="top" href="pdf/<?=$rowT['file_cv']?>" data-original-title="CV File"><span><i class="fa fa-check"></i></span>CV File</a>
                                                </li>
                                                <?php
                                            } else {
                                            	?>
                                            	<li>
                                                    <a><span>2</span>CV File</a>
                                                </li>

                                            	<?php
                                            }
                                                ?>
                                                



                                                           <?php
                            if($row['jb_approve'] == "processing"){
                            ?>
                            <li class="active">
                                                    <a target="_blank" class="tooltip-1" data-placement="top" data-original-title="Checking" ><span><i class="fa fa-gavel"></i></span>JB approve</a>
                                                </li>
                            
                            <?php
                            } else if($row['jb_approve'] == "success"){
                                ?>

                            <li class="active1">
                                                    <a target="_blank" class="tooltip-1" data-placement="top" data-original-title="Approve success" ><span><i class="fa fa-check"></i></span>JB approve</a>
                                                </li>

                            <?php    
    
                            } else if($row['jb_approve'] == "reject"){
                                ?>
                                <li class="active2">
                                                    <a target="_blank" class="tooltip-1" data-placement="top" data-original-title="Reject" ><span><i class="fa fa-times"></i></span> Reject</a>
                                                </li>
                            <?php    
                              
                            } else {
                            ?>   
                            <li>
                                                    <a><span>4</span> JB approve</a>
                                                </li> 
                            <?php
                            }
                            ?> 

                              










                               
                            <?php
                            if($row['company_approve'] == "processing"){
                            ?>
                            <li class="active">
                                                    <a target="_blank" class="tooltip-1" data-placement="top" data-original-title="Company Checking" ><span><i class="fa fa-gavel"></i></span>Company approve</a>
                                                </li>
                            
                            <?php
                            } else if($row['company_approve'] == "success"){
                                ?>

                            <li class="active1">
                                                    <a target="_blank" class="tooltip-1" data-placement="top" data-original-title="Company approve success" ><span><i class="fa fa-check"></i></span>Company approve</a>
                                                </li>

                            <?php    
    
                            } else if($row['company_approve'] == "reject"){
                                ?>
                                <li class="active2">
                                                    <a target="_blank" class="tooltip-1" data-placement="top" data-original-title="Company Reject" ><span><i class="fa fa-times"></i></span> Reject</a>
                                                </li>
                            <?php    
                              
                            } else {
                            ?>   
                            <li>
                                                    <a><span>5</span> Company approve</a>
                                                </li> 
                            <?php
                            }
                            ?>    
                               















                               
                            <?php
                            if($row['offer_made'] == "processing"){
                            ?>
                            <li class="active">
                                                    <a target="_blank" class="tooltip-1" data-placement="top" data-original-title="Offer made Checking" ><span><i class="fa fa-gavel"></i></span>Offer made</a>
                                                </li>
                            
                            <?php
                            } else if($row['offer_made'] == "success"){
                                ?>

                            <li class="active1">
                                                    <a target="_blank" class="tooltip-1" data-placement="top" data-original-title="Offer made success" ><span><i class="fa fa-check"></i></span>Offer made</a>
                                                </li>

                            <?php    
    
                            } else if($row['offer_made'] == "reject"){
                                ?>
                                <li class="active2">
                                                    <a target="_blank" class="tooltip-1" data-placement="top" data-original-title="Reject" ><span><i class="fa fa-times"></i></span> Reject</a>
                                                </li>
                            <?php    
                              
                            } else {
                            ?>   
                            <li>
                                                    <a><span>6</span>Offer made</a>
                                                </li> 
                            <?php
                            }
                            ?>   
                               





                               
                           <?php
                            if($row['company_hire'] == "processing"){
                            ?>
                            <li class="active">
                                                    <a target="_blank" class="tooltip-1" data-placement="top" data-original-title="Company hire Checking" ><span><i class="fa fa-gavel"></i></span>Company hire</a>
                                                </li>
                            
                            <?php
                            } else if($row['company_hire'] == "success"){
                                ?>

                            <li class="active1">
                                                    <a target="_blank" class="tooltip-1" data-placement="top" data-original-title="Company hire success" ><span><i class="fa fa-check"></i></span>Company hire</a>
                                                </li>

                            <?php    
    
                            } else if($row['company_hire'] == "reject"){
                                ?>
                                <li class="active2">
                                                    <a target="_blank" class="tooltip-1" data-placement="top" data-original-title="Reject" ><span><i class="fa fa-times"></i></span> Reject</a>
                                                </li>
                            <?php    
                              
                            } else {
                            ?>   
                            <li>
                                                    <a><span>7</span>Company hire</a>
                                                </li> 
                            <?php
                            }
                            ?>   
                               
                
                                            </ul>
                                        </div>
         </div>












	<div class="col-md-9" >
    </div>

    <div class="col-md-3" >





<a href="#modalAnimdel<?=$row['id']?>" onclick="clicksound.playclip()" title="Delete" type="button" class="modal-with-zoom-anim mb-xs mt-xs mr-xs btn btn-sm btn-danger pull-right"><i class="fa fa-recycle"></i> Delete</a>
<div id="modalAnimdel<?=$row['id']?>" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
	<form id="demo-form3" class="form-horizontal mb-lg"  action="process/owner/ownerDelect_Tr.php" method="post" enctype="multipart/form-data">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Are you sure?</h2>
												<input name="id" type="hidden" id="id" value="<?=base64_encode($row['id'])?>"/>
												<input name="owner" type="hidden" id="id" value="<?=$iduser?>"/>
												<input name="jobid" type="hidden" id="id" value="<?=base64_encode($rowJ['id'])?>"/>
												<input name="id_can" type="hidden" id="id" value="<?=base64_encode($rowT['id'])?>"/>

											</header>
											<div class="panel-body">
												<div class="modal-wrapper">
													<div class="modal-icon">
														<i class="fa fa-question-circle"></i>
													</div>
													<div class="modal-text">
														<p>Are you sure that you want to delete this Job ? <?=$rowJ['id']?></p>
													</div>
												</div>
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														
														
														<button type="submit" class="btn btn-primary " onclick="clicksound.playclip()">Confirm</button>
														<button class="btn btn-default modal-dismiss">Cancel</button>
													</div>
												</div>
											</footer>
										</section>
										</form>
									</div>







    	<a href="#modalAnim<?=$row['id']?>" onclick="clicksound.playclip()" title="Edit" type="button" class="modal-with-zoom-anim mb-xs mt-xs mr-xs btn btn-sm btn-default pull-right"><i class="fa fa-cog"></i> Manage</a>
    
    	<div id="modalAnim<?=$row['id']?>" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
										<form id="demo-form2" class="form-horizontal mb-lg"  action="process/owner/ownerUpdate_Tr.php" method="post" enctype="multipart/form-data">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Tracker process bar <?=$row['username']?> ?</h2>
											</header>
											<div class="panel-body">
									<div id="showalert1"></div>
										
										<input name="id" type="hidden" id="id" value="<?=base64_encode($row['id'])?>"/>
										<input name="idowner" type="hidden" id="id" value="<?=base64_encode($rowT['id'])?>"/>
												
													
													

								                    <div class="form-group">
										                <label for="no" class="col-sm-3 control-label">Job id</label>
										                <div class="col-sm-7">
										                	<select data-plugin-selecttwo name="jobid" id="jobid" class="form-control populate select2-offscreen" >
										                    <option value="<?=$rowJ['id']?>" select><?=$rowJ['id']?> / <?=$rowJ['title']?></option>
										                        <?php
										                        $sql5="SELECT id, title FROM job_post";
																$result5=mysql_query($sql5)or die(mysql_error());
																for($i5=0;$row5=mysql_fetch_assoc($result5);$i5++){ 
																?>
										                   		<option value="<?=$row5['id']?>"><?=$row5['id']?> / <?=$row5['title']?></option>
										                   		<?php
										                   		}
										                   		?>
										                </select>
										                   <!-- <input type="text" name="code"  class="form-control" required=""> -->
										                </div>
										            </div>


										           

											<div class="form-group">
                <label for="jb_approve" class="col-sm-3 control-label">JB approve</label>
                <div class="col-sm-7">
                 
                    <select name="jb_approve" id="jb_approve" class="form-control" >
                      
                        <option value="<?=$row['jb_approve']?>"><?=$row['jb_approve']?></option>
                   		<option value="processing">processing</option>
                   		<option value="success">success</option>
                   		<option value="reject">reject</option>
                    </select>
                </div>
            </div>


             <div class="form-group">
                <label for="company_approve" class="col-sm-3 control-label">Company approve</label>
                <div class="col-sm-7">
                 
                    <select name="company_approve" id="company_approve" class="form-control" >
                      
                        <option value="<?=$row['company_approve']?>"><?=$row['company_approve']?></option>
                   		<option value="processing">processing</option>
                   		<option value="success">success</option>
                   		<option value="reject">reject</option>
                   	
                    </select>
                </div>
            </div>


            <div class="form-group">
                <label for="offer_made" class="col-sm-3 control-label">Offer made</label>
                <div class="col-sm-7">
                 
                    <select name="offer_made" id="offer_made" class="form-control" >
                      
                        <option value="<?=$row['offer_made']?>"><?=$row['offer_made']?></option>
                   		<option value="processing">processing</option>
                   		<option value="success">success</option>
                   		<option value="reject">reject</option>
                   	
                    </select>
                </div>
            </div>



            <div class="form-group">
                <label for="company_hire" class="col-sm-3 control-label">Company hire</label>
                <div class="col-sm-7">
                 
                    <select name="company_hire" id="company_hire" class="form-control" >
                      
                        <option value="<?=$row['company_hire']?>"><?=$row['company_hire']?></option>
                   		<option value="processing">processing</option>
                   		<option value="success">success</option>
                   		<option value="reject">reject</option>
                   	
                    </select>
                </div>
            </div>

								                  


												
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button type="submit" class="btn btn-primary " onclick="clicksound.playclip()">Update</button>
														<button class="btn btn-default modal-dismiss">Cancel</button>

													</div>
												</div>
											</footer>
											
										</section>
										</form>
									</div>





    </div>


</div>


<hr>



























<?php
}
}
?>



































        
    </div>
								
								
							</div>
						</section>
					<!-- end: page -->
				</section>
			</div>

			<aside id="sidebar-right" class="sidebar-right">
				<div class="nano">
					<div class="nano-content">
						<a href="#" class="mobile-close visible-xs">
							Collapse <i class="fa fa-chevron-right"></i>
						</a>
			
						<div class="sidebar-right-wrapper">
			
							<div class="sidebar-widget widget-calendar">
								<h6>Upcoming Tasks</h6>
								<div data-plugin-datepicker data-plugin-skin="dark" ></div>
			
								
							</div>
			
							
			
						</div>
					</div>
				</div>
			</aside>
		</section>

		

		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>		
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>		
		<script src="assets/vendor/jquery-cookie/jquery.cookie.js"></script>		
				<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>		
				<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>		
				<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>		
				<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>		
				<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		<script src="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		<!-- Specific Page Vendor -->		<script src="assets/vendor/select2/select2.js"></script>
	
		

		<script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>		
		<script src="assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>		
		<script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>
		<!-- Analytics to Track Preview Website -->		
		<script src="assets/javascripts/ui-elements/examples.modals.js"></script>
		<script src="assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
		<!-- Examples -->
		<!-- <script src="assets/javascripts/tables/examples.datatables.editablecus001.js"></script> -->

		 <script src="assets/javascripts/tables/examples.datatables.tabletools.js"></script>

		 <script src="assets/javascripts/ui-elements/examples.loading.overlay.js"></script>
		


	</body>
</html>