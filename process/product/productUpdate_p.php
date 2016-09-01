, type=$statustype<?php
session_start();
include('../../server/connect.php');
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
//รับค่า
$id=$_REQUEST['id'];

if($_REQUEST['Title']==""){echo"<script>alert('Please insert title name');history.back();</script>";exit;}

if($_REQUEST['Department']==""){echo"<script>alert('Please select Department');history.back();</script>";exit;}

$Department=$_REQUEST['Department'];


$status=$_REQUEST['status'];
if($status==""){$status=0;}



$status2=$_REQUEST['status2'];
if($status2==""){$status2=0;}

$statustype=$_REQUEST['statustype'];
if($statustype==""){$statustype=0;}

$Title=$_REQUEST['Title'];

$Titletype=$_REQUEST['Titletype'];
if($Titletype==""){$Titletype="-";}

$linkedin=$_REQUEST['linkedin'];
if($linkedin==""){$linkedin="-";}


$company=$_REQUEST['company'];
if($company==""){$company="-";}

$job_leval=$_REQUEST['job_leval'];
if($job_leval==""){$job_leval=0;}


$Address = mysql_escape_string($_REQUEST['Address']);
if($Address==""){$Address="-";}

$Description = mysql_escape_string($_REQUEST['Description']);
if($Description==""){$Description="-";}

$summary = mysql_escape_string($_REQUEST['summary']);
if($summary==""){$summary="-";}

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

//เชื่อมต่อฐานข้อมูล
include("../../server/connect.php");






//ถ้าไม่แก้ไขรูปภาพ
if($_FILES['Job_Description']['name']==""){
  //อัพเดทข้อมูล 

  $sql="UPDATE job_post SET title=\"$Title\", title_type=\"$Titletype\", department=$Department, country=\"$Country\", city=\"$City\", address=\"$Address\", description=\"$Description\", summary=\"$summary\", salary=$Min_Salary, max_salary=$Max_Salary, status=$status, status2=$status2, refer_bonus=$Bonus, icon='$randomElement', job_level=$job_leval,  last_update=now(), company=\"$company\", type=$statustype, currency='$currency', linkedin='$linkedin' WHERE id=$id";
  mysql_query($sql)or die(mysql_error());  

  // similas jobs
if($jobid != NULL){
for($i=0;$i<count($jobid);$i++){
  if($jobid[$i]!=""){
  
  $product_image=$jobid[$i];
    
      $sqlImage="INSERT INTO SIMILARJOBS(similar_jobs, job_id, insert_date) VALUES($id, $product_image, now())";
      mysql_query($sqlImage)or die(mysql_error());
 
  }
}

}
// end similas

  $id=base64_encode($_REQUEST['id']);
  echo"<script>window.location='../../edit_pick_job.php?id=$id';</script>";exit;
}




//ถ้าแก้ไขรูปภาพ
if($_FILES['Job_Description']['name']!=""){
  //ลบภาพเก่า
  $sqlDelete="SELECT * FROM job_post WHERE id=$id";
  $resultDelete=mysql_query($sqlDelete)or die(mysql_error());
  $rowDelete=mysql_fetch_assoc($resultDelete);
  unlink("../../pdf/".$rowDelete['file_name']);
  //เปลี่ยนชื่อภาพ
  $image=time().'-'.$_FILES['Job_Description']['name'];
  //อัพโหลดรูปภาพ

  if(move_uploaded_file($_FILES['Job_Description']['tmp_name'],"../../pdf/".$image)){

    $error="";
  }
  //ถ้าอัพโหลดไม่ได้
  else{
  $error="alert('เกิดการผิดพลาดในการอัพโหลดไฟล์ภาพ กรุณาทำการอัพโหลดใหม่');";
  }
  //อัพเดทตารางสินค้า
  $sql="UPDATE job_post SET title=\"$Title\", title_type=\"$Titletype\", department=$Department, country=\"$Country\", city=\"$City\", address=\"$Address\", description=\"$Description\", summary=\"$summary\", salary=$Min_Salary, max_salary=$Max_Salary, status=$status, status2=$status2, file_name='$image', refer_bonus=$Bonus, icon='$randomElement', job_level=$job_leval, last_update=now(), company=\"$company\", type=$statustype, currency='$currency', linkedin='$linkedin' WHERE id=$id";
  mysql_query($sql)or die(mysql_error());  


  // similas jobs
if($jobid != NULL){
for($i=0;$i<count($jobid);$i++){
  if($jobid[$i]!=""){
  
  $product_image=$jobid[$i];
    
      $sqlImage="INSERT INTO SIMILARJOBS(similar_jobs, job_id, insert_date) VALUES($id, $product_image, now())";
      mysql_query($sqlImage)or die(mysql_error());
 
  }
}

}
// end similas


  $id=base64_encode($_REQUEST['id']);
  echo"<script>window.location='../../edit_pick_job.php?id=$id';</script>";exit;
}








$id=base64_encode($_REQUEST['id']);
  echo"<script>window.location='../../edit_pick_job.php?id=$id';</script>";exit;
?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>