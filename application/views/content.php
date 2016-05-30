<div id="perspective" class="perspective effect-rotateleft">
    <div class="container">
        <div class="wrapper"><!-- wrapper needed for scroll -->
            <!-- Top Navigation -->

            <!-- <a class="codrops-icon codrops-icon-prev" href="http://tympanus.net/Development/ProgressButtonStyles/"><span>Previous Demo</span></a> -->
            <!-- <span class="right"><a class="codrops-icon codrops-icon-drop" href="http://tympanus.net/codrops/?p=17915"><span>Back to the Codrops Article</span></a></span> -->

            <span class="left"><button class="left" id="showMenu" style=" font-size: 125%;margin:10px;">Show Menu</button></span>



            <header class="codrops-header">

            </header>
            <section>
                <div class="tabs tabs-style-linebox">
                    <nav>
                        <ul>
                            <li><a href="#section-linebox-5"><span>Air map</span></a></li>
                            <li><a href="#section-linebox-4"><span>AQI</span></a></li>
                            <!-- <li><a href="#section-linebox-2"><span>Deals</span></a></li>
                            <li><a href="#section-linebox-3"><span>Drinks</span></a></li>
                            <li><a href="#section-linebox-5"><span>Settings</span></a></li> -->
                        </ul>
                    </nav>
                    <div class="content-wrap">
                        <section id="section-linebox-1">
                            <p>
                            <div id="map-canvas"></div>
                            <?php
                            $a= array();
                            $i=0;


                            foreach($data->result() as $row)
                            {
                                $b=array();
                                $b[]=$row->id;
                                $b[]=$row->lat;
                                $b[]=$row->lng;
                                $b[]=$row->vision;
                                $b[]=$row->smell;
                                if($b[3] == 100)
                                {
                                    $b[] = 'ระยะการมองเห็นปกติ ไม่เป็นอันตรายต่อการสัญจรด้วยยานพาหนะชนิดต่างๆ';
                                }
                                else if($b[3]>= 50 && $b[3]<100)
                                {
                                    $b[] = 'ไม่เป็นอันตรายต่อการสัญจรด้วยยานพาหนะชนิดต่างๆ';
                                }
                                else if($b[3]>=11 && $b[3] <50)
                                {
                                    $b[] = 'ค่อนข้างอันตรายและต้องใช้ความระมัดระวังในการสัญจรด้วยยานพาหนะชนิดต่างๆ';
                                }
                                else
                                {
                                    $b[] = 'อันตรายต่อการใช้ชีวิตและต้องใช้ความระมัดระวังเป็นอย่างมากในการสัญจร';
                                }


                                if($b[4] == 1)
                                {
                                    $b[] = 'ไม่มีกลิ่นที่เป็นมลพิษหรืออากาศเป็นปกติ สามารถอาศัยอยู่บริเวณนั้นได้';
                                }
                                else if($b[4] == 2)
                                {
                                    $b[] = 'มีกลิ่นที่เป็นมลพิษ แต่ยังสามารถอาศัยอยู่บริเวณนั้นได้ ควรเตรียมความพร้อมสำหรับการอพยพออกจากพื้นที่ และควรสวมอุปกรณ์ป้องกันฝุ่นควัน';
                                }
                                else
                                {
                                    $b[] = 'มีกลิ่นที่เป็นมลพิษและไม่สามารถอาศัยอยู่บริเวณนั้นได้ ควรออกจากพื้นที่ทันที อาจเกิดอันตรายต่อร่างกายได้ และควรสวมอุปกรณ์ป้องกันฝุ่นควัน';
                                }
                                $a[$i]=$b;
                                $i++;
                            }
                            ?>

                            <?php
                            $pos= array();
                            $j=0;


                            foreach($position->result() as $rows)
                            {
                                $po=array();
                                $po[]=$rows->id;
                                $po[]=$rows->LATITUDE;
                                $po[]=$rows->LONGTITUDE;
                                $po[]=$rows->CO;
                                $po[]=$rows->NO2;
                                $po[]=$rows->O3;
                                $po[]=$rows->SO2;
                                $po[]=$rows->PM10;
                                $po[]=$rows->station;
                                $pos[$j]=$po;
                                $j++;
                            }
                            ?>
                            <script>

                                // map center
                                /*var center = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);*/
                                var center = new google.maps.LatLng(14.092412777939833, 100.60817405552736);

                                // marker position
                                /* var factory = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);*/
                                var factory = new google.maps.LatLng(14.092412777939833, 100.60817405552736);

                                function initialize() {
                                    var mapOptions = {
                                        center: center,
                                        zoom: 6,
                                        mapTypeId: google.maps.MapTypeId.ROADMAP
                                    };

                                    var map = new google.maps.Map(document.getElementById("map-canvas"),mapOptions);

                                    // InfoWindow content
                                    var content = '<div id="iw-container">' +
                                        '<div class="iw-title">Porcelain Factory of Vista Alegre</div>' +
                                        '<div class="iw-content">' +
                                        '<div class="iw-subTitle">History</div>' +
                                        '<img src="/public/images/vistalegre.jpg" alt="Porcelain Factory of Vista Alegre" height="115" width="83">' +
                                        '<p>Founded in 1824, the Porcelain Factory of Vista Alegre was the first industrial unit dedicated to porcelain production in Portugal. For the foundation and success of this risky industrial development was crucial the spirit of persistence of its founder, José Ferreira Pinto Basto. Leading figure in Portuguese society of the nineteenth century farm owner, daring dealer, wisely incorporated the liberal ideas of the century, having become "the first example of free enterprise" in Portugal.</p>' +
                                        '<div class="iw-subTitle">Contacts</div>' +
                                        '<p>VISTA ALEGRE ATLANTIS, SA<br>3830-292 Ílhavo - Portugal<br>'+
                                        '<br>Phone. +351 234 320 600<br>e-mail: geral@vaa.pt<br>www: www.myvistaalegre.com</p>'+
                                        '</div>' +
                                        '<div class="iw-bottom-gradient"></div>' +
                                        '</div>';
                                    if ($(window).width() <= 380 )  //&& $(window).height <= 640
                                    {
                                        var mWidth = 150;
                                    }
                                    else
                                    {
                                        var mWidth = 400;
                                    }
                                    // A new Info Window is created and set content
                                    var infowindow = new google.maps.InfoWindow({
                                        content: content,

                                        // Assign a maximum value for the width of the infowindow allows
                                        // greater control over the various content elements
                                        maxWidth: mWidth
                                    });

                                    var rectangle = new google.maps.Rectangle({
                                        strokeColor: '#FF0000',
                                        strokeOpacity: 0.8,
                                        strokeWeight: 2,
                                        fillColor: '#FF0000',
                                        fillOpacity: 0.35,
                                        map: map,
                                        bounds: {
                                            north: 14.073770262389207,
                                            south: 14.064270262389207,
                                            east: 100.61089942939613,
                                            west: 100.60139942939613
                                        }
                                    });

                                    // marker options
                                    // var marker = new google.maps.Marker({
                                    //   position: factory,
                                    //   map: map,
                                    //   title:"Fábrica de Porcelana da Vista Alegre"
                                    // });
                                    var locations = <?php echo json_encode($a);?>;
                                    var positions = <?php echo json_encode($pos);?>;
                                    /*var locations = [
                                     ['Prathum', position.coords.latitude, position.coords.longitude, 6],
                                     ['Bondi Beach', -33.890542, 151.274856, 4],
                                     ['Coogee Beach', -33.923036, 151.259052, 5],
                                     ['Cronulla Beach', -34.028249, 151.157507, 3],
                                     ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
                                     ['Maroubra Beach', -33.950198, 151.259302, 1]
                                     ];*/

                                    var marker, i;
                                    for (i = 0; i < locations.length; i++) {
                                        if (i%4 == 0 ) {
                                            var image = '/public/images/map-marker-2-64 (1).ico';
                                        }
                                        else if(i%4 == 1){
                                            var image = '/public/images/map-marker-2-64 (1).ico';
                                        }else if(i%4 == 2){
                                            var image = '/public/images/map-marker-2-64 (1).ico';
                                        }else{
                                            var image = '/public/images/map-marker-2-64 (1).ico';
                                        }
                                        marker = new google.maps.Marker({
                                            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                            map: map,
                                            icon:image
                                        });

                                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                            return function() {
                                                var content2='<div id="iw-container">' +
                                                    '<div class="iw-title">'+'Shared Data pollution Vision and Smell By User ID : '+locations[i][0]+

                                                    '</div>' +
                                                    '<div class="iw-content">' +
                                                    '<div class="iw-subTitle"></div>' +
                                                    '<a href="<?php echo base_url('map/usgraph').'/'; ?>'+locations[i][0]+'" target="blank"><img src="/public/images/business.png" height="115" width="83"><span id="moreinformationvision" class="icon-Web_Application_LINE_CHART">ดูข้อมูลเพิ่มเติม</span></a>' +
                                                    '<div id="content">' +
                                                    '<div id="containers">'+
                                                    '<div class="pricetab">'+
                                                    '<h1>'+"Vision"+'</h1>'+
                                                    '<div class="price">'+
                                                    '<h2>'+locations[i][3]+'</h2>'+
                                                    '</div>'+
                                                    '<div class="infos">'+
                                                    '<h3>'+locations[i][5]+'</h3>'+
                                                    '</div>'+
                                                    '</div>'+

                                                    '<div class="pricetabmid">'+
                                                    '<h1>'+"Smell"+'</h1>'+
                                                    ' <div class="pricemid"> '+
                                                    '<h2>'+locations[i][4]+'</h2>'+
                                                    '</div>'+
                                                    '<div class="infos">'+
                                                    '<h3>'+locations[i][6]+'</h3>'+
                                                    '</div>'+
                                                    '</div>'+
                                                    '</div>'+


                                                    ' </div>'+


                                                    '</div>' +
                                                    '<div class="iw-bottom-gradient"></div>' +
                                                    '</div><br>';
                                                infowindow.setContent(content2);
                                                infowindow.open(map, marker);
                                            }
                                        })(marker, i));
                                    }


                                    // test map
                                    for (i = 0; i < positions.length; i++) {
                                        //CO-AQI
                                        var co = positions[i][3];
                                        var coilo,coihi,cobplo,cobphi,coaqi;

                                        if(co>=0.0&&co<=4.4)
                                        {
                                            coilo = 0;
                                            coihi = 50;
                                            cobplo = 0.0;
                                            cobphi = 4.4;

                                            coaqi = ((coihi-coilo)*(co-cobplo))/(cobphi-cobplo)+coilo;
                                        }
                                        else if(co>=4.5&&co<=9.4)
                                        {
                                            coilo = 51;
                                            coihi = 100;
                                            cobplo = 4.5;
                                            cobphi = 9.4;

                                            coaqi = ((coihi-coilo)*(co-cobplo))/(cobphi-cobplo)+coilo;
                                        }
                                        else if(co>=9.5&&co<=12.4)
                                        {
                                            coilo = 101;
                                            coihi = 150;
                                            cobplo = 9.5;
                                            cobphi = 12.4;

                                            coaqi = ((coihi-coilo)*(co-cobplo))/(cobphi-cobplo)+coilo;
                                        }
                                        else if(co>=12.5&&co<=15.4)
                                        {
                                            coilo = 151;
                                            coihi = 200;
                                            cobplo = 12.5;
                                            cobphi = 15.4;

                                            coaqi = ((coihi-coilo)*(co-cobplo))/(cobphi-cobplo)+coilo;
                                        }
                                        else if(co>=15.5&&co<=30.4)
                                        {
                                            coilo = 201;
                                            coihi = 300;
                                            cobplo = 15.5;
                                            cobphi = 30.4;

                                            coaqi = ((coihi-coilo)*(co-cobplo))/(cobphi-cobplo)+coilo;
                                        }
                                        else if(co>=30.5&&co<=40.4)
                                        {
                                            coilo = 301;
                                            coihi = 400;
                                            cobplo = 30.5;
                                            cobphi = 40.4;

                                            coaqi = ((coihi-coilo)*(co-cobplo))/(cobphi-cobplo)+coilo;
                                        }
                                        else if(co>=40.5&&co<=50.4)
                                        {
                                            coilo = 401;
                                            coihi = 500;
                                            cobplo = 40.5;
                                            cobphi = 50.4;

                                            coaqi = ((coihi-coilo)*(co-cobplo))/(cobphi-cobplo)+coilo;
                                        }


                                        //NO2-AQI
                                        var no2 = (positions[i][4])/1000;
                                        var no2ilo,no2ihi,no2bplo,no2bphi,no2aqi;

                                        if(no2>=0.65&&no2<=1.24)
                                        {
                                            no2ilo = 201;
                                            no2ihi = 300;
                                            no2bplo = 0.65;
                                            no2bphi = 1.24;

                                            no2aqi = ((no2ihi-no2ilo)*(no2-no2bplo))/(no2bphi-no2bplo)+no2ilo;
                                        }
                                        else if(no2>=1.25&&no2<=1.64)
                                        {
                                            no2ilo = 301;
                                            no2ihi = 400;
                                            no2bplo = 1.25;
                                            no2bphi = 1.64;

                                            no2aqi = ((no2ihi-no2ilo)*(no2-no2bplo))/(no2bphi-no2bplo)+no2ilo;
                                        }
                                        else if(no2>=1.65&&no2<=2.04)
                                        {
                                            no2ilo = 401;
                                            no2ihi = 500;
                                            no2bplo = 1.65;
                                            no2bphi = 2.04;

                                            no2aqi = ((no2ihi-no2ilo)*(no2-no2bplo))/(no2bphi-no2bplo)+no2ilo;
                                        }


                                        //O3-AQI
                                        var o3 = (positions[i][5])/1000;
                                        var o3ilo,o3ihi,o3bplo,o3bphi,o3aqi;

                                        if(o3>=0.125&&o3<=0.164)
                                        {
                                            o3ilo = 101;
                                            o3ihi = 150;
                                            o3bplo = 0.125;
                                            o3bphi = 0.164;

                                            o3aqi = ((o3ihi-o3ilo)*(o3-o3bplo))/(o3bphi-o3bplo)+o3ilo;
                                        }
                                        else if(o3>=0.165&&o3<=0.204)
                                        {
                                            o3ilo = 151;
                                            o3ihi = 200;
                                            o3bplo = 0.165;
                                            o3bphi = 0.204;

                                            o3aqi = ((o3ihi-o3ilo)*(o3-o3bplo))/(o3bphi-o3bplo)+o3ilo;
                                        }
                                        else if(o3>=0.205&&o3<=0.404)
                                        {
                                            o3ilo = 201;
                                            o3ihi = 300;
                                            o3bplo = 0.205;
                                            o3bphi = 0.404;

                                            o3aqi = ((o3ihi-o3ilo)*(o3-o3bplo))/(o3bphi-o3bplo)+o3ilo;
                                        }
                                        else if(o3>=0.405&&o3<=0.504)
                                        {
                                            o3ilo = 301;
                                            o3ihi = 400;
                                            o3bplo = 0.405;
                                            o3bphi = 0.504;

                                            o3aqi = ((o3ihi-o3ilo)*(o3-o3bplo))/(o3bphi-o3bplo)+o3ilo;
                                        }
                                        else if(o3>=0.505&&o3<=0.604)
                                        {
                                            o3ilo = 401;
                                            o3ihi = 500;
                                            o3bplo = 0.505;
                                            o3bphi = 0.604;

                                            o3aqi = ((o3ihi-o3ilo)*(o3-o3bplo))/(o3bphi-o3bplo)+o3ilo;
                                        }



                                        //SO2-AQI
                                        var so2 = (positions[i][6])/1000;
                                        var so2ilo,so2ihi,so2bplo,so2bphi,so2aqi;

                                        if(so2>=0.000&&so2<=0.034)
                                        {
                                            so2ilo = 0;
                                            so2ihi = 50;
                                            so2bplo = 0.000;
                                            so2bphi = 0.034;

                                            so2aqi = ((so2ihi-so2ilo)*(so2-so2bplo))/(so2bphi-so2bplo)+so2ilo;
                                        }
                                        else if(so2>=0.035&&so2<=0.144)
                                        {
                                            so2ilo = 51;
                                            so2ihi = 100;
                                            so2bplo = 0.035;
                                            so2bphi = 0.144;

                                            so2aqi = ((so2ihi-so2ilo)*(so2-so2bplo))/(so2bphi-so2bplo)+so2ilo;
                                        }
                                        else if(so2>=0.145&&so2<=0.224)
                                        {
                                            so2ilo = 101;
                                            so2ihi = 150;
                                            so2bplo = 0.145;
                                            so2bphi = 0.224;

                                            so2aqi = ((so2ihi-so2ilo)*(so2-so2bplo))/(so2bphi-so2bplo)+so2ilo;
                                        }
                                        else if(so2>=0.225&&so2<=0.304)
                                        {
                                            so2ilo = 151;
                                            so2ihi = 200;
                                            so2bplo = 0.225;
                                            so2bphi = 0.304;

                                            so2aqi = ((so2ihi-so2ilo)*(so2-so2bplo))/(so2bphi-so2bplo)+so2ilo;
                                        }
                                        else if(so2>=0.305&&so2<=0.604)
                                        {
                                            so2ilo = 201;
                                            so2ihi = 300;
                                            so2bplo = 0.305;
                                            so2bphi = 0.604;

                                            so2aqi = ((so2ihi-so2ilo)*(so2-so2bplo))/(so2bphi-so2bplo)+so2ilo;
                                        }
                                        else if(so2>=0.605&&so2<=0.804)
                                        {
                                            so2ilo = 301;
                                            so2ihi = 400;
                                            so2bplo = 0.605;
                                            so2bphi = 0.804;

                                            so2aqi = ((so2ihi-so2ilo)*(so2-so2bplo))/(so2bphi-so2bplo)+so2ilo;
                                        }
                                        else if(so2>=0.805&&so2<=1.004)
                                        {
                                            so2ilo = 401;
                                            so2ihi = 500;
                                            so2bplo = 0.805;
                                            so2bphi = 1.004;

                                            so2aqi = ((so2ihi-so2ilo)*(so2-so2bplo))/(so2bphi-so2bplo)+so2ilo;
                                        }


                                        //PM10-AQI
                                        var pm10 = positions[i][7];
                                        var pm10ilo,pm10ihi,pm10bplo,pm10bphi,pm10aqi;

                                        if(pm10>=0&&pm10<=54)
                                        {
                                            pm10ilo = 0;
                                            pm10ihi = 50;
                                            pm10bplo = 0;
                                            pm10bphi = 54;

                                            pm10aqi = ((pm10ihi-pm10ilo)*(pm10-pm10bplo))/(pm10bphi-pm10bplo)+pm10ilo;
                                        }
                                        else if(pm10>=55&&pm10<=154)
                                        {
                                            pm10ilo = 51;
                                            pm10ihi = 100;
                                            pm10bplo = 55;
                                            pm10bphi = 154;

                                            pm10aqi = ((pm10ihi-pm10ilo)*(pm10-pm10bplo))/(pm10bphi-pm10bplo)+pm10ilo;
                                        }
                                        else if(pm10>=155&&pm10<=254)
                                        {
                                            pm10ilo = 101;
                                            pm10ihi = 150;
                                            pm10bplo = 155;
                                            pm10bphi = 254;

                                            pm10aqi = ((pm10ihi-pm10ilo)*(pm10-pm10bplo))/(pm10bphi-pm10bplo)+pm10ilo;
                                        }
                                        else if(pm10>=255&&pm10<=354)
                                        {
                                            pm10ilo = 151;
                                            pm10ihi = 200;
                                            pm10bplo = 255;
                                            pm10bphi = 354;

                                            pm10aqi = ((pm10ihi-pm10ilo)*(pm10-pm10bplo))/(pm10bphi-pm10bplo)+pm10ilo;
                                        }
                                        else if(pm10>=355&&pm10<=424)
                                        {
                                            pm10ilo = 201;
                                            pm10ihi = 300;
                                            pm10bplo = 355;
                                            pm10bphi = 424;

                                            pm10aqi = ((pm10ihi-pm10ilo)*(pm10-pm10bplo))/(pm10bphi-pm10bplo)+pm10ilo;
                                        }
                                        else if(pm10>=425&&pm10<=504)
                                        {
                                            pm10ilo = 301;
                                            pm10ihi = 400;
                                            pm10bplo = 425;
                                            pm10bphi = 524;

                                            pm10aqi = ((pm10ihi-pm10ilo)*(pm10-pm10bplo))/(pm10bphi-pm10bplo)+pm10ilo;
                                        }
                                        else if(pm10>=505&&pm10<=604)
                                        {
                                            pm10ilo = 401;
                                            pm10ihi = 500;
                                            pm10bplo = 505;
                                            pm10bphi = 604;

                                            pm10aqi = ((pm10ihi-pm10ilo)*(pm10-pm10bplo))/(pm10bphi-pm10bplo)+pm10ilo;
                                        }


                                        var max = coaqi;
                                        if(no2aqi>max)
                                        {max = no2aqi;}
                                        else if(o3aqi>max)
                                        {max=o3aqi;}
                                        else if(so2aqi>max)
                                        {max=so2aqi;}
                                        else if(pm10aqi>max)
                                        {max=pm10aqi;}

                                        positions[i][9]=max;

                                        if (positions[i][9]>=0&&positions[i][9]<=50 ) {
                                            var image = '/public/images/_blue.png';
                                        }
                                        else if(positions[i][9]>=51&&positions[i][9]<=100){
                                            var image = '/public/images/_green.png';
                                        }else if(positions[i][9]>=101&&positions[i][9]<=200){
                                            var image = '/public/images/_yellow.png';
                                        }else if(positions[i][9]>=201&&positions[i][9]<=300){
                                            var image = '/public/images/_orange.png';
                                        }else{
                                            var image = '/public/images/_red.png';}
                                        marker = new google.maps.Marker({
                                            position: new google.maps.LatLng(positions[i][1], positions[i][2]),
                                            map: map,
                                            icon:image
                                        });

                                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                            return function() {
                                                var content1='<div id="iw-container">' +
                                                    '<div class="iw-title">'+'Station : '+positions[i][8]+
                                                    'AQI : '+positions[i][9]+
                                                    '</div>' +
                                                    '<div class="iw-content">' +
                                                    '<div class="iw-subTitle"></div>' +
                                                    '<a href="<?php echo base_url('map/stgraph').'/'; ?>'+positions[i][0]+'" target="blank"><img src="/public/images/business.png" height="115" width="83"><span id="moreinformationsmell" class="icon-Web_Application_LINE_CHART">ดูข้อมูลเพิ่มเติม</span></a>' +

                                                    '<div id="content">' +
                                                    ' <table class="table1">'+
                                                    '<thead>'+
                                                    '<tr>'+
                                                    ' <th></th>'+
                                                    '<th scope="col" abbr="Starter">รายละเอียด</th>'+
                                                    '</tr>'+
                                                    '</thead>'+
                                                    '<tbody>'+
                                                    '<tr>'+
                                                    '<th scope="row">CO(ppm)</th>'+
                                                    '<td>'+positions[i][3]+'</td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                    '<th scope="row">NO2(ppb)</th>'+
                                                    '<td>'+positions[i][4]+'</td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                    '<th scope="row">O3(ppb)</th>'+
                                                    '<td>'+positions[i][5]+'</td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                    '<th scope="row">SO2(ppb)</th>'+
                                                    '<td>'+positions[i][6]+'</td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                    '<th scope="row">PM10</th>'+
                                                    '<td>'+positions[i][7]+'</td>'+
                                                    '</tr>'+
                                                    '</tbody>'+
                                                    '</table>'+
                                                    ' </div>'+


                                                    '</div>' +
                                                    '<div class="iw-bottom-gradient"></div>' +
                                                    '</div><br>';
                                                infowindow.setContent(content1);
                                                infowindow.open(map, marker);
                                            }
                                        })(marker, i));
                                    }

                                    // This event expects a click on a marker
                                    // When this event is fired the Info Window is opened.
                                    google.maps.event.addListener(marker, 'click', function() {
                                        infowindow.open(map,marker);
                                    });

                                    // Event that closes the Info Window with a click on the map
                                    google.maps.event.addListener(map, 'click', function() {
                                        infowindow.close();
                                    });

                                    // *
                                    // START INFOWINDOW CUSTOMIZE.
                                    // The google.maps.event.addListener() event expects
                                    // the creation of the infowindow HTML structure 'domready'
                                    // and before the opening of the infowindow, defined styles are applied.
                                    // *
                                    google.maps.event.addListener(infowindow, 'domready', function() {

                                        // Reference to the DIV that wraps the bottom of infowindow
                                        var iwOuter = $('.gm-style-iw');

                                        /* Since this div is in a position prior to .gm-div style-iw.
                                         * We use jQuery and create a iwBackground variable,
                                         * and took advantage of the existing reference .gm-style-iw for the previous div with .prev().
                                         */
                                        var iwBackground = iwOuter.prev();

                                        // Removes background shadow DIV
                                        iwBackground.children(':nth-child(2)').css({'display' : 'none'});

                                        // Removes white background DIV
                                        iwBackground.children(':nth-child(4)').css({'display' : 'none'});

                                        // Moves the infowindow 115px to the right.
                                        iwOuter.parent().parent().css({left: '115px'});

                                        // Moves the shadow of the arrow 76px to the left margin.
                                        iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 76px !important;'});

                                        // Moves the arrow 76px to the left margin.
                                        iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 76px !important;'});

                                        // Changes the desired tail shadow color.
                                        iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

                                        // Reference to the div that groups the close button elements.
                                        var iwCloseBtn = iwOuter.next();

                                        // Apply the desired effect to the close button
                                        //iwCloseBtn.css({opacity: '1', right: '38px', top: '3px', border: '7px solid #48b5e9', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
                                        iwCloseBtn.css({opacity: '1', right: '38px', top: '3px', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});

                                        // If the content of infowindow not exceed the set maximum height, then the gradient is removed.
                                        if($('.iw-content').height() < 140){
                                            $('.iw-bottom-gradient').css({display: 'none'});
                                        }

                                        // The API automatically applies 0.7 opacity to the button after the mouseout event. This function reverses this event to the desired value.
                                        iwCloseBtn.mouseout(function(){
                                            $(this).css({opacity: '1'});
                                        });
                                    });
                                }
                                google.maps.event.addDomListener(window, 'load', initialize);

                            </script>
                            <div style="margin-top: 20px;">
                                <table width = "" border="0" class="info" align="center">
                                    <tr>
                                        <td width="150"></td>
                                        <td width="100" align="center">
                                            <font style="font-family: Kunlasatri;" color="#1f8ed2" size="3">
                                                0 - 50    </font>
                                        </td>
                                        <td width="100" align="center">
                                            <font style="font-family: Kunlasatri;" color="#00b03c" size="3">
                                                51 - 100    </font>
                                        </td>
                                        <td width="100" align="center">
                                            <font style="font-family: Kunlasatri;" color="#e9d252" size="3">
                                                101 - 200   </font>
                                        </td>
                                        <td width="100" align="center">
                                            <font style="font-family: Kunlasatri;" color="#ff7e4b" size="3">
                                                201 - 300   </font>
                                        </td>
                                        <td width="100" align="center">
                                            <font style="font-family: Kunlasatri;" color="#ff0031" size="3">
                                                > 300   </font>
                                        </td>
                                        <td width="30" align="right" valign="middle" rowspan="2"></td>
                                        <td width="20" rowspan="2"></td>
                                    </tr>
                                    <tr height="50">
                                        <td width="200" align="center" valign="middle">
                                            <font style="font-family: Kunlasatri;" color="gray" size="5">
                                                ความหมายของสี   </font>
                                        </td>
                                        <td width="100" align="center" valign="middle" bgcolor="#1f8ed2">
                                            <font style="font-family: Kunlasatri;" color="#ffffff" size="3">
                                                ดี    </font>
                                        </td>
                                        <td width="100" align="center" valign="middle" bgcolor="#00b03c">
                                            <font style="font-family: Kunlasatri;" color="#ffffff" size="3">
                                                ปานกลาง   </font>
                                        </td>
                                        <td width="100" align="center" valign="middle" bgcolor="#e9d252">
                                            <font style="font-family: Kunlasatri;" color="#000000" size="3">
                                                มีผลกระทบ<br>ต่อสุขภาพ    </font>
                                        </td>
                                        <td width="100" align="center" valign="middle" bgcolor="#ff7e4b">
                                            <font style="font-family: Kunlasatri;" color="#ffffff" size="3">
                                                มีผบกระทบ<br>ต่อสุขภาพมาก   </font>
                                        </td>
                                        <td width="100" align="center" valign="middle" bgcolor="#ff0031">
                                            <font style="font-family: Kunlasatri;" color="#ffffff" size="3">
                                                อันตราย   </font>
                                        </td>

                                    </tr>
                                </table>

                            </div>
                            </p>
                        </section>
                        <section id="section-linebox-2">
                            <table class="rwd-table aqi1">
                                <tr>
                                    <td>
                                        <IMG class="en_h_aqi" SRC="/public/images/en_h_aqi.jpg"  ALT="Air Quality Index : AQI">
                                    </td>
                                </tr>

                                <tr>
                                    <td>

                                        <IMG class="p_aqi_02" SRC="/public/images/p_aqi_02.gif"  ALIGN="RIGHT">
                                        <div class="first" align="justify"><SPAN CLASS="empurple">ดัชนีคุณภาพอากาศ</SPAN> เป็นการรายงานข้อมูลคุณภาพอากาศในรูปแบบที่ง่ายต่อความเข้าใจของประชาชนทั่วไป เพื่อเผยแพร่ประชาสัมพันธ์ให้สาธารณชนได้รับทราบถึงสถานการณ์มลพิษทางอากาศในแต่ละพื้นที่ว่าอยู่ในระดับใด
                                            มีผลกระทบต่อสุขภาพอนามัยหรือไม่ ซึ่งดัชนีคุณภาพอากาศเป็นรูปแบบสากลที่ใช้กันอย่างแพร่หลายในหลายประเทศ
                                            เช่น สหรัฐอเมริกา ออสเตรเลีย สิงคโปร์ มาเลเซีย และประเทศไทย เป็นต้น</div><br>

                                        <div class="first" align="justify"> ดัชนีคุณภาพอากาศที่ใช้อยู่ในประเทศไทย
                                            คำนวณโดยเทียบจากมาตรฐานคุณภาพอากาศในบรรยากาศโดยทั่วไปของสารมลพิษทางอากาศ 5 ประเภท
                                            ได้แก่ ก๊าซโอโซน (O<sub>3</sub>) เฉลี่ย 1 ชั่วโมง ก๊าซไนโตรเจนไดออกไซด์ (NO<sub>2</sub>)
                                            เฉลี่ย 1 ชั่วโมง ก๊าซคาร์บอนมอนอกไซด์ (CO) เฉลี่ย 8 ชั่วโมง ก๊าซซัลเฟอร์ไดออกไซด์
                                            (SO<sub>2</sub>) เฉลี่ย 24 ชั่วโมง และฝุ่นละอองขนาดเล็กกว่า 10 ไมครอน (PM<sub>10</sub>)
                                            เฉลี่ย 24 ชั่วโมง ทั้งนี้ ดัชนีคุณภาพอากาศที่คำนวณได้ของสารมลพิษทางอากาศประเภทใดมีค่าสูงสุด
                                            จะใช้เป็นดัชนีคุณภาพอากาศของวันนั้น</div><br>
                                        <div align="justify">ดัชนีคุณภาพอากาศของประเทศไทยแบ่งเป็น 5
                                            ระดับ คือ ตั้งแต่ 0 ถึง มากกว่า 300 ซึ่งแต่ละระดับจะใช้สีเป็นสัญญลักษณ์เปรียบเทียบระดับของผลกระทบต่อสุขภาพอนามัย
                                            (<A HREF="#s1">ตารางที่ 1</A>) โดยดัชนีคุณภาพอากาศ 100 จะมีค่าเทียบเท่ามาตรฐานคุณภาพอากาศในบรรยากาศโดยทั่วไป
                                            หากดัชนีคุณภาพอากาศมีค่าสูงเกินกว่า 100 แสดงว่าค่าความเข้มข้นของมลพิษทางอากาศมีค่าเกินมาตรฐานและคุณภาพอากาศในวันนั้นจะเริ่มมีผลกระทบต่อสุขภาพอนามัยของประชาชน</div>
                                    </td>
                                </tr>
                            </table>
                            <table class="rwd-table aqi1">
                                <tr>
                                    <td><span class="empurplebig">ตารางที่ 1 เกณฑ์ของดัชนีคุณภาพอากาศสำหรับประเทศไทย</span>
                                </tr>
                                <tr>
                                    <table class="rwd-table aqi1">
                                        <tr BGCOLOR=34495E>
                                            <th>AQI</th>
                                            <th>ความหมาย</th>
                                            <th>สีที่ใช้</th>
                                            <th>แนวทางการป้องกันผลกระทบ</th>
                                        </tr>
                                        <tr BGCOLOR=50C9F4>
                                            <td data-th="AQI">0-50</td>
                                            <td data-th="ความหมาย">คุณภาพดี</td>
                                            <td data-th="สีที่ใช้">ฟ้า</td>
                                            <td data-th="แนวทางการป้องกันผลกระทบ">ไม่มีผลกระทบต่อสุขภาพ</td>
                                        </tr>
                                        <tr BGCOLOR="78C150">
                                            <td data-th="AQI">51-100</td>
                                            <td data-th="ความหมาย">คุณภาพปานกลาง</td>
                                            <td data-th="สีที่ใช้">เขียว</td>
                                            <td data-th="แนวทางการป้องกันผลกระทบ">ไม่มีผลกระทบต่อสุขภาพ</td>
                                        </tr>
                                        <tr BGCOLOR="FFF46B">
                                            <td data-th="AQI">101-200</td>
                                            <td data-th="ความหมาย">มีผลกระทบต่อสุขภาพ</td>
                                            <td data-th="สีที่ใช้">เหลือง</td>
                                            <td data-th="แนวทางการป้องกันผลกระทบ">ผู้ป่วยโรคระบบทางเดินหายใจ ควรหลีกเลี่ยงการออกกำลังภายนอกอาคาร บุคคลทั่วไป โดยเฉพาะเด็กและผู้สูงอายุ ไม่ควรทำกิจกรรมภายนอกอาคารเป็นเวลานาน</td>
                                        </tr>
                                        <tr BGCOLOR="F89836">
                                            <td data-th="AQI">201-300</td>
                                            <td data-th="ความหมาย">มีผลกระทบต่อสุขภาพมาก</td>
                                            <td data-th="สีที่ใช้">ส้ม</td>
                                            <td data-th="แนวทางการป้องกันผลกระทบ">ผู้ป่วยโรคระบบทางเดินหายใจ ควรหลีกเลี่ยงกิจกรรมภายนอกอาคาร
                                                บุคคลทั่วไป โดยเฉพาะเด็กและผู้สูงอายุ ควรจำกัดการออกกำลังภายนอกอาคาร</td>
                                        </tr>
                                        <tr BGCOLOR="EC363A">
                                            <td data-th="AQI">มากกว่า 300</td>
                                            <td data-th="ความหมาย">อันตราย</td>
                                            <td data-th="สีที่ใช้">แดง</td>
                                            <td data-th="แนวทางการป้องกันผลกระทบ">บุคคลทั่วไป ควรหลีกเลี่ยงการออกกำลังภายนอกอาคาร
                                                สำหรับผู้ป่วยโรคระบบทางเดินหายใจ ควรอยู่ภายในอาคาร</td>
                                        </tr>
                                    </table>
                                </tr>
                            </table>


                            <table class="rwd-table aqi1" BGCOLOR="#f1f4f8">
                                <tr>
                                    <td><span class="empurplebig">การคำนวณดัชนีคุณภาพอากาศรายวันของสารมลพิษทางอากาศแต่ละประเภท(i)</span>
                                </tr>
                                <tr>
                                    <td COLSPAN="2" VALIGN="top">
  <pre>
    จะคำนวณจากค่าความเข้มข้นของสารมลพิษทางอากาศจากข้อมูลผลการตรวจวัดคุณภาพอากาศ
    โดยแต่ละระดับของค่าความเข้มข้นของสารมลพิษทางอากาศเทียบเท่ากับค่าดัชนีคุณภาพอากาศที่ระดับต่างๆ
    (<A HREF="#s3">ตารางที่ 2</A>) และมีสูตรการคำนวณดังนี้
  </pre>
                                    </td>
                                </tr>
                                <tr ALIGN="CENTER">
                                    <td COLSPAN="2">
                                        <center><IMG SRC="/public/images/p_aqi_01.gif" WIDTH="248" HEIGHT="56"></center>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" VALIGN="top" >
                                        <dd><font color="#004e8c"><b>กำหนดให้</b></font>

                                            <p></p>
                                        <dd>
                                            <TABLE style="margin-left: -50px;" class="rwd-table" CELLSPACING=3 CELLPADDING=2 WIDTH=border=0
                                                   VALIGN="TOP" BGCOLOR="#f1f4f8">

    <pre>
Xi     =   ความเข้มข้นของสารมลพิษทางอากาศจากผลการตรวจวัด

Xij    =   ความเข้มข้นของสารมลพิษทางอากาศที่เป็นค่าต่ำสุดของช่วงพิสัยที่มีค่า Xi นั้น

Xij+1  =   ความเข้มข้นของสารมลพิษทางอากาศที่เป็นค่าสูงสุดของช่วงพิสัยที่มีค่า Xi นั้น

Ii     =   ค่าดัชนีย่อยคุณภาพอากาศ

Iij    =   ค่าดัชนีย่อยคุณภาพอากาศที่เป็นค่าต่ำสุดของช่วงพิสัยที่มีค่า Ii นั้น

Iij+1  =   ค่าดัชนีย่อยคุณภาพอากาศที่เป็นค่าสูงสุดของช่วงพิสัยที่มีค่า Ii นั้น

AQI    =   ค่าดัชนีคุณภาพอากาศ
    </pre>

                                            </TABLE>
                                        </dd>
                                    </td>
                                </tr>
                            </table>



                            <table class="rwd-table aqi1">
                                <tr>
                                    <td><span class="empurplebig">ตารางที่ 2 ค่าความเข้มข้นของสารมลพิษทางอากาศที่เทียบเท่ากับค่าดัชนีคุณภาพอากาศ</span>
                                </tr>
                                <tr>
                                    <table class=" aqi1 tble-tab tble2">
                                        <tr BGCOLOR="D2E49F">
                                            <th BGCOLOR="753E93" rowspan="2" style="color: white">AQI</th>
                                            <th BGCOLOR="50C9F4" CLASS="empurple">PM<sub>10</sub> (24 hr.)</th>
                                            <th BGCOLOR="50C9F4" CLASS="empurple" COLSPAN="2">O<sub>3</sub> (1 hr.)</th>
                                            <th BGCOLOR="50C9F4" CLASS="empurple" COLSPAN="2">SO<sub>2</sub> (24 hr.)</th>
                                            <th BGCOLOR="50C9F4" CLASS="empurple" COLSPAN="2">NO<sub>2</sub> (1 hr.)</th>
                                            <th BGCOLOR="50C9F4" CLASS="empurple" COLSPAN="2">mg/m3</th>
                                        </tr>
                                        <tr BGCOLOR="D2E49F">
                                            <td ALIGN="CENTER" BGCOLOR="D2E49F">&micro;g/m<sup>3</sup></td>
                                            <td ALIGN="CENTER" BGCOLOR="D2E49F">&micro;g/m<sup>3</sup></td>
                                            <td BGCOLOR="D2E49F">ppb</td>
                                            <td BGCOLOR="D2E49F">&micro;g/m<sup>3</sup></td>
                                            <td BGCOLOR="D2E49F">ppb</td>
                                            <td BGCOLOR="D2E49F">&micro;g/m<sup>3</sup></td>
                                            <td BGCOLOR="D2E49F">ppb</td>
                                            <td BGCOLOR="D2E49F">&micro;g/m<sup>3</sup></td>
                                            <td BGCOLOR="D2E49F">ppm</td>
                                        </tr>
                                        <tr ALIGN=middle BGCOLOR="#f1f4f8">
                                            <td ALIGN=CENTER>50</td>
                                            <td style="text-align: center;">40</td>
                                            <td ALIGN=CENTER>100</td>
                                            <td ALIGN=CENTER>51</td>
                                            <td ALIGN=CENTER>65</td>
                                            <td ALIGN=CENTER>25</td>
                                            <td ALIGN=CENTER>160</td>
                                            <td ALIGN=CENTER>85</td>
                                            <td ALIGN=CENTER>5.13</td>
                                            <td ALIGN=CENTER>4.48</td>
                                        </tr>
                                        <tr ALIGN=middle BGCOLOR="#f1f4f8">
                                            <td ALIGN=CENTER>100</td>
                                            <td style="text-align: center;">120</td>
                                            <td ALIGN=CENTER>200</td>
                                            <td ALIGN=CENTER>100</td>
                                            <td ALIGN=CENTER>300</td>
                                            <td ALIGN=CENTER>120</td>
                                            <td ALIGN=CENTER>320</td>
                                            <td ALIGN=CENTER>170</td>
                                            <td ALIGN=CENTER>10.26</td>
                                            <td ALIGN=CENTER>9.00</td>
                                        </tr>
                                        <tr ALIGN=middle BGCOLOR="#f1f4f8">
                                            <td ALIGN=CENTER>200</td>
                                            <td style="text-align: center;">350</td>
                                            <td ALIGN=CENTER>400</td>
                                            <td ALIGN=CENTER>203</td>
                                            <td ALIGN=CENTER>800</td>
                                            <td ALIGN=CENTER>305</td>
                                            <td ALIGN=CENTER>1,130</td>
                                            <td ALIGN=CENTER>600</td>
                                            <td ALIGN=CENTER>17.00</td>
                                            <td ALIGN=CENTER>14.84</td>
                                        </tr>
                                        <tr ALIGN=middle BGCOLOR="#f1f4f8">
                                            <td ALIGN=CENTER>300</td>
                                            <td style="text-align: center;">420</td>
                                            <td ALIGN=CENTER>800</td>
                                            <td ALIGN=CENTER>405</td>
                                            <td ALIGN=CENTER>1,600</td>
                                            <td ALIGN=CENTER>610</td>
                                            <td ALIGN=CENTER>2,260</td>
                                            <td ALIGN=CENTER>1,202</td>
                                            <td ALIGN=CENTER>34.00</td>
                                            <td ALIGN=CENTER>29.69</td>
                                        </tr>
                                        <tr ALIGN=middle BGCOLOR="#f1f4f8">
                                            <td ALIGN=CENTER>400</td>
                                            <td style="text-align: center;">500</td>
                                            <td ALIGN=CENTER>1,000</td>
                                            <td ALIGN=CENTER>509</td>
                                            <td ALIGN=CENTER>2,100</td>
                                            <td ALIGN=CENTER>802</td>
                                            <td ALIGN=CENTER>3,000</td>
                                            <td ALIGN=CENTER>1,594</td>
                                            <td ALIGN=CENTER>46.00</td>
                                            <td ALIGN=CENTER>40.17</td>
                                        </tr>
                                        <tr ALIGN=middle BGCOLOR="#f1f4f8">
                                            <td ALIGN=CENTER>500</td>
                                            <td style="text-align: center;">600</td>
                                            <td ALIGN=CENTER>1,200</td>
                                            <td ALIGN=CENTER>611</td>
                                            <td ALIGN=CENTER>2,620</td>
                                            <td ALIGN=CENTER>1,000</td>
                                            <td ALIGN=CENTER>3,750</td>
                                            <td ALIGN=CENTER>1,993</td>
                                            <td ALIGN=CENTER>57.50</td>
                                            <td ALIGN=CENTER>50.21</td>
                                        </tr>
                                        <tr BGCOLOR="#f1f4f8">
                                            <table class="aqi1 tble-tab tble2" BGCOLOR="#f1f4f8">
                                                <tr BGCOLOR="#f1f4f8">
                                                    <td BGCOLOR="#f1f4f8">
                                                        <SPAN CLASS="emred">เอกสารอ้างอิง</SPAN><br> United
                                                        States Environmental
                                                        Protection Agency, July 1999, Guideline for Reportng of
                                                        Daily Air Quality - Air
                                                        Quality Index (AQI), 40 CFR Part 58, Appendix G.
                                                    </td>
                                                </tr>
                                            </table>
                                        </tr>
                                    </table>
                                </tr>
                            </table>
                        </section>
                        <!-- <section id="section-linebox-3"><p>3</p></section>
                        <section id="section-linebox-4"><p>4</p></section>
                        <section id="section-linebox-5"><p>5</p></section> -->
                    </div><!-- /content -->
                </div><!-- /tabs -->
            </section>

        </div><!-- wrapper -->
    </div><!-- /container -->
    <nav class="outer-nav right vertical">
        <a  href="<?php echo base_url('Home/index') ; ?>" style="text-decoration: none;"><span class="icon-Web_Application_HOME"></span>Home</a>
        <?php if (isset($_SESSION['username']) && $_SESSION['loggedin'] === true) : ?>
            <a href="<?php echo base_url('Shared/data') ; ?>" style="text-decoration: none;"><span class="icon-Web_Application_SHARE_ALT"></span>Shared Data</a>
        <?php endif; ?>
        <?php if (isset($_SESSION['username']) && $_SESSION['loggedin'] === true) : ?>
        <?php else : ?>
            <a href="<?php echo base_url('Member/login_register') ; ?>" style="text-decoration: none;"><span class="icon-Web_Application_USERS"></span>Member</a>
        <?php endif; ?>
        <?php if (isset($_SESSION['username']) && $_SESSION['loggedin'] === true) : ?>
            <a href="<?= base_url('login/logout') ?>" style="text-decoration: none;"><span class="icon-Web_Application_LOCK"></span>Logout</a>
        <?php endif; ?>
    </nav>
</div><!-- /perspective -->
<script src="/public/js/cbpFWTabs.js"></script>
<script>
    (function() {

        [].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
            new CBPFWTabs( el );
        });

    })();
</script>
<script src="/public/js/classie.js"></script>
<script src="/public/js/menu.js"></script>
</body>
</html>
</body>
</html>