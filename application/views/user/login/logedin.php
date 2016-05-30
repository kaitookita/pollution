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
<div class="popup-wrapper" id="popup">
    <div class="popup-container">
        <form method="post" action="<?=base_url('login/login_user');?>" class="popup-form">
            <div class="form-group">
                <h4><?php echo $email_address . ', has been activated!<br><br>  Login to the site.'; ?></h4>
            </div>
             <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Your email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Your password">
            </div>
            <div class="input-group">
                <p>
                    <input type="submit" class="regis btn btn-success"  value="Login" name="backtohomepage" >
                </p>
            </div>
        </form>
    </div>
</div>
</body>
</html>