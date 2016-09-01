<?php
session_start();
include('server/connect.php');
if(isset($_SESSION['ssUsername'])){$username=$_SESSION['ssUsername'];}
else if(!isset($_SESSION['ssUsername'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}



$num_col=1;
$num_row=4;
//เรคคอร์ดที่สิ้นสุด
$page_size=$num_col*$num_row;
//กำหนดค่าเริ่มต้น
$page=isset($_REQUEST['page'])?$_REQUEST['page']:1;
$page=$page-1;


$id=$_REQUEST['id'];
$meid=$_REQUEST['meid'];

$sql="SELECT COUNT(*) FROM user WHERE id != $id ";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_array($result);
$num=$row['COUNT(*)'];
$numAll=$num;

$sql="SELECT * FROM user WHERE id = $id ";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_array($result);
$iduser = $row['id'];
if($row['username'] == $_SESSION['ssUsername'])
{
	echo"<script>window.location='profile.php';</script>";exit;
}



$sqlme="SELECT * FROM user WHERE id = $meid ";
$resultme=mysql_query($sqlme)or die(mysql_error());
$rowme=mysql_fetch_array($resultme);




//หาจำนวนหน้า
$sql22="SELECT COUNT(*) FROM post WHERE userpost = $iduser OR postto = $iduser";
$result22=mysql_query($sql22)or die(mysql_error());
$row22=mysql_fetch_array($result22);
$num=$row22['COUNT(*)'];
//หมายเลขหน้า
$num_page=ceil($num/$page_size);
//เรคคอร์ดที่เริ่ม
$start_record=$page*$page_size;


?>

<!doctype html>
<html class="fixed">
	<head>
		<!-- Basic -->
		<meta charset="UTF-8">
		<title><?=$num?> Form Validation | Porto Admin - Responsive HTML5 Template 1.2.0</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

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
	<body>
		<section class="body">

			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="Dashboard" class="logo">
						<img src="assets/images/logo.png"  height="35" alt="Porto Admin" />
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
								<img src="avatar/<?=$rowme['Image']?>" width="35" height="35" alt="<?=$rowme['username']?>" class="img-circle" data-lock-picture="avatar/<?=$row['Image']?>" />
							</figure>
							<div class="profile-info" data-lock-name="<?=$rowme['username']?>" data-lock-email="<?=$rowme['email']?>">
								<span class="name"><?=$rowme['First_Name']?> <?=$rowme['Last_Name']?></span>
								<span class="role"><?=$row['position']?></span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li>
									<a role="menuitem" tabindex="-1" href="profile"><i class="fa fa-user"></i> My Profile</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="pages-lock-screen" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="server/logout.php?id=<?=$row['id']?>"><i class="fa fa-power-off"></i> Logout</a>
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
						<h2><?=$row['First_Name']?> <?=$row['Last_Name']?></h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="Dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>User Profile</span></li>
								
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					
					<div class="row">
						<div class="col-md-4 col-lg-3">

							<section class="panel">
								<div class="panel-body">
									<div class="thumb-info mb-md">
										<img src="avatar/<?=$row['Image']?>" class="rounded img-responsive" alt="<?=$row['username']?>">
										<div class="thumb-info-title">
											<span class="thumb-info-inner"><?=$row['First_Name']?> <?=$row['Last_Name']?></span>
											<span class="thumb-info-type"><?=$row['status']?></span>
										</div>
									</div>

									<div class="widget-toggle-expand mb-md">
										<div class="widget-header">
											<h6><?=$row['First_Name']?> <?=$row['Last_Name']?></h6>
											<div class="widget-toggle">+</div>
										</div>
										
										<div class="widget-content-expanded">
											<i class="fa fa-child"></i> <?=$row['username']?></li><br>
											<i class="fa fa-phone"></i> <?=$row['tel']?></li><br>
											<i class="fa fa-envelope"></i> <?=$row['email']?></li>
										</div>
									</div>

									<hr class="dotted short">

									<h6 class="text-muted">About</h6>
									<p><?=$row['About']?></p>
									<div class="clearfix">
										
									</div>

									<hr class="dotted short">

									<div class="social-icons-list">
										<a rel="tooltip" data-placement="bottom" target="_blank" href="<?=$row['fb']?>" data-original-title="Facebook"><i class="fa fa-facebook"></i><span>Facebook</span></a>
										<a rel="tooltip" data-placement="bottom" href="<?=$row['tw']?>" data-original-title="Twitter"><i class="fa fa-twitter"></i><span>Twitter</span></a>
										<a rel="tooltip" data-placement="bottom" href="<?=$row['inn']?>" data-original-title="Linkedin"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
									</div>

								</div>
							</section>



							

						</div>
						<div class="col-md-8 col-lg-6">
							<div class="tabs">
								<ul class="nav nav-tabs tabs-primary">
									<li class="active">
										<a href="#overview" data-toggle="tab" aria-expanded="true">Overview</a>
									</li>
									
								</ul>
								<div class="tab-content">
									<div id="overview" class="tab-pane active">
										<h4 class="mb-md">Update Status</h4>

										<section class="simple-compose-box mb-xlg">
											<form class="form-horizontal" action="server/insertpostto.php" method="post" enctype="multipart/form-data" name="product" >
												<textarea name="message-text" data-plugin-textarea-autosize="" placeholder="What's on your mind?" rows="1" style="overflow: hidden; word-wrap: break-word; resize: none; height: 37px;"></textarea>
												<input name="id" type="hidden" id="id" value="<?=$row['id']?>"/>
												<input name="meid" type="hidden" id="id" value="<?=$meid?>"/>
											<div class="compose-box-footer">
												<ul class="compose-toolbar">
													<li>
														<input type="file" name="postimage" class="filestyle" data-input="false">
														
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

										<h4 class="mb-xlg">Timeline</h4>

										<div class="timeline timeline-simple mt-xlg mb-md">
											<div class="tm-body">
												
												<ol class="tm-items" id="post-items">
													<?php
													$userid = $row['id'];
											$sql3="SELECT * FROM post WHERE userpost = $userid OR postto = $userid  ORDER BY insert_date DESC LIMIT $start_record, $page_size";
											$result3=mysql_query($sql3)or die(mysql_error());

											for($i=0;$row3=mysql_fetch_assoc($result3);$i++){ 
												$time = strtotime($row3['insert_date']);
												$my_format = date("d/m/Y , g:i a", $time);
											?>
													<li class="post-item">
														<div class="tm-box">
															<?php
															if($row3['userpostto'] == $meid){

																echo '<a data-toggle="dropdown" aria-haspopup="true" ><i class="fa fa-sort-desc pull-right"></i></a>';
															}
															else{
																echo '';
															}
															
															?>

																<ul class="dropdown-menu option-e" style="" role="menu" aria-labelledby="dLabel">
                <li role="presentation"><a role="menuitem" class="mb-xs mt-xs mr-xs modal-with-zoom-anim"  href="#modalAnim2<?=$row3['id']?>"><i class="fa fa-wrench"></i> Edit</a></li>
                <li role="presentation"><a role="menuitem" class="mb-xs mt-xs mr-xs modal-with-zoom-anim" href="#modalAnim<?=$row3['id']?>"><i class="fa fa-trash-o"></i> Delete</a></li>
             
                
              </ul>
             
										<div id="modalAnim<?=$row3['id']?>" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
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
														<p>Are you sure that you want to delete this Post?</p>
													</div>
												</div>
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														
														<a class="btn btn-primary " href="server/friendDeletepost.php?id=<?=$row3['id']?>">Confirm</a>
														<button class="btn btn-default modal-dismiss">Cancel</button>
													</div>
												</div>
											</footer>
										</section>
									</div>


									<div id="modalAnim2<?=$row3['id']?>" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
										<form id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate" action="server/updatepost.php" method="post" enctype="multipart/form-data">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Edit your post ?</h2>
											</header>
											<div class="panel-body">
												
													<div class="form-group">
											
														<div class="col-sm-12">
															<input name="id" type="hidden" id="id" value="<?=$row3['id']?>"/>
															<textarea rows="2" name="message-text" class="form-control" ><?=$row3['posttext']?></textarea>
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
									<?php
															$userpostto = $row3['userpostto'];

															$sqlu="SELECT * FROM user WHERE id = $userpostto";
															$resultu=mysql_query($sqlu)or die(mysql_error());
															$rowu=mysql_fetch_assoc($resultu);


															if($userpostto !== $iduser)
															{
																$urlfri = "friends.php?id=".$userpostto."&meid=".$meid;
															}
															else{
																$urlfri = "#";
															}

															?>


									<figure class="profile-picture pull-left" style="margin-left:-15px; margin-right:5px; margin-top:5px;">
								<a href="<?=$urlfri?>"><img src="avatar/<?=$rowu['Image']?>" width="35" height="35" alt="<?=$row['username']?>" class="img-circle" data-lock-picture="avatar/<?=$row['Image']?>" /></a>
							</figure>


              												<p class="text-muted mb-none"><i class="fa fa-clock-o"></i>  <?=$my_format?>. 
																

															</p>
															

															<p><a href="<?=$urlfri?>"><b><?=$rowu['First_Name']?> <?=$rowu['Last_Name']?></b> </a>: <?=$row3['posttext']?><br>

																<?php
																if($row3['postimage'] != "")
																{
																	?>


																

															<div class="thumbnail-gallery">
																<a class="img-thumbnail "  data-plugin-options="{ &quot;type&quot;:&quot;image&quot; }">
																	<img class="img-responsive" src="images/<?=$row3['postimage']?>">
																	<span class="zoom">
																		<i class="fa fa-search"></i>
																	</span>
																</a>
															</div>



																
															<?php	}   ?>
															</p>
														</div>
													</li>
													<?php } ?>
													
												</ol>
											</div>
										</div>
									</div>
									

								</div>
							</div>
						</div>
						<div class="col-md-12 col-lg-3">

							<h4 class="mb-md">Stats</h4>
							<ul class="simple-card-list mb-xlg">
								<li class="primary">

<?php
$sqlz="SELECT COUNT(*) FROM customer WHERE member_id = $id ";
$resultz=mysql_query($sqlz)or die(mysql_error());
$rowz=mysql_fetch_array($resultz);
$numz=$rowz['COUNT(*)'];
$numAllz=$numz;


?>

									<h3><?=$numAllz?></h3>
									<p>Total Customer. <a href="customer_guest-<?=$id?>" style="color:#fff"> &nbsp&nbsp&nbsp<i class="fa fa-search"></i> (view all)</a></p>
								</li>
								
								
							</ul>

							

							
							
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
											$sql1="SELECT * FROM user WHERE id != $id  ORDER BY id ASC LIMIT 0, 8";
											$result1=mysql_query($sql1)or die(mysql_error());
											for($i=0;$row2=mysql_fetch_assoc($result1);$i++){ 
											?>

									<li class="status-<?=$row2['status']?>">
										<figure class="profile-picture">
											<a href="friends.php?id=<?=$row2['id']?>"><img src="avatar/<?=$row2['Image']?>" alt="<?=$row2['username']?>" style="width:35px; height:35px;" class="img-circle"></a>
										</figure>
										<div class="profile-info">
											<span class="name"><a href="friends.php?id=<?=$row2['id']?>"><?=$row2['First_Name']?> <?=$row2['Last_Name']?></a></span>
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






<ul class="pagination ">
  <?php
    if($page>0){
  ?>
  <li class="disabled"><a>&lt; Previous</a></li>
  
  <?php 
  }  
  for($i=0;$i<$num_page;$i++){ 
    if($i==$page){
  ?>
  
  <li><a href="friendtimeline-<?=$id."-".($i+1)."-".$meid?>.html"><?=$i+1?></a></li>


<?php  
} 
  else{ 
?>
<li class="disabled"><a><?=$i+1?></a></li>
<?php   
  }
}

if($page<$num_page-1){
?>
  <li class="next"><a href="friendtimeline-<?=$id."-".($page+2)."-".$meid?>.html" rel="next">Next &gt;</a></li>
  <?php 
} 
?>
</ul>

		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>		
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>		
		<script src="assets/vendor/jquery-cookie/jquery.cookie.js"></script>		
			
			<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>		
			<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>		
			<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>	
				<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>	
					<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>


					<script src="assets/vendor/jquery-autosize/jquery.autosize.js"></script>
		
		<!-- Specific Page Vendor -->		<script src="assets/vendor/jquery-validation/jquery.validate.js"></script>
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
<script type="text/javascript" src="lib/jquery.infinitescroll.min.js"></script>
<script>
$(function(){
    var $container = $('#post-items');
 
    $container.infinitescroll({
      navSelector  : '.next',    // selector for the paged navigation 
      nextSelector : '.next a',  // selector for the NEXT link (to page 2)
      itemSelector : '.post-item',     // selector for all items you'll retrieve
      debug        : true,
      dataType     : 'html',
      loading: {
          finishedMsg: '',
          img: 'images/spinner.gif'
        }
      }
    );
  });</script>  


		<script type="text/javascript">
		$(":file").filestyle({input: false});

		$('.dropdown-toggle').dropdown()
		</script>


	</body>
</html>