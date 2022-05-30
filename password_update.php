<?php  
    session_start();
    include 'tables.php';
    $Data = new Data();
    if (!isset($_SESSION['email'])) {
        # code...
        header('location:forgot_password.php');
    }
    $vr_style = 'visibility:hidden';
    $pss_style = 'visibility:hidden';
    if (isset($_POST['submit'])) {
        # code...
        extract($_POST);
        if ($_SESSION['verification_code'] != $verification_input) {
            # code...
            $vr_style = 'visibility:show';
        }else {
            if ($password != $cof) {
                # code...
                $pss_style = 'visibility:show';
            }else {
                $password = md5($password);
                $Data->update_password($password,$_SESSION['email']);
                header('location:login.php');
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
    <link rel="stylesheet" href="css/update_pass.css">
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
    <title>Update Password</title>
</head>
<body>
    <div class="form-holder container">
        
        <form action="" method="post">
            <img src="img/logo-dark.png" alt="logo">
            <div class="error text-danger" style = <?=$vr_style?>>Invalid verification code </div>
            <div class="error text-danger" style = <?=$pss_style?>>password Incorrect </div>
            <input class="form-control shadow-none" type="text" name="verification_input" placeholder="enter verification code"><br>
            <input class="form-control shadow-none" type="password" name="password" placeholder="enter new password" id="password" onkeyup="validatePass()"><br>
            <input class="form-control shadow-none" type="password" name="cof" placeholder="confirm new password" id="password" onkeyup="validatePass()"><br>
            <button class="signup-btn" type="submit" name ="submit" id="signupBtn">submit</button>
        </form>
    </div>
</body>
</html>