<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pollution</title>
    <meta name="description" content="Perspective Page View Navigation: Transforms the page in 3D to reveal a menu"/>
    <meta name="keywords"
          content="3d page, menu, navigation, mobile, perspective, css transform, web development, web design"/>
    <meta name="author" content="Codrops"/>
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="/public/css/normalize.css"/>
    <link rel="stylesheet" type="text/css" href="/public/css/demo.css"/>
    <link rel="stylesheet" type="text/css" href="/public/css/component.css"/>
    <!-- csstransforms3d-shiv-cssclasses-prefixed-teststyles-testprop-testallprops-prefixes-domprefixes-load -->
    <script src="/public/js/modernizr.custom.25376.js"></script>


    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="/public/css/normalize-log-regis.css"/>
    <link rel="stylesheet" type="text/css" href="/public/css/demo-log-regis.css"/>
    <link rel="stylesheet" type="text/css" href="/public/css/component-log-regis.css"/>
    <link rel="stylesheet" type="text/css" href="/public/css/content-log-regis.css"/>
    <script src="/public/js/js/modernizr.custom.js"></script>
    <link rel="stylesheet" type="text/css" href="/public/css/font.css"/>

    <style type="text/css">
        .textsize {
            font-family:"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
            font-size:9px;
        }
        .registration_form {
            margin:0 auto;
            width:500px;
            padding:14px;
        }
        label {
            width: 10em;
            float: left;
            margin-right: 0.5em;
            display: block
        }
        .submit {
            float:right;
        }
        fieldset {
            background:#EBF4FB none repeat scroll 0 0;
            border:2px solid #B7DDF2;
            width: 500px;
        }
        legend {
            color: #fff;
            background: #80D3E2;
            border: 1px solid #781351;
            padding: 2px 6px
        }
        .elements {
            padding:10px;
        }
        #create {
            border-bottom:1px solid #B7DDF2;
            color:#666666;
            font-size:16px;
            margin-bottom:20px;
            padding-bottom:10px;
        }
        a{
            color:#0099FF;
            font-weight:bold;
        }

        /* Box Style */


        /*.success, .warning, .errormsgbox, .validation {
            border: 1px solid;
            margin: 0 auto;
            padding:10px 5px 10px 50px;
            background-repeat: no-repeat;
            background-position: 10px center;
            font-weight:bold;
            width:450px;

        }*/


        /*new code*/
        @media (max-width: 480px) {
            .success, .warning, .errormsgbox, .validation {
                border: 1px solid;
                margin: 0 auto;
                padding:10px 5px 10px 50px;
                background-repeat: no-repeat;
                background-position: 10px center;
                font-weight:bold;
                width:100%;

            }
        }
        @media (min-width: 530px) and (max-width: 1950px) {
            .success, .warning, .errormsgbox, .validation {
                border: 1px solid;
                margin: 0 auto;
                padding:10px 5px 10px 50px;
                background-repeat: no-repeat;
                background-position: 10px center;
                font-weight:bold;
                width:450px;

            }
        }
        /*new code*/


        .success {

            color: #4F8A10;
            background-color: #DFF2BF;
            background-image:url('//public/images/success.png');
        }
        .warning {

            color: #9F6000;
            background-color: #FEEFB3;
            background-image: url('//public/images/warning.png');
        }
        .errormsgbox {

            color: #D8000C;
            background-color: #FFBABA;
            background-image: url('//public/images/error.png');

        }
        .validation {

            color: #D63301;
            background-color: #FFCCBA;
            background-image: url('//public/images/error.png');
        }

    </style>
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="stylesheet" type="text/css" href="/public/css/loginform/login-regis-form.css"/>
</head>
<body>
<div id="perspective" class="perspective effect-rotateleft">
    <div class="container">
        <div class="wrapper"><!-- wrapper needed for scroll -->
            <!-- Top Navigation -->

            <!-- <a class="codrops-icon codrops-icon-prev" href="http://tympanus.net/Development/ProgressButtonStyles/"><span>Previous Demo</span></a> -->
            <!-- <span class="right"><a class="codrops-icon codrops-icon-drop" href="http://tympanus.net/codrops/?p=17915"><span>Back to the Codrops Article</span></a></span> -->

            <span class="left"><button class="left" id="showMenu" style=" font-size: 125%;margin:10px;color:#fff">Show
                    Menu
                </button></span>


            <header class="codrops-header">

            </header>
            <div class="col-md-6">
                <div style="magin-top:-10px;">
                    <?php if (validation_errors()) : ?>
                        <div class="col-md-12">
                            <div class="errormsgbox" style="font-size: 16px;">
                                <?= validation_errors(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($error)) : ?>
                        <div class="col-md-12">
                            <div class="errormsgbox" style="font-size: 16px;" role="alert">
                                <?= $error ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <section>

                <div class="content">
                    <div class="card"></div>
                    <div class="card">
                        <h1 class="title">Reset Password</h1>
                        <form id="formlogin" action="<?php echo base_url('login/forgot_password'); ?>" method="post">
                            <div class="input-container">
                                <input type="text" id="email" name="email" required="required"/>
                                <label for="email">Email</label>
                                <div class="bar"></div>
                            </div>
                            <!--<div class="input-container">
                                <input type="password" id="password" name="password" required="required"/>
                                <label for="Password">Password</label>
                                <div class="bar"></div>
                            </div>-->
                            <div class="button-container">
                                <button onclick="submitLogin()" class="logins" name="login"><span>Send</span></button>
                            </div>
                            <div class="footer"><a href="<?=base_url('member/login_register');?>">Back</a></div>
                        </form>
                    </div>
                    <div class="card alt">
<!--                        <div class="toggle"></div>
                        <h1 class="title">Register
                            <div class="close"></div>
                        </h1>-->
<!--                        <form id="formregis" method="POST" action="<?/*=base_url('register/register_user');*/?>">
                            <div class="input-container">
                                <input type="text" id="firstname" name="firstname" required="required"/>
                                <label for="firstname">First name</label>
                                <div class="bar"></div>
                            </div>
                            <div class="input-container">
                                <input type="text" id="lastname" name="lastname" required="required"/>
                                <label for="firstname">Last name</label>
                                <div class="bar"></div>
                            </div>
                            <div class="input-container">
                                <input type="email" id="email" name="email" required="required"/>
                                <label for="firstname">Email</label>
                                <div class="bar"></div>
                            </div>
                            <div class="input-container">
                                <input type="password" id="password" name="password" required="required"/>
                                <label for="password">Password</label>
                                <div class="bar"></div>
                            </div>
                            <div class="input-container">
                                <input type="password" id="password_conf" name="password_conf" required="required"/>
                                <label for="password_conf">Repeat Password</label>
                                <div class="bar"></div>
                            </div>
                            <div class="button-container">
                                <button onclick="submitregis()"><span>Next</span></button>
                            </div>
                        </form>-->
                    </div>
                </div>

            </section>
        </div>
        <!-- wrapper -->
    </div>
    <!-- /container -->
    <nav class="outer-nav right vertical">
        <a href="<?php echo base_url('home/index'); ?>" style="text-decoration: none;"><span
                class="icon-Web_Application_HOME"></span>Home</a>
        <?php if (isset($_SESSION['username']) && $_SESSION['loggedin'] === true) : ?>
            <a href="<?php echo base_url('shared/data'); ?>" style="text-decoration: none;"><span
                    class="icon-Web_Application_SHARE_ALT"></span>Shared Data</a>
        <?php endif; ?>
        <?php if (isset($_SESSION['username']) && $_SESSION['loggedin'] === true) : ?>
        <?php else : ?>
            <a href="<?php echo base_url('member/login_register'); ?>" style="text-decoration: none;"><span
                    class="icon-Web_Application_USERS"></span>Member</a>
        <?php endif; ?>
        <?php if (isset($_SESSION['username']) && $_SESSION['loggedin'] === true) : ?>
            <a href="<?= base_url('login/logout') ?>" style="text-decoration: none;"><span
                    class="icon-Web_Application_LOCK"></span>Logout</a>
        <?php endif; ?>
    </nav>
</div>
<!-- /perspective -->


<script src="/public/js/classie.js"></script>
<script src="/public/js/menu.js"></script>

<script src="/public/js/js/classie.js"></script>
<script src="/public/js/js/uiMorphingButton_fixed.js"></script>
<script>
    (function () {
        var docElem = window.document.documentElement, didScroll, scrollPosition;

        // trick to prevent scrolling when opening/closing button
        function noScrollFn() {
            window.scrollTo(scrollPosition ? scrollPosition.x : 0, scrollPosition ? scrollPosition.y : 0);
        }

        function noScroll() {
            window.removeEventListener('scroll', scrollHandler);
            window.addEventListener('scroll', noScrollFn);
        }

        function scrollFn() {
            window.addEventListener('scroll', scrollHandler);
        }

        function canScroll() {
            window.removeEventListener('scroll', noScrollFn);
            scrollFn();
        }

        function scrollHandler() {
            if (!didScroll) {
                didScroll = true;
                setTimeout(function () {
                    scrollPage();
                }, 60);
            }
        };

        function scrollPage() {
            scrollPosition = {x: window.pageXOffset || docElem.scrollLeft, y: window.pageYOffset || docElem.scrollTop};
            didScroll = false;
        };

        scrollFn();

        [].slice.call(document.querySelectorAll('.morph-button')).forEach(function (bttn) {
            new UIMorphingButton(bttn, {
                closeEl: '.icon-close',
                onBeforeOpen: function () {
                    // don't allow to scroll
                    noScroll();
                },
                onAfterOpen: function () {
                    // can scroll again
                    canScroll();
                },
                onBeforeClose: function () {
                    // don't allow to scroll
                    noScroll();
                },
                onAfterClose: function () {
                    // can scroll again
                    canScroll();
                }
            });
        });

        // for demo purposes only
        [].slice.call(document.querySelectorAll('form button')).forEach(function (bttn) {
            bttn.addEventListener('click', function (ev) {
                ev.preventDefault();
            });
        });
    })();
</script>
<script>
    function submitLogin() {
        document.getElementById("formlogin").submit();
    }
</script>
<script>
    function submitregis() {
        document.getElementById("formregis").submit();
    }
</script>


<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script>
    $('.toggle').on('click', function() {
        $('.content').stop().addClass('active');
    });

    $('.close').on('click', function() {
        $('.content').stop().removeClass('active');
    });
</script>
</body>
</html>