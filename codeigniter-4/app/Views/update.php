<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
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
     
       </div>
</body>
</html>