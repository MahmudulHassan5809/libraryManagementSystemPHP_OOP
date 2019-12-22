<!-- include.php -->
<?php include 'include.php'; ?>
<!-- End Of include.php -->

<!-- Check Session -->
<?php Session::checkLibrarianSession(); ?>
<!-- End Of Check Session -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin | LMS </title>


    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/nprogress.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="#" class="site_title"><i class="fa fa-book"></i> <span>LMS</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>

                        <h2><?php echo Session::get('librarianName'); ?></h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li><a href="student_info.php"><i class="fa fa-home"></i> Student Info <span class="fa fa-chevron-down"></span></a>

                            </li>
                            <li><a href="add_book.php"><i class="fa fa-edit"></i> Add Book <span class="fa fa-chevron-down"></span></a>

                            </li>
                            <li><a href="books.php"><i class="fa fa-edit"></i> View Books <span class="fa fa-chevron-down"></span></a>


                            <li><a href="category.php"><i class="fa fa-table"></i> Category <span class="fa fa-chevron-down"></span></a>

                            <li><a href="student_request.php"><i class="fa fa-table"></i> Student Request <span class="fa fa-chevron-down"></span></a>

                           <li><a href="delivery_book_by_code.php"><i class="fa fa-table"></i> Deliver Book By Code <span class="fa fa-chevron-down"></span></a>

                            <li><a href="take_book_by_code.php"><i class="fa fa-table"></i> Return Book <span class="fa fa-chevron-down"></span></a>

                            <li><a href="admin.php"><i class="fa fa-table"></i> Admin Members <span class="fa fa-chevron-down"></span></a>

                             <li><a href="book_description.php"><i class="fa fa-table"></i>Book Description<span class="fa fa-chevron-down"></span></a>
                        </ul>
                    </div>


                </div>

            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <img src="images/img.jpg" alt=""><?php echo Session::get('librarianName'); ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="logout.php?id=<?php echo Session::get('librarianid'); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                               aria-expanded="false">
                                <i class="fa fa-plus" title="Book Request"></i>
                                <span class="badge bg-green"><?php echo $bk->countRequest(); ?></span>
                            </a>

                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                               aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green">6</span>
                            </a>

                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->
