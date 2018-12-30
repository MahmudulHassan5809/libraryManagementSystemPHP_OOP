<!-- include.php -->
<?php include 'inc/include.php'; ?>
<!-- End Of include.php -->

<!-- Check Login -->
<?php Session::checkLogin(); ?>
<!-- End Of Check Login -->

<!-- Passed Form Input To User Class -->
  <?php
    if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['login'])){

        $userLogin = $user->userLogin($_POST);
    }
   ?>
<!-- End of Passing input -->




<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student Login Form | LMS </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">Library Management System</h1>
</div>

<br>

<body class="login">


<div class="login_wrapper">

    <section class="login_content">
        <form name="form1" action="" method="post">
            <h1>User Login Form</h1>
              <?php
                 if (isset($userLogin)) {
                    echo $userLogin;
                 }

                ?>
            <div>
                <input type="text" name="email" class="form-control" placeholder="Email" required=""/>
            </div>
            <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required=""/>
            </div>
            <div>

                <input class="btn btn-default submit" type="submit" name="login" value="Login">
                <a class="reset_pass" href="#">Lost your password?</a>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
                <p class="change_link">New to site?
                    <a href="registration.php"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br/>


            </div>
        </form>
    </section>


</div>




<!-- footer.php -->
<?php include 'inc/footer.php'; ?>
<!-- End Of footer.php -->
