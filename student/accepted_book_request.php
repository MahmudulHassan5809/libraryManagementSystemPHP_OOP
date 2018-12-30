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
                     <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Book Name</th>
                                        <th>Author Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $result = $bk->getAcceptedRequestBook();

                                        if (isset($result) && $result !== false) {
                                            foreach ($result as $value) {
                                     ?>
                                    <tr>
                                        <td><?php echo $value['request_code'] ?></td>
                                        <td><?php echo $value['book_name'] ?></td>
                                        <td><?php echo $value['author_name'] ?></td>
                                    </tr>
                                <?php }  }else { ?>
                                     <tr>
                                         <td>No Data</td>
                                     </tr>
                                <?php } ?>
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
