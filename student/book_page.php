<!-- Include header.php -->
<?php include 'inc/header.php'; ?>
<!-- end of header.php  -->

<!-- Get bbok by id from Book class -->
<?php
    if(!isset($_GET['id']) or $_GET['id']==NULL)
  {
    echo "<script>window.lobrandion='display_all_books.php'</script>";
  }
  else
  {
    $id=$_GET['id'];
  }
?>

<!-- End of getting Data -->



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
                        <h5 class="text-danger">
                        <?php
                          echo Session::get('reqMsg');
                          unset($_SESSION['reqMsg']);
                        ?>
                        </h5>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                       <?php

                          $result=$bk->get_book_by_id($id);
                            if($result)
                            {
                                while ($value=$result->fetch_assoc()) {
                            ?>

                            <div class="row text-center text-lg-left">
                                <div class="col-lg-12 col-md-12 col-xs-12" >
                                    <h3><?php echo $value['book_name']; ?></h3>
                                    <a href="" class="">
                                        <img  class="img-responsive img-thumbnail img-fluid" style="height: 300px;" src="../librarian/<?php echo $value['book_image'] ?>" title="" alt="">
                                    </a>
                                </div>
                                <hr>
                                <span><b style="font-size:30px;">Author Name: <?php echo $value['author_name']; ?></b></span>
                                <br>
                                <span><b style="font-size:30px;">Publication Name: <?php echo $value['publication_name']; ?></b></span>
                                <br>
                                <span><b style="font-size:30px;">Available Quantity: <?php echo $value['avialable_qty']; ?></b></span>
                                <br>
                                <span><b style="font-size:30px;">Category Name: <?php echo $value['category_name']; ?></b></span>
                                <br><br>
                                 <a href="book_request.php?id=<?php echo $value['id'] ;?>" class="btn btn-success btn-lg btn-block">Request Book</a>
                            </div>
                        <?php } } ?>
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
