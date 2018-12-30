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

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                  <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Book Name</th>
                                            <th>Total Quanity</th>
                                            <th>Toatal Price</th>
                                            <th>Baught By</th>
                                            <th>Date</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                         $getAllAdminInfo = $lb->getAllAdminInfo();
                                         if ($getAllAdminInfo) {
                                            while($value = $getAllAdminInfo->fetch_assoc()){

                                        ?>

                                        <tr>
                                            <td><?php echo $value['book_name']; ?></td>
                                            <td><?php echo $value['book_qty']; ?></td>
                                            <td><?php echo $value['book_qty'] * $value['book_price']; ?></td>
                                            <td><?php echo $value['librarian_user_name']; ?></td>
                                            <td><?php echo $value['purchase_date']; ?></td>
                                        </tr>

                                        <?php } }else { ?>
                                        <tr>
                                            <td colspan="6">No Data Avialable</td>
                                        </tr>
                                      <?php  } ?>
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
