<!-- Include header.php -->
<?php include 'inc/header.php'; ?>
<!-- end of header.php  -->

<?php



?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Plain Page</h3>
                    </div>

                    <?php include 'inc/search.php'; ?>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <!-- <h2>Plain Page</h2> -->


                                <?php

                                    $active_msg = Session::get('active');
                                    $notactive_msg = Session::get('notactive');
                                    if (isset($active_msg) && $active_msg !== false){
                                        echo $fm->display_success_message($active_msg);
                                        unset($_SESSION['active']);
                                    }elseif(isset($notactive_msg) && $notactive_msg !== false){
                                        echo $fm->display_error_message($notactive_msg);
                                        unset($_SESSION['notactive']);
                                    }

                                ?>


                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                 <!-- Data Table -->

                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Sem</th>
                                            <th>Contact</th>
                                            <th>EnrollMent No</th>
                                            <th>Status</th>
                                            <th>Deatils</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                         $getALlStudentInfo = $lb->getALlStudentInfo();
                                         if ($getALlStudentInfo) {
                                            while($value = $getALlStudentInfo->fetch_assoc()){

                                        ?>
                                        <tr>
                                            <td><?php echo $value['first_name']; ?></td>
                                            <td><?php echo $value['last_name']; ?></td>
                                            <td><?php echo $value['user_name']; ?></td>
                                            <td><?php echo $value['email']; ?></td>
                                            <td><?php echo $value['sem']; ?></td>
                                            <td><?php echo $value['contact']; ?></td>
                                            <td><?php echo $value['enrollment_no']; ?></td>
                                            <td><?php echo $value['status'] == 0 ?  "Not Active" : "Active" ;?>
                                            <div>
                                                <?php
                                                  if ($value['status'] == 0) { ?>
                                                     <a onclick="return confirm('Are You Sure');" href="active.php?id=<?php echo $value['id'] ;?>" class="btn btn-info btn-xs">Active</a>
                                                <?php  } else{ ?>
                                                     <a onclick="return confirm('Are You Sure');" href="notactive.php?id=<?php echo $value['id'] ;?>" class="btn btn-danger btn-xs">Not Active</a>
                                                <?php } ?>
                                            </div>
                                            </td>
                                            <td><a class="btn-xs btn-success btn" href="student_details.php?id=<?php echo $value['id'] ?>">Student Details</a></td>
                                        </tr>
                                        <?php } }else { ?>
                                        <tr>
                                            <td colspan="6">No Data Avialable</td>
                                        </tr>
                                      <?php  } ?>
                                    </tbody>
                                </table>

                                <!-- End Of Data Table -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->


        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Library Management System
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- Include footer.php -->
<?php include 'inc/footer.php'; ?>
<!-- end of footer.php  -->
