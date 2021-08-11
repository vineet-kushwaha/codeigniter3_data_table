<?php
include('commonfunction.php');
include('connection.php');
//  echo "Connected successfully";


$name = $father = $mother = $email = $phone = $fcon = $addr = $select = $check = $gen = NULL;
$nerr = $faerr = $moerr = $emailerr = $pherr = $fconerr = $addrerr = $selerr = $checkerr = $generr = null;
//echo validate_name("");
$error_list = array();


#die();
if (isset($_GET['id'])) {
  $uid = $_GET['id'];
  $sql = "DELETE FROM info WHERE id=$uid";

  if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $conn->error;
  }
}


$edu_edit = $edit_list = array();

if (isset($_GET['edit_id'])) {
  // label_update_err:
  $_SESSION['id'] = $eid = $_GET['edit_id'];
  // $_SESSION['id'];
  // echo $sql = "SELECT * FROM info WHERE 'id'=$eid";
  // $row_info = mysqli_query($conn,$sql);
  // if (mysqli_num_rows($row_info) > 0) {
  //   while($row = mysqli_fetch_assoc($row_info)) {
  //       echo "helo";
  //   }
  // }

  $sql = "SELECT * FROM info where id = '" . $eid . "' ";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_assoc($result)) {
      $edit_list = $row;
      // print_r($row); 
      // echo $row["name"];
      $edu_edit = explode(',', $edit_list['education']);
    }
  } else {
    echo "0 results";
  }
}
//update database


if (isset($_REQUEST['update'])) {
  $eid = $_SESSION['id'];

  if (validate_name($_POST['name']) == 1) {
    $name = dataClean($_POST['name']);
    $nerr = "valid";
  } else {
    $error_list['name'] = $nerr = validate_name($_POST['name']);
  }

  if (validate_name($_POST['father']) == 1) {
    $father = dataClean($_POST['father']);
    $faerr = 'valid';
  } else {
    $error_list['father'] = $faerr = validate_name($_POST['father']);
  }

  if (validate_name($_POST['mother']) == 1) {
    $mother = dataClean($_POST['mother']);
    $moerr = 'valid';
  } else {
    $error_list['mother']  = $moerr = validate_name($_POST['mother']);
  }

  if ($_POST['email'] == "") {
    $emailerr = 'This field is requried';
  } else {
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $email = dataClean($_POST['email']);
      $emailerr = 'valid';
    } else {
      $error_list['email']  = $emailerr = 'enter a valid email';
    }
  }



  if (validate_mobile($_POST['phone']) == 1) {
    $phone = dataClean($_POST['phone']);
    $pherr = 'valid';
  } else {
    $error_list['phone']  = $pherr = validate_mobile($_POST['phone']);
  }

  if (validate_mobile($_POST['fcon']) == 1) {
    $fcon = dataClean($_POST['fcon']);
    $fconerr = 'valid';
  } else {
    $error_list['fcontact']  = $fconerr = validate_mobile($_POST['fcon']);
    $fcon = '';
  }

  if (empty($_POST['addr'])) {
    $error_list['addr']  = $addrerr = 'required field';
  } else {
    $addr = $_POST['addr'];
    $addrerr = 'valid';
  }

  if (empty($_POST['select'])) {
    $error_list['select'] = $selerr = 'required field';
  } else {
    $select = $_POST['select'];
    $selerr = 'valid';
  }
  if (empty($_POST['education'])) {
    $error_list['education'] = $checkerr = 'required field';
  } else {
    $check = $_POST['education'];
    $checkerr = 'valid';
  }

  if (empty($_POST['gender'])) {
    $error_list['gender'] = $generr = 'required field';
  } else {
    $gen = $_POST['gender'];
    $generr = 'valid';
  }


  if (count($error_list) == 0) {


    $ch_arr = implode(",", $check);

    //database update quary
    $sql = "UPDATE info SET name = '$name' , father = '$father',mother = '$mother',email = '$email',phone = '$phone',fcontact ='$fcon',address='$addr',vehicle ='$select',education ='$ch_arr',gender ='$gen' WHERE info.id ='" . $eid . "' ";

    if (mysqli_query($conn, $sql)) {
      echo "Record updated successfully";
      session_unset();
      session_destroy();
    } else {
    }
  } else {
    echo 'fill the form correctly';
    // goto label_update_err;
  }
  print_r($error_list);
  // session_unset();

  //   // destroy the session
  // session_destroy();
}


//database update over

// print_r($edu_edit);
// die();



if (isset($_REQUEST['submit'])) {

  // echo validate_name($_POST['name']);

  if (validate_name($_POST['name']) == 1) {
    $name = dataClean($_POST['name']);
    $nerr = "valid";
  } else {
    $error_list['name'] = $nerr = validate_name($_POST['name']);
  }

  //die();
  // if(validate_name($_POST['name'])){
  //   $name = dataClean($_POST['name']);
  //   $nerr = 'valid';
  // }else{
  //   $nerr = validate_name($_POST['name']);
  // }

  // echo $_POST['education1'].$_POST['education2'].$_POST['education3'];
  // die();

  if (validate_name($_POST['father']) == 1) {
    $father = dataClean($_POST['father']);
    $faerr = 'valid';
  } else {
    $error_list['father'] = $faerr = validate_name($_POST['father']);
  }

  if (validate_name($_POST['mother']) == 1) {
    $mother = dataClean($_POST['mother']);
    $moerr = 'valid';
  } else {
    $error_list['mother']  = $moerr = validate_name($_POST['mother']);
  }

  if ($_POST['email'] == "") {
    $emailerr = 'This field is requried';
  } else {
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $email = dataClean($_POST['email']);
      $emailerr = 'valid';
    } else {
      $error_list['email']  = $emailerr = 'enter a valid email';
    }
  }



  if (validate_mobile($_POST['phone']) == 1) {
    $phone = dataClean($_POST['phone']);
    $pherr = 'valid';
  } else {
    $error_list['phone']  = $pherr = validate_mobile($_POST['phone']);
  }

  if (validate_mobile($_POST['fcon']) == 1) {
    $fcon = dataClean($_POST['fcon']);
    $fconerr = 'valid';
  } else {
    $error_list['fcontact']  = $fconerr = validate_mobile($_POST['fcon']);
    $fcon = '';
  }

  if (empty($_POST['addr'])) {
    $error_list['addr']  = $addrerr = 'required field';
  } else {
    $addr = $_POST['addr'];
    $addrerr = 'valid';
  }

  if (empty($_POST['select'])) {
    $error_list['select'] = $selerr = 'required field';
  } else {
    $select = $_POST['select'];
    $selerr = 'valid';
  }
  if (empty($_POST['education'])) {
    $error_list['education'] = $checkerr = 'required field';
  } else {
    $check = $_POST['education'];
    $checkerr = 'valid';
  }

  if (empty($_POST['gender'])) {
    $error_list['gender'] = $generr = 'required field';
  } else {
    $gen = $_POST['gender'];
    $generr = 'valid';
  }

  // var_dump($check);
  // echo count($error_list);
  //   die();

  if (count($error_list) == 0) {

    //echo $ch;
    $ch_arr = implode(",", $check);
    //}
    // echo $ch_arr; 

    $sql = "INSERT INTO info (name,father,mother,email,phone,fcontact,address,vehicle,education,gender) VALUES ('$name','$father','$mother','$email','$phone','$fcon','$addr','$select','$ch_arr','$gen')";
    // echo $mysqli_query -> info;
    if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
    } else {
      // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  } else {
    echo 'fill the form correctly';
  }
  // database insert 


}




// echo $name.'<br>';
// echo $father.'<br>';
// echo $mother.'<br>';
// echo $email.'<br>';
// echo $phone.'<br>';
// echo $fcon.'<br>';
// echo $addr.'<br>';






// $sql = "INSERT INTO info (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')";
// if (mysqli_query($conn, $sql)) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }
// if(isset($_GET['edit_id'])){echo $edit_list['name'];}
// echo $edit_list['email'];
$sqlsel = "SELECT id, name, father,phone FROM info where 1";
$result = mysqli_query($conn, $sqlsel);



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td,
    th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }
  </style>
  <title>Contact</title>
</head>

<body>


  <div>
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-12">
          <p class="h1 text-start">Contact Form</p>
        </div>
      </div>
      <form action="contact.php" class="" method="POST">
        <div class="form-group row">
          <div class="col-md-6">
            <label for="name">Name:<span class='text-danger'>*</span></label>
            <input type="text" class="form-control" placeholder="Enter username" name="name" value="<?php if (isset($_GET['edit_id'])) {
                                                                                                      echo $edit_list['name'];
                                                                                                    } ?>">
            <!-- <div class="valid-feedback">Valid.</div> -->
            <!-- <div class="invalid-feedback text-danger"></div> -->
            <div class="text-danger"><?php echo $nerr; ?></div>
          </div>

          <div class="col-md-6">
            <label for="father">Father's Name:<span class='text-danger'>*</span></label>
            <input type="text" class="form-control" placeholder="Enter father's name" name="father" value="<?php if (isset($_GET['edit_id'])) {
                                                                                                              echo $edit_list['father'];
                                                                                                            } ?>">
            <!-- <div class="valid-feedback">Valid.</div> -->
            <div class="text-danger"><?php echo $faerr; ?></div>

          </div>

        </div>
        <div class="form-group row">
          <div class="col-md-6">
            <label for="email">email <span class='text-danger'>*</span></label>
            <input type="email" class="form-control" placeholder="Enter email" name="email" value="<?php if (isset($_GET['edit_id'])) {
                                                                                                      echo $edit_list['email'];
                                                                                                    } ?>">
            <!-- <div class="valid-feedback">Valid.</div> -->
            <div class="text-danger"><?php echo $emailerr; ?></div>
          </div>

          <div class="col-md-6">
            <label for="mother">Mother's Name: <span class='text-danger'>*</span></label>
            <input type="text" class="form-control" placeholder="Enter mother's name" name="mother" value="<?php if (isset($_GET['edit_id'])) {
                                                                                                              echo $edit_list['mother'];
                                                                                                            } ?>">
            <!-- <div class="valid-feedback">Valid.</div> -->
            <div class="text-danger"><?php echo $moerr; ?></div>
          </div>

        </div>
        <div class="form-group row">
          <div class="col-md-6">
            <label for="phone">Phone<span class='text-danger'>*</span></label>
            <input type="tel" class="form-control" placeholder="" name="phone" pattern="[0-9]{10}" value="<?php if (isset($_GET['edit_id'])) {
                                                                                                            echo $edit_list['phone'];
                                                                                                          } ?>">
            <!-- <div class="valid-feedback">Valid.</div> -->
            <div class="text-danger"><?php echo $pherr; ?></div>
          </div>

          <div class="col-md-6">
            <label for="fcon">Father's Contact:<span class='text-danger'>*</span></label>
            <input type="tel" class="form-control" placeholder="" name="fcon" pattern="[0-9]{10}" value="<?php if (isset($_GET['edit_id'])) {
                                                                                                            echo $edit_list['fcontact'];
                                                                                                          } ?>">
            <!-- <div class="valid-feedback">Valid.</div> -->
            <div class="text-danger"><?php echo $fconerr; ?></div>
          </div>

        </div>

        <div class="form-group row">
          <div class="col-md-4 my-2">
            <div class="dropdown">
              <select name="select" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                <div class="dropdown-menu">
                  <option value="" class="dropdown-item">Select a vehicle<p style="color: red;">*</p>
                  </option>
                  <option value="volvo" class="dropdown-item" <?php if (isset($_GET['edit_id'])) {
                                                                if ($edit_list['vehicle'] == 'volvo') {
                                                                  echo "selected";
                                                                }
                                                              } ?>>Volvo</option>
                  <option value="saab" class="dropdown-item" <?php if (isset($_GET['edit_id'])) {
                                                                if ($edit_list['vehicle'] == 'saab') {
                                                                  echo "selected";
                                                                }
                                                              } ?>>Saab</option>
                  <option value="fiat" class="dropdown-item" <?php if (isset($_GET['edit_id'])) {
                                                                if ($edit_list['vehicle'] == 'fiat') {
                                                                  echo "selected";
                                                                }
                                                              } ?>>Fiat</option>
                  <option value="audi" class="dropdown-item" <?php if (isset($_GET['edit_id'])) {
                                                                if ($edit_list['vehicle'] == 'audi') {
                                                                  echo "selected";
                                                                }
                                                              } ?>>Audi</option>
                </div>
              </select>
            </div>
            <!-- <div class="valid-feedback">Valid.</div> -->
            <div class="text-danger"><?php echo $selerr; ?></div>
          </div>

          <div class="col-md-4">
            <input type="checkbox" name="education[]" value="10" <?php if (isset($_GET['edit_id'])) {
                                                                    if (in_array("10", $edu_edit)) {
                                                                      echo "checked";
                                                                    }
                                                                  } ?>>
            <label for="education">10th</label><br>
            <input type="checkbox" name="education[]" value="12" <?php if (isset($_GET['edit_id'])) {
                                                                    if (in_array("12", $edu_edit)) {
                                                                      echo "checked";
                                                                    }
                                                                  } ?>>
            <label for="education">12th</label><br>
            <input type="checkbox" name="education[]" value="under graduation" <?php if (isset($_GET['edit_id'])) {
                                                                                  if (in_array("under graduation", $edu_edit)) {
                                                                                    echo "checked";
                                                                                  }
                                                                                } ?>>
            <label for="education">Under graduation</label><br><br>
            <div class="text-danger"><?php echo $checkerr; ?></div>
          </div>
          <div class="col-md-4">
            <input type="radio" name="gender" value="male" <?php if (isset($_GET['edit_id'])) {
                                                              if ($edit_list['gender'] == 'male') {
                                                                echo "checked";
                                                              }
                                                            } ?>>
            <label for="gender">Male</label><br>
            <input type="radio" name="gender" value="female" <?php if (isset($_GET['edit_id'])) {
                                                                if ($edit_list['gender'] == 'female') {
                                                                  echo "checked";
                                                                }
                                                              } ?>>
            <label for="gender">Female</label><br>
            <div class="text-danger"><?php echo $generr; ?></div>
          </div>

        </div>

        <div class="form-group row">
          <div class="col-md-10">
            <label for="addr">Address<span class='text-danger'>*</span></label>
            <input type="textbox" class="form-control" placeholder="Enter address.." name="addr" value="<?php if (isset($_GET['edit_id'])) {
                                                                                                          echo $edit_list['address'];
                                                                                                        } ?>">
            <!-- <div class="valid-feedback">Valid.</div> -->
            <div class="text-danger"><?php echo $addrerr; ?></div>
          </div>

        </div>
        <button type="submit" class="btn btn-primary m-2" name="submit" <?php if (isset($_GET['edit_id'])) {
                                                                          echo "disabled";
                                                                        } ?>>Submit</button>
        <button type="submit" name="update" class="btn btn-primary m-2 " <?php if (isset($_GET['edit_id'])) {
                                                                            echo "";
                                                                          } else {
                                                                            echo "disabled";
                                                                          } ?>>Update</button>
      </form>

      <h2>HTML Table</h2>

      <table>
        <tr>
          <th>Sr.No</th>
          <th>Name</th>
          <th>Father</th>
          <th>Mobile No </th>
          <th>Action</th>
        </tr>
        <?php
        $sr = 1;
        if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while ($row1 = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
              <td><?php echo $sr; ?></td>
              <td><?php echo $row1['name']; ?></td>
              <td><?php echo $row1['father']; ?></td>
              <td><?php echo $row1['phone']; ?></td>
              <td><a href="contact.php?id=<?php echo $row1['id']; ?>" target="_blank">delete</a>&nbsp;| &nbsp;<a href="contact.php?edit_id=<?php echo $row1['id']; ?>" target="">edit</a></td>

            </tr>

        <?php
            $sr++;
            // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["father"]. "<br>". $row["phone"]. "<br>";
          }
        } else {
          echo "0 results";
        }

        ?>


      </table>
    </div>

  </div>

  <?php
  mysqli_close($conn);

  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>