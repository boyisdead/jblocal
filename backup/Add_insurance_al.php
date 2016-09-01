<?php
session_start();
include('server/connect.php');
if(isset($_SESSION['ssUsername'])){$username=$_SESSION['ssUsername'];}
else if(!isset($_SESSION['ssUsername'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}

$customer_id = $_REQUEST['cus_id'];

$sql1="SELECT * FROM user WHERE username = '$username'";
$result1=mysql_query($sql1)or die(mysql_error());
$row1=mysql_fetch_assoc($result1);
$iduser = $row1['id'];


?>

<!doctype html>
<html class="fixed">
	<head>
		<!-- Basic -->
		<meta charset="UTF-8">
		<title>ประกันวินาศภัย</title>
		<meta name="keywords" content="ประกันวินาศภัย" />
		<meta name="description" content="ประกันวินาศภัย">
	

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
								<img src="avatar/<?=$row1['Image']?>" width="35" height="35" alt="<?=$row['username']?>" class="img-circle" data-lock-picture="avatar/<?=$row['Image']?>" />
							</figure>
							<div class="profile-info" data-lock-name="<?=$row['username']?>" data-lock-email="<?=$rowme['email']?>">
								<span class="name"><?=$_SESSION['ssUsername']?> <?=$row1['Last_Name']?></span>
								<span class="role"><?=$row1['position']?></span>
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
									<a role="menuitem" tabindex="-1" href="pages-lock-screen" data-lock-screen="true" onclick="clicksound.playclip()"><i class="fa fa-lock"></i> Lock Screen</a>
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
										<a href="Dashboard" onclick="clicksound.playclip()">
											<i class="fa fa-bullseye" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
									</li>
									<li>
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
									<li class="nav-expanded nav-active">
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
									<li>
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
						<h2>เพิ่มประกันวินาศภัย</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="Dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>เพิ่มประกันวินาศภัย</span></li>
								
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right" onclick="clicksound.playclip()"><i class="fa fa-chevron-left"></i></a>
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
						
										<h2 class="panel-title">เพิ่มกรมธรรม์ใหม่</h2>
									</header>
									<div class="panel-body">
										
						
										
			<form class="form-horizontal" novalidate="novalidate" action="server/insert_AL.php" method="post" enctype="multipart/form-data" name="product" >		
											<div class="tab-content">
												<div id="w4-account" class="tab-pane active">
													
<input name="meid" type="hidden" id="id" value="<?=$iduser?>"/>

				





                <div class="col-md-12">
                   
            <input type="hidden" name="id" id="id" class="form-control">
            <div class="col-md-6">

            	 <div class="form-group">
                <label for="cusID" class="col-sm-4 control-label">ชื่อลูกค้า</label>
                <div class="col-sm-7">
                    <select data-plugin-selecttwo name="cusID" id="cusID " class="form-control " required="">
                        <option value="">-- โปรดเลือก --</option>
                        <?php
                        $sql="SELECT * FROM customer WHERE member_id = $iduser ORDER BY customer.cus_name DESC ";
						$result=mysql_query($sql)or die(mysql_error());
						for($i=0;$row=mysql_fetch_assoc($result);$i++){ 
						?>
                   		<option value="<?=$row['id']?>"><?=$row['cus_name']?> <?=$row['cus_lastname']?></option>
                   		<?php
                   		}
                   		?>
                </select>
                </div>
            </div>
                    <div class="form-group">
                        <label for="companyName" class="col-sm-4 control-label">บริษัทประกัน</label>
                        <div class="col-sm-7">
                            <select name="companyName" id="companyName" class="form-control">
                                <option value="">-- โปรดเลือก --</option>
                                <?php
                        $sqlcus="SELECT * FROM product2 WHERE category_id = 8 ORDER BY id ASC ";
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
                        <label for="No" class="col-sm-4 control-label">เลขที่กรมธรรม์</label>
                        <div class="col-sm-7">
                            <input type="text" name="No" id="No" class="form-control">
                        </div>
                    </div> 

                    <div class="form-group">
                        <label for="username" class="col-sm-4 control-label">ชื่อผุ้เอาประกัน กรณี แตกต่างจากเจ้าของบัญชี</label>
                        <div class="col-sm-7">
                            <input type="text" name="username" id="username" class="form-control">
                        </div>
                    </div>
                    

                    <div class="form-group">
                        <label for="type" class="col-sm-4 control-label">ประเภทของประกัน</label>
                        <div class="col-sm-7">
                            <select name="type" id="type" class="form-control">
                                <option value="">-- โปรดเลือก --</option>
                                <?php
                        $sqlcus="SELECT * FROM product2 WHERE category_id = 9 ORDER BY id ASC ";
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
                        <label for="toon_money" class="col-sm-4 control-label">ทุนประกัน</label>
                        <div class="col-sm-7">
                            <input type="text" name="toon_money" id="toon_money" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nameType" class="col-sm-4 control-label">ชื่อชนิดประกัน</label>
                        <div class="col-sm-7">
                            <input type="text" name="nameType" id="nameType" class="form-control">
                        </div>
                    </div>

                   <div class="form-group">
                        <label for="more" class="col-sm-4 control-label">Broker</label>
                        <div class="col-sm-7">
                            <input type="text" name="more" id="more" class="form-control">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="first_money" class="col-sm-4 control-label">จำนวนเบี้ยเริ่มต้น</label>
                        <div class="col-sm-7">
                            <input type="text" name="first_money" id="first_money" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="moneyPay" class="col-sm-4 control-label"><code>จำนวนเบี้ยที่จ่ายล่าสุด</code></label>
                        <div class="col-sm-7">
                            <input type="text" name="moneyPay" id="moneyPay" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="startDate" class="col-sm-4 control-label">วันที่เริ่มทำสัญญา</label>
                        <div class="col-sm-7">
                            <div class="input-group date">
                                <input id="startDate" name="startDate" class="form-control" type="text">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                   
                    
 </div>

                <div class="col-md-6">


                	 <div class="form-group">
                        <label for="startDate" class="col-sm-4 control-label">วันที่ครบสัญญา</label>
                        <div class="col-sm-7">
                            <div class="input-group date">
                                <input id="endDate" name="endDate" class="form-control" type="text">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </div>
                        </div>
                    </div>


                	 

                	

                    

                    

                    <div class="form-group">
                        <label for="dealDate" class="col-sm-4 control-label"><code>วันที่ดิวเบี้ย</code></label>
                        <div class="col-sm-7">
                            <div class="input-group date">
                                <input id="dealDate" name="startDate1" class="form-control" type="text">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="confirmPay" class="col-sm-4 control-label"><code>วันที่จ่ายเบี้ยครั้งล่าสุด</code></label>
                        <div class="col-sm-7">
                            <div class="input-group date">
                                <input id="confirmPay" name="confirmPay" class="form-control" type="text">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    
                    


                    <div class="form-group">
                        <label for="detailMoney" class="col-sm-4 control-label">รายละเอียดการจ่ายเบี้ย</label>
                        <div class="col-sm-7">
                            <input type="text" name="detailMoney" id="detailMoney" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="receiveMoney" class="col-sm-4 control-label">รายละเอียดการรับเงิน</label>
                        <div class="col-sm-7">
                            <input type="text" name="receiveMoney" id="receiveMoney" class="form-control">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="whoRec" class="col-sm-4 control-label">ผู้รับผลประโยชน์</label>
                        <div class="col-sm-7">
                            <input type="text" name="whoRec" id="whoRec" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status" class="col-sm-4 control-label">Status</label>
                        <div class="col-sm-7">
                            <select name="status" id="status" class="form-control">
                               <option value="ไม่ระบุ">--เลือกข้อมูล--</option>
                                <?php
                        $sqlcus="SELECT * FROM product2 WHERE category_id = 12 ORDER BY id ASC ";
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
                        <label for="remark" class="col-sm-4 control-label">หมายเหตุ</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" name="remark" id="remark" rows="2"></textarea>
                        </div>
                    </div>
                </div>
            
            <legend class="section"></legend>
            <div class="text-center">
                <button type="submit" class="btn btn-info" onclick="clicksound.playclip()"><i class="fa fa-save"></i> บันทึก</button>
                <button type="reset" class="btn btn-default" onclick="showhide('#show','#add');"><i class="fa fa-eraser"></i> ยกเลิก</button>
            </div>
       
                </div>






												</div>


												
											
												





											</div>
										
									</div>
									

									</form>
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
								<h6>Friends</h6>
								<ul>
									<?php
								$sql1="SELECT * FROM user WHERE username NOT LIKE '%$username%'  ORDER BY id ASC LIMIT 0, 8";
											$result1=mysql_query($sql1)or die(mysql_error());
									for($i=0;$row2=mysql_fetch_assoc($result1);$i++){ 
											?>

									<li class="status-<?=$row2['status']?>">
										<figure class="profile-picture">
											<a href="friends.php?id=<?=$row2['id']?>&meid=<?=$iduser?>" target="_blank"><img src="avatar/<?=$row2['Image']?>" alt="<?=$row2['username']?>" style="width:35px; height:35px;" class="img-circle"></a>
										</figure>
										<div class="profile-info">
											<span class="name"><a href="friends.php?id=<?=$row2['id']?>&meid=<?=$iduser?>" target="_blank"><?=$row2['First_Name']?> <?=$row2['Last_Name']?></a></span>
											<span class="title">administrator.</span>
										</div>
									</li>

									<?php } ?>
									
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
		<script src="assets/vendor/bootstrap-wizard/jquery.bootstrap.wizard.js"></script>
		<script src="assets/vendor/select2/select2.js"></script>
		<script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>


		
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