<!-- Include header.php -->
<?php include 'inc/header.php'; ?>
<!-- end of header.php  -->


<?php
    if(!isset($_GET['id']) or $_GET['id']==NULL)
  {
    echo "<script>window.lobrandion='category.php'</script>";
  }
  else
  {
    $id=$_GET['id'];
  }
?>

<?php
 if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['update']))
  {

    $category_name = $_POST['category_name'];
    $editCat=$ct->editCat($category_name,$id);
  }
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
                                    if (isset($editCat)) {
                                        echo $editCat;
                                    }

                                ?>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <?php

                                $result=$ct->get_cat_by_id($id);
                                $i = 0;
                                if($result)
                                {
                                   while ($value=$result->fetch_assoc()) {
                                    $i++;
                                ?>
                            <div class="col-md-6">
                                <form role="form" method="post" id="reused_form">
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label>Category Name:</label>
                                            <input type="text" value="<?php echo $value['category_name'] ?>" class="form-control"  name="category_name"  maxlength="50">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <input class="btn btn-success btn-lg btn-block" type="submit" name="update" value="Upload">
                                        </div>
                                    </div>

                                </form>
                            <?php } } ?>
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
