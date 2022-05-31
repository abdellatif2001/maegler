<?php 
    session_start();
    $con=mysqli_connect('127.0.0.1','root','','maegler') or die(mysqli_error($con));
    include 'tables.php';
    require __DIR__ . '/vendor/autoload.php';
    use Twilio\Rest\Client;
    $account_sid = "ACa9fe5065685bdc1d35523de931bf664b";
    $auth_token = '512c73c56a0b2fdc730b9b910ad0e357';
    $twilio_number = "+1 812 505 9179";
    $Data = new Data();

    // $fname = $email = $number = "";
    $nameErr = $emailErr = $numberErr = $passErr = $nu_st = 'visibility:hidden';

    if (isset($_POST['submit'])) {
        extract($_POST);
        if (empty($_POST['fname'])) {
            # code...
            $nameErr = 'visibility:show';
        }else {
            if (empty($_POST['email'])) {
                # code...
                $emailErr = 'visibility:show';
            }else {
                if (empty($_POST['number'])) {
                    # code...
                    $numberErr = 'visibility:show';
                }else {
                        # code...
                        if($password != $conf){
                            $passErr = 'visibility:show';
                        }
                        else {
            
                            $row = $Data->get_user_by_email($email);
                            if ($row != null) {
                                echo '<div id ="form-error" class="text-capitalize">email already exist</div>';
                                
                            }
                            else {
                                $verification_code = rand(100000,999999);
                                $_SESSION['verification_code'] = $verification_code;
                                if (substr($number, 0, 1) == 0) {
                                    # code...
                                    $number = '+212'.substr($number, 1);
                                }


                                $client = new Client($account_sid, $auth_token);
                                try {
                                    //code..
                                    $client->messages->create(
                                        // Where to send a text message (your cell phone?)
                                        "$number",
                                        array(
                                            'from' => $twilio_number,
                                            'body' => "hey it's maegler your verification code is $verification_code"
                                        )
                                    );
                                } catch (\Throwable $th) {
                                    //throw $th;
                                    $nu_st = "visibility:show";
                                }

                                $_SESSION['email'] = $email;
                                // if(!mail($email, $subject, $body, $sender)){
                                    //echo '<div id ="error" class="text-danger">email already exist</div>';
            
                                }
                                    $encrypted_password = md5($password);
                                    $Data->insert_to_user($fname,$email,$encrypted_password,$number,$verification_code);
                                    header('location:verification.php');
                                
                            }
                        }
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
    <style>
        .validation{
            font-size: 12px;
            color: white;
            text-transform: capitalize;
            margin: 5px 0;
            text-align: left;
            padding-left: 110px;
        }
        .fa-check{
            color: green;
            position: relative;
            right: 0;
        }
        #spanErr{
            display: block;
            font-size: 14px;
            color: red;
            /* margin-bottom: 10px; */
        }
        .password{
            margin-bottom: 20px;
        }
    </style>
    <title>Register Your Account</title>
    <style>
    </style>
</head>

<body class="signup-body">
    <div class="container-fluid">
        <div class="signup">
            <div class="signup-img">
                <img src="img/Sign up without bg-8.png" alt="signup image">
            </div>
            <div class="signup-form">
                <a href="" class="logo"><img src="images/logo-dark.png" alt=""></a>
                <form action="" method="POST" class="form">
                    <h4><span>create </span>your account</h4>
                    <input type="text" name="fname" placeholder="full name" id="full-name">
                    <span class="text-capitalize" style=<?=$nameErr?> id="spanErr">full name required</span>

                    <input type="mail" name="email" placeholder="email" id="signup-email">
                    <span class="text-capitalize" style=<?=$emailErr?> id="spanErr">email required</span>

                    <input type="text" name="number" placeholder="phone number" id="number">
                    <span class="text-capitalize" style=<?=$numberErr?> id="spanErr">phone number required</span>
                    <span class="text-capitalize" style=<?=$nu_st?> id="spanErr">phone number incorrect</span>

                    <input type="password" name="password" placeholder="password" id="password">
                    <span class="password text-capitalize" id="spanErr"></span>

                    <input type="password" name="conf" placeholder="confirm password" id="conf-password">
                    <span class="text-capitalize" id="spanErr" style=<?=$passErr?>>password not match</span>
                        
                    <button class="signup-btn" type="submit" name ="submit" id="signupBtn">signup</button>
                    <span class="already">already have an account? <a href="login.php">Login here</a></span>
                </form>
            </div>
        </div>
    </div>


    <!-- <script src="js/script.js"></script> -->
    <script>
        // Start Var Declaration
        let fullName = document.getElementById("full-name");
        let fullNameV = document.getElementById("fname-error");

        let signupEmail = document.getElementById("signup-email");
        let signupEmailV = document.getElementById("email-error");

        let phoneNumber = document.getElementById("number");
        let phoneNumberV = document.getElementById("number-error");

        let password = document.getElementById("password");
        let passConfirm = document.getElementById("conf-password");

        let signupBtn = document.getAnimations("signupBtn");

        // End Var Declaration
        signupBtn.onclick = function(){
            if(fullName.value === ""){
                fullNameV.innerHTML = "Full Name Is Required";
                fullNameV.style.color = "red";
            }
        }
    </script>
    <script src="assets/js/jquery.min.js?h=84e399b8f2181ccd73394fdeddff1638"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js?h=2504f2315ca47ea4d62e67e20a5551d7"></script>
</body>
</html>