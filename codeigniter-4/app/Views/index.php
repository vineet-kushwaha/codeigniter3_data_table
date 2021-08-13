<!doctype html>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="icon" href="#" type="image/gif" sizes="16x16">
    <title>First CodeIgniter Page</title>
</head>

<body>

    <h1 class='display-5 text-center'>fill the form</h1>
    <div class="container my-5">
        <form action="" method="" class="form-group bg-secondary p-5 rounded ">
            

            <div class="form-group row">
                <div class="col-md-6">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" placeholder="name" id="name">
                    <div class="text-danger" id="name_err">*</div>
                </div>
                <div class="col-md-6">
                    <label for="phone">Phone</label>
                    <input type="tel" class="form-control" placeholder="Enter Phone Number" id="phone">
                    <div class="text-danger" id="phone_err">*</div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" placeholder="Enter email" id="email">
                    <div class="text-danger" id="email_err">*</div>
                </div>
                <div class="col-md-6">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" placeholder="Enter password" id="password">
                    <div class="text-danger" id="pass_err">*</div>
                </div>
            </div>

            <div id="form-btn">
                <button type="submit" class="btn btn-primary m-2" name="submit" id="reg">Register</button>
            </div>

        </form>
    </div>



</body>

</html>