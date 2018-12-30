<?php include 'inc/header.php'; ?>
<?php
if (!isset($_GET['id'])or $_GET['id']==NULL) {
  echo "<script>window.location='display_all_books.php'</script>";
  //header("Location:catlist.php");
}else
{

  $id=$_GET['id'];
  $user->logOut();
  /**/
}
