<?php
/**
 *
 */
class Category
{

	    private $db;
	    private $fm;

		public function __construct()
		{
		  $this->db=new Database();
		  $this->fm=new Format();
		}


	   public function addCategory($category_name){
		   $category_name=$this->fm->validation($category_name);
		   $category_name=mysqli_real_escape_string($this->db->link,$category_name);
		   if (empty($category_name)) {
               return $this->fm->display_error_message("Category Name Is Empty...");
		   }else
		   {
		   	$query="INSERT INTO book_category(category_name)
		   	  VALUES('$category_name')";
		   	$result=$this->db->insert($query);
		   	if($result)
		   	{
		   		return $this->fm->display_success_message("Category Name is Uploaded...");
		   	}
		   	else
		   	{
		       return $this->fm->display_error_message("SomeThing Went Wrong...");
		   	}
	      }
	    }


	    public function getallCat()
		{
		   $query="SELECT * FROM book_category order by id asc";
		   $result=$this->db->select($query);
		   return $result;
	    }


	    public function get_cat_by_id($id){
		   $id=mysqli_real_escape_string($this->db->link,$id);
		   $query="SELECT * FROM book_category WHERE id='$id'";
		   $result=$this->db->select($query);
		   return $result;
		}


		public function editCat($category_name,$id){
		   $category_name=$this->fm->validation($category_name);
		   $category_name=mysqli_real_escape_string($this->db->link,$category_name);
		   $id=mysqli_real_escape_string($this->db->link,$id);
		   if (empty($category_name)) {
                return $this->fm->display_error_message("Field Must Not Be Empty");
		   	}else{
			$query="UPDATE book_category
		            SET category_name='$category_name'
		            WHERE id='$id'";
		        $result=$this->db->update($query);
		    if($result)
		   	{
				return $this->fm->display_success_message("Category Updated Successfully...");
		   	}
		   	else
		   	{
		       return $this->fm->display_error_message("Category Not Updated...");
		   	}
		}
    }



    public function del_cat($id){
		$id=mysqli_real_escape_string($this->db->link,$id);
	    $book_query="SELECT * FROM add_books where category_id='$id'";
		$getdata=$this->db->select($book_query);
		if($getdata)
		{
			while ($delimg=$getdata->fetch_assoc()) {
			  $dellink=$delimg['book_image'];
			  unlink($dellink);

			if ($delimg['category_id'] == $id) {
				$query = "DELETE book_category,add_books FROM book_category INNER JOIN add_books
		        WHERE book_category.id=add_books.category_id AND  book_category.id = '$id'";
		        $result=$this->db->delete($query);
				}
		}

		}else{
			$query = "DELETE FROM book_category WHERE id='$id'";
			$result=$this->db->delete($query);
		}
	    $result=$this->db->delete($query);
		if($result)
		{
		    echo "<script>alert('Data Deleted Successfully');</script>";
		    echo "<script>window.location='category.php'</script>";
		}
		else
		{
		    echo "<script>alert('Data Not Deleted ');</script>";
		    echo "<script>window.location='category.php'</script>";
		}
	}


}
