









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
    <title>New Contact</title>
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
                <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    Dropdown button
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Link 1</a>
                    <a class="dropdown-item" href="#">Link 2</a>
                    <a class="dropdown-item" href="#">Link 3</a>
                </div>
                </div>
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
        <button type="reset" class="btn btn-b-primary m-2">clear</button>
        </form>
    </div>
</body>
</html>