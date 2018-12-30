<!-- Include header.php -->
<?php include 'inc/header.php'; ?>
<!-- end of header.php  -->




<!-- page content area main -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>All Books</h3>
            </div>

           <?php include 'inc/search.php'; ?>
        </div>

        <div class="clearfix"></div>
        <div class="row" style="min-height:500px">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>All Books</h2>
                        <br>
                        <?php
                         if (Session::get('request_msg') !== false) {
                             $request_msg = Session::get('request_msg');
                             if (isset($request_msg)) {
                                 echo $fm->display_success_message($request_msg);
                                 unset($_SESSION['request_msg']);
                             }
                         }

                        ?>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <?php
                               $result = $bk->gettAllBooks();
                               if ($result) {
                                   foreach ($result as $value) {
                            ?>

                            <div class="col-sm-6 col-md-3">
                                <div class="card img-thumbnail">
                                    <img src="../librarian/<?php echo $value['book_image'] ;?>" style="height: 200px; width: 200px; padding: 5px;"/>
                                    <a href="book_page.php?id=<?php echo $value['id'];  ?>" class="btn btn-primary col-xs-12" role="button">View Detail</a>
                                    <!-- <div class="clearfix"></div> -->
                                </div>
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
