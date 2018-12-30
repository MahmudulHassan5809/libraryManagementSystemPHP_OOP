<!-- Include header.php -->
<?php include 'inc/header.php'; ?>
<!-- end of header.php  -->

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

                                <table id="example" class="table table-striped table-bordered col-md-12" style="width:100%">
                                    <thead>
                                        <tr>

                                            <th>Book Name</th>
                                            <th>Book Image</th>
                                            <th>Category Name</th>
                                            <th>Author Name</th>
                                            <th>Publication Name</th>
                                            <th>Book Price</th>
                                            <th>Book Quantity</th>
                                            <th>Available Quantity</th>
                                            <th>Purchase Date</th>
                                            <th>Librarian Name</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                         </tr>
                                    </thead>

                                    <tbody>
                                        <?php

                                        $result=$bk->get_all_book();
                                        if($result)
                                        {
                                            while($value=$result->fetch_assoc()) {

                                        ?>

                                        <tr>
                                            <td><?php echo $value['book_name']; ?></td>
                                            <td><img src="<?php echo $value['book_image'] ;?>" width="100px" alt=""></td>
                                            <td><?php echo $value['category_name']; ?></td>
                                            <td><?php echo $value['author_name'] ;?></td>
                                            <td><?php echo $value['publication_name'] ;?></td>
                                            <td><?php echo $value['book_price'] ;?></td>
                                            <td><?php echo $value['book_qty'] ;?></td>
                                            <td><?php echo $value['purchase_date'] ;?></td>
                                            <td><?php echo $value['avialable_qty'] ;?></td>
                                            <td><?php echo $value['librarian_user_name']; ?></td>
                                            <td>
                                                <a href="edit_book.php?id=<?php echo $value['id'] ;?>" class="btn btn-success btn-xs fa fa-edit"></a>

                                            </td>
                                            <td>
                                                <a onclick="return confirm('Are You Sure');" href="delete_book.php?id=<?php echo $value['id'] ;?>" class="btn btn-danger fa fa-remove"></a>
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
        <!-- /page content -->




<!-- Include footer.php -->
<?php include 'inc/footer.php'; ?>
<!-- end of footer.php  -->
