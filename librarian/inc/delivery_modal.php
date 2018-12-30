 <?php
    if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['submit'])){
        $rid = $_POST['rId'];
        $deliverBook = $bk->deliverBook($_POST,$rid);
   }
?>






<!-- Modal -->
<div class="modal fade" id="myModal<?php echo $value['rId'] ;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <form action="" method="POST">
        <div class="modal-body">
             <div class="form-group">
                <label>Return Date:</label>
                <input type="date" class="form-control"  name="return_date" required>
            </div>
            <input type="hidden" name="rId" value="<?php echo $value['rId'] ;?>">

       </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" name="submit" value="Save Changes" class="btn btn-primary">
      </div>
    </form>
    </div>
  </div>
</div>
