<!-- include.php -->
<?php include 'inc/include.php'; ?>
<!-- End Of include.php -->

<!-- Passed Form Input To User Class -->
  <?php
    if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['register'])){

        $userRegistration = $user->userRegistration($_POST);
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

    <title>Student Registration Form | LMS </title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">Library Management System</h1>
</div>


<body class="login" style="margin-top: -20px;">



    <div class="login_wrapper">

            <section class="login_content" style="margin-top: -40px;">
                <form name="form1" action="" method="post">
                    <h2>User Registration Form</h2><br>
                     <?php
                         if (isset($userRegistration)) {
                            echo $userRegistration;
                         }

                     ?>
                    <div>
                        <input type="text" class="form-control" placeholder="FirstName" name="firstname" />
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="LastName" name="lastname" />
                    </div>

                    <div>
                        <input type="text" class="form-control" placeholder="Username" name="username" />
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" name="password" />
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="email" name="email" />
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="contact" name="contact" />
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="SEM" name="sem" />
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Enrollment No" name="enrollmentno" />
                    </div>
                    <div class="col-lg-12  col-lg-push-3">
                        <input class="btn btn-default submit " type="submit" name="register" value="Register">
                    </div>

                </form>
            </section>

           <div class="col-lg-12 col-lg-push-3">
               <p class="text-success" style="font-size: 15px;">Already Have Acoount<a style="margin-left: 5px;" class="btn btn-info" href="login.php">Log in</a></p>
           </div>

    </div>




<!-- footer.php -->
<?php include 'inc/footer.php'; ?>
<!-- End Of footer.php -->
