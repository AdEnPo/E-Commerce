<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])) {
  header("location:index.php");
}

if($_SESSION["type"]!="admin") {
  header("location:index.php");
}

include 'config.php';
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin || Yerinden Al Mağazası</title>
    <link rel="stylesheet" href="css/foundation.css" />

         <!-- CSS only -->
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <!-- JS, Popper.js, and jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


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
          <?php if($_SESSION["type"]==="admin") echo '<li class="active"> <a href="admin.php">Admin</a></li>'; ?>
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
          <div class="large-12">
            <h3>Hey Admin!</h3>
            <hr>
            <table class=" thead-light">    
              <thead>
                <tr>
                  <th scope="col">#ID</th>
                  <!--<th scope="col">Image</th>-->
                  <th scope="col">Product Name</th>
                  <th scope="col">Product Description</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Price Per Unit</th>
                  <th scope="col">Update</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $result = $mysqli->query('SELECT * from products');
                //$result = $mysqli->query('SELECT * from products order by id asc');
                  while($obj = $result->fetch_object()) {
                    echo '<tr>';
                      echo '<th scope="row">'.$obj->id.'</th>';
                      //echo '<td>'.$obj->product_img_name.'</td>';
                      echo '<td type="text" "name="product_name">'.$obj->product_name.'</td>';
                      echo '<td rows="5" cols="70" class="text-wrap" type="text" "name="product_desc">'.$obj->product_desc.'</td>';
                      echo '<td type="number" "name="qty">'.$obj->qty.'</td>';
                      echo '<td type="number" "name="price"> '.$obj->price.'</td>';
                      echo '<td><div class="large-12 columns" style="padding-left:0;">';
                          echo '<center><a href= "product-edit.php?product_id='.$obj->id.'"  method="post"><input style="clear:both;"name="action" type="submit" class="button" value="Update"></a></center>';
                        echo '</div></td>';
                        echo '<td><div class="large-12 columns" style="padding-left:0;">';
                          echo '<center><a href= "product-edit.php?product_id='.$obj->id.'&delete_product=true"  method="post"><input style="clear:both;"name="action" type="submit" class="button btn-danger" value="Delete"></a></center>';
                        echo '</div></td>';
                    
                    echo '</tr>';
                  }

                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>


    <div class="row" style="margin-top:10px;">
      <div class="small-12">
        </form>
        <footer style="margin-top:10px;">
           <p style="text-align:center; font-size:0.8em;">&copy; Yerinden Al Mağazası. All Rights Reserved.</p>
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
