<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/public/css/login.css" />
</head>
<body>
<!-- <center><img src="/projectwebapp/public/images/tab.png"></center> -->

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div style="padding-top:125px;">
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
                <h1>try to Login again!</h1>
            </div>
            <form id="form1" method="post" action="<?=base_url('login/login');?>">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="usr" name="usr" placeholder="Your username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Your password">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-info" value="Login">
            </div>
            </form>
        </div>
    </div><!-- .row -->
</div><!-- .container -->
</body>
</html>