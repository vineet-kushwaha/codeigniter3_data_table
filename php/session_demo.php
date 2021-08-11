<?php 
include('commonfunction.php');
include('connection.php');


$name= $email = $phone = $pass=NULL;
$nerr=$emailerr=$pherr=$passerr=null; 

//$_SESSION['data']=array();


if(isset($_REQUEST['submit'])){

    if(validate_name($_POST['name'])==1){
        $name = dataClean($_POST['name']);
        $list_array['name']=$name;
        $nerr = "valid";
      }else{
        $nerr = validate_name($_POST['name']);
      }

      if($_POST['email']==""){
        $emailerr='This field is requried';
      }else{
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
          $email = dataClean($_POST['email']);
          $list_array['email'] = $email;
          $emailerr= 'valid';
        } else {
          $emailerr='enter a valid email';
        }
      }

      if(validate_mobile($_POST['phone'])==1){
        $phone = dataClean($_POST['phone']);
        $list_array['phone'] = $phone ;
        $pherr = 'valid';
      } else {
        $pherr=validate_mobile($_POST['phone']);
      }
      if ($_POST['pass']==''){
          $passerr = 'This field is required';
      }else{
          $pass=dataClean($_POST['pass']);
          $list_array['password']=$pass;
      }
    
   
    
    $_SESSION['data'][]=$list_array; // Makes the session an array
   
    // array_push($_SESSION['data'],$list_array);   
    // print_r($_SESSION['data']);

    //   array_push($_SESSION['data'],$list_array);

   /// $_SESSION['data']=array('name'=>$name);
}

if (isset($_GET['id'])){
    $del_key = $_GET['id'];
    foreach($_SESSION['data'] as $key => $value) {
                if($key == $del_key) {
                  unset($_SESSION['data'][$key]);
                 }
               }
}

//  print_r($_SESSION['data']);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
    <title>session</title>
</head>
<body>
    <div class="container  p-2">
        <div class="row justify-content-md-center">
            <div class="col-md-12">
                <p class="h1 text-start">session</p>
            </div>
        </div>
        <form action="session_demo.php" class="" method="POST">
        <div class="form-group row">
            <div class="col-md-6">
            <label for="name">Name:<span class='text-danger'>*</span></label>
            <input type="text" class="form-control"  placeholder="Enter username" name="name"  >
            <!-- <div class="valid-feedback">Valid.</div> -->
            <!-- <div class="invalid-feedback text-danger"></div> -->
            <div class="text-danger"><?php echo $nerr; ?></div>
            </div>
            <div class="col-md-6">
            <label for="email">email <span class='text-danger'>*</span></label>
            <input type="email" class="form-control"  placeholder="Enter email" name="email"  >
            <!-- <div class="valid-feedback">Valid.</div> -->
            <div class="text-danger"><?php echo $emailerr; ?></div>
            </div>   
        </div>
       
        <div class="form-group row">
            <div class="col-md-6">
            <label for="phone">Phone<span class='text-danger'>*</span></label>
            <input type="tel" class="form-control"  placeholder="phone number" name="phone" pattern="[0-9]{10}"  >
            <!-- <div class="valid-feedback">Valid.</div> -->
            <div class="text-danger"><?php echo $pherr; ?></div>
            </div>
            
            <div class="col-md-6">
            <label for="pass">Password:<span class='text-danger'>*</span></label>
            <input type="password" class="form-control"  placeholder="enter password" name="pass"  >
            <!-- <div class="valid-feedback">Valid.</div> -->
            <div class="text-danger"><?php echo $passerr; ?></div>
            </div>
            
        </div>

        <button type="submit" class="btn btn-primary m-2" name="submit">Submit</button>
        <button type="reset" class="btn btn-b-primary m-2" name="clear">clear</button>
        </form>
    </div>
    <div class="container">
            <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>contact</th>
            <th>password </th>
            <th>Action</th>
        </tr>
<?php
    
foreach($_SESSION['data'] as $key=>$val){?>
     <tr>
            <td><?= $val['name']?></td>
            <td><?= $val['email']?></td>
            <td><?=$val['phone'] ?></td>
            <td><?= $val['password']?></td>
            <td><a href="session_demo.php?id=<?php echo $key; ?>" >delete</a>&nbsp; &nbsp;<a href="#" >view</a></td>
        </tr>
   

<?php }

// if ($action == "remove"){
//     foreach($_SESSION['cart'] as $key => $value) {
//         if($value['product_id'] == $id) {
//           unset($_SESSION['cart'][$key]);
//          }
//        }
//   }

?>
        
        
        </table>
    </div>
</body>
</html>