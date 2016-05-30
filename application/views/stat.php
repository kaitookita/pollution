<?php

foreach ($avg as $row)
{

}

//var_dump($row);
?>
<!DOCTYPE HTML>
<html>

<head>
    <script type="text/javascript">
        window.onload = function () {
            var chart = new CanvasJS.Chart("chartContainer",
                {
                    animationEnabled: true,
                    title:{
                        text: "User Value"
                    },
                    data: [
                        {
                            type: "column", //change type to bar, line, area, pie, etc
                            dataPoints: [
                                { label: "Vision", y: <?php echo $row['vision']; ?> },
                                { label: "Smell", y: <?php echo $row['smell']; ?> }
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
</body>

</html>