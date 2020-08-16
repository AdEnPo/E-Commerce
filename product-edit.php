<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();} for php 5.4 and above

if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])) {
  echo '<h1>Invalid Login! Redirecting...</h1>';
  header("Refresh: 3; url=index.php");
}

/*if($_SESSION["type"]==="admin") {
  header("location:admin.php");
}*/

include 'config.php';

?>


<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Account ||Yerinden Al Mağazası</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>

    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">Yerinden Al Mağazası</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
      <!-- Right Nav Section -->
        <ul class="right">
          <li><a href="about.php">About</a></li>
          <li><a href="products.php">Products</a></li>
          <li><a href="cart.php">View Cart</a></li>
          <li><a href="orders.php">My Orders</a></li>
          <li><a href="contact.php">Contact</a></li>
          <?php if($_SESSION["type"]==="admin") echo '<li> <a href="admin.php">Admin</a></li>'; ?>
          <?php

          if(isset($_SESSION['username'])){
            echo '<li><a href="myproducts.php">My Product</a></li>';
            echo '<li class="active"><a href="account.php">My Account</a></li>';
            echo '<li><a href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li><a href="login.php">Log In</a></li>';
            echo '<li><a href="register.php">Register</a></li>';
          }

          
          ?>
        </ul>
      </section>
    </nav>




    <div class="row" style="margin-top:30px;">
      <div class="small-12">

        <p><h4>Product Details</h4></p>

        <p>Below are your details in the database. If you wish to change anything, then just enter new data in text box and click on update.</p>
      </div>
    </div>

    <?php
    $id = $_GET['product_id'];
    $delete = $_GET['delete_product'];
    if($delete=='true'){
      header ("location: admin-update.php?product_id='$id'&delete_product=true");
    }
    echo '<form method="POST" action="admin-update.php?product_id='.$id.'" enctype="multipart/form-data" style="margin-top:30px;">';
    ?>
      <div class="row">
        <div class="small-12">

          <div class="row">
            <div class="small-3 columns">
              <label for="right-label" class="right inline">Product Name</label>
            </div>
            <div class="small-8 columns end">
              <?php
                
                $result = $mysqli->query('SELECT * FROM products WHERE id='.$id.'');
                
                if($result === FALSE){
                  die(mysql_error());
                }

                if($result) {
                  $obj = $result->fetch_object();
                  echo '<input type="text" id="right-label" placeholder="'.$obj->product_name.'" name="product_name">';

                  echo '</div>';
                  echo '</div>';
                 
                  echo '<div class="row">';
                    echo '<div class="small-3 columns">';
                      echo '<label for="right-label" class="right inline">Product Image</label>';
                    echo '</div>';
                    echo '<div class="small-8 columns end">';
                    
                      echo '<input type="file" id="right-label" name="product_img_name">';
                      //placeholder=" '.$obj->product_img_name.'
                    echo '</div>';
                  echo '</div>';
                  
                  echo '<div class="row">';
                    echo '<div class="small-3 columns">';
                        echo '<label for="right-label" class="right inline">Product Desctiption</label>';
                    echo '</div>';
                    echo '<div class="small-8 columns end">';

                        echo '<input type="text" id="right-label" placeholder="'.$obj->product_desc. '" name="product_desc">';

                    echo '</div>';
                  echo '</div>';

                  echo '<div class="row">';
                    echo '<div class="small-3 columns">';
                        echo '<label for="right-label" class="right inline">Product Amount</label>';
                    echo '</div>';
                    echo '<div class="small-8 columns end">';

                        echo '<input type="number" id="right-label" placeholder="'.$obj->qty. '" name="qty">';

                    echo '</div>';
                  echo '</div>';

                  echo '<div class="row">';
                    echo '<div class="small-3 columns">';
                        echo '<label for="right-label" class="right inline">Product Price</label>';
                    echo '</div>';
                    echo '<div class="small-8 columns end">';

                        echo '<input type="number" id="right-label" placeholder="'.$obj->price. '" name="price">';

                    echo '</div>';
                  echo '</div>';
              }

          ?>

          <div class="row">
            <div class="small-4 columns">

            </div>
            <div class="small-8 columns">
              <input type="submit" id="right-label" value="Update" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
              <input type="reset" id="right-label" value="Reset" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
            </div>
          </div>
        </div>
      </div>
    </form>



    <div class="row" style="margin-top:30px;">
      <div class="small-12">

        <footer>
           <p style="text-align:center; font-size:0.8em;">&copy;Yerinden Al Mağazası. All Rights Reserved.</p>
        </footer>

      </div>
    </div>







    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
