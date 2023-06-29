<!-- Styles -->
<style>
#chartdiv {
  width: 100%;
  height: 500px;
}

</style>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<?php 
//print_r($sec);
$ci =& get_instance();
$ci->load->model('Market_model');
	$newstuff = array();	
	
  //foreach ($sec as $sectors) {
	//  print_r($sectors['sector']);
	//  echo $sectors['sector'];
	  //echo $_REQUEST['sec'];
$trad=$ci->Market_model->sector_tader_chart($_REQUEST['trader']);
$se=$ci->Market_model->sector_name_single($_REQUEST['trader'],$_REQUEST['sec']);
$k=0;
$array_products = array(); 
foreach ($se as $sectors) {
	//echo $sectors['sector'];
	$rand = str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);
$col = '#'.$rand;
$name = str_replace(' ', '_', $sectors['sector']);
if (isset($color[$name])) {
 $colo= $color[$name];
}
	//echo $sectors['regression_id'].'</br>';
	$trads=$ci->Market_model->stock_tader_chart($_REQUEST['trader'], $sectors['regression_id'] );
$day=1;

$j=0;

//print_r($trads);
 foreach ($trads as $trader) {
//echo $trader['number_of_days']; 

if($trader['number_of_days'] == $day){
	$rand = str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);
$col = '#'.$rand;
	
	if($day == 1){
		$array_products[$k]['day']= $trader['number_of_days'];
	}
	$array_products[$k][ $trader['regression_id']]= $trader['win_percentage'];
	$array_products[$k]['symbol']= $trader['symbol'];
	$array_products[$k]['predict']= $trader['predict_goup'];
	$array_products[$k]['sell_price']= $trader['sell_price'];
	//$array_product[$j]['color']= $col;
$k++;	
   
} else {
	
	 $j++;
	$rand = str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);
$col = '#'.$rand;
$name = str_replace(' ', '_', $trader['sector']);	
	 $array_products[$k]['day']= $trader['number_of_days'];
	 $array_products[$k][ $trader['regression_id']]= $trader['win_percentage'];
	 $array_products[$k][ 'symbol']= $trader['symbol'];
	 $array_products[$k][ 'predict']= $trader['predict_goup'];
	 $array_products[$k][ 'sell_price']= $trader['sell_price'];
	//$array_product[$j]['color']= $col;
	
		if (isset($color[$name])) {
 $array_products[$k]['color']= $color[$name];
}
$k++;
}

$day = $trader['number_of_days'];
  }
  
	
}	
//echo '<pre>';
//	print_r($array_products); 
$json_products =  json_encode($array_products);
//echo $json_products;


$day=1;
$array_product = array(); 
$i=0;
 foreach ($trad as $trader) {
//$newstuff[$sectors['sector']][] = $trader['avg'];

if($trader['number_of_days'] == $day){
	//$arrayname[indexname] = $value;
	if($day == 1){
		$array_product[$i]['day']= $trader['number_of_days'];
	}
	$array_product[$i][ $trader['sector']]= $trader['avg'];
   
} else {
	 $i++;
	 $array_product[$i]['day']= $trader['number_of_days'];
	 $array_product[$i][ $trader['sector']]= $trader['avg'];
}
$day = $trader['number_of_days'];
  }
 // print_r($array_product);
//}  
//$json_product =  json_encode($array_product);
//echo($json_product);
/* foreach($array_product as $key=>$value)
{
	foreach ($sec as $sectors) {
		echo $sectors['sector'];
		echo $value[$sectors['sector']];
	}
 
} */
?>
<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.XYChart);

// Add data
//chart.data = [{"day":1,"Communication Services":"4.10435036429009","Consumer Cyclical":"-0.0407488740346234","Consumer Defensive":"-5.67227825169877","Financial":"4.20647723267205","Healthcare":"-0.777833669719643","Industrials":"-1.36239811898414","Technology":"2.04000320357481"},{"day":2,"Communication Services":"6.30319734374685","Consumer Cyclical":"0.410056910374382","Consumer Defensive":"-11.3445464858106","Financial":"1.95698756925598","Healthcare":"0.157569101609018","Industrials":"-0.549963742181205","Technology":"0.0525030153807781"},{"day":3,"Communication Services":"4.14131100234326","Consumer Cyclical":"0.487779682842862","Consumer Defensive":"1.80104131525713","Financial":"7.82985981407202","Healthcare":"-2.47849750291155","Industrials":"0.432283375014283","Technology":"1.91426723924843"},{"day":4,"Communication Services":"2.97890860200714","Consumer Cyclical":"3.10343691411033","Consumer Defensive":"2.7724623810202","Financial":"0.778726579805079","Healthcare":"-2.10385550172242","Industrials":"-2.39876184284309","Technology":"0.552224881993419"},{"day":5,"Communication Services":"0.937910533768437","Consumer Cyclical":"1.5827622650915","Consumer Defensive":"-4.93715246864772","Financial":"1.30846475368457","Healthcare":"-1.59438525991874","Industrials":"2.83260829776532","Technology":"-0.604368390671217"},{"day":6,"Communication Services":"3.85553845284549","Consumer Cyclical":"0.698954576225466","Consumer Defensive":"-6.95413764674175","Financial":"3.59123672701749","Healthcare":"-3.36798880138164","Industrials":"1.18666258935803","Technology":"-1.38695169309606"}];
chart.data = <?php echo($json_products)?>;
/* [{
  "day": "1",
  "market1": 71,
  "market2": 75,
   "market3": 30,
   "market4": 10,
  "sales1": 5,
  "sales2": 8
}, {
  "day": "2",
  "market1": 74,
  "market2": 78,
   "market3": 10,
   "market4": 20,
  "sales1": 4,
  "sales2": 6
}, {
  "day": "3",
  "market1": 78,
  "market2": 88,
   "market3": 30,
   "market4": 70,
  "sales1": 5,
  "sales2": 2
}, {
  "day": "4",
  "market1": 85,
  "market2": 89,
   "market3": 20,
   "market4": 10,
  "sales1": 8,
  "sales2": 9
}, {
  "day": "5",
  "market1": 82,
  "market2": 89,
   "market3": 30,
   "market4": 20,
  "sales1": 9,
  "sales2": 6
}, {
  "day": "6",
  "market1": 83,
  "market2": 85,
   "market3": 20,
   "market4": 70,
  "sales1": 3,
  "sales2": 5
}, {
  "day": "7",
  "market1": 88,
  "market2": 92,
   "market3": 10,
   "market4": 30,
  "sales1": 5,
  "sales2": 7
}, {
  "day": "8",
  "market1": 85,
  "market2": 90,
   "market3": 60,
   "market4": 30,
  "sales1": 7,
  "sales2": 6
}, {
  "day": "9",
  "market1": 85,
  "market2": 91,
   "market3": 10,
   "market4": 50,
  "sales1": 9,
  "sales2": 5
}, {
  "day": "10",
  "market1": 80,
  "market2": 84,
   "market3": 30,
   "market4": 60,
  "sales1": 5,
  "sales2": 8
}, {
  "day": "11",
  "market2": 92,
   "market3": 45,
   "market4": 55,
  "sales1": 4,
  "sales2": 8
}, {
  "day": "12",
  "market1": 84,
  "market2": 87,
   "market3": 45,
   "market4": 75,
  "sales1": 3,
  "sales2": 4
}, {
  "day": "13",
  "market1": 83,
  "market2": 88,
   "market3": 40,
   "market4": 20,
  "sales1": 5,
  "sales2": 7
}, {
  "day": "14",
  "market1": 84,
  "market2": 87,
   "market3": 60,
   "market4": 20,
  "sales1": 5,
  "sales2": 8
}, {
  "day": "15",
  "market1": 81,
  "market2": 85,
  "market3": 30,
  "market4": 20,
  "sales1": 4,
  "sales2": 7
}]; */

/* chart.data = [{
  "date": "2013-01-16",
  "market1": 71,
  "market2": 75,
   "market3": 30,
   "market4": 10,
  "sales1": 5,
  "sales2": 8
}, {
  "date": "2013-01-17",
  "market1": 74,
  "market2": 78,
   "market3": 10,
   "market4": 20,
  "sales1": 4,
  "sales2": 6
}, {
  "date": "2013-01-18",
  "market1": 78,
  "market2": 88,
   "market3": 30,
   "market4": 70,
  "sales1": 5,
  "sales2": 2
}, {
  "date": "2013-01-19",
  "market1": 85,
  "market2": 89,
   "market3": 20,
   "market4": 10,
  "sales1": 8,
  "sales2": 9
}, {
  "date": "2013-01-20",
  "market1": 82,
  "market2": 89,
   "market3": 30,
   "market4": 20,
  "sales1": 9,
  "sales2": 6
}, {
  "date": "2013-01-21",
  "market1": 83,
  "market2": 85,
   "market3": 20,
   "market4": 70,
  "sales1": 3,
  "sales2": 5
}, {
  "date": "2013-01-22",
  "market1": 88,
  "market2": 92,
   "market3": 10,
   "market4": 30,
  "sales1": 5,
  "sales2": 7
}, {
  "date": "2013-01-23",
  "market1": 85,
  "market2": 90,
   "market3": 60,
   "market4": 30,
  "sales1": 7,
  "sales2": 6
}, {
  "date": "2013-01-24",
  "market1": 85,
  "market2": 91,
   "market3": 10,
   "market4": 50,
  "sales1": 9,
  "sales2": 5
}, {
  "date": "2013-01-25",
  "market1": 80,
  "market2": 84,
   "market3": 30,
   "market4": 60,
  "sales1": 5,
  "sales2": 8
}, {
  "date": "2013-01-26",
  "market1": 87,
  "market2": 92,
   "market3": 45,
   "market4": 55,
  "sales1": 4,
  "sales2": 8
}, {
  "date": "2013-01-27",
  "market1": 84,
  "market2": 87,
   "market3": 45,
   "market4": 75,
  "sales1": 3,
  "sales2": 4
}, {
  "date": "2013-01-28",
  "market1": 83,
  "market2": 88,
   "market3": 40,
   "market4": 20,
  "sales1": 5,
  "sales2": 7
}, {
  "date": "2013-01-29",
  "market1": 84,
  "market2": 87,
   "market3": 60,
   "market4": 20,
  "sales1": 5,
  "sales2": 8
}, {
  "date": "2013-01-30",
  "market1": 81,
  "market2": 85,
  "market3": 30,
  "market4": 20,
  "sales1": 4,
  "sales2": 7
}]; */

// Create axes
var dateAxis = chart.xAxes.push(new am4charts.CategoryAxis());
dateAxis.dataFields.category = "day";
//dateAxis.renderer.grid.template.location = 0;
//dateAxis.renderer.minGridDistance = 30;

var valueAxis1 = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis1.title.text = "Sales";

var valueAxis2 = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis2.title.text = "Market Days";
valueAxis2.renderer.opposite = true;
valueAxis2.renderer.grid.template.disabled = true;


/* 
var series3 = chart.series.push(new am4charts.LineSeries());
series3.dataFields.valueY = "market1";
series3.dataFields.categoryX  = "day";
series3.name = "Market Days";
series3.strokeWidth = 2;
series3.tensionX = 0.7;
series3.yAxis = valueAxis2;
series3.tooltipText = "{name}\n[bold font-size: 20]{valueY}[/]";
//series3.stroke = chart.colors.getIndex(0).lighten(0.5);


var bullet3 = series3.bullets.push(new am4charts.CircleBullet());
bullet3.circle.radius = 3;
bullet3.circle.strokeWidth = 2;
bullet3.circle.fill = am4core.color("#fff"); */

<?php 
//echo "<pre>";
//print_r($se);
$i=0;
foreach ($se as $sectors) {
$rand = str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);
$col = '#'.$rand;
	?>
	
var series<?php echo $i;?> = chart.series.push(new am4charts.LineSeries());
series<?php echo $i;?>.stroke = am4core.color( <?php echo "'".$col."'"; ?>);
series<?php echo $i;?>.dataFields.valueY = <?php echo "'".$sectors['regression_id']."'"; ?>;
series<?php echo $i;?>.dataFields.categoryX  = "day";
series<?php echo $i;?>.dataFields.highValueY = "symbol";
series<?php echo $i;?>.dataFields.highValueZ = "predict";
series<?php echo $i;?>.dataFields.highValueg = "sell_price";
data = <?php echo "'".$sectors['sector']."'"; ?>;
series<?php echo $i;?>.name = <?php echo "'".$sectors['regression_id']."'"; ?>;
series<?php echo $i;?>.strokeWidth = 2;
series<?php echo $i;?>.tensionX = 0.7;
series<?php echo $i;?>.yAxis = valueAxis2;
series<?php echo $i;?>.name = <?php echo "'".$sectors['symbol']."'"; ?>;
//series<?php echo $i;?>.tooltipText = '{highValueg}\n[bold font-size: 10]{valueY}[/]\n{highValueY}\n{highValueZ}';
//series<?php echo $i;?>.tooltipText = '{valueY}';

var bullet<?php echo $i;?> = series<?php echo $i;?>.bullets.push(new am4charts.CircleBullet());
bullet<?php echo $i;?>.circle.radius = 3;
bullet<?php echo $i;?>.circle.strokeWidth = 2;
bullet<?php echo $i;?>.circle.fill = am4core.color("#000");
bullet<?php echo $i;?>.tooltipText = "{highValueg}\n[bold font-size: 10]{valueY}[/]\n{highValueY}\n{highValueZ}";
bullet<?php echo $i;?>.fillOpacity = 0;
  bullet<?php echo $i;?>.strokeOpacity = 0;
/* bullet<?php echo $i;?>.events.on("hit", function(ev) {
	var item = ev.target.dataItem.component.tooltipDataItem.dataContext;
  alert("Clicked on " + ev.target.dataItem.highValueY + ": " + ev.target.dataItem.highValueZ);
});
 */
var bulletState = bullet<?php echo $i;?>.states.create("hover");
  bulletState.properties.fillOpacity = 1;
  bulletState.properties.strokeOpacity = 1;


<?php 
$i++;
} ?>

/* var series4 = chart.series.push(new am4charts.LineSeries());
series4.dataFields.valueY = "market2";
series4.dataFields.categoryX  = "day";
series4.name = "Market Days ALL";
series4.strokeWidth = 2;
series4.tensionX = 0.7;
series4.yAxis = valueAxis2;
series4.tooltipText = "{name}\n[bold font-size: 20]{valueY}[/]";
series4.stroke = chart.colors.getIndex(0).lighten(0.5);
series4.strokeDasharray = "3,3";

var bullet4 = series4.bullets.push(new am4charts.CircleBullet());
bullet4.circle.radius = 3;
bullet4.circle.strokeWidth = 2;
bullet4.circle.fill = am4core.color("#fff");

var series5 = chart.series.push(new am4charts.LineSeries());
series5.dataFields.valueY = "market3";
series5.dataFields.categoryX  = "day";
series5.name = "Market Days ALL";
series5.strokeWidth = 2;
series5.tensionX = 0.7;
series5.yAxis = valueAxis2;
series5.tooltipText = "{name}\n[bold font-size: 20]{valueY}[/]";
series5.stroke = chart.colors.getIndex(0).lighten(0.5);
series5.strokeDasharray = "3,3";

var bullet5 = series5.bullets.push(new am4charts.CircleBullet());
bullet5.circle.radius = 3;
bullet5.circle.strokeWidth = 2;
bullet5.circle.fill = am4core.color("#000"); */

// Add cursor
chart.cursor = new am4charts.XYCursor();

// Add legend
chart.legend = new am4charts.Legend();
chart.legend.position = "top";

// Add scrollbar
chart.scrollbarX = new am4charts.XYChartScrollbar();
//chart.scrollbarX.series.push(series1);
<?php
$j=0;
foreach ($sec as $sectors) {

	?>
chart.scrollbarX.series.push(series<?php echo $j;?>);
<?php 
$j++;
} ?>
chart.scrollbarX.parent = chart.bottomAxesContainer;

}); // end am4core.ready()
</script>

<!-- HTML -->
<div id="chartdiv"></div>