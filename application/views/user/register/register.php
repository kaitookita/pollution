<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
       <link rel="stylesheet" href="/public/css/bootstrap.min.css">
   
    <!-- register -->
        <link rel="stylesheet" href="/public/css/register.css">
        <link rel="stylesheet" href="/public/css/registersuccess.css">
        <script src="/public/js/register.js"></script>
    <!-- register -->
</head>
<body>
<!-- <center><img src="/public/images.jpg"></center> -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div style="padding-top:150px;">
        <?php if (validation_errors()) : ?>
            <div class="col-md-12">
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors() ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if (isset($error)) : ?>
            <div class="col-md-12">
                <div class="alert alert-danger" role="alert">
                    <?= $error ?>
                </div>
            </div>
        <?php endif; ?>
        </div>
        </div>
        <div class="col-md-6">
            <div class="page-header">
                <h1> try to Register again!</h1>
            </div>
            <form id="form1" method="post" action="<?=base_url('register/register');?>">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter a username">
                <!-- <p class="help-block">At least 4 characters, letters or numbers only</p> -->
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                <!-- <p class="help-block">A valid email address</p> -->
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter a password">
                <!-- <p class="help-block">At least 6 characters</p> -->
            </div>
            <div class="form-group">
                <label for="password_confirm">Confirm password</label>
                <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Confirm your password">
                <!-- <p class="help-block">Must match your password</p> -->
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-info" value="Register">
            </div>
            </form>
        </div>
    </div><!-- .row -->
</div><!-- .container -->
</body>
</html>