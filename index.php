<?php 
    include 'tables.php';
    $Data = new Data();
    $tables =  $Data->tables_name();
    session_start();
    if (isset($_COOKIE['id'])) {
      
      $_SESSION['id'] = $_COOKIE['id'];
  
    }
    
    $json = file_get_contents('assets/data.json');
    $jsonarray = json_decode($json,true);
    if($jsonarray == null){
      header("location:data_maegler.php");
    }
    $page = !isset($_GET['page']) ? 1 : $_GET['page'];
    $limit = 9; 
    $offset = ($page - 1) * $limit;
    $total_items = count($jsonarray); 
    $total_pages = ceil($total_items / $limit);
    $array = array_splice($jsonarray, $offset, $limit);
    $fp = fopen('data_script.json','w');
    fwrite($fp, json_encode($array));
    fclose($fp);
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
    $rows_city = $Data->city();
    $rows = $Data->tables();
    $random_int = $Data->random_int(10);
    if (isset($_GET['like'])) {
      # code.
      $data = explode("-",$_GET['like']);
      echo $data;
      if ($data[3] == 'like') {
        # code...
        $Data->like(trim($data[0]),$data[1],$data[2]);
        $Data->insert_to_favorite(trim($data[0]),$data[1],$data[2],$id_user);
        echo json_encode($data);
        exit();
      }
      if ($data[3] == 'dislike') {
        # code...
        $Data->dislike(trim($data[0]),$data[1],$data[2]);
        $Data->delete_from_favorite(trim($data[0]),$data[1],$data[2],$id_user);
        echo json_encode($data);
        exit();
      }

  }
    if (isset($_POST['submit'])) {
      extract($_POST);
      if ($category==-1) {
        # code...
        $category = null;
      }
      if ($city==-1) {
        # code...
        $city = null;
      }
      if($search_prod != null and $category != null and $city != null){
        
        #search
        $i = 1;
        header("location:search_data.php?category=$category&city=$city&search=$search_prod&f=$i");
       
      }
      elseif ($search_prod != null and $category != null) {
        $i = 2;
        header("location:search_data.php?category=$category&search=$search_prod&f=$i");
      }
      elseif($category != null and $city != null){
        #search
        $i = 3;
        header("location:search_data.php?category=$category&city=$city&f=$i");

      }
      elseif($search_prod != null and $city != null){
        $i=4;
        header("location:search_data.php?search=$search_prod&city=$city&f=$i");
      }

      elseif($category != null){
        #search
        $i=5;
        header("location:search_data.php?category=$category&f=$i");
      }

      elseif($search_prod != null){
        #search
        $i=6;
        header("location:search_data.php?search=$search_prod&f=$i");
      }

      elseif($city != null){
        #search
        $i=7;
        header("location:search_data.php?city=$city&f=$i");
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
      <link rel="stylesheet" href="css/index.css">
      <link rel="stylesheet" href="css/pagination.css">
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
  <!-- Start Search Form -->
    <div class="form-holder">
      <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <div class="search-prod">
          <input type="text" name="search_prod" id="" placeholder="What are you search for?">
          <button type="submit" name="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        <div class="search-cat">
          <!-- <div class="searchField" id="searchField">
            <p id="selectText">Select Category</p>
            <i class="fa-solid fa-angle-down" id="arrowIcon"></i>
          </div> -->
            <select class="select-city form-control text-capitalize shadow-none" name="category" id="select-cat">
            <option value="-1">
              <p>select category</p>
              </option>
              <option value="pc">
              <p>PCs & Computers</p>
              </option>
              <option value="tele">
              <p>Mobile Phones</p>
              </option>
              <option value="phone_tab">
              <p>Tablets</p>
              </option>

              <option value="appartement">
              <p>Appartements</p>
              </option>
              <option value="maison">
              <p>house</p>
              </option>
              <option value="clothe">
              <p>Clothes</p>
              </option>
              <option value="shoes">
              <p>Shoes</p>
              </option>
              <option value="cars">
              <p>Cars</p>
              </option>
              <option value="moto">
              <p>Motos</p>
              </option>
              <option value="bike">
              <p>Bikes</p>
              </option>
              <option value="home_ecoration">
              <p>Home Decoration</p>
              </option>
              <option value="watches">
              <p>watches</p>
              </option>
              <option value="cat">
              <p>Cats</p>
              </option>
              <option value="dog">
              <p>Dogs</p>
              </option>
              <option value="pets">
              <p>Others</p>
              </option>
            </select>
        </div>
        <div class="wrapper">
          <div class="select-btn" id="searchCity">
            <!-- <div class="search">
              <i class="fa-solid fa-search"></i>
              <input spellcheck="false" type="text" placeholder="Search">
            </div> -->
            <select class="form-control select-city shadow-none" name="city" id="" style="border:none">
            <option value="-1">Choose City</option>
            <?php  foreach ($rows_city as $row) {?> 
                <option value="<?=$row['nomv'] ?>"><?=$row['nomv'] ?></option>
            <?php }  ?> 
          </select>
          </div>
        </div>
      </form>
    </div>
  <!-- </div> -->
  <!-- End Search Form -->

  <!-- Start Products -->
  <div class="container">
    <div class="products">
      <h1 class="text-center text-capitalize">feautred products</h1>
      <div class="products-holder">
      <?php foreach ($array as $arr) { ?> 
          <div class="box">
            <a href="<?=$arr['table_name']?>.php?id=<?=$arr['id_item'] ?>">
              <img src="<?=explode(',',$arr['table']['image'])[0]; ?>" alt="product name">
              <div class="product-info">
                <h4 class="text-capitalize text-primary"><?=explode(' ',$arr['table']['title'])[0] ?></h4>
                <p class="price"><?=$arr['table']['price'] ?></p>
              </div>
              <div class="category">
                <div class="cat">
                  <img src="img/grid_icon.svg" alt="">
                  <?php if($arr['table_name']=='tele' ){ ?> 
                    <p class="cat text-capitalize">television</p> 
                  <?php }elseif($arr['table_name']=='phone_tab'){ ?> 
                    <p class="cat text-capitalize">phone and tablet</p> 
                  <?php }else{  ?> 
                    <p class="cat text-capitalize"><?=$arr['table_name'] ?></p> 
                  <?php } ?> 
                </div>
                <div class="city">
                  <img src="img/location_icon.svg" alt="">
                  <p class="city text-capitalize"><?=$arr['table']['location'] ?></p>
              </div>
            </div>
          </a>
            <div class="icons">
            <?php if($log == 'my account'){
                  if (isset($Data->select_favorite(trim($arr['table_name']),array_keys($arr['table'])[0],$arr['id_item'],$id_user)['idf']))  {;
                    if ($Data->select_favorite(trim($arr['table_name']),array_keys($arr['table'])[0],$arr['id_item'],$id_user) != null) {?> 
                            <a id='<?=trim($arr['table_name']).'-'.$arr['id_item'] ?>' data-value = '<?=$arr['table_name'].'-'.array_keys($arr['table'])[0].'-'.$arr['id_item'] ?>'  ><img src="assets/like.png" alt="" srcset="" width=30%></a>
                    <?php }else {?>
                      <a id='<?=trim($arr['table_name']).'-'.$arr['id_item'] ?>' data-value = '<?=$arr['table_name'].'-'.array_keys($arr['table'])[0].'-'.$arr['id_item'] ?>'  ><img src="assets/dislike.png" alt="" srcset="" width=30%></a> 
                    <?php }}else{ ?> 
                              <a id='<?=trim($arr['table_name']).'-'.$arr['id_item'] ?>' data-value = '<?=$arr['table_name'].'-'.array_keys($arr['table'])[0].'-'.$arr['id_item'] ?>'  ><img src="assets/dislike.png" alt="" srcset="" width=30%></a>
                    <?php } ?> 
                <!-- not login -->
                <?php }else{?>
                  <a id='<?=trim($arr['table_name']).'-'.$arr['id_item'] ?>' data-value = '<?=$arr['table_name'].'-'.array_keys($arr['table'])[0].'-'.$arr['id_item'] ?>' style = 'visibility:hidden'><i class="fa-solid fa-heart"></i></a>
                <?php  }  ?>
            </div>
          </div>
      <?php } ?> 
      <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
      <script src="js/index.js"></script>
      </div>
    </div>
  </div>      
  <!-- Start Pagination -->
      
  <div class="container w-50" >
    <!-- <nav aria-label="..."> -->
      <div class="custom-pagin pagination justify-content-center" style="display:inline-table;" >
        <?php if($page!=1) {?> 
          <div class="page-item"style="display:table-cell;">
            <a class="page-link" href="index.php?page=<?=$page-1?>">Previous</a>
        </div>
        <?php } ?> 
          <?php for($j=1;$j<=$total_pages;$j++) {?>
          <?php if($j == $page) {?> 
            <div class="page-item  active"style="display:table-cell;">
              <a class="page-link" href="index.php?page=<?=$j?>"><?=$j?> <span class="sr-only">(current)</span></a>
            </div>
          <?php }else{ ?> 
            <div class="page-item"style="display:table-cell;"><a class="page-link" href="index.php?page=<?=$j?>"><?=$j?></a></div>
          <?php }} ?> 
          <?php if($page < $total_pages) {?> 
            <div class="page-item"  style="display:table-cell;">
              <a class="page-link" href="index.php?page=<?=$page + 1?>">Next</a>
            </div>
        <?php } ?> 
    </div>
      <!-- </nav> -->
    <!-- End Pagination -->

    </div> 

  <!-- End Products -->
<?php include('_footer.php')?>


    <script type="text/javascript">
      // Variables declaration
      var searchField = document.getElementById("searchField");
      var selectText = document.getElementById("selectText");
      var catList = document.getElementById("catList");
      var options = document.getElementsByClassName("options");
      var searchCity = document.getElementById("searchCity");
      var cityContent = document.getElementById("cityContent");
      var arrowIcon = document.getElementById("arrowIcon");
      var arrowIconCity = document.getElementById("arrowIconCity");
      var cityOptions = document.getElementById("cityOptions");
      var coptions = document.getElementsByClassName("c-options");
      var selectCity = document.getElementById("selectCity");
      
      //Array of City
      
      // End Variables declaration

      //fetch from json
      // fetch('./assets/ville.json')
      // .then(function(response) {
      //   return response.json();
      // })
      // .then(function(data) {
      //   for(var i=0; i<data.length; i++) {
      //     let marocCity = [];
      //     marocCity.push(data[i].ville)
      //     console.log(marocCity);
      //     function addCity(){
      //     marocCity.forEach(city => {
      //     console.log(city)
      //     let li = `<li class="c-options">${city}</li>`
      //     cityOptions.insertAdjacentHTML("beforeend", li)
      //   });
      // }
      // addCity()
      // }
      // //for search city
      //   searchCity.onclick = function(){
      //   cityContent.classList.toggle("hide");
      //   arrowIconCity.classList.toggle("rotateIcon");
      // }
      // for(option of coptions){
      //   option.onclick = function(){
      //     selectCity.innerHTML = this.textContent
      //     cityContent.classList.toggle("hide");
      //     arrowIconCity.classList.toggle("rotateIcon");
      //   }
      // }
      // });
      //end fetch from json

        

      // For displaying and hiding category list and rotate arrow icon
      // searchField.onclick = function(){
      //   catList.classList.toggle("hide");
      //   arrowIcon.classList.toggle("rotateIcon");
      // }
      // // For showing selected item value in select
      // for(option of options){
      //   option.onclick = function(){
      //     selectText.innerHTML = this.textContent
      //     catList.classList.toggle("hide");
      //     arrowIcon.classList.toggle("rotateIcon");
      //   }
      // }
        
    </script>
    
    <!-- <script src="js/script.js"></script> -->
   
    
    
    <script src="js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
</body>
</html>