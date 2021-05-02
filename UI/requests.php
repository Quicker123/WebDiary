<?php
    require '../backend/init.php';

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
    if($f == 'navigation'){
        $data = array('status'=>200, 'html' => loadPage('navigation'));
    }

    if($f == 'updateCart'){
        global $sqlConnect;

        if($s == 'add'){
            $queryCheck = mysqli_query($sqlConnect, "SELECT * FROM cart WHERE product_id = '{$_POST['id']}' AND user_id = '$_COOKIE[$cookie_value]'");
        }
        if(mysqli_num_rows($queryCheck)){
            $fetch = mysqli_fetch_assoc($queryCheck);
        }
        $quantity = (fetch['qunatity']);
    }
    header("content-type: application/json");
    echo json_encode($data);
    exit();
?>