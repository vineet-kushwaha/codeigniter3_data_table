<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Codeigniter 4 Form Validation Example - positronx.io</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    .container {
      max-width: 550px;
    }
  </style>
</head>

<body>
  <div class="container mt-5">
         
    <?php $validation = \Config\Services::validation(); ?>

    <form method="post" action="<?php echo base_url('/submit-form') ?>">
      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="">

        <!-- Error -->
        <?php if($validation->getError('name')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('name'); ?>
            </div>
        <?php }?>
      </div>
       

      <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control">

        <!-- Error -->
        <?php if($validation->getError('email')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('email'); ?>
            </div>
        <?php }?>
      </div>

      <div class="form-group">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control">

        <!-- Error -->
        <?php if($validation->getError('phone')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('phone'); ?>
            </div>
        <?php }?>
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control">

        <!-- Error -->
        <?php if($validation->getError('password')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('password'); ?>
            </div>
        <?php }?>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
      </div>
    </form>

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
        <?php $i=1; foreach($user as $row):?>
            <tr>
                <td><?= $i;?></td>
                <td><?= $row['name'];?></td>
                <td><?= $row['email'];?></td>
                <td><?= $row['phone_no'];?></td>
                <td><?= $row['password'];?></td>

            </tr>
        <?php $i++; endforeach;?>
        </tbody>
    </table>

  </div>
</body>

</html>