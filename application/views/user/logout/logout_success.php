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
        <form action="" method="post" class="popup-form">
            <div id="regissuccess" class="alert alert-info" role="alert"><center><h1>Thank you for  </h1></center></div>
            <div id="regissuccessfully" class="alert alert-success" role="alert"><center><h2>Join Us</h2></center></div>
            <div class="input-group">
                <p>
                    <a class="regis btn btn-success" style="text-decoration: none;" href="<?php echo base_url('home') ; ?>">Homepage</a>
                </p>
            </div>
        </form>
    </div>
</div>
</body>
</html>
