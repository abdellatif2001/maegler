<?php
    if(isset($_SESSION['id'])){
        $id_user = $_SESSION['id'];
        $log = 'my account';
        $log_link = 'myaccount.php';
        }
        else {
        $log_link = 'login.php';
        $log = 'login';
        $vr_style = 'visibility:hidden';
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
    <link rel="stylesheet" href="css/navbar.css">
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
    
<title>Maegler</title>
</head>
<body>
<!-- Start Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
    <a class="navbar-brand" href="index.php"><img class="logo" src="img/logo-dark.png" alt="Logo"/></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="myNav collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="login-btns text-capitalize nav-link" href="<?=$log_link?>"><?=$log?> <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="cta-btns nav-link" href="catChoice.html"><i class="fa-solid fa-circle-plus"></i>New Announcement</a>
        </li>
        </ul>
    </div>
    </div>
</nav>
<!-- End Navbar -->


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
</body>
</html>