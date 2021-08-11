<?php
include('commonfunction.php');
include('connection.php');




$emailerr = $passerr = "";
$email = $pass = "";
$error_list = array();


if (isset($_REQUEST['login'])) {

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
        // $passerr = "valid";
    }
    
    
    $sql = "SELECT * FROM login where email_id = '".$email."' ";
    $result = mysqli_query($conn,$sql);
    $log_data = get_row_sql($result);

    if ($log_data) {
        // print_r($log_data);
        if (password_verify($pass, $log_data['password']) == 1) {
            print("you are loged in!");
            $_SESSION['user'] = $log_data;
            print_r($_SESSION['user']);
            header("Location: dash.php");
        } else {
            $passerr = "Incorrect email or password.";
            fun_alert($passerr);
        }
    } else {
        $passerr = "Incorrect email or password.";
        fun_alert($passerr);
    }
}

if (isset($_REQUEST['signup'])){
    header("Location: signup.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <form action="login.php" class="form-group" method="POST">

            <div class="form-group row">
                <div class="col-md-6">
                    <label for="email">Email <span class='text-danger'>*</span></label>
                    <input type="email" class="form-control" placeholder="Enter email" name="email" value="">
                    <!-- <div class="valid-feedback">Valid.</div> -->
                    <div class="text-danger"><?php echo $emailerr; ?></div>
                </div>

                <div class="col-md-6">
                    <label for="password">Password <span class='text-danger'>*</span></label>
                    <input type="password" class="form-control" placeholder="Enter password" name="password">
                    <!-- <div class="valid-feedback">Valid.</div> -->
                    <div class="text-danger"><?php echo $passerr; ?></div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary m-2" name="login">Login</button>
            <button type="submit" class="btn btn-primary ms-auto" name="signup">SignUp</button>

        </form>
    </div>
</body>

</html>
<?php 
  mysqli_close($conn);
?>

