<?php
$dataarr= array();
$i=0;
$dataval= array();
$j=0;
//var_dump($data[0]);
//echo "<br>";
//var_dump($data[1]);
foreach ($data[0] as $row) {
    $dataarr[$i]=$row;
    $i++;
    //var_dump($row);
    //echo "<br>";
    //echo "<br>";
}
//var_dump($dataarr);
//var_dump($data);
//echo count($dataarr);

/*foreach ($data[1] as $row) {
    $dataval[$j]=$row;
    $j++;
    //var_dump($row);
    //echo "<br>";
    //echo "<br>";
}*/

$numdata = count($dataarr);

if($numdata>0)
{
    $station = $dataarr[0]['station'];
}

//var_dump($station);

$dataaqi = array();
$color = array();
$aqitext = array();
$textcolor = array();
for ($count=0; $count < 7 ; $count++) {
    # code...
    $dataaqi[$count] = 0;
    $color[$count] = "000000";
}
//var_dump($color);
//===CalAQI===//
for ($count=0; $count < $numdata ; $count++) {
    # code...


    //===co===//

    $co = $dataarr[$count]['co'];
    $coilo = 0;
    $coihi = 0;
    $cobplo = 0;
    $cobphi = 0;
    $coaqi = 0;

    if($co>=0.0&&$co<=4.4)
    {
        $coilo = 0;
        $coihi = 50;
        $cobplo = 0.0;
        $cobphi = 4.4;

        $coaqi = (($coihi-$coilo)*($co-$cobplo))/($cobphi-$cobplo)+$coilo;
    }
    else if($co>=4.5&&$co<=9.4)
    {
        $coilo = 51;
        $coihi = 100;
        $cobplo = 4.5;
        $cobphi = 9.4;

        $coaqi = (($coihi-$coilo)*($co-$cobplo))/($cobphi-$cobplo)+$coilo;
    }
    else if($co>=9.5&&$co<=12.4)
    {
        $coilo = 101;
        $coihi = 150;
        $cobplo = 9.5;
        $cobphi = 12.4;

        $coaqi = (($coihi-$coilo)*($co-$cobplo))/($cobphi-$cobplo)+$coilo;
    }
    else if($co>=12.5&&$co<=15.4)
    {
        $coilo = 151;
        $coihi = 200;
        $cobplo = 12.5;
        $cobphi = 15.4;

        $coaqi = (($coihi-$coilo)*($co-$cobplo))/($cobphi-$cobplo)+$coilo;
    }
    else if($co>=15.5&&$co<=30.4)
    {
        $coilo = 201;
        $coihi = 300;
        $cobplo = 15.5;
        $cobphi = 30.4;

        $coaqi = (($coihi-$coilo)*($co-$cobplo))/($cobphi-$cobplo)+$coilo;
    }
    else if($co>=30.5&&$co<=40.4)
    {
        $coilo = 301;
        $coihi = 400;
        $cobplo = 30.5;
        $cobphi = 40.4;

        $coaqi = (($coihi-$coilo)*($co-$cobplo))/($cobphi-$cobplo)+$coilo;
    }
    else if($co>=40.5&&$co<=50.4)
    {
        $coilo = 401;
        $coihi = 500;
        $cobplo = 40.5;
        $cobphi = 50.4;

        $coaqi = (($coihi-$coilo)*($co-$cobplo))/($cobphi-$cobplo)+$coilo;
    }

    //===end co===//

    //===NO2===//
    //$no2 = $dataarr[$count]['co']/1000;
    $no2 = $dataarr[$count]['co'];
    $no2ilo = 0;
    $no2ihi = 0;
    $no2bplo = 0;
    $no2bphi = 0;
    $no2aqi = 0;

    if($no2>=0.65&&$no2<=1.24)
    {
        $no2ilo = 201;
        $no2ihi = 300;
        $no2bplo = 0.65;
        $no2bphi = 1.24;

        $no2aqi = (($no2ihi-$no2ilo)*($no2-$no2bplo))/($no2bphi-$no2bplo)+$no2ilo;
    }
    else if($no2>=1.25&&$no2<=1.64)
    {
        $no2ilo = 301;
        $no2ihi = 400;
        $no2bplo = 1.25;
        $no2bphi = 1.64;

        $no2aqi = (($no2ihi-$no2ilo)*($no2-$no2bplo))/($no2bphi-$no2bplo)+$no2ilo;
    }
    else if($no2>=1.65&&$no2<=2.04)
    {
        $no2ilo = 401;
        $no2ihi = 500;
        $no2bplo = 1.65;
        $no2bphi = 2.04;

        $no2aqi = (($no2ihi-$no2ilo)*($no2-$no2bplo))/($no2bphi-$no2bplo)+$no2ilo;
    }

    //===end of no2===//

    //===O3===//
    //$o3 = $dataarr[$count]['o3']/1000;
    $o3 = $dataarr[$count]['o3'];
    $o3ilo = 0;
    $o3ihi = 0;
    $o3bplo = 0;
    $o3bphi = 0;
    $o3aqi = 0;

    if($o3>=0.125&&$o3<=0.164)
    {
        $o3ilo = 101;
        $o3ihi = 150;
        $o3bplo = 0.125;
        $o3bphi = 0.164;

        $o3aqi = (($o3ihi-$o3ilo)*($o3-$o3bplo))/($o3bphi-$o3bplo)+$o3ilo;
    }
    else if($o3>=0.165&&$o3<=0.204)
    {
        $o3ilo = 151;
        $o3ihi = 200;
        $o3bplo = 0.165;
        $o3bphi = 0.204;

        $o3aqi = (($o3ihi-$o3ilo)*($o3-$o3bplo))/($o3bphi-$o3bplo)+$o3ilo;
    }
    else if($o3>=0.205&&$o3<=0.404)
    {
        $o3ilo = 201;
        $o3ihi = 300;
        $o3bplo = 0.205;
        $o3bphi = 0.404;

        $o3aqi = (($o3ihi-$o3ilo)*($o3-$o3bplo))/($o3bphi-$o3bplo)+$o3ilo;
    }
    else if($o3>=0.405&&$o3<=0.504)
    {
        $o3ilo = 301;
        $o3ihi = 400;
        $o3bplo = 0.405;
        $o3bphi = 0.504;

        $o3aqi = (($o3ihi-$o3ilo)*($o3-$o3bplo))/($o3bphi-$o3bplo)+$o3ilo;
    }
    else if($o3>=0.505&&$o3<=0.604)
    {
        $o3ilo = 401;
        $o3ihi = 500;
        $o3bplo = 0.505;
        $o3bphi = 0.604;

        $o3aqi = (($o3ihi-$o3ilo)*($o3-$o3bplo))/($o3bphi-$o3bplo)+$o3ilo;
    }
    //===end of o3===//

    //===SO2===//
    //$so2 = $dataarr[$count]['so2']/1000;
    $so2 = $dataarr[$count]['so2'];
    $so2ilo = 0;
    $so2ihi = 0;
    $so2bplo = 0;
    $so2bphi = 0;
    $so2aqi = 0;

    if($so2>=0.000&&$so2<=0.034)
    {
        $so2ilo = 0;
        $so2ihi = 50;
        $so2bplo = 0.000;
        $so2bphi = 0.034;

        $so2aqi = (($so2ihi-$so2ilo)*($so2-$so2bplo))/($so2bphi-$so2bplo)+$so2ilo;
    }
    else if($so2>=0.035&&$so2<=0.144)
    {
        $so2ilo = 51;
        $so2ihi = 100;
        $so2bplo = 0.035;
        $so2bphi = 0.144;

        $so2aqi = (($so2ihi-$so2ilo)*($so2-$so2bplo))/($so2bphi-$so2bplo)+$so2ilo;
    }
    else if($so2>=0.145&&$so2<=0.224)
    {
        $so2ilo = 101;
        $so2ihi = 150;
        $so2bplo = 0.145;
        $so2bphi = 0.224;

        $so2aqi = (($so2ihi-$so2ilo)*($so2-$so2bplo))/($so2bphi-$so2bplo)+$so2ilo;
    }
    else if($so2>=0.225&&$so2<=0.304)
    {
        $so2ilo = 151;
        $so2ihi = 200;
        $so2bplo = 0.225;
        $so2bphi = 0.304;

        $so2aqi = (($so2ihi-$so2ilo)*($so2-$so2bplo))/($so2bphi-$so2bplo)+$so2ilo;
    }
    else if($so2>=0.305&&$so2<=0.604)
    {
        $so2ilo = 201;
        $so2ihi = 300;
        $so2bplo = 0.305;
        $so2bphi = 0.604;

        $so2aqi = (($so2ihi-$so2ilo)*($so2-$so2bplo))/($so2bphi-$so2bplo)+$so2ilo;
    }
    else if($so2>=0.605&&$so2<=0.804)
    {
        $so2ilo = 301;
        $so2ihi = 400;
        $so2bplo = 0.605;
        $so2bphi = 0.804;

        $so2aqi = (($so2ihi-$so2ilo)*($so2-$so2bplo))/($so2bphi-$so2bplo)+$so2ilo;
    }
    else if($so2>=0.805&&$so2<=1.004)
    {
        $so2ilo = 401;
        $so2ihi = 500;
        $so2bplo = 0.805;
        $so2bphi = 1.004;

        $so2aqi = (($so2ihi-$so2ilo)*($so2-$so2bplo))/($so2bphi-$so2bplo)+$so2ilo;
    }
    //===end of so2===//

    //===PM10===//
    $pm10 = $dataarr[$count]['pm10'];
    $pm10ilo = 0;
    $pm10ihi = 0;
    $pm10bplo = 0;
    $pm10bphi = 0;
    $pm10aqi = 0;

    if($pm10>=0&&$pm10<=54)
    {
        $pm10ilo = 0;
        $pm10ihi = 50;
        $pm10bplo = 0;
        $pm10bphi = 54;

        $pm10aqi = (($pm10ihi-$pm10ilo)*($pm10-$pm10bplo))/($pm10bphi-$pm10bplo)+$pm10ilo;
    }
    else if($pm10>=55&&$pm10<=154)
    {
        $pm10ilo = 51;
        $pm10ihi = 100;
        $pm10bplo = 55;
        $pm10bphi = 154;

        $pm10aqi = (($pm10ihi-$pm10ilo)*($pm10-$pm10bplo))/($pm10bphi-$pm10bplo)+$pm10ilo;
    }
    else if($pm10>=155&&$pm10<=254)
    {
        $pm10ilo = 101;
        $pm10ihi = 150;
        $pm10bplo = 155;
        $pm10bphi = 254;

        $pm10aqi = (($pm10ihi-$pm10ilo)*($pm10-$pm10bplo))/($pm10bphi-$pm10bplo)+$pm10ilo;
    }
    else if($pm10>=255&&$pm10<=354)
    {
        $pm10ilo = 151;
        $pm10ihi = 200;
        $pm10bplo = 255;
        $pm10bphi = 354;

        $pm10aqi = (($pm10ihi-$pm10ilo)*($pm10-$pm10bplo))/($pm10bphi-$pm10bplo)+$pm10ilo;
    }
    else if($pm10>=355&&$pm10<=424)
    {
        $pm10ilo = 201;
        $pm10ihi = 300;
        $pm10bplo = 355;
        $pm10bphi = 424;

        $pm10aqi = (($pm10ihi-$pm10ilo)*($pm10-$pm10bplo))/($pm10bphi-$pm10bplo)+$pm10ilo;
    }
    else if($pm10>=425&&$pm10<=504)
    {
        $pm10ilo = 301;
        $pm10ihi = 400;
        $pm10bplo = 425;
        $pm10bphi = 524;

        $pm10aqi = (($pm10ihi-$pm10ilo)*($pm10-$pm10bplo))/($pm10bphi-$pm10bplo)+$pm10ilo;
    }
    else if($pm10>=505&&$pm10<=604)
    {
        $pm10ilo = 401;
        $pm10ihi = 500;
        $pm10bplo = 505;
        $pm10bphi = 604;

        $pm10aqi = (($pm10ihi-$pm10ilo)*($pm10-$pm10bplo))/($pm10bphi-$pm10bplo)+$pm10ilo;
    }
    //===PM10===//

    $max = $coaqi;
    if($no2aqi>$max)
    {$max = $no2aqi;}
    else if($o3aqi>$max)
    {$max=$o3aqi;}
    else if($so2aqi>$max)
    {$max=$so2aqi;}
    else if($pm10aqi>$max)
    {$max=$pm10aqi;}

    $dataaqi[$count]=$max;

    //var_dump($dataaqi[$count]);
    //echo "<br>";

    if($dataaqi[$count]>=0 && $dataaqi[$count]<51)
    {
        $color[$count] = "#1f8ed2";//blue
        $aqitext[$count] = "ดี";
        $textcolor[$count] = "FFFFFF";
    }
    else if ($dataaqi[$count]>=51 && $dataaqi[$count]<101)
    {
        $color[$count] = "#00b03c";//green
        $aqitext[$count] = "ปานกลาง";
        $textcolor[$count] = "FFFFFF";
    }
    else if($dataaqi[$count]>=101 && $dataaqi[$count]<201)
    {
        $color[$count] = "#e9d252";//yellow
        $aqitext[$count] = "มีผลต่อสุขภาพ";
        $textcolor[$count] = "000000";
    }
    else if($dataaqi[$count]>=201 && $dataaqi[$count]<301)
    {
        $color[$count] = "#ff7e4b";//orange
        $aqitext[$count] = "มีผลต่อสุขภาพมาก";
        $textcolor[$count] = "FFFFFF";
    }
    else
    {
        $color[$count] = "#ff0031";//red
        $aqitext[$count] = "อันตราย";
        $textcolor[$count] = "FFFFFF";
    }



}//end of for

//var_dump($color);


//var_dump($dataaqi);

$date = array();

for($count=0;$count<7;$count++)
{
    $eachDayTime = time()-($count*24*60*60);
    $eachDayString = date("d-m-Y",$eachDayTime);
    //$date[$count] = null;
    $date[$count] = $eachDayString;
    if(isset($dataarr[$count]['date']))
    {
        $temp = strtotime($dataarr[$count]['date']);
        $date[$count] = date("d-m-Y",$temp);
    }
}
//var_dump($date);
?>
<!DOCTYPE HTML>
<html>

<head>
<!-- table -->
    <link rel="stylesheet" type="text/css" href="/public/css/table/normalize.css"/>
    <link rel="stylesheet" type="text/css" href="/public/css/table/style.css"/>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <!-- table -->
    <script type="text/javascript">
        window.onload = function () {
            var chart = new CanvasJS.Chart("chartContainer",
                {
                    animationEnabled: true,
                    title:{
                        text: "AQI of station <?php echo $station; ?>"
                    },
                    data: [
                        {
                            type: "column", //change type to bar, line, area, pie, etc
                            dataPoints: [
                                { label: "<?php echo $date[0]; ?>", y: <?php echo $dataaqi[0]; ?>,color: <?php echo "'$color[0]'"; ?> },
                                { label: "<?php echo $date[1]; ?>", y: <?php echo $dataaqi[1]; ?>,color: <?php echo "'$color[1]'"; ?> },
                                { label: "<?php echo $date[2]; ?>", y: <?php echo $dataaqi[2]; ?>,color: <?php echo "'$color[2]'"; ?> },
                                { label: "<?php echo $date[3]; ?>", y: <?php echo $dataaqi[3]; ?>,color: <?php echo "'$color[3]'"; ?> },
                                { label: "<?php echo $date[4]; ?>", y: <?php echo $dataaqi[4]; ?>,color: <?php echo "'$color[4]'"; ?> },
                                { label: "<?php echo $date[5]; ?>", y: <?php echo $dataaqi[5]; ?>,color: <?php echo "'$color[5]'"; ?> },
                                { label: "<?php echo $date[6]; ?>", y: <?php echo $dataaqi[6]; ?>,color: <?php echo "'$color[6]'"; ?> }

                            ]
                        }
                    ]
                });

            chart.render();
        }
    </script>
    <script type="text/javascript" src="/public/js/canvasjs.min.js"></script>
</head>
<body>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>
              <table class="tble-tab2 tble2" align="center">
                                <tr>
                                    <td><span class="empurplebig">ตารางแสดงคุณภาพอากาศย้อนหลัง 7 วัน</span>
                                </tr>
                                <tr>
                                    <table class="tble-tab2 tble2" align="center" style="color: white;">
                                        <tr BGCOLOR=34495E>
                                            <th>วันที่</th>
                                            <th>>PM<sub>10</sub>&micro;g/m<sup>3</sup></th>
                                            <th>O<sub>3</sub>(ppb)</th>
                                            <th>CO(ppm)</th>
                                            <th>NO<sub>2</sub>(ppb)</th>
                                            <th>SO<sub>2</sub>(ppb)</th>
                                            <th>AQI </th>
                                            <th>คุณภาพอากาศ</th>
                                        </tr>
                                        <?php


                                        for($count=0;$count<$numdata;$count++)
                                        {
                                            $o3val = $dataarr[$count]['o3'];
                                            $no2val = $dataarr[$count]['no2'];
                                            $so2val = $dataarr[$count]['so2'];
                                            echo "<tr BGCOLOR=50C9F4>";
                                            echo "<td>".$date[$count]."</td>";
                                            echo "<td>".$dataarr[$count]['pm10']."</td>";
                                            echo "<td>".$o3val."</td>";
                                            echo "<td>".$dataarr[$count]['co']."</td>";
                                            echo "<td>".$no2val."</td>";
                                            echo "<td>".$so2val."</td>";
                                            echo "<td>".$dataaqi[$count]."</td>";
                                            echo "<td style='background: ".$color[$count]."; color:".$textcolor[$count].";' >".$aqitext[$count]."</td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                       
                                    </table>
                                </tr>
                            </table>
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
</body>

</html>
