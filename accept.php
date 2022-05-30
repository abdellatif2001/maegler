<?php 
session_start();
include 'tables.php';
$Data = new Data();
if (!isset($_GET['id'])) {
    # code...
    header("location:index.php");
}
$ids = array('phone_tab'=>'idp','tele'=>'idt','pc'=>'idpc','cars'=>'idcar','moto'=>'idm','bike'=>'idb','appartement'=>'idappartement','maison'=>'idmaison','clothe'=>'idclothe','shoes'=>'idshoes','watches'=>'idw','pets'=>'idpets');
$id = $_GET['id'];
$table = $_GET['table'];
if ($table == 'phone_tab_reviews') {
    # code...
    $table = 'phone_tab';
    $id_name = $ids[$table];
} else {
    # code...
    $table = explode('_',$table)[0];
    $id_name = $ids[$table];
}

$Data->approved($_GET['table'],$id_name,$_GET['id']);
$row = $Data->select_rv($_GET['table'],$id_name,$id);
$Data->insert_table($table,$row);

header('location:manage.php');
