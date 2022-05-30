<!-- <?php 
    session_start();
    session_destroy();
    session_start();
    include 'tables.php';
    $Data = new Data();
    if (isset($_COOKIE['id'])) {
        $_SESSION['id'] = $_COOKIE['id'];
        header('location:data_maegler.php');
    }
    else {
    $vr_style = 'visibility:hidden';
    $pss_style = 'visibility:hidden';
    $em_style = 'visibility:hidden';
    if (isset($_POST['submit'])) {
        extract($_POST);
        $row = $Data->get_user_by_email($email);
        $password_input= md5($password_input);
        if ($row == null) {

            $pss_style = 'visibility:show';
        }else {
            $password = $row['password'];
            if ($password_input == $password) {
                if ($row['verification_status']==null) {
                    $vr_style = 'visibility:show';
                }
                else {
                    setcookie('id', $row['id'], time() + (86400 * 30), "/"); // 86400 = 1 day
                    $_SESSION['id'] = $row['id'];
                    header('location:data_maegler.php');
                }
            }
            else {
                $pss_style = 'visibility:show';
            }
            
        }}}
 ?>  -->
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
    <style>
        .error{
            font-size: 14px;
            color: red;
        }
    </style>
    <title>Login To Your Account</title>
</head>
<body>
    <div class="container-fluid">
        <div class="login">
            <div class="login-img">
                <img src="img/login without bg_1-8.png" alt="login image">
            </div>
            <div class="login-form">
                <a href="" class="logo"><img src="images/logo-dark.png" alt=""></a>
                <form action="" method="POST" class="form">
                    <h4 ><span>login to </span>your account</h4>
                    <div class="error text-danger" style = <?=$vr_style?>>please verify your email </div>
                    <input type="email" name="email" placeholder="email" style="margin-bottom: 20px;"><br>
                    <input type="password" name="password_input" placeholder="password"><br>
                    <div class="error text-capitalize my-1" style = <?=$pss_style?>>email or password incorrect</div>
                    <div class="forlog">
                        <a href="forgot_password.php">forgot password?</a>
                        <button class="login-btn" type="submit" name ="submit">login</button>
                    </div>
                    <span class="dont">don't have an account? <a href="signup.php">signup here</a></span>
                </form>
            </div>
        </div>
    </div>
</body>
</html>