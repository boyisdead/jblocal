<?php
session_start();
include('server/connect.php');
if(isset($_SESSION['ssUsername2'])){$username=$_SESSION['ssUsername2'];}
else if(!isset($_SESSION['ssUsername2'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}

$id=base64_decode($_REQUEST['id']);


		$sql="SELECT * FROM user WHERE username = '$username'";
		$result=mysql_query($sql)or die(mysql_error());
		$row=mysql_fetch_assoc($result);
		$iduser = $row['id'];


$sql2="SELECT * FROM job_post WHERE id = $id ";
$result2=mysql_query($sql2)or die(mysql_error());
$row2=mysql_fetch_assoc($result2);





        $sqlCategoryz="SELECT * FROM job_level WHERE id=$row2[job_level]";
        $resultCategoryz=mysql_query($sqlCategoryz) or die(mysql_error());
    
        $rowCategoryz=mysql_fetch_assoc($resultCategoryz); 



 $level = $rowCategoryz['id'];

switch ($level) {
    case "1":
        $level = "Executive Management";
        break;
    case "2":
        $level = "Director / VP";
        break; 
     case "3":
        $level = "Senior Manager";
        break;
    case "4":
        $level = "Manager";
        break; 
    case "5":
        $level = "Entry / Associate";
        break; 
    case "10":
        $level = "Senior Associate";
        break;                       
    default:
        $level = " ";
}	


$type1 = $row2['type'];

switch ($type1) {
    case "0":
        $type1 = "All";
        break; 
    case "1":
        $type1 = "Junior";
        break;
    case "2":
        $type1 = "Middle";
        break;                  
    default:
        $type1 = "Senoie";
}	



 $status = $row2['status'];

switch ($status) {
    case "1":
        $status = "Hot job";
        break; 
    case "2":
        $status = "Picks job";
        break;       
    default:
        $status = "general";
}	


 $status2 = $row2['status2'];

switch ($status2) {
    case "1":
        $status2 = "Private";
        break;   
    default:
        $status2 = "Public";
}



        $sqlCategory1="SELECT name FROM category WHERE id=$row2[department]";
        $resultCategory1=mysql_query($sqlCategory1) or die(mysql_error());
        $rowCategory1=mysql_fetch_assoc($resultCategory1); 


?>

<!doctype html>
<html class="fixed">
	<head>
		<!-- Basic -->
		<meta charset="UTF-8">
		<title><?=$row2['title']?></title>

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

.nav-tabs li.active a, .nav-tabs li.active a:hover, .nav-tabs li.active a:focus {
    background: white;
    border-left-color: #eeeeee;
    border-right-color: #eeeeee;
    border-top: 3px solid #555555;
    color: #555555;
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
									<li>
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
									<li>
										<a href="candidate.php" onclick="clicksound.playclip()">
											<i class="fa fa-users" aria-hidden="true"></i>
											<span>Candidate</span>
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
									<li >
										<a href="job.php" onclick="clicksound.playclip()">
											<i class="fa fa-cube" aria-hidden="true"></i>
											<span>Job</span>
										</a>
									</li>
									<li class="nav-expanded nav-active">
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
						<h2>Job #ID : <?=$row2['id']?></h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="Dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>#ID : <?=$row2['id']?></span></li>
								
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
										<img src="icon/<?=$row2['icon']?>" class="rounded img-responsive" alt="<?=$row2['title']?>">
										
									</div></a>

									<div class="widget-toggle-expand mb-md widget-collapsed">
										<div class="widget-header">
											<h6><?=$row2['title']?></h6>
											<div class="widget-toggle">+</div>
											<br>
											<p><b><a TARGET='_blank' href="pdf/<?=$row2['file_name']?>"><i class="fa fa-file-pdf-o"></i> Job Description </a></b></p>
										</div>
										
										
									</div>

								
									<div class="clearfix">
										
									</div>

									<hr class="dotted short">

									

								</div>
							</section>


							

						</div>






						<div class="col-md-8 col-lg-9">
							<div class="tabs tabs-primary">
								<ul class="nav nav-tabs tabs-primary">
								
									<li class="active">
										<a href="#edit" data-toggle="tab" aria-expanded="true" style="border-top: 3px solid #555555; color:#555555">Info </a>
									</li>
									<li class="">
										<a href="#pass" data-toggle="tab" aria-expanded="false" style="border-top: 3px solid #555555; color:#555555">Edit Job info</a>
									</li>
								</ul>



								<div class="tab-content">
									







									
									<div id="edit" class="tab-pane active">
											<h4 class="mb-xlg text-primary"><b>Job #ID : <?=$row2['id']?></b></h4>
											<hr>
											<fieldset>


												<div class="form-group">
													<label class="col-md-3 control-label" ><b>Company :</b></label>
													<div class="col-md-8">
														<label class="" ><?=$row2['company']?></label>
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" ><b>Title :</b></label>
													<div class="col-md-8">
														<label class="" ><?=$row2['title']?></label>
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" ><b>Title type :</b></label>
													<div class="col-md-8">
														<label class="" ><?=$row2['title_type']?></label>
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" ><b>Linkedin :</b></label>
													<div class="col-md-8">
														<label class="" ><?=$row2['linkedin']?></label>
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" ><b>Department :</b></label>
													<div class="col-md-8">
														<label class="" ><?=$rowCategory1['name']?></label>
													</div>
												</div>


												<div class="form-group">
													<label class="col-md-3 control-label" ><b>Job Level :</b></label>
													<div class="col-md-8">
														<label class="" ><?=$level?></label>
													</div>
												</div>


												<div class="form-group">
													<label class="col-md-3 control-label" ><b>Job status :</b></label>
													<div class="col-md-8">
														<label class="" ><?=$status?></label>
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" ><b>Job type :</b></label>
													<div class="col-md-8">
														<label class="" ><?=$type1?></label>
													</div>
												</div>


												<div class="form-group">
													<label class="col-md-3 control-label" ><b>Private/Public :</b></label>
													<div class="col-md-8">
														<label class="" ><?=$status2?></label>
													</div>
												</div>




												<div class="form-group">
													<label class="col-md-3 control-label" ><b>Country :</b></label>
													<div class="col-md-8">
														<label class="" ><?=$row2['country']?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" ><b>City :</b></label>
													<div class="col-md-8">
														<label class="" ><?=$row2['city']?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" ><b>Address :</b></label>
													<div class="col-md-7">
														<label class="control-label" ><?=$row2['address']?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label"><b>Description :</b></label>
													<div class="col-md-8">
														<label class="control-label" ><?=$row2['description']?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" ><b>Min Salary :</b></label>
													<div class="col-md-8">
														<label class="control-label" ><?=number_format($row2['salary'])?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" ><b>Max Salary :</b></label>
													<div class="col-md-8">
														<label class="control-label" ><?=number_format($row2['max_salary'])?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" ><b>Refer Bonus :</b></label>
													<div class="col-md-8">
														<label class="control-label" ><?=number_format($row2['refer_bonus'])?></label>
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" ><b>Currency :</b></label>
													<div class="col-md-8">
														<label class="control-label" ><?=$row2['currency']?></label>
													</div>
												</div>


												<h4>SIMILAR JOBS</h4>
												<div class="row">



            <div class="col-sm-12">
            <div class="table-responsive">
											<table class="table mb-none">
												<thead>
													<tr>
														<th>ID</th>
														<th>Job name</th>
														<th>Category</th>
														<th>Action</th>
													</tr>
												</thead>
												
												<tbody>
						<?php
                        $sqlc="SELECT * FROM SIMILARJOBS WHERE similar_jobs = $row2[id]";
						$resultc=mysql_query($sqlc)or die(mysql_error());
						for($i=0;$rowc=mysql_fetch_assoc($resultc);$i++){ 

						$sql5="SELECT * FROM job_post WHERE id = $rowc[job_id]";
						$result5=mysql_query($sql5)or die(mysql_error());
						$row5=mysql_fetch_assoc($result5);


						$sqlc1="SELECT name FROM category WHERE id = $row5[department]";
						$resultc1=mysql_query($sqlc1)or die(mysql_error());
						$rowc1=mysql_fetch_assoc($resultc1);

						?>
													<tr>
														<td><?=$rowc['job_id']?></td>
														<td><?=$row5['title']?></td>
														<td><?=$rowc1['name']?></td>
														<td><a href="process/compose/similar_job_Delete.php?id=<?=$rowc['id']?>" style="font-size: 16px;" onclick="clicksound.playclip()"><i class="fa fa-trash-o"></i></a></td>
													</tr>

													<?php
												}
												?>
													
												</tbody>
											</table>
										</div>
										</div>
										</div>
											
												


											</fieldset>
									</div>  <!-- End edit -->








									<div id="pass" class="tab-pane">

											<h4 class="mb-xlg">Edit Job Information</h4>

									
<form class="form-horizontal" action="process/product/productUpdate_h.php" method="post" enctype="multipart/form-data" name="product" >

<!-- P2 -->
<fieldset>

<?php


?>
	
											<input name="id" type="hidden" id="id" value="<?=$row2['id']?>"/>
											

        




			<div class="form-group">
                <label for="company" class="col-sm-4 control-label">Company</label>
                <div class="col-sm-7">
                    <input type="text" name="company" id="company" value="<?=$row2['company']?>" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label for="Title" class="col-sm-4 control-label">Title</label>
                <div class="col-sm-7">
                    <input type="text" name="Title" id="Title" value="<?=$row2['title']?>" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label for="Titletype" class="col-sm-4 control-label">Title type</label>
                <div class="col-sm-7">
                    <input type="text" name="Titletype" id="Titletype" value="<?=$row2['title_type']?>" class="form-control">
                </div>
            </div>

             <div class="form-group">
                <label for="linkedin" class="col-sm-4 control-label">Linkedin</label>
                <div class="col-sm-7">
                    <input type="text" name="linkedin" value="<?=$row2['linkedin']?>" id="linkedin" class="form-control" >
                </div>
            </div>


            <div class="form-group">
                <label for="LoginPhill" class="col-sm-4 control-label">Department</label>
                <div class="col-sm-7">
                    <select name="Department" id="broker" class="form-control" required="">

                   		<option value="">-- Please choose --</option>
        <?php
        $sqlCategory="SELECT * FROM category WHERE id!=0 ORDER BY name";
        $resultCategory=mysql_query($sqlCategory) or die(mysql_error());
        $numCategory=mysql_num_rows($resultCategory);
        for($i=1;$i<=$numCategory;$i++){$rowCategory=mysql_fetch_array($resultCategory); 
        ?>
        <option value="<?=$rowCategory['id']?>" <?php if($row2['department']==$rowCategory['id']){echo"selected='selected'";}?>><?=$rowCategory['name']?></option>
        <?php
        }
        ?>
                    </select>



                </div>
            </div>







            <div class="form-group">
                <label for="LoginPhill" class="col-sm-4 control-label">Job Level</label>
                <div class="col-sm-7">
                    <select name="job_leval" id="job_leval" class="form-control" required="">

                   		<option value="">-- Please choose --</option>
        <?php
        $sqlCategory="SELECT * FROM job_level WHERE id!=0 ORDER BY name";
        $resultCategory=mysql_query($sqlCategory) or die(mysql_error());
        $numCategory=mysql_num_rows($resultCategory);
        for($i=1;$i<=$numCategory;$i++){$rowCategory=mysql_fetch_array($resultCategory); 
        ?>
        <option value="<?=$rowCategory['id']?>" <?php if($row2['job_level']==$rowCategory['id']){echo"selected='selected'";}?>><?=$rowCategory['name']?></option>
        <?php
        }
        ?>
                    </select>



                </div>
            </div>








            <div class="form-group">
                <label for="status" class="col-sm-4 control-label">Job status</label>
                <div class="col-sm-7">
                 
                    <select name="status" id="status" class="form-control" >
                      
                        <option value="<?=$row2['status']?>"><?=$status?></option>
                   		<option value="0">general</option>
                   		<option value="1">Hot job</option>
                   		<option value="2">Picks job</option>
                   	
                    </select>
                </div>
            </div>

             <?php
 $type1 = $row2['type'];

switch ($type1) {
    case "0":
        $type1 = "All";
        break; 
    case "1":
        $type1 = "Junior";
        break;
    case "2":
        $type1 = "Middle";
        break;                  
    default:
        $type1 = "Senoie";
}	

 ?>           

            <div class="form-group">
                <label for="status" class="col-sm-4 control-label">Job type</label>
                <div class="col-sm-7">
                 
                    <select name="statustype" id="status" class="form-control" >
                      
                        <option value="<?=$row2['type']?>"><?=$type1?></option>
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
                 
                    <select name="status2" id="status" class="form-control" >
                      
                        <option value="<?=$row2['status2']?>"><?=$status2?></option>
                   		<option value="0">Public</option>
                   		<option value="1">Private</option>
                   	
                    </select>
                </div>
            </div>





       


            <div class="typeahead-container form-group ">
          <label class="col-sm-4 control-label" for="user_email">Country</label>
           <div class="col-sm-7">
            <span class="typeahead-query">
                <input  type="text" class="form-control" id="Country" name="Country" value="<?=$row2['country']?>">
            </span>
          </div>
        </div>
            

            <div class="typeahead-container form-group ">
          <label class="col-sm-4 control-label" for="user_email">City</label>
           <div class="col-sm-7">
            <span class="typeahead-query">
                <input  type="text" class="form-control" id="city" name="City" value="<?=$row2['city']?>">
            </span>
          </div>
        </div>



            <div class="form-group">
                <label for="doneLTF" class="col-sm-4 control-label">Address</label>
                <div class="col-sm-7">
                 
                    <textarea name="Address" id="Address" style="height:300px;" class="form-control"><?=$row2['address']?></textarea>
                </div>
            </div>




            


            
            <div class="form-group">
                <label for="Description" class="col-sm-4 control-label">Description</label>
                <div class="col-sm-7">
                    <textarea name="Description" id="detail" style="height:300px;" class="form-control"><?=$row2['description']?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="openSignature" class="col-sm-4 control-label">Min Salary</label>
                <div class="col-sm-7">
                    <input type="text" name="Min_Salary" id="openSignature" value="<?=$row2['salary']?>" class="form-control">
                </div>
            </div>
            
            <div class="form-group">
                <label for="bankcus" class="col-sm-4 control-label">Max Salary</label>
                <div class="col-sm-7">
                    <input type="text" name="Max_Salary" id="bankcus" value="<?=$row2['max_salary']?>" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="Bagged" class="col-sm-4 control-label">Refer Bonus</label>
                <div class="col-sm-7">
                    <input type="text" name="Bonus" id="Bagged" value="<?=$row2['refer_bonus']?>" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label for="currency" class="col-sm-4 control-label">Currency</label>
                <div class="col-sm-7">
                 
                    <select name="currency" id="currency" class="form-control" > 
                    <option value="<?=$row2['currency']?>"><?=$row2['currency']?></option>   
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
                        $sql5="SELECT id, title FROM job_post WHERE id != $row2[id]";
						$result5=mysql_query($sql5)or die(mysql_error());
						for($i5=0;$row5=mysql_fetch_assoc($result5);$i5++){ 
						?>
                   		<option value="<?=$row5['id']?>"><?=$row5['id']?>/<?=$row5['title']?></option>
                   		<?php
                   		}
                   		?>
                </select>
                   <!-- <input type="text" name="code"  class="form-control" required=""> -->
                </div>
            </div>


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
									</div>  <!-- end tap pass -->
								
							</div>  <!-- End tab-content -->








						</div>

						</div>





						









</div>

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
		
		<!-- Specific Page Vendor -->		<script src="assets/vendor/jquery-validation/jquery.validate.js"></script>
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
            city: ["Abu Dhabi", "Abuja", "Accra", "Adamstown", "Addis Ababa", "Algiers", "Alofi", "Amman", "Amsterdam",
                "Andorra la Vella", "Ankara", "Antananarivo", "Apia", "Ashgabat", "Asmara", "Astana", "Asunción", "Athens",
                "Avarua", "Baghdad", "Baku", "Bamako", "Bandar Seri Begawan", "Bangkok", "Bangui", "Banjul", "Basseterre",
                "Beijing", "Beirut", "Belgrade", "Belmopan", "Berlin", "Bern", "Bishkek", "Bissau", "Bogotá", "Brasília",
                "Bratislava", "Brazzaville", "Bridgetown", "Brussels", "Bucharest", "Budapest", "Buenos Aires", "Bujumbura",
                "Cairo", "Canberra", "Caracas", "Castries", "Cayenne", "Charlotte Amalie", "Chisinau", "Cockburn Town",
                "Conakry", "Copenhagen", "Dakar", "Damascus", "Dhaka", "Dili", "Djibouti", "Dodoma", "Doha", "Douglas",
                "Dublin", "Dushanbe", "Edinburgh of the Seven Seas", "El Aaiún", "Episkopi Cantonment", "Flying Fish Cove",
                "Freetown", "Funafuti", "Gaborone", "George Town", "Georgetown", "Georgetown", "Gibraltar", "King Edward Point",
                "Guatemala City", "Gustavia", "Hagåtña", "Hamilton", "Hanga Roa", "Hanoi", "Harare", "Hargeisa", "Havana",
                "Helsinki", "Honiara", "Islamabad", "Jakarta", "Jamestown", "Jerusalem", "Juba", "Kabul", "Kampala",
                "Kathmandu", "Khartoum", "Kiev", "Kigali", "Kingston", "Kingston", "Kingstown", "Kinshasa", "Kuala Lumpur",
                "Kuwait City", "Libreville", "Lilongwe", "Lima", "Lisbon", "Ljubljana", "Lomé", "London", "Luanda", "Lusaka",
                "Luxembourg", "Madrid", "Majuro", "Malabo", "Malé", "Managua", "Manama", "Manila", "Maputo", "Marigot",
                "Maseru", "Mata-Utu", "Mbabane Lobamba", "Melekeok Ngerulmud", "Mexico City", "Minsk", "Mogadishu", "Monaco",
                "Monrovia", "Montevideo", "Moroni", "Moscow", "Muscat", "Nairobi", "Nassau", "Naypyidaw", "N'Djamena",
                "New Delhi", "Niamey", "Nicosia", "Nicosia", "Nouakchott", "Nouméa", "Nukuʻalofa", "Nuuk", "Oranjestad",
                "Oslo", "Ottawa", "Ouagadougou", "Pago Pago", "Palikir", "Panama City", "Papeete", "Paramaribo", "Paris",
                "Philipsburg", "Phnom Penh", "Plymouth Brades Estate", "Podgorica Cetinje", "Port Louis", "Port Moresby",
                "Port Vila", "Port-au-Prince", "Port of Spain", "Porto-Novo Cotonou", "Prague", "Praia", "Cape Town",
                "Pristina", "Pyongyang", "Quito", "Rabat", "Reykjavík", "Riga", "Riyadh", "Road Town", "Rome", "Roseau",
                "Saipan", "San José", "San Juan", "San Marino", "San Salvador", "Sana'a", "Santiago", "Santo Domingo",
                "São Tomé", "Sarajevo", "Seoul", "Singapore", "Skopje", "Sofia", "Sri Jayawardenepura Kotte", "St. George's",
                "St. Helier", "St. John's", "St. Peter Port", "St. Pierre", "Stanley", "Stepanakert", "Stockholm", "Sucre",
                "Sukhumi", "Suva", "Taipei", "Tallinn", "Tarawa Atoll", "Tashkent", "Tbilisi", "Tegucigalpa", "Tehran",
                "Thimphu", "Tirana", "Tiraspol", "Tokyo", "Tórshavn", "Tripoli", "Tskhinvali", "Tunis", "Ulan Bator", "Vaduz",
                "Valletta", "The Valley", "Vatican City", "Victoria", "Vienna", "Vientiane", "Vilnius", "Warsaw",
                "Washington, D.C.", "Wellington", "West Island", "Willemstad", "Windhoek", "Yamoussoukro", "Yaoundé", "Yaren",
                "Yerevan", "Zagreb"]
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



$('#city').typeahead({
            minLength: 1,
            order: "asc",
            group: true,
            groupMaxItem: 6,
            hint: true,
           
            href: "https://en.wikipedia.org/?title={{display}}",
            template: "{{display}}, <small><em>{{group}}</em></small>",
            source: {
                city: {
                    data: data.city
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