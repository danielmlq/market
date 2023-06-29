<!-- Styles -->
<style>
#chartdiv {
  width: 100%;
  height: 700PX;
}

</style>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
   <script src="//code.jquery.com/jquery-1.12.4.min.js"></script>
<?php 
$day_product = array();

$json = "[";
for($z=1; $z<=180; $z++) {
	 if ($z == 1) // Run this if block once.
                {
                    $json .= '{"day" : '.$z.' }';
                }
                else
                {
                    $json .= ', {"day" : '.$z.'}'; // prepend the json with a comma for each loop.
                }
}
$json .= "]";


$ci =& get_instance();
$ci->load->model('Market_model');
	$newstuff = array();	
	
  //foreach ($sec as $sectors) {
	//  print_r($sectors['sector']);
	//  echo $sectors['sector'];
	//  echo $_REQUEST['trader'];
/*$trad_sec=$ci->Market_model->sector_tader_chart($_REQUEST['trader']);

$day=1;
$array_product_sec = array(); 
$i=0;
 foreach ($trad_sec as $trader) {


if($trader['number_of_days'] == $day){

	if($day == 1){
		$array_product_sec[$i]['day']= $trader['number_of_days'];
	}
	$array_product_sec[$i][ $trader['sector']]= $trader['avg'];
   
} else {
	 $i++;
	 $array_product_sec[$i]['day']= $trader['number_of_days'];
	 $array_product_sec[$i][ $trader['sector']]= $trader['avg'];
}
$day = $trader['number_of_days'];
  }
  
$json_product_sec =  json_encode($array_product_sec);*/


$trad=$ci->Market_model->sector_tader_chart($_REQUEST['trader']);
//echo "<pre>";
//print_r($trad);
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
$json_product_sec =  json_encode($array_product);

//echo $json;



/* print_r($sec); */
/* $ci =& get_instance();
$ci->load->model('Market_model');
	$newstuff = array();	
	
  //foreach ($sec as $sectors) {
	//  print_r($sectors['sector']);
	//  echo $sectors['sector'];
	//  echo $_REQUEST['trader'];
$trad=$ci->Market_model->stock_tader_chart($_REQUEST['trader']);
// echo "<pre>";
//print_r($trad);
//exit;   
$day=1;
$array_product = array(); 
$i=0;
 foreach ($trad as $trader) {


if($trader['number_of_days'] == $day){
	$rand = str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);
$col = '#'.$rand;
	
	if($day == 1){
		$array_product[$i]['day']= $trader['number_of_days'];
	}
	$array_product[$i][ $trader['regression_id']]= $trader['win_percentage'];
	$array_product[$i]['symbol']= $trader['symbol'];
	$array_product[$i]['predict']= $trader['predict_goup'];
	$array_product[$i]['sell_price']= $trader['sell_price'];
	$array_product[$i]['color']= $col;
   
} else {
	
	 $i++;
	$rand = str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);
$col = '#'.$rand;
	 $array_product[$i]['day']= $trader['number_of_days'];
	 $array_product[$i][ $trader['regression_id']]= $trader['win_percentage'];
	 $array_product[$i][ 'symbol']= $trader['symbol'];
	 $array_product[$i][ 'predict']= $trader['predict_goup'];
	 $array_product[$i][ 'sell_price']= $trader['sell_price'];
	$array_product[$i]['color']= $col;
}
$day = $trader['number_of_days'];
  }
 // print_r($array_product);
//}  
$json_product =  json_encode($array_product); */
//echo($json_product);
/* foreach($array_product as $key=>$value)
{
	foreach ($sec as $sectors) {
		echo $sectors['sector'];
		echo $value[$sectors['sector']];
	}
 
} */
//print_r($sec);
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
//chart.data = [{"day":1},{"day":2},{"day":3},{"day":4},{"day":5},{"day":6},{"day":7},{"day":8},{"day":9},{"day":10}];
chart.data = <?php echo($json_product_sec) ?>;
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

function createSeries(field, name) {
  var series = chart.series.push(new am4charts.LineSeries());
  series.dataFields.valueY = field;
  series.dataFields.dateX = "date";
  series.name = name;
  series.strokeWidth = 3;
  
  var bullet = series.bullets.push(new am4charts.CircleBullet());
  bullet.circle.stroke = am4core.color("#fff");
  bullet.circle.strokeWidth = 2;
  
  var segment = series.segments.template;
  segment.interactionsEnabled = true;
  
  var hs = segment.states.create("hover");
  hs.properties.strokeWidth = 10;
  
  series.tooltipText = "{dateX}: {valueY}";
  series.tooltip.events.on("shown", function(ev) {
    toggleSeries(ev.target.targetSprite, true);
  });
  series.tooltip.events.on("hidden", function(ev) {
    if (ev.target.targetSprite) {
      toggleSeries(ev.target.targetSprite, false);
    }
    else {
      chart.series.each(function(series) {
        toggleSeries(series, false);
      });
    }
  });
  
  return series;
}
<? 
$color = array();
foreach ($secc as $sectors) { 
$rand = str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT); 
$col = '#'.$rand;
$name = str_replace(' ', '_', $sectors['sector']);
$color[$name] = $col;
?>
var seriess = chart.series.push(new am4charts.LineSeries());

seriess.stroke = am4core.color( <?php echo "'".$col."'"; ?>);
seriess.strokeWidth = 2;
seriess.dataFields.valueY = <?php echo "'".$sectors['sector']."'"; ?>;
seriess.dataFields.categoryX  = "day";
seriess.name = <?php echo "'".$sectors['sector']."'"; ?>;
seriess.tensionX = 0.7;
seriess.yAxis = valueAxis2;
seriess.tooltipText = "{name}\n[bold font-size: 20]{valueY}[/]";

var bullett = seriess.bullets.push(new am4charts.CircleBullet());
bullett.circle.radius = 3;
bullett.circle.strokeWidth = 2;
bullett.circle.fill = am4core.color("#000");
bullett.fillOpacity = 0;
 bullett.strokeOpacity = 0;
 var bulletStatee = bullett.states.create("hover");
  bulletStatee.properties.fillOpacity = 1;
  bulletStatee.properties.strokeOpacity = 1;
<?php } 
//print_r($color);


?>



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
chart.legend.position = "bottom";
chart.legend.maxHeight = 300;
chart.legend.scrollable = true;
var as2 = chart.legend.valueLabels.template.states.getKey("active");
as2.properties.textDecoration = "line-through";
as2.properties.fill = am4core.color("#000");


chart.legend.itemContainers.template.events.on("hit", function(ev) {
  //var seriesColumn = ev.target.dataItem.dataContext.columns.template;
 // alert("Clicked on " + ev.target.dataItem.dataContext.name);
 var tra = <?php echo  "'".$_REQUEST['trader']."'"; ?>;
 // var li= 'http://market.houjitech.com/index.php/Market/line_chart?trader='+tra+'&sec='+ev.target.dataItem.dataContext.name;
   // window.location.href='the_link_to_go_to.html';
	window.open('http://market.houjitech.com/index.php/Market/line?trader='+tra+'&sec='+ev.target.dataItem.dataContext.name+'','_blank');  
 // alert('yes');
  // jQuery.ajax({
                    // url: '<?php echo base_url();?>index.php/Market/test',
                    // type: "POST",
                    // data: "cat=testr",
                   
                    // success: function(res) {
                        // jQuery('.ajax_data_div').html('');
                        // jQuery('.ajax_data_div').html(res);
                    // }
                // }); 
});

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


//chart.cursor = new am4charts.XYCursor();

}); // end am4core.ready()


</script>

<!-- HTML -->
<div id="chartdiv"></div>