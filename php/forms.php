<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .err{color: red;}
    </style>
    <title>FORM</title>
</head>
<body>

<?php

#$conn = new mysqli($servername='localhost',$user='root',$dbpass='',$database='mydb');
$servername='localhost';
$user='root';
$dbpass='';
//mysqli procedural
$conn = mysqli_connect($servername, $user, $dbpass);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  echo "Connected successfully";

  //mysql pdo php data object.
/*try {
    $conn = new PDO("mysql:host=$servername;dbname=mydb", $user, $dbpass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }*/


$fname=$lname=$mail=$dob=$pass='';
$fnameerr=$lnameerr=$mailerr=$doberr=$passerr='';
if ($_SERVER['REQUEST_METHOD']=='POST'){
    if (empty($_POST['fname'])){
        $fnameerr = 'required field';
    }else {
        if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST['fname'])){
            $fnameerr = 'enter a valid name';
        }else{
            $fname = dataClean($_POST['fname']);
        }        
    }

    if (empty($_POST['lname'])){
        $lnameerr = 'required field';
    }else{
        if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST['lname'])){
            $lnameerr = 'enter a valid name';
        }else{
            $lname = $_POST['lname'];
        }
    }

    if (empty($_POST['email'])){
        $mailerr = 'required field';
    }else{
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $mail = $_POST['email'];
        }else{
            $mailerr = 'enter a valid email';
        }
    }

    if (empty($_POST['dob'])){
        $doberr = 'required field';
    }else{
        $dob = $_POST['dob'];
    }

    if (empty($_POST['pass'])){
        $passerr = 'required field';
    }else{
        $pass = $_POST['pass'];
    }
}


//data filter function removes extra spaces,tabs,back-slash and convert in plain text.
function dataClean($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>






<!-- form starts Here -->
    <h1>Form fill</h1>
    <p>please fill the form.</p>
    <br><br><br>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    
    <span class='err'>* required fiefds.</span><br><br>

    <label for="fname">first name</label>
    <input type="text" name="fname" required>
    <span class='err'><?php echo $fnameerr ; ?>*</span><br>

    <label for="lname">last name</label>
    <input type="text" name="lname" required>
    <span class='err'><?php echo $lnameerr ; ?>*</span><br>

    <label for="email">email</label>
    <input type="email" name="email" required>
    <span class='err'><?php echo $mailerr ; ?>*</span><br>

    <label for="dob">date of birth</label>
    <input type="date" name="dob" required>
    <span class='err'><?php echo $doberr ; ?>*</span><br>

    <label for="dob">address</label>
    <input type="tectbox" name="addr" required>
    <span class='err'><?php echo $doberr ; ?>*</span><br>

    <label for="pass">Password</label>
    <input type="password" name="pass" required>
    <span class='err'><?php echo $passerr ; ?>*</span><br>

    <input type="submit">
</form>

<?php 
    if (count($_POST)){    
    echo '<h3>name: </h3>'.$fname.' '.$lname;
    echo '<h3>email: </h3>'.$mail;
    echo '<h3>dob: </h3>'.$dob;
    echo '<h3>password: </h3>'.$pass;
    }

?>


</body>
</html>