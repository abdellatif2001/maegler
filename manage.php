<?php 
session_start();
include 'tables.php';
$Data = new Data();
$ids = array('phone_tab'=>'idp','tele'=>'idt','pc'=>'idpc','cars'=>'idcar','moto'=>'idm','bike'=>'idb','appartement'=>'idappartement','maison'=>'idmaison','clothe'=>'idclothe','shoes'=>'idshoes','watches'=>'idw','pets'=>'idpets');
if (!isset($_SESSION['admin'])) {
    # code...
    header("location:index.php");
}
$admin_id = $_SESSION['admin'];
if (isset($_GET['id'])) {
    # code...
    if ($table == 'phone_tab_reviews') {
        # code...
        $table = 'phone_tab';
        $id_name = $ids[$table];
    }else {
        # code...
        $table = explode('_',$_GET['table'])[0];
        $id_name = $ids[$table];
    }
    $Data->rejected($_GET['table'],$id_name,$_GET['id']);
    header("location:manage.php");

}


$rows =  $Data->tables_reviews($admin_id);
$tables = ['appartement_reviews','bike_reviews','cars_reviews','clothe_reviews','maison_reviews','moto_reviews','pc_reviews','pets_reviews','phone_tab_reviews','shoes_reviews','tele_reviews','watches_reviews'];
// $row = $rows['appartement_reviews'];
// unset($row['status']);
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
    <link rel="stylesheet" href="css/manage.css">
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
    <title>Products Management</title>
</head>
<body>

    <!-- Start Title -->
    <div class="navbar navbar-nav bg-warning text-white">
        <h1 class="text-center text-capitalize">
            Admin
        </h1>
    </div>
    <!-- End Title -->

    <div class="container my-3">
        <table class="table table-dark striped rounded">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Price</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($tables as $table) {
                foreach($rows[$table] as $row){
                    if ($row != null) {
                        # code...
                    
                    if ($table == 'phone_tab_reviews') {
                        # code...
                        
                        $id_name = 'idp';

                    }else {
                        # code...
                        $id_name = $ids[explode('_',$table)[0]];
                    }
                    if ($table == 'phone_tab_reviews') {
                        # code...
                        $category = 'phones & tablets';

                    }
                    else{
                        $category = explode('_',$table)[0];
                    }

                    ?> 
            <tr>
                <th><?=$row['title']?></th>
                <th><?=$row['descrip']?></th>
                <th><?=$category?></th>
                <th><?=$row['price']?></th>
                <th><?=$row['status']?></th>
                <th class="actions">
                    <a class="btn btn-success text-capitalize" href="accept.php?id=<?=$row[$id_name]?>&table=<?=$table?>" onclick=" return confirm('Are You Sure?') ">accept</a>
                    <a class="btn btn-danger text-capitalize" href="manage.php?id=<?=$row[$id_name]?>&table=<?=$table?>" onclick=" return confirm('Are You Sure?') ">delete</a>
                </th>
            </tr>
            <?php }}} ?> 
        </table>
    </div>
</body>
</html>