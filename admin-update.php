<?php

  //if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
  if(session_id() == '' || !isset($_SESSION)){session_start();}

  if($_SESSION["type"]!="admin") {
    header("location:index.php");
  }

  include 'config.php';

  $id = $_GET['product_id'];
  $delete = $_GET['delete_product'];

  if($delete=='true'){
    $result = $mysqli->query('DELETE FROM products WHERE id='.$id.'');
    $obj = $result->fetch_object();
    if($result){
    }
    header("location: admin.php");
  }
  else{
    
    $product_name = $_POST['product_name'];
    $product_desc = $_POST['product_desc'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];
    
   
        if($product_name!=""){
          $result = $mysqli->query('UPDATE products SET product_name ="'. $product_name.'" WHERE id ='.$id);
          if($result){
          }
        }
       
        if($_FILES['product_img_name']['name'] != '' && $_FILES['product_img_name']['error'] == 0){
          $targetdir = 'images/products';
          $fileName  = rand(0,10000)."-".$_FILES['product_img_name']['name'];
          $tName = $_FILES['product_img_name']['tmp_name'];
          move_uploaded_file($tName, $targetdir.'/'.$fileName);
          
          $result = $mysqli->query('UPDATE products SET product_img_name ="'. $fileName.'" WHERE id ='.$id);
          if($result){
          }
          //We don't know how to delete the old existed image to replace it
        }
        if($product_desc!=""){
          $result = $mysqli->query('UPDATE products SET product_desc ="'. $product_desc.'" WHERE id ='.$id);
          if($result){
          }
        }

        if($qty!=""){
          $result = $mysqli->query('UPDATE products SET qty ="'. $qty.'" WHERE id ='.$id);
          if($result){
          }
        }

        if($price!=""){
          $result = $mysqli->query('UPDATE products SET price ="'. $price.'" WHERE id ='.$id);
          $obj = $result->fetch_object();
          if($result){
          }
        }
       header("location: admin.php");
  } 


?>
