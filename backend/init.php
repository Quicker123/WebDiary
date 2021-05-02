<?php
    require 'connection.php';

    $cookie_name = "user";
    $cookie_value = 1;

    $ry = array();

    $sqlConnect = $ry['sqlconnect'] = mysqli_connect($db_host, $db_username, $db_password, $db_name);

    $ry['site_url'] = $site_url;

    function loadPage($page_url = ''){
        global $ry;
        $page = '../UI/components/'. $page_url . '.phtml';
        $page_content = '';
        ob_start();
        require $page;
        $page_content = ob_get_contents();
        ob_end_clean();
        return $page_content;
    }
?>