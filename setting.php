<?php
session_start();
include('server/connect.php');
?>
<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">
		<?php
		if(isset($_SESSION['ssUsername2'])){$username=$_SESSION['ssUsername2'];}
		else if(!isset($_SESSION['ssUsername2'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}


		$sql="SELECT COUNT(*) FROM user WHERE username !='$username' ";
		$result=mysql_query($sql)or die(mysql_error());
		$row=mysql_fetch_array($result);
		$num=$row['COUNT(*)'];
		$numAll=$num;

		$sql="SELECT * FROM user WHERE username = '$username'";
		$result=mysql_query($sql)or die(mysql_error());
		$row=mysql_fetch_assoc($result);
		$iduser = $row['id'];


		

		?>

		<title>Setting</title>
		<meta name="keywords" content="Setting" />
		<meta name="description" content="Setting">
		

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


		<!-- Web Fonts 
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css"> -->

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />

		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Specific Page Vendor CSS -->		<link rel="stylesheet" href="assets/vendor/select2/select2.css" />		
		<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
		<link rel="stylesheet" href="assets/vendor/summernote/summernote.css" />		
		<link rel="stylesheet" href="assets/vendor/summernote/summernote-bs3.css" />		
		<link rel="stylesheet" href="assets/vendor/codemirror/lib/codemirror.css" />
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
					<a href="../" class="logo pull-left">
					<img src="../img/logo_sticky.png?m=<?php echo filemtime('logo_sticky.png'); ?>" height="38" alt="Porto Admin" />
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
								<img src="avatar/default-avatar.png" width="35" height="35"  class="img-circle" data-lock-picture="avatar/default-avatar.png" />
							</figure>
							<div class="profile-info" data-lock-name="<?=$row['username']?>" >
								<span class="name"><?=$row['username']?></span>
								<span class="role"></span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								
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
							<i class="fa fa-bars" aria-label="Toggle sidebar" onclick="clicksound.playclip()"></i>
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
									<li class="nav-expanded nav-active">
										<a href="setting.php" onclick="clicksound.playclip()">
											<i class="fa fa-cog " aria-hidden="true"></i>
											<span>Setting</span>
										</a>
									</li>
									
									

									
								</ul>

									
								</ul>
							</nav>
				
							
				
							<hr class="separator" />
				
							
						</div>
				
					</div>
				
				</aside>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Setting</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="../">
										<i class="fa fa-home"></i>
									</a>
								</li>
								
								<li><span>Setting</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right" onclick="clicksound.playclip()"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>



					

					<!-- start: page -->



<div class="row">

							<div class="row">
							<div class="col-xs-12">







<section class="panel form-wizard" id="w4">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
											<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss=""></a>
										</div>
						
										<h2 class="panel-title">Setting</h2>
									</header>
									<div class="panel-body">
										
						
										
			<form class="form-horizontal" action="process/setting/why.php" method="post" enctype="multipart/form-data" name="product" >		
											<div class="tab-content">
												<div id="w4-account" class="tab-pane active">
													
<?php
$sql1="SELECT * FROM setting ";
		$result1=mysql_query($sql1)or die(mysql_error());
		$row1=mysql_fetch_assoc($result1);

?>
				

<div class="col-md-12">


	<div class="form-group">
                <label for="Owner" class="col-sm-3 control-label">Website Name</label>
                <div class="col-sm-9">
                    <input type="text" name="shop_name" id="Owner" value="<?=$row1['shop_name']?>" class="form-control"  >
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Url Website</label>
                <div class="col-sm-9">
                    <input type="text" name="website_name" id="Owner" value="<?=$row1['website_name']?>" class="form-control"  >
                </div>
            </div>

            <div class="form-group">
                <label for="tel" class="col-sm-3 control-label">Title</label>
                <div class="col-sm-9">
                    <input type="text" name="title" id="tel" value="<?=$row1['title']?>" class="form-control" >
                </div>
            </div>

            <div class="form-group">
                <label for="tel" class="col-sm-3 control-label">Description</label>
                <div class="col-sm-9">
                	<textarea class="form-control" name="description" rows="3" id="textareaAutosize" data-plugin-textarea-autosize ><?=$row1['description']?></textarea>
                    
                </div>
            </div>

            <div class="form-group">
				<label class="col-md-3 control-label" for="textareaAutosize">google_analytics</label>
					<div class="col-md-9">
						<textarea class="form-control" name="google_analytics" rows="3" id="textareaAutosize" data-plugin-textarea-autosize ><?=$row1['google_analytics']?></textarea>
					</div>
			</div>

			<div class="form-group">
                <label for="tel" class="col-sm-3 control-label">Author</label>
                <div class="col-sm-9">
                    <input type="text" name="author" id="tel" value="<?=$row1['author']?>" class="form-control" >
                </div>
            </div>


            <div class="form-group">
                <label for="tel" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-9">
                    <input type="text" name="email" id="tel" value="<?=$row1['email']?>" class="form-control" >
                </div>
            </div>


            <div class="form-group">
                <label for="tel" class="col-sm-3 control-label">Telephone</label>
                <div class="col-sm-9">
                    <input type="text" name="tel" id="tel" value="<?=$row1['tel']?>" class="form-control" >
                </div>
            </div>

            <div class="form-group">
				<label class="col-md-3 control-label" for="textareaAutosize">Contact_us</label>
					<div class="col-md-9">
						<textarea class="form-control" name="contact_us" rows="3" id="textareaAutosize" data-plugin-textarea-autosize ><?=$row1['contact_us']?></textarea>
					</div>
			</div>


			<div class="form-group">
                <label for="tel" class="col-sm-3 control-label">facebook_fanpage</label>
                <div class="col-sm-9">
                    <input type="text" name="facebook_fanpage" id="tel" value="<?=$row1['facebook_fanpage']?>" class="form-control" >
                </div>
            </div>


            <div class="form-group">
                <label for="tel" class="col-sm-3 control-label">twitter</label>
                <div class="col-sm-9">
                    <input type="text" name="twitter" id="tel" value="<?=$row1['twitter']?>" class="form-control" >
                </div>
            </div>


            <div class="form-group">
                <label for="tel" class="col-sm-3 control-label">google plus</label>
                <div class="col-sm-9">
                    <input type="text" name="google" id="tel" value="<?=$row1['google']?>" class="form-control" >
                </div>
            </div>


            <div class="form-group">
                <label for="tel" class="col-sm-3 control-label">instagram</label>
                <div class="col-sm-9">
                    <input type="text" name="instagram" id="tel" value="<?=$row1['instagram']?>" class="form-control" >
                </div>
            </div>

            <div class="form-group">
                <label for="tel" class="col-sm-3 control-label">pinterest</label>
                <div class="col-sm-9">
                    <input type="text" name="pinterest" id="tel" value="<?=$row1['pinterest']?>" class="form-control" >
                </div>
            </div>



            <div class="form-group">
                <label for="tel" class="col-sm-3 control-label">vimeo</label>
                <div class="col-sm-9">
                    <input type="text" name="vimeo" id="tel" value="<?=$row1['vimeo']?>" class="form-control" >
                </div>
            </div>


            <div class="form-group">
                <label for="tel" class="col-sm-3 control-label">youtube</label>
                <div class="col-sm-9">
                    <input type="text" name="youtube" id="tel" value="<?=$row1['youtube']?>" class="form-control" >
                </div>
            </div>


            <div class="form-group">
                <label for="tel" class="col-sm-3 control-label">linkedin</label>
                <div class="col-sm-9">
                    <input type="text" name="linkedin" id="tel" value="<?=$row1['linkedin']?>" class="form-control" >
                </div>
            </div>

            

           
                   
          
			      



           
            
            <legend class="section"></legend>
            <div class="text-center">
                <button type="submit" class="btn btn-info" onclick="clicksound.playclip()"><i class="fa fa-save"></i> Save</button>
                <button type="reset" class="btn btn-default" onclick="showhide('#show','#add');"><i class="fa fa-eraser"></i> Cancel</button>
            </div>
       
                </div>






												</div>


												
											
												





											</div>
										
									</div>
									

									</form>
								</section>







<section class="panel form-wizard" id="w4">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
											<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss=""></a>
										</div>
						
										<h2 class="panel-title">TERMS AND CONDITION</h2>
									</header>
									<div class="panel-body">
										
						
										
			<form class="form-horizontal" action="process/setting/terms_conditions.php" method="post" enctype="multipart/form-data" name="product" >		
											<div class="tab-content">
												<div id="w4-account" class="tab-pane active">
													
				

<div class="col-md-12">


	


            


			<div class="form-group">
                <label for="detail" class="col-sm-3 control-label">TERMS AND CONDITION</label>
                <div class="col-sm-9">
                    <textarea name="terms_conditions" id="detail" class="form-control"><?=$row1['terms_conditions']?></textarea>
                </div>
            </div>


		
			      



           
            
            <legend class="section"></legend>
            <div class="text-center">
                <button type="submit" class="btn btn-info" onclick="clicksound.playclip()"><i class="fa fa-save"></i> Save</button>
                <button type="reset" class="btn btn-default" onclick="showhide('#show','#add');"><i class="fa fa-eraser"></i> Cancel</button>
            </div>
       
                </div>






												</div>


												
											
												





											</div>
										
									</div>
									

									</form>
								</section>









							</div>
						</div>
							
				</div>	


	

					<!-- end: page -->
						




















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
			
								<ul>
									<li>
										<time datetime="2014-04-19T00:00+00:00">04/19/2014</time>
										<span>Company Meeting</span>
									</li>
								</ul>
							</div>
			
							<div class="sidebar-widget widget-friends">
								<h6>Guest</h6>
								<ul>
		<?php							
		$sql="SELECT * FROM user ";
		$result=mysql_query($sql)or die(mysql_error());
		for($i=0;$row=mysql_fetch_assoc($result);$i++){
		
		?>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="avatar/default-avatar.png"  class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name"><?=$row['username']?> </span>
											
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
				<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>		
				<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>		
				<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Specific Page Vendor -->		<script src="assets/vendor/select2/select2.js"></script>		
		<script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>		
		<script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>


		<script src="assets/vendor/dropzone/dropzone.js"></script>		
		<script src="assets/vendor/bootstrap-markdown/js/markdown.js"></script>		
		<script src="assets/vendor/bootstrap-markdown/js/to-markdown.js"></script>		
		<script src="assets/vendor/bootstrap-markdown/js/bootstrap-markdown.js"></script>		
		<script src="assets/vendor/codemirror/lib/codemirror.js"></script>		
		<script src="assets/vendor/codemirror/addon/selection/active-line.js"></script>		
		<script src="assets/vendor/codemirror/addon/edit/matchbrackets.js"></script>		
		<script src="assets/vendor/codemirror/mode/javascript/javascript.js"></script>		
		<script src="assets/vendor/codemirror/mode/xml/xml.js"></script>		
		<script src="assets/vendor/codemirror/mode/htmlmixed/htmlmixed.js"></script>		
		<script src="assets/vendor/codemirror/mode/css/css.js"></script>		
		<script src="assets/vendor/summernote/summernote.js"></script>		
		<script src="assets/vendor/bootstrap-maxlength/bootstrap-maxlength.js"></script>				
		<script src="assets/vendor/bootstrap-confirmation/bootstrap-confirmation.js"></script>
		<script src="assets/vendor/jquery-autosize/jquery.autosize.js"></script>
		<script src="assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>
		<!-- Analytics to Track Preview Website -->		
		<script src="assets/javascripts/ui-elements/examples.modals.js"></script>
		<!-- Examples -->
		 <script src="assets/javascripts/tables/examples.datatables.editablecus.js"></script> 
		 <script src="assets/javascripts/pages/examples.mediagallery.js"></script>
		 <script src="assets/javascripts/ui-elements/examples.loading.overlay.js"></script>
		
	
 
		<script>


				function product_imageCreateElement(){
  var product_image=document.getElementById('product_image');
  var product_imageElement=document.createElement('input');
      product_imageElement.setAttribute('type',"file");
      product_imageElement.setAttribute('name',"product_image[]");
      product_imageElement.setAttribute('class',"form-control");
      product_image.appendChild(product_imageElement);     
}

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

var mouseoversound=createsoundbite("http://www.javascriptkit.com/script/script2/whistle.ogg", "http://www.javascriptkit.com/script/script2/whistle.mp3")
var clicksound=createsoundbite("http://www.javascriptkit.com/script/script2/click.ogg", "http://www.javascriptkit.com/script/script2/click.mp3")

</script>






<script src="js/Basic/ckeditor/ckeditor.js"></script>
<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'detail' );
            </script>	

	</body>
</html>
<?php
 function textbox($name){
  global $_POST;
  echo isset($_POST[$name])?htmlspecialchars($_POST[$name]):'';
 }
?>