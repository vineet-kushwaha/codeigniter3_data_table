<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Login</title>
</head>

<body>

    <div>
        <form method="POST" action="<?php echo base_url('loginval') ?>" class="form-group container">
            <?php $validation = \Config\Services::validation(); ?>

            <label for="email">Email</label>
            <input type="email" class="form-control" name="email">
            <!-- Error -->
            <?php if ($validation->getError('name')) { ?>
                <div class='alert alert-danger mt-2'>
                    <?= $error = $validation->getError('email'); ?>
                </div>
            <?php } ?>

            <label for="password">Password</label>
            <input type="password" class="form-control" name="password">
            <!-- Error -->
            <?php if ($validation->getError('name')) { ?>
                <div class='alert alert-danger mt-2'>
                    <?= $error = $validation->getError('password'); ?>
                </div>
            <?php } ?>

            <button type="submit" class="btn btn-success my-1">Login</button>
        </form>
    </div>
</body>

</html>