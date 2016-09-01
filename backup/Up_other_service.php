<?php
session_start();
include('server/connect.php');
if(isset($_SESSION['ssUsername'])){$username=$_SESSION['ssUsername'];}
else if(!isset($_SESSION['ssUsername'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}

$customer_id = $_REQUEST['cus_id'];

$pro_id = $_REQUEST['pro_id'];

$num_col=1;
$num_row=1000;

$sql="SELECT COUNT(*) FROM user WHERE username !='$username' ";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_array($result);
$num=$row['COUNT(*)'];
$numAll=$num;

$sql="SELECT * FROM user WHERE username = '$username'";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_assoc($result);
$iduser = $row['id'];


$sqlmutual="SELECT * FROM customer WHERE id = '$customer_id' ";
	$resultmutual=mysql_query($sqlmutual)or die(mysql_error());
	$rowa1=mysql_fetch_assoc($resultmutual);

?>
<!doctype html>
<html class="fixed sidebar-left-collapsed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>บริการอื่นๆ</title>
		<meta name="keywords" content="บริการอื่นๆ" />
		<meta name="description" content="บริการอื่นๆ">
		

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
		<link rel="stylesheet" href="assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" />	
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<link rel="stylesheet" href="assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />		
		<link rel="stylesheet" href="assets/vendor/fullcalendar/fullcalendar.css" />		
		<link rel="stylesheet" href="assets/vendor/fullcalendar/fullcalendar.print.css" media="print" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css">
		<link rel="stylesheet" href="assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.css" />

		<!-- Specific Page Vendor CSS -->		<link rel="stylesheet" href="assets/vendor/select2/select2.css" />	
			<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />

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
						<img src="assets/images/logo.png?m=<?php echo filemtime('logo.png'); ?>" height="38" />
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
							<div class="profile-info" data-lock-name="<?=$row['username']?>" data-lock-email="<?=$row['email']?>">
								<span class="name"><?=$_SESSION['ssUsername']?> <?=$row['Last_Name']?></span>
								<span class="role"><?=$row['status']?></span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="profile" onclick="clicksound.playclip()"><i class="fa fa-user"></i> My Profile</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
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
							<i class="fa fa-bars" aria-label="Toggle sidebar" onclick="clicksound.playclip()"></i>
						</div>
					</div>
				
					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">
									<li>
										<a href="Dashboard" onclick="clicksound.playclip()">
											<i class="fa fa-bullseye" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
									</li>
									<li class="nav-expanded nav-active">
										<a href="customer" onclick="clicksound.playclip()">
											<i class="fa fa-street-view" aria-hidden="true"></i>
											<span>Customer</span>
										</a>
									</li>
									<li>
										<a href="mutual-fund" onclick="clicksound.playclip()">
											<i class="fa fa-tasks" aria-hidden="true"></i>
											<span>Mutual Fund</span>
										</a>
									</li>
									<li>
										<a href="private-fund" onclick="clicksound.playclip()">
											<i class="fa fa-bar-chart " aria-hidden="true"></i>
											<span>Private Fund</span>
										</a>
									</li>
									<li>
										<a href="product-service" onclick="clicksound.playclip()">
											<i class="fa fa-globe " aria-hidden="true"></i>
											<span>Product ตปท.</span>
										</a>
									</li>
									
									<li>
										<a href="insurance">
											<i class="fa fa-bed" aria-hidden="true"></i>
											<span>ประกันชีวิต</span>
										</a>
									</li>
									<li>
										<a href="insurance_al" onclick="clicksound.playclip()">
											<i class="fa fa-ambulance" aria-hidden="true"></i>
											<span>ประกันวินาศภัย</span>
										</a>
									</li>
									<li>
										<a href="data-shared" onclick="clicksound.playclip()">
											<i class="fa fa-users" aria-hidden="true"></i>
											<span>Date Shared</span>
										</a>
									</li>
									<li >
										<a href="searchdate" onclick="clicksound.playclip()">
											<i class="fa fa-search" aria-hidden="true"></i>
											<span>Search Data</span>
										</a>
									</li>
									<li>
										<a href="searchdate_guest" onclick="clicksound.playclip()">
											<i class="fa fa-search" aria-hidden="true"></i>
											<span>Search Data Guest</span>
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
						<h2>บริการอื่นๆ</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="Dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Tables</span></li>
								<li><span>บริการอื่นๆ</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>



					

					<!-- start: page -->
						<section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
								
								</div>
						
								<h2 class="panel-title">แก้ไข บริการอื่นๆ : <?=$rowa1['cus_name']?> <?=$rowa1['cus_lastname']?></h2>

							</header>
							<div class="panel-body">
								<div class="row">
									<div class="col-sm-12">
										<div class="mb-md">
											<a href="other_service-<?=$customer_id?>" class="btn btn-danger" onclick="clicksound.playclip()">back <i class="fa fa-reply"></i></a>
											
<?php
$sql2="SELECT * FROM subproduct WHERE product_id = $pro_id AND customer_id = $customer_id ORDER BY id DESC ";
			$result2=mysql_query($sql2)or die(mysql_error());
			$row2=mysql_fetch_assoc($result2);

$sql1="SELECT id,name FROM product WHERE id = $row2[product_id] ORDER BY id DESC ";
			$result1=mysql_query($sql1)or die(mysql_error());
			$row1=mysql_fetch_assoc($result1);


?>
											
										<form id="demo-form" class="form-horizontal mb-lg" action="server/super.php" method="post" enctype="multipart/form-data">
										<section class="panel">
											
											<div class="panel-body">
										<input name="meid" type="hidden" id="id" value="<?=$iduser?>"/>
										<input name="action" type="hidden" id="id" value="up_subproduct"/>
										<input name="id" type="hidden" id="id" value="<?=$row2['id']?>"/>
										<input name="customer_id" type="hidden" id="id" value="<?=$customer_id?>"/>



<div class="form-group">
                        <label for="service" class="col-sm-4 control-label">บริการ</label>
                        <div class="col-sm-7">
                            <select name="service" id="service" class="form-control">
                                <option value="<?=$row2['name']?>"><?=$row2['name']?></option>
                                <?php
                        $sqlcus="SELECT * FROM product2 WHERE category_id = 13 ORDER BY id ASC ";
						$resultcus=mysql_query($sqlcus)or die(mysql_error());
						for($icus=0;$rowcus=mysql_fetch_assoc($resultcus);$icus++){ 
						?>
                   		<option value="<?=$rowcus['name']?>"><?=$rowcus['name']?></option>
                   		<?php
                   		}
                   		?>
                            </select>
                        </div>
                    </div>



                    <div class="form-group">
					<label class="col-md-4 control-label">Color บริการ</label>
						<div class="col-md-7">
						


							<select name="colorService" id="colorService " class="form-control " >
								<option value="<?=$row2['status']?>"><?=$row2['status']?></option>
                        <option value="#171717">Black</option>
                        <option value="#5bc0de">Light Blue </option>
                        <option value="#d2322d">Red</option>
                        <option value="#ed9c28">Yellow</option>
                        <option value="#47a447">Green</option>
                        <option value="#0088cc">Blue</option>
                        <option value="#999999">gray</option>
                        </select>
						</div>
			</div> 	





												
			 <div class="form-group">
                <label for="product_id" class="col-sm-4 control-label">สินค้าที่ใช้ในการวางแผน</label>
                <div class="col-sm-7">
                    <select data-plugin-selecttwo name="product_id" id="product_id " class="form-control " required="">
                        <option value="<?=$row1['id']?>"><?=$row1['name']?></option>
        <?php
        $sqlCategory="SELECT * FROM product WHERE category_id!=0 AND category_id!=20 ORDER BY name";
        $resultCategory=mysql_query($sqlCategory) or die(mysql_error());
        $numCategory=mysql_num_rows($resultCategory);
        for($i=1;$i<=$numCategory;$i++){$rowCategory=mysql_fetch_array($resultCategory); 
        ?>
        <option value="<?=$rowCategory['id']?>"><?=$rowCategory['name']?></option>
        <?php
        }
        ?>
                </select>
                </div>
            </div>									
													

            <div class="form-group">
                        <label for="Partner" class="col-sm-4 control-label">Partner</label>
                        <div class="col-sm-7">
                            <input type="text" name="Partner" id="Partner" value="<?=$row2['Partner']?>" class="form-control">
                        </div>
                    </div>

            <div class="form-group">
					<label class="col-md-4 control-label"><p style="color:<?=$row2['colorPartner']?>">Color Partner</p></label>
						<div class="col-md-7">
						
							<select name="colorPartner" id="colorPartner " class="form-control " >
								<option value="<?=$row2['colorPartner']?>"><?=$row2['colorPartner']?></option>
                        <option value="#171717">Black</option>
                        <option value="#5bc0de">Light Blue </option>
                        <option value="#d2322d">Red</option>
                        <option value="#ed9c28">Yellow</option>
                        <option value="#47a447">Green</option>
                        <option value="#0088cc">Blue</option>
                        <option value="#999999">gray</option>
                        </select>
						</div>
			</div>	        



            <div class="form-group">
                        <label for="Goal" class="col-sm-4 control-label">เป้าหมายหลัก(บาท)</label>
                        <div class="col-sm-7">
                            <input type="text" name="Goal" id="Goal" value="<?=$row2['Goal']?>" class="form-control">
                        </div>
                    </div>

          


			<div class="form-group">
					<label class="col-md-4 control-label"><p style="color:<?=$row2['colorGoal']?>">Color เป้าหมายหลัก(บาท)</p></label>
						<div class="col-md-7">
						
							<select name="colorGoal" id="colorGoal " class="form-control " >
								<option value="<?=$row2['colorGoal']?>"><?=$row2['colorGoal']?></option>
                        <option value="#171717">Black</option>
                        <option value="#5bc0de">Light Blue </option>
                        <option value="#d2322d">Red</option>
                        <option value="#ed9c28">Yellow</option>
                        <option value="#47a447">Green</option>
                        <option value="#0088cc">Blue</option>
                        <option value="#999999">gray</option>
                        </select>
						</div>
			</div>	




            <div class="form-group">
                        <label for="Done" class="col-sm-4 control-label">Active Done</label>
                        <div class="col-sm-7">
                            <input type="text" name="Done" id="Done" value="<?=$row2['Done']?>" class="form-control">
                        </div>
                    </div>

       



			<div class="form-group">
					<label class="col-md-4 control-label"><p style="color:<?=$row2['colorDone']?>">Color Active Done</p></label>
						<div class="col-md-7">
						
							<select name="colorDone" id="colorDone " class="form-control " >
								<option value="<?=$row2['colorDone']?>"><?=$row2['colorDone']?></option>
                        <option value="#171717">Black</option>
                        <option value="#5bc0de">Light Blue </option>
                        <option value="#d2322d">Red</option>
                        <option value="#ed9c28">Yellow</option>
                        <option value="#47a447">Green</option>
                        <option value="#0088cc">Blue</option>
                        <option value="#999999">gray</option>
                        </select>
						</div>
			</div>	        


            <div class="form-group">
                        <label for="balance" class="col-sm-4 control-label">รายละเอียดสินค้าเพิ่มเติม</label>
                        <div class="col-sm-7">
                            <input type="text" name="balance" id="balance" value="<?=$row2['balance']?>" class="form-control">
                        </div>
                    </div> 
           


			        

            <div class="form-group">
                        <label for="product_status2" class="col-sm-4 control-label">Status</label>
                        <div class="col-sm-7">
                            <select data-plugin-selecttwo name="product_status2" id="product_status2"  class="form-control " required="">
                            	<option value="<?=$row2['statuss']?>"><?=$row2['statuss']?>-</option>
                        <option value="Effective">Effective</option>
                        <option value="Not Effective">Not Effective</option>
       
                </select>
                        </div>
                    </div>  



                    <div class="form-group">
					<label class="col-md-4 control-label"><p style="color:<?=$row2['colorProduct']?>">Color Status</p></label>
						<div class="col-md-7">
						
							<select name="colorProduct" id="colorProduct " class="form-control " >
								<option value="<?=$row2['colorProduct']?>"><?=$row2['colorProduct']?></option>
                        <option value="#171717">Black</option>
                        <option value="#5bc0de">Light Blue </option>
                        <option value="#d2322d">Red</option>
                        <option value="#ed9c28">Yellow</option>
                        <option value="#47a447">Green</option>
                        <option value="#0088cc">Blue</option>
                        <option value="#999999">gray</option>
                        </select>
						</div>
			</div>	                                  


                   
				            	<div class="form-group">
                        <label for="remark" class="col-sm-4 control-label">หมายเหตุ</label>
                        <div class="col-sm-7">
                            <input type="text" name="remark" id="remark" value="<?=$row2['remark']?>" class="form-control">
                        </div>
                    </div>

        


			<div class="form-group">
					<label class="col-md-4 control-label"><p style="color:<?=$row2['colorProduct']?>">Color หมายเหตุ</p></label>
						<div class="col-md-7">
						
							<select name="colorremark" id="colorremark " class="form-control " >
								<option value="<?=$row2['colorremark']?>"><?=$row2['colorremark']?></option>
                        <option value="#171717">Black</option>
                        <option value="#5bc0de">Light Blue </option>
                        <option value="#d2322d">Red</option>
                        <option value="#ed9c28">Yellow</option>
                        <option value="#47a447">Green</option>
                        <option value="#0088cc">Blue</option>
                        <option value="#999999">gray</option>
                        </select>
						</div>
			</div>	     





												
											</div>
										
												<div class="row">
													<div class="col-md-1ๅ text-right">
														<button type="submit" class="btn btn-primary " onclick="clicksound.playclip()">Confirm</button>
														<button class="btn btn-default modal-dismiss">Cancel</button>
													</div>
												</div>
										
											
										</section>
										</form>
								


										</div>

									</div>
								</div>
								
							</div>
						</section>



<!--

<section class="panel">
					

					
					<section class="panel">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<div id="calendar"></div>
								</div>
								
							</div>
						</div>
					</section>

				</section>


-->












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
								<h6>Friends</h6>
								<ul>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-offline">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-offline">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
								</ul>
							</div>
			
						</div>
					</div>
				</div>
			</aside>
		</section>

		

		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>	
		<script src="assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>		
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>		
		<script src="assets/vendor/jquery-cookie/jquery.cookie.js"></script>		
				<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>		
				<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>	


				
						<script src="assets/vendor/jquery-maskedinput/jquery.maskedinput.js"></script>		
		<script src="assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>	
				<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker2.js"></script>	
				

				<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>		
				<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Specific Page Vendor -->		<script src="assets/vendor/select2/select2.js"></script>		
		<script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>		
		<script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		<script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>
		<script src="assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>		
		<script src="assets/vendor/fullcalendar/lib/moment.min.js"></script>		
		<script src="assets/vendor/fullcalendar/fullcalendar.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
		<script src="assets/vendor/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>
		<!-- Analytics to Track Preview Website -->		
		<script src="assets/javascripts/ui-elements/examples.modals.js"></script>
		<!-- Examples -->
		
		<script src="assets/javascripts/ui-elements/examples.loading.overlay.js"></script>
		<script>(function(a,b,c){if(c in b&&b[c]){var d,e=a.location,f=/^(a|html)$/i;a.addEventListener("click",function(a){d=a.target;while(!f.test(d.nodeName))d=d.parentNode;"href"in d&&(d.href.indexOf("http")||~d.href.indexOf(e.host))&&(a.preventDefault(),e.href=d.href)},!1)}})(document,window.navigator,"standalone")</script>   
		
		
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
  var product_image=document.getElementById('product_image');
  var product_imageElement=document.createElement('input');
      product_imageElement.setAttribute('type',"file");
      product_imageElement.setAttribute('name',"product_image[]");
      product_imageElement.setAttribute('class',"form-control");
      product_image.appendChild(product_imageElement);     
}




$('#timepicker').timepicker('setTime', '12:45 AM');


/*
Name: 			Pages / Calendar - Examples
Written by: 	Okler Themes - (http://www.okler.net)
Theme Version: 	1.4.1
*/

(function( $ ) {

	'use strict';

	var initCalendarDragNDrop = function() {
		$('#external-events div.external-event').each(function() {

			// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
			// it doesn't need to have a start or end
			var eventObject = {
				title: $.trim($(this).text()) // use the element's text as the event title
			};

			// store the Event Object in the DOM element so we can get to it later
			$(this).data('eventObject', eventObject);

			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});

		});
	};

	var initCalendar = function() {
		var $calendar = $('#calendar');
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();



    $.ajax({
        url: 'server/getDataCustomer3.php', // getchart.php
        dataType: 'JSON',
        type: 'POST',
        dataType: 'jsonp',
        data: {
            meid: "<?=$iduser?>",
              },
        success: function(response) {




		$calendar.fullCalendar({
			header: {
				left: 'title',
				right: 'prev,today,next,basicDay,basicWeek,month'
			},

			timeFormat: 'H:mm',

			titleFormat: {
				month: 'MMMM YYYY',      // September 2009
			    week: "MMM D YYYY",      // Sep 13 2009
			    day: 'dddd, MMM D, YYYY' // Tuesday, Sep 8, 2009
			},

			themeButtonIcons: {
				prev: 'fa fa-caret-left',
				next: 'fa fa-caret-right',
			},

			editable: true,
			droppable: true, // this allows things to be dropped onto the calendar !!!
			drop: function(date, allDay) { // this function is called when something is dropped
				var $externalEvent = $(this);
				// retrieve the dropped element's stored Event Object
				var originalEventObject = $externalEvent.data('eventObject');

				// we need to copy it, so that multiple events don't have a reference to the same object
				var copiedEventObject = $.extend({}, originalEventObject);

				// assign it the date that was reported
				copiedEventObject.start = date;
				copiedEventObject.allDay = allDay;
				copiedEventObject.className = $externalEvent.attr('data-event-class');

				// render the event on the calendar
				// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
				$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

				// is the "remove after drop" checkbox checked?
				if ($('#RemoveAfterDrop').is(':checked')) {
					// if so, remove the element from the "Draggable Events" list
					$(this).remove();
				}

			},
			events: response,
		});


        }
    });









		// FIX INPUTS TO BOOTSTRAP VERSIONS
		var $calendarButtons = $calendar.find('.fc-header-right > span');
		$calendarButtons
			.filter('.fc-button-prev, .fc-button-today, .fc-button-next')
				.wrapAll('<div class="btn-group mt-sm mr-md mb-sm ml-sm"></div>')
				.parent()
				.after('<br class="hidden"/>');

		$calendarButtons
			.not('.fc-button-prev, .fc-button-today, .fc-button-next')
				.wrapAll('<div class="btn-group mb-sm mt-sm"></div>');

		$calendarButtons
			.attr({ 'class': 'btn btn-sm btn-default' });
	};

	$(function() {
		initCalendar();
		initCalendarDragNDrop();
	});

}).apply(this, [ jQuery ]);

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
	</body>
</html>