<?php
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../../lib/Database.php') ;
include_once ($filepath.'/../../helpers/Format.php') ;

 class Addbook
 {
	    private $db;
	    private $fm;
		public function __construct()
		{
		  $this->db=new Database();
		  $this->fm=new Format();
		}

		public function addBook($data,$file)
		{
                  $book_name=$this->fm->validation($data['book_name']);
                  $book_name=mysqli_real_escape_string($this->db->link,$data['book_name']);

                  $author_name=$this->fm->validation($data['author_name']);
                  $author_name=mysqli_real_escape_string($this->db->link,$data['author_name']);

                  $publication_name=$this->fm->validation($data['publication_name']);
                  $publication_name=mysqli_real_escape_string($this->db->link,$data['publication_name']);

                  $book_price=$this->fm->validation($data['book_price']);
                  $book_price=mysqli_real_escape_string($this->db->link,$data['book_price']);

                  $book_qty=$this->fm->validation($data['book_qty']);
                  $book_qty=mysqli_real_escape_string($this->db->link,$data['book_qty']);

                  $avl_qty=$this->fm->validation($data['avl_qty']);
                  $avl_qty=mysqli_real_escape_string($this->db->link,$data['avl_qty']);

                  $purchase_date=$this->fm->validation($data['purchase_date']);
                  $purchase_date=mysqli_real_escape_string($this->db->link,$data['purchase_date']);

                  $librarian_name=$this->fm->validation($data['librarian_name']);
                  $librarian_name=mysqli_real_escape_string($this->db->link,$data['librarian_name']);

                  if (isset($data['category_id'])) {
                       $category_id=$this->fm->validation($data['category_id']);
                       $category_id=mysqli_real_escape_string($this->db->link,$data['category_id']);
                  }


                  $librarian_id = Session::get('librarianid');

                  $permited  = array('jpg', 'jpeg', 'png', 'gif');
                  $file_name = $file['file']['name'];
                  $file_size = $file['file']['size'];
                  $file_temp = $file['file']['tmp_name'];

                  $div = explode('.', $file_name);
                  $file_ext = strtolower(end($div));
                  $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                  $uploaded_image = "book_image/".$unique_image;

                  if($book_name==""|| $author_name==""|| $publication_name==""|| $book_price==""|| $book_qty==""|| $purchase_date=="" || $librarian_name=="" || $file_name=="")
                  {
                     return $this->fm->display_error_message("Filed Must Not Be Empty...");
                  }
                  elseif ($file_size >1048567){
                       return $this->fm->display_error_message("File Size Shuld Be Less Then 1MB...");

                  }elseif (in_array($file_ext, $permited) === false) {
                       return $this->fm->display_error_message("You Can Upload Only ".implode(', ', $permited));
                  }
                  else{
                        move_uploaded_file($file_temp, $uploaded_image);
                        $query="INSERT INTO add_books(book_name,book_image,category_id,author_name,publication_name,book_price,book_qty,avialable_qty,purchase_date,librarian_user_name,librarian_id)
                          VALUES('$book_name','$uploaded_image','$category_id','$author_name','$publication_name','$book_price','$book_qty','$avl_qty','$purchase_date','$librarian_name','$librarian_id')";
                      $result=$this->db->insert($query);
                        if($result)
                        {
                               return $this->fm->display_success_message("Book Uploaded Successfully...");
                        }
                        else
                        {
                             return $this->fm->display_error_message("Book Not Uploaded...");
                        }
                  }
            }


       public function gettAllBooks(){
            $query="SELECT * FROM add_books order by id asc";
            $result=$this->db->select($query);
            return $result;
       }

       public function get_book_by_id($id){
         $id=mysqli_real_escape_string($this->db->link,$id);
         $query="SELECT * FROM add_books WHERE id='$id'";
         $result=$this->db->select($query);
         if(isset($result)){
           return $result;
         }
       }

      public function updateBook($data , $id){
          $id=mysqli_real_escape_string($this->db->link,$id);
          $book_name=$this->fm->validation($data['book_name']);
          $book_name=mysqli_real_escape_string($this->db->link,$data['book_name']);

          $author_name=$this->fm->validation($data['author_name']);
          $author_name=mysqli_real_escape_string($this->db->link,$data['author_name']);

          $publication_name=$this->fm->validation($data['publication_name']);
          $publication_name=mysqli_real_escape_string($this->db->link,$data['publication_name']);

          $book_price=$this->fm->validation($data['book_price']);
          $book_price=mysqli_real_escape_string($this->db->link,$data['book_price']);

          $book_qty=$this->fm->validation($data['book_qty']);
          $book_qty=mysqli_real_escape_string($this->db->link,$data['book_qty']);

          $avl_qty=$this->fm->validation($data['avl_qty']);
          $avl_qty=mysqli_real_escape_string($this->db->link,$data['avl_qty']);

          $purchase_date=$this->fm->validation($data['purchase_date']);
          $purchase_date=mysqli_real_escape_string($this->db->link,$data['purchase_date']);

          $librarian_name=$this->fm->validation($data['librarian_name']);
          $librarian_name=mysqli_real_escape_string($this->db->link,$data['librarian_name']);

          if (isset($data['category_id'])) {
               $category_id=$this->fm->validation($data['category_id']);
               $category_id=mysqli_real_escape_string($this->db->link,$data['category_id']);
          }

          $librarian_id = Session::get('librarianid');

          if($book_name==""|| $author_name==""|| $publication_name==""|| $book_price==""|| $book_qty==""|| $purchase_date=="" || $librarian_name=="")
            {
               return $this->fm->display_error_message("Filed Must Not Be Empty...");
            }
          else{
          $query="UPDATE add_books
                    SET
                    book_name='$book_name',
                    author_name='$author_name',
                    publication_name='$publication_name',
                    book_price='$book_price',
                    book_qty='$book_qty',
                    purchase_date='$purchase_date',
                    librarian_user_name='$librarian_name',
                    librarian_id='$librarian_id'
                    WHERE id='$id'";
                $result=$this->db->update($query);
            if($result)
            {
            return $this->fm->display_success_message("Book Updated Successfully...");
            }
            else
            {
               return $this->fm->display_error_message("Book Not Updated...");
            }
        }
      }


}
