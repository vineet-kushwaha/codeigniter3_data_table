<?php
include('commonfunction.php');
include('connection.php');
//  echo "Connected successfully";
if (isset($_REQUEST['login'])){
  header("Location: login.php");
}


$name =  $email = $phone =$pass = NULL;
$nerr = $emailerr = $pherr = $passerr = null;
//echo validate_name("");
$error_list = array();



if (isset($_REQUEST['submit'])) {

  if (validate_name($_POST['name']) == 1) {
    $name = dataClean($_POST['name']);
  } else {
    $error_list['name'] = $nerr = validate_name($_POST['name']);
  }

  if (validate_mobile($_POST['phone']) == 1) {
    $phone = dataClean($_POST['phone']);
  } else {
    $error_list['phone']  = $pherr = validate_mobile($_POST['phone']);
  }
  
  if ($_POST['email'] == "") {
    $emailerr = 'This field is requried';
  } else {
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $email = dataClean($_POST['email']);
    } else {
      $error_list['email']  = $emailerr = 'enter a valid email';
    }
  }

  if ($_POST['password'] == '') {
    $passerr = "this field is required.";
  } else {
    $pass = dataClean($_POST['password']);
    $hash_pass = password_hash($pass,PASSWORD_DEFAULT);
    // echo $hash_pass;
    // die();
  }

  if (!checkEmail($email)){
    $error_list['email']  = $emailerr = 'Try a different email.';
    // print_r ($error_list);
    fun_alert($emailerr);
  }else{
    if (count($error_list) == 0) {
    
      $sql = "INSERT INTO login (name,email_id,phone,password) VALUES ('$name','$email','$phone','$hash_pass')";
      // echo $mysqli_query -> info;
      if (mysqli_query($conn, $sql)) {
        fun_alert("You are registered successfully");
      } else {
        //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    } else {
      fun_alert('fill the form correctly');
    }
  }


  
  // if (count($error_list) == 0) {
    
  //   $sql = "INSERT INTO login (name,email_id,phone,password) VALUES ('$name','$email','$phone','$hash_pass')";
  //   // echo $mysqli_query -> info;
  //   if (mysqli_query($conn, $sql)) {
  //     echo "New record created successfully";
  //   } else {
  //     //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  //   }
  // } else {
  //   echo 'fill the form correctly';
  // }



}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <title>SignUp</title>
</head>

<body>


  <div>
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-12">
          <p class="h1 text-start">Sign UP Here!</p>
        </div>
      </div>
      <form action="signup.php" class="form-group" method="POST">
        <div class="form-group row">
          <div class="col-md-6">
            <label for="name">Name:<span class='text-danger'>*</span></label>
            <input type="text" class="form-control" placeholder="Enter username" name="name" value="<?php if (isset($_REQUEST['submit'])) {
                                                                                                      echo $_REQUEST['name'];
                                                                                                    } ?>">
            <div class="text-danger"><?php echo $nerr; ?></div>
          </div>

          <div class="col-md-6">
            <label for="phone">Phone<span class='text-danger'>*</span></label>
            <input type="tel" class="form-control" placeholder="" name="phone" pattern="[0-9]{10}" value="<?php if (isset($_REQUEST['submit'])) {
                                                                                                            echo $_REQUEST['phone'];
                                                                                                          } ?>">
            <div class="text-danger"><?php echo $pherr; ?></div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-6">
            <label for="email">Email <span class='text-danger'>*</span></label>
            <input type="email" class="form-control" placeholder="Enter email" name="email" value="<?php if (isset($_REQUEST['submit'])) {
                                                                                                            echo $_REQUEST['email'];
                                                                                                          } ?>">
            <div class="text-danger"><?php echo $emailerr; ?></div>
          </div>

          <div class="col-md-6">
            <label for="password">Password <span class='text-danger'>*</span></label>
            <input type="password" class="form-control" placeholder="Enter password" name="password">
            <div class="text-danger"><?php echo $passerr; ?></div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary m-2" name="submit">Register</button>
        <button type="submit" class="btn btn-primary ms-auto" name="login">Login</button>
      </form>
    </div>

  </div>

  <?php
  mysqli_close($conn);

  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>