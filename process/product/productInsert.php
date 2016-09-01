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
if(isset($_SESSION['ssUsername2'])){$username=$_SESSION['ssUsername2'];}
    else if(!isset($_SESSION['ssUsername2'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}
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


$statustype=$_REQUEST['statustype'];
if($statustype==""){$statustype=0;}


$Title=$_REQUEST['Title'];

$Titletype=$_REQUEST['Titletype'];
if($Titletype==""){$Titletype="-";}

$linkedin=$_REQUEST['linkedin'];
if($linkedin==""){$linkedin="-";}

$company=$_REQUEST['company'];
if($company==""){$company="-";}

$Address = mysql_escape_string($_REQUEST['Address']);
if($Address==""){$Address="-";}

$Description = mysql_escape_string($_REQUEST['Description']);
if($Description==""){$Description="-";}

$summary = mysql_escape_string($_REQUEST['summary']);
if($summary==""){$summary="-";}

$Country=$_REQUEST['Country'];
if($Country==""){$Country="-";}

$nationalities=$_REQUEST['nationalities'];
if($nationalities==""){$nationalities="-";}


$City=$_REQUEST['City'];
if($City==""){$City="-";}

$Min_Salary=$_REQUEST['Min_Salary'];
if($Min_Salary==""){$Min_Salary=0;}

$Max_Salary=$_REQUEST['Max_Salary'];
if($Max_Salary==""){$Max_Salary=0;}

$Bonus=$_REQUEST['Bonus'];
if($Bonus==""){$Bonus=0;}

$currency=$_REQUEST['currency'];
if($currency==""){$currency="THB";}

$jobid=array(); 
$jobid=$_REQUEST['jobid'];



switch ($Department) {
    case "1":
    $ran = array("it-solutions-icon.png");
    $randomElement = $ran[array_rand($ran, 1)];
      
        break;
    case "2":
    $ran = array("icons_circle_TRAININGlink.png");
    $randomElement = $ran[array_rand($ran, 1)];
        break;
    case "4":
       $ran = array("icon-marketing.png");
    $randomElement = $ran[array_rand($ran, 1)];
        break;
    case "5":
     $ran = array("cash_finance_flat_icon_symbol.png");
    $randomElement = $ran[array_rand($ran, 1)];
        break; 
        case "17":
     $ran = array("Accounting-Icon.png");
    $randomElement = $ran[array_rand($ran, 1)];
        break;
        case "18":
     $ran = array("facility-management.png");
    $randomElement = $ran[array_rand($ran, 1)];
        break; 
       case "8":
     $ran = array("Accounts-Icon.png");
    $randomElement = $ran[array_rand($ran, 1)];
        break; 
        case "9":
     $ran = array("LaunchMarketing-Icon.png");
    $randomElement = $ran[array_rand($ran, 1)];
        break;
        case "15":
     $ran = array("operational-analytics-icon.png");
    $randomElement = $ran[array_rand($ran, 1)];
        break;       
    default:
        $ran = array("people.png");
    $randomElement = $ran[array_rand($ran, 1)];
}



//เปลี่ยนชื่อภาพ


include("../../server/connect.php");


if($_FILES['Job_Description']['name']!=""){

$image=time().'-'.$_FILES['Job_Description']['name'];
//เพิ่มข้อมูลสินค้า
$sql="INSERT INTO job_post(title, title_type, department, nationalities ,country, city, address, description, summary, salary, max_salary, user_id, status, status2, file_name, refer_bonus, icon, job_level, insert_date, last_update, company, type, currency, linkedin) 
VALUES(\"$Title\", \"$Titletype\",  $Department, \"$nationalities\", \"$Country\", \"$City\", \"$Address\", \"$Description\" , \"$summary\", $Min_Salary, $Max_Salary, $meid, $status, $status2, '$image', $Bonus, '$randomElement', $job_leval, now(), now(), \"$company\", $statustype, '$currency', '$linkedin')";
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




// similas jobs
if($jobid != NULL){
for($i=0;$i<count($jobid);$i++){
  if($jobid[$i]!=""){
  
  $product_image=$jobid[$i];
    
      $sqlImage="INSERT INTO SIMILARJOBS(similar_jobs, job_id, insert_date) VALUES($product_id, $product_image, now())";
      mysql_query($sqlImage)or die(mysql_error());
 
  }
}

}

// end similas



//กลับ
$id=base64_encode($product_id);
echo"<script>$error;window.location='../../edit_job.php?id=$id';</script>";
}




if($_FILES['Job_Description']['name']==""){


//เพิ่มข้อมูลสินค้า
$sql="INSERT INTO job_post(title, title_type, department, nationalities, country, city, address, description, summary, salary, max_salary, user_id, status, status2, refer_bonus, icon, job_level, insert_date, last_update, company, type, currency, linkedin) 
VALUES(\"$Title\", \"$Titletype\", $Department, \"$nationalities\", \"$Country\", \"$City\", \"$Address\", \"$Description\", \"$summary\", $Min_Salary, $Max_Salary, $meid, $status, $status2, $Bonus, '$randomElement', $job_leval, now(), now(), \"$company\",$statustype, '$currency', '$linkedin')";
mysql_query($sql)or die(mysql_error());
//คืนค่าไอดี
$product_id=mysql_insert_id();
//เพิ่มภาพหลัก



// similas jobs
if($jobid != NULL){
for($i=0;$i<count($jobid);$i++){
  if($jobid[$i]!=""){
  
  $product_image=$jobid[$i];
    
      $sqlImage="INSERT INTO SIMILARJOBS(similar_jobs, job_id, insert_date) VALUES($product_id, $product_image, now())";
      mysql_query($sqlImage)or die(mysql_error());
 
  }
}

}

// end similas

//กลับ
$id=base64_encode($product_id);
echo"<script>$error;window.location='../../edit_job.php?id=$id';</script>";
}




?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>