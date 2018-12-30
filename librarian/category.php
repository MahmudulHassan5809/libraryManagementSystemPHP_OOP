<!-- Include header.php -->
<?php include 'inc/header.php'; ?>
<!-- end of header.php  -->

<!-- Passed Form Input To Addbook Class -->
  <?php
    if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['addcategory'])){
        $category_name = $_POST['category_name'];
        $addCategory = $ct->addCategory($category_name);
    }
   ?>
<!-- End of Passing input -->

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
                                <?php
                                  if (isset($addCategory)) {
                                      echo $addCategory;
                                  }


                                ?>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="col-md-5">
                                    <form role="form" method="post" id="reused_form">
                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <label>Category Name:</label>
                                                <input type="text" class="form-control"  name="category_name"  maxlength="50">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 form-group">
                                                <input class="btn btn-success btn-lg btn-block" type="submit" name="addcategory" value="Upload">
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <div class="col-md-7">
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>SL NO</th>
                                                <th>Category name</th>
                                                <th>Action</th>
                                             </tr>
                                        </thead>

                                        <tbody>
                                        <?php
                                            $result=$ct->getallCat();
                                            $i = 0;
                                            if($result)
                                            {
                                               while ($value=$result->fetch_assoc()) {
                                                $i++;
                                            ?>

                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $value['category_name']; ?></td>
                                                <td>
                                                <a  href="edit_cat.php?id=<?php echo $value['id'] ;?>" class="glyphicon glyphicon-pencil btn btn-success"><a>
                                                <a onclick="return confirm('Are You Sure');" href="delete_cat.php?id=<?php echo $value['id'] ;?>" class="glyphicon glyphicon-trash btn btn-danger"><a>
                                                </td>
                                            </tr>
                                        <?php } } ?>
                                        </tbody>
                                    </table>
                                </div>
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
