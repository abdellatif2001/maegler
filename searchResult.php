<?php 

    include 'tables.php';
    session_start();
    $Data = new Data();
    $json = file_get_contents('assets/search_data.json');
    $jsonarray = json_decode($json,true);
    $page = !isset($_GET['page']) ? 1 : $_GET['page'];
    $limit = 9; 
    $offset = ($page - 1) * $limit;
    if ($jsonarray != null) {
        # code...
        $total_items = count($jsonarray); 
        $total_pages = ceil($total_items / $limit);
        $array = array_splice($jsonarray, $offset, $limit);
    }
    else {
        # code...
        $array = null;
        $total_pages = null;
    }
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
    <link rel="stylesheet" href="css/results.css">
    <link rel="stylesheet" href="css/pagination.css">
    <!-- <link rel="stylesheet" href="css/maegler.css" /> -->
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

<?php include('_navbar.php')?>

<!-- Start Show Results -->
<!-- <div class="container"> -->
<div class="view">
    <p class="text-capitalize">view mode :</p>
    <div class="view-mode">
        <div class="listView" id="list"><i class="fa-solid fa-list imageView" id="listImage"></i>&nbsp;&nbsp;List</div>
        <div class="gridView active" id="grid"><i class="fa-solid fa-border-all imageView" id="gridImage"></i>&nbsp;&nbsp;Grid</div>
    </div>
</div>

<?php 
    if ($array != null) {?>
        <div class="results" id="results">
        <?php foreach ($array as $arr) {
            
        ?> 
            <div class="box">
                    <a href="<?=$arr['table_name'] ?>.php?id=<?=$arr['id_item'] ?>">
                        <img src="<?=explode(',',$arr['table']['image'])[0];?>" alt="">
                        <div class="prod-holder">
                            <div class="product-info">
                                <h4 class="text-capitalize"><?=explode(' ',$arr['table']['title'])[0]?></h4>
                                <div class="desc descNone" id="desc">
                                        <p><?=$arr['table']['descrip'] ?></p>
                                </div>
                                <div class="specifi">
                                    <div class="price">
                                        <i class="fa-solid fa-dollar-sign"></i>
                                        <p><?=$arr['table']['price'] ?></p>
                                    </div>
                                    <div class="location">
                                        <i class="fa-solid fa-location-crosshairs"></i>
                                        <p class="text-capitalize"><?=$arr['table']['location'] ?></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </a>
            </div>
        <?php } ?> 
        
    <?php }else {?> 
        <div class="container">
            <div class="noresults">
                <h1 class="text-center text-capitalize mb-3 text-gray-800">No Result Found</h1>
                <img class="noresults" src="img/noresult.png" alt="No Results">
            </div>
        </div>
    <?php }?> 

</div>

<!-- </div> -->

<!-- End Show Results -->

    <!-- Start Pagination -->
        
    <div class="container w-50 my-4" >
    <!-- <nav aria-label="..."> -->
        <?php if ($total_pages != null) {?>
        
        <div class="custom-pagin pagination justify-content-center" style="display:inline-table;" >
        <?php if($page!=1) {?> 
            <div class="page-item"style="display:table-cell;">
            <a class="page-link" href="searchResult.php?page=<?=$page-1?>">Previous</a>
        </div>
        <?php } ?> 
            <?php for($j=1;$j<=$total_pages;$j++) {?>
            <?php if($j == $page) {?> 
            <div class="page-item  active"style="display:table-cell;">
                <a class="page-link" href="searchResult.php?page=<?=$j?>"><?=$j?> <span class="sr-only">(current)</span></a>
            </div>
            <?php }else{ ?> 
            <div class="page-item"style="display:table-cell;"><a class="page-link" href="searchResult.php?page=<?=$j?>"><?=$j?></a></div>
            <?php }} ?> 
            <?php if($page < $total_pages) {?> 
            <div class="page-item"  style="display:table-cell;">
                <a class="page-link" href="searchResult.php?page=<?=$page + 1?>">Next</a>
            </div>
        <?php } ?> 
        <?php }?>
        </div>
    </div>
    <!-- </nav> -->
    <!-- End Pagination -->
    
    <?php include('_footer.php')?>


    <script type="text/javascript">
        let list = document.getElementById("list");
        let grid = document.getElementById("grid");
        let listImage = document.getElementById("listImage");
        let gridImage = document.getElementById("gridImage");
        let results = document.getElementById("results");
        let desc = document.getElementById("desc");

        list.onclick = function(){
            list.classList.toggle("active");
            listImage.classList.toggle("active");
            grid.classList.remove("active");
            gridImage.classList.remove("active");
            results.classList.remove("results");
            results.classList.add("list-view");
            desc.classList.remove("descNone");
        }
        grid.onclick = function(){
            grid.classList.toggle("active");
            gridImage.classList.toggle("active");
            list.classList.remove("active");
            listImage.classList.remove("active");
            results.classList.remove("list-view");
            results.classList.add("results");
            desc.classList.add("descNone");

        }
    </script>
    
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
</body>
</html>