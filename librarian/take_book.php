<!-- include.php -->
<?php include 'inc/include.php'; ?>
<!-- End Of include.php -->

<?php
	if ((!isset($_GET['rId']) or $_GET['rId']==NULL) && (!isset($_GET['bId']) or $_GET['bId']==NULL) && (!isset($_GET['sId']) or $_GET['sId']==NULL)) {
	  echo "<script>window.location='take_book_by_code.php'</script>";
	  //header("Location:catlist.php");
	}else
	{
      $rId=$_GET['rId'];
      $bId=$_GET['bId'];
      $sId=$_GET['sId'];
	  $delteRequestAndUpdateQuantity=$bk->delteRequestAndUpdateQuantity($bId , $rId , $sId);

	}
?>
