<?php  
session_start();
if (!isset($_SESSION['id'])) {
    # code...
    header("location:index.php");
}
include 'tables.php';
    
$Data = new Data();
$tables_reviews = ['appartement_reviews','bike_reviews','	cars_reviews','clothe_reviews','maison_reviews','moto_reviews','pc_reviews','pets_reviews','phone_tab_reviews','shoes_reviews','tele_reviews','watches_reviews'];
$id = $_SESSION['id'];
$user = $Data->get_user_by_id($id);
$products = $Data->tables_reviews($id);
$favorites = $Data->favorites($id);
if (isset($_POST['Save_changes'])) {
    # code...
    extract($_POST);
    if ($_FILES['image']['name'] == null) {
        $Data->update_user_info($id,$full_name,$email,$number);
        header("location:myaccount.php");
    }
    else {
        $source = $_FILES['image']['tmp_name'];
        $image = "users_profil/".$_FILES['image']['name'];
        move_uploaded_file($source,$image);
        $Data->update_user_info_image($id,$full_name,$email,$number,$image);
        header("location:myaccount.php");
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Maegler - User Profile</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/dashstyle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/userdashboard.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul style="background-color: #ffbc20;" class="navbar-nav sidebar sidebar-dark accordion left-side-bar" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <img src="img/logo_white.png" alt="" width="100px">
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">



            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="myaccount.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Personal Informations</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="myproducts.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>My Products</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Favourites -->
            <li class="nav-item">
                <a class="nav-link" href="favourites.php">
                    <i class="fas fa-fw fa-heart"></i>
                    <span>Favourites</span></a>
            </li>



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$user['full_name']?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?=$user['image']?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                
                <h1 class="h3 mb-2 text-gray-800">Personal Informations</h1>
                <!-- Code Here -->
                <div class="content">
                    <div class="user-content" id="slide">
                        <!-- Start User Info -->
                        <div class="user-infos" id="user-infos">
                            <div class="image">
                                <img src="<?=$user['image']?>" alt="">
                                <i class="fa-solid fa-pen-circle"></i>
                                <!-- <p class="username text-capitalize">abdessamad <br> boutzate</p> -->
                            </div>
                            <div class="user-inputs">
                                <form method="post" enctype='multipart/form-data'>
                                    <label for="full-name" class="text-capitalize">full name</label>
                                    <input class="form-control shadow-none" type="text" name="full_name" readonly value="<?=$user['full_name']?>">
                                    <label for="email" class="text-capitalize">email</label>
                                    <input class="form-control shadow-none" type="text" name="email"readonly value="<?=$user['email']?>">
                                    <label for="phone" class="text-capitalize">phone number</label>
                                    <input class="form-control shadow-none" type="text" name="number" readonly value="<?=$user['number']?>">
                                    <button class="submit-btn" type="button" data-toggle="modal" data-target="#exampleModalCenter">edit</button>
                                </form>
                                <!-- Edit Info Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content" style="margin-top: -30px;">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Informations</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" method="post" enctype='multipart/form-data'>
                                        <label for="image"><img class="per-img" src="<?=$user['image']?>" alt=""></label>
                                        <input class="personal-img" type="file" accept="image/png, image/jpeg" id="image" name='image'>
                                        <br>
                                        <label for="full-name" class="text-capitalize">full name</label>
                                        <input class="form-control shadow-none" type="text" name="full_name" value="<?=$user['full_name']?>">
                                        <label for="email" class="text-capitalize">email</label>
                                        <input class="form-control shadow-none" type="text" name="email" value="<?=$user['email']?>">
                                        <label for="phone" class="text-capitalize">phone number</label>
                                        <input class="form-control shadow-none" type="text" name="number" value="<?=$user['number']?>">
                                        <div class="modal-footer">
                                            <button type="button" class="close-btn" data-dismiss="modal">Close</button>
                                            <button type="submit" class="submit-btn" name="Save_changes">Save changes</button>
                                        </div>
                                    </form>
                                </div>
            
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- End User Info -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <!-- <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Maegler 2022</span>
                    </div>
                </div>
            </footer> -->
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-warning" href="destroy_cookies.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/adminDash.min.js"></script>

    <!-- Page level plugins -->
    <!-- <script src="vendor/chart.js/Chart.min.js"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script> -->

</body>

</html>