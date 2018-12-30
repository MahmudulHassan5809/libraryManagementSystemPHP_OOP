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
                                    <th>Author Name</th>
                                    <th>Publication Name</th>
                                    <th>Student Name</th>
                                    <th>Student Enrollment No</th>
                                    <th>Delete</th>
                                 </tr>
                            </thead>

                            <tbody>
                        <?php
                          $getBookFromStudentByCode = $bk->getBookFromStudentByCode();
                          if(isset($getBookFromStudentByCode) && $getBookFromStudentByCode !== false){
                          	 foreach ($getBookFromStudentByCode as  $value) {
                                if($fm->dateCompare($value['return_date']) < 0){
                                  $dueValue = $fm->dateCompare($value['return_date']);

                                  if($lb->checkDueOnthisBook($value['bId'] ,$value['sId'], abs($dueValue) * 50) !== true)
                                  {
                                    $lb->updateDueToUserAccount(abs($dueValue) * 50,$value['sId'],$value['bId']);

                                  }else{
                                    $lb->updateDueToUserAccount(abs($dueValue) * 50,$value['sId'],$value['bId']);
                                  }
                               $error = 'text-danger';
                               $style = 'font-size: 20px';
                               }else{
                               $error = '';
                               $style = '';

                             }

                          	 	?>

                          	<tr class="<?php echo $error; ?>" style="<?php echo $style; ?>">
                              <td><?php echo $value['book_name']; ?></td>
                              <td><?php echo $value['author_name']; ?></td>
                              <td><?php echo $value['publication_name'];?></td>
                              <td><?php echo $value['user_name'];?></td>
                              <td><?php echo $value['enrollment_no'];?></td>
                              <td>

                               <a href="take_book.php?rId=<?php echo $value['rId']?>&bId=<?php echo $value['bId']; ?>&sId=<?php echo $value['sId']; ?>" class="btn btn-xs btn-primary">Delete</a>

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


<!-- footer.php -->
<?php include 'inc/footer.php'; ?>
<!-- End Of footer.php -->
