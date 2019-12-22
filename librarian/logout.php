<?php include 'inc/header.php'; ?>
<?php
if (!isset($_GET['id'])or $_GET['id']==NULL) {
  echo "<script>window.location='student_info.php'</script>";
  //header("Location:catlist.php");
}else
{

  $id=$_GET['id'];
  $lb->logOut();
  /**/
}
