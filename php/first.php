<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First PHP</title>
</head>
<body>
    <?php
    //array three typesof array >indexed array, >assocaitive array, >multidimentional array
    //indexed array
    $car = array('bmw','alfa','beta','gama');
    print_r($car);
    echo '<br>';
    echo 'i like '.$car[0].', '.$car[1].', '.$car[3].'.'.'<br>';
    echo count($car);
    echo '<br>';
    for ($i=0;$i< count($car);$i++){
        echo $car[$i].'<br>';
    }
    //associative arrays
    $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
    // work same as above
    /*
    $age['Peter'] = "35";
    $age['Ben'] = "37";
    $age['Joe'] = "43";
    */
    echo "Peter is " . $age['Peter'] . " years old.";
    echo "<br>";
    foreach($age as $n=>$y){
        echo "key= ".$n." value= ".$y.".<br>";
    }
    //multidimentional array
    $cars = array(
        array ('volvo',22,34),
        array('bmw',2,44),
        array('land rovar',25,55),
        array('ford',22)
    );
    print_r($cars);
    echo '<br>';
    echo $cars[0][0].': in stock:'.$cars[0][1].', sold:'.$cars[0][2].'<br>';
    echo $cars[1][0].': in stock:'.$cars[1][1].', sold:'.$cars[1][2].'<br>';


    for ($row = 0; $row < count($cars); $row++) {
        echo "<p><b>Row number $row</b></p>";
        echo "<ul>";
        for ($col = 0; $col < count($cars[$row]); $col++) {
          echo "<li>".$cars[$row][$col]."</li>";
          
        }
        echo "row length-> ".count($cars[$row]);
        echo "</ul>";
      }
      /*
    sort() - sort arrays in ascending order
    rsort() - sort arrays in descending order
    asort() - sort associative arrays in ascending order, according to the value
    ksort() - sort associative arrays in ascending order, according to the key
    arsort() - sort associative arrays in descending order, according to the value
    krsort() - sort associative arrays in descending order, according to the key
      */
    $num = array(9,3,6,2,6,1,0,8,7,4,0);
    rsort($num);
    $len= count($num);
    for ($i=0;$i<$len;$i++){
        echo $num[$i].'<br>';
    }
    $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
    asort($age);

    foreach($age as $x => $x_value) {
        echo "Key=" . $x . ", Value=" . $x_value;
        echo "<br>";
    }
//PHP SUPER GLOBAL VERIABLE

    echo $_SERVER['HTTP_REFERER'];
    echo "<br>";
    echo $_SERVER['HTTP_USER_AGENT'];
    echo "<br>";
    echo $_SERVER['SCRIPT_NAME'];
    echo "<br>";
    echo $_SERVER['SERVER_SIGNATURE'];
    echo "<br>";
    echo $_SERVER['SERVER_ADMIN'];

    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
<input type="text" name="fname">
<input type="submit">
</form>
<?php
if ($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_POST['fname'];
    if (empty($name)){
        echo "name is empty.";
    }
    else {
        echo $name;
    }
}
?>


<!-- PHP form validation -->
<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>

</body>
</html>