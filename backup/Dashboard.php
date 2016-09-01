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
		if(($_SESSION['ssPosition'] == 'superuser')){echo"<script>window.location='super_category';</script>";exit;}
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

		<title>Dashboard</title>
		<meta name="keywords" content="Dashboard" />
		<meta name="description" content="Dashboard">
		

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
		<link rel="stylesheet" href="assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" />	
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		

		<!-- Specific Page Vendor CSS -->		
		<link rel="stylesheet" href="assets/vendor/morris/morris.css" />
		<link rel="stylesheet" href="assets/vendor/chartist/chartist.css" />
		<link rel="stylesheet" href="assets/vendor/chartist/chartist2.css" />	

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
					<a href="http://www.wealthbrainer.com" class="logo pull-left">
					<img src="assets/images/logo.png?m=<?php echo filemtime('logo.png'); ?>" height="38" alt="Porto Admin" />
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
								<span class="name"><?=$_SESSION['ssUsername']?> <?=$row['Last_Name']?></span>
								<span class="role"><?=$_SESSION['ssPosition']?></span>
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
									<li class="nav-expanded nav-active">
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

									
								</ul>
							</nav>
				
							
				
							<hr class="separator" />
				
							
						</div>
				
					</div>
				
				</aside>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Dashboard</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="Dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Tables</span></li>
								<li><span>Dashboard</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right" onclick="clicksound.playclip()"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>



					

					<!-- start: page -->

<div class="row">


	<div class="col-md-6">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
											<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss=""></a>
										
										</div>
						
										<h2 class="panel-title">จำนวนลูกค้า</h2>
										<p class="panel-subtitle">แบ่งตามประเภทของลูกค้า A,AA,AAA,*A,*AA,*AAA</p>
									</header>
									<div class="panel-body">
						
										<!-- Flot: Pie -->
										<div class="chart chart-md" id="flotPie"></div>
										
						
									</div>
								</section>
							</div>



							<div class="col-md-6">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
											<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss=""></a>
										</div>
						
										<h2 class="panel-title">จำนวนลูกค้า</h2>
										<p class="panel-subtitle">แบ่งตามประเภทของลูกค้า A,AA,AAA,*A,*AA,*AAA</p>
									</header>
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table mb-none">
												<thead>
													<tr>
														<th>#</th>
														<th>ขนาดของลูกค้า </th>
														<th>จำนวนรวม</th>
														<th>เปอร์เซ็น</th>
													</tr>
												</thead>
												<tbody>

													<?php
$sql4="SELECT * FROM customer WHERE (cus_size != 'ไม่ระบุ') AND member_id= $iduser ";
	$result4=mysql_query($sql4)or die(mysql_error());
	$num=mysql_num_rows($result4);


$sql5="SELECT cus_size, COUNT(*) AS summ FROM customer WHERE (cus_size != 'ไม่ระบุ') AND member_id= $iduser GROUP BY cus_size";
	$result5=mysql_query($sql5)or die(mysql_error());
	for($i5=0;$row5=mysql_fetch_assoc($result5);$i5++){

		$total = number_format((($row5['summ']/$num)*100));
													?>

													<tr>
														<td>1</td>
														<td><?=$row5['cus_size']?></td>
														<td><?=$row5['summ']?></td>
														<td><?=$total?>%</td>
													</tr>
													<?php
												}
												?>
													
												</tbody>
											</table>
										</div>
									</div>
								</section>
							</div>

</div>

<div class="row">

							<div class="col-md-6">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
											<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
										</div>
						
										<h2 class="panel-title">ประกันชีวิต</h2>
										<p class="panel-subtitle">จำนวนเบี้ยที่จ่ายล่าสุด</p>
									</header>
									<div class="panel-body">
						
										<!-- Morris: Area -->
										<div class="chart chart-md" id="morrisStacked"></div>
										
						
									</div>
								</section>
							</div>



							<div class="col-md-6">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
											<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
										</div>
						
										<h2 class="panel-title">ประกันวินาศภัย</h2>
										<p class="panel-subtitle">จำนวนเบี้ยที่จ่ายล่าสุด</p>
									</header>
									<div class="panel-body">
						
										<!-- Morris: Area -->
										<div class="chart chart-md" id="morrisStacked2"></div>
										
						
									</div>
								</section>
							</div>
							
				</div>	




				<div class="row">

							



							<div class="col-md-6">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
											<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
										</div>
						
										<h2 class="panel-title">OFFSHORE PRODUCT</h2>
										<p class="panel-subtitle">จำนวนเบี้ยที่จ่ายล่าสุด</p>
									</header>
									<div class="panel-body">
						
										<!-- Morris: Area -->
										<div class="chart chart-md" id="morrisStacked3"></div>
										
						
									</div>
								</section>
							</div>


							<div class="col-md-6">
								
						
								<div class="row">
									<div class="col-md-12">
										<section class="panel">
											<header class="panel-heading">
												<div class="panel-actions">
													<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
													<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
												</div>
																				<?php
$my_formaty = date("Y");
$sql1="SELECT * FROM customer WHERE (member_id= $iduser) AND ((DATE_FORMAT(insert_date,'%Y'))=$my_formaty)";
$result1=mysql_query($sql1)or die(mysql_error());
$num=mysql_num_rows($result1);
														?>
												<h2 class="panel-title">เป้าหมายยอดที่ต้องการขายในปีนี้ </h2>
												<h2 class="panel-title">(ประกันชีวิต/Offshore)</h2>
												<p class="panel-subtitle">เป้าหมายจำนวนลูกค้าในปีนี้ / เป้าหมายจำนวนเบี้ยในปีนี้</p>
											</header>
											<div class="panel-body">
												<div class="row">
													<div class="col-md-6"> 

														<meter min="0" max="100" value="<?=((($num)/($row['point_cus']))*100)?>" id="meter"></meter>
													</div>
<?php	
$sql52="SELECT SUM(ins_moneyPay) AS SUMM1 FROM insurance WHERE member_id= $iduser AND ((DATE_FORMAT(ins_startDate,'%Y'))=$my_formaty) ";
	$result52=mysql_query($sql52)or die(mysql_error());
	$row52=mysql_fetch_assoc($result52);	


$sql51="SELECT SUM(pa_type) AS SUMM FROM product_aboard WHERE member_id= $iduser AND ((DATE_FORMAT(pa_policy_date,'%Y'))=$my_formaty) ";
	$result51=mysql_query($sql51)or die(mysql_error());
	$row51=mysql_fetch_assoc($result51);	
	?>												
													<div class="col-md-6">
														<meter min="0" max="100" value="<?=(((($row51['SUMM'])+($row52['SUMM1']))/($row['point_off']))*100)?>" id="meterDark"></meter>
													</div>
												</div>
											</div>
										</section>
									</div>
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
		$sql="SELECT * FROM user WHERE guest_id = $iduser";
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
		
		<!-- Specific Page Vendor -->	
		<script src="assets/vendor/jquery-appear/jquery.appear.js"></script>		

		<script src="assets/vendor/jquery-easypiechart/jquery.easypiechart.js"></script>		

		<script src="assets/vendor/flot/jquery.flot.js"></script>		

		<script src="assets/vendor/flot-tooltip/jquery.flot.tooltip.js"></script>		

		<script src="assets/vendor/flot/jquery.flot.pie.js"></script>		

		<script src="assets/vendor/flot/jquery.flot.categories.js"></script>		

		<script src="assets/vendor/flot/jquery.flot.resize.js"></script>		

		<script src="assets/vendor/jquery-sparkline/jquery.sparkline.js"></script>		
		<script src="assets/vendor/raphael/raphael.js"></script>		

		<script src="assets/vendor/morris/morris.js"></script>		
		<script src="assets/vendor/gauge/gauge.js"></script>		
		<script src="assets/vendor/snap-svg/snap.svg.js"></script>		
		<script src="assets/vendor/liquid-meter/liquid.meter.js"></script>		

		<script src="assets/vendor/chartist/chartist.js"></script>	



		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>
		<!-- Analytics to Track Preview Website -->		
		
		<!-- Examples -->
		
		<script src="assets/javascripts/ui-elements/examples.loading.overlay.js"></script>
		<script>(function(a,b,c){if(c in b&&b[c]){var d,e=a.location,f=/^(a|html)$/i;a.addEventListener("click",function(a){d=a.target;while(!f.test(d.nodeName))d=d.parentNode;"href"in d&&(d.href.indexOf("http")||~d.href.indexOf(e.host))&&(a.preventDefault(),e.href=d.href)},!1)}})(document,window.navigator,"standalone")</script>   
				<style>

		</style>
	
		
<script type="text/javascript">

$(document).ready(function(){
    $.ajax({
        url: 'server/getDataCustomer2.php', // getchart.php
        dataType: 'JSON',
        type: 'POST',
       // dataType: 'jsonp',
        data: {
        	id: "<?=$iduser?>",
              },
        success: function(response) {



		var plot = $.plot('#flotPie', response, {
			series: {
				pie: {
					show: true,
					combine: {
						color: '#999',
						threshold: 0.1
					}
				}
			},
			legend: {
				show: false
			},
			grid: {
				hoverable: true,
				clickable: true
			}
		});


}
    });

});





$(document).ready(function(){
    $.ajax({
        url: 'server/getDataCustomer2-2.php', // getchart.php
        dataType: 'JSON',
        type: 'POST',
       // dataType: 'jsonp',
        data: {
        	id: "<?=$iduser?>",
              },
        success: function(response) {

Morris.Bar({
		resize: true,
		element: 'morrisStacked',
		data: response,
		xkey: 'y',
		ykeys: ['a', 'b'],
		labels: ['ปีล่าสุด', 'ปีอื่นๆ'],
		barColors: ['#0088cc', '#2baab1'],
		fillOpacity: 0.7,
		smooth: false,
		stacked: true,
		hideHover: true
	});
}
    });

});




$(document).ready(function(){
    $.ajax({
        url: 'server/getDataCustomer2-3.php', // getchart.php
        dataType: 'JSON',
        type: 'POST',
       // dataType: 'jsonp',
        data: {
        	id: "<?=$iduser?>",
              },
        success: function(response) {

Morris.Bar({
		resize: true,
		element: 'morrisStacked2',
		data: response,
		xkey: 'y',
		ykeys: ['a', 'b'],
		labels: ['ปีล่าสุด', 'ปีอื่นๆ'],
		barColors: ['#0088cc', '#2baab1'],
		fillOpacity: 0.7,
		smooth: false,
		stacked: true,
		hideHover: true
	});
}
    });

});




$(document).ready(function(){
    $.ajax({
        url: 'server/getDataCustomer2-4.php', // getchart.php
        dataType: 'JSON',
        type: 'POST',
       // dataType: 'jsonp',
        data: {
        	id: "<?=$iduser?>",
              },
        success: function(response) {

Morris.Bar({
		resize: true,
		element: 'morrisStacked3',
		data: response,
		xkey: 'y',
		ykeys: ['a', 'b'],
		labels: ['ปีล่าสุด', 'ปีอื่นๆ'],
		barColors: ['#0088cc', '#2baab1'],
		fillOpacity: 0.7,
		smooth: false,
		stacked: true,
		hideHover: true
	});
}
    });

});



/*
	Liquid Meter
	*/
	$('#meter').liquidMeter({
		shape: 'circle',
		color: '#0088CC',
		background: '#F9F9F9',
		fontSize: '24px',
		fontWeight: '600',
		stroke: '#F2F2F2',
		textColor: '#333',
		liquidOpacity: 0.9,
		liquidPalette: ['#333'],
		speed: 3000,
		animate: !$.browser.mobile
	});

	/*
	Liquid Meter Dark
	*/
	$('#meterDark').liquidMeter({
		shape: 'circle',
		color: '#0088CC',
		background: '#272A31',
		stroke: '#33363F',
		fontSize: '24px',
		fontWeight: '600',
		textColor: '#FFFFFF',
		liquidOpacity: 0.9,
		liquidPalette: ['#0088CC'],
		speed: 3000,
		animate: !$.browser.mobile
	});

	$(this).on("styleSwitcher.setColor", function(ev) {
		$('#meter, #meterDark').liquidMeter('color', ev.color)
	});

	if (typeof($.browser) != 'undefined') {
		if($.browser.mobile) {
			$('#meter, #meterDark').liquidMeter('color', '#0088cc');
		}
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

var mouseoversound=createsoundbite("http://www.javascriptkit.com/script/script2/whistle.ogg", "http://www.javascriptkit.com/script/script2/whistle.mp3")
var clicksound=createsoundbite("http://www.javascriptkit.com/script/script2/click.ogg", "http://www.javascriptkit.com/script/script2/click.mp3")

</script>

	</body>
</html>