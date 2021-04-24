<?php
$servername = "localhost";
$username = "test";
$password = "1234";
$dbname = "water_monetering";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$res= mysqli_query($conn,"SELECT volume_in_ltrs FROM tank ORDER BY s_no DESC LIMIT 0,1" );
$row = mysqli_fetch_assoc($res);
$st1=$row['volume_in_ltrs'];
$st2=40000-$st1;
?>		 
<!DOCTYPE html>
<html>
<body>
<head>
<style>

#chartdiv {
  width: 100%;
  height: 500px;
}

</style>
<meta http-equiv="refresh" content="30">
</head>
<body>
<!-- Resources -->
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
am4core.ready(function() {
var n1= <?php echo $st1;?>;
var n2 =<?php echo $st2;?>;
// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.XYChart3D);

chart.titles.create().text = "Volume";

// Add data
chart.data = [{
  "category": "",
  "value1": n1,
  "value2": n2
}];

// Create axes
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "category";
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.grid.template.strokeOpacity = 0;

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.renderer.grid.template.strokeOpacity = 0;
valueAxis.min = 0;
valueAxis.max = 44000;
valueAxis.strictMinMax = true;
valueAxis.renderer.baseGrid.disabled = true;
valueAxis.renderer.labels.template.adapter.add("text", function(text) {
  if ((text > 100) || (text < 0)) {
    return "";
  }
  else {
    return text + " ltr";
  }
})

// Create series
var series1 = chart.series.push(new am4charts.ConeSeries());
series1.dataFields.valueY = "value1";
series1.dataFields.categoryX = "category";
series1.columns.template.width = am4core.percent(80);
series1.columns.template.fillOpacity = 0.9;
series1.columns.template.strokeOpacity = 1;
series1.columns.template.strokeWidth = 2;

var series2 = chart.series.push(new am4charts.ConeSeries());
series2.dataFields.valueY = "value2";
series2.dataFields.categoryX = "category";
series2.stacked = true;
series2.columns.template.width = am4core.percent(80);
series2.columns.template.fill = am4core.color("#000");
series2.columns.template.fillOpacity = 0.1;
series2.columns.template.stroke = am4core.color("#000");
series2.columns.template.strokeOpacity = 0.2;
series2.columns.template.strokeWidth = 2;

}); // end am4core.ready()
</script>

<!-- HTML -->
<div id="chartdiv"></div>
</body>
</html>
<?php
mysqli_close($conn);
?>