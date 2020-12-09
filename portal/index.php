<?php 
session_start();
if(!isset($_SESSION["user_id"])){

  header("Location: ../index.php");

}


include 'controller/Functions.php';

       
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

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="container mt-5">
            <div class="form-group mt-5">
                <div class="form-group">
                    <input type="text" class="form-control" style="margin-top: 9%" name="keyword"
                        placeholder="Search User">
                </div>
                <button type="submit" name="sub" class="btn btn-primary float-right mb-5">Search</button>
            </div>
        </div>

    </form>

    <?php 
    if(isset($_POST['sub'])){
        if(!empty($_POST['keyword'])){
        $users = findUser($_POST);
    foreach($users as $user){ 
        ?>


    <div class="container">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th><?php echo $user['FirstName']; ?></th>
                    <td><?php echo $user['LastName']; ?></td>
                    <td><?php echo $user['Email']; ?></td>
                    <!-- <td style="width: 30px"><a href="message.php?id=<?php echo $user['user_id']; ?>" name="search"
                            class="btn btn-warning float-right mb-5">Message</a>
                    </td> -->
                </tr>
            </tbody>
        </table>
    </div>

    <?php }  
        } else{
            echo '<script>alert("No Result");</script>';
        }
    }
    ?>

    <div class="container text-center">


        <a href="message.php?id=<?php echo $_SESSION['user_id']; ?>" name="search"
            class="btn btn-warning mb-5">Enter Group Chat</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

</body>

</html>