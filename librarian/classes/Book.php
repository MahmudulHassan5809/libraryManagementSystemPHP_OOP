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

		public function get_all_book()
		{
		  $query="SELECT add_books.*,
		          book_category.category_name
		          FROM add_books
		          INNER JOIN book_category
		          on add_books.category_id = book_category.id
		          order by add_books.id asc";
		   $result=$this->db->select($query);
		   return $result;
		}


		public function get_book_by_id($id){
			$id=$this->fm->validation($id);
            $id=mysqli_real_escape_string($this->db->link,$id);

            $query="SELECT * FROM add_books WHERE id='$id' order by id asc";
            $result=$this->db->select($query);
            return $result;
		}

		public function getRequestBook(){
           $query = "SELECT request_book.request_date,request_book.id as rId,request_book.status,add_books.*,
                    add_books.id as bId,
                    student_registration.*
                    FROM request_book
                    INNER JOIN add_books  ON add_books.id = request_book.book_id
                    INNER JOIN student_registration  ON student_registration.id  = request_book.user_id
                    WHERE request_book.status=0";
            $result = $this->db->select($query);
            return $result;
		}

	    public function countRequest(){

          if ($this->getRequestBook() !== false) {
          	 $count = mysqli_num_rows($this->getRequestBook());
          	 if ($count) {
          	 	return $count;
          	 }
          }else{
          	return 0;
          }

	    }

	    public function acceptRequest($rid,$avl_qty){
            $rid=$this->fm->validation($rid);
            $rid=mysqli_real_escape_string($this->db->link,$rid);

            $avl_qty=$this->fm->validation($avl_qty);
            $avl_qty=mysqli_real_escape_string($this->db->link,$avl_qty);

            $request_code = mt_rand(100000, 999999);

            $query="UPDATE request_book,add_books
		            SET add_books.avialable_qty='$avl_qty',
		            request_book.status=1,
		            request_book.request_code='$request_code'
		            WHERE request_book.book_id = add_books.id AND request_book.id='$rid'";

			$result=$this->db->update($query);
		    if($result)
		   	{
				$this->fm->redirect('student_request.php');
		   	}
		   	else
		   	{
		       $this->fm->redirect('student_request.php');
		   	}

	    }

	    public function getBookToDeliver(){

         $query = "SELECT request_book.*,request_book.id as rId,add_books.*,add_books.id as bId,
                    student_registration.*,student_registration.id as sId
                    FROM request_book
                    INNER JOIN add_books  ON add_books.id = request_book.book_id
                    INNER JOIN student_registration  ON student_registration.id  = request_book.user_id
                    WHERE request_book.status=1 AND request_book.delivery_status=0";
            $result = $this->db->select($query);
            return $result;
    }

    public function deliverBook($data,$id){
    	$returnDate=$this->fm->validation($data['return_date']);
    	$returnDate=mysqli_real_escape_string($this->db->link,$returnDate);

        $id=mysqli_real_escape_string($this->db->link,$id);
        $id=$this->fm->validation($id);
        $id=mysqli_real_escape_string($this->db->link,$id);

        $query="UPDATE request_book
		            SET delivery_status=1,
		                return_date='$returnDate'

		            WHERE id='$id'";
		$result=$this->db->update($query);
		if($result)
	   	{
			$this->fm->redirect('delivery_book_by_code.php');
	   	}
	   	else
	   	{
	       $this->fm->redirect('delivery_book_by_code.php');
	   	}
    }

    public function getBookFromStudentByCode(){
    	$query = "SELECT request_book.*,request_book.id as rId,add_books.*,add_books.id as bId,
                    student_registration.*,student_registration.id as sId
                    FROM request_book
                    INNER JOIN add_books  ON add_books.id = request_book.book_id
                    INNER JOIN student_registration  ON student_registration.id  = request_book.user_id
                    WHERE request_book.status=1 AND request_book.delivery_status=1";
        $result = $this->db->select($query);
        return $result;
    }


    public function checkUserHasDue($sId){

     $query = "SELECT * FROM student_due WHERE user_id='$sId'";
     $result = $this->db->select($query);
     if ($result) {
       return true;
     }else{
       return false;
     }
  }

    public function delteRequestAndUpdateQuantity($bId , $rId ,$sId){
        $bId=mysqli_real_escape_string($this->db->link,$bId);
        $bId=$this->fm->validation($bId);

        $rId=mysqli_real_escape_string($this->db->link,$rId);
        $rId=$this->fm->validation($rId);

        $sId=mysqli_real_escape_string($this->db->link,$sId);
        $sId=$this->fm->validation($sId);

        $query1 = "SELECT avialable_qty FROM add_books WHERE id='$bId'";
        $result1 = $this->db->select($query1);
        $data = mysqli_fetch_assoc($result1);



        if($data){
        	$avialable_qty = $data['avialable_qty'] + 1;



	    	$query2="UPDATE add_books
			        SET avialable_qty='$avialable_qty'
			        WHERE id='$bId'";
			$result2=$this->db->update($query2);

	    	$query3 = "DELETE FROM request_book WHERE id='$rId'";
	    	$result3 = $this->db->delete($query3);

            if($this->checkUserHasDue($sId)){
                $dueQuery = "DELETE FROM student_due WHERE user_id='$sId'";
                $dueResult = $this->db->delete($dueQuery);

                unset($_SESSION['dueMsg']);
            }

            $this->fm->redirect('take_book_by_code.php');
        }
	}



}
