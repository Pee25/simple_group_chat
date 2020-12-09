<?php 
include 'controller/user.php';

if(isset($_POST['signin'])){

    // var_dump($_POST, $_POST); die();
    getUser();

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel="stylesheet" href="assets/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- <link rel="stylesheet" type="text/css" href="admin/assets/vendor/css/toastr.min.css"> -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="main">

        <form method="POST" id="loginForm" name="loginForm">
            <section class="sign-in">
                <div class="container">
                    <div class="signin-content">
                        <div class="signin-form">
                            <h2 class="form-title">Login</h2>
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" id="email" name="email" placeholder="Your Email" required />
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" id="password" name="password" placeholder="Password" required />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember
                                    me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
                            </div>

                            <a href="register.php" class="signup-image-link">Create an account</a>

                        </div>
                    </div>
                </div>
            </section>
        </form>

    </div>
    <!-- <script>
    $(document).ready(function() {
        $("#loginForm").submit(function(event) {
            event.preventDefault();
            var username = $("#username").val();
            var password = $("#password").val();
            var usage = "login";
            $.ajax({
                type: 'POST',
                async: false, 
                url: 'admin/scripts/login.php',
                data: {
                    username: username,
                    password: password,
                    usage: usage,
                },
                success: function(response) {

                    if (response == "1") {
                        toastr.error('Account not found!');
                        return false;
                    } else if (response == "2") {
                        toastr.error('Username or password not found');
                        return false;
                    } else if (response == "3") {
                        toastr.error('Invalid input');
                        return false;
                    } else if (response == "Success") {
                        window.location.replace("admin/index.php");
                        return true;
                    }
                }
            });
        });
    });
    </script> -->

</body>

</html>