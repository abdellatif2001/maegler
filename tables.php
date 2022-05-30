<?php 
class Table {
    public $data;
  
    function __construct($data) {
      $this->data = $data;
    }
    function cars() {
        $title = $this->data['title'];
        $price =  $this->data['price'];
        $marque =  $this->data['marque'];
        $modele =  $this->data['modele'];
        $ann_modele =  $this->data['ann_mod'];
        $klm =  $this->data['klm'];
        $carburant =  $this->data['carburant'];
        $puss =  $this->data['puss'];
        $boite =  $this->data['boite'];
        $nb_porte =  $this->data['nb_porte'];
        $origine =  $this->data['origine'];
        $conducteur =  $this->data['conducteur'];
        $etat =  $this->data['etat'];
        echo "
            <tr>
                <th>title</th>
                <th>$title</th>
            </tr>
            <tr>
                <th>price</th>
                <th>$price</th>
            </tr>
            <tr>
                <th>Marque</th>
                <th>$marque</th>
            </tr>
            <tr>
                <th>modele</th>
                <th>$modele</th>
            </tr>
            <tr>
                <th>Année-Modèle</th>
                <th>$ann_modele</th>
            </tr>
            <tr>
                <th>Kilométrage</th>
                <th>$klm</th>
            </tr>
            <tr>
                <th>carburant</th>
                <th>$carburant</th>
            </tr>
            <tr>
                <th>puissance fiscale</th>
                <th>$puss</th>
            </tr>
            <tr>
                <th>boit vitesse</th>
                <th>$boite</th>
            </tr>
            <tr>
                <th>Nombre de portes</th>
                <th>$nb_porte</th>
            </tr>
            <tr>
                <th>Origine</th>
                <th>$origine</th>
            </tr>
            <tr>
                <th>conducteur</th>
                <th>$conducteur</th>
            </tr>
            <tr>
                <th>État</th>
                <th>$etat</th>
            </tr>";
      }
    function appartement() {
        $title = $this->data['title'];
        $price =  $this->data['price'];
        $nb_chambre =  $this->data['nb_chambre'];
        $nb_salle_bain =  $this->data['nb_salle_bain'];
        $nb_sallon =  $this->data['nb_sallon'];
        $surface =  $this->data['surface'];
        $etage =  $this->data['etage'];
        echo "
            <tr>
                <th>title</th>
                <th>$title</th>
            </tr>
            <tr>
                <th>price</th>
                <th>$price</th>
            </tr>
            <tr>
                <th>Nombre de chambre </th>
                <th>$nb_chambre</th>
            </tr>
            <tr>
                <th>Nombre salle de bain</th>
                <th>$nb_salle_bain</th>
            </tr>
            <tr>
                <th>Nombre du sallon</th>
                <th>$nb_sallon</th>
            </tr>
            <tr>
                <th>surface</th>
                <th>$surface</th>
            </tr>
            <tr>
                <th>price</th>
                <th>$etage</th>
            </tr>";}
        }
class Data {
    public $con;
    public $tables;
    function __construct() {
        $this->con = mysqli_connect('127.0.0.1','root','','maegler') or die(mysqli_error($this->con));
        $this->con_reviews = mysqli_connect('127.0.0.1','root','','maegler_admin') or die(mysqli_error($this->con_reviews));
        $this->tables = ['appartement','bike','	cars','clothe','maison','moto','pc','pets','phone_tab','shoes','tele','watches'];
        $this->tables_reviews = ['appartement_reviews','bike_reviews','cars_reviews','clothe_reviews','maison_reviews','moto_reviews','pc_reviews','pets_reviews','phone_tab_reviews','shoes_reviews','tele_reviews','watches_reviews'];
      }
    function tables_name() {
        return $this->tables;
    }
    function random_int($size) {
        $l = array();
        while (sizeof($l) < $size) {
        $r = rand(0,9);
            if(!in_array($r, $l)){
                array_push($l,$r);
            }
        }
        return $l;
    }
    function city() {
        $query = "SELECT * FROM city ORDER BY nomv";
        $result = mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function tables() {
        $rows = array();
        
        foreach($this->tables as $table){
          $query = "SELECT * FROM $table";
          $result = mysqli_query($this->con,$query) or die(mysqli_error($this->con));
          $rows[$table] = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return $rows;
    }
    function tables_reviews() {
        $rows = array();
        
        foreach($this->tables_reviews as $table){
          $query = "SELECT * FROM $table where status = 'pending' ";
          $result = mysqli_query($this->con_reviews,$query) or die(mysqli_error($this->con_reviews));
          $rows[$table] = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return $rows;
    }
    function user_product($id) {
        $rows = array();
        
        foreach($this->tables_reviews as $table){
          $query = "SELECT * FROM $table where id = $id ";
          $result = mysqli_query($this->con_reviews,$query) or die(mysqli_error($this->con_reviews));
          $rows[$table] = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return $rows;
    }
    function select_user_product($id) {
        $rows = array();
        foreach($this->tables_reviews as $table){
          $query = "SELECT * FROM $table where id = $id";
          $result = mysqli_query($this->con,$query) or die(mysqli_error($this->con));
          $rows[$table] = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return $rows;
    }
    function favorites($id) {

          $query = "SELECT * FROM favorite where id = $id";
          $result = mysqli_query($this->con,$query) or die(mysqli_error($this->con));
          $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $rows;
    }
    function select_product($table,$id_name,$id) {

        $query = "SELECT * FROM $table where $id_name = $id";
        $result = mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        $row = mysqli_fetch_assoc($result);
      return $row;
  }
    function approved($table,$id_name,$id)
    {
        # code...
        $query = "UPDATE $table SET status = 'Approved' where $id_name = '$id'";
        mysqli_query($this->con_reviews,$query) or die(mysqli_error($this->con_reviews));
        return TRUE;
    }
    function rejected($table,$id_name,$id)
    {
        # code...
        $query = "UPDATE $table SET status = 'Removed' where $id_name = '$id'";
        mysqli_query($this->con_reviews,$query) or die(mysqli_error($this->con_reviews));
        return TRUE;
    }
    function select_rv($table,$id_name,$id) {
        $query = "SELECT * FROM $table where $id_name = '$id'";
        $result = mysqli_query($this->con_reviews,$query) or die(mysqli_error($this->con_reviews));
        $row = mysqli_fetch_assoc($result);
        unset($row['status']);
        $key = key($row);
        // unset($row[$key]);
        $row[$key] = null;
        return $row;

    }
    function insert_table($table,$row) {
        switch ($table) {
            case 'appartement':
                # code...
                $this->appartement($row['title'],$row['descrip'],$row['price'],$row['nb_chambre'],$row['nb_salle_bain'],$row['nb_sallon'],$row['surface'],$row['etage'],$row['id'],$row['image'],$row['location'],$row['likes']);
                break;
            case 'bike':
                # code...
                $this->bike($row['title'],$row['descrip'],$row['price'],$row['marque'],$row['etat'],$row['id'],$row['image'],$row['location'],$row['likes'],$row['status']);
                break;
            case 'cars':
                # code...
                $this->cars($row['title'],$row['descrip'],$row['price'],$row['marque'],$row['modele'],$row['annmod'],$row['klm'],$row['carburant'],$row['puss'],$row['boite'],$row['nb_porte'],$row['origine'],$row['pr_main'],$row['etat'],$row['id'],$row['image'],$row['location'],$row['likes']);
                break;
            case 'clothe':
                # code...
                $this->clothe($row['title'],$row['descrip'],$row['price'],$row['etat'],$row['gender'],$row['id'],$row['image'],$row['location'],$row['likes'],$row['status']);
                break;
            case 'maison':
                # code...
                $this->maison($row['title'],$row['descrip'],$row['price'],$row['nb_chambre'],$row['nb_salle_bain'],$row['nb_sallon'],$row['surface'],$row['nb_etage'],$row['id'],$row['image'],$row['location'],$row['likes']);
                break;
            case 'moto':
                # code...
                $this->moto($row['title'],$row['descrip'],$row['price'],$row['ann_mod'],$row['klm'],$row['cyln'],$row['nb_well'],$row['orgine'],$row['pr_main'],$row['etat'],$row['id'],$row['image'],$row['location'],$row['likes']);
                break;
            case 'pc':
                # code...
                $this->pc($row['title'],$row['descrip'],$row['price'],$row['marque'],$row['proce'],$row['graphics'],$row['etat'],$row['ram'],$row['capacity'],$row['id'],$row['image'],$row['location'],$row['likes']);
                break;
            case 'pets':
                # code...
                $this->pets($row['title'],$row['descrip'],$row['price'],$row['etat'],$row['gender'],$row['id'],$row['image'],$row['location'],$row['likes']);
                break;
            case 'phone_tab':
                # code...
                $this->phone_tab($row['title'],$row['descrip'],$row['price'],$row['marque'],$row['modele'],$row['etat'],$row['capacity'],$row['id'],$row['image'],$row['location'],$row['likes']);
                break;
            case 'shoes':
                # code...
                $this->shoes($row['title'],$row['descrip'],$row['price'],$row['etat'],$row['taille'],$row['gender'],$row['id'],$row['image'],$row['location'],$row['likes']);
                break; 
            case 'tele':
                # code...
                $this->tele($row['title'],$row['descrip'],$row['price'],$row['etat'],$row['nb_pouce'],$row['id'],$row['image'],$row['location'],$row['likes']);
                break;
            case 'watches':
                # code...
                $this->watches($row['title'],$row['descrip'],$row['price'],$row['etat'],$row['gender'],$row['id'],$row['image'],$row['location'],$row['likes']);
                break;
            default:
                # code...
                break;
        }
        return TRUE;

    }
    
    function min_len_table() {
        $rows = array();
        $rows = $this->tables();
        $l = sizeof($rows['appartement']);
        foreach($this->tables as $table){
            if ($l > sizeof($rows[$table])) {
                # code...
                $l = sizeof($rows[$table]);
            }
        }
        return $l;
    }
    
    function tables_limet($start_from,$num_per_page) {
        $rows = array();
        
        foreach($this->tables as $table){
          $query = "SELECT * FROM $table limit $start_from,$num_per_page";
          $result = mysqli_query($this->con,$query) or die(mysqli_error($this->con));
          $rows[$table] = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return $rows;
    }

    function category($Categorie_name,$id_name,$id_value) {
        $query = "SELECT * FROM $Categorie_name where $id_name = $id_value";
        $result = mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return mysqli_fetch_assoc($result);

    }

    function categories($Categorie_name) {
        $query = "SELECT * FROM $Categorie_name";
        $result = mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return mysqli_fetch_all($result,MYSQLI_ASSOC);

    }

    function get_user_by_id($user_id) {
        $query = "SELECT * FROM users where id = '$user_id'";
        $result = mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return mysqli_fetch_assoc($result);
    }
    function update_user_info_image($user_id,$full_name,$email,$number,$image) {
        $query = "UPDATE users SET full_name = '$full_name',email = '$email',number = '$number',image = '$image' where id = $user_id";
        mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return TRUE;
    }
    function update_user_info($user_id,$full_name,$email,$number) {
        $query = "UPDATE users SET full_name = '$full_name',email = '$email',number = '$number' where id = $user_id";
        mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return TRUE;
    }
    function like($table,$id_name,$id){
        $query = "UPDATE $table SET likes = likes+1 where $id_name = $id";
        mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return TRUE;
    }
    function dislike($table,$id_name,$id){
        $query = "UPDATE $table SET likes = likes-1 where $id_name = $id";
        mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return TRUE;
    }
    function select_favorite($category,$id_name,$idp,$user_id){
        $query = "SELECT idf FROM favorite where Category = '$category' and idn = '$id_name' and idp = $idp and id = $user_id";
        $result = mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return mysqli_fetch_assoc($result);	
        
    }
    function insert_to_favorite($category,$id_name,$idp,$user_id){
        $query = "INSERT INTO favorite VALUES(null,'$category','$id_name',$idp,$user_id)";
        mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return TRUE;	
    }
    function delete_from_favorite($category,$id_name,$idp,$user_id){
        $query = "DELETE FROM favorite where Category = '$category' and idn = '$id_name' and idp = $idp and id = $user_id";
        mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return TRUE;	
    }



    function selcet_brands() {
        $query = "SELECT id,name FROM brands";
        $result = mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
    function selcet_models($id_branns) {
        $query = "SELECT id,name FROM models where brand_id = $id_branns";
        $result = mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
    function selcet_make() {
        $query = "SELECT id,title FROM make";
        $result = mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
    function selcet_car_make($id) {
        $query = "SELECT title FROM make where id = $id";
        $result = mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }

    function selcet_model($make_id) {
        $query = "SELECT id,title FROM model where make_id = $make_id";
        $result = mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }

    function get_user_by_email($email) {
        $query = "SELECT * FROM users where email = '$email'";
        $result = mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return mysqli_fetch_assoc($result);
    }

    function insert_to_clothe($title,$descrip,$price,$etat,$gender,$id,$image,$location) {
        $query = "INSERT into  clothe(title,descrip,price,etat,gender,id,image,location) values('$title','$descrip','$price','$etat','$gender','$id','$image','$location')";
        mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return TRUE;
    }
    function appartement_reviews($title,$descrip,$price,$nb_chambre,$nb_salle_bain,$nb_sallon,$surface,$etage,$id,$image,$location,$likes,$status) {
        $query = "INSERT into  appartement_reviews values(null,'$title','$descrip','$price','$nb_chambre','$nb_salle_bain','$nb_sallon','$surface','$etage',$id,'$image','$location',$likes,'$status')";
        mysqli_query($this->con_reviews,$query) or die(mysqli_error($this->con_reviews));
        return TRUE;
    }
    function gadget_reviews($title,$type,$price,$etat,$descrip,$id,$image,$location,$likes,$status) {
        $query = "INSERT into  gadget_reviews values(null,'$title','$type','$price','$etat','$descrip',$id,'$image','$location',$likes,'$status')";
        mysqli_query($this->con_reviews,$query) or die(mysqli_error($this->con_reviews));
        return TRUE;
    }
    
    function bike_reviews($title,$descrip,$price,$marque,$etat,$id,$image,$location,$likes,$status) {
        $query = "INSERT into  bike_reviews values(null,'$title','$descrip','$price','$marque','$etat',$id,'$image','$location','$likes','$status')";
        mysqli_query($this->con_reviews,$query) or die(mysqli_error($this->con_reviews));
        return TRUE;
    }
    function cars_reviews($title,$descrip,$price,$marque,$modele,$annmod,$klm,$carburant,$puss,$boite,$nb_porte,$origine,$pr_main,$etat,$id,$image,$location,$likes,$status) {
        $query = "INSERT into  cars_reviews values(null,'$title','$descrip','$price','$marque','$modele','$annmod','$klm','$carburant','$puss','$boite','$nb_porte','$origine','$pr_main','$etat',$id,'$image','$location',$likes,'$status')";
        mysqli_query($this->con_reviews,$query) or die(mysqli_error($this->con_reviews));
        return TRUE;
    }
    function clothe_reviews($title,$descrip,$price,$etat,$gender,$id,$image,$location,$likes,$status) {
        $query = "INSERT into  clothe_reviews values(null,'$title','$descrip','$price','$etat','$gender',$id,'$image','$location',$likes,'$status')";
        mysqli_query($this->con_reviews,$query) or die(mysqli_error($this->con_reviews));
        return TRUE;
    }
    function maison_reviews($title,$descrip,$price,$nb_chambre,$nb_salle_bain,$nb_sallon,$surface,$nb_etage,$id,$image,$location,$likes,$status) {
        $query = "INSERT into  maison_reviews values(null,'$title','$descrip','$price','$nb_chambre','$nb_salle_bain','$nb_sallon','$surface','$nb_etage',$id,'$image','$location',$likes,'$status')";
        mysqli_query($this->con_reviews,$query) or die(mysqli_error($this->con_reviews));
        return TRUE;
    }
    function moto_reviews($title,$descrip,$price,$ann_mod,$klm,$cyln,$nb_well,$orgine,$pr_main,$etat,$id,$image,$location,$likes,$status) {
        $query = "INSERT into  moto_reviews values(null,'$title','$descrip','$price','$ann_mod','$klm','$cyln','$nb_well','$orgine','$pr_main','$etat',$id,'$image','$location',$likes,'$status')";
        mysqli_query($this->con_reviews,$query) or die(mysqli_error($this->con_reviews));
        return TRUE;
    }
    function pc_reviews($title,$descrip,$price,$marque,$proce,$graphics,$etat,$ram,$capacity,$id,$image,$location,$likes,$status) {
        $query = "INSERT into  pc_reviews values(null,'$title','$descrip','$price','$marque','$proce','$graphics','$etat','$ram','$capacity',$id,'$image','$location',$likes,'$status')";
        mysqli_query($this->con_reviews,$query) or die(mysqli_error($this->con_reviews));
        return TRUE;
    }
    function pets_reviews($title,$descrip,$price,$etat,$gender,$id,$image,$location,$likes,$status) {
        $query = "INSERT into  pets_reviews values(null,'$title','$descrip','$price','$etat','$gender',$id,'$image','$location',$likes,'$status')";
        mysqli_query($this->con_reviews,$query) or die(mysqli_error($this->con_reviews));
        return TRUE;
    }
    function phone_tab_reviews($title,$descrip,$price,$marque,$modele,$etat,$capacity,$id,$image,$location,$likes,$status) {
        $query = "INSERT into  phone_tab_reviews values(null,'$title','$descrip','$price','$marque','$modele','$etat','$capacity',$id,'$image','$location',$likes,'$status')";
        mysqli_query($this->con_reviews,$query) or die(mysqli_error($this->con_reviews));
        return TRUE;
    }
    function shoes_reviews($title,$descrip,$price,$etat,$taille,$gender,$id,$image,$location,$likes,$status) {
        $query = "INSERT into  shoes_reviews values(null,'$title','$descrip','$price','$etat','$taille','$gender',$id,'$image','$location',$likes,'$status')";
        mysqli_query($this->con_reviews,$query) or die(mysqli_error($this->con_reviews));
        return TRUE;
    }
    function tele_reviews($title,$descrip,$price,$etat,$nb_pouce,$id,$image,$location,$likes,$status) {
        $query = "INSERT into  tele_reviews values(null,'$title','$descrip','$price','$etat','$nb_pouce',$id,'$image','$location',$likes,'$status')";
        mysqli_query($this->con_reviews,$query) or die(mysqli_error($this->con_reviews));
        return TRUE;
    }
    function watches_reviews($title,$descrip,$price,$etat,$gender,$id,$image,$location,$likes,$status) {
        $query = "INSERT into  watches_reviews values(null,'$title','$descrip','$price','$etat','$gender',$id,'$image','$location',$likes,'$status')";
        mysqli_query($this->con_reviews,$query) or die(mysqli_error($this->con_reviews));
        return TRUE;
    }
    function insert_to_user($full_name,$email,$encrypted_password,$number,$verification_code) {
        $query = "INSERT into users(full_name,email,password,number,image,verification_code,verification_status) values('$full_name','$email','$encrypted_password','$number','users_profil/profil.jpg','$verification_code','not verified')";
        mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return TRUE;
    }
    function insert_to_table($table,$row) {
        $query = "INSERT into $table values $row";
        mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return TRUE;
    }

    function appartement($title,$descrip,$price,$nb_chambre,$nb_salle_bain,$nb_sallon,$surface,$etage,$id,$image,$location,$likes) {
        $query = "INSERT into  appartement values(null,'$title','$descrip','$price','$nb_chambre','$nb_salle_bain','$nb_sallon','$surface','$etage',$id,'$image','$location',$likes)";
        mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return TRUE;
    }
    function gadget($title,$type,$price,$etat,$descrip,$id,$image,$location,$likes) {
        $query = "INSERT into  gadget_reviews values(null,'$title','$type','$price','$etat','$descrip',$id,'$image','$location',$likes)";
        mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return TRUE;
    }
    function bike($title,$descrip,$price,$marque,$etat,$id,$image,$location,$likes,$status) {
        $query = "INSERT into  bike values(null,'$title','$descrip','$price','$marque','$etat',$id,'$image','$location','$likes')";
        mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return TRUE;
    }
    function cars($title,$descrip,$price,$marque,$modele,$annmod,$klm,$carburant,$puss,$boite,$nb_porte,$origine,$pr_main,$etat,$id,$image,$location,$likes) {
        $query = "INSERT into  cars values(null,'$title','$descrip','$price','$marque','$modele','$annmod','$klm','$carburant','$puss','$boite','$nb_porte','$origine','$pr_main','$etat',$id,'$image','$location',$likes)";
        mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return TRUE;
    }
    function clothe($title,$descrip,$price,$etat,$gender,$id,$image,$location,$likes,$status) {
        $query = "INSERT into  clothe values(null,'$title','$descrip','$price','$etat','$gender',$id,'$image','$location',$likes)";
        mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return TRUE;
    }
    function maison($title,$descrip,$price,$nb_chambre,$nb_salle_bain,$nb_sallon,$surface,$nb_etage,$id,$image,$location,$likes) {
        $query = "INSERT into  maison values(null,'$title','$descrip','$price','$nb_chambre','$nb_salle_bain','$nb_sallon','$surface','$nb_etage',$id,'$image','$location',$likes)";
        mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return TRUE;
    }
    function moto($title,$descrip,$price,$ann_mod,$klm,$cyln,$nb_well,$orgine,$pr_main,$etat,$id,$image,$location,$likes) {
        $query = "INSERT into  moto values(null,'$title','$descrip','$price','$ann_mod','$klm','$cyln','$nb_well','$orgine','$pr_main','$etat',$id,'$image','$location',$likes)";
        mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return TRUE;
    }
    function pc($title,$descrip,$price,$marque,$proce,$graphics,$etat,$ram,$capacity,$id,$image,$location,$likes) {
        $query = "INSERT into  pc values(null,'$title','$descrip','$price','$marque','$proce','$graphics','$etat','$ram','$capacity',$id,'$image','$location',$likes)";
        mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return TRUE;
    }
    function pets($title,$descrip,$price,$etat,$gender,$id,$image,$location,$likes) {
        $query = "INSERT into  pets values(null,'$title','$descrip','$price','$etat','$gender',$id,'$image','$location',$likes)";
        mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return TRUE;
    }
    function phone_tab($title,$descrip,$price,$marque,$modele,$etat,$capacity,$id,$image,$location,$likes) {
        $query = "INSERT into  phone_tab values(null,'$title','$descrip','$price','$marque','$modele','$etat','$capacity',$id,'$image','$location',$likes)";
        mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return TRUE;
    }
    function shoes($title,$descrip,$price,$etat,$taille,$gender,$id,$image,$location,$likes) {
        $query = "INSERT into  shoes values(null,'$title','$descrip','$price','$etat','$taille','$gender',$id,'$image','$location',$likes)";
        mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return TRUE;
    }
    function tele($title,$descrip,$price,$etat,$nb_pouce,$id,$image,$location,$likes) {
        $query = "INSERT into  tele values(null,'$title','$descrip','$price','$etat','$nb_pouce',$id,'$image','$location',$likes)";
        mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return TRUE;
    }
    function watches($title,$descrip,$price,$etat,$gender,$id,$image,$location,$likes) {
        $query = "INSERT into  watches values(null,'$title','$descrip','$price','$etat','$gender',$id,'$image','$location',$likes)";
        mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return TRUE;
    }

    function update_verification_status($email) {
        $query = "UPDATE users SET verification_status = 'verified' where email = '$email'";
        mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return TRUE;
    }
    function update_password($password,$email) {
        $query = "UPDATE users SET password = '$password' where email = '$email'";
        mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return TRUE;
    }

    function update_verification_code($verification_code,$email) {
        $query = "UPDATE users SET verification_code = '$verification_code' where email = '$email'";
        mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return TRUE;
    }
    function category_city_search($category,$city,$search){
        $query = "SELECT * FROM $category WHERE location = '$city' and title like ('%$search%') or descrip like ('%$search%') ";
        $result = mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    function category_search($category,$search){
        $query = "SELECT * FROM $category WHERE title like ('%$search%') or descrip like ('%$search%') ";
        $result = mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    function category_city($category,$city){
        $query = "SELECT * FROM $category WHERE location = '$city'";
        $result = mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    function city_search($city,$search) {
        $rows = array();
        foreach($this->tables as $table){
          $query = "SELECT * FROM $table where location='$city' and title like ('%$search%') or descrip like ('%$search%')";
          $result = mysqli_query($this->con,$query) or die(mysqli_error($this->con));
          $rows[$table] = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return $rows;
    }
    function search($search) {
        $rows = array();
        foreach($this->tables as $table){
          $query = "SELECT * FROM $table where title like ('%$search%') or descrip like ('%$search%')";
          $result = mysqli_query($this->con,$query) or die(mysqli_error($this->con));
          $rows[$table] = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return $rows;
    }
    function cities($city) {
        $rows = array();
        foreach($this->tables as $table){
          $query = "SELECT * FROM $table where location = '$city'";
          $result = mysqli_query($this->con,$query) or die(mysqli_error($this->con));
          $rows[$table] = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return $rows;
    }
}