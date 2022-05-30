<?php
    include 'tables.php';
    session_start();
    if(isset($_SESSION['id'])){
      $log = 'myaccount';
      $log_link = 'myaccount.php';
    }
    else {
      $log = 'login';
      $log_link = 'login.php';
    }
    $Data = new Data();  
    if (isset($_GET['id'])) {
      $id = $_GET['id'];

      # code...
      $row = $Data->category('pc','idpc',$id);
      $user = $Data->get_user_by_id($row['id']);
      $img = explode(',',$row['image']);
      $len = sizeof($img) - 1;
  }
  else {
    header('location:index.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn"
    crossorigin="anonymous"
    />
    <!-- style link -->
    <link rel="stylesheet" href="css/maegler.css" />
    <!-- normalize library -->
    <link rel="stylesheet" href="css/normalize.css" />
    <!-- font awesome library -->

    <script src="https://kit.fontawesome.com/06b58a135e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/all.min.css" />
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet"
    />
    <title>Product Page</title>
</head>
<body>
    <!-- Start Navbar -->
    <div class="home">
        <nav class="main-nav">
          <a href="http://maegler.com"
            ><img class="logo" src="images/logo-dark.png" alt="Logo"
          /></a>
          <div class="nav-btns" id="navbtns">
          <a href="<?=$log_link?>" class="cta-login"><?=$log?></a>
            <a href="http://maegler.com/new-article" class="cta-btn"
              ><i class="fa-solid fa-circle-plus"></i>Sell Products</a
            >
          </div>
          <i class="fas fa-bars" onclick="togglemenu()"></i>
        </nav>
      </div>
    <!-- End Navbar -->
    <!-- Start Project Page -->
      <div class="container w-75">
          <div class="article">
              <div class="prod">
              <div class="img-gallery">
                    <div class="big-img">
                      <img src="<?=$img[0]?>" id="big-img">
                    </div>
                    <div class="small-imgs">
                      <?php if($len!=0){foreach (range(1,$len) as $i) {?> 
                      <img src="<?=$img[$i]?>" onclick="myFunc(this)">
                      <?php }} ?> 
                    </div>
                </div>
                  <div class="prod-content">
                    <div class="price-infos">
                      <h5 class="text-capitalize"><?=$row['title']?></h5>
                      <p><?=$row['price']?> Dhs</p>
                    </div>
                    <table class="table table-light">
                      <tr>
                        <th colspan="2" class="text-center text-capitalize">specifications</th>
                      </tr>
                      <tr>
                        <td class="text-capitalize">marque</th>
                        <td class="text-capitalize text-right"><?=$row['marque']?></td>
                      </tr>
                      <tr>
                        <td class="text-capitalize">processeur</th>
                        <td class="text-capitalize text-right"><?=$row['proce']?></td>
                      </tr>
                      <tr>
                        <td class="text-capitalize">rAM</th>
                        <td class="text-capitalize text-right"><?=$row['ram']?> GB</td>
                      </tr>
                      <tr>
                        <td class="text-capitalize">capacity</th>
                        <td class="text-capitalize text-right"><?=$row['capacity']?> GB</td>
                      </tr>
                      <tr>
                        <td class="text-capitalize">état</td>
                        <td class="text-capitalize text-right"><?=$row['etat']?></td>
                      </tr>
                    </table>
                    <div class="description">
                      <h5 class="text-capitalize mx-2 my-2">description</h5>
                      <p class="mx-2 item-desc"><?=$row['descrip']?></p>
                    </div>
                  </div>
              </div>
              <div class="seller">
                <div class="seller-info">
                  <div class="user-img">
                    <a href="maegler.shop?id="><i class="fa-solid fa-circle-user"></i></a>
                  </div>
                  <p class="full-name"><?=$user['full_name']?></p>
                    <a class="mail" href="mailto:<?=$user['email']?>"><?=$user['email']?></a>
                </div>
                <div class="seller-contact">
                  <a href="https://wa.me/<?=$user['number']?>" class="btn btn-success text-capitalize"><i class="fa-brands fa-whatsapp"></i> &nbsp; whatsapp</a>
                  <a class="btn btn-warning text-capitalize" href="tel:<?=$user['number']?>">Contact seller</a>
                </div>
              </div>
          </div>
      </div>
    <!-- End Project Page -->
    <?php include('_footer.php')?>

    <!-- Start Scripts Sources -->
    <script src="js/jquery.js"></script>
    <script src="js/all.min.js"></script>
    <script src="js/script.js"></script>
    <!-- End Scripts Sources -->
</body>
</html>