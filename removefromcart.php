<?php
 session_start();
 if (isset($_GET['itemid'])) {
 //connect to database
 $mysqli = mysqli_connect("localhost", "root","");
 mysqli_select_db($mysqli,"test1_db") or die("DATABASE NOT FOUND");
 //create safe values for use
     $safe_id = mysqli_real_escape_string($mysqli,$_GET['itemid']);

     $delete_item_sql = "DELETE FROM store_shoppertrack WHERE
          id = '".$safe_id."' and session_id ='".$_COOKIE['PHPSESSID']."' ";
     $delete_item_res = mysqli_query($mysqli, $delete_item_sql) or die(mysqli_error($mysqli));

 //close connection to MySQL
     mysqli_close($mysqli);

 //redirect to showcart page
     header("Location: showcart.php");
     exit;
    }
 else {
   //send them somewhere else
    header("Location: seestore.php");
    exit;
 }
 ?>