<?php
session_start();
include('admin/server/connect.php');

$sqlset="SELECT * FROM setting";
$resultset=mysql_query($sqlset)or die(mysql_error());
$rowset=mysql_fetch_assoc($resultset);





?>
<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?=$rowset['description']?>">
    <meta name="author" content="<?=$rowset['author']?>">
    <title>Search your Properties  | <?=$rowset['shop_name']?></title>
    
    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- CSS -->
    <link href="css/base.css" rel="stylesheet">
    
    <!-- Radio and check inputs -->
    <link href="css/skins/square/grey.css" rel="stylesheet">
    
    <!-- Google web fonts -->
   <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
   <link href='http://fonts.googleapis.com/css?family=Gochi+Hand' rel='stylesheet' type='text/css'>
   <link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
        
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
        
</head>
<body>

<!--[if lte IE 8]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p>
<![endif]-->

    <div id="preloader">
        <div class="sk-spinner sk-spinner-wave">
            <div class="sk-rect1"></div>
            <div class="sk-rect2"></div>
            <div class="sk-rect3"></div>
            <div class="sk-rect4"></div>
            <div class="sk-rect5"></div>
        </div>
    </div>
    <!-- End Preload -->

    <div class="layer"></div>
    <!-- Mobile menu overlay mask -->

    <!-- Header================================================== -->
    <style type="text/css">
     ul#top_links1 {
    list-style: none;
    margin: 0;
    padding: 0;
    float: right;
}
     #head_footer ul li {
    display: inline-block;
    margin: -5px 5px 10px 0px;
}
     #head_footer ul li a {
    color: #fff;
    text-align: center;
    line-height: 28px;
    display: block;
    font-size: 16px;
    width: 28px;
    height: 28px;
    border: 1px solid rgba(255,255,255,0.3);
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
}

#head_footer ul li a:hover{border:1px solid #fff;background:#fff;color:#111}

 .main_title h2{
    font: normal normal normal 37px / 43px "Open Sans", Helvetica, Arial, Verdana, sans-serif;
}
     </style>
    <?php 
    include('header.php');
    ?>

    
<section id="search_container">
    <div id="search">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tours" data-toggle="tab">Rent</a></li>
                        <li><a href="#hotels" data-toggle="tab">BTS</a></li>
                        <li><a href="#transfers" data-toggle="tab">MRT</a></li>
                    </ul>
                    
                    <div class="tab-content">
                        <div class="tab-pane active" id="tours">
                        <h3 style="color:#fff">Search <span>Properties</span></h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">



        <div class="typeahead-container">
            <div class="typeahead-field">

            <span class="typeahead-query">
                <input type="text" class="form-control" id="q" type="search"   name="firstname_booking" placeholder="Enter Location">
            </span>
            

            </div>
        </div>






                                     </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                   
                                        <select class="form-control" name="category">
                                            <option value="0" >All Types</option>
                                            <option value="Condo">Condo</option>
                                            <option value="House" >House</option>
                                            <option value="Townhouse" >Townhouse</option>
                                            <option value="Land" >Land</option>
                                        </select>
                                    </div>
                                </div>



                                <div class="col-md-3">
                                    <div class="form-group">
                                   
                                        <select class="form-control" name="category">
                                            <option value="0" >Rent or Buy</option>
                                            <option value="Condo">Rent</option>
                                            <option value="House" >Buy</option>
                                  
                                        </select>
                                    </div>
                                </div>



                               







                            </div><!-- End row -->
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                   
                                       
            <select name="min_price" class="form-control" >

            <option value="" selected>No Min Price</option>

            
                <option value="1000000">฿1,000,000</option>

            
                <option value="2000000">฿2,000,000</option>

            
                <option value="3000000">฿3,000,000</option>

            
                <option value="4000000">฿4,000,000</option>

            
                <option value="5000000">฿5,000,000</option>

            
                <option value="6000000">฿6,000,000</option>

            
                <option value="7000000">฿7,000,000</option>

            
                <option value="8000000">฿8,000,000</option>

            
                <option value="9000000">฿9,000,000</option>

            
                <option value="10000000">฿10,000,000</option>

            
                <option value="12500000">฿12,500,000</option>

            
                <option value="15000000">฿15,000,000</option>

            
                <option value="20000000">฿20,000,000</option>

            
                <option value="30000000">฿30,000,000</option>

            
                <option value="40000000">฿40,000,000</option>

            
        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                    
                                        <select name="max_price" class="form-control">

            <option value="">No Max Price</option>
            
                
                <option value="2000000">฿2,000,000</option>

            
                
                <option value="3000000">฿3,000,000</option>

            
                
                <option value="4000000">฿4,000,000</option>

            
                
                <option value="5000000">฿5,000,000</option>

            
                
                <option value="6000000">฿6,000,000</option>

            
                
                <option value="7000000">฿7,000,000</option>

            
                
                <option value="8000000">฿8,000,000</option>

            
                
                <option value="9000000">฿9,000,000</option>

            
                
                <option value="10000000">฿10,000,000</option>

            
                
                <option value="12500000">฿12,500,000</option>

            
                
                <option value="15000000">฿15,000,000</option>

            
                
                <option value="20000000">฿20,000,000</option>

            
                
                <option value="30000000">฿30,000,000</option>

            
                
                <option value="40000000">฿40,000,000</option>

            
                
                <option value="50000000">฿50,000,000</option>

            
        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group">
                              
                                        <select name="min_beds" class="form-control" data-placeholder="All">

                <option value="">No Min Bed</option>
                <option value="0">Studio</option>

                
                    <option value="1">1 Bedrooms</option>

                
                    <option value="2">2 Bedrooms</option>

                
                    <option value="3">3 Bedrooms</option>

                
                    <option value="4">4 Bedrooms</option>

                
                    <option value="5">5 Bedrooms</option>

                
            </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group">
                             
                                        <select name="max_beds" class="form-control" data-placeholder="All">

                <option value="">No Max Bed</option>
                <option value="0">Studio</option>

                
                    <option value="1">1 Bedrooms</option>

                
                    <option value="2">2 Bedrooms</option>

                
                    <option value="3">3 Bedrooms</option>

                
                    <option value="4">4 Bedrooms</option>

                
                    <option value="5">5 Bedrooms</option>

                
                <option value="999">6+</option>

            </select>
                                    </div>
                                </div>
                                
                            </div><!-- End row -->
                            <hr>
                            <button class="btn_1 green"><i class="icon-search"></i>Search now</button>
                            <div style="height:27px;">&nbsp</div>
                        </div><!-- End rab -->
                        <div class="tab-pane" id="hotels">
                       
                        <h3 style="color:#fff">Search <span style="color:#8DC63F; font-size:18px;">BTS Station<span></h3>
                            <div class="row">
                                <div class="col-md-12">
                                <!--    <img src="img/tp-map-bts-en-01.png" class="img-responsive"> -->
                                    <ul id="map-bts-en">
        <li class="vtip vtiptop" title="BTS Mo Chit"><a href="#"></a></li>
        <li class="vtip vtiptop" title="BTS Saphan Khwai"><a href="#"></a></li>
        <li class="vtip vtiptop" title="BTS Ari"><a href="#"></a></li>
        <li class="vtip vtiptop" title="BTS Sanam Pao"><a href="#"></a></li>
        <li class="vtip vtiptop" title="BTS Victory Monument"><a href="#"></a></li>
        <li class="vtip vtiptop" title="BTS Phaya Thai"><a href="#"></a></li>
        <li class="vtip vtiptop" title="BTS Ratchathewi"><a href="#"></a></li>
        <li class="vtip siam vtiptop" title="BTS Siam"><a href="#"></a></li>
        <li class="vtip vtiptop" title="BTS Chit Lom"><a href="#"></a></li>
        <li class="vtip vtiptop" title="BTS Ploen Chit"><a href="#"></a></li>
        <li class="vtip vtiptop" title="BTS Nana"><a href="#"></a></li>
        <li class="vtip vtiptop" title="BTS Asoke"><a href="#"></a></li>
        <li class="vtip vtiptop" title="BTS Phrom Phong"><a href="#"></a></li>
        <li class="vtip vtiptop" title="BTS Thong Lo"><a href="#"></a></li>
        <li class="vtip vtiptop" title="BTS Ekkamai"><a href="#"></a></li>
        <li class="vtip vtiptop" title="BTS Phra Khanong"><a href="#"></a></li>
        <li class="vtip vtiptop" title="BTS On Nut"><a href="#"></a></li>
        <li class="vtip vtiptop" title="BTS Bang Chak"><a href="#"></a></li>
        <li class="vtip vtiptop" title="BTS Punnawithi"><a href="#"></a></li>
        <li class="vtip vtiptop" title="BTS Udom Suk"><a href="#"></a></li>
        <li class="vtip vtiptop" title="BTS Bang Na"><a href="#"></a></li>
        <li class="vtip vtiptop" title="BTS Bearing"><a href="#"></a></li>
        <li class="vtip" title="BTS National Stadium"><a href="#"></a></li>
        <li class="vtip" title="BTS Ratchadamri"><a href="#"></a></li>
        <li class="vtip" title="BTS Sala Daeng"><a href="#"></a></li>
        <li class="vtip" title="BTS Chong Nonsi"><a href="#"></a></li>
        <li class="vtip" title="BTS Surasak"><a href="#"></a></li>
        <li class="vtip" title="BTS Saphan Taksin"><a href="#"></a></li>
        <li class="vtip" title="BTS Krung Thon Buri"><a href="#"></a></li>
        <li class="vtip" title="BTS Wongwian Yai"><a href="#"></a></li>
        <li class="vtip" title="BTS Pho Nimit"><a href="#"></a></li>
        <li class="vtip" title="BTS Talat Phlu"><a href="#"></a></li>
        <li class="vtip" title="BTS Wutthakat"><a href="#"></a></li>
        <li class="vtip" title="BTS Bang Wa"><a href="#"></a></li>
    </ul>
                                </div>
                            </div><!-- End row -->
                            
                        </div>
                        <div class="tab-pane" id="transfers">
                        
                        <h3 style="color:#fff">Search <span style="color:#8DC63F; font-size:18px;">MRT Station<span></h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <ul id="map-mrt-en">
        <li class="vtip vtiptop" title="MRT Bang Sue"><a href="#"></a></li>
        <li class="vtip vtiptop" title="MRT Kamphaeng Phet"><a href="#"></a></li>
        <li class="vtip vtiptop" title="MRT Chatuchak Park"><a href="#"></a></li>
        <li class="vtip vtiptop" title="MRT Phahon Yothin"><a href="#"></a></li>
        <li class="vtip vtiptop" title="MRT Lat Phrao"><a href="#"></a></li>
        <li class="vtip vtiptop" title="MRT Ratchadaphisek"><a href="#"></a></li>
        <li class="vtip vtiptop" title="MRT Sutthisan"><a href="#"></a></li>
        <li class="vtip vtiptop" title="MRT Huai Khwang"><a href="#"></a></li>
        <li class="vtip vtiptop" title="MRT Thailand Cultural Centre"><a href="#"></a></li>
        <li class="vtip vtiptop" title="MRT Phra ram 9"><a href="#"></a></li>
        <li class="vtip vtiptop" title="MRT Phetchaburi"><a href="#"></a></li>
        <li class="vtip vtiptop" title="MRT Sukhumvit"><a href="#"></a></li>
        <li class="vtip vtiptop" title="MRT Queen Sirikit"><a href="#"></a></li>
        <li class="vtip vtiptop" title="MRT Khlong Toei"><a href="#"></a></li>
        <li class="vtip vtiptop" title="MRT Lumphini"><a href="#"></a></li>
        <li class="vtip vtiptop" title="MRT Silom"><a href="#"></a></li>
        <li class="vtip vtiptop" title="MRT Sam Yan"><a href="#"></a></li>
        <li class="vtip vtiptop" title="MRT Hua Lamphong"><a href="#"></a></li>
    </ul>
                                </div>
                            
                            </div><!-- End row -->
                 
                        </div>
                    </div>
    </div>
</section><!-- End hero -->

<div id="position">
        <div class="container">
                    <ul>
                    <li><a href="http://www.teeneejj.com">Home</a></li>
                    <li><a href="property-<?=$category_id?>-1-<?=$type?>">Category</a></li>
                    <li><?=$rowShowCategory['name']?></li>
                    </ul>
        </div>
    </div><!-- Position -->
    
<div class="collapse" id="collapseMap">
    <div id="map" class="map">
        
    </div>
</div><!-- End Map -->

<div  class="container margin_60">
            
        <div class="row">
                <aside class="col-lg-3 col-md-3">
            <p>
                <a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap">View on map</a>
            </p>
   
        <div id="filters_col">
            <div class="widget">
                    <form name="search" method="post" action="search" >
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Search name propety...">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="submit" style="margin-left:0;"><i class="icon-search"></i></button>
                        </span>
                    </div><!-- /input-group -->
                </form> 
                </div>
                  <br>

            <a data-toggle="collapse" href="#collapseFilters" aria-expanded="true" aria-controls="collapseFilters" id="filters_col_bt"><i class="icon_set_1_icon-65"></i>Filters <i class="icon-plus-1 pull-right"></i></a>
            <div class="collapse" id="collapseFilters">
                
                    
                <div class="filter_type">
                    <h6>Top Review Projects</h6>
                    <ul >
<?php
$sql="SELECT * FROM product  ORDER BY view DESC LIMIT 8 ";
$result4=mysql_query($sql)or die(mysql_error());
for($i=0;$row4=mysql_fetch_assoc($result4);$i++){

?>  
                        <li style="margin-top:10px; "><label><a href="asset-<?=$row4['id']?>" title="<?=$row4['name']?>"><i class="icon-home-outline"></i> <?=$row4['name']?></a></label></li>
<?php
}
?>
</ul>
                </div>
            
            </div><!--End collapse -->
        </div><!--End filters col-->
        <div class="box_style_4">
        <i class="icon_set_1_icon-57"></i>
        <h4>Need <span>Help?</span></h4>
        <a href="tel://<?=$rowset['tel']?>" class="phone"><?=$rowset['tel']?></a>
        <small>Monday to Friday 9.00am - 7.30pm</small>
    </div>
        </aside><!--End aside -->
        
        <div class="col-lg-9 col-md-9">
            
         

<h2 style="margin-top: 0px;">"Keyword : <span>Top</span> "</h2>



<div class="post-items" id="post-items">




</div>
                <hr>
                














              
        </div><!-- End col lg-9 -->
    </div><!-- End row -->
</div><!-- End container -->
    
<?php 
    include('footer.php');
    ?>

<div id="toTop"></div><!-- Back to top button -->

<!-- Common scripts -->
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/common_scripts_min.js"></script>
<script src="js/functions.js"></script>

<!-- Specific scripts -->
<!-- Check and radio inputs -->
<script src="js/icheck.js"></script>
<script>  
$('input').iCheck({
   checkboxClass: 'icheckbox_square-grey',
   radioClass: 'iradio_square-grey'
 });
 </script>








 <!-- Map -->
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script type="text/javascript">


$(document).ready(function(){
    $.ajax({
        url: 'admin/server/getDataCustomer2.php', // getchart.php
        dataType: 'JSON',
        type: 'POST',
       // dataType: 'jsonp',
        data: {
            id: "<?=$category_id?>",
              },
        success: function(response) {


$('#collapseMap').on('shown.bs.collapse', function(e){
    (function(A) {

    if (!Array.prototype.forEach)
        A.forEach = A.forEach || function(action, that) {
            for (var i = 0, l = this.length; i < l; i++)
                if (i in this)
                    action.call(that, this[i], i, this);
            };

        })(Array.prototype);

        var
        mapObject,
        markers = [],
        markersData = response;

            var mapOptions = {
                zoom: 13,
                center: new google.maps.LatLng(13.7211075, 100.6028469),
                mapTypeId: google.maps.MapTypeId.ROADMAP,

                mapTypeControl: false,
                mapTypeControlOptions: {
                    style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
                    position: google.maps.ControlPosition.LEFT_CENTER
                },
                panControl: false,
                panControlOptions: {
                    position: google.maps.ControlPosition.TOP_RIGHT
                },
                zoomControl: true,
                zoomControlOptions: {
                    style: google.maps.ZoomControlStyle.LARGE,
                    position: google.maps.ControlPosition.TOP_RIGHT
                },
                scrollwheel: false,
                scaleControl: false,
                scaleControlOptions: {
                    position: google.maps.ControlPosition.TOP_LEFT
                },
                streetViewControl: true,
                streetViewControlOptions: {
                    position: google.maps.ControlPosition.LEFT_TOP
                },
                styles: [/*map styles*/]
            };
            var
            marker;
            mapObject = new google.maps.Map(document.getElementById('map'), mapOptions);
            for (var key in response)
                response[key].forEach(function (response) {
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(response.location_latitude, response.location_longitude),
                        map: mapObject,
                        icon: 'img/Churches.png',
                    });

                    if ('undefined' === typeof markers[key])
                        markers[key] = [];
                    markers[key].push(marker);
                    google.maps.event.addListener(marker, 'click', (function () {
      closeInfoBox();
      getInfoBox(response).open(mapObject, this);
      mapObject.setCenter(new google.maps.LatLng(response.location_latitude, response.location_longitude));
     }));

                    
                });
    

        function hideAllMarkers () {
            for (var key in markers)
                markers[key].forEach(function (marker) {
                    marker.setMap(null);
                });
        };

        function closeInfoBox() {
            $('div.infoBox').remove();
        };

        function getInfoBox(item) {
            return new InfoBox({
                content:
                '<div class="marker_info" id="marker_info">' +
                '<img src="' + item.map_image_url + '" style="width:280px;"/>' +
                '<h3>'+ item.name_point +'</h3>' +
                '<span>'+ item.description_point +'</span>' +
                '<a href="'+ item.url_point + '" class="btn_1">Details</a>' +
                '</div>',
                disableAutoPan: true,
                maxWidth: 0,
                pixelOffset: new google.maps.Size(40, -190),
                closeBoxMargin: '5px -20px 2px 2px',
                closeBoxURL: "http://www.google.com/intl/en_us/mapfiles/close.gif",
                isHidden: false,
                pane: 'floatPane',
                enableEventPropagation: true
            });


        };

    });



}
    });

});

</script>
<script src="js/infobox.js"></script>


<script type="text/javascript">




$(document).ready(function(){
    $.ajax({
        url: 'admin/server/getDataCustomer4.php', // getchart.php
        dataType: 'JSON',
        type: 'POST',
       // dataType: 'jsonp',
        
        success: function(response) {



        var data = response;
       



        $('#q').typeahead({
            minLength: 1,
            order: "asc",
            group: true,
            groupMaxItem: 6,
            hint: true,
            dropdownFilter: "All",
            href: "https://en.wikipedia.org/?title={{display}}",
            template: "{{display}}, <small><em>{{group}}</em></small>",
            source: {
                location: {
                    data: data.location
                },
               
            },
           
         
        });


 }
    });

});



</script>


</body>
</html>