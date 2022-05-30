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

    <title>Maegler - My Products</title>
    <!-- nomalize -->
    <link rel="stylesheet" href="css/normalize.css">
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
                
                <h1 class="h3 mb-2 text-gray-800">My Favourite Products</h1>
                <!-- Code Here -->
                <!-- Start Favourites -->
                <div class="favourites" id="favourites">
                    <?php  foreach($favorites as $favorite){
                            $product_fv = $Data->select_product($favorite['Category'],$favorite['idn'],$favorite['id']);
                            $img = explode(',',$product_fv['image']);
                        ?>
                        <div class="box">
                            <a href="">
                                <div class="image">
                                    <img src="<?=$img[0]?>" alt="">
                                </div>
                                <div class="prod-content">
                                    <h5 class="text-capitalize"><?=$product_fv['title']?></h5>
                                    <p class="text-capitalize"><?=$product_fv['price']?> Dh</p>
                                    <div class="loc-andcat">
                                        <div class="loc">
                                            <i class="fa-solid fa-location-crosshairs"></i>
                                            <p class="text-capitalize"><?=$product_fv['location']?></p>
                                        </div>
                                        <div class="cat">
                                            <i class="fa-solid fa-border-all"></i>
                                            <p class="text-capitalize"><?=$favorite['Category']?></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php  }?> 
                    </div>
                    <!-- End Favourites -->
                

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
                    <a class="btn btn-warning" href="login.php">Logout</a>
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