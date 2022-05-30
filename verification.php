<?php
    session_start();
    if (!isset($_SESSION['verification_code'])) {
        header('location:signup.php');
    }
    $verification_code = $_SESSION['verification_code'];
    include 'tables.php';
    $Data = new Data();

    

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
    <title>Verify Your Email</title>
</head>
<body>
    <div class="container">
        <div class="verify-holder">
            <img class="logo" src="images/logo-dark.png" alt="">
            <form action="" method="POST" class="verify-form">
                <h1 class="text-capitalize">check email for verification code</h1>
                <img src="images/check-email.png" alt="" class="check-img my-3">
                <input type="text" name="verification_input" placeholder="enter verification code"><br>
                <?php 
                    if (isset($_POST['verify'])) {
                        extract($_POST);
                        if ($verification_code == $verification_input ) {
                            $email = $_SESSION['email'];
                            $Data->update_verification_status($email);
                            header('location:login.php');
                        }
                        else {
                            echo '<div id ="error" class="text-danger">Invalid verification code</div>';
                        }
                    }
                ?> 
                <button type="submit" name ="verify" class="verify-btn">submit</button>
                <span class="text-capitalize">Didn't get code?</span><button type="submit" name="resend" class="resend-btn">Resend</button>
            </form>
        </div>
    </div>
</body>
</html>
