<!-- Include inclue.php -->
<?php include 'inc/include.php'; ?>
<!-- end of inclue.php  -->

<?php
    if(!isset($_GET['id']) or $_GET['id']==NULL)
  {
    echo "<script>window.lobrandion='display_all_books.php'</script>";
  }
  else
  {
  	$bookId=$_GET['id'];
    if ($user->checkUserHasDue() !== true) {
    	$bk->bookRequest($bookId);
    }else{
    	Session::set('reqMsg','Sorry You Have Previous Due..');
    	$fm->redirect('book_page.php?id='.$bookId);
    }
  }
?>






