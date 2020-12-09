<?php 

if (file_exists("../config.php")) {
    include "../config.php";
}else {
    include "config.php";
}

// function InsertMsg($formDetails){

//     global $db_conn;

//     $date_now = date('Y-m-d H:i:s');

//     $sql = "INSERT INTO `transaction` (`message`, `picture`, `date`) VALUES ('".$formDetails["message"]."','', '$date_now')";
 
//     mysqli_query($db_conn,$sql);
// }

// function messages(){

//     global $db_conn;

//     $sql = mysqli_query($db_conn,"SELECT * FROM `transaction`");

//     $fetch = $sql->fetch_all(MYSQLI_ASSOC);

//     return $fetch;

// }

if(isset($_POST['send'])){

    InsertMsg($_POST);
    unset($_POST);

}

function InsertMsg($formDetails){

    global $db_conn;

    $date_now = date('Y-m-d H:i:s');

    $sql = "INSERT INTO `message` 
    (`sent_by`, `message`, `date`) 
    VALUES 
    ('".$formDetails['userId']."', '".$formDetails['message']."', '$date_now')";

    // $receive_query = mysqli_query($db_conn,"INSERT INTO `receive` (`receive_by_id`, `status`) VALUES ('".$formDetails['receive_id']."', '0');");

    mysqli_query($db_conn,$sql);
}

function messages(){

    global $db_conn;

    // $sql = mysqli_query($db_conn,"SELECT * FROM `message` m INNER JOIN user u ON m.sent_by = u.user_id WHERE sent_by = '".$_SESSION["user_id"]."'");
    
    $sql = mysqli_query($db_conn,"SELECT * FROM `message` m INNER JOIN user u ON m.sent_by = u.user_id");

    $fetch = $sql->fetch_all(MYSQLI_ASSOC);

    return $fetch;

}

function receive(){

    global $db_conn;

    $sql = mysqli_query($db_conn,"SELECT DISTINCT COUNT(message_id) record, receive_by, message, Email,date FROM `message` as m INNER JOIN receive as r ON m.receive_by = r.receive_by_id INNER JOIN user u WHERE m.receive_by = '".$_GET['id']."' AND u.user_id = '".$_GET['id']."' GROUP BY m.message DESC");


    $fetch = $sql->fetch_all(MYSQLI_ASSOC);


    $receive = [];
    $message = [];
    $email = [];
    $date = [];

    foreach($fetch as $list_data){
        
		$receive_by = "\"".$list_data['receive_by']."\"";
		$messages = "\"".$list_data['message']."\"";
		$emails = "\"".$list_data['Email']."\"";
		$dates = "\"".$list_data['date']."\"";

		array_push($receive,$receive_by);
		array_push($message,$messages);
		array_push($email,$emails);

    }
    
    $receive_by_strings = implode(",", $receive);
    $message_strings = implode(",", $message);
    $email_strings = implode(",", $email);


    if(is_null($fetch) || empty($fetch)){
        return [];
    }

    return $fetch;

}



function findUser($findUser){

    global $db_conn;

    $sql = "SELECT * FROM `user` WHERE Email LIKE '%".$findUser['keyword']."%' ";

    $result = mysqli_query($db_conn,$sql);
    
    $tobeReturn = $result->fetch_all(MYSQLI_ASSOC);

    if(is_null($tobeReturn) || empty($tobeReturn)){
        return [];
    }
    else{
        
        return $tobeReturn;
    }

}


?>