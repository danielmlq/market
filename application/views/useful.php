<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Market Admin</title>

    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style2.css">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 

    <!-- End Layout styles -->
    <style>
DIV.table 
{
    display:table;
	width:100%;
}
FORM.tr, DIV.tr
{
    display:table-row;
}
SPAN.td
{
    display:table-cell;
	vertical-align: middle;
    font-size: 0.875rem;
    line-height: 1;
    height: 35px;
    padding: 12px 15px;
}
   
DIV.table .tr:nth-child(even) {
background: rgba(0, 0, 0, 0.05);
}
.ui-autocomplete{
	max-height:150px;
	overflow:hidden;
	font-size:14px;
}
@media screen and (max-width: 549px){
.content-wrapper{
    padding: 1.5rem 0.8rem;

}
.card .card-body {
    padding: 1.0rem 0.8rem;
}
SPAN.td {
    padding: 12px 5px;
}
.persone_name {
    display: block;
}
.form-control {

    padding: 0 .40rem;
font-size: 0.70rem;
}
}
</style>
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
          <a class="navbar-brand brand-logo" href="../../index.html">
            <img src="../../assets/images/logo.svg" alt="logo" /> </a>
          <a class="navbar-brand brand-logo-mini" href="../../index.html">
            <img src="../../assets/images/logo-mini.svg" alt="logo" /> </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
          <ul class="navbar-nav">
            <li class="nav-item font-weight-semibold d-none d-lg-block">Help : +050 2992 709</li>
           
          </ul>
          <form class="ml-auto search-form d-none d-md-block" action="#">
            <div class="form-group">
              <input type="search" class="form-control" placeholder="Search Here">
            </div>
          </form>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle" src="../../assets/images/faces/face8.jpg" alt="Profile image"> </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="../../assets/images/faces/face8.jpg" alt="Profile image">
                  <p class="mb-1 mt-3 font-weight-semibold">Allen Moreno</p>
                  <p class="font-weight-light text-muted mb-0">allenmoreno@gmail.com</p>
                </div>
                <a class="dropdown-item">My Profile <span class="badge badge-pill badge-danger">1</span><i class="dropdown-item-icon ti-dashboard"></i></a>
                <a class="dropdown-item">Messages<i class="dropdown-item-icon ti-comment-alt"></i></a>
                <a class="dropdown-item">Activity<i class="dropdown-item-icon ti-location-arrow"></i></a>
                <a class="dropdown-item">FAQ<i class="dropdown-item-icon ti-help-alt"></i></a>
                <a class="dropdown-item">Sign Out<i class="dropdown-item-icon ti-power-off"></i></a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        
        <!-- partial -->
        <div class="main-panel" style="width:100%;">
          <div class="content-wrapper">
            <div class="row">
              
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
				  	  <div class="row">
				  <div class="col-lg-3  stretch-card">
				  <ul>
				  <li style="display:inline-block;margin-right:20px;"><a href="#">All Records</a></li>
				  <li style="display:inline-block;margin-right:20px;"><a href="#">Usefull</a></li>
				  </ul>
				  </div> 
				  <div class="col-lg-5 stretch-card">
				  <ul>
				  <li style="display:inline-block;margin-right:20px;"><input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="date"/></li>
				  <li style="display:inline-block;margin-right:20px;"><input class="form-control" id="date2" name="date2" placeholder="MM/DD/YYY" type="date"/></li> 
				  <li style="display:inline-block;margin-right:20px;"><input type="submit" class="btn btn-success mr-2 datesearch" value="submit"> </li>
				  </ul>
				  </div>
				  <div class="col-lg-4 stretch-card">
				    <h5>Search By Approved</h5>
				  <label class="switch">
  <input type="checkbox" id="switch">
  <span class="slider round"></span>
</label>
				  
				  </div>
				  </div>
                   <div class="table">
    <div class="tr">
        <span class="td"><strong>Message</strong></span>
        <span class="td"><strong>Stock</strong></span>
		<span class="td"></span>
    </div>
   <?php 
  // echo "<pre>";
  // print_r($stock_data);
  // exit;
   foreach ($stock_data as $stocks_d) { 
   //print_r($stocks_d);
   ?>
	<form method="post" class="maket_form tr">
        <span class="td"><div class="date_persone">
                             <span class="persone_name"><?php echo $stocks_d['trader_name'];?></span><span class="date"><?php echo $stocks_d['message_timestamp'];?></span></div>
							 <?php echo $stocks_d['message_content'];?></span>
   <span class="td"><input type="text" class="form-control st" id="" placeholder="Stock" name="stock" <?php if($stocks_d['symbol']){ ?> value="<?php echo $stocks_d['symbol']; ?>" readonly <?php } ?>><input type="hidden" name="persone_name" value="<?php echo $stocks_d['trader_name'];?>"><input type="hidden" name="id" value="<?php echo $stocks_d['id'];?>"></span>
		
        <span class="td submit_span">
		<?php if($stocks_d['submitted']  ) {
            if($stocks_d['approved'] == 1) { echo "Approved"; } else { echo "DisApproved";  } } else { ?>
		<input type="submit" class="btn btn-success mr-2" value="submit">
		<?php } ?>
		</span>
	</form>
   <?php } ?>
	<!--<form method="post" class="maket_form tr">
        <span class="td"><div class="date_persone">
                             <span class="persone_name">一起赚钱</span><span class="date">21-03-2021 12:12:12</span></div>
							 NNDM NNDM NNDM NNDM NNDM NNDM NNDM NNDM NNDM NNDM </span>
    <span class="td"><input type="text" class="form-control st" id="" placeholder="Stock" name="stock"><input type="hidden" name="persone_name" value="一起赚钱"></span>
		
        <span class="td"><input type="submit" class="btn btn-success mr-2" value="submit"></span>
	</form>
	<form method="post" class="maket_form tr">
        <span class="td"><div class="date_persone">
                             <span class="persone_name">NaNa说美股</span><span class="date">21-03-2021 12:12:12</span></div>
							 OCGN OCGN OCGN OCGN OCGN OCGN OCGN OCGN OCGN OCGN OCGN OCGN </span>
        <span class="td"><input type="text" class="form-control st" id="" placeholder="Stock" name="stock"><input type="hidden" name="persone_name" value="NaNa说美股"></span>
		
        <span class="td"><input type="submit" class="btn btn-success mr-2" value="submit"></span>
	</form>
	<form method="post" class="maket_form tr">
        <span class="td"><div class="date_persone">
                             <span class="persone_name">贝拉聊财金</span><span class="date">21-03-2021 12:12:12</span></div>
							 CRM CRM CRM CRM CRM CRM CRM CRM CRM CRM CRM CRM </span>
        <span class="td"><input type="text" class="form-control st" id="" placeholder="Stock" name="stock"><input type="hidden" name="persone_name" value="贝拉聊财金"></span>
		
        <span class="td"><input type="submit" class="btn btn-success mr-2" value="submit"></span>
	</form>
	<form method="post" class="maket_form tr">
        <span class="td"><div class="date_persone">
                             <span class="persone_name">投资TALK君</span><span class="date">21-03-2021 12:12:12</span></div>
							PLUG PLUG PLUG PLUG PLUG PLUG PLUG PLUG PLUG</span>
        <span class="td"><input type="text" class="form-control st" id="" placeholder="Stock" name="stock"><input type="hidden" name="persone_name" value="投资TALK君"></span>
		
        <span class="td"><input type="submit" class="btn btn-success mr-2" value="submit"></span>
	</form>
	<form method="post" class="maket_form tr">
        <span class="td"><div class="date_persone">
                             <span class="persone_name"> 视野环球财经</span><span class="date">21-03-2021 12:12:12</span></div>
							NVDA NVDA NVDA NVDA NVDA NVDA NVDA NVDA NVDA NVDA NVDA </span>
 <span class="td"><input type="text" class="form-control st" id="" placeholder="Stock" name="stock"><input type="hidden" name="persone_name" value="视野环球财经"></span>
		
        <span class="td"><input type="submit" class="btn btn-success mr-2" value="submit"></span>
	</form> -->
 
</div>
                   
                  </div>
                </div>
              </div>
            
           
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©  2021</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"></span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
	  /* attach a submit handler to the form */
            jQuery(".maket_form").submit(function(event) {

                /* stop form from submitting normally */
                event.preventDefault();

                /* get some values from elements on the page: */
                var $form = jQuery(this),
                    term = $form.find('input[name="s"]').val(),
                    url = '/index.php/Market/market_data';
					
					console.log($form);

               jQuery.ajax({
           type: "POST",
           url: url,
           data: $form.serialize(), // serializes the form's elements.
           success: function(data)
           {
			   if(data == 'Trader is not found') {
				   alert(data);
			   } else {
			   $form.find('.btn').hide();
			   $form.find('.submit_span').text(data);
			   }
               //alert(data); // show response from the php script.
           }
         });
            });
	</script>
	<script>
  $( function() {
    var availableTags = <?php echo  $stock;?>;
    $( ".st" ).autocomplete({
      source: availableTags,
	  minLength: 2
    });
	 $.ui.autocomplete.filter = function (array, term) {
        var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(term), "i");
        return $.grep(array, function (value) {
            return matcher.test(value.label || value.value || value);
        });
    };
  } );
/*    $(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var options={
        format: 'yyyy/mm/dd',
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
	  var date_input=$('input[name="date2"]'); //our date input has the name "date"
      var options={
        format: 'yyyy/mm/dd',
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    }) */
	 $('#switch').change(function() {
		// alert('yes');
		 var ap='';
        if($(this).is(":checked")) {
         ap = 'approve';   
        } else {
		 ap='';
		}
		//alert(ap);
		url = '/index.php/Market/approve_data';
		   jQuery.ajax({
           type: "POST",
           url: url,
           data: "PdtStatus="+ap, // serializes the form's elements.
           success: function(data)
           {
			   $('.table').html('');
			   $('.table').html(data);
			   //alert(data);
			  
               //alert(data); // show response from the php script.
           }
         });
        $('#textbox1').val($(this).is(':checked'));        
    });
	 jQuery(".datesearch").click(function(event) {
		var dat1 = $('input[name="date"]').val();
		 var dat2 = $('input[name="date2"]').val();
		 url = '/index.php/Market/date_search';
		   jQuery.ajax({
           type: "POST",
           url: url,
           data: "date1="+dat1+"&date2="+dat2, // serializes the form's elements.
           success: function(data)
           {
			   $('.table').html('');
			   $('.table').html(data);
			  // alert(data);
			  
               //alert(data); // show response from the php script.
           }
         });
	  });
  </script>
  </body>
</html>