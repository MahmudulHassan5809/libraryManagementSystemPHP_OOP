<?php include 'inc/include.php'; ?>
<?php
if (!isset($_GET['id'])or $_GET['id']==NULL) {
  echo "<script>window.location='delivery_book_by_code.php'</script>";
  //header("Location:catlist.php");
}else
{

  $id=$_GET['id'];
  $deliver=$bk->deliverBook($id);
  /**/
}
