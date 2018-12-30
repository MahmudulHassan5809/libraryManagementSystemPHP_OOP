<!-- Include header.php -->
<?php include 'inc/header.php'; ?>
<!-- end of header.php  -->


<?php
    if(!isset($_GET['id']) or $_GET['id']==NULL)
  {
    echo "<script>window.lobrandion='books.php'</script>";
  }
  else
  {
    $id=$_GET['id'];
  }
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Plain Page</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                            </div>
                        </div>
                    </div>
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
                                <table id="example" class="table table-striped table-bordered col-md-12" style="width:100%">
                                    <thead>
                                        <tr>

                                            <th>Book Name</th>
                                            <th>Author Name</th>
                                            <th>Publication Name</th>
                                            <th>Available Quantity</th>
                                            <th>Student Name</th>
                                            <th>Student Enrollment No</th>
                                            <th>Accept</th>
                                            <th>Delete</th>
                                         </tr>
                                    </thead>

                                    <tbody>

                                    <?php
                                     $result = $bk->getRequestBook();
                                     if ($result) {
                                         foreach ($result as $value) { ?>

                                      <tr>
                                          <td><?php echo $value['book_name']; ?></td>
                                          <td><?php echo $value['author_name']; ?></td>
                                          <td><?php echo $value['publication_name'];?></td>
                                          <td><?php echo $value['avialable_qty'];?></td>
                                          <td><?php echo $value['user_name'];?></td>
                                          <td><?php echo $value['enrollment_no'];?></td>
                                          <td>
                                           <a href="accpet_request.php?rId=<?php echo $value['rId']?>&avl_qty=<?php echo $value['avialable_qty']?>" class="btn btn-xs btn-primary">Accept</a>
                                          </td>
                                          <td></td>
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
        <!-- /page content -->





<!-- Include footer.php -->
<?php include 'inc/footer.php'; ?>
<!-- end of footer.php  -->
