<?php 
    session_start();
    session_destroy();
    session_start();
    $pss_style = 'visibility:hidden';
    $con=mysqli_connect('127.0.0.1','root','','maegler_admin') or die(mysqli_error($con));
    if (isset($_POST['submit'])) {
        extract($_POST);
        $query = "SELECT * FROM user where email = '$email'";
        $result = mysqli_query($con,$query) or die(mysqli_error($con));
        $row = mysqli_fetch_assoc($result);
        $password_input= $password_input;
        if ($row == null) {
            echo "email doesn't exist";
        }
        else {
            $password = $row['password'];
            if ($password_input == $password) {
                $_SESSION['admin'] = $row['id'];
                header('location:manage.php');

            }
            else {
                echo "password Incorrect ";
            }
            
        }


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
    <title>Admin Account</title>
</head>
<body>
    <div class="container-fluid">
        <div class="login">
            <div class="login-img">
                <img src="img/Login .png" alt="">
            </div>
            <div class="login-form">
                <a href="" class="logo"><img src="images/logo-dark.png" alt=""></a>
                <form action="" method="POST" class="form">
                    <h4><span>Admin  </span>account</h4>
                    <input type="text" name="email" placeholder="email" style="margin-bottom: 15px;"><br>
                    <div class="validation"></div>
                    <input type="password" name="password_input" placeholder="password"><br>
                    <div class="error text-capitalize my-1" style = <?=$pss_style?>>email or password incorrect</div>
                    <div class="validation"></div>
                    <div class="forlog">
                        <!-- <a href="forgot-password.php">forgot password?</a> -->
                        <button class="login-btn" type="submit" name ="submit">login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>