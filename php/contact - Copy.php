<?php 
include('connection.php');
include('commonfunction.php');

//$name=$father=$mother= $email = $phone = $fphone = $address=NULL;

if(isset($_REQUEST['submit'])){

  if (empty($_POST['name'])){
    $naerr='fill this field';
  }else{
    if(!preg_match("/^[a-zA-Z-' ]*$/",$_POST['name'])){
      $naerr='enter a valid name';
    } else {
      $name = dataClean($_POST['name']);
      
    }
  }

  if (empty($_POST['father'])){
    $faerr='fill this field';
  }else{
    if(!preg_match("/^[a-zA-Z-' ]*$/",$_POST['father'])){
      $faerr='enter a valid name';
    } else {
      $father = dataClean($_POST['father']);
      
    }
  }

  if (empty($_POST['mother'])){
    $moerr='fill this field';
  }else{
    if(!preg_match("/^[a-zA-Z-' ]*$/",$_POST['mother'])){
      $moerr='enter a valid name';
    } else {
      $mother = dataClean($_POST['mother']);
      
    }
  }

  if (empty($_POST['email'])){
    $emailerr='fill this field';
  }else{
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
      $emailerr='enter a valid email';
    } else {
      $email = dataClean($_POST['email']);
      
    }
  }

  if (empty($_POST['phone'])){
    $pherr='fill this field';
  }else{
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
      $pherr='enter a valid email';
    } else {
      $email = dataClean($_POST['email']);
      
    }
  }

  


}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
    <title>Contact</title>
</head>
<body>


<div>
    <div class ="container">
        <div class="row justify-content-md-center">
            <div class="col-md-12">
                <p class="h1 text-start">Contact Form</p>
            </div>
        </div>
        <form action="contact.php" class="was-validated" method="POST">
  <div class="form-group row">
      <div class="col-md-6">
      <label for="name">Name:</label>
    <input type="text" class="form-control"  placeholder="Enter username" name="name" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
      </div>
      
      <div class="col-md-6">
      <label for="father">Father's Name:</label>
    <input type="text" class="form-control"  placeholder="Enter father's name" name="father" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
      </div>
    
  </div>
  <div class="form-group row">
      <div class="col-md-6">
      <label for="email">email</label>
    <input type="email" class="form-control"  placeholder="Enter email" name="email" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
      </div>
      
      <div class="col-md-6">
      <label for="mother">Mother's Name:</label>
    <input type="text" class="form-control"  placeholder="Enter mother's name" name="mother" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
      </div>
    
  </div>
  <div class="form-group row">
      <div class="col-md-6">
      <label for="phone">Phone</label>
    <input type="tel" class="form-control"  placeholder="" name="phone" pattern="[0-9]{10}" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
      </div>
      
      <div class="col-md-6">
      <label for="fcon">Father's Contact:</label>
    <input type="tel" class="form-control"  placeholder="" name="fcon" pattern="[0-9]{10}" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
      </div>
    
  </div>
  <div class="form-group row">
      <div class="col-md-10">
      <label for="addr">Address</label>
    <input type="textbox" class="form-control"  placeholder="Enter address.." name="addr" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
      </div>
    
  </div>
  <!-- <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox" name="remember" required> I agree on blabla.
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Check this checkbox to continue.</div>
    </label>
  </div> -->
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>