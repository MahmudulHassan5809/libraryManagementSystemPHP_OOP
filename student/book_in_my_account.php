<!-- Include header.php -->
<?php include 'inc/header.php'; ?>
<!-- end of header.php  -->




<!-- page content area main -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>My Books</h3>
            </div>

            <?php include 'inc/search.php'; ?>
        </div>

        <div class="clearfix"></div>
        <div class="row" style="min-height:500px">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <!-- <h2>My Books</h2> -->

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <?php
                          $getMyBook = $bk->getMyBook();

                          if (isset($getMyBook) && $getMyBook !== false) {

                               foreach ($getMyBook as  $value) { ?>


                                <div class="col-sm-6 col-md-3">
                                    <div class="thumbnail">
                                      <img src="../librarian/<?php echo $value['book_image'] ;?>">
                                      <div class="caption">
                                        <h5>Book Name: <?php echo $value['book_name'] ;?></h5>

                                        <h5>Author Name: <?php echo $value['author_name'] ;?></h5>

                                        <h5>Return Date: <?php echo $value['return_date'] ;?></h5>

                                        <h5 class="text-danger">Notice:
                                          <?php
                                            $dueValue = $fm->dateCompare($value['return_date']);

                                            if(isset($dueValue)){
                                              if ($dueValue == 0) {
                                                 echo "Today Is The Last Date To Return The Book";
                                                 //Session::set("dueMsg","Today Is The Last Date To Return The Book");
                                              }elseif ($dueValue == 1) {
                                                echo "You Have One Day Left To Return The Book";
                                                //Session::set("dueMsg","You Have One Day Left To Return The Book");
                                              }elseif ($dueValue < 0) {
                                                echo "You Have Due ". abs($dueValue) * 50  ." Tk .Please Contact With Librarian";
                                                Session::set("dueMsg","You Have Due ". abs($dueValue) * 50  ." Tk. on This Book ". $value['book_name'] ." Please Contact With Librarian");
                                                  if($user->checkDueOnthisBook($value['bId'] , abs($dueValue) * 50) !== true){
                                                    $user->addDueToUserAccount(abs($dueValue) * 50,$value['bId']);
                                                }else{

                                                  $user->updateDueToUserAccount(abs($dueValue) * 50,$value['bId']);
                                                }
                                              }
                                            }
                                          ?>
                                        </h5>

                                        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                                      </div>
                                    </div>
                                </div>


                          <?php } } else { echo "You Dont Have Any Book";} ?>
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
