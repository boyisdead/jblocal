<?php
session_start();
if(isset($_SESSION['ssUsername'])){$username=$_SESSION['ssUsername'];}
else if(!isset($_SESSION['ssUsername'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}
require_once 'connect.php';


$id=$_REQUEST['id'];

$namecat=$_REQUEST['namecat'];

$namepro=$_REQUEST['namepro'];

$category_id=$_REQUEST['category_id'];

$action=$_REQUEST['action'];



$product_id=$_REQUEST['product_id'];


$lat_map=$_REQUEST['lat_map'];
$lng_map=$_REQUEST['lng_map'];




///////////////////////////

$product_status=$_REQUEST['product_status'];
if($product_status==""){$product_status="Yes";}

$Partner=$_REQUEST['Partner'];
if($Partner==""){$Partner="ไม่ได้ระบุ";}


$service=$_REQUEST['service'];
if($service==""){$service="ไม่ได้ระบุ";}

$colorPartner=$_REQUEST['colorPartner'];
if($colorPartner==""){$colorPartner="#171717";}

$colorGoal=$_REQUEST['colorGoal'];
if($colorGoal==""){$colorGoal="#171717";}


$colorDone=$_REQUEST['colorDone'];
if($colorDone==""){$colorDone="#171717";}

$colorProduct=$_REQUEST['colorProduct'];
if($colorProduct==""){$colorProduct="#171717";}

$colorremark=$_REQUEST['colorremark'];
if($colorremark==""){$colorremark="#171717";}


$colorService=$_REQUEST['colorService'];
if($colorService==""){$colorService="#171717";}

$point=$_REQUEST['point'];
if($point==""){$point=0;}

$point_off=$_REQUEST['point_off'];
if($point_off==""){$point_off=0;}


$Goal=$_REQUEST['Goal'];
if($Goal==""){$Goal=0;}

$Done=$_REQUEST['Done'];
if($Done==""){$Done=0;}

$balance=$_REQUEST['balance'];
if($balance==""){$balance="ไม่ได้ระบุ";}


$customer_id=$_REQUEST['customer_id'];


$product_status2=$_REQUEST['product_status2'];
if($product_status2==""){$product_status2="Not Effective";}

$remark=$_REQUEST['remark'];
if($remark==""){$remark="ไม่ได้ระบุ";}

//////////////////////////



switch ($action) {
    case "addmap":
         $sqlOption="UPDATE customer SET lat_map=\"$lat_map\", lng_map=\"$lng_map\", last_update=now() WHERE id=$customer_id";
      mysql_query($sqlOption)or die(mysql_error());
        break;
    case "add_category":
          $sql="INSERT INTO category(name, insert_date, last_update) 
       VALUES(\"$namecat\", now(), now())";
      mysql_query($sql)or die(mysql_error());
    
      echo"<script>window.location='../super_category';</script>";exit;
        break;
    case "add_category2":
          $sql="INSERT INTO category2(name, insert_date, last_update) 
       VALUES(\"$namecat\", now(), now())";
      mysql_query($sql)or die(mysql_error());
    
      echo"<script>window.location='../super_all_category';</script>";exit;
        break;    
    case "update_category":
         $sqlOption="UPDATE category SET name=\"$namecat\", last_update=now() WHERE id=$id";
      mysql_query($sqlOption)or die(mysql_error());
        break;
    case "update_category2":
         $sqlOption="UPDATE category2 SET name=\"$namecat\", last_update=now() WHERE id=$id";
      mysql_query($sqlOption)or die(mysql_error());
        break;        
    case "del_category":
          $sql="DELETE FROM category WHERE id=$id";
      $result=mysql_query($sql)or die(mysql_error());

      $sql="SELECT * FROM product WHERE category_id=$id";
$result=mysql_query($sql)or die(mysql_error());
$num=mysql_num_rows($result);
for($i=1;$i<=$num;$i++){
  $row=mysql_fetch_array($result);

  mysql_query("DELETE FROM product WHERE category_id=$id")or die(mysql_error());
}

        break;
        case "del_category2":
          $sql="DELETE FROM category2 WHERE id=$id";
      $result=mysql_query($sql)or die(mysql_error());

      $sql="SELECT * FROM product2 WHERE category_id=$id";
$result=mysql_query($sql)or die(mysql_error());
$num=mysql_num_rows($result);
for($i=1;$i<=$num;$i++){
  $row=mysql_fetch_array($result);

  mysql_query("DELETE FROM product2 WHERE category_id=$id")or die(mysql_error());
}

        break;
    case "add_product":
          $sql="INSERT INTO product(category_id, name, insert_date, last_update) 
       VALUES($category_id, \"$namepro\", now(), now())";
      mysql_query($sql)or die(mysql_error());
    //คืนค่าไอดี
      $product_id=mysql_insert_id();
      echo"<script>window.location='../categoryProduct.php?id=$category_id';</script>";exit;
        break;  
    case "add_product2":
          $sql="INSERT INTO product2(category_id, name, insert_date, last_update) 
       VALUES($category_id, \"$namepro\", now(), now())";
      mysql_query($sql)or die(mysql_error());
    //คืนค่าไอดี
      $product_id=mysql_insert_id();
      echo"<script>window.location='../category_all_Product.php?id=$category_id';</script>";exit;
        break;        
    case "update_product":
          $sqlOption="UPDATE product SET category_id=$category_id, name=\"$namepro\", last_update=now() WHERE id=$product_id";
      mysql_query($sqlOption)or die(mysql_error());
       echo"<script>window.location='../categoryProduct.php?id=$category_id';</script>";exit;
        break; 
    case "update_product2":
          $sqlOption="UPDATE product2 SET category_id=$category_id, name=\"$namepro\", last_update=now() WHERE id=$product_id";
      mysql_query($sqlOption)or die(mysql_error());
       echo"<script>window.location='../category_all_Product.php?id=$category_id';</script>";exit;
        break;          
    case "del_product":
          $sql="DELETE FROM product WHERE id=$product_id";
      $result=mysql_query($sql)or die(mysql_error());

$sql="SELECT * FROM subproduct WHERE product_id=$product_id";
$result=mysql_query($sql)or die(mysql_error());
$num=mysql_num_rows($result);
for($i=1;$i<=$num;$i++){
  $row=mysql_fetch_array($result);

  mysql_query("DELETE FROM subproduct WHERE product_id=$product_id")or die(mysql_error());
}
        break;
    case "del_product2":
          $sql="DELETE FROM product2 WHERE id=$product_id";
      $result=mysql_query($sql)or die(mysql_error());
        break;    
    case "add_subproduct":
          $sql="INSERT INTO subproduct(product_id, name, status, Partner, colorPartner, Goal, colorGoal, Done, colorDone, balance, colorProduct, statuss, remark, colorremark, customer_id, member_id, insert_date, last_update) 
       VALUES($product_id, \"$service\", \"$colorService\", \"$Partner\", \"$colorPartner\", $Goal, \"$colorGoal\", $Done, \"$colorDone\", \"$balance\", \"$colorProduct\", \"$product_status2\", \"$remark\", \"$colorremark\", $customer_id, $id, now(), now())";
      mysql_query($sql)or die(mysql_error());
    
      echo"<script>window.location='../other_service-$customer_id';</script>";exit;
        break;
    case "up_subproduct":
          $sqlOption="UPDATE subproduct SET product_id=$product_id, name=\"$service\", status=\"$colorService\", Partner=\"$Partner\", colorPartner=\"$colorPartner\", Goal=$Goal, colorGoal=\"$colorGoal\", Done=$Done, colorDone=\"$colorDone\", balance=\"$balance\", colorProduct=\"$colorProduct\", statuss=\"$product_status2\", remark=\"$remark\", colorremark=\"$colorremark\", last_update=now() WHERE id=$id";
      mysql_query($sqlOption)or die(mysql_error());
         echo"<script>window.location='../other_service-$customer_id';</script>";exit;
        break; 
    case "del_subpro":
          $sql="DELETE FROM subproduct WHERE id=$id";
      $result=mysql_query($sql)or die(mysql_error());
        break; 
    case "setup":
          $sqlOption="UPDATE user SET point_cus=$point , point_off=$point_off WHERE id=$id";
      mysql_query($sqlOption)or die(mysql_error());
       echo"<script>document.location=document.referrer;</script>";
        break;                 
    default:
        echo"<script>document.location=document.referrer;</script>";
}











  
echo"<script>document.location=document.referrer;</script>";


?>