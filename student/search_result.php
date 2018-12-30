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
                            <div class="col-sm-6 col-md-4">
                                 <div class="card img-thumbnail">
									  <img class="card-img-top" src="../librarian/<?php echo $value['book_image']; ?>" alt="Card image cap" style="height: 80%; width: auto; padding: 5px;">
									  <div class="card-body">
									    <strong>Book Name: </strong><sapn class="card-title"><?php echo $value['book_name']; ?></span>
                                            <br>
                                        <strong>Category Name: </strong><sapn class="card-title"><?php echo $value['catName']; ?></span>
                                            <br>
                                        <strong>Author Name: </strong><sapn class="card-title"><?php echo $value['author_name']; ?></span>
                                            <br>
                                        <strong>Available Quantity: </strong><sapn class="card-title"><?php echo $value['avialable_qty']; ?></span>
									  </div>
							    </div>
                                <br>

                                <a href="book_request.php?id=<?php echo $value['bookId'] ;?>" class="btn btn-xs btn-info">Request Book</a>
                            </div>
                                <?php //print_r($value) ;?>
                               
							<?php } } else { echo "string";} ?>
                             
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

