<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />

	<title>Stock</title>
	
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/owl.carousel.min.css">
    <!-- Main Css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/chatstyle.css">
	

	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
	<style>
	.owl-carousel .owl-item {
    height: 70vh;
}
	.owl-dots {
		position: absolute;
    top: -15px;
	width:100%;
	text-align:center;
	margin-bottom: 20px;
	
	}	
		.owl-dots .owl-dot {
			display:inline-block;
  margin: 0px 5px;
}
.owl-dots .owl-dot button {
  background: none;
  border: none;
  padding: 0;
  color: #555555;
  font-size: 14px;
  font-weight: bold;
  cursor: pointer;
}
.owl-dots .owl-dot button:focus {
  outline: none;
}
.owl-dots .owl-dot.active button {
  color: #000000;
  font-size:24px;
}
a.videoWindow:hover{text-decoration:none}#overlay{position:absolute;top:0;left:0;z-index:51;width:100%;height:100%;background-color:#000;filter:alpha(opacity=60);-moz-opacity:.6;opacity:.6;display:none}#splashHeader{font-weight:900;font-size:4em;margin-top:150px;text-shadow:2px 2px 2px #000}div.middle-align h1#splashHeader{margin:0}h2.sectionHeader{font-size:3em;text-align:center}ul.tierCardList{font-size:1.3em}ul.tierCardList>li{list-style:none;color:#333;line-height:1.5}ul.tierCardList>li:before{font-family:"font awesome 5 free";font-weight:700;content:"\f00c";color:#588a0f;position:relative;left:-1em;margin:-10px;text-rendering:optimizeLegibility}ul.tierCardList>ul>li:before{font-family:"font awesome 5 free";font-weight:700;content:"\f061";color:#588a0f;position:relative;left:-1em;margin:-10px;text-rendering:optimizeLegibility}ul.tierCardList.initialText>li:before{margin:-7px}div.fullWidthBG{background-size:cover;background-repeat:no-repeat;background-position:top}.service-popup-video{overflow:auto}.home-page-column-4-fix h2{font-size:26px}a.close-video-modal{display:block;right:0;text-decoration:none;font-size:20px;font-weight:700;color:#000;width:100%;text-align:right;background-color:#f2f2f2;padding-right:10px;border-top-left-radius:5px;border-top-right-radius:5px}a.close-video-modal:hover{background-color:#588a0f;color:#fff}.service-popup{display:none;border:none;font-size:1.2em;left:50%;top:50%;transform:translate(-50%,-50%);background:#fff;z-index:100;width:50%;border-radius:5px;overflow:auto;position:fixed}.service-popup h2{margin-top:0}.service-popup-video{height:600px;text-align:center}.panierBleuLogo{max-width:100px}.MadeInCanadaLogo{max-width:50px}.panierBleuContainer{text-align:center;padding:5px;border-radius:5px;background-color:#fff;opacity:.8;margin:20px;width:15%;float:left}.panierBleuArrow{max-width:1600px}.panierBleuText{margin:5px;display:block}@media only screen and (max-width:767px){.service-popup{width:90%}.service-popup iframe{width:100%!important;height:auto!important}.service-popup-video{height:auto;text-align:center}}iframe.youtube-popup-video{width:100%;height:auto;min-height:565px}@media only screen and (max-width:500px){iframe.youtube-popup-video{width:100%;height:100%;min-height:350px}.service-popup h2{font-size:24px}.service-popup h3{font-size:20px}.panierBleuContainer{width:100%;margin:20px auto;padding:8px}.panierBleuArrow{max-width:80%;margin:20px auto}.panierBleuText{display:inline-block}.paddingSliderContainer{padding-bottom:5%}.paddingTopSlider{padding-top:30px}}@media only screen and (min-width:764px) and (max-width:1024px){.service-popup{width:90%}.service-popup h2{font-size:24px}.service-popup h3{font-size:20px}iframe.youtube-popup-video{width:100%;height:100%;min-height:350px}}@media(min-width:760px) and (max-width:850px){.bounce{text-align:center;width:70%}.panierBleuContainer{width:30%}}@media only screen and (max-width:1025px){div.premiumPage.full-height{padding:50px 0 0}}@media(min-width:1024px) and (max-width:1500px){.service-popup{width:70%}.bounce{width:85%}}@media(min-width:501px) and (max-width:1024px){.container{width:100%}.service-popup h2{font-size:24px}.service-popup h3{font-size:20px}iframe.youtube-popup-video{width:100%;height:100%}.service-popup-video{height:auto;text-align:center}}@media only screen and (max-width:769px){.bounce{text-align:center}div.wordcloud-container{padding:0}div.word-clouds div{padding:0}div.homepage-testimonials div.col-xs-12{padding-left:5px;padding-right:5px}div.word-clouds div.leftBorder{border-left:1px dashed #ccc}.leftBorder{border-left:0;padding:10px}}div.round-img{border-radius:50%;overflow:hidden;margin:0 auto;display:inline-block;text-align:center}div.round-img.white-border{border:5px solid #fff;box-shadow:0 0 14px 0 #999}div.backgroundSlider{background-color:#333}div.wordcloud-container{text-align:center;padding:10px}.leftBorder{border-left:1px dashed #ccc}span.word-cloud1,span.word-cloud2,span.word-cloud3,span.word-cloud4,span.word-cloud5{padding:10px;font-weight:700}span.word-cloud1,span.word-cloud1 a:link,span.word-cloud1 a:visited{font-size:1.1em;color:#67809f;font-weight:700}span.word-cloud2,span.word-cloud2 a:link,span.word-cloud2 a:visited{font-size:1.2em;color:#e08283}span.word-cloud3,span.word-cloud3 a:link,span.word-cloud3 a:visited{font-size:1.3em;color:#aea8d3}span.word-cloud4,span.word-cloud4 a:link,span.word-cloud4 a:visited{font-size:1.4em;color:#a0c963}span.word-cloud5,span.word-cloud5 a:link,span.word-cloud5 a:visited{font-size:1.5em;color:#f5ab35}.backgroundSlider,.slide-container{-webkit-transition:all 1s ease;-moz-transition:all 1s ease;-o-transition:all 1s ease;transition:all 1s ease;background-image:url(imagesrc);background-size:cover;background-repeat:no-repeat}.slide-container{background-image:url(https://www.soscuisine.com/wp-content/uploads/2017/04/menu-1-3-1.jpg);border-radius:50%}.coral{color:#e73922}.youtube_rel{position:relative}.youtube_home_video{position:absolute;top:50%;margin-top:-22px;left:50%;margin-left:-22px}.youtube_home_video img{height:44px;opacity:.8}.youtube_home_video img:hover{opacity:1}.watch_video{height:15px;color:#fff;font-size:20px;padding-top:10px}#bg-popup{display:none;background:#000;position:fixed;left:0;top:0;z-index:10;width:100%;height:100%;opacity:.5;z-index:999}@media only screen and (min-width:769px){.paddingTopSlider{padding-top:45px}}@media only screen and (min-width:600px) and (max-width:768px){.home-page-column-4-fix h2{min-height:164px}div.col-sm-12.col-md-6.mobile-hide.tablet-hide.tablet-wide-show{padding-top:50px;text-align:center}div.col-sm-12.col-md-6.mobile-hide.tablet-hide.tablet-wide-show div.middle-aligner{height:0!important}div.col-sm-12.col-md-6.mobile-hide.tablet-hide.tablet-wide-show div.round-img.white-border{width:300px;height:300px}.paddingTopSlider{padding-top:50px}}.mySlides{display:none;width:80%;height:100px;left:0}.slideshowContainer{text-align:-webkit-center}.dot{cursor:pointer;height:8px;width:8px;margin:0 2px;background-color:#bbb;border-radius:50%;display:inline-block;transition:background-color .6s ease}.dot.active{background-color:#717171}.fade{animation-name:fade;animation-duration:5s}@keyframes fade{from{opacity:.8}to{opacity:1}}



/* Popup box BEGIN */
.hover_bkgr_fricc{
    background:rgba(0,0,0,.4);
    cursor:pointer;
    display:none;
    height:100%;
    position:fixed;
    text-align:center;
    top:0;
    width:75%;
    z-index:10000;
	overflow:scroll;
}
.hover_bkgr_fricc .helper{
    display:inline-block;
    height:100%;
    vertical-align:middle;
}
.hover_bkgr_fricc > div {
    background-color: #fff;
    box-shadow: 10px 10px 60px #555;
    display: inline-block;
    height: auto;
    max-width: 551px;
    min-height: 100px;
    vertical-align: middle;
    width: 80%;
    position: relative;
    border-radius: 8px;
    padding: 15px 5%;
}
.popupCloseButton {
    background-color: #fff;
    border: 3px solid #999;
    border-radius: 50px;
    cursor: pointer;
    display: inline-block;
    font-family: arial;
    font-weight: bold;
    position: absolute;
    top: -20px;
    right: -20px;
    font-size: 25px;
    line-height: 30px;
    width: 30px;
    height: 30px;
    text-align: center;
}
.popupCloseButton:hover {
    background-color: #ccc;
}
.trigger_popup_fricc {
    cursor: pointer;

}
/* Popup box BEGIN */

.chart-box .item {
    margin-top: 10px;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
	</style>
</head>	

<body>


	<div class="main-wrapper">
		<div class="chart-wrap">
		<div class="chart-header">
		<form action="">
				<ul class="chart-date-list">
				
					<li><input type="date" id="birthday" name="start_date" value="<?php echo $_GET['start_date']; ?>"></li>
					<li><input type="date" id="birthday" name="end_date" value="<?php echo $_GET['end_date']; ?>"></li>
					<li> <input type="submit" value="Submit"></li>
				
					<!--<li class="active">Apr 15</li>
					<li>Feb</li>
					<li>Mar</li>-->
				</ul>
				</form>
				<!--<p class="text-center">Lorem ipsum is a placeholder text</p>-->
			</div>
		<div class="chart-carousel owl-carousel owl-theme">
			<?php 
							$ci =& get_instance();
$ci->load->model('Market_model');
if($_GET['start_date'] != '' && $_GET['end_date'] != '') {
	
	$rangArray = [];
	$rangArrays = [];
            
        $startDate = strtotime($_GET['start_date']);
        $endDate = strtotime($_GET['end_date']);
             
       /*  for ($currentDate = $startDate; $currentDate <= $endDate; 
                                        $currentDate += (86400)) {
                                                
            $date = date('Y-m-d', $currentDate);
            $date2 = date('M d', $currentDate);
            $rangArray[] = $date;
            $rangArray2[] = $date2;
        } */
	  //for($i=0; $i<count($rangArray); $i++){
		$stock_data=$ci->Market_model->chart_stock_data_ser($_GET['start_date'],$_GET['end_date']);  
		$stock_data_ser=$ci->Market_model->chart_stock_data_ser_count($_GET['start_date'],$_GET['end_date']);  
		//print_r($stock_data_ser);
		$total= $stock_data_ser[0]['cnt'] + $stock_data_ser[1]['cnt']; 
		$per= ($stock_data_ser[0]['cnt'] * 100)/$total; 
		$per2= ($stock_data_ser[1]['cnt'] * 100)/$total; 
	//	echo $per; 
		//echo $per2; 
 
		?>
		<div class="item" data-dot="<button></button>">
			
			
					<div class="chart-body-wrap">
						<div class="chart-body">
							<p class="text-center"></p>
							<div class="chart-box">
							<?php 
							


       // $dateArray[] = '"' . date($format, mktime(0,0,0,$m,($de-$i),$y)) . '"'; 
        





							foreach ($stock_data as $st_data) { 
							if($st_data['up_cnt'] != 0) {
							$up_per_cnt = ($st_data['up_cnt'] * 100)/ 100;
							$up_per = $up_per_cnt;	
							} else {
							$up_per = 0;	
							}
							if($st_data['down_cnt'] != 0) {
							$down_per_cnt = ($st_data['down_cnt'] * 100)/ 100;
							$down_per = $down_per_cnt;	
							} else {
							$down_per = 0;	
							}
							

							?>
								<div class="item">
									<div class="chart-line chart-line-left">
										<span style="width:<?php echo $up_per?>%; background:#e47f6d;" ><?php echo $st_data['up_cnt']; ?></span>
									</div>
									<div class="chart-label"><a href="javascript:void(0);" class="Click-carrer" title="Click to get More Info"><?php echo $st_data['symbol']; ?><em>*</em></a></div>
									<div class="chart-line chart-line-right">
										<span style="width:<?php echo $down_per?>%; background:#205e20;" ><?php echo $st_data['down_cnt']; ?></span>
									</div>
								</div>
							<?php } ?>
							<!--	<div class="item">
									<div class="chart-line chart-line-left">
										<span style="width:8%; background:#df7e6e;" >3</span>
									</div>
									<div class="chart-label">APPL</div>
									<div class="chart-line chart-line-right">
										<span style="width:90%; background:#246223;" >25</span>
									</div>
								</div>
								<div class="item">
									<div class="chart-line chart-line-left">
										<span style="width:10%; background:#da786a;" >4</span>
									</div>
									<div class="chart-label">AMZN<em>*</em></div>
									<div class="chart-line chart-line-right">
										<span style="width:85%; background:#286627;" >21</span>
									</div>
								</div>
								<div class="item">
									<div class="chart-line chart-line-left">
										<span style="width:10%; background:#d57465;" >4</span>
									</div>
									<div class="chart-label">ASML</div>
									<div class="chart-line chart-line-right">
										<span style="width:75%; background:#2c6b2d;" >20</span>
									</div>
								</div>
								<div class="item">
									<div class="chart-line chart-line-left">
										<span style="width:12%; background:#cf6d60;" >5</span>
									</div>
									<div class="chart-label">MA</div>
									<div class="chart-line chart-line-right">
										<span style="width:60%; background:#317032;" >18</span>
									</div>
								</div>
								<div class="item">
									<div class="chart-line chart-line-left">
										<span style="width:15%; background:#c86559;" >7</span>
									</div>
									<div class="chart-label">Google</div>
									<div class="chart-line chart-line-right">
										<span style="width:55%; background:#377738;" >16</span>
									</div>
								</div>
								<div class="item">
									<div class="chart-line chart-line-left">
										<span style="width:18%; background:#c36054;" >12</span>
									</div>
									<div class="chart-label">Sq</div>
									<div class="chart-line chart-line-right">
										<span style="width:50%; background:#3b7d3d;" >14</span>
									</div>
								</div>
								<div class="item">
									<div class="chart-line chart-line-left">
										<span style="width:85%; background:#780e0f;" >35</span>
									</div>
									<div class="chart-label">Ba</div>
									<div class="chart-line chart-line-right">
										<span style="width:45%; background:#438444;" >12</span>
									</div>
								</div>
								<div class="item">
									<div class="chart-line chart-line-left">
										<span style="width:55%; background:#7f1715;" >22</span>
									</div>
									<div class="chart-label">Zm</div>
									<div class="chart-line chart-line-right">
										<span style="width:40%; background:#488a4b;" >11</span>
									</div>
								</div>
								<div class="item">
									<div class="chart-line chart-line-left">
										<span style="width:65%; background:#7c1414;" >25</span>
									</div>
									<div class="chart-label">PLTR</div>
									<div class="chart-line chart-line-right">
										<span style="width:35%; background:#4e9152;" >10</span>
									</div>
								</div>
								<div class="item">
									<div class="chart-line chart-line-left">
										<span style="width:45%; background:#a6433b;" >15</span>
									</div>
									<div class="chart-label">Pton</div>
									<div class="chart-line chart-line-right">
										<span style="width:30%; background:#549858;" >8</span>
									</div>
								</div>
								<div class="item">
									<div class="chart-line chart-line-left">
										<span style="width:45%; background:#9f3b35;" >15</span>
									</div>
									<div class="chart-label">Afrm</div>
									<div class="chart-line chart-line-right">
										<span style="width:25%; background:#5a9f5f;" >5</span>
									</div>
								</div>
								<div class="item">
									<div class="chart-line chart-line-left">
										<span style="width:50%; background:#98342e;" >20</span>
									</div>
									<div class="chart-label">Arkk</div>
									<div class="chart-line chart-line-right">
										<span style="width:20%; background:#61a666;" >5</span>
									</div>
								</div>
								<div class="item">
									<div class="chart-line chart-line-left">
										<span style="width:20%; background:#b45148;" >10</span>
									</div>
									<div class="chart-label">Gld</div>
									<div class="chart-line chart-line-right">
										<span style="width:20%; background:#65ac6b;" >4</span>
									</div>
								</div>
								<div class="item">
									<div class="chart-line chart-line-left">
										<span style="width:20%; background:#b45148;" >10</span>
									</div>
									<div class="chart-label">Btc-Usd</div>
									<div class="chart-line chart-line-right">
										<span style="width:10%; background:#68b16e;" >2</span>
									</div>
								</div>
								<div class="item">
									<div class="chart-line chart-line-left">
										<span style="width:25%; background:#bc584e;" >13</span>
									</div>
									<div class="chart-label">Bidu</div>
									<div class="chart-line chart-line-right">
										<span style="width:6%; background:#7dbe83;" >1</span>
									</div>
								</div>
								<div class="item">
									<div class="chart-line chart-line-left">
										<span style="width:55%; background:#912d28;" >20</span>
									</div>
									<div class="chart-label">Brak</div>
									<div class="chart-line chart-line-right">
										<span style="width:0%; background:#205e20;" ></span>
									</div>
								</div>
								<div class="item">
									<div class="chart-line chart-line-left">
										<span style="width:65%; background:#8b2522;" >21</span>
									</div>
									<div class="chart-label">Pfe</div>
									<div class="chart-line chart-line-right">
										<span style="width:0%; background:#205e20;" ></span>
									</div>
								</div>
								<div class="item">
									<div class="chart-line chart-line-left">
										<span style="width:75%; background:#851e1c;" >23</span>
									</div>
									<div class="chart-label">Mara</div>
									<div class="chart-line chart-line-right">
										<span style="width:0%; background:#205e20;" ></span>
									</div>
								</div>-->
								<div class="item-label item-left">
									<span>short</span>
								</div>
								<div class="item-label item-right">
									<span>Long</span>
								</div>
							</div>
						</div>
						<div class="all-count-wrap count-left">
							<div class="shape-wave" style="height:<?php echo $per; ?>%;"></div>
							<span><?php echo $stock_data_ser[0]['cnt']; ?></span>
						</div>
						<div class="all-count-wrap count-right">
							<div class="shape-wave" style="height:<?php echo $per2; ?>%;"></div>
							<span><?php echo $stock_data_ser[1]['cnt']; ?></span>
						</div>
					</div>
				</div>
		
		<?php
	 // }
} else {
	
$days=10;
		$format='Y-m-d';
		$formats='M d';
		  $m = date("m"); $de= date("d"); $y= date("Y");
		 // $m = date("6"); $de= date("4"); $y= date("Y");
    $dateArray = array();
    for($i=0; $i<=$days-1; $i++){
$dates = date($format, mktime(0,0,0,$m,($de-$i),$y)) ;  
$datess = date($formats, mktime(0,0,0,$m,($de-$i),$y)) ;  
		//echo $dates;
		$stock_data=$ci->Market_model->chart_stock_data_sector($dates);
	//	print_r($stock_data);
		$stock_data_ser=$ci->Market_model->chart_stock_data_ser_count($dates,$dates);  
		//print_r($stock_data_ser);
		$total= $stock_data_ser[0]['cnt'] + $stock_data_ser[1]['cnt']; 
		$per= ($stock_data_ser[0]['cnt'] * 100)/$total; 
		$per2= ($stock_data_ser[1]['cnt'] * 100)/$total; 
  
		?>
		
				<div class="item" data-dot="<button><?php echo $datess; ?></button>">
				<div id="youtubeVideo" class="service-popup">
					<div class="service-popup-video">
						<a href="#/" class="close-video-modal">×</a>
						sdcdc
					</div>
				</div>
			


			
					<div class="chart-body-wrap">
						<div class="chart-body">
							<p class="text-center"></p>
							<div class="chart-box">
							<?php 
							 $a=0;
							 $b=200;
							foreach ($stock_data as $st_data) { 
							if($st_data['up_cnt'] != 0) {
							$up_per_cnt = ($st_data['up_cnt'] * 100)/ 100;
							$up_per = $up_per_cnt;	
							} else {
							$up_per = 0;	
							}
							if($st_data['down_cnt'] != 0) {
							$down_per_cnt = ($st_data['down_cnt'] * 100)/ 100;
							$down_per = $down_per_cnt;	
							} else {
							$down_per = 0;	
							}
							$stock_tra=$ci->Market_model->chart_trader_data_section($dates,$st_data['sector']);
							$stock_tra_two=$ci->Market_model->chart_trader_data_two_section($dates,$st_data['sector']);

							?>
								<div class="item">
									<div class="chart-line chart-line-left">
										<span style="width:<?php echo $up_per?>%; background:#e47f6d;" ><a class="trigger_popup_fricc" data-popup="pop<?php echo $a;?>"><?php echo $st_data['up_cnt']; ?></a></span>
									</div>
									<div class="chart-label"><?php echo $st_data['sector']; ?><em>*</em></div>
									<div class="chart-line chart-line-right">
										<span style="width:<?php echo $down_per?>%; background:#205e20;" ><a class="trigger_popup_fricc" data-popup="popp<?php echo $b;?>"><?php echo $st_data['down_cnt']; ?></a></span>
									</div>
									
		
								</div>
			<div class="hover_bkgr_fricc pop<?php echo $a;?>">
			
    <span class="helper"></span>
    <div>
        <div class="popupCloseButton">&times;</div>
		<div style="overflow-x:auto;">
  <table>
    <tr>
      <th>Name</th>
      <th>Message</th>
      <th>Symbol</th>
      <th>Sector</th>
      <th>Succ Per</th>
      <th>Fail Per</th>
      <th>Sector Succ Per</th>
      <th>Sector Fail Per</th>
    </tr>
	<?php 
	//print_r($stock_tra);
	foreach ($stock_tra as $trd_d) { 
	
	?>
    <tr>
      <td><a href="http://market.houjitech.com/index.php/Market/linestock?trader=<?php echo $trd_d['trader_name']; ?>"><?php echo $trd_d['trader_name']; ?></a></td>
      <td><?php echo $trd_d['message_content']; ?></td>
      <td><?php echo $trd_d['symbol']; ?></td>
      <td><?php echo $trd_d['sector']; ?></td>
      <td><?php echo $trd_d['success_percentage']; ?></td>
      <td><?php echo $trd_d['failure_percentage']; ?></td>
      <td><?php echo $trd_d['sector_success_percentage']; ?></td>
      <td><?php echo $trd_d['sector_failure_percentage']; ?></td>
    </tr>
	<?php } ?>
   
  </table>
</div>
        
    </div>
</div>	
<div class="hover_bkgr_fricc popp<?php echo $b;?>">
    <span class="helper"></span>
    <div>
        <div class="popupCloseButton">&times;</div>
		 <table>
    <tr>
       <th>Name</th>
      <th>Message</th>
      <th>Symbol</th>
      <th>Sector</th>
      <th>Succ Per</th>
      <th>Fail Per</th>
      <th>Sector Succ Per</th>
      <th>Sector Fail Per</th>
    </tr>
	<?php foreach ($stock_tra_two as $trd_dd) { 
	
	?>
    <tr>
      <td><?php echo $trd_dd['trader_name']; ?></td>
      <td><?php echo $trd_dd['report_date']; ?></td>
      <td><?php echo $trd_dd['sector']; ?></td>
      <td><?php echo $trd_dd['success_count']; ?></td>
      <td><?php echo $trd_dd['failure_count']; ?></td>
      <td><?php echo $trd_dd['success_percentage']; ?></td>
      <td><?php echo $trd_dd['failure_percentage']; ?></td>
    </tr>
	<?php } ?>
   
  </table>
      
    </div>
</div>
							<?php  $a++; 
							$b++;
							} ?>
								
							<!--	<div class="item">
									<div class="chart-line chart-line-left">
										<span style="width:8%; background:#df7e6e;" >3</span>
									</div>
									<div class="chart-label">APPL</div>
									<div class="chart-line chart-line-right">
										<span style="width:90%; background:#246223;" >25</span>
									</div>
								</div>
								<div class="item">
									<div class="chart-line chart-line-left">
										<span style="width:10%; background:#da786a;" >4</span>
									</div>
									<div class="chart-label">AMZN<em>*</em></div>
									<div class="chart-line chart-line-right">
										<span style="width:85%; background:#286627;" >21</span>
									</div>
								</div>
								<div class="item">
									<div class="chart-line chart-line-left">
										<span style="width:10%; background:#d57465;" >4</span>
									</div>
									<div class="chart-label">ASML</div>
									<div class="chart-line chart-line-right">
										<span style="width:75%; background:#2c6b2d;" >20</span>
									</div>
								</div>
								<div class="item">
									<div class="chart-line chart-line-left">
										<span style="width:12%; background:#cf6d60;" >5</span>
									</div>
									<div class="chart-label">MA</div>
									<div class="chart-line chart-line-right">
										<span style="width:60%; background:#317032;" >18</span>
									</div>
								</div>
								<div class="item">
									<div class="chart-line chart-line-left">
										<span style="width:15%; background:#c86559;" >7</span>
									</div>
									<div class="chart-label">Google</div>
									<div class="chart-line chart-line-right">
										<span style="width:55%; background:#377738;" >16</span>
									</div>
								</div>
								<div class="item">
									<div class="chart-line chart-line-left">
										<span style="width:18%; background:#c36054;" >12</span>
									</div>
									<div class="chart-label">Sq</div>
									<div class="chart-line chart-line-right">
										<span style="width:50%; background:#3b7d3d;" >14</span>
									</div>
								</div>
								<div class="item">
									<div class="chart-line chart-line-left">
										<span style="width:85%; background:#780e0f;" >35</span>
									</div>
									<div class="chart-label">Ba</div>
									<div class="chart-line chart-line-right">
										<span style="width:45%; background:#438444;" >12</span>
									</div>
								</div>
								<div class="item">
									<div class="chart-line chart-line-left">
										<span style="width:55%; background:#7f1715;" >22</span>
									</div>
									<div class="chart-label">Zm</div>
									<div class="chart-line chart-line-right">
										<span style="width:40%; background:#488a4b;" >11</span>
									</div>
								</div>
								<div class="item">
									<div class="chart-line chart-line-left">
										<span style="width:65%; background:#7c1414;" >25</span>
									</div>
									<div class="chart-label">PLTR</div>
									<div class="chart-line chart-line-right">
										<span style="width:35%; background:#4e9152;" >10</span>
									</div>
								</div>
								<div class="item">
									<div class="chart-line chart-line-left">
										<span style="width:45%; background:#a6433b;" >15</span>
									</div>
									<div class="chart-label">Pton</div>
									<div class="chart-line chart-line-right">
										<span style="width:30%; background:#549858;" >8</span>
									</div>
								</div>
								<div class="item">
									<div class="chart-line chart-line-left">
										<span style="width:45%; background:#9f3b35;" >15</span>
									</div>
									<div class="chart-label">Afrm</div>
									<div class="chart-line chart-line-right">
										<span style="width:25%; background:#5a9f5f;" >5</span>
									</div>
								</div>
								<div class="item">
									<div class="chart-line chart-line-left">
										<span style="width:50%; background:#98342e;" >20</span>
									</div>
									<div class="chart-label">Arkk</div>
									<div class="chart-line chart-line-right">
										<span style="width:20%; background:#61a666;" >5</span>
									</div>
								</div>
								<div class="item">
									<div class="chart-line chart-line-left">
										<span style="width:20%; background:#b45148;" >10</span>
									</div>
									<div class="chart-label">Gld</div>
									<div class="chart-line chart-line-right">
										<span style="width:20%; background:#65ac6b;" >4</span>
									</div>
								</div>
								<div class="item">
									<div class="chart-line chart-line-left">
										<span style="width:20%; background:#b45148;" >10</span>
									</div>
									<div class="chart-label">Btc-Usd</div>
									<div class="chart-line chart-line-right">
										<span style="width:10%; background:#68b16e;" >2</span>
									</div>
								</div>
								<div class="item">
									<div class="chart-line chart-line-left">
										<span style="width:25%; background:#bc584e;" >13</span>
									</div>
									<div class="chart-label">Bidu</div>
									<div class="chart-line chart-line-right">
										<span style="width:6%; background:#7dbe83;" >1</span>
									</div>
								</div>
								<div class="item">
									<div class="chart-line chart-line-left">
										<span style="width:55%; background:#912d28;" >20</span>
									</div>
									<div class="chart-label">Brak</div>
									<div class="chart-line chart-line-right">
										<span style="width:0%; background:#205e20;" ></span>
									</div>
								</div>
								<div class="item">
									<div class="chart-line chart-line-left">
										<span style="width:65%; background:#8b2522;" >21</span>
									</div>
									<div class="chart-label">Pfe</div>
									<div class="chart-line chart-line-right">
										<span style="width:0%; background:#205e20;" ></span>
									</div>
								</div>
								<div class="item">
									<div class="chart-line chart-line-left">
										<span style="width:75%; background:#851e1c;" >23</span>
									</div>
									<div class="chart-label">Mara</div>
									<div class="chart-line chart-line-right">
										<span style="width:0%; background:#205e20;" ></span>
									</div>
								</div>-->
								<div class="item-label item-left">
									<span>short</span>
								</div>
								<div class="item-label item-right">
									<span>Long</span>
								</div>
							</div>
						</div>
						<div class="all-count-wrap count-left">
							<div class="shape-wave" style="height:<?php echo $per; ?>%;"></div>
							<span><?php echo $stock_data_ser[0]['cnt']; ?></span>
						</div>
						<div class="all-count-wrap count-right">
							<div class="shape-wave" style="height:<?php echo $per2; ?>%;"></div>
							<span><?php echo $stock_data_ser[1]['cnt']; ?></span>
						</div>
					</div>
				</div>
				
				
	<?php } 
	
}?>
				<!--<div class="item" data-dot="<button>02</button>">
					<div class="chart-body">
						<p class="text-center">Lorem ipsum is a placeholder text commonly</p>
						<div class="chart-box">
							<div class="item">
								<div class="chart-line chart-line-left">
									<span style="width:5%; background:#e47f6d;" >2</span>
								</div>
								<div class="chart-label">TSLA<em>*</em></div>
								<div class="chart-line chart-line-right">
									<span style="width:100%; background:#205e20;" >29</span>
								</div>
							</div>
							<div class="item">
								<div class="chart-line chart-line-left">
									<span style="width:8%; background:#df7e6e;" >3</span>
								</div>
								<div class="chart-label">APPL</div>
								<div class="chart-line chart-line-right">
									<span style="width:90%; background:#246223;" >25</span>
								</div>
							</div>
							<div class="item">
								<div class="chart-line chart-line-left">
									<span style="width:10%; background:#da786a;" >4</span>
								</div>
								<div class="chart-label">AMZN<em>*</em></div>
								<div class="chart-line chart-line-right">
									<span style="width:85%; background:#286627;" >21</span>
								</div>
							</div>
							<div class="item">
								<div class="chart-line chart-line-left">
									<span style="width:10%; background:#d57465;" >4</span>
								</div>
								<div class="chart-label">ASML</div>
								<div class="chart-line chart-line-right">
									<span style="width:75%; background:#2c6b2d;" >20</span>
								</div>
							</div>
							<div class="item">
								<div class="chart-line chart-line-left">
									<span style="width:12%; background:#cf6d60;" >5</span>
								</div>
								<div class="chart-label">MA</div>
								<div class="chart-line chart-line-right">
									<span style="width:60%; background:#317032;" >18</span>
								</div>
							</div>
							<div class="item">
								<div class="chart-line chart-line-left">
									<span style="width:15%; background:#c86559;" >7</span>
								</div>
								<div class="chart-label">Google</div>
								<div class="chart-line chart-line-right">
									<span style="width:55%; background:#377738;" >16</span>
								</div>
							</div>
							<div class="item">
								<div class="chart-line chart-line-left">
									<span style="width:18%; background:#c36054;" >12</span>
								</div>
								<div class="chart-label">Sq</div>
								<div class="chart-line chart-line-right">
									<span style="width:50%; background:#3b7d3d;" >14</span>
								</div>
							</div>
							<div class="item">
								<div class="chart-line chart-line-left">
									<span style="width:85%; background:#780e0f;" >35</span>
								</div>
								<div class="chart-label">Ba</div>
								<div class="chart-line chart-line-right">
									<span style="width:45%; background:#438444;" >12</span>
								</div>
							</div>
							<div class="item">
								<div class="chart-line chart-line-left">
									<span style="width:55%; background:#7f1715;" >22</span>
								</div>
								<div class="chart-label">Zm</div>
								<div class="chart-line chart-line-right">
									<span style="width:40%; background:#488a4b;" >11</span>
								</div>
							</div>
							<div class="item">
								<div class="chart-line chart-line-left">
									<span style="width:65%; background:#7c1414;" >25</span>
								</div>
								<div class="chart-label">PLTR</div>
								<div class="chart-line chart-line-right">
									<span style="width:35%; background:#4e9152;" >10</span>
								</div>
							</div>
							<div class="item">
								<div class="chart-line chart-line-left">
									<span style="width:45%; background:#a6433b;" >15</span>
								</div>
								<div class="chart-label">Pton</div>
								<div class="chart-line chart-line-right">
									<span style="width:30%; background:#549858;" >8</span>
								</div>
							</div>
							<div class="item">
								<div class="chart-line chart-line-left">
									<span style="width:45%; background:#9f3b35;" >15</span>
								</div>
								<div class="chart-label">Afrm</div>
								<div class="chart-line chart-line-right">
									<span style="width:25%; background:#5a9f5f;" >5</span>
								</div>
							</div>
							<div class="item">
								<div class="chart-line chart-line-left">
									<span style="width:50%; background:#98342e;" >20</span>
								</div>
								<div class="chart-label">Arkk</div>
								<div class="chart-line chart-line-right">
									<span style="width:20%; background:#61a666;" >5</span>
								</div>
							</div>
							<div class="item">
								<div class="chart-line chart-line-left">
									<span style="width:20%; background:#b45148;" >10</span>
								</div>
								<div class="chart-label">Gld</div>
								<div class="chart-line chart-line-right">
									<span style="width:20%; background:#65ac6b;" >4</span>
								</div>
							</div>
							<div class="item">
								<div class="chart-line chart-line-left">
									<span style="width:20%; background:#b45148;" >10</span>
								</div>
								<div class="chart-label">Btc-Usd</div>
								<div class="chart-line chart-line-right">
									<span style="width:10%; background:#68b16e;" >2</span>
								</div>
							</div>
							<div class="item">
								<div class="chart-line chart-line-left">
									<span style="width:25%; background:#bc584e;" >13</span>
								</div>
								<div class="chart-label">Bidu</div>
								<div class="chart-line chart-line-right">
									<span style="width:6%; background:#7dbe83;" >1</span>
								</div>
							</div>
							<div class="item">
								<div class="chart-line chart-line-left">
									<span style="width:55%; background:#912d28;" >20</span>
								</div>
								<div class="chart-label">Brak</div>
								<div class="chart-line chart-line-right">
									<span style="width:0%; background:#205e20;" ></span>
								</div>
							</div>
							<div class="item">
								<div class="chart-line chart-line-left">
									<span style="width:65%; background:#8b2522;" >21</span>
								</div>
								<div class="chart-label">Pfe</div>
								<div class="chart-line chart-line-right">
									<span style="width:0%; background:#205e20;" ></span>
								</div>
							</div>
							<div class="item">
								<div class="chart-line chart-line-left">
									<span style="width:75%; background:#851e1c;" >23</span>
								</div>
								<div class="chart-label">Mara</div>
								<div class="chart-line chart-line-right">
									<span style="width:0%; background:#205e20;" ></span>
								</div>
							</div>
							<div class="item-label item-left">
								<span>Bearish</span>
							</div>
							<div class="item-label item-right">
								<span>Long</span>
							</div>
						</div>
					</div>
				</div> -->
			
			</div>
		
		</div>
	</div>	



    
	<!-- javascript -->
	<script src="<?php echo base_url(); ?>js/jquery-2.2.4.min.js"></script>
	<script src="<?php echo base_url(); ?>js/owl.carousel.min.js"></script>
	<script>
		$(document).ready(function(){
			 const owl = $('.chart-carousel')
			owl.owlCarousel({
				loop:true,
				margin:10,
				dots:true,
				 dotsData: true,
				items:1,
				nav:true
			})	
			  owl.on('changed.owl.carousel', function(e) {
				   var item      = e.item.index;
    console.log(item);
  });
	jQuery('a.videoWindow').click(function () {
			const videoPopupBox = jQuery(this).attr('data-popup');
			


			jQuery(videoPopupBox).fadeIn(0);

			jQuery('body').append('<div id="overlay"></div>');
			jQuery('#overlay').fadeIn(0); 
			return false;

		});
		jQuery('body').click('.close-video-modal, .video-modal .overlay', function () {
			jQuery('.overlay , .service-popup').fadeOut(0, function () {
				jQuery('#overlay').remove();
			});
	
		});

/*   $('.owl-carousel__next').click(function(event) {
    owl.trigger('next.owl.carousel');
	alert(event.item.index);
}) 

 $('.owl-carousel__prev').click(function() {
    owl.trigger('prev.owl.carousel');
}) */
 		
		});	

$(window).load(function () {
    $(".trigger_popup_fricc").click(function(){
		
		const videoPopupBox = jQuery(this).attr('data-popup');
		//alert(videoPopupBox);
       $('.'+videoPopupBox).show();
    });
    $('.hover_bkgr_fricc').click(function(){
        $('.hover_bkgr_fricc').hide();
    });
    $('.popupCloseButton').click(function(){
        $('.hover_bkgr_fricc').hide();
    });
});
	</script>

	
	
</body>
</html>