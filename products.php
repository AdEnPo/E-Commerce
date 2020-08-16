<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'config.php';
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Products || Yerinden Al Mağazası</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
     <!-- CSS only -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

      <!-- JS, Popper.js, and jQuery -->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

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
          <li class='active'><a href="products.php">Products</a></li>
          <li><a href="cart.php">View Cart</a></li>
          <li><a href="orders.php">My Orders</a></li>
          <li><a href="contact.php">Contact</a></li>
          <?php if($_SESSION["type"]==="admin") echo '<li> <a href="admin.php">Admin</a></li>'; ?>
          <?php

          if(isset($_SESSION['username'])){
            echo '<li><a href="myproducts.php">My Product</a></li>';
            echo '<li><a href="account.php">My Account</a></li>';
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



    <div class="container">      
      <div class="row" style="margin-top:10px;">
        
          <?php
            $i=0;
            $product_id = array();
            $product_quantity = array();

            $result = $mysqli->query('SELECT * FROM products');
            if($result === FALSE){
              die(mysql_error());
            }

            if($result){

              while($obj = $result->fetch_object()) {
                echo '<div class="large-4 p-1">';
                  echo '<div class="card">';
                    echo '<img class="card-img-top" style="height: 300px;" src="images/products/' . $obj->product_img_name . '"/>';
                    echo '<div class="card-body">';
                      echo '<p><h5>'.$obj->product_name.'</h5></p>';
                      echo '<p style="height: 50px;">'.$obj->product_desc.'</p>';
                    echo '</div>';  
                    echo '<ul class="list-group list-group-flush">';
                     // echo '<li class="list-group-item">Product Code: '.$obj->product_code.'</li>';
                      echo '<li class="list-group-item">Available: '.$obj->qty.'kg</li>';
                      echo '<li class="list-group-item">Price (Per Unit): '.$currency.$obj->price.'</li>';
                    echo '</ul>';
                    echo '<div class="card-body" style="height: 80px;">';
                      if(!($obj->product_owner === $_SESSION['id'])){
                        if($obj->qty > 0){
                          echo '<center><a href="update-cart.php?action=add&id='.$obj->id.'"><input type="submit" value="Add To Cart" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></center>';
                        } else {
                          echo 'Out Of Stock!';
                        }
                      } else{
                        echo '<center><strong>This is Your Product</strong></center>';
                      }
                    echo '</div>'; 
                  echo '</div>';
                echo '</div>';  
                $i++;
              }

            }

            $_SESSION['product_id'] = $product_id;


            echo '</div>';
            echo '</div>';
            ?>

          <div class="row" style="margin-top:10px;">
            <div class="small-12">


          <footer style="margin-top:10px;">
            <p style="text-align:center; font-size:0.8em;clear:both;">&copy; Yerinden Al Mağazası. All Rights Reserved.</p>
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
