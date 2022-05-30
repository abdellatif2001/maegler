<?php 
include 'tables.php'; 
session_start();
if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    $Data = new Data();
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
        $Data->tele_reviews($title,$descrip,$price,$etat,$nb_pouce,$id,$image,$location,$likes,$status);
        
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
    <title>Add Phone</title>
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
                <select class="form-control select-city shadow-none" name="location" >
                    <option value="-1">Choose City</option>
                    <?php  foreach ($rows_city as $row) {?> 
                        <option value="<?=$row['nomv'] ?>"><?=$row['nomv'] ?></option>
                    <?php }  ?> 
                </select>
                <input name="nb_pouce" type ='number' id="" class="form-control shadow-none" placeholder = "Nombre De Pouce">
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



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
</body>
</html>