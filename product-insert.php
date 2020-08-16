<?php
session_start();    


include 'config.php';


$product_name = $_POST['product_name'];
$product_desc = $_POST['product_desc'];
$qty = $_POST['qty'];
$price = $_POST['price'];
$product_owner = $_SESSION['id'];


$targetdir = 'images/products';
$fileName  =rand(0,10000)."-".$_FILES['product_img_name']['name'];
$tName = $_FILES['product_img_name']['tmp_name'];
move_uploaded_file($tName, $targetdir.'/'.$fileName);

if($mysqli->query("INSERT INTO products (product_name, product_img_name, product_desc, qty, price, product_owner) 
                                VALUES('$product_name', '$fileName', '$product_desc', '$qty', '$price','$product_owner')")){
    echo 'Data inserted';
    echo '<br/>';
}else {
    echo'Error on db';
}


header ("location:products.php");

?>
