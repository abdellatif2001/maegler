<?php 
include 'tables.php';
$Data = new Data();
$tables =  $Data->tables_name();
$rows = $Data->tables();
$random_int = $Data->random_int(10);
$df = array();
$c = 0;
foreach ($random_int as $i) { 
foreach ($tables as $table) {
    if (isset($rows[$table][$i])) {
        # code...
        $item = $rows[$table][$i];
        $id = $item[array_keys($item)[0]];
        $df["$c"] = array();
        $df["$c"]['id_item'] = $id;
        $df["$c"]['table_name'] = $table;
        $df["$c"]['table'] = $item;
        $c ++;
    }

}}
$fp = fopen('assets/data.json','w');
fwrite($fp, json_encode($df));
fclose($fp);
header("location:index.php");