<?php 
session_start();
include ('connection.php');
?>



<?php 


  // echo "Connected successfully";



  function dataClean($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  function validate_mobile($mobile)
  {
    if(empty($mobile)){
      return 'this field is required';
    }
    elseif(!preg_match("/^[6-9]\d{9}$/",$mobile)){
      return 'enter a valid number';
    }else {
      return true;
    }
  }

  function get_row_sql($record){
    if(mysqli_num_rows($record)){
      while($row = mysqli_fetch_assoc($record)){
        return $row;
      }
    }else{
      return null;
    }
  }

  // function validate_name($val_name){
  //   // return preg_match("/^[a-zA-Z-' ]*$/", $val_name);
  //   if(empty($val_name)){
  //     return false;
  //   }elseif( preg_match("/^[a-zA-Z-' ]*$/",$val_name)){
  //     return $val_name;
  //   }else {
  //     return false;
  //   }
  // }

  
  function validate_name($val_name){
    // return preg_match("/^[a-zA-Z-' ]*$/", $val_name);
    if(empty($val_name)){
      return "this field is requrid";
    }else{
        if( !preg_match("/^[a-zA-Z ]*$/",$val_name)){
          return "enter a valid name";
        }else {
          return true;
        }
    }
  }

  function validate_address($val){
    if(empty($val)){
      return "This field is requrid";
    }else{
        if( !preg_match("/^[0-9.a-zA-Z- ]*$/",$val)){
          return "Enter a valid address.";
        }else {
          return true;
        }
    }
  }

  // to check duplicate function.
  function checkEmail($email) {
    global $conn;
    //$email = mysql_real_escape_string($email);
    $sql = "SELECT * FROM login where email_id = '" . $email . "' ";
    $result = mysqli_query($conn , $sql);
    if (mysqli_num_rows($result)>0) {
      return false;
    } else {
      return true;
    }
}

// Display the alert box 
function fun_alert($message) {
      
  echo "<script>alert('$message');</script>";
}

?>