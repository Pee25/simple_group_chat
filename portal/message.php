<?php 
session_start();
if(!isset($_SESSION["user_id"])){

  header("Location: ../index.php");

}

include 'controller/Functions.php';


// $receiver = receive();

// var_dump($message); die();

// if(isset($_POST['send'])){

//     InsertMsg($_POST);
//     unset($_POST);

// }
$message = messages();

?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Messenger Clone</title>
</head>

<body>
    <nav style="position: absolute; right: 2%; top: 2%">
        <a href="logout.php" class="btn btn-primary">Logout</a>
    </nav>

    <h2 class="text-center mt-5">Chat Messages</h2>

    <div class="container" style="background: #fff; height: 80vh; overflow: auto; border: 1px solid #00000116">

        <div class="my-5">

            <!-- <input type="text" name="receive_id" value="<?php echo $_GET['id']; ?>"> -->


            <!-- <div class="contain">
                        <div class="row">
                            <div class="col-auto">
                                <img src="assets/image/avatar.jpg" alt="Avatar" style="width:100%;">
                            </div>
                            <div class="col-lg">
                                <p><?php echo $receive["Email"]; ?></p>
                                <p><?php echo $receive['message']; ?></p>
                                <small
                                    class="time-right"><?php echo date("F j, Y, g:i a", strtotime($messages['date'])); ?></small>
                            </div>
                        </div>
                    </div> -->


            <?php
                $rightAngle = 0;
                foreach($message as $key => $messages) {

                    if($_SESSION['user_id'] != $messages['sent_by']){
                ?>

            <div class="contain">
                <div class="row">
                    <div class="col-auto">
                        <img src="assets/image/avatar.jpg" alt="Avatar" style="width:100%;">
                    </div>
                    <div class="col-lg">
                        <p><?php echo $messages['FirstName']; ?> - (<?php echo $messages['Email']; ?>)</p>
                        <p><?php echo $messages['message']; ?></p>
                        <small
                            class="time-right"><?php echo date("F j, Y, g:i a", strtotime($messages['date'])); ?></small>
                    </div>
                </div>
            </div>


            <?php } ?>


            <?php if($messages['sent_by'] == $_SESSION['user_id'] && $messages['sent_by'] != "") { ?>

            <div class="contain darker">
                <img src="assets/image/avatar.jpg" alt="Avatar" class="right" style="width:100%;">
                <p><?php echo $_SESSION["user_details"]['FirstName']; ?> - ( You )</p>
                <p><?php echo $messages['message']; ?></p>
                <small class="time-left"><?php echo date("F j, Y, g:i a", strtotime($messages['date'])); ?></small>
            </div>

            <?php }} ?>

        </div>
    </div>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $_GET['id']; ?>" method="post">
    <input type="hidden" name="userId" value="<?php echo $_SESSION['user_id']; ?>">

        <div class="container">
            <hr>
            <div class="form-group mt-5">
                <textarea class="form-control" name="message" id="message" rows="3"
                    placeholder="Write Message..."></textarea>
                <button type="submit" name="send" class="btn btn-primary float-right mt-2 mb-5">Send</button>

            </div>
        </div>

    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

</body>

</html>