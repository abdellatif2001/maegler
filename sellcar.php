<?php 
include 'tables.php'; 
session_start();
if(isset($_SESSION['id'])){
    $Data = new Data();
    if (isset($_GET['marque'])) {
        # code.
        
        
        $model = $Data->selcet_model($_GET['marque']);
        echo json_encode($model);
        exit();
    }
    $id = $_SESSION['id'];
    
    $brands = $Data->selcet_make();
    $rows_city = $Data->city();
    if(isset($_POST['submit'])){
        extract($_POST);
        $image = '';
        for ($i=0; $i <count($_FILES['image']['tmp_name']) ; $i++) { 
            # code...
           $source = $_FILES['image']['tmp_name'][$i];
           $des = "img/".$_FILES['image']['name'][$i];
           move_uploaded_file($source,$des);
           if ($i<count($_FILES['image']['tmp_name'])-1) {
               # code...
               $image .= $des.',';
           }
           else {
               # code...
               $image .= $des;
           }
           

           
        }
        $status = 'pending';
        $likes = 0;
        // insert the data
        $Data->cars_reviews($title,$descrip,$price,$marque,$modele,$annmod,$klm,$carburant,$puss,$boite,$nb_porte,$origine,$pr_main,$etat,$id,$image,$location,$likes,$status);
        
    }
}
else {
    header('location:index.php');
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
    <title>Add Car</title>
</head>
<body>
    <?php include('_navbar.php')?>
    <div class="container">
        <div class="appart-info">
            <h1 class="text-capitalize text-center">general infos</h1>
            <hr>
            <form action="" method="post" enctype='multipart/form-data'>
                <input type="text" name="title" class="form-control shadow-none" placeholder="Title" required>
                <input type="text" name="price" class="form-control shadow-none" placeholder="Price" required>
                <div class="mul-img">
                    <i class="fas fa-upload"></i>
                    <label for="mul-img" class="upload-images">Upload Images</label>
                    <input type="file" name="image[]" id="mul-img" multiple>    
                </div>
                <h6 class="text-center text-capitalize">spécifications</h6>
                <select class="form-control select-city shadow-none" name="location" id="">
                    <option value="-1">Choose City</option>
                    <?php  foreach ($rows_city as $row) {?> 
                        <option value="<?=$row['nomv'] ?>"><?=$row['nomv'] ?></option>
                    <?php }  ?> 
                </select>
                <select name="marque" id="marque" class="form-control shadow-none marque">
                    <option value="0">Marque</option>
                    <?php foreach($brands as $brand) {?> 
                    <option value="<?=$brand['id'] ?>"><?=$brand['title'] ?></option>
                    <?php } ?> 
                </select>
                <select name="modele" id="modele" class="form-control shadow-none">
                    <option value="0">Modele</option>
                </select>
                <select name="annmod" class="form-control shadow-none">
                    <option value="0">Année Modele</option>
                    <option value="1980">1980 ou plus ancien</option>
                    <option value="1981">1981</option>
                    <option value="1982">1982</option>
                    <option value="1983">1983</option>
                    <option value="1984">1984</option>
                    <option value="1985">1985</option>
                    <option value="1986">1986</option>
                    <option value="1987">1987</option>
                    <option value="1988">1988</option>
                    <option value="1989">1989</option>
                    <option value="1990">1990</option>
                    <option value="1991">1991</option>
                    <option value="1992">1992</option>
                    <option value="1993">1993</option>
                    <option value="1994">1994</option>
                    <option value="1995">1995</option>
                    <option value="1996">1996</option>
                    <option value="1997">1997</option>
                    <option value="1998">1998</option>
                    <option value="1999">1999</option>
                    <option value="2000">2000</option>
                    <option value="2001">2001</option>
                    <option value="2002">2002</option>
                    <option value="2003">2003</option>
                    <option value="2004">2004</option>
                    <option value="2005">2005</option>
                    <option value="2006">2006</option>
                    <option value="2007">2007</option>
                    <option value="2008">2008</option>
                    <option value="2009">2009</option>
                    <option value="2010">2010</option>
                    <option value="2011">2011</option>
                    <option value="2012">2012</option>
                    <option value="2013">2013</option>
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                </select>
                <select name="klm" class="form-control shadow-none">
                    <option value="0" >Kilométrage</option>
                    <option value="0 - 4 999">0 - 4 999</option>
                    <option value="5 000 - 9 999">5 000 - 9 999</option>
                    <option value="10 000 - 14 999">10 000 - 14 999</option>
                    <option value="15 000 - 19 999">15 000 - 19 999</option>
                    <option value="20 000 - 24 999">20 000 - 24 999</option>
                    <option value="25 000 - 29 999">25 000 - 29 999</option>
                    <option value="30 000 - 34 999">30 000 - 34 999</option>
                    <option value="35 000 - 39 999">35 000 - 39 999</option>
                    <option value="40 000 - 44 999">40 000 - 44 999</option>
                    <option value="145 000 - 49 999">45 000 - 49 999</option>
                    <option value="150 000 - 54 999">50 000 - 54 999</option>
                    <option value="155 000 - 59 999">55 000 - 59 999</option>
                    <option value="160 000 - 64 999">60 000 - 64 999</option>
                    <option value="165 000 - 69 999">65 000 - 69 999</option>
                    <option value="170 000 - 74 999">70 000 - 74 999</option>
                    <option value="175 000 - 79 999">75 000 - 79 999</option>
                    <option value="180 000 - 84 999">80 000 - 84 999</option>
                    <option value="185 000 - 89 999">85 000 - 89 999</option>
                    <option value="190 000 - 94 999">90 000 - 94 999</option>
                    <option value="295 000 - 99 999">95 000 - 99 999</option>
                    <option value="100 000 - 109 999">100 000 - 109 999</option>
                    <option value="110 000 - 119 999">110 000 - 119 999</option>
                    <option value="120 000 - 129 999">120 000 - 129 999</option>
                    <option value="130 000 - 139 999">130 000 - 139 999</option>
                    <option value="140 000 - 149 999">140 000 - 149 999</option>
                    <option value="150 000 - 159 999">150 000 - 159 999</option>
                    <option value="160 000 - 169 999">160 000 - 169 999</option>
                    <option value="170 000 - 179 999">170 000 - 179 999</option>
                    <option value="180 000 - 189 999">180 000 - 189 999</option>
                    <option value="190 000 - 199 999">190 000 - 199 999</option>
                    <option value="200 000 - 249 999">200 000 - 249 999</option>
                    <option value="250 000 - 299 999">250 000 - 299 999</option>
                    <option value="300 000 - 349 999">300 000 - 349 999</option>
                    <option value="350 000 - 399 999">350 000 - 399 999</option>
                    <option value="400 000 - 449 999">400 000 - 449 999</option>
                    <option value="450 000 - 499 999">450 000 - 499 999</option>
                    <option value="Plus de 500 000">Plus de 500 000</option>
                </select>
                <select name="carburant" class="form-control shadow-none">
                    <option value="0">Carburant</option>
                    <option value="1">Diesel</option>
                    <option value="5">Hybride</option>
                    <option value="2">Essence</option>
                    <option value="3">Electrique</option>
                    <option value="4">LPG</option>
                </select>
                <select name="puss" class="form-control shadow-none">
                    <option value="" >Puissance</option>
                    <option value="4">4 CV</option>
                    <option value="5">5 CV</option>
                    <option value="6">6 CV</option>
                    <option value="7">7 CV</option>
                    <option value="8">8 CV</option>
                    <option value="9">9 CV</option>
                    <option value="10">10 CV</option>
                    <option value="11">11 CV</option>
                    <option value="12">12 CV</option>
                    <option value="13">13 CV</option>
                    <option value="14">14 CV</option>
                    <option value="15">15 CV</option>
                    <option value="16">16 CV</option>
                    <option value="17">17 CV</option>
                    <option value="18">18 CV</option>
                    <option value="19">19 CV</option>
                    <option value="20">20 CV</option>
                    <option value="21">21 CV</option>
                    <option value="22">22 CV</option>
                    <option value="23">23 CV</option>
                    <option value="24">24 CV</option>
                    <option value="25">25 CV</option>
                    <option value="26">26 CV</option>
                    <option value="27">27 CV</option>
                    <option value="28">28 CV</option>
                    <option value="29">29 CV</option>
                    <option value="30">30 CV</option>
                    <option value="31">31 CV</option>
                    <option value="32">32 CV</option>
                    <option value="33">33 CV</option>
                    <option value="34">34 CV</option>
                    <option value="35">35 CV</option>
                    <option value="36">36 CV</option>
                    <option value="37">37 CV</option>
                    <option value="38">38 CV</option>
                    <option value="39">39 CV</option>
                    <option value="40">40 CV</option>
                    <option value="41 CV">41 CV</option>
                    <option value="Plus de 41 CV">Plus de 41 CV</option>
                </select>
                <select name="boite" class="form-control shadow-none">
                    <option value="" >Boite</option>
                    <option value="Automatique">Automatique</option>
                    <option value="Manuelle">Manuelle</option>
                </select>
                <select name="nb_porte" id="" class="form-control shadow-none">
                    <option value="">Nombre De Porte</option>
                    <option value="3">3</option>
                    <option value="5">5</option>
                </select>
                <select name="origine" class="form-control shadow-none">
                    <option value="">Origine</option>
                    <option value="Dédouanée">Dédouanée</option>
                    <option value="Importée neuve">Importée neuve</option>
                    <option value="Pas encore dédouanée">Pas encore dédouanée</option>
                    <option value="WW au Maroc">WW au Maroc</option>
                </select>
                <select name="pr_main" class="form-control shadow-none">
                    <option value="" >Première main</option>
                    <option value="Non">Non</option>
                <option value="Oui">Oui</option></select>
                <select name="etat" class="form-control shadow-none">
                    <option value="">Etat</option>
                    <option value="Excellent">Excellent</option>
                    <option value="Très bon">Très bon</option>
                    <option value="Bon">Bon</option>
                    <option value="Correct">Correct</option>
                    <option value="Endommagé">Endommagé</option>
                    <option value="Pour Pièces">Pour Pièces</option>
                </select>

                <textarea name="descrip" class="form-control shadow-none" rows="10" placeholder="Description"></textarea>
                <div class="form-btns">
                    <button class="sub-btn" name="submit" type="submit" data-toggle="modal" data-target="#submitModal">submit</button>
                    <a class="can-btn" href="index.php">cancel</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Start Modal -->
<!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="submitModal" tabindex="-1" role="dialog" aria-labelledby="submitModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-body">
            <div class="container">
                <i class="fa-solid fa-circle-check fa-2x"></i>
                <h3 class="text-capitalize mb-2 text-gray-700">item submited successfully</h3>
                <hr class="divider">
                <p class="text-capitalize">
                    your item has been submited successfully, you need to check your email in the next
                    3 business days to see our decision. <br>
                    have a nice day
                </p>
            </div>
        </div>
        <div class="modal-footer">
            <button id="item-submited" type="button" class="btn btn-warning">Okay</button>
        </div>
        </div>
    </div>
    </div>

    <script>
        let itemSubmitted = document.getElementById("item-submited");

        itemSubmitted.onclick = function(){
            location.href = "index.php";
        };
    </script>


    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="js/script_car.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
</body>
</html>