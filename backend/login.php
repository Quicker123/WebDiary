<?php
    global $sqlConnect;
    $do = $_GET['do'];
    if($do == "signin"){
        $name = $_POST['fullName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $rePassword = $_POST['reEnterPassword'];

        if($password === $rePassword){
            $password = md5($password);
            $query = mysqli_query($conn, "SELECT * FROM user Where user_email = '$email'");
            $result = mysqli_fetch_assoc($query);
            if(mysqli_num_rows($query) == 0){
                $query = mysqli_query($sqlConnect, "INSERT INTO user (user_name, user_email, user_password) values ('$name', '$email', '$password')");
                if($query){
                    $data = array('status' => 200, 'message' => "Successfully registered");
                }
            }
        }
    }
    echo json_encode($data);

?>