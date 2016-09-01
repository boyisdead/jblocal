<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/backProcess.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>
<body>
<?php
//เช็คล็อกอิน
if(isset($_SESSION['ssUsername'])){$username=$_SESSION['ssUsername'];}
else if(!isset($_SESSION['ssUsername'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}
?>
<?php
//รับค่า










/////ชื่อลูกค้า = cusID int
$id=$_REQUEST['cusID'];
$meid=$_REQUEST['meid'];



////////////////////////ชื่อสินค้า = product cha
$product=$_REQUEST['product'];
if($product==""){$product="ไม่ระบุ";}

//////////////ชื่อบริษัท = company cha
$company=$_REQUEST['company'];
if($company==""){$company="ไม่ระบุ";}


////////////////////หมายเลขกรมธรรม์ = policy_no cha
$policy_no=$_REQUEST['policy_no'];
if($policy_no==""){$policy_no="policy_no";}


///////////จำนวนเบี้ยลงทุน = money_to_m int
$money_to_m=$_REQUEST['money_to_m'];
if($money_to_m==""){$money_to_m=0;}


///////////สกุลเงินที่ลงทุน = currency cha
$currency=$_REQUEST['currency'];
if($currency==""){$currency="ไม่ระบุ";}


/////////////////จำนวนเบี้ยเริ่มต้น (บาท) = first_money int
$first_money=$_REQUEST['first_money'];
if($first_money==""){$first_money=0;}


///////////จำนวนเบี้ยที่จ่ายล่าสุด (บาท) = last_money_to_m int
$last_money_to_m=$_REQUEST['last_money_to_m'];
if($last_money_to_m==""){$last_money_to_m=0;}


////////////จำนวนปีที่จ่ายเบี้ย(ปี) = count_year int
$count_year=$_REQUEST['count_year'];
if($count_year==""){$count_year=0;}



//////////จำนวนปีที่ทำสัญญา(ปี) =  all_year int
$all_year=$_REQUEST['all_year'];
if($all_year==""){$all_year=0;}


/////////////วันที่เริ่มทำสัญญา = date_for_start date
$date_for_start=$_REQUEST['date_for_start'];
if($date_for_start==""){$date_for_start="0000-00-00";}


////////////////วันที่ครบสัญญา = endl_date_service date
$endl_date_service=$_REQUEST['endl_date_service'];
if($endl_date_service==""){$endl_date_service="0000-00-00";}

///////////////วันที่ดิวเบี้ย = pay_date date
$pay_date=$_REQUEST['pay_date'];
if($pay_date==""){$pay_date="0000-00-00";}



///////วันที่จ่ายเบี้ยล่าสุด = last_money date
$last_money=$_REQUEST['last_money'];
if($last_money==""){$last_money="0000-00-00";}


///////////////รายละเอียดการจ่ายเบี้ย = detail_for_bear cha
$detail_for_bear=$_REQUEST['detail_for_bear'];
if($detail_for_bear==""){$detail_for_bear="ไม่ระบุ";}


//////////จำนวนปีที่จ่ายเบี้ย = some_year int
$some_year=$_REQUEST['some_year'];
if($some_year==""){$some_year=0;}



/////รายละเอียดการรับเงิน = detail_for_recive cha
$detail_for_recive=$_REQUEST['detail_for_recive'];
if($detail_for_recive==""){$detail_for_recive="ไม่ระบุ";}

////////จำนวนเงินที่ได้รับคืนต่อปี = money_reverse int
$money_reverse=$_REQUEST['money_reverse'];
if($money_reverse==""){$money_reverse=0;}


//////อายุเริ่มรับเงินคืน = old_resverse int
$old_resverse=$_REQUEST['old_resverse'];
if($old_resverse==""){$old_resverse=0;}



/////////จำนวนทุนประกัน = total_money_reverse int
$total_money_reverse=$_REQUEST['total_money_reverse'];
if($total_money_reverse==""){$total_money_reverse=0;}


/////ชื่อผูรั้บผลประโยชน์ = name_recive cha
$name_recive=$_REQUEST['name_recive'];
if($name_recive==""){$name_recive="ไม่ระบุ";}



/////////////Broker Login Name = pa_grandtag_name
///////////Broker Password = pa_gandtag_pwd
$pa_grandtag_name=$_REQUEST['pa_grandtag_name'];
if($pa_grandtag_name==""){$pa_grandtag_name="ไม่ระบุ";}

$pa_gandtag_pwd=$_REQUEST['pa_gandtag_pwd'];
if($pa_gandtag_pwd==""){$pa_gandtag_pwd="ไม่ระบุ";}






/////Website Product = bank_acc
$bank_acc=$_REQUEST['bank_acc'];
if($bank_acc==""){$bank_acc="ไม่ระบุ";}




///////////////////Product Login = login_name
//////////////Product Password = login_pwd
$login_name=$_REQUEST['login_name'];
if($login_name==""){$login_name="ไม่ระบุ";}

$login_pwd=$_REQUEST['login_pwd'];
if($login_pwd==""){$login_pwd="ไม่ระบุ";}



/////หมายเหตุ = remark
$remark=$_REQUEST['remark'];
if($remark==""){$remark="ไม่ระบุ";}

///////////////////////////////////////////////////////////////////////////////
//เชื่อมต่อฐานข้อมูล
include('connect.php');

//ถ้าไม่แก้ไขรูปภาพ

  //อัพเดทข้อมูล
  $sql="INSERT INTO product_aboard(money_to_m, endl_date_service, detail_for_bear, product, policy_no, first_money, company, pa_type, pa_grandtag_name, pa_gandtag_pwd, pa_login_name, pa_login_pwd, pa_policy_date, pa_pay_date, pa_count_year, pa_all_year, pa_currency, pa_amount_per_year, pa_money_pay, pa_how_to_pay, last_money, pa_money_reverse, pa_old_resverse, pa_bank_acc, pa_name_recive, pa_remark, customer_id, member_id, insert_date, last_update) 
  VALUES($money_to_m, '$endl_date_service', \"$detail_for_bear\", \"$product\", \"$policy_no\", $first_money, \"$company\", $last_money_to_m, \"$pa_grandtag_name\", \"$pa_gandtag_pwd\", \"$login_name\", \"$login_pwd\", '$date_for_start', '$pay_date', $count_year, $all_year, \"$currency\", $some_year, $money_reverse, \"$detail_for_recive\", '$last_money', $total_money_reverse, $old_resverse, \"$bank_acc\", \"$name_recive\", \"$remark\", $id, $meid, now(), now())";
mysql_query($sql)or die(mysql_error());
//คืนค่าไอดี
$product_id=mysql_insert_id();







  
  echo"<script>window.location='../cus_product_service-$id-$product_id';</script>";exit;
















?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>