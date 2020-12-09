<?php
if (file_exists("../config.php")) {
    include "../config.php";
}else {
    include "config.php";
}

global $db_conn;

session_start();

session_destroy();

 mysqli_query($db_conn,"UPDATE `user` SET `Status` = '0' WHERE `user`.`user_id` = '".$_SESSION["user_id"]."'");

header("Location: ../index.php");

?>