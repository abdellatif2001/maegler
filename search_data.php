<?php 

    include 'tables.php';
    $Data = new Data();
    $f = $_GET['f'];
    $tables =  $Data->tables_name();
    $random_int = $Data->random_int(10);
    if($f==1){
        $table = $_GET['category'];
        $rows = $Data->category_city_search($_GET['category'],$_GET['city'],$_GET['search']);
    }
    elseif($f==2){
        $table = $_GET['category'];
        $rows = $Data->category_search($_GET['category'],$_GET['search']);
    }
    elseif($f==3){
        $table = $_GET['category'];
        $rows = $Data->category_city($_GET['category'],$_GET['city']);
    }
    elseif($f==4){
        $rows = $Data->city_search($_GET['city'],$_GET['search']);
    }
    elseif($f==5){
        $table = $_GET['category'];
        $rows = $Data->categories($_GET['category']);
    }
    elseif($f==6){
        $rows = $Data->search($_GET['search']);
    }
    elseif($f==7){
        $rows = $Data->cities($_GET['city']);
    }
    $c = 0;
    if ($f == 4 or $f == 6 or $f == 7) {
        # code...
        foreach ($tables as $table) {
            if (isset($rows[$table])) {
                # code...
                foreach($rows[$table] as $row){
                    $item = $row;
                    $id = $item[array_keys($item)[0]];
                    $df["$c"] = array();
                    $df["$c"]['id_item'] = $id;
                    $df["$c"]['table_name'] = $table;
                    $df["$c"]['table'] = $item;
                    $c ++;
                    // print_r($row);
                }
    
    
            }
        
        }
    }
    if ($f == 1 or $f == 2 or $f == 3 or $f == 5) {
        # code...
        foreach($rows as $row){
            $item = $row;
            $id = $item[array_keys($item)[0]];
            $df["$c"] = array();
            $df["$c"]['id_item'] = $id;
            $df["$c"]['table_name'] = $table;
            $df["$c"]['table'] = $item;
            $c ++;
        }
    }

    $fp = fopen('assets/search_data.json','w');
    fwrite($fp, json_encode($df));
    fclose($fp);
    header("location:searchResult.php");
 ?> 