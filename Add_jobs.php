<?php
session_start();
include('server/connect.php');
if(isset($_SESSION['ssUsername2'])){$username=$_SESSION['ssUsername2'];}
else if(!isset($_SESSION['ssUsername2'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}


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
		<title>Add New Job</title>
		<meta name="keywords" content="Add New Job" />
		<meta name="description" content="Add New Job">
		

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
		<link rel="stylesheet" href="assets/vendor/pnotify/pnotify.custom.css">
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
			.hide {
  display: none !important;
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
									</li> -->
									<li >
										<a href="upload_view.php" onclick="clicksound.playclip()">
											<i class="fa fa-star-o" aria-hidden="true"></i>
											<span>General Upload</span>
										</a>
									</li>
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
									<li>
										<a href="referral.php" onclick="clicksound.playclip()">
											<i class="fa fa-sitemap" aria-hidden="true"></i>
											<span>Referral</span>
										</a>
									</li>
									<li>
										<a href="blog.php" onclick="clicksound.playclip()">
											<i class="fa fa-comments-o" aria-hidden="true"></i>
											<span>Bolg</span>
										</a>
									</li>
									<li>
										<a href="job_level.php" onclick="clicksound.playclip()">
											<i class="fa fa-star-half-o" aria-hidden="true"></i>
											<span>Job level</span>
										</a>
									</li>
									<li class="nav-expanded nav-active">
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
									
									

									
								</ul>
							</nav>
				
							
				
							<hr class="separator" />
				
							
						</div>
				
					</div>
				
				</aside>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Add New Job</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="Dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Add New Job</span></li>
								
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
<div class="row">
    <div class="col-xs-12">
        <section class="panel form-wizard" id="w4">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
                    <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss=""></a>
                </div>
                <h2 class="panel-title">Add New Job</h2>
            </header>
            <div class="panel-body">
                <form class="form-horizontal" novalidate="novalidate" action="process/product/productInsert.php" method="post" enctype="multipart/form-data" name="product">
                    <div class="tab-content">
                        <div id="w4-account" class="tab-pane active">
                            <input name="meid" type="hidden" id="id" value="<?=$iduser?>" />
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status" class="col-sm-4 control-label">Job status</label>
                                    <div class="col-sm-7">
                                        <select name="status" id="status" class="form-control">
                                            <option value="0">general</option>
                                            <option value="1">Hot job</option>
                                            <option value="2">Picks job</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="status" class="col-sm-4 control-label">Job type</label>
                                    <div class="col-sm-7">
                                        <select name="statustype" id="status" class="form-control">
                                            <option value="0">All</option>
                                            <option value="1">Junior</option>
                                            <option value="2">Middle</option>
                                            <option value="3">Senoie</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="status" class="col-sm-4 control-label">Private/Public</label>
                                    <div class="col-sm-7">
                                        <select name="status2" id="status" class="form-control">
                                            <option value="0">Public</option>
                                            <option value="1">Private</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="company" class="col-sm-4 control-label">Company</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="company" id="company" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="LoginPhill" class="col-sm-4 control-label">Department*</label>
                                    <div class="col-sm-7">
                                        <select name="Department" id="broker" class="form-control">
                                            <option value="">-- Please choose --</option>
                                            <?php
                                                $sqlcus="SELECT * FROM category WHERE id != 0 ORDER BY id ASC ";
                                                $resultcus=mysql_query($sqlcus)or die(mysql_error());
                                                for($icus=0;$rowcus=mysql_fetch_assoc($resultcus);$icus++){ 
                                            ?>
                                                <option value="<?=$rowcus['id']?>">
                                                    <?=$rowcus['name']?>
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="LoginPhill" class="col-sm-4 control-label">Job leval*</label>
                                    <div class="col-sm-7">
                                        <select name="job_leval" id="job_leval" class="form-control">
                                            <option value="">-- Please choose --</option>
                                            <?php
                                                $sqlcus="SELECT * FROM job_level WHERE id != 0 ORDER BY name ASC ";
                                                $resultcus=mysql_query($sqlcus)or die(mysql_error());
                                                for($icus=0;$rowcus=mysql_fetch_assoc($resultcus);$icus++){ 
                                            ?>
                                                <option value="<?=$rowcus['id']?>">
                                                    <?=$rowcus['name']?>
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="typeahead-container form-group ">
                                    <label class="col-sm-4 control-label" for="user_email">Nationalities</label>
                                    <div class="col-sm-7">
                                        <span class="typeahead-query">
                                            <input  type="text" class="form-control" id="nationalities" name="nationalities" placeholder="Enter nationalities">
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="LoginPhill" class="col-sm-4 control-label">Title</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="Title" id="LoginPhill" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="LoginPhill" class="col-sm-4 control-label">Title type</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="Titletype" id="LoginPhill" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="linkedin" class="col-sm-4 control-label">Linkedin</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="linkedin" id="linkedin" class="form-control">
                                    </div>
                                </div>
                                <hr>
                                <div class="typeahead-container form-group ">
                                    <label class="col-sm-4 control-label" for="user_email">Country</label>
                                    <div class="col-sm-7">
                                        <span class="typeahead-query">
                                            <input  type="text" class="form-control" id="Country" name="Country" placeholder="Enter Country">
                                        </span>
                                    </div>
                                </div>
                                <div class="typeahead-container form-group ">
                                    <label class="col-sm-4 control-label" for="user_email">City</label>
                                    <div class="col-sm-7">
                                        <span class="typeahead-query">
                                            <input  type="text" class="form-control" id="city" name="City" placeholder="Enter City">
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="doneLTF" class="col-sm-4 control-label">Address</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="Address" id="doneLTF" class="form-control">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="detail" class="col-sm-4 control-label">Description</label>
                                    <div class="col-sm-7">
                                        <textarea name="Description" id="detail" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="summary" class="col-sm-4 control-label">summary</label>
                                    <div class="col-sm-7">
                                        <textarea name="summary" id="summary" rows="3" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="openSignature" class="col-sm-4 control-label">Min Salary</label>
                                    <div class="col-sm-7">
                                        <input type="number" name="Min_Salary" id="openSignature" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="openSignature" class="col-sm-4 control-label">Max Salary</label>
                                    <div class="col-sm-7">
                                        <input type="number" name="Max_Salary" id="openSignature" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="openSignature" class="col-sm-4 control-label">Refer Bonus</label>
                                    <div class="col-sm-7">
                                        <input type="number" name="Bonus" id="openSignature" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="currency" class="col-sm-4 control-label">Currency</label>
                                    <div class="col-sm-7">
                                        <select name="currency" id="currency" class="form-control">
                                            <option value="THB">THB</option>
                                            <option value="IDR">IDR</option>
                                            <option value="PHP">PHP</option>
                                            <option value="VND">VND</option>
                                            <option value="USD">USD</option>
                                            <option value="SGD">SGD</option>
                                            <option value="SGD">MYR</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="no" class="col-sm-4 control-label">SIMILAR JOBS</label>
                                    <div class="col-sm-7">
                                        <select multiple data-plugin-selectTwo name="jobid[]" id="jobid" class="form-control populate">
                                                <?php
                                                    $sql5="SELECT id, title FROM job_post";
                                                    $result5=mysql_query($sql5)or die(mysql_error());
                                                    for($i5=0;$row5=mysql_fetch_assoc($result5);$i5++){ 
                                                ?>
                                                <option value="<?=$row5['id']?>">
                                                    <?=$row5['id']?>/
                                                    <?=$row5['title']?>
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                        </select>
                                        <!-- <input type="text" name="code"  class="form-control" required=""> -->
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Job Description File</label>
                                    <div class="col-md-7">
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
                                <legend class="section"></legend>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-info" onclick="clicksound.playclip()">
                                        <i class="fa fa-save"></i> บันทึก
                                    </button>
                                    <button type="reset" class="btn btn-default" onclick="showhide('#show','#add');">
                                        <i class="fa fa-eraser"></i> ยกเลิก
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
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


					<script src="assets/vendor/jquery-autosize/jquery.autosize.js"></script>
		
		<!-- Specific Page Vendor -->		<script src="assets/vendor/jquery-validation/jquery.validate.js"></script>
		<script src="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		<script src="assets/vendor/bootstrap-wizard/jquery.bootstrap.wizard.js"></script>
		<script src="assets/vendor/select2/select2.js"></script>
		<script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		<script src="assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>


		
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
		<script src="assets/javascripts/forms/examples.wizard.js"></script>
		<script src="assets/vendor/pnotify/pnotify.custom.js"></script>
		<script src="assets/javascripts/ui-elements/examples.loading.overlay.js"></script>
		
<script type="text/javascript">


$(".itemSearch").select2({
    minimumInputLength: 2,
    tags: [],
    ajax: {
        url: 'http://www.jbmonster.com/admin/server/nationalities.json',
        dataType: 'json',
        type: "GET",
        quietMillis: 50,
        data: function (term) {
            return {
                term: term
            };
        },
        results: function (data) {
            return {
                results: $.map(data, function (item) {
                    return {
                        text: item.nationalities,
                        
                    }
                })
            };
        }
    }
});
</script>



<script type="text/javascript">
    $(document).ready(function() {
       $('select#tex').change(function() {
            var tex = $('select#tex').val();

            if (tex == 1) {
                $("#texhave").fadeIn().removeClass();
            }
        });

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
  var product_image=document.getElementById('product_mf');
  var product_imageElement=document.createElement('input');
      product_imageElement.setAttribute('type',"text");
      product_imageElement.setAttribute('name',"product_mf[]");
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

</script>

	<script src="assets/src/jquery.typeahead.js"></script>
    <script type="text/javascript">
        var data = {
            countries: ["Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda",
                "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh",
                "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia",
                "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burma",
                "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Central African Republic", "Chad",
                "Chile", "China", "Colombia", "Comoros", "Congo, Democratic Republic", "Congo, Republic of the",
                "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti",
                "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador",
                "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Fiji", "Finland", "France", "Gabon",
                "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Greenland", "Grenada", "Guatemala", "Guinea",
                "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India",
                "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan",
                "Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kuwait", "Kyrgyzstan", "Laos",
                "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg",
                "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands",
                "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Mongolia", "Morocco", "Monaco",
                "Mozambique", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger",
                "Nigeria", "Norway", "Oman", "Pakistan", "Panama", "Papua New Guinea", "Paraguay", "Peru",
                "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Samoa", "San Marino",
                "Sao Tome", "Saudi Arabia", "Senegal", "Serbia and Montenegro", "Seychelles", "Sierra Leone",
                "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "Spain",
                "Sri Lanka", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan",
                "Tajikistan", "Tanzania", "Thailand", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey",
                "Turkmenistan", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States",
                "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe"],
            nationalities: [
"All",            
"Afghan",
"Albanian",
"Algerian",
"American",
"Andorran",
"Angolan",
"Antiguans",
"Argentinean",
"Armenian",
"Australian",
"Austrian",
"Azerbaijani",
"Bahamian",
"Bahraini",
"Bangladeshi",
"Barbadian",
"Barbudans",
"Batswana",
"Belarusian",
"Belgian",
"Belizean",
"Beninese",
"Bhutanese",
"Bolivian",
"Bosnian",
"Brazilian",
"British",
"Bruneian",
"Bulgarian",
"Burkinabe",
"Burmese",
"Burundian",
"Cambodian",
"Cameroonian",
"Canadian",
"Cape Verdean",
"Central African",
"Chadian",
"Chilean",
"Chinese",
"Colombian",
"Comoran",
"Congolese",
"Congolese",
"Costa Rican",
"Croatian",
"Cuban",
"Cypriot",
"Czech",
"Danish",
"Djibouti",
"Dominican",
"Dominican",
"Dutch",
"Dutchman",
"Dutchwoman",
"East Timorese",
"Ecuadorean",
"Egyptian",
"Emirian",
"Equatorial Guinean",
"Eritrean",
"Estonian",
"Ethiopian",
"Fijian",
"Filipino",
"Finnish",
"French",
"Gabonese",
"Gambian",
"Georgian",
"German",
"Ghanaian",
"Greek",
"Grenadian",
"Guatemalan",
"Guinea-Bissauan",
"Guinean",
"Guyanese",
"Haitian",
"Herzegovinian",
"Honduran",
"Hungarian",
"I-Kiribati",
"Icelander",
"Indian",
"Indonesian",
"Iranian",
"Iraqi",
"Irish",
"Irish",
"Israeli",
"Italian",
"Ivorian",
"Jamaican",
"Japanese",
"Jordanian",
"Kazakhstani",
"Kenyan",
"Kittian and Nevisian",
"Kuwaiti",
"Kyrgyz",
"Laotian",
"Latvian",
"Lebanese",
"Liberian",
"Libyan",
"Liechtensteiner",
"Lithuanian",
"Luxembourger",
"Macedonian",
"Malagasy",
"Malawian",
"Malaysian",
"Maldivan",
"Malian",
"Maltese",
"Marshallese",
"Mauritanian",
"Mauritian",
"Mexican",
"Micronesian",
"Moldovan",
"Monacan",
"Mongolian",
"Moroccan",
"Mosotho",
"Motswana",
"Mozambican",
"Namibian",
"Nauruan",
"Nepalese",
"Netherlander",
"New Zealander",
"Ni-Vanuatu",
"Nicaraguan",
"Nigerian",
"Nigerien",
"North Korean",
"Northern Irish",
"Norwegian",
"Omani",
"Pakistani",
"Palauan",
"Panamanian",
"Papua New Guinean",
"Paraguayan",
"Peruvian",
"Polish",
"Portuguese",
"Qatari",
"Romanian",
"Russian",
"Rwandan",
"Saint Lucian",
"Salvadoran",
"Samoan",
"San Marinese",
"Sao Tomean",
"Saudi",
"Scottish",
"Senegalese",
"Serbian",
"Seychellois",
"Sierra Leonean",
"Singaporean",
"Slovakian",
"Slovenian",
"Solomon Islander",
"Somali",
"South African",
"South Korean",
"Spanish",
"Sri Lankan",
"Sudanese",
"Surinamer",
"Swazi",
"Swedish",
"Swiss",
"Syrian",
"Taiwanese",
"Tajik",
"Tanzanian",
"Thai",
"Togolese",
"Tongan",
"Trinidadian or Tobagonian",
"Tunisian",
"Turkish",
"Tuvaluan",
"Ugandan",
"Ukrainian",
"Uruguayan",
"Uzbekistani",
"Venezuelan",
"Vietnamese",
"Welsh",
"Welsh",
"Yemenite",
"Zambian",
"Zimbabwean"
]
        };

        $('#Country').typeahead({
            minLength: 1,
            order: "asc",
            group: true,
            groupMaxItem: 6,
            hint: true,
           
            href: "https://en.wikipedia.org/?title={{display}}",
            template: "{{display}}, <small><em>{{group}}</em></small>",
            source: {
                country: {
                    data: data.countries
                }
            },
        });



$('#nationalities').typeahead({
            minLength: 1,
            order: "asc",
            group: true,
            groupMaxItem: 6,
            hint: true,
           
            href: "https://en.wikipedia.org/?title={{display}}",
            template: "{{display}}, <small><em>{{group}}</em></small>",
            source: {
                nationalities: {
                    data: data.nationalities
                }
            },
        });


</script>


<script src="js/Basic/ckeditor/ckeditor.js"></script>
<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'detail' );
            </script>	


	</body>
</html>