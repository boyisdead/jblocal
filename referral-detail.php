<?php
	session_start();
	include('server/connect.php');
	if(isset($_SESSION['ssUsername2'])){$username=$_SESSION['ssUsername2'];}
	else if(!isset($_SESSION['ssUsername2'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}

	$id=$_REQUEST['id'];

	$sql="SELECT * FROM user WHERE username = '$username'";
	$result=mysql_query($sql)or die(mysql_error());
	$row=mysql_fetch_assoc($result);
	$iduser = $row['id'];


?>

<!doctype html>
<html class="fixed">
	<head>
		<!-- Basic -->
		<meta charset="UTF-8">
		<title>Referral: <?=$id?></title>

		<!-- Mobile Metas -->
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
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker4.css" />
		<link rel="stylesheet" href="assets/vendor/select2/select2.css">
		<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css">
		<link rel="stylesheet" media="all" href="assets/src/jquery.typeahead.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme1.css" />
		<link rel="stylesheet" href="assets/style.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.js"></script>
		<style type="text/css">
		    .hidden {
		        display: none;
		    }

		    ul.option-e {
		        left: 240px;
		        top: 20px;
		        min-width: 120px;
		    }

		    @media (max-width: 767px) {
		        ul.option-e {
		            left: 240px;
		            top: 20px;
		            min-width: 120px;
		        }
		    }

		    @media (max-width: 479px) {
		        ul.option-e {
		            left: 50px;
		            top: 20px;
		            min-width: 120px;
		            font-size: 12px;
		        }
		    }

		    .nav-tabs li.active a,
		    .nav-tabs li.active a:hover,
		    .nav-tabs li.active a:focus {
		        background: white;
		        border-left-color: #eeeeee;
		        border-right-color: #eeeeee;
		        border-top: 3px solid #555555;
		        color: #555555;
		    }
		</style>

	</head>
	<body >
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
									<!--			<li >
										<a href="owner.php" onclick="clicksound.playclip()">
											<i class="fa fa-gavel " aria-hidden="true"></i>
											<span>Owner DB</span>
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
									<li >
										<a href="upload_view.php" onclick="clicksound.playclip()">
											<i class="fa fa-star-o" aria-hidden="true"></i>
											<span>General Upload</span>
										</a>
									</li> -->
									<li>
										<a href="Dashboard.php" onclick="clicksound.playclip()">
											<i class="fa fa-line-chart" aria-hidden="true"></i>
											<span>Dashboard</span>
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
									
									<li>
										<a href="category.php" onclick="clicksound.playclip()">
											<i class="fa fa-cubes" aria-hidden="true"></i>
											<span>Category</span>
										</a>
									</li>
									<li class="nav-expanded nav-active">
										<a href="referral.php" onclick="clicksound.playclip()">
											<i class="fa fa-sitemap" aria-hidden="true"></i>
											<span>Referral</span>
										</a>
									</li>
									<li>
										<a href="job_level.php" onclick="clicksound.playclip()">
											<i class="fa fa-star-half-o" aria-hidden="true"></i>
											<span>Job level</span>
										</a>
									</li>
									<li>
										<a href="blog.php" onclick="clicksound.playclip()">
											<i class="fa fa-comments-o" aria-hidden="true"></i>
											<span>Blog</span>
										</a>
									</li>
									<li>
										<a href="job.php" onclick="clicksound.playclip()">
											<i class="fa fa-cube" aria-hidden="true"></i>
											<span>Job</span>
										</a>
									</li>
									<!-- <li>
										<a href="Hot-job.php" onclick="clicksound.playclip()">
											<i class="fa fa-fire" aria-hidden="true"></i>
											<span>Hot Job</span>
										</a>
									</li> -->
									<li >
										<a href="Pick-job.php" onclick="clicksound.playclip()">
											<i class="fa fa-paw" aria-hidden="true"></i>
											<span>Pick Job</span>
										</a>
									</li>
									<li >
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
								</ul>
							</nav>
							<hr class="separator" />
						</div>
				
					</div>
				
				</aside>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2></h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="Dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span></span></li>
								
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right" onclick="clicksound.playclip()"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
<!--
		<======================= 	Shift indent back
														-->					
<div class="row">

<?php
	$sqlj="SELECT * FROM refer_cv WHERE id = $id";
	$resultj=mysql_query($sqlj)or die(mysql_error());
	$rowj=mysql_fetch_assoc($resultj);
?>

<div class="col-md-8 col-lg-9">
    <div class="tabs tabs-primary">
        <ul class="nav nav-tabs tabs-primary">
            <li class="active">
                <a href="#viewer" data-toggle="tab" aria-expanded="true" style="border-top: 3px solid #555555; color:#555555">Referral Info </a>

            </li>
            <li class="">
                <a href="#editor" data-toggle="tab" aria-expanded="false" style="border-top: 3px solid #555555; color:#555555">Edit Referral Info</a>
            </li>
        </ul>
        <div class="tab-content">
            <div id="viewer" class="tab-pane active">
                <h4 class="mb-xlg text-primary">
                    <b>Referral ID : <?=$rowj['id']?></b>
                </h4>
<?php
	if($rowj['file'] == NULL){
?>
	            <label for="name" class=" control-label">
	                <a href="<?=$rowj['dropbox']?>" target="_blank">
	                    <i class="fa fa-file-pdf-o"></i> : Dropbox File
	                </a>
	            </label>
	<?php
	    } else {
	?>
	            <label for="name" class=" control-label">
	                <a href="upload/<?=$rowj['file']?>" target="_blank">
	                    <i class="fa fa-file-pdf-o"></i> : Click to open in new tab
	                </a>
	            </label>
<?php
	}
?>
                <a href="#modalAnim3" type="button" class="modal-with-zoom-anim mb-xs mt-xs mr-xs btn btn-primary pull-right">
	                <i class="fa fa-plus"></i> 
	                New Job
	            </a>
                <hr>
                <fieldset>
                	
                    <div class="form-group">
                        <label class="col-md-3 control-label"><b>Name :</b></label>
                        <div class="col-md-8">
                            <label class="">
                                <?=$rowj['name']?>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><b>Email :</b></label>
                        <div class="col-md-8">
                            <label class="">
                                <?=$rowj['email']?>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><b>Phone :</b></label>
                        <div class="col-md-8">
                            <label class="">
                                <?=$rowj['tel']?>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><b>Company :</b></label>
                        <div class="col-md-8">
                            <label class="">
                                <?=$rowj['location']?>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><b>Position :</b></label>
                        <div class="col-md-8">
                            <label class="">
                                <?=$rowj['position']?>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><b>Insert date :</b></label>
                        <div class="col-md-8">
                            <label class="">
                                <?=$rowj['insert_date']?>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><b>Location Address :</b></label>
                        <div class="col-md-8">
                            <label class="">
                                <?=$rowj['country_user']?>
                            </label>
                        </div>
                    </div>
                </fieldset>
            </div>


            <!-- End viewer -->
            <div id="editor" class="tab-pane">
                <h4 class="mb-xlg">Edit Referral Information</h4>
                <form class="form-horizontal" action="process/referral/referralUpdate.php" method="post" enctype="multipart/form-data" name="product">
                    <!-- P2 -->
                    <fieldset>
					    <input name="id" type="hidden" id="id" value="<?=$id?>" />
					    <div class="form-group">
					        <label for="company" class="col-sm-4 control-label">Name</label>
					        <div class="col-sm-7">
					            <input type="text" name="name" id="name" value="<?=$rowj['name']?>" class="form-control">
					        </div>
					    </div>
					    <div class="form-group">
					        <label for="Title" class="col-sm-4 control-label">Email</label>
					        <div class="col-sm-7">
					            <input type="text" name="email" id="email" value="<?=$rowj['email']?>" class="form-control">
					        </div>
					    </div>
					    <div class="form-group">
					        <label for="Titletype" class="col-sm-4 control-label">Phone</label>
					        <div class="col-sm-7">
					            <input type="text" name="tel" id="tel" value="<?=$rowj['tel']?>" class="form-control">
					        </div>
					    </div>
					    <div class="form-group">
					        <label for="linkedin" class="col-sm-4 control-label">Company</label>
					        <div class="col-sm-7">
					            <input type="text" name="location" value="<?=$rowj['location']?>" id="location" class="form-control">
					        </div>
					    </div>
					    <div class="form-group">
					        <label for="linkedin" class="col-sm-4 control-label">Position</label>
					        <div class="col-sm-7">
					            <input type="text" name="position" value="<?=$rowj['position']?>" id="position" class="form-control">
					        </div>
					    </div>
					    <div class="form-group">
					        <label for="linkedin" class="col-sm-4 control-label">Location address</label>
					        <div class="col-sm-7">
					            <input type="text" name="country_user" value="<?=$rowj['country_user']?>" id="country_user" class="form-control">
					        </div>
					    </div>
					</fieldset>
					<!-- P2 -->
					<div class="panel-footer">
					    <div class="row">
					        <div class="col-md-9 col-md-offset-3">
					            <button type="submit" class="btn btn-primary" onclick="clicksound.playclip()">Update</button>
					            <button type="reset" class="btn btn-default">Reset</button>
					        </div>
					    </div>
					</div>
                </form>
            </div>
            <!-- end tap editor -->
        </div>
        <!-- End tab-content -->
    </div>
</div>     <!-- end of div.col-lg-9 -->

<!-- Modal for add a new job -->

<div id="modalAnim3" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
    <form id="demo-form2" class="form-horizontal mb-lg" action="process/shipping/shippingInsert5.php" method="post" enctype="multipart/form-data">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Add new Job ?</h2>
            </header>
            <div class="panel-body">
                <div id="showalert1"></div>
                <input name="id" type="hidden" id="id" value="<?=$rowj['id']?>" />
                <input name="userid" type="hidden" id="id" value="<?=$rowj['user_id']?>" />
                <div class="form-group">
                    <label for="no" class="col-sm-3 control-label">Job apply</label>
                    <div class="col-sm-7">
                        <select multiple data-plugin-selectTwo name="jobid" id="jobid" class="form-control populate" required="">
<?php
$sqljob="SELECT id, title FROM job_post";
$resultjob=mysql_query($sqljob)or die(mysql_error());
for($ijob=0;$rowjob=mysql_fetch_assoc($resultjob);$ijob++) { 
?>
                            <option value="<?=$rowjob['id']?>">
                                <?=$rowjob['id']?>/
                                <?=$rowjob['title']?>
                            </option>
<?php
}
?>
                        </select>
                        <!-- <input type="text" name="code"  class="form-control" required=""> -->
                    </div>
                </div>
            </div>
            <footer class="panel-footer">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-primary " onclick="clicksound.playclip()">Add Job</button>
                        <button class="btn btn-default modal-dismiss">Cancel</button>
                    </div>
                </div>
            </footer>
        </section>
    </form>
</div>

<div class="col-md-3">
    <h4 class="mb-md">Job</h4>
    <section class="panel">
<?php

    $sql="SELECT * FROM sub_refer_cv WHERE refer_id = $id ORDER BY id DESC ";
    $result=mysql_query($sql)or die(mysql_error());
    $numa=mysql_num_rows($result);
    if($numa > 0){
        for($i=0;$row=mysql_fetch_assoc($result);$i++){ 
            $sql2="SELECT * FROM job_post WHERE id = $row[job_id] ";
            $result2=mysql_query($sql2)or die(mysql_error());
            $row2=mysql_fetch_assoc($result2);
?>
        <div class="panel-body bg-secondary" style="margin-bottom:10px;">
            <div class="widget-summary widget-summary-sm">
                <div class="widget-summary-col widget-summary-col-icon">
                    <div class="summary-icon bg-primary">
                        <i class="fa fa-briefcase"></i>
                    </div>
                </div>
                <div class="widget-summary-col">
                    <div class="summary">
                        <h4 class="title">Job <?=$row['job_id']?><a href="edit_job.php?id=<?=base64_encode($row['job_id'])?>" target="_blank" style="float:right; color:#fff; font-size:18px"><i class="fa fa-play-circle "></i></a></h4>
                        <div class="info">
                            <strong class="amount">
                                <i class="fa fa-cog"></i>
                            </strong>
                            <span class="text-primary ">
                                <a href="#modalAnim3-<?=$row['id']?>" target="_blank" style="font-size:13px;" class="modal-with-zoom-anim textl">(view)</a>
                        </div>
                    </div>
                    <div class="summary-footer">
                        <a class="text-uppercase">(view all)</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="modalAnim3-<?=$row['id']?>" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
            <div class="panel-body">
                <h4 class="mb-xlg">Edit Job Information</h4>
                <form class="form-horizontal" action="process/bank/bankUpdate5.php" method="post" enctype="multipart/form-data" name="product">
                    <!-- P2 -->
                    <fieldset>

                            <input name="id" type="hidden" id="id" value="<?=$row['id']?>" />
                            <input name="userid" type="hidden" id="id" value="<?=$rowj['user_id']?>" />
                            <div class="form-group">
                                <label for="no" class="col-sm-4 control-label">Job apply</label>
                                <div class="col-sm-7">
                                    <select multiple data-plugin-selectTwo name="jobid" id="jobid" class="form-control populate" required="">
                                        <option value="<?=$row2['id']?>" selected="selected">
                                            <?=$row2['id']?>/
                                            <?=$row2['title']?>
                                        </option>
<?php
            $sqljob="SELECT id, title FROM job_post";
            $resultjob=mysql_query($sqljob)or die(mysql_error());
            for($ijob=0;$rowjob=mysql_fetch_assoc($resultjob);$ijob++){ 
?>
                                        <option value="<?=$rowjob['id']?>">
                                            <?=$rowjob['id']?>/
                                            <?=$rowjob['title']?>
                                        </option>
<?php
            }
?>
                                    </select>
                                    <!-- <input type="text" name="code"  class="form-control" required=""> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jb_approve" class="col-sm-4 control-label">JB approve</label>
                                <div class="col-sm-7">
                                    <select name="jb_approve" id="jb_approve" class="form-control">
                                        <option value="<?=$row['jb_approve']?>">
                                            <?=$row['jb_approve']?>
                                        </option>
                                        <option value="processing">processing</option>
                                        <option value="success">success</option>
                                        <option value="reject">reject</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="company_approve" class="col-sm-4 control-label">Company approve</label>
                                <div class="col-sm-7">
                                    <select name="company_approve" id="company_approve" class="form-control">
                                        <option value="<?=$row['company_approve']?>">
                                            <?=$row['company_approve']?>
                                        </option>
                                        <option value="processing">processing</option>
                                        <option value="success">success</option>
                                        <option value="reject">reject</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="offer_mode" class="col-sm-4 control-label">Offer made</label>
                                <div class="col-sm-7">
                                    <select name="offer_mode" id="offer_mode" class="form-control">
                                        <option value="<?=$row['offer_mode']?>">
                                            <?=$row['offer_mode']?>
                                        </option>
                                        <option value="processing">processing</option>
                                        <option value="success">success</option>
                                        <option value="reject">reject</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="company_hire" class="col-sm-4 control-label">Company hire</label>
                                <div class="col-sm-7">
                                    <select name="company_hire" id="company_hire" class="form-control">
                                        <option value="<?=$row['company_hire']?>">
                                            <?=$row['company_hire']?>
                                        </option>
                                        <option value="processing">processing</option>
                                        <option value="success">success</option>
                                        <option value="reject">reject</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Start date :</label>
                                <div class="col-md-7">
                                    <div class="input-group date">
                                        <input id="start_date" name="start_date" value="<?=$row['start_date']?>" class="form-control" type="text">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Probation date :</label>
                                <div class="col-md-7">
                                    <div class="input-group date">
                                        <input id="probation_date" name="probation_date" value="<?=$row['probation_date']?>" class="form-control" type="text">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                    </fieldset>
                    <br>
                    <br>
                    <!-- P2 -->
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-md-9 col-md-offset-3">
                                <button type="submit" class="btn btn-primary" onclick="clicksound.playclip()">Update</button>
                                <button class="btn btn-default modal-dismiss">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end tap pass -->
        </div>
<?php
        }
    }
?>
    </section>
</div>

</div>  
<!-- end of indent shifted row  -->

					<!-- end: page -->
				</section>
			</div>

			<br><br><br><br><br><br>

			<!-- P1 -->

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
			
							<div class="sidebar-widget widget-friends">
								<h6>Employee</h6>
								<ul>
		<?php							
		$sql="SELECT * FROM user";
		$result=mysql_query($sql)or die(mysql_error());
		for($i=0;$row=mysql_fetch_assoc($result);$i++){
		
		?>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="avatar/<?=$row['Image']?>" alt="<?=$row['First_Name']?> <?=$row['Last_Name']?>" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name"><?=$row['First_Name']?> <?=$row['Last_Name']?></span>
											<span class="title"><?=$row['tel']?></span>
										</div>
									</li>
		<?php
		}
		?>						
								</ul>
							</div>
			
						</div>
					</div>
				</div>
			</aside>
			<!-- P1 -->
			
		</section>






		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>		
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>		
		<script src="assets/vendor/jquery-cookie/jquery.cookie.js"></script>		
			
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>		
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>		
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker2.js"></script>	
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>	
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>


		<script src="assets/vendor/jquery-autosize/jquery.autosize.js"></script>
		
		<!-- Specific Page Vendor -->		
		<script src="assets/vendor/jquery-validation/jquery.validate.js"></script>
		<script src="assets/vendor/select2/select2.js"></script>
		<script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		<script src="assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
		<script src="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>

		<!-- Analytics to Track Preview Website -->		
		<!-- Examples -->
		<script src="assets/javascripts/forms/examples.validation.js"></script>

		<script src="assets/javascripts/tables/examples.datatables.editable.js"></script>

		<script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>
		<script src="assets/javascripts/ui-elements/examples.modals.js"></script>
		<script src="assets/javascripts/pages/examples.mediagallery.js"></script>
		<script src="assets/javascripts/ui-elements/examples.loading.overlay.js"></script>

		

<script>
 $(document).ready(function() {
       

        $('.input-group.date').datepicker({
            format: "yyyy-mm-dd",
            weekStart: 0,
            todayBtn: "linked",
            autoclose: true,
            todayHighlight: true,
            toggleActive: true
        });
    });


</script>  




<script>

// Mouseover/ Click sound effect- by JavaScript Kit (www.javascriptkit.com)
// Visit JavaScript Kit at http://www.javascriptkit.com/ for full source code

//** Usage: Instantiate script by calling: var uniquevar=createsoundbite("soundfile1", "fallbackfile2", "fallebacksound3", etc)
//** Call: uniquevar.playclip() to play sound

var html5_audiotypes={ //define list of audio file extensions and their associated audio types. Add to it if your specified audio file isn't on this list:
	"mp3": "audio/mpeg",
	"mp4": "audio/mp4",
	"ogg": "audio/ogg",
	"wav": "audio/wav"
}

function createsoundbite(sound){
	var html5audio=document.createElement('audio')
	if (html5audio.canPlayType){ //check support for HTML5 audio
		for (var i=0; i<arguments.length; i++){
			var sourceel=document.createElement('source')
			sourceel.setAttribute('src', arguments[i])
			if (arguments[i].match(/\.(\w+)$/i))
				sourceel.setAttribute('type', html5_audiotypes[RegExp.$1])
			html5audio.appendChild(sourceel)
		}
		html5audio.load()
		html5audio.playclip=function(){
			html5audio.pause()
			html5audio.currentTime=0
			html5audio.play()
		}
		return html5audio
	}
	else{
		return {playclip:function(){throw new Error("Your browser doesn't support HTML5 audio unfortunately")}}
	}
}

//Initialize two sound clips with 1 fallback file each:

var mouseoversound=createsoundbite("whistle.ogg", "whistle.mp3")
var clicksound=createsoundbite("click.ogg", "http://www.javascriptkit.com/script/script2/click.mp3")

</script>

<script>
$('.dropdown-toggle').dropdown();
   
</script>
	</body>
</html>