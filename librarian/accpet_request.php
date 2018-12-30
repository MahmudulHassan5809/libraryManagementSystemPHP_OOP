<!-- include.php -->
<?php include 'inc/include.php'; ?>
<!-- End Of include.php -->

<?php
	if ((!isset($_GET['rId']) or $_GET['rId']==NULL) && (!isset($_GET['avl_qty']) or $_GET['avl_qty']==NULL)) {
	  echo "<script>window.location='student_info.php'</script>";
	  //header("Location:catlist.php");
	}else
	{
        $rid = $_GET['rId'];
        $avl_qty = $_GET['avl_qty'] - 1;
        $acceptRequest = $bk->acceptRequest($rid,$avl_qty);
	}
?>
