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


$sql="SELECT * FROM user_linkedin WHERE id = '$customer_id' ";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_assoc($result);

if($row['Department'] != ""){

$sqlc="SELECT name FROM category WHERE id = $row[Department]";
$resultc=mysql_query($sqlc)or die(mysql_error());
$rowc=mysql_fetch_assoc($resultc);

}
?>

<!doctype html>
<html class="fixed">
	<head>
		<!-- Basic -->
		<meta charset="UTF-8">
		<title><?=$row['first_name']?></title>
		

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
									</li> -->
									<li >
										<a href="upload_view.php" onclick="clicksound.playclip()">
											<i class="fa fa-star-o" aria-hidden="true"></i>
											<span>Rockstar Upload</span>
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
									<li class="nav-parent nav-expanded nav-active">
										<a>
											<i class="fa fa-linkedin-square " aria-hidden="true"></i>
											<span>User linkedin</span>
										</a>
										<ul class="nav nav-children">
											<li class="nav-active">
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
									

									
								</ul>
							</nav>
				
							
				
							<hr class="separator" />
				
							
						</div>
				
					</div>
				
				</aside>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>User linkedin Profile</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="Dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>User linkedin Profile</span></li>
								
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right" onclick="clicksound.playclip()"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					
					<div class="row">
					
						<div class="col-md-12 col-lg-8">
							<div class="tabs tabs-primary">
								<ul class="nav nav-tabs tabs-primary">
								
									<li class="active">
										<a href="#edit" data-toggle="tab" aria-expanded="true">Info</a>
									</li>
									<li class="">
										<a href="#pass" data-toggle="tab" aria-expanded="false">Edit User linkedin info</a>
									</li>
									
									
								</ul>
								<div class="tab-content">
									







									
									<div id="edit" class="tab-pane active">

									
											<h4 class="mb-xlg text-primary">User linkedin Information</h4>
											
											<fieldset>
												<div class="form-group">
													<label class="col-md-4 control-label" ><b>First name :</b></label>
													<div class="col-md-7">
														<label class="" ><?=$row['first_name']?></label>
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-4 control-label" ><b>Last name :</b></label>
													<div class="col-md-7">
														<label class="" ><?=$row['last_name']?></label>
													</div>
												</div>



												<div class="form-group">
							                        <label for="nameEng" class="col-sm-4 control-label"><b>Email :</b></label>
							                        <div class="col-sm-7">
							                            <label class="" ><?=$row['email']?></label>
							                        </div>
							                    </div>


												<div class="form-group">
													<label class="col-md-4 control-label" ><b>Company :</b></label>
													<div class="col-md-7">
														<label class="" ><?=$row['company']?></label>
													</div>
												</div>




												<div class="form-group">
													<label class="col-md-4 control-label" ><b>Country :</b></label>
													<div class="col-md-7">
														<label class="" ><?=$row['country']?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" ><b>Title job :</b></label>
													<div class="col-md-7">
														<label class="" ><?=$row['job_title']?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" ><b>Industry :</b></label>
													<div class="col-md-7">
														<label class="control-label" ><?=$row['Industry']?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" ><b>Category :</b></label>
													<div class="col-md-7">
														<label class="control-label" ><?=$rowc['name']?></label>
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

									
											<form class="form-horizontal" action="server/cus-linkedin-Update.php" method="post" enctype="multipart/form-data" name="product" >
											<h4 class="mb-xlg">Personal Information</h4>
											
											<fieldset>
												
												
												<div class="form-group">
													<label class="col-md-3 control-label" >First Name :</label>
													<div class="col-md-8">
														<input type="text" name="fname" class="form-control" value="<?=$row['first_name']?>" >
														<input type="text" name="id" class="form-control hide" value="<?=$row['id']?>" >
														
													</div>
												</div>


												<div class="form-group">
													<label class="col-md-3 control-label" >Last Name :</label>
													<div class="col-md-8">
														<input type="text" name="lname" class="form-control" value="<?=$row['last_name']?>" >
													
													</div>
												</div>

												


												<div class="form-group">
													<label class="col-md-3 control-label" >Email :</label>
													<div class="col-md-8">
														<input type="text" name="email" class="form-control" value="<?=$row['email']?>"  >
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" >Company :</label>
													<div class="col-md-8">
														<input type="text" name="company" class="form-control" value="<?=$row['company']?>"  >
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" >Country :</label>
													<div class="col-md-8">
														<textarea class="form-control" name="country" rows="2"><?=$row['country']?></textarea>
													</div>
												</div>
												
												<div class="form-group">
													<label class="col-md-3 control-label" >Title job :</label>
													<div class="col-md-8">
														<input type="text" name="job_title" class="form-control" value="<?=$row['job_title']?>"  >
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" >Industry  :</label>
													<div class="col-md-8">
														<input type="text" name="industry" class="form-control" value="<?=$row['Industry']?>"  >
													</div>
												</div>



												<div class="form-group">
									                <label for="LoginPhill" class="col-sm-3 control-label">Department*</label>
									                <div class="col-sm-8">
									                 
									                    <select name="Department" id="broker" class="form-control" >
									                        <option value="">-- Please choose --</option>
									                   
        <?php
        $sqlCategory="SELECT * FROM category WHERE id!=0 ORDER BY name";
        $resultCategory=mysql_query($sqlCategory) or die(mysql_error());
        $numCategory=mysql_num_rows($resultCategory);
        for($i=1;$i<=$numCategory;$i++){$rowCategory=mysql_fetch_array($resultCategory); 
        ?>
        <option value="<?=$rowCategory['id']?>" <? if($row['Department']==$rowCategory['id']){echo"selected='selected'";}?>><?=$rowCategory['name']?></option>
        <?php
        }
        ?>
									                    </select>
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

									







								






								</div>
							</div>


							
						




						</div>
						<div class="col-md-12 col-lg-3">

							
							
						
							


							
							
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