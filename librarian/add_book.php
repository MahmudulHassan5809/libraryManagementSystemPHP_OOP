<!-- Include header.php -->
<?php include 'inc/header.php'; ?>
<!-- end of header.php  -->

<!-- Passed Form Input To Addbook Class -->
  <?php
    if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['addbook'])){

        $addBook = $ad->addBook($_POST,$_FILES);
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
                                <!-- <h2>Add Books</h2> -->
                                <?php
                                  if (isset($addBook)) {
                                      echo $addBook;
                                  }
                                ?>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form role="form" method="post" id="reused_form" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>Book Name:</label>
                                            <input type="text" class="form-control"  name="book_name"  maxlength="50">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Author Name:</label>
                                            <input type="text" class="form-control"  name="author_name"  maxlength="50">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>Publication Name:</label>
                                            <input type="text" class="form-control"  name="publication_name"
                                            maxlength="50">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Book Price:</label>
                                            <input type="tel" class="form-control"  name="book_price"
                                            maxlength="50">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>Book Quantity:</label>
                                            <input type="number" class="form-control"  name="book_qty"
                                            maxlength="50">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Available Quantity:</label>
                                            <input type="number" class="form-control"  name="avl_qty"
                                            maxlength="50">
                                        </div>
                                    </div>

                                     <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>Purchase Date:</label>
                                            <input type="date" class="form-control"  name="purchase_date"  maxlength="50">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Librarian Name:</label>
                                            <input type="text" value="<?php echo Session::get('librarianName'); ?>" class="form-control"  name="librarian_name"  maxlength="50">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <input type="file" name="file" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <label>Book Category</label>

                                            <select name="category_id" id="" class="form-control">
                                            <option selected="" disabled="">Select Category</option>
                                            <?php

                                              $getcat= $ct->getallCat();
                                              if ($getcat) {
                                                 while ($result=$getcat->fetch_assoc()) {
                                            ?>
                                            <option value="<?php echo $result['id'] ; ?>"><?php echo $result['category_name'] ; ?></option>
                                            <?php } } ?>
                                         </select>

                                        </div>
                                    </div>
                                    <br><br><br>
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <input class="btn btn-success btn-lg btn-block" type="submit" name="addbook" value="Upload">
                                        </div>
                                    </div>

                                </form>
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
