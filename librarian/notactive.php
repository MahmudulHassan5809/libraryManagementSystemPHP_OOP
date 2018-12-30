<!-- include.php -->
<?php include 'inc/include.php'; ?>
<!-- End Of include.php -->

<?php
	if (!isset($_GET['id']) or $_GET['id']==NULL) {
	  echo "<script>window.location='student_info.php'</script>";
	  //header("Location:catlist.php");
	}else
	{
      $id=$_GET['id'];
	  $notActiveUser=$lb->notActiveUserAccount($id);
	  if ($notActiveUser == true) {
	  	 $msg = 'User UnAcitivated SuccessFully..';
         Session::set('notactive',$msg);
	  	 $fm->redirect('student_info.php');
	  }
	}
?>
