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
									<a role="menuitem" tabindex="-1" href="profile.php" ><i class="fa fa-user"></i> My Profile</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="pages-lock-screen" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="server/logout.php?id=<?=$row['id']?>" ><i class="fa fa-power-off"></i> Logout</a>
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
										<a href="profile.php" >
											<i class="fa fa-user " aria-hidden="true" data="<?=$_SESSION['ssUserId']?>"></i>
											<span>User Profile</span>
										</a>
									</li>

									<!-- <li >
										<a href="upload_view.php" >
											<i class="fa fa-star-o" aria-hidden="true"></i>
											<span>General Upload</span>
										</a>
									</li> -->
	<?php
			if($_SESSION['ssRole']=="admin"){
	?>								
									<li>
										<a href="Dashboard.php" >
											<i class="fa fa-line-chart" aria-hidden="true" ></i>
											<span>Dashboard</span>
										</a>
									</li>
	<?php
			} else {
	?>
									<li>
										<a href="Dashboard2.php" >
											<i class="fa fa-line-chart" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
									</li>

	<?php	
			}				
	?>

	<?php
			if($_SESSION['ssRole']=="admin"){
	?>								
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
										<a href="blog.php" >
											<i class="fa fa-comments-o" aria-hidden="true"></i>
											<span>Blog</span>
										</a>
									</li>
	<?php
			}
	?>

	<?php
			if($_SESSION['ssRole']=="admin" || $_SESSION['ssCanAcc']){
	?>		
									<li>
										<a href="candidate.php" >
											<i class="fa fa-users" aria-hidden="true"></i>
											<span>Candidate</span>
										</a>
									</li>

									<li>
										<a href="referral.php" >
											<i class="fa fa-sitemap" aria-hidden="true"></i>
											<span>Referral</span>
										</a>
									</li>
									<li>
										<a href="job-ap.php" >
											<i class="fa fa-building-o" aria-hidden="true"></i>
											<span>Job Apply</span>
										</a>
									</li>
									<li>
										<a href="job-refer.php" >
											<i class="fa fa-user-plus" aria-hidden="true"></i>
											<span>Job Refer</span>
										</a>
									</li>
	<?php
			}
	?>
	<?php
			if($_SESSION['ssRole']=="admin" || $_SESSION['ssJobAcc']){
	?>	
									<li>
										<a href="job.php" >
											<i class="fa fa-cube" aria-hidden="true"></i>
											<span>Job</span>
										</a>
									</li>
									<li >
										<a href="Pick-job.php" >
											<i class="fa fa-paw" aria-hidden="true"></i>
											<span>Pick Job</span>
										</a>
									</li>
									<li>
										<a href="job_level.php" >
											<i class="fa fa-star-half-o" aria-hidden="true"></i>
											<span>Job level</span>
										</a>
									</li>
									<li>
										<a href="category.php" >
											<i class="fa fa-cubes" aria-hidden="true"></i>
											<span>Category</span>
										</a>
									</li>		
	<?php
			}
	?>	
	<?php
			if($_SESSION['ssRole']=="admin"){
	?>									

									<li  class="nav-expanded nav-active">
										<a href="user.php"  >
											<i class="fa fa-cubes" aria-hidden="true"></i>
											<span>User</span>
										</a>
									</li>	
									<li>
										<a href="setting.php" >
											<i class="fa fa-cog " aria-hidden="true"></i>
											<span>Setting</span>
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
					
							<a class="sidebar-right-toggle" data-open="sidebar-right" ><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
<!--
		<======================= 	Shift indent back
														-->					
<div class="row">

<?php
	$sqlj="SELECT * FROM user WHERE id = $id";
	$resultj=mysql_query($sqlj)or die(mysql_error());
	$rowj=mysql_fetch_assoc($resultj);
?>

<div class="col-md-8 col-lg-9">
    <div class="tabs tabs-primary">
        <ul class="nav nav-tabs tabs-primary">
            <li class="active">
                <a href="#viewer" data-toggle="tab" aria-expanded="true" style="border-top: 3px solid #555555; color:#555555">User Info </a>

            </li>
            <li class="">
                <a href="#editor" data-toggle="tab" aria-expanded="false" style="border-top: 3px solid #555555; color:#555555">Edit User Info</a>
            </li>
        </ul>
        <div class="tab-content">
            <div id="viewer" class="tab-pane active">
                <h4 class="mb-xlg text-primary">
                    <b>User ID : <?=$rowj['id']?></b>
                </h4>
                <hr>
                <fieldset>
                	
                    <div class="form-group">
                        <label class="col-md-3 control-label"><b>Username :</b></label>
                        <div class="col-md-8">
                            <label class="">
                                <?=$rowj['username']?>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><b>First Name :</b></label>
                        <div class="col-md-8">
                            <label class="">
                                <?=$rowj['First_Name']?>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><b>Last Name :</b></label>
                        <div class="col-md-8">
                            <label class="">
                                <?=$rowj['Last_Name']?>
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
                        <label class="col-md-3 control-label"><b>Admin :</b></label>
                        <div class="col-md-8">
                            <label class="">
	<?php
		if ($rowj['admin']==0){
			echo "No";
	?>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"><b>Job Management :</b></label>
                        <div class="col-md-8">
                            <label class="">
		<?php
			if ($rowj['job_mng']==1){
				echo "Yes";
			} else {
				echo "No";
			} 
		?>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><b>Candidate Management :</b></label>
                        <div class="col-md-8">
                            <label class="">
		<?php
			if ($rowj['candy_mng']==1){
				echo "Yes";

			} else {
				echo "No";
			} 
		?>
                            </label>
                        </div>
                    </div>
    <?php 
		} else {
			echo "Yes";

	?>
					        </label>
                        </div>
                    </div>
	<?php
		} 
    ?>
                </fieldset>
            </div>


            <!-- End viewer -->
            <div id="editor" class="tab-pane">
                <h4 class="mb-xlg">Edit User Information</h4>
                	<form class="form-horizontal" action="process/user/userUpdate.php" method="post" enctype="multipart/form-data" name="product" >
                	<hr>
						<h5 class="mb-xlg">Personal Information</h5>
						
						<fieldset>
							<div class="form-group">
								<label class="col-md-3 control-label" for="profileFirstName">UserName</label>
								<div class="col-md-8">
									<input name="id" type="hidden" id="id" value="<?=$rowj['id']?>"/>
									<input type="text" name="uname" class="form-control" value="<?=$rowj['username']?>" id="profileFirstName" >
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="profileFirstName">First Name</label>
								<div class="col-md-8">
									<input type="text" name="fname" class="form-control" value="<?=$rowj['First_Name']?>" id="profileFirstName" >
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="profileLastName">Last Name</label>
								<div class="col-md-8">
									<input type="text" name="lname" class="form-control" value="<?=$rowj['Last_Name']?>" id="profileLastName" >
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="profileLastName">Email</label>
								<div class="col-md-8">
									<input type="text" name="email" class="form-control" value="<?=$rowj['email']?>" id="profileLastName" >
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="profileLastName">Telephone</label>
								<div class="col-md-8">
									<input type="text" name="tel" class="form-control" value="<?=$rowj['tel']?>" id="profileLastName" >
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="profilePic">Avatar Picture</label>
								<div class="col-md-8">
									<input type="file" name="image" class="form-control" id="profilePic" >
								</div>
							</div>
						<hr class="dotted tall">
						<h5 class="mb-xlg">Permission</h5>
						<fieldset>
							<div class="form-group">
								<label class="col-md-3 control-label" for="profileAdmin">Admin</label>
								<div class="col-md-8">
									<input type="text" name="admin" class="form-control" value="<?=$rowj['admin']?>" id="profileAdmin" >
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="profileJobMng">Job Management</label>
								<div class="col-md-8">
									<input type="text" name="jobMng" class="form-control" value="<?=$rowj['job_mng']?>" id="profileJobMng" >
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="profileCanMng">Candidate Management</label>
								<div class="col-md-8">
									<input type="text" name="canMng" class="form-control" value="<?=$rowj['candy_mng']?>" id="profileCanMng" >
								</div>
							</div>
						</fieldset>
						
						<div class="panel-footer">
							<div class="row">
								<div class="col-md-9 col-md-offset-3">
									<button type="submit" class="btn btn-primary">Submit</button>
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

</div>  
<!-- end of indent shifted row  -->

					<!-- end: page -->
				</section>
			</div>
			
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
$('.dropdown-toggle').dropdown();
   
</script>
	</body>
</html>