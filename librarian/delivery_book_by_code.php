<!-- Include header.php -->
<?php include 'inc/header.php'; ?>
<!-- end of header.php  -->



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
                                <h2>Plain Page</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                 <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Student name</th>
                                                <td>EnrollMent No</td>
                                                <td>Request Code</td>
                                                <th>Action</th>
                                             </tr>
                                        </thead>

                                        <tbody>
                                         <?php
                                            $result = $bk->getBookToDeliver();

                                            if (isset($result) && $result !== false) {
                                                foreach ($result as $value) {
                                            ?>

                                            <tr>
                                                <td><?php echo $value['user_name']; ?></td>
                                                <td><?php echo $value['enrollment_no']; ?></td>
                                                <td><?php echo $value['request_code']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal<?php echo $value['rId'] ;?>">
                                                      Deliver Book
                                                   </button>
                                                </td>
                                            </tr>
                                            <?php include 'inc/delivery_modal.php'; ?>
                                        <?php } } ?>
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->



<!-- Include footer.php -->
<?php include 'inc/footer.php'; ?>
<!-- end of footer.php  -->
