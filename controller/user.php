<?php
if (file_exists("../config.php")) {
    include "../config.php";
}else {
    include "config.php";
}

function InsertUser($formDetails){

    global $db_conn;
    
    $date_now = date('Y-m-d H:i:s');
    $pass = md5($formDetails['pass']);

    $sql = "INSERT INTO `user` 
    (`FirstName`, `LastName`, `Email`, `Password`, `Date_Registered`, `Status`) 
    VALUES 
    ('".$formDetails['firstname']."', '".$formDetails['lastname']."', '".$formDetails['email']."', '$pass', '$date_now', '0');";

    mysqli_query($db_conn,$sql);
}

function getUser(){
    
    global $db_conn;

    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $password = md5(filter_var($_POST['password'], FILTER_SANITIZE_STRING));

    $sql = "SELECT * FROM `user` WHERE Email = '$email' AND Password = '$password' ";

    $result = mysqli_query($db_conn,$sql);

    $result_log = mysqli_fetch_array($result);
    $result_num = mysqli_num_rows($result);

    if($result_num != 0){

        $row = mysqli_num_rows($result);
        session_start();
        $_SESSION["user_id"] = $result_log['user_id'];
        $_SESSION["user_details"] = $result_log;

        $result_update = mysqli_query($db_conn,"UPDATE `user` SET `Status` = '1' WHERE `user`.`user_id` = '".$result_log["user_id"]."'");

        header("Location: portal/index.php");
        return;

    }else{
        echo "Account not found!";
    }

}


?>