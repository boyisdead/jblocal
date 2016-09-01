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
<!-- InstanceBeginEditable name="EditRegion" -->
<?php
// รับค่า
if($_REQUEST['Title']==""){echo"<script>alert('Please insert title name');history.back();</script>";exit;}

if($_REQUEST['Department']==""){echo"<script>alert('Please select Department');history.back();</script>";exit;}

$Department=$_REQUEST['Department'];

$meid=$_REQUEST['meid'];

$status=$_REQUEST['status'];
if($status==""){$status=0;}


$status2=$_REQUEST['status2'];
if($status2==""){$status2=0;}


$job_leval=$_REQUEST['job_leval'];
if($job_leval==""){$job_leval=0;}



$Title=$_REQUEST['Title'];


$Address = mysql_escape_string($_REQUEST['Address']);
if($Address==""){$Address="-";}

$Description = mysql_escape_string($_REQUEST['Description']);
if($Description==""){$Description="-";}

$Country=$_REQUEST['Country'];
if($Country==""){$Country="-";}

$City=$_REQUEST['City'];
if($City==""){$City="-";}

$Min_Salary=$_REQUEST['Min_Salary'];
if($Min_Salary==""){$Min_Salary=0;}

$Max_Salary=$_REQUEST['Max_Salary'];
if($Max_Salary==""){$Max_Salary=0;}

$Bonus=$_REQUEST['Bonus'];
if($Bonus==""){$Bonus=0;}



switch ($Department) {
    case "1":
    $ran = array("it-icon.png","it-solutions-icon.png","programming_icon.png","software.png");
    $randomElement = $ran[array_rand($ran, 1)];
      
        break;
    case "2":
    $ran = array("icon_ibm_document.png","icons_circle_TRAININGlink.png","nova-labs_icon_800x800.png","official-digital-marketing-strategy-icon.png.png","operations-icon-large.png","service-icon-inbound.png","work-icon-connected.png");
    $randomElement = $ran[array_rand($ran, 1)];
        break;
    case "4":
       $ran = array("2014-seo-icon.png","email-marketing-icon.png","icon-marketing.png","LaunchMarketing-Icon.png","marketing-icon-lg.png","traditional-marketing-icon.png");
    $randomElement = $ran[array_rand($ran, 1)];
        break;
    case "5":
     $ran = array("cash_finance_flat_icon_symbol.png","contact-center-finance-icon.png","dollar-collection-icon.png","dollar-icon.png","dollar-rotation-icon.png");
    $randomElement = $ran[array_rand($ran, 1)];
        break; 
        case "6":
     $ran = array("about.png","hr.png","hrman_iconresized600.png","Human-Resources.jpg","join-renew-icon-2x.png","people.png");
    $randomElement = $ran[array_rand($ran, 1)];
        break;
        case "7":
     $ran = array("boost.png","facility-management.png","icon_productivity.png","icon175x175.png","loggly_icon_search.png","operations-management-icon.png");
    $randomElement = $ran[array_rand($ran, 1)];
        break; 
       case "8":
     $ran = array("financial-icon.png","traffic-analytics-icon.png");
    $randomElement = $ran[array_rand($ran, 1)];
        break; 
        case "9":
     $ran = array("business-logistics-icon.png","e2.png","TruckIcon.jpg");
    $randomElement = $ran[array_rand($ran, 1)];
        break;
        case "15":
     $ran = array("engineering_icon.png","icon-sustainable-engineering.png","operational-analytics-icon.png","r_engineering_icon.png","telicom.png");
    $randomElement = $ran[array_rand($ran, 1)];
        break;       
    default:
        $ran = array("Accounting-Icon.png","Accounts-Icon.png","analysis-blue-large-icon-2x.png","calculator_nam_eng.png","Finance_Icon_V1.png");
    $randomElement = $ran[array_rand($ran, 1)];
}



//เปลี่ยนชื่อภาพ


include("../../server/connect.php");


if($_FILES['Job_Description']['name']!=""){

$image=time().'-'.$_FILES['Job_Description']['name'];
//เพิ่มข้อมูลสินค้า
$sql="INSERT INTO job_post(title, department, country, city, address, description, salary, max_salary, user_id, status, status2, file_name, refer_bonus, icon, job_level, insert_date, last_update) 
VALUES(\"$Title\",  $Department, \"$Country\", \"$City\", \"$Address\", \"$Description\", $Min_Salary, $Max_Salary, $meid, $status, $status2, '$image', $Bonus, '$randomElement', $job_leval, now(), now())";
mysql_query($sql)or die(mysql_error());
//คืนค่าไอดี
$product_id=mysql_insert_id();
//เพิ่มภาพหลัก



if(move_uploaded_file($_FILES['Job_Description']['tmp_name'],"../../pdf/".$image)){
  $error="";
}
//ถ้าอัพโหลดไม่ได้
else {
  $error="alert('เกิดการผิดพลาดในการอัพโหลดไฟล์ภาพ กรุณาทำการอัพโหลดใหม่')";
}

//กลับ
$id=base64_encode($product_id);
echo"<script>$error;window.location='../../edit_job.php?id=$id';</script>";
}




if($_FILES['Job_Description']['name']==""){


//เพิ่มข้อมูลสินค้า
$sql="INSERT INTO job_post(title, department, country, city, address, description, salary, max_salary, user_id, status, status2, refer_bonus, icon, job_level, insert_date, last_update) 
VALUES(\"$Title\",  $Department, \"$Country\", \"$City\", \"$Address\", \"$Description\", $Min_Salary, $Max_Salary, $meid, $status, $status2, $Bonus, '$randomElement', $job_leval, now(), now())";
mysql_query($sql)or die(mysql_error());
//คืนค่าไอดี
$product_id=mysql_insert_id();
//เพิ่มภาพหลัก


//กลับ
$id=base64_encode($product_id);
echo"<script>$error;window.location='../../edit_job.php?id=$id';</script>";
}




?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>