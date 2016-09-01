<?php
session_start();
include('server/connect.php');
if(isset($_SESSION['ssUsername2'])){$username=$_SESSION['ssUsername2'];}
else if(!isset($_SESSION['ssUsername2'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}

$customer_id = $_REQUEST['cus_id'];

$sql1="SELECT * FROM user WHERE username = '$username'";
$result1=mysql_query($sql1)or die(mysql_error());
$row1=mysql_fetch_assoc($result1);
$iduser = $row1['id'];
$oauth_uid = $row1['oauth_uid'];

$sql="SELECT * FROM candidate_profile WHERE id = '$customer_id' ";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_assoc($result);
$oauth_uid = $row['oauth_uid'];

$cus_texCount = $row['cus_texCount'];

switch ($cus_texCount) {
    case "1":
        $cus_texCount = "ยื่นปีละครั้ง";
        break;  
    case "2":
        $cus_texCount = "ยื่นปีละ 2 ครั้ง";
        break;         
    default:
        $cus_texCount = "ไม่ระบุ";
}	


?>

<!doctype html>
<html class="fixed">
	<head>
		<!-- Basic -->
		<meta charset="UTF-8">
		<title><?=$row['name']?></title>
		

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
		<link rel="stylesheet" href="assets/vendor/select2/select2.css">
		<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css">
		

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
top:20px;
 min-width: 120px;
 }
@media (max-width: 767px) {
	ul.option-e {
left: 240px; 
top:20px;
 min-width: 120px;

}
}
@media (max-width: 479px) {
		ul.option-e {
left: 50px; 
top:20px;
 min-width: 120px;
 font-size: 12px;

}
}
		</style>

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
								<img src="avatar/<?=$row1['Image']?>" width="35" height="35" alt="<?=$row1['username']?>" class="img-circle" data-lock-picture="avatar/<?=$row['Image']?>" />
							</figure>
							<div class="profile-info" data-lock-name="<?=$row['username']?>" data-lock-email="<?=$rowme['email']?>">
								<span class="name"><?=$row1['First_Name']?> <?=$row1['Last_Name']?></span>
								<span class="role"><?=$row1['position']?></span>
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
									<li class="nav-expanded nav-active">
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
									<li>
										<a href="referral.php" onclick="clicksound.playclip()">
											<i class="fa fa-sitemap" aria-hidden="true"></i>
											<span>Referral</span>
										</a>
									</li>
									<li>
										<a href="blog.php" onclick="clicksound.playclip()">
											<i class="fa fa-comments-o" aria-hidden="true"></i>
											<span>Blog</span>
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
									

									
								</ul>
							</nav>
				
							
				
							<hr class="separator" />
				
							
						</div>
				
					</div>
				
				</aside>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Candidate Profile</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="Dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Candidate Profile</span></li>
								
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right" onclick="clicksound.playclip()"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					
					<div class="row">
						<div class="col-md-4 col-lg-3">

							<section class="panel">
								<div class="panel-body">
									<a href="#">
									<div class="thumb-info mb-md">
										<img src="<?=$row['file_name']?>" class="rounded img-responsive" alt="<?=$row['name']?>">
										
									</div></a>

									<div class="widget-toggle-expand mb-md">
										<div class="widget-header">
											<h6><?=$row['name']?></h6>
											<div class="widget-toggle">+</div>
										</div>
										
										<div class="widget-content-expanded">
											
											<i class="fa fa-phone"></i>  : <?=$row['phone']?></li><br>
											<i class="fa fa-envelope"></i>  : <?=$row['email']?></li><br>
										
											<i class="fa fa-credit-card"></i> :  #ID<?=$row['user_id']?></li><br>

											<i class="fa fa-globe "></i> :  <?=$row['website']?></li>
										</div>
									</div>

									<hr class="dotted short">

									<h6 class="text-muted">Address</h6>
									<p><?=$row['country']?></p>
									<div class="clearfix">
										
									</div>

									<hr class="dotted short">

									<div class="social-icons-list">
										<a rel="tooltip" data-placement="bottom" target="_blank" href="<?=$row['facebook']?>" data-original-title="Facebook"><i class="fa fa-facebook"></i><span>Facebook</span></a>
										<a rel="tooltip" data-placement="bottom" href="<?=$row['twitter']?>" data-original-title="Twitter"><i class="fa fa-twitter"></i><span>Twitter</span></a>
										<a rel="tooltip" data-placement="bottom" href="<?=$row['linkedin_profile_url']?>" data-original-title="Linkedin"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
									</div>

								</div>
							</section>


					

							

						</div>
						<div class="col-md-8 col-lg-6">
							<div class="tabs tabs-primary">
								<ul class="nav nav-tabs tabs-primary">
								
									<li class="active">
										<a href="#edit" data-toggle="tab" aria-expanded="true">Info</a>
									</li>
									<li class="">
										<a href="#pass" data-toggle="tab" aria-expanded="false">Edit Candidate info</a>
									</li>
									
									<li class="">
										<a href="#file" data-toggle="tab" aria-expanded="false">CV</a>
									</li>
								</ul>
								<div class="tab-content">
									







									
									<div id="edit" class="tab-pane active">

									
											<h4 class="mb-xlg text-primary">Candidate Information</h4>
											
											<fieldset>
												<div class="form-group">
													<label class="col-md-4 control-label" ><b>Name :</b></label>
													<div class="col-md-7">
														<label class="" ><?=$row['name']?></label>
													</div>
												</div>



												<div class="form-group">
							                        <label for="nameEng" class="col-sm-4 control-label">Email</label>
							                        <div class="col-sm-7">
							                            <label class="" ><?=$row['email']?></label>
							                        </div>
							                    </div>


												<div class="form-group">
													<label class="col-md-4 control-label" ><b>Phone number :</b></label>
													<div class="col-md-7">
														<label class="" ><?=$row['phone']?></label>
													</div>
												</div>




												<div class="form-group">
													<label class="col-md-4 control-label" ><b>Address :</b></label>
													<div class="col-md-7">
														<label class="" ><?=$row['country']?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" ><b>Website :</b></label>
													<div class="col-md-7">
														<label class="" ><?=$row['website']?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" ><b>Blog :</b></label>
													<div class="col-md-7">
														<label class="control-label" ><?=$row['blog']?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" ><b>Linkedin :</b></label>
													<div class="col-md-7">
														<label class="control-label" ><?=$row['linkedin_profile_url']?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" ><b>Facebook :</b></label>
													<div class="col-md-7">
														<label class="control-label" ><?=$row['facebook']?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" ><b>Twitter :</b></label>
													<div class="col-md-7">
														<label class="control-label" ><?=$row['twitter']?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" ><b>Google Plus :</b></label>
													<div class="col-md-7">
														<label class="control-label" ><?=$row['google']?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" for="profileAddress"><b>Create date :</b></label>
													<div class="col-md-7">
														<label class="control-label" ><?=$row['create_date']?></label>
													</div>
												</div>
												
												


											</fieldset>
											<hr class="dotted tall">
											

											<br>
											
											
											
											<div class="panel-footer">
												<div class="row">
													<div class="col-md-9 col-md-offset-9">
														
														
													</div>
												</div>
											</div>

									

									</div>


									<div id="pass" class="tab-pane">

									
											<form class="form-horizontal" action="server/cusUpdate.php" method="post" enctype="multipart/form-data" name="product" >
											<h4 class="mb-xlg">Personal Information</h4>
											
											<fieldset>
												
												
												<div class="form-group">
													<label class="col-md-3 control-label" >Name :</label>
													<div class="col-md-8">
														<input type="text" name="name" class="form-control" value="<?=$row['name']?>" >
														<input type="text" name="id" class="form-control hide" value="<?=$row['id']?>" >
														<input type="text" name="meid" class="form-control hide" value="<?=$iduser?>" >
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" for="profileAddress">Avatar Picture</label>
													<div class="col-md-8">
														<input type="file" name="image" class="form-control" id="profileAddress" >
													</div>
												</div>


												<div class="form-group">
													<label class="col-md-3 control-label" >Email :</label>
													<div class="col-md-8">
														<input type="text" name="email" class="form-control" value="<?=$row['email']?>"  >
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" >Phone number :</label>
													<div class="col-md-8">
														<input type="text" name="phone" class="form-control" value="<?=$row['phone']?>"  >
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" >Address :</label>
													<div class="col-md-8">
														<textarea class="form-control" name="country" rows="2"><?=$row['country']?></textarea>
													</div>
												</div>
												
												<div class="form-group">
													<label class="col-md-3 control-label" >Website :</label>
													<div class="col-md-8">
														<input type="text" name="website" class="form-control" value="<?=$row['website']?>"  >
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" >Blog  :</label>
													<div class="col-md-8">
														<input type="text" name="blog" class="form-control" value="<?=$row['blog']?>"  >
													</div>
												</div>



												<div class="form-group">
													<label class="col-md-3 control-label" >Linkedin  :</label>
													<div class="col-md-8">
														<input type="text" name="linkedin_profile_url" class="form-control" value="<?=$row['linkedin_profile_url']?>"  >
													</div>
												</div>


												<div class="form-group">
													<label class="col-md-3 control-label" >Facebook  :</label>
													<div class="col-md-8">
														<input type="text" name="facebook" class="form-control" value="<?=$row['facebook']?>"  >
													</div>
												</div>


												<div class="form-group">
													<label class="col-md-3 control-label" >Twitter  :</label>
													<div class="col-md-8">
														<input type="text" name="twitter" class="form-control" value="<?=$row['twitter']?>"  >
													</div>
												</div>



												<div class="form-group">
													<label class="col-md-3 control-label" >Google Plus :</label>
													<div class="col-md-8">
														<input type="text" name="google" class="form-control" value="<?=$row['google']?>"  >
													</div>
												</div>


												


											</fieldset>
											<hr class="dotted tall">
											



											
											
											<div class="panel-footer">
												<div class="row">
													<div class="col-md-9 col-md-offset-3">
														<button type="submit" class="btn btn-primary">Update</button>
														<button type="reset" class="btn btn-default">Reset</button>
													</div>
												</div>
											</div>

										</form>

									</div>

									







									<div id="file" class="tab-pane">
										<h4 class="mb-md">Update Files</h4>

										<section class="simple-compose-box mb-xlg">
											<form class="form-horizontal" action="server/insertpost2.php" method="post" enctype="multipart/form-data" name="product" >
												<textarea name="message-text" data-plugin-textarea-autosize="" placeholder="What's on your mind?" rows="1" style="overflow: hidden; word-wrap: break-word; resize: none; height: 37px;"></textarea>
											
												<input name="action" type="hidden" id="id" value="insertpost"/>
											<div class="compose-box-footer">
												<ul class="compose-toolbar">
													<li>
														<input type="file" name="postimage" class="filestyle" data-input="false">
														<input type="text" name="id" class="form-control hide" value="<?=$row['id']?>" >
													</li>
													
												</ul>
												<ul class="compose-btn">
													<li>
														
														<button type="submit" class="btn btn-primary btn-xs" style="padding:3px 4px; margin-top:5px;">post</button>
													</li>
												</ul>
											</div>
											</form>
										</section>

										<h4 class="mb-xlg">CV File</h4>

										<div class="timeline timeline-simple mt-xlg mb-md">
											<div class="tm-body">
												
												<ol class="tm-items" id="post-items">
													<?php
													
											$sql3="SELECT * FROM candidate_profile WHERE id = $row[id] ";
											$result3=mysql_query($sql3)or die(mysql_error());

											$row3=mysql_fetch_assoc($result3);
											if($row3['cv'] != ""){
												$numcv=1;
											} else {
												$numcv=0;
											}
											

												$time = strtotime($row3['update_date']);
												$my_format = date("d/m/Y , g:i a", $time);
											?>
													<li class="post-item">
														<div class="tm-box">
															

											
															
															


									<figure class="profile-picture pull-left" style="margin-left:-15px; margin-right:5px; margin-top:5px;">
								<a href="#"><img src="<?=$row3['file_name']?>" width="35" height="35" alt="<?=$row3['name']?>" class="img-circle" data-lock-picture="avatar/<?=$row3['file_name']?>" /></a>
							</figure>


              												<p class="text-muted mb-none"><i class="fa fa-clock-o"></i>  <?=$my_format?>. 
																

															</p>
															

															<p><a href="#"><b><?=$row3['name']?></b> </a>: <?=$row3['comment_cv']?><br>

																<?php
																if($row3['cv'] != "")
																{
																	?>


																<a href="cv/<?=$row3['cv']?>" target="_blank" ><i class="fa fa-file-pdf-o" style="font-size:18px;"></i> <?=$row3['comment_cv']?><br>

																	<i class="fa fa-file-pdf-o" style="font-size:16px;"></i> <?=$row3['name']?>_CV_FILE
																</a>

															



																
															<?php	}   ?>
															</p>
														</div>
													</li>
													
													
												</ol>
											</div>
										</div>
									</div>


















								</div>
							</div>


							
						




						</div>
						<div class="col-md-12 col-lg-3">

							<h4 class="mb-md">CV file</h4>
							<section class="panel">
											
<div class="panel-body bg-primary" style="margin-bottom:10px;">
										<div class="widget-summary widget-summary-sm">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-primary">
													<i class="fa fa-file-pdf-o"></i>
												</div>
											</div>
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="title">CV File <a href="cv/<?=$row3['cv']?>" target="_blank" style="float:right; color:#fff; font-size:18px"><i class="fa fa-play-circle "></i></a></h4>
													<div class="info">
														<strong class="amount"><?=$numcv?></strong>
														<span class="text-primary ">
																														<a href="cv/<?=$row3['cv']?>" target="_blank" style="font-size:13px;" class="textl">(view CV)</a>
																													</span>
													</div>
												</div>
												<div class="summary-footer">
															<a class="text-uppercase">(view all)</a>
														</div>
											</div>
										</div>
									</div>


							</section>





							<h4 class="mb-md">Job Apply</h4>
							<section class="panel">
			<?php

$sql="SELECT * FROM submit_job WHERE user_id = '$oauth_uid' ORDER BY id DESC ";
$result=mysql_query($sql)or die(mysql_error());
$numa=mysql_num_rows($result);
if($numa > 0){


for($i=0;$row=mysql_fetch_assoc($result);$i++){ 

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
													<h4 class="title">Job apply <a href="job-ap-detail.php?id=<?=base64_encode($row['id'])?>" target="_blank" style="float:right; color:#fff; font-size:18px"><i class="fa fa-play-circle "></i></a></h4>
													<div class="info">
														<strong class="amount"><?=$row['id']?></strong>
														<span class="text-primary ">
																														<a href="job-ap-detail.php?id=<?=base64_encode($row['id'])?>" target="_blank" style="font-size:13px;" class="textl">(view)</a>
																													</span>
													</div>
												</div>
												<div class="summary-footer">
															<a class="text-uppercase">(view all)</a>
														</div>
											</div>
										</div>
									</div>
<?php
}
}
?>

							</section>




							<h4 class="mb-md">Job Refer</h4>
							<section class="panel">
			<?php

$sql="SELECT * FROM refer_email WHERE user_id = $customer_id ORDER BY id DESC ";
$result=mysql_query($sql)or die(mysql_error());
$numa=mysql_num_rows($result);
if($numa > 0){


for($i=0;$row=mysql_fetch_assoc($result);$i++){ 

			?>



<div class="panel-body bg-quartenary" style="margin-bottom:10px;">
										<div class="widget-summary widget-summary-sm">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-primary">
													<i class="fa fa-user"></i>
												</div>
											</div>
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="title">Job Refer <a href="job-refer-detail.php?id=<?=base64_encode($row['id'])?>" target="_blank" style="float:right; color:#fff; font-size:18px"><i class="fa fa-play-circle "></i></a></h4>
													<div class="info">
														<strong class="amount"><?=$row['id']?></strong>
														<span class="text-primary ">
																														<a href="job-refer-detail.php?id=<?=base64_encode($row['id'])?>" target="_blank" style="font-size:13px;" class="textl">(view)</a>
																													</span>
													</div>
												</div>
												<div class="summary-footer">
															<a class="text-uppercase">(view all)</a>
														</div>
											</div>
										</div>
									</div>
<?php
}
}
?>

							</section>


							
						
				<h4 class="mb-md">Refer links</h4>
							<section class="panel">
			<?php

$sql="SELECT * FROM refer_cv WHERE user_id = $customer_id ORDER BY id DESC ";
$result=mysql_query($sql)or die(mysql_error());
$numa=mysql_num_rows($result);
if($numa > 0){


for($i=0;$rowj=mysql_fetch_assoc($result);$i++){ 


$sql5="SELECT * FROM candidate_profile WHERE id = $rowj[user_id] ";
        $result5=mysql_query($sql5)or die(mysql_error());
        $row5=mysql_fetch_assoc($result5);

			?>



<div class="panel-body bg-tertiary" style="margin-bottom:10px;">
										<div class="widget-summary widget-summary-sm">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-primary">
													<i class="fa fa-user"></i>
												</div>
											</div>
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="title">Job Refer <a href="#modalAnim3-<?=$rowj['id']?>" target="_blank" style="float:right; color:#fff; font-size:18px" class="modal-with-zoom-anim"><i class="fa fa-play-circle "></i></a></h4>
													<div class="info">
														<strong class="amount"><?=$rowj['id']?></strong>
														<span class="text-primary ">
																														<a href="#modalAnim3-<?=$rowj['id']?>" target="_blank" style="font-size:13px;" class="modal-with-zoom-anim textl">(view)</a>
																													</span>
													</div>
												</div>
												<div class="summary-footer">
															<a class="text-uppercase">(view all)</a>
														</div>
											</div>
										</div>
									</div>




<div id="modalAnim3-<?=$rowj['id']?>" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
										<form id="demo-form2" class="form-horizontal mb-lg" method="post" enctype="multipart/form-data">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title"><?=$rowj['name']?></h2>
											</header>
											<div class="panel-body">
									<div id="showalert1"></div>
										
										<input name="id" type="hidden" id="id" value="<?=base64_encode($rowj['id'])?>"/>
												
													
													<div class="form-group">

														<label for="name" class="col-sm-3 control-label">Refer to</label>
								                        <div class="col-sm-7">
								                        	<label for="name" class=" control-label"><a href="candidate_profile.php?cus_id=<?=$row5['id']?>" target="_blank"> <?=$row5['name']?></a></label>
								                            
								                        </div>
								                        
								                        
								                    </div>



								                    <div class="form-group">

														<label for="name" class="col-sm-3 control-label">Cv file</label>
								                        <div class="col-sm-7">
								                        	
								                            

        <?php
if($rowj['file'] == NULL){
        ?>
<label for="name" class=" control-label"><a href="<?=$rowj['dropbox']?>" target="_blank"><i class="icon-dropbox"></i> : Dropbox File</a><b/></label>
        <?php
}else{
        ?>
 <label for="name" class=" control-label"><a href="upload/<?=$rowj['file']?>" target="_blank"><i class=" icon-doc-text"></i> <?=$rowj['file']?></a><b/></label>
        <?php
    }
        ?>


								                        </div>
								                        
								                        
								                    </div>


								                <div class="form-group">

														<label for="name" class="col-sm-3 control-label">Email</label>
								                        <div class="col-sm-7">
								                        	<label for="name" class=" control-label"><?=$rowj['email']?></label>
								                            
								                        </div>
								                        
								                        
								                    </div> 


								                    <div class="form-group">

														<label for="name" class="col-sm-3 control-label">Phone</label>
								                        <div class="col-sm-7">
								                        	<label for="name" class=" control-label"><?=$rowj['tel']?></label>
								                            
								                        </div>
								                        
								                        
								                    </div>   

								                    <div class="form-group">

														<label for="name" class="col-sm-3 control-label">Company </label>
								                        <div class="col-sm-7">
								                        	<label for="name" class=" control-label"><?=$rowj['location']?></label>
								                            
								                        </div>
								                        
								                        
								                    </div>   

								                    <div class="form-group">

														<label for="name" class="col-sm-3 control-label">Position </label>
								                        <div class="col-sm-7">
								                        	<label for="name" class=" control-label"><?=$rowj['position']?></label>
								                            
								                        </div>
								                        
								                        
								                    </div>   


								                    <div class="form-group">

														<label for="name" class="col-sm-3 control-label">Insert date </label>
								                        <div class="col-sm-7">
								                        	<label for="name" class=" control-label"><?=$rowj['insert_date']?></label>
								                            
								                        </div>
								                        
								                        
								                    </div>    







								               



								                  


												
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														
														<button class="btn btn-default modal-dismiss">Cancel</button>
													</div>
												</div>
											</footer>
											
										</section>
										</form>
									</div>








<?php
}
}
?>

							</section>			


							
							
						</div>

					</div>






				
					


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


		<!-- Specific Page Vendor -->		
		<script src="http://maps.google.com/maps/api/js?sensor=false"></script>		
		<script src="assets/vendor/gmaps/gmaps.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>

		<!-- Analytics to Track Preview Website -->		
		<!-- Examples -->
	

		<script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>
		<script src="assets/javascripts/ui-elements/examples.modals.js"></script>
		<script src="assets/javascripts/pages/examples.mediagallery.js"></script>
		
		<script src="assets/javascripts/ui-elements/examples.loading.overlay.js"></script>

		<script>(function(a,b,c){if(c in b&&b[c]){var d,e=a.location,f=/^(a|html)$/i;a.addEventListener("click",function(a){d=a.target;while(!f.test(d.nodeName))d=d.parentNode;"href"in d&&(d.href.indexOf("http")||~d.href.indexOf(e.host))&&(a.preventDefault(),e.href=d.href)},!1)}})(document,window.navigator,"standalone")</script>   
		

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


function product_imageCreateElement(){
  var product_image=document.getElementById('product_image');
  var product_imageElement=document.createElement('input');
      product_imageElement.setAttribute('type',"file");
      product_imageElement.setAttribute('name',"product_image[]");
      product_imageElement.setAttribute('class',"form-control");
      product_image.appendChild(product_imageElement);     
}

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






	

	

	var initBasicWithMarkers = function() {
		var map = new GMaps({
			div: '#gmap-basic-marker',
			lat: "<?=$row['lat_map']?>",
			lng: "<?=$row['lng_map']?>",
			markers: [{
				lat: "<?=$row['lat_map']?>",
				lng: "<?=$row['lng_map']?>",
				infoWindow: {
					content: '<p>Basic</p>'
				}
			}]
		});

		map.addMarker({
			lat: "<?=$row['lat_map']?>",
			lng: "<?=$row['lng_map']?>",
			infoWindow: {
				content: '<p>Example</p>'
			}
		});
	};

	
	

	// auto initialize
	$(function() {

		
		initBasicWithMarkers();
	
	

	});




</script>


		


	</body>
</html>