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
    <!-- <script src="js/modernizr.custom.js"></script> -->


    <!-- External CSS -->
    <!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->


    <!-- Internal CSS -->
    <link rel="stylesheet" href="/public/demo/css/demo.css">
    <!-- injector:css -->
    <link rel="stylesheet" href="/public/dist/custombox.min.css">
    <!-- endinjector -->

    <link rel="stylesheet" href="/public/css/jquery.lcnCircleRangeSelect.min.css">

    <link rel="shortcut icon" href="http://designshack.net/favicon.ico">
    <link rel="icon" href="http://designshack.net/favicon.ico">

    <!-- circular-progress bar -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="/public/css/circular/js/vision.js"></script>
    <script src="/public/css/circular/js/index.js"></script>
    <!-- circular-progress bar -->
    <script type="text/javascript" src="/public/js/scrollview.js"></script>
    <style>
        table, th, td {
            /*border: 1px solid black;*/
        }

        th, td {
            padding: 100px;
            border: solid 1px black;
            /*text-align: center;*/
        }
    </style>
    <link rel="stylesheet" type="text/css" href="/public/css/font.css"/>
    <!-- Radial -->
    <!--link the stylesheet-->
    <link rel="stylesheet" href="/public/css/radial-DelightMeterStyle.css"/>
    <!--include jquery and angularJS from CDN-->
    <!-- <script type="text/javascript" src="/public/js/radial-jquery-2.1.3.min.js"></script> -->
    <script src="/public/js/radial-angular.min.js"></script>
    <!--link the javascript file-->
    <script src="/public/js/radial-DelightMeter.js"></script>
    <link rel="stylesheet" href="/public/css/radial.common-material.min.css"/>
    <link rel="stylesheet" href="/public/css/radial.material.min.css"/>
    <!-- <script src="//kendo.cdn.telerik.com/2016.1.412/js/jquery.min.js"></script> -->
    <script src="/public/js/radial-guage.js"></script>
    <!--end Radial -->


    <!-- Load local jQuery -->
    <!-- <script src="/public/css/modal/jquery-loader.js"></script> -->

    <!-- Load local QUnit -->
    <link rel="stylesheet" href="/public/css/modal/qunit/qunit/qunit.css" media="screen">
    <script src="/public/css/modal/qunit/qunit/qunit.js"></script>

    <!-- Load local lib and tests -->
    <link rel="stylesheet" href="/public/css/modal/remodal.css">
    <link rel="stylesheet" href="/public/css/modal/remodal-default-theme.css">
    <script src="/public/css/modal/remodal.js"></script>
    <script src="/public/css/modal/remodal_test.js"></script>
    <!-- circular-progress bar -->
    <link rel="stylesheet" href="/public/css/circular/css/normalize.css">
    <link rel="stylesheet" href="/public/css/circular/css/style.css">
    <!-- circular-progress bar -->
    <!--table -->
    <style type="text/css">
        @media (min-width: 650px ) and (max-width: 1950px) {
            .remodal-bg a {
                margin-top: 0px;

                font-size: 30px;
            }

            #showMenu {
                font-size: 175%;
                padding: 0.2em 0.6em;
                margin: 10px;
            }

            .shared {
                font-size: 20px;
            }

            .cshared {
                font-size: 30px;
            }

            #circular-progress {
                display: none;
            }
        }

        @media (min-width: 490px ) and (max-width: 640px) {
            #form-guage {
                display: none;
            }
        }

        @media (max-width: 480px) {
            #showMenu {
                font-size: 100%;
                padding: 0.2em 0.6em;
                margin: 10px;
            }

            h1 {
                font-size: 28px;
            }

            .shared {
                font-size: 15px;
            }

            .cshared {
                font-size: 22.5px;
            }

            img {
                width: 100%;

                text-align: left;
            }

            .remodal-bg a {
                float: left;
                margin-top: -10px;
                font-size: 20px;
            }

            #form-guage {
                display: none;
            }

            #progressController, #progressControllervision {

                background: #E7E7E7;
                margin: auto;
                border-radius: 3px;
                padding: 30px 25px 30px 25px;
                text-align: center;
            }

        }

        .text {
            text-align: left;
        }

    </style>
</head>
<body onload="getLocation()">
<div id="perspective" class="perspective effect-rotateleft">
    <div class="container">
        <div class="wrapper"><!-- wrapper needed for scroll -->
            <!-- Top Navigation -->
            <div class="codrops-top clearfix">
                <!-- <a class="codrops-icon codrops-icon-prev" href="http://tympanus.net/Development/ProgressButtonStyles/"><span>Previous Demo</span></a>
                <span class="right"><a class="codrops-icon codrops-icon-drop" href="http://tympanus.net/codrops/?p=17915"><span>Back to the Codrops Article</span></a></span> -->
                <span class="left"><button class="left" id="showMenu" style="">Show Menu</button></span>
            </div>
            <header class="codrops-header">
                <!-- <h1>Perspective Page View Navigation <span>Transforms the page in 3D to reveal a menu</span></h1>	 -->
            </header>
            <div class="main clearfix">
                <!-- <div class="column">
                    <p><button id="showMenu">Show Menu</button></p>
                    <p>Click on this button to see the content being pushed away in 3D to reveal a navigation or other items.</p>
                </div> -->
                <h1>Shared Data Pollution</h1>

                <div class="container" style="margin-top:100px;">
                    <div class="remodal-bg" style="">
                        <div id="qunit"></div>
                        <a class="mol" href="#" data-remodal-target="modal">Vision คืออะไร ?</a>
                    </div>
                    <form id="circular-progress" method="post" action="<?= base_url('shared/sharedata') ?>">
                        <div id="page">
                            <div class="progress-bar">
                                <canvas id="inactiveProgress" class="progress-inactive" height="275px"
                                        width="275px"></canvas>
                                <canvas id="activeProgress" class="progress-active" height="275px"
                                        width="275px"></canvas>
                                <p>0%</p>
                            </div>
                            <div id="progressControllerContainer" style="margin-top: -70px;">
                                <input name="vision" type="range" id="progressController" min="0" max="100" value="0"
                                       style="margin-top: 60px;"/ >
                            </div>
                        </div>


                        <div id="pages" style="margin-top: -200px;">
                            <div class="progress-bar-vision">
                                <canvas id="inactiveProgress-vision" class="progress-inactive-vision" height="275px"
                                        width="275px"></canvas>
                                <canvas id="activeProgress-vision" class="progress-active-vision" height="275px"
                                        width="275px"></canvas>
                                <p>0%</p>
                            </div>
                            <div id="progressControllerContainer-vision" style="margin-top: 450px;">
                                <input name="smell" type="range" id="progressControllervision" min="1" max="3"
                                       value="0"/>
                            </div>
                        </div>
                        <p id="demo"></p>
                        <input type="submit" value="submit"
                               style="float:right;list-style-type:none;background: #ed8151;color:#fff;border: none;padding: 1.2em 2.2em;border-radius: 2px;margin-top: -100px;"
                               class="btn-success btn-lg">
                    </form>


                    <form id="form-guage" method="post" action="<?= base_url('shared/sharedata') ?>">

                        <div id="example" class="k-content">
                            <div id="gauge-container">
                                <div id="gauge"></div>
                                <input name="vision" id="gauge-value" value="0">
                                <br>

                                <h1 style="margin-top: -5px;margin-left: 140px;">Vision</h1>
                            </div>

                        </div>

                        <div ng-app="delightMeterAppvision">
                            <div id="DelightMeterContainer" ng-controller="vision">

                                <!--custom tag to invoke the delight meter-->
                                <delight-meter ng-model="meterdelightvision"></delight-meter>

                                <!--input to change the delight score value for testing-->
                                <div id="scoreReadervision">
                                    <input name="smell" id="txtScoresvision" type="range" min="1" max="3"
                                           ng-model="meterdelightvision" placeholder="enter the delight score"/>

                                    <h1 style="margin-top: -5px;margin-left: 40px;">Smell</h1>
                                </div>
                            </div>
                        </div>

                        <p id="demo2"></p>
                        <input type="submit" value="submit"
                               style="float:right;list-style-type:none;background: #ed8151;color:#fff;border: none;padding: 1.2em 2.2em;border-radius: 2px;"
                               class="btn-success btn-lg">
                    </form>
                </div>


                <div class="remodal" data-remodal-id="modal">
                    <div class="text">
                        <div id="w">
                            <div id="content">
                                <section class="clearfix">
                                    <div id="devices" data-position="left" class="notViewed animBlock floatl">

                                        <!-- http://pixelsdaily.com/resources/photoshop/psds/mac-product-graphics/ -->
                                    </div>

                                    <div id="devicesTxt" data-position="right" class="notViewed animBlock floatr">
                                        <h3>วิธีการกะระยะ (1 – 100+ เมตร) </h3>

                                        <p>
                                            วิธีการกะระยะ (1 – 100+ เมตร) เป็นการประมาณค่าระยะทางที่ใกล้เคียง
                                            โดยจะมีค่าผิดพลาดเกิดขึ้นไม่เกินร้อยละ 10 โดยอาจคิดเป็นจำนวนก้าวได้</p>
                                    </div>
                                </section>

                                <hr>

                                <h2>ระยะ 100+ เมตร</h2>


                                <p>-เราจะระบุระยะทาง 100 เมตร เมื่อเราสามารถมองเห็นได้ปกติ
                                    ไม่มีหมอกควันมาบดบังทัศนวิศัยในการมองเห็น
                                    หรือสามารถมองเห็นนัยน์ตาของบุคคลที่ยืนอยู่ในระยะ 100
                                    เมตรมีลักษณะเป็นจุดได้ชัดเจน</p>

                                <section>
                                    <div id="iphonePerspective" data-position="right" data-offset="250"
                                         class="notViewed animBlock">
                                        <img src="/public/images/info100m.png" alt="apple devices">
                                        <img src="/public/images/info100mT2.png" alt="apple devices">
                                        <!-- http://www.pixeden.com/psd-mock-up-templates/iphone-5-psd-flat-design-mockup -->
                                    </div>
                                </section>

                                <br>
                                <hr>
                                <br>

                                <section class="clearfix">
                                    <div id="appIcon" data-position="left" data-offset="60"
                                         class="notViewed animBlock floatl">

                                        <!-- http://dribbble.com/shots/895640-App-Store-iOS-Icon-PSD -->
                                    </div>

                                    <div id="downloadTxt" data-position="right" data-offset="60"
                                         class="notViewed animBlock floatr">
                                        <h3>ระยะ 50 เมตร</h3>

                                        <p>-เราจะระบุระยะทางเป็น 50 เมตร
                                            เมื่อเราสามารถมองเห็นปากและตาของบุคคลที่ยืนอยู่ในระยะ 50 เมตรได้ชัดเจน</p>

                                        <p>-การมองเห็นในระยะ 50 เมตร ไม่เป็นอันตรายต่อการสัญจรด้วยยานพาหนะชนิดต่างๆ</p>
                                    </div>
                                    <img src="/public/images/info50m.png" alt="blue generic ios app icon">
                                    <img src="/public/images/info50mT2.png" alt="blue generic ios app icon">
                                </section>

                                <br>
                                <hr>
                                <br>

                                <section class="clearfix">
                                    <div id="downloadTxt" data-position="right" data-offset="60"
                                         class="notViewed animBlock floatr">
                                        <h3>ระยะ 11 – 40 เมตร</h3>

                                        <p>- เราจะระบุระยะทางเป็น 11 - 40 เมตร เมื่อเรากะระยะก้าวได้ 22
                                            ก้าวหรือมากกว่า</p>

                                        <p>- การมองเห็นในระยะทาง 11 – 40 เมตร
                                            ค่อนข้างอันตรายและต้องใช้ความระมัดระวังในการสัญจรด้วยยานพาหนะชนิดต่างๆ</p>
                                    </div>


                                    <div id="appIcon" data-position="left" data-offset="60"
                                         class="notViewed animBlock floatl">
                                        <img src="/public/images/info40m.png" alt="blue generic ios app icon">
                                        <!-- http://dribbble.com/shots/895640-App-Store-iOS-Icon-PSD -->
                                    </div>
                                </section>

                                <br>
                                <hr>
                                <br>

                                <section class="clearfix">
                                    <div id="appIcon" data-position="left" data-offset="60"
                                         class="notViewed animBlock floatl">

                                        <!-- http://dribbble.com/shots/895640-App-Store-iOS-Icon-PSD -->
                                    </div>

                                    <div id="downloadTxt" data-position="right" data-offset="60"
                                         class="notViewed animBlock floatr">
                                        <h3>ระยะ 1 – 10 เมตร</h3>

                                        <p>- เราจะระบุระยะทางเป็น 1 – 10 เมตร เราควรกะระยะด้วยการก้าวเท้า
                                            แล้วนับก้าวที่เกิดขึ้น 2 ก้าวเท่ากับ 1 เมตร</p>

                                        <p>- การมองเห็นในระยะทาง 1 – 10 เมตร
                                            อยู่ในระดับที่อันตรายต่อการใช้ชีวิตและต้องใช้ความระมัดระวังเป็นอย่างมากในการสัญจรด้วยยานพาหนะชนิดต่างๆ
                                            หรือการเดินทางในที่ลาดชันหรือบนภูเขาที่มีความสูง </p>
                                    </div>
                                    <img src="/public/images/info10m.png" alt="blue generic ios app icon">
                                </section>

                                <br>
                                <hr>
                                <br>
                            </div>
                            <!-- @end #content -->
                        </div>
                        <!-- @end #w -->
                    </div>
                    <a data-remodal-action="close" class="remodal-close"></a>


                </div>


                <div data-remodal-id="modal3">
                    <a data-remodal-action="close" class="remodal-close"></a>
                </div>

                <div class="remodal" data-remodal-id="!modal4/test">
                    <a data-remodal-action="close" class="remodal-close"></a>
                </div>


                <div class="related">

                </div>
            </div>
            <!-- /main -->
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
        <!-- <a href="#" class="icon-image">Images</a>
        <a href="#" class="icon-upload">Uploads</a>
        <a href="#" class="icon-star">Favorites</a>
        <a href="#" class="icon-mail">Messages</a>
        <a href="#" class="icon-lock">Security</a> -->
    </nav>
</div>
<!-- /perspective -->
<script>
    var x = document.getElementById("demo");
    var y = document.getElementById("demo2");
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        x.innerHTML = '<input type="hidden" name="lat" value="' + position.coords.latitude + '"><input type="hidden" name="lng" value="' + position.coords.longitude + '"> ';
        y.innerHTML = '<input type="hidden" name="lat" value="' + position.coords.latitude + '"><input type="hidden" name="lng" value="' + position.coords.longitude + '"> ';

    }
</script>

<script>
    function createGauge() {
        $("#gauge").kendoRadialGauge({

            pointer: {
                value: $("#gauge-value").val()
            },

            scale: {
                minorUnit: 5,
                startAngle: -30,
                endAngle: 210,
                max: 100
            }
        });
    }

    $(document).ready(function () {
        createGauge();

        function updateValue() {
            $("#gauge").data("kendoRadialGauge").value($("#gauge-value").val());
        }

        if (kendo.ui.Slider) {
            $("#gauge-value").kendoSlider({
                min: 0,
                max: 100,
                showButtons: false,
                change: updateValue
            });
        } else {
            $("#gauge-value").change(updateValue);
        }


        $(document).bind("kendo:skinChange", function (e) {
            createGauge();
        });
    });
</script>

<style>
    #gauge-container {
        background: transparent url("/public/images/gauge-container-partial.png") no-repeat 50% 50%;
        width: 386px;
        height: 386px;
        text-align: center;
        margin: 0 auto 30px auto;
    }

    #gauge {
        width: 350px;
        height: 300px;
        margin: 0 auto;
    }

    #gauge-container .k-slider {
        margin-top: -11px;
        width: 140px;
    }

</style>
<script src="/public/js/classie.js"></script>
<script src="/public/js/menu.js"></script>


<!-- External JavaScript -->
<!-- <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="//google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script> -->

<!-- Internal JavaScript -->
<!-- injector:js -->
<script src="/public/dist/custombox.min.js"></script>
<script src="/public/dist/legacy.min.js"></script>
<!-- endinjector -->
<script src="/public/demo/js/demo.js"></script>

<script src="/public/js/jquery.lcnCircleRangeSelect.min.js"></script>


</body>
</html>