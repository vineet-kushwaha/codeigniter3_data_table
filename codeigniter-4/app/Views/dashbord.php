<?php
// session_start();
// if($_SESSION['user']==0){
//     header("Location: login.php");
// }
// $session = session();
// print_r($_SESSION)

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Dashbord</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light " name="top">
        <div class="container-fluid fw-bold ">
            <a class="navbar-brand fw-bold " style="color: #2aeb71;" href="#"><?php echo '' //$session->user->email; 
                                                                                ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse order-last order-lg-0 " id="navbarSupportedContent">
                <form action="<?php echo base_url('/LoginCon/logout') ?>" method="POST" class="d-flex ms-auto">
                    <button class="btn" id="li-hov" style="background-color: #4aee86; border-radius:1,4;color: white;" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="jumbotron py-5 w-100" style="color: white;background-color: rgba(0, 0, 0, 0.521);">
        <div class="container row ">
            <div class="col-8 fade-in zoom-in ">
                <p class="display-3 p-3 text-start  ">Welcome <?php echo '' //$session['user']->name 
                                                                ?> !</p>
                <P class="p-3 h3 ">We are teams of talented designers making website with bootstrap.</P>
                <form class="d-flex">
                    <button class="button btn-green" type="submit">Get Started</button>
                </form>
            </div>
        </div>
    </div>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($user as $row) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $row['name']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $row['phone_no']; ?></td>
                        <td><?= $row['password']; ?></td>
                        <td><a href="/LoginCon/update/<?= $row['id']?>">edit</a></td>

                    </tr>
                <?php $i++;
                endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>