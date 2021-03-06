<?php
session_start();
?>
<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

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

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme.css" />
		<link rel="stylesheet" href="assets/style.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.js"></script>
	</head>
	<body>
		<!-- start: page -->
		<section class="body-sign body-locked">
			<div class="center-sign">
				<div class="panel panel-sign">
					<div class="panel-body">
						<form id="unlockform" accept-charset="UTF-8"  method="post" role="form" autocomplete="off">
							<div class="current-user text-center">
								<img src="assets/images/!logged-user.jpg" alt="John Doe" class="img-circle user-image" />
								<h2 class="user-name text-dark m-none" style="color: #171717 !important;">John Doe</h2>
								<p class="user-email m-none">johndoe@okler.com</p>
							</div>
							<div class="form-group mb-lg">
								<div class="input-group input-group-icon">
									<input name="username" type="text" value="<?=$username?>" class="form-control input-lg" style="display:none" />
									<input type="password" name="pwd" autocomplete="off" class="form-control input-lg" placeholder="Password" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-6">
									<p class="mt-xs mb-none">
										<a href="#">Not John Doe?</a>
									</p>
								</div>
								<div class="col-xs-6 text-right">
									<button type="submit" class="btn btn-primary">Unlock</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
		<!-- end: page -->

		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>		
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>		
		<script src="assets/vendor/jquery-cookie/jquery.cookie.js"></script>		
				
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>
		<!-- Analytics to Track Preview Website -->		



		<script type="text/javascript">

		   $('form#unlockform').on('submit',function(e){
          e.preventDefault();         
          var username = $('form#unlockform input[name=username]').val();
          var pwd = $('form#unlockform input[name=pwd]').val();

          if(username && pwd){           
            $.ajax({
              type: "POST",
              async: true,
              url: "http://localhost/admin/server/lock.php",            
              data: "username="+username+"&pwd="+pwd,
              dataType: "json",
           success: function(json){
               if(json.status == 2001) {

           
           
             // Get the src of the image
    

    // Send Ajax request to backend.php, with src set as "img" in the POST data
   // $.post("storesession.php", {"img": data.names});
               
           
                
                 window.location = "Dashboard.php";
                } else {   
                  alert(data.msg);
                }               
              },
              failure: function(errMsg) {
                alert(errMsg.Msg);
              }             
            });
          }else{          
            $('.alertloginbox').modal({'show':true,'backdrop':'static'});
          }
        });

		</script>


		<?php
unset($_SESSION['ssUsername']);
		?>
	</body>
</html>