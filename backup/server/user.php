<?php
session_start();
header('Content-type: text/html; charset=utf-8');
if(isset($_SESSION['ssUsername'])){$username=$_SESSION['ssUsername'];}
else if(!isset($_SESSION['ssUsername'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}
require_once 'connect.php';


$id=$_REQUEST['id'];

$namecat=$_REQUEST['namecat'];

$namepro=$_REQUEST['namepro'];

$category_id=$_REQUEST['category_id'];

$action=$_REQUEST['action'];



$product_id=$_REQUEST['product_id'];







///////////////////////////


$username=$_REQUEST['username'];
if($username==""){$username="ไม่ได้ระบุ";}

$password=$_REQUEST['password'];
if($password==""){$password="1234";}

$cus_name=$_REQUEST['cus_name'];
if($cus_name==""){$cus_name="ไม่ได้ระบุ";}

$cus_lastname=$_REQUEST['cus_lastname'];
if($cus_lastname==""){$cus_lastname="ไม่ได้ระบุ";}

$Member="Member";

$guest="guest";

$avatar="default-avatar.png";
//////////////////////////



switch ($action) {
    case "add_guest":
        

      $sql="SELECT COUNT(*) FROM user WHERE username = '$username' LIMIT 1";
          $result=mysql_query($sql)or die(mysql_error());
          $row=mysql_fetch_assoc($result);
          $num=$row['COUNT(*)'];

          if($num == 0){

          $sql="INSERT INTO user(username, password, Image, First_Name, Last_Name, status, guest_id, insert_date, last_update) 
       VALUES(\"$username\", \"$password\", \"$avatar\", \"$cus_name\", \"$cus_lastname\" , \"$guest\", $id, now(), now())";
      mysql_query($sql)or die(mysql_error());
    
      echo"<script>document.location=document.referrer;</script>";
    }

     echo"<script>alert('UserName ที่คุณใส่ไปนั้นซ้ำ โปรดใช้ชื่ออื่น');history.back();</script>";exit;


        break;
    case "add_member":

          $sql="SELECT COUNT(*) FROM user WHERE username = '$username' LIMIT 1";
          $result=mysql_query($sql)or die(mysql_error());
          $row=mysql_fetch_assoc($result);
          $num=$row['COUNT(*)'];

          if($num == 0){

          $sql="INSERT INTO user(username, password, Image, First_Name, Last_Name, status, insert_date, last_update) 
       VALUES(\"$username\", \"$password\", \"$avatar\", \"$cus_name\", \"$cus_lastname\" , \"$Member\", now(), now())";
      mysql_query($sql)or die(mysql_error());
    
      echo"<script>document.location=document.referrer;</script>";
    }

     echo"<script>alert('UserName ที่คุณใส่ไปนั้นซ้ำ โปรดใช้ชื่ออื่น');history.back();</script>";exit;


        break;
    case "add_category2":
          $sql="INSERT INTO category2(name, insert_date, last_update) 
       VALUES(\"$namecat\", now(), now())";
      mysql_query($sql)or die(mysql_error());
    
      echo"<script>window.location='../super_all_category';</script>";exit;
        break;    
    case "edit_profile":
         $sqlOption="UPDATE user SET username=\"$username\", password=\"$password\", First_Name=\"$cus_name\", Last_Name=\"$cus_lastname\", last_update=now() WHERE id=$id";
      mysql_query($sqlOption)or die(mysql_error());
        break;
    case "edit_guest":
         $sqlOption="UPDATE user SET username=\"$username\", password=\"$password\", First_Name=\"$cus_name\", Last_Name=\"$cus_lastname\", last_update=now() WHERE id=$id";
      mysql_query($sqlOption)or die(mysql_error());
        break;                
    default:
        echo"<script>document.location=document.referrer;</script>";
}











  
echo"<script>document.location=document.referrer;</script>";


?>