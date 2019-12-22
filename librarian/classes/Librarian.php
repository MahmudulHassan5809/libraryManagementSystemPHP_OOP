<?php
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../../lib/Database.php') ;
include_once ($filepath.'/../../helpers/Format.php') ;

 class Librarian
 {
	    private $db;
	    private $fm;
		public function __construct()
		{
		  $this->db=new Database();
		  $this->fm=new Format();
		}

	public function librarianLogin($data)
	{
		$email=$this->fm->validation($data['email']);
        $email=mysqli_real_escape_string($this->db->link,$data['email']);
        $password=$this->fm->validation($data['password']);
        $password=mysqli_real_escape_string($this->db->link,$data['password']);

        if ($this->email_exists($email) != true) {
        	return $this->fm->display_error_message("No Account Avialable...Invalid Email...");
        }
	    elseif ($email=="" or $password=="") {
		     return $msg =  $this->fm->display_error_message("Field Must Not Be Empty");
        }
        elseif (filter_var($email, FILTER_VALIDATE_EMAIL)==false) {
		    return $msg =  $this->fm->display_error_message("Invalid Email");
        }else{
            $password=md5($password);
            $query="SELECT  * FROM librarian_registration WHERE email='$email' and password='$password'";
            $result=$this->db->select($query);
            if($result!=false)
            {
                $value=$result->fetch_assoc();
                Session::set("librarianlogin",true);
                Session::set("librarianid",$value['id']);
                Session::set("librarianName",$value['user_name']);
                $this->fm->redirect('student_info.php');
            }
            else
            {
               return $msg =  $this->fm->display_error_message("Invalid Username Or Password. ");
            }
        }
	}


	public function email_exists($email){
     $mailcheck="SELECT librarian_registration.email FROM librarian_registration Where email='$email'";
     $mailres=$this->db->select($mailcheck);
     if ($mailres) {
       return true;
      }
    }

    public function getALlStudentInfo(){
 		$query = "SELECT * FROM student_registration";
 		$result = $this->db->select($query);
 		if ($result) {
 			return $result;
 		}
    }


    public function activeUserAccount($id){
    	$id=$this->fm->validation($id);
        $id=mysqli_real_escape_string($this->db->link,$id);
        $query="UPDATE student_registration
                SET status = '1'
                WHERE id='$id'";
		$result=$this->db->update($query);
		if($result)
	   	{
	   		return true;

	   	}
	   	else
	   	{
	       return false;
	   	}
    }


    public function notActiveUserAccount($id){
    	$id=$this->fm->validation($id);
        $id=mysqli_real_escape_string($this->db->link,$id);
        $query="UPDATE student_registration
                SET status = '0'
                WHERE id='$id'";
		$result=$this->db->update($query);
		if($result)
	   	{
	   		return true;

	   	}
	   	else
	   	{
	       return false;
	   	}
    }


    public function getStudentAllInfoById($id){
        $id=$this->fm->validation($id);
        $id=mysqli_real_escape_string($this->db->link,$id);
        // $query = "SELECT student_registration.*,student_registration.id as sId,
        //          student_due.*,student_due.id as dId,
        //          request_book.*,request_book.id as rId,
        //          add_books.*,add_books.id as bId
        //          FROM student_due
        //          INNER JOIN student_registration ON student_registration.id = student_due.user_id
        //          INNER JOIN add_books ON add_books.id = student_due.book_id
        //          INNER JOIN request_book ON request_book.user_id = student_due.user_id
        //          WHERE student_due.user_id=$id";
        $query = "SELECT * FROM student_due WHERE user_id='$id'";
        $result = $this->db->select($query);
        return $result;
    }


    public function checkDueOnWhichBooks($id){
    $id=$this->fm->validation($id);
    $id=mysqli_real_escape_string($this->db->link,$id);
    $query = "SELECT student_due.*,add_books.*
             FROM student_due
             INNER JOIN add_books ON add_books.id = student_due.book_id
             WHERE user_id='$id'";
    $result = $this->db->select($query);
    if ($result) {
       return $result;
    }else{
       return false;
    }
  }


  // public function checkUserHasDue($id){
  //    $id=$this->fm->validation($id);
  //    $id=mysqli_real_escape_string($this->db->link,$id);

  //    $query = "SELECT * FROM student_due WHERE user_id='$id'";
  //    $result = $this->db->select($query);
  //    if ($result) {
  //      return $result;
  //    }else{
  //      return false;
  //    }
  // }


  public function whichBooksStudentsHave($id){
      $query = "SELECT request_book.*,request_book.id as rId,add_books.*,add_books.id as bId,
                student_registration.*,student_registration.id as sId
                FROM request_book
                INNER JOIN add_books  ON add_books.id = request_book.book_id
                INNER JOIN student_registration  ON student_registration.id  = request_book.user_id
                WHERE request_book.status=1 AND request_book.user_id='$id' AND request_book.delivery_status=1";
      $result = $this->db->select($query);
      return $result;
  }

  public function updateDueToUserAccount($due , $user_id , $book_id){
      $user_id = $user_id;
      $query    = "UPDATE student_due
                  SET due='$due'
                  WHERE user_id='$user_id' AND book_id='$book_id'";
      $result   = $this->db->update($query);
      if ($result) {
        return true;
      }else{
        return false;
      }
   }

   public function addDueToUserAccount($due , $user_id , $book_id){
      $user_id = $user_id;
      $query    = "INSERT INTO student_due(
                  book_id,user_id,due)
                  VALUES('$book_id','$user_id','$due')";
      $result   = $this->db->insert($query);
      if ($result) {
        return true;
      }else{
        return false;
      }
   }

  public function checkDueOnthisBook($book_id , $user_id ,$due){
     $user_id = $user_id;
     $query = "SELECT * FROM student_due WHERE book_id='$book_id' AND user_id='$user_id' AND due='$due'";
     $result = $this->db->select($query);
     if ($result) {
       return true;
     }else{
       return false;
     }
  }


  public function getAllAdminInfo(){
        $query = "SELECT librarian_registration.*,add_books.*
             FROM librarian_registration
             INNER JOIN add_books ON add_books.librarian_id = librarian_registration.id
             ";
        $result = $this->db->select($query);
        if ($result) {
          return $result;
        }
  }

  public function logOut(){
     Session::destroy();
  }



}
