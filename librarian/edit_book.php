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

<?php
 if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['update']))
  {

     $updateBook = $ad->updateBook($_POST , $id);
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
                                <?php
                                    if (isset($updateBook)) {
                                        echo $updateBook;
                                    }

                                ?>
                                <h2>Plain Page</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
            <?php

            $result=$ad->get_book_by_id($id);
            if($result)

            {
               while($value = $result->fetch_assoc()){

            ?>
            <form action="" role="form" method="post" id="reused_form">
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label>Book Name:</label>
                        <input value="<?php echo $value['book_name'] ;?>" type="text" class="form-control"  name="book_name"  maxlength="50">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>Author Name:</label>
                        <input value="<?php echo $value['author_name'] ;?>" type="text" class="form-control"  name="author_name"  maxlength="50">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label>Publication Name:</label>
                        <input value="<?php echo $value['publication_name'] ;?>" type="text" class="form-control"  name="publication_name"
                        maxlength="50">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>Book Price:</label>
                        <input value="<?php echo $value['book_price'] ;?>" type="tel" class="form-control"  name="book_price"
                        maxlength="50">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label>Book Quantity:</label>
                        <input value="<?php echo $value['book_qty'] ;?>" type="number" class="form-control"  name="book_qty"
                        maxlength="50">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>Available Quantity:</label>
                        <input value="<?php echo $value['avialable_qty'] ;?>" type="number" class="form-control"  name="avl_qty"
                        maxlength="50">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label>Purchase Date:</label>
                        <input value="<?php echo $value['purchase_date'] ;?>" type="date" class="form-control"  name="purchase_date"  maxlength="50">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>Librarian Name:</label>
                        <input type="text" value="<?php echo Session::get('librarianName'); ?>" class="form-control"  name="librarian_name"  maxlength="50">
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label>Book Category</label>

                        <select name="category_id" id="" class="form-control">
                          <option value="">Select Category</option>
                          <?php
                           $getcat= $ct->getallCat();
                            if ($getcat) {
                               while ($result=$getcat->fetch_assoc()) { ?>
                            <option
                            <?php
                               if($value['category_id']==$result['id'])
                               {?>

                                     selected="selected"
                                      <?php
                               }
                            ?> value="<?php echo $result['id'] ; ?>" >
                          <?php echo $result['category_name'] ; ?></option>
                          <?php } } ?>
                        </select>

                    </div>
                </div>
                <br><br><br>
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <input class="btn btn-primary btn-lg btn-block" type="submit" name="update" value="Update">
                    </div>
                </div>

            </form>

        <?php  } } ?>

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
