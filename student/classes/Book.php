<?php
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../../lib/Database.php') ;
include_once ($filepath.'/../../helpers/Format.php') ;

 class Book
 {
	    private $db;
	    private $fm;
		public function __construct()
		{
		  $this->db=new Database();
		  $this->fm=new Format();
		}


    public function gettAllBooks(){
            $query="SELECT * FROM add_books order by id asc";
            $result=$this->db->select($query);
            return $result;
    }

    public function get_book_by_id($id){
		$id=$this->fm->validation($id);
        $id=mysqli_real_escape_string($this->db->link,$id);

        //$query="SELECT * FROM add_books WHERE id='$id' order by id asc";
        $query="SELECT add_books.*,
                  book_category.category_name
                  FROM add_books
                  INNER JOIN book_category
                  on add_books.category_id = book_category.id
                  WHERE add_books.id='$id'
                  order by add_books.id asc";
        $result=$this->db->select($query);
        return $result;
	}

    public function bookRequest($book_id)
    {
        $book_id = $this->fm->validation($book_id);
        $book_id = mysqli_real_escape_string($this->db->link,$book_id);
        $user_id = Session::get('userid');
        $request_date = date("Y-m-d",strtotime("+1 day"));

        $checkQuery = "SELECT * FROM request_book WHERE book_id='$book_id' AND user_id='$user_id'";
        $checkResult = $this->db->select($checkQuery);

        if ($checkResult) {
              Session::set('request_msg','Your Already Have This book in Your Account..');
              $this->fm->redirect('display_all_books.php');
        }else{
              $query = "INSERT INTO request_book(
                      user_id,book_id,request_date,return_date)
                      VALUES('$user_id','$book_id','$request_date','')";
              $result = $this->db->insert($query);
              if ($result) {
                  Session::set('request_msg','Your Request Has Been Submitted...You Will Be Notified Soon..');
                  $this->fm->redirect('display_all_books.php');
              }
        }


    }

    public function getAcceptedRequestBook(){
         $user_id = Session::get('userid');
         $query = "SELECT request_book.*,request_book.id as rId,add_books.*,add_books.id as bId,
                    student_registration.*,student_registration.id as sId
                    FROM request_book
                    INNER JOIN add_books  ON add_books.id = request_book.book_id
                    INNER JOIN student_registration  ON student_registration.id  = request_book.user_id
                    WHERE request_book.status=1 AND request_book.user_id='$user_id' AND request_book.delivery_status=0";
            $result = $this->db->select($query);
            return $result;
    }

    public function getMyBook(){
      $user_id = Session::get('userid');
      $query = "SELECT request_book.*,request_book.id as rId,add_books.*,add_books.id as bId,
                student_registration.*,student_registration.id as sId
                FROM request_book
                INNER JOIN add_books  ON add_books.id = request_book.book_id
                INNER JOIN student_registration  ON student_registration.id  = request_book.user_id
                WHERE request_book.status=1 AND request_book.user_id='$user_id' AND request_book.delivery_status=1";
      $result = $this->db->select($query);
      return $result;
    }





}
