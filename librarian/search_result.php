<!-- Include header.php -->
<?php include 'inc/header.php'; ?>
<!-- end of header.php  -->

<!-- Passed Form Input To Search Class -->
  <?php
    if($_SERVER['REQUEST_METHOD']== 'GET' && isset($_GET['search'])){

        $search = $sc->searchBook($_GET['key_word']);

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
                                <h2>Plain Page</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                            <?php
                                  if(isset($search)){
                                  	 foreach ($search as $value) { ?>

                                 <div class="card" style="width: 18rem;">
									  <img class="card-img-top" src="<?php echo $value['book_image']; ?>" alt="Card image cap">
									  <div class="card-body">
									    <h2 class="card-title"><?php echo $value['book_name']; ?></h2>
                                        <h2 class="card-title"><?php echo $value['author_name']; ?></h2>
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



<!-- Include footer.php -->
<?php include 'inc/footer.php'; ?>
<!-- end of footer.php  -->

