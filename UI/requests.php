<?php
    require 'backend/init.php';

    $f = '';
    $s = '';
    $data = array();

    $page = '';

    if(isset($_GET['f'])){
        $f = $_GET['f'];
    }
    if(isset($_GET['s'])){
        $s = $_GET['s'];
    }
    if ($f  == 'home'){
        $data = array('status' => 200, 'html' => loadPage('home'));
    }
    if($f == 'iceCream'){
        $data =  array('status'=> 200, 'html' => loadPage('iceCream'));
    }
    header("content-type: application/json");
    echo json_encode($data);
    exit();
?>