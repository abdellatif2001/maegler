<?php  
    session_start();
    include 'tables.php';
    require __DIR__ . '/vendor/autoload.php';
    use Twilio\Rest\Client;
    $account_sid = "ACa9fe5065685bdc1d35523de931bf664b";
    $auth_token = '512c73c56a0b2fdc730b9b910ad0e357';
    $twilio_number = "+1 812 505 9179";
    $Data = new Data();
    if (isset($_POST['submit'])) {
        # code...
        extract($_POST);
        $verification_code = rand(100000,999999);
        $con=mysqli_connect('127.0.0.1','root','','maegler') or die(mysqli_error($con));
        $query = "SELECT number from users where email ='$email'";
        $result = mysqli_query($con,$query) or die(mysqli_error($con));
        $row = mysqli_fetch_assoc($result);
        $number = $row['number'];
        $_SESSION['verification_code'] = $verification_code;
        $client = new Client($account_sid, $auth_token);
        try {
            //code...
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
            
        }
        $_SESSION['email'] = $email;
        $Data->update_verification_code($verification_code,$email);
        header('location:password_update.php');
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
    <link rel="stylesheet" href="css/forgot_password.css">
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
<title>Forgot Password</title>
</head>
<body>
    <div class="container">
        <img src="img/logo-dark.png" alt="logo">
        <form action="" method="post">
            <h5 class="text-center text-capitalize">account recovery</h5>
            <input type="text" name="email" class="form-control shadow-none" placeholder="your email">
            <input class="form-control text-capitalize" type="submit" name= 'submit' value="send code">
            <button class="text-capitalize">resend code</button>
        </form>
    </div>
</body>
</html>