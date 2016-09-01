<?php
session_start();



$currency=$_REQUEST['currency'];


//include("lib/nusoap.php");
switch ($currency) {
    case "SGD":


$json_string = "http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.xchange%20where%20pair%3D%22SGDTHB%22&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";

$jsondata = file_get_contents($json_string);
$obj = json_decode($jsondata, true);
$_SESSION['currency'] = $obj['query']['results']['rate']['Rate'];
$_SESSION['currency1'] = $currency;

 break;
 case "USD":
          
$json_string = "http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.xchange%20where%20pair%3D%22USDTHB%22&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";

$jsondata = file_get_contents($json_string);
$obj = json_decode($jsondata, true);
$_SESSION['currency'] = $obj['query']['results']['rate']['Rate'];
$_SESSION['currency1'] = $currency;

        break; 
        case "MYR":
          
$json_string = "http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.xchange%20where%20pair%3D%22MYRTHB%22&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";

$jsondata = file_get_contents($json_string);
$obj = json_decode($jsondata, true);
$_SESSION['currency'] = $obj['query']['results']['rate']['Rate'];
$_SESSION['currency1'] = $currency;

        break; 
        case "VND":
          
$json_string = "http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.xchange%20where%20pair%3D%22VNDTHB%22&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";

$jsondata = file_get_contents($json_string);
$obj = json_decode($jsondata, true);
$_SESSION['currency'] = $obj['query']['results']['rate']['Rate'];
$_SESSION['currency1'] = $currency;

        break; 
        case "PHP":
          
$json_string = "http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.xchange%20where%20pair%3D%22PHPTHB%22&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";

$jsondata = file_get_contents($json_string);
$obj = json_decode($jsondata, true);
$_SESSION['currency'] = $obj['query']['results']['rate']['Rate'];
$_SESSION['currency1'] = $currency;

        break;
        case "IDR":
          
$json_string = "http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.xchange%20where%20pair%3D%22IDRTHB%22&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";

$jsondata = file_get_contents($json_string);
$obj = json_decode($jsondata, true);
$_SESSION['currency'] = $obj['query']['results']['rate']['Rate'];
$_SESSION['currency1'] = $currency;

        break; 
        case "THB":

$_SESSION['currency'] = 1;
$_SESSION['currency1'] = "THB";



       

$_SESSION['currency'] = NULL;
$_SESSION['currency1'] = NULL;

unset($_SESSION['currency']);
unset($_SESSION['currency1']);

$_SESSION['currency'] = "";

        break;         
    default:


echo"<script>document.location=document.referrer;</script>";

}




echo"<script>document.location=document.referrer;</script>";

?>