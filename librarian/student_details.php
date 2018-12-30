<!-- Include header.php -->
<?php include 'inc/header.php'; ?>
<!-- end of header.php  -->

<?php
    if(!isset($_GET['id']) or $_GET['id']==NULL)
  {
    echo "<script>window.location='student_info.php'</script>";
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
                        <div class="col-md-9">
                          <h1>Books Details And Numbers Of Books Students Have</h1>
                           <?php
                              $whichBooksStudentsHave = $lb->whichBooksStudentsHave($id);
                              if (isset($whichBooksStudentsHave) && $whichBooksStudentsHave !== false) {
                                  foreach ($whichBooksStudentsHave as $value) { ?>
                                      <h3 class="text-primary">Book Name: <?php echo $value['book_name']; ?></h3>
                                      <h3 class="text-primary">Author Name: <?php echo $value['author_name']; ?></h3>
                                      <h3 class="text-primary">Publication Name: <?php echo $value['publication_name']; ?></h3>

                              <?php } ?>

                                <h5 class="text-primary">Total Books: <?php echo mysqli_num_rows($whichBooksStudentsHave); ?></h5>
                                <h3>UserName: <?php echo $value['user_name']; ?></h3>
                                <h3>Email: <?php echo $value['email']; ?></h3>
                                <h3>Contact: <?php echo $value['contact']; ?></h3>
                                <h3>Semester: <?php echo $value['sem']; ?></h3>
                                <h3>Id: <?php echo $value['enrollment_no']; ?></h3>

                             <?php } else{
                                echo "No Data";
                              }

                           ?>
                        </div>
                        <div class="col-md-3">
                          <h1 class="text-danger">Student Due</h1>
                          <?php
                            $checkDueOnWhichBooks = $lb->checkDueOnWhichBooks($id);
                            if(isset($checkDueOnWhichBooks) && $checkDueOnWhichBooks !== false){
                              foreach ($checkDueOnWhichBooks as  $value) { ?>

                               <h3 class="text-warning"><?php echo $value['due'] . ' Taka Due On ' . $value['book_name'] . ' Book'; ?></h3>

                          <?php } }else {

                          } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->


<!-- footer.php -->
<?php include 'inc/footer.php'; ?>
<!-- End Of footer.php -->
