<?php
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../../lib/Database.php') ;
include_once ($filepath.'/../../helpers/Format.php') ;

 class Search
 {
	    private $db;
	    private $fm;
		public function __construct()
		{
		  $this->db=new Database();
		  $this->fm=new Format();
		}





    public function searchBook($key_word){
       $key_word=$this->fm->validation($key_word);
       $key_word=mysqli_real_escape_string($this->db->link,$key_word);

       if (empty($key_word)) {
         $this->fm->redirect('books.php');
       }else{
           $query = "SELECT * FROM add_books where book_name like '%$key_word%' or author_name like '%$key_word%'";
           $result=$this->db->select($query);
           if($result){
              return $result;
           }
		}
    }


}
