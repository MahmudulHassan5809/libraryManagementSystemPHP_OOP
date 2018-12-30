<?php
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../../lib/Database.php') ;
include_once ($filepath.'/../../helpers/Format.php') ;

 class User
 {
	    private $db;
	    private $fm;
		public function __construct()
		{
		  $this->db=new Database();
		  $this->fm=new Format();
		}

	public function userRegistration($data)
	{
       $firstname=$this->fm->validation($data['firstname']);
       $firstname=mysqli_real_escape_string($this->db->link,$data['firstname']);

       $lastname=$this->fm->validation($data['lastname']);
       $lastname=mysqli_real_escape_string($this->db->link,$data['lastname']);

       $username=$this->fm->validation($data['username']);
       $username=mysqli_real_escape_string($this->db->link,$data['username']);

       $password=$this->fm->validation($data['password']);
       $password=mysqli_real_escape_string($this->db->link,$data['password']);

       $email=$this->fm->validation($data['email']);
       $email=mysqli_real_escape_string($this->db->link,$data['email']);

       $contact=$this->fm->validation($data['contact']);
       $contact=mysqli_real_escape_string($this->db->link,$data['contact']);

       $sem=$this->fm->validation($data['sem']);
       $sem=mysqli_real_escape_string($this->db->link,$data['sem']);

       $enrollmentno=$this->fm->validation($data['enrollmentno']);
       $enrollmentno=mysqli_real_escape_string($this->db->link,$data['enrollmentno']);


       if($firstname==""|| $lastname==""|| $username==""|| $password==""|| $email==""|| $contact==""|| $sem=="" || $enrollmentno=="")
       {
           return $msg =  $this->fm->display_error_message("Field Must Not Be Empty");
       }
       else{

        if ($this->email_exists($email) == true) {
          return $msg =  $this->fm->display_error_message("Email Already Exists...");
        }elseif (filter_var($email, FILTER_VALIDATE_EMAIL)==false) {
			return $msg =  $this->fm->display_error_message("Invalid Email");
        }
        elseif (strlen($password)<6) {
        	return $msg =  $this->fm->display_error_message("Password Too Short");
        }else{
            $password = md5($password);
            $query    = "INSERT INTO student_registration(
                        first_name,last_name,user_name,password,email,contact,sem,enrollment_no)
	                    VALUES('$firstname','$lastname','$username','$password','$email','$contact','$sem','$enrollmentno')";
	        $result   = $this->db->insert($query);
	        if ($result) {
	        	return $msg =  $this->fm->display_success_message("Registration Completed SuccessFully...");
	        }else{
	        	return $msg =  $this->fm->display_error_message("Registration Failed...");
	        }
         }

       }

	}


	public function userLogin($data)
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
            $query="SELECT  * FROM student_registration WHERE email='$email' and password='$password'";
            $result=$this->db->select($query);
            if($result!=false)
            {
                $value=$result->fetch_assoc();
                if ($value['status'] == 0) {
                  return $msg =  $this->fm->display_error_message("Your Account is no Active Plz Contact With Admin");
                }else{
                  Session::set("userlogin",true);
                  Session::set("userid",$value['id']);
                  Session::set("username",$value['user_name']);
                  $this->fm->redirect('display_all_books.php');
                }

            }
            else
            {
               return $msg =  $this->fm->display_error_message("Invalid Username Or Password. ");
            }
        }
	}


	 public function email_exists($email){
     $mailcheck="SELECT student_registration.email FROM student_registration Where email='$email'";
     $mailres=$this->db->select($mailcheck);
     if ($mailres) {
       return true;
      }

    }


    public function getUserInfoById($id)
    {
        $id=$this->fm->validation($id);
        $id=mysqli_real_escape_string($this->db->link,$id);
        $query = "SELECT * FROM student_registration WHERE id='$id'";
        $result = $this->db->select($query);
        return $result;
    }


   public function addDueToUserAccount($due , $book_id){
      $user_id = Session::get('userid');
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

   public function updateDueToUserAccount($due ,  $book_id){
      $user_id = Session::get('userid');
      $query    = "UPDATE student_due
                  SET due='$due'
                  WHERE user_id='user_id' AND book_id='$book_id'";
      $result   = $this->db->update($query);
      if ($result) {
        return true;
      }else{
        return false;
      }
   }

  public function checkDueOnthisBook($book_id , $due){
     $user_id = Session::get('userid');
     $query = "SELECT * FROM student_due WHERE book_id='$book_id' AND user_id='$user_id' AND due='$due'";
     $result = $this->db->select($query);
     if ($result) {
       return true;
     }else{
       return false;
     }
  }

  public function checkUserHasDue(){
     $user_id = Session::get('userid');
     $query = "SELECT * FROM student_due WHERE user_id='$user_id'";
     $result = $this->db->select($query);
     if ($result) {
       return true;
     }else{
       return false;
     }
  }


  public function logOut(){
     Session::destroy();
  }

}
