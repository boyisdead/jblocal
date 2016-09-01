<?php
session_start();
include('server/connect.php');
if(isset($_SESSION['ssUsername'])){$username=$_SESSION['ssUsername'];}
else if(!isset($_SESSION['ssUsername'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}
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

?>
<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Action Plan</title>
		<meta name="keywords" content="Action Plan" />
		<meta name="description" content="Action Plan">
		

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
			
					<form action="pages-search-results.html" class="search nav-form">
						<div class="input-group input-search">
							<input type="text" class="form-control" name="q" id="q" placeholder="Search...">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
							</span>
						</div>
					</form>
			
					
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
									<li >
										<a href="Dashboard" onclick="clicksound.playclip()">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
									</li>
									<li>
										<a href="customer" onclick="clicksound.playclip()">
											<i class="fa fa-list-alt" aria-hidden="true"></i>
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
											<i class="fa fa-user-md" aria-hidden="true"></i>
											<span>Private Fund</span>
										</a>
									</li>
									<li>
										<a href="product-service" onclick="clicksound.playclip()">
											<i class="fa fa-users" aria-hidden="true"></i>
											<span>Product ตปท.</span>
										</a>
									</li>
									<li >
										<a href="insurance" onclick="clicksound.playclip()">
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
									<li class="nav-expanded nav-active" onclick="clicksound.playclip()">
										<a href="Action-plan">
											<i class="fa fa-coffee" aria-hidden="true"></i>
											<span>Action Plan</span>
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
						<h2>Action Plan</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="Dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Tables</span></li>
								<li><span>Action Plan</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>



					<div class="row">
									<div class="col-sm-12">
										
									</div>
									<div class="col-sm-12">
										<form id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate" action="server/action.php" method="post" enctype="multipart/form-data">
										<input name="meid" type="hidden" id="id" value="<?=$iduser?>"/>
										<input name="action" type="hidden" id="id" value="newaction"/>
										<section class="panel panel-collapsed">
											<header class="panel-heading">
												
										<a href="#" onclick="clicksound.playclip()" class="btn btn-primary panel-action-toggle" data-panel-toggle="">Add New Action <i class="fa fa-plus"></i></a>
									<!--	<a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a> -->
										
									
												
											</header>
											<div class="panel-body">
												
													<div class="form-group">
												<label for="username" class="col-sm-4 control-label">Action to do</label>
														<div class="col-sm-7">
															
															<textarea rows="2" name="todo" class="form-control" ></textarea>
														</div>
													</div>
													<div class="form-group">
								                        <label for="username" class="col-sm-4 control-label">ผู้รับผิดชอบ</label>
								                        <div class="col-sm-7">
								                            <input type="text" name="subport" id="subport" class="form-control">
								                        </div>
								                    </div>

								                    <div class="form-group">
													<label class="col-md-4 control-label" >วันเริ่ม :</label>
													<div class="col-md-7">

													<div class="input-group date">
						                                <input id="birthday" name="startday" class="form-control" type="text">
						                                <span class="input-group-addon">
						                                    <i class="fa fa-calendar"></i>
						                                </span>
						                            </div>
													</div>
												</div>

												<div class="form-group">
												<label class="col-md-4 control-label">Time</label>
												<div class="col-md-7">
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-clock-o"></i>
														</span>
														<input type="text" name="timer" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false }'>
													</div>
												</div>
											</div>


												<div class="form-group">
													<label class="col-md-4 control-label" >วันสิ้นสุด :</label>
													<div class="col-md-7">

													<div class="input-group date">
						                                <input id="birthday" name="endday" class="form-control" type="text">
						                                <span class="input-group-addon">
						                                    <i class="fa fa-calendar"></i>
						                                </span>
						                            </div>
													</div>
												</div>





												<div class="form-group">
                        <label for="Status" class="col-sm-4 control-label">Status</label>
                        <div class="col-sm-7">
                            <select name="Status" id="Status" class="form-control">
                                <option value="0">-- โปรดเลือก --</option>
                                <option value="1">Done</option>
                                <option value="2">On Process</option>
                                <option value="3">Not started</option>
                            </select>
                        </div>
                    </div>


												
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button type="submit" class="btn btn-primary ">Confirm</button>
														<button class="btn btn-default modal-dismiss">Cancel</button>
													</div>
												</div>
											</footer>
									</section>
								</form>
									</div>

								</div>

					<!-- start: page -->
						<section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
									<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
								</div>
						
								<h2 class="panel-title">Action Plan</h2>
							</header>
							<div class="panel-body">
								
								<table class="table table-striped mb-none" id="datatable-editable">
									<thead>
										<tr>
											<th>ID</th>
											<th>Action to do</th>
											<th>ผู้รับผิดชอบ</th>
											<th>วันที่ต้องทำ</th>
											<th>Status</th>
											<th>Action</th>
											


											
											
										</tr>
									</thead>
									<tbody>
																				<?php


										//เรคคอร์ดที่สิ้นสุด
$page_size=$num_col*$num_row;
//กำหนดค่าเริ่มต้น
$page=isset($_REQUEST['page'])?$_REQUEST['page']:0;
$keyword=isset($_REQUEST['keyword'])?$_REQUEST['keyword']:'';
$status=base64_decode(isset($_REQUEST['status'])?$_REQUEST['status']:'');
//หาจำนวนหน้า
$sql="SELECT COUNT(*) FROM actionplan WHERE member_id = $iduser";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_array($result);
$num=$row['COUNT(*)'];
$numAll=$num;
//หมายเลขหน้า
$num_page=ceil($num/$page_size);
//เรคคอร์ดที่เริ่ม
$start_record=$page*$page_size;
//เลือกข้อมูล
$sql="SELECT * FROM actionplan WHERE member_id = $iduser ORDER BY id ASC LIMIT $start_record, $page_size";
$result=mysql_query($sql)or die(mysql_error());
$num=mysql_num_rows($result);
if($num==0){
?>
<tr class="gradeX">
<td align="center" colspan="6">ไม่มีข้อมูล</td>
<td class="hide">1</td>
<td class="hide">1</td>
<td class="hide">1</td>
<td class="hide">1</td>
<td class="hide">1</td>

</tr>

<?php
}
for($i=0;$row=mysql_fetch_assoc($result);$i++){ 
  if($i%$num_col==0){
?>
<tr class="gradeX">
<?php
    }	
    





 $statuss = $row['statuss'];

switch ($statuss) {
    case "1":
        $statuss = "<span class='label label-success'>Done</span>";
        $statuss1 = "Done";
        break;
    case "2":
        $statuss = "<span class='label label-primary'>On Process</span>";
        $statuss1 = "On Process";
        break;
    default:
        $statuss = "<span class='label label-danger'>Not started</span>";
        $statuss1 = "Not started";
}	

$time1 = strtotime($row['endday']);

$time = strtotime($row['startday']);
    $my_format = date("Y", $time);
    $my_format1 = date("F", $time);
    $my_format2 = date("d", $time);

?>
											<td><?=$row['id']?></td>
											<td><?=$row['toda']?></td>
											<td><?=$row['subport']?></td>
											
											<td><?=$my_format2?> <?=$my_format1?> <?=$my_format?> </td>
											<td><?=$statuss?></td>
											
									
											<td class="actions" style="font-size:15px;">
												
												<a href="#modalAnim2<?=$row['id']?>" class="modal-with-zoom-anim" onclick="clicksound.playclip()"><i class="fa fa-pencil"></i></a>
												<a href="#modalAnim<?=$row['id']?>" class="modal-with-zoom-anim" style="font-size: 16px;" onclick="clicksound.playclip()"><i class="fa fa-trash-o"></i></a>

<div id="modalAnim<?=$row['id']?>" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Are you sure?</h2>
											</header>
											<div class="panel-body">
												<div class="modal-wrapper">
													<div class="modal-icon">
														<i class="fa fa-question-circle"></i>
													</div>
													<div class="modal-text">
														<p>Are you sure that you want to delete this Action ?</p>
													</div>
												</div>
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														
														<a class="btn btn-primary " onclick="clicksound.playclip()" href="server/action.php?id=<?=$row['id']?>&action=delaction">Confirm</a>
														<button class="btn btn-default modal-dismiss">Cancel</button>
													</div>
												</div>
											</footer>
										</section>
									</div>



									<div id="modalAnim3<?=$row['id']?>" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
										<form id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate" action="server/action.php" method="post" enctype="multipart/form-data">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Edit your Action Plan ?</h2>
											</header>
											<div class="panel-body">
										<input name="meid" type="hidden" id="id" value="<?=$iduser?>"/>
										<input name="action" type="hidden" id="id" value="updateaction"/>
										<input name="id" type="hidden" id="id" value="<?=$row['id']?>"/>
												
													<div class="form-group">
												<label for="username" class="col-sm-4 control-label">Action to do</label>
														<div class="col-sm-7">
															
															<textarea rows="2" name="todo" class="form-control" ><?=$row['toda']?></textarea>
														</div>
													</div>
													<div class="form-group">
								                        <label for="username" class="col-sm-4 control-label">ผู้รับผิดชอบ</label>
								                        <div class="col-sm-7">
								                            <input type="text" name="subport" value="<?=$row['subport']?>" id="subport" class="form-control">
								                        </div>
								                    </div>

								                    <div class="form-group">
													<label class="col-md-4 control-label" >วันเริ่ม :</label>
													<div class="col-md-7">

													<div class="input-group date">
						                                <input id="birthday" name="startday" value="<?=date("Y-m-d", $time)?>" class="form-control" type="text">
						                                <span class="input-group-addon">
						                                    <i class="fa fa-calendar"></i>
						                                </span>
						                            </div>
													</div>
												</div>

												<div class="form-group">
												<label class="col-md-4 control-label">Time</label>
												<div class="col-md-7">
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-clock-o"></i>
														</span>
														<input type="text" name="timer" value="<?=date("h:i:s")?>" data-plugin-timepicker class="form-control" >
													</div>
												</div>
											</div>


												<div class="form-group">
													<label class="col-md-4 control-label" >วันสิ้นสุด :</label>
													<div class="col-md-7">

													<div class="input-group date">
						                                <input id="birthday" name="endday" value="<?=date("Y-m-d", $time1)?>" class="form-control" type="text">
						                                <span class="input-group-addon">
						                                    <i class="fa fa-calendar"></i>
						                                </span>
						                            </div>
													</div>
												</div>





												<div class="form-group">
                        <label for="Status" class="col-sm-4 control-label">Status</label>
                        <div class="col-sm-7">
                            <select name="Status" id="Status" class="form-control">
                            	<option value="<?=$row['statuss']?>"><?=$statuss1?></option>
                          
                                <option value="1">Done</option>
                                <option value="2">On Process</option>
                                <option value="3">Not started</option>
                            </select>
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



								


											</td>
										
<?php
  if($i%$num_col==$num_col-1){
?>
  </tr>
<?php
  }
}
if ($i>$num_col){
  for($j=$i;$j%$num_col!=0;$j++){
?>
  <td colspan="5" align="center">โค้ดหรือข้อความเมื่อเหลือพื้นที่แสดง</td>
<?php 
  }
}
if($i%$num_col!=0){
?>
  </tr>
<?php
}
?>
										
										
									</tbody>
								</table>
							</div>
						</section>





<section class="panel">
					

					<!-- start: page -->
					<section class="panel">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<div id="calendar"></div>
								</div>
								
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
		<script src="assets/vendor/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>
		<!-- Analytics to Track Preview Website -->		
		<script src="assets/javascripts/ui-elements/examples.modals.js"></script>
		<!-- Examples -->
		<script src="assets/javascripts/tables/examples.datatables.editable2.js"></script>
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