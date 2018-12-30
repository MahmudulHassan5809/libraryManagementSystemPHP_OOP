
    <?php
    /**
    * Format Class
    */
    class Format{
     public function formatDate($date){
      return date('F j, Y, g:i a', strtotime($date));
     }

     public function display_error_message($error){
         return '<div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
          </button>
          '.$error.'.
          </div>';
       }

    public function display_success_message($success){
           return '<div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
          </button>
          '. $success .'.
          </div>';
    }

    public function redirect($location){
        return header("Location: {$location}");
      }

     public function textShorten($text, $limit = 400){
      $text = $text. " ";
      $text = substr($text, 0, $limit);
      $text = substr($text, 0, strrpos($text, ' '));
      $text = $text.".....";
      return $text;
     }
     public function validation($data){
      $data = trim($data);
      $data = stripcslashes($data);
      $data = htmlspecialchars($data);
      return $data;
     }
     public function title(){
      $path = $_SERVER['SCRIPT_FILENAME'];
      $title = basename($path, '.php');
      //$title = str_replace('_', ' ', $title);
      if ($title == 'book_in_my_account') {
       $title = 'MyBook Account';
      }elseif ($title == 'contact') {
       $title = 'contact';
      }
      return $title = ucfirst($title);
     }

    public function dateCompare($date){
       //$date = '2018-07-25';$date = date('Y-m-d', strtotime("+1 day"));
       date_default_timezone_set('Asia/Dhaka');
       $today = date("Y-m-d");
       $today = date_create($today);
       $Mydate = date_create($date);
       $diff = date_diff($today,$Mydate);
       $diff = $diff->format('%R%a');
       if ($diff == 0) {
         return 0;
       }elseif ($diff == 1) {
         return 1;
       }elseif ($diff < 0) {
         return $diff;
       }
    }



}
?>
