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
	word-break: break-all;
}
   
DIV.table .tr:nth-child(even) {
background: rgba(0, 0, 0, 0.05);
}
input.form-control.st.ui-autocomplete-input {
    width: 200px;
}
.ui-autocomplete{
	max-height:150px;
	overflow:hidden;
	font-size:14px;
}
    #lightbox #content{
		
    display: table-cell;
    vertical-align: middle;
    width: 100%;

	}
	#lightbox {
      position:fixed; /* keeps the lightbox window in the current viewport */
      top:50px; 
      left:0; 
      width:100%; 
      height:100%; 
      background:url(https://assets.codepen.io/210284/overlay.png) repeat; 
      text-align:center;
	  overflow:scroll;
	  padding-bottom:20px;
	  display:table;
    } 
    #lightbox p {
      text-align:right; 
      color:#fff; 
      margin-right:20px; 
      font-size:12px; 
    }
    #lightbox img {
      box-shadow:0 0 25px #111;
      max-width:440px;
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
}div label input {
   margin-right:100px;
}
.cat{
  margin: 4px;
     background-color: #c9cdd1;
  border-radius: 4px;
  border: 1px solid #fff;
  overflow: hidden;
  float: left;
}

.cat label {
  float: left; line-height: 2.0em;
  width: 4.0em; 
  margin-bottom:0px;
}

.cat label span {
  text-align: center;
  padding: 3px 0;
  display: block;
}

.cat label input {
  position: absolute;
  display: none;
  color: #fff !important;
}
/* selects all of the text within the input element and changes the color of the text */
.cat label input + span{color: #fff;}


/* This will declare how a selected input will look giving generic properties */
.cat input:checked + span {
    color: #ffffff;
    text-shadow: 0 0  6px rgba(0, 0, 0, 0.8);
}


/*
This following statements selects each category individually that contains an input element that is a checkbox and is checked (or selected) and chabges the background color of the span element.
*/

.action input:checked + span{background-color: #F75A1B;}
.comedy input:checked + span{background-color: #1BB8F7;}


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
				  <ul>
				  <li style="display:inline-block;margin-right:20px;">All Records</li>
				  <li style="display:inline-block;margin-right:20px;">Usefull</li>
				  </ul>
                   <div class="table">
    <div class="tr">
        <span class="td"><strong>Message</strong></span>
	
        <span class="td"><strong>Stock</strong></span>
		<span class="td"></span>
		<span class="td"></span>
		<span class="td"></span>
    </div>
<div class="add">
</div>
<div id="pagination">
</div>
   <?php 
  //print_r($stock_data);
 // exit;
 $ci =& get_instance();
$ci->load->model('Market_model');
 $i=0;
//$ssd= $ci->Market_model->delete_stock_suggest_data();
   foreach ($stock_data as $stocks_d) { 
   //print_r($stocks_d);
$sd= $ci->Market_model->stock_suggest_data($stocks_d['id']);
  
 //print_r($sd);
   ?>
	<div class=" tr">
        <span class="td"><div class="date_persone">
                             <span class="persone_name"><?php echo $stocks_d['trader_name'];?></span><span class="date"><?php echo $stocks_d['message_timestamp'];?></span></div>
							 <?php echo $stocks_d['message_content'];?><br/><img src="<?php echo $stocks_d['img_url']?>" style="width:200px;"/><?php if($stocks_d['img_url']  ) { ?> <a href="<?php echo $stocks_d['img_url']?>" class="lightbox_trigger"> Full Screen</a><?php } ?></span>
							
							 <span class="cc<?php echo $i; ?>">
							 <?php 
							 if($sd) {
								 
							 foreach ($sd as $fprm_data) {
								 
								 ?> 
							 <form method="post" class="maket_form cform<?php echo $i; ?> edit<?php echo $fprm_data['id']; ?>">
   <span class="td"><input type="text" class="form-control st" id="" placeholder="Stock" name="stock" <?php if($fprm_data['symbol']){ ?> value="<?php echo $fprm_data['symbol']; ?>" readonly <?php } ?>><input type="hidden" name="persone_name" value="<?php echo $stocks_d['trader_name'];?>"><input type="hidden" name="id" value="<?php echo $stocks_d['id'];?>"><input type="hidden" name="sid" value="<?php echo $fprm_data['id'];?>"></span>
		 <span class="td ck">
				<div class="cat action">
   <label>
      <input type="checkbox" name="bearish" value="1" <?php if($fprm_data['bearish']) {?> checked <?php } ?>><span>bearish</span>
   </label>
   </div>
							 </span>
							  <span class="td ck">
							  <input type="text" class="form-control st" id="" placeholder="Notes" name="notes" <?php if($fprm_data['notes']){ ?> value="<?php echo $fprm_data['notes']; ?>" readonly <?php } ?>/>
							  </span>
        <span class="td submit_span">
	
		<?php if($fprm_data['submitted']  ) {
            if($fprm_data['approved'] == 1) { echo "Approved"; } else { echo "DisApproved";  }?> <button type="button" class="btn btn-success mr-2" id="btnEdit<?php echo $i; ?>" onClick="edit_click(this.id,'edit<?php echo $fprm_data['id']; ?>','cc<?php echo $fprm_data['id']; ?>')">Edit</button> <?php } else { ?>
		<input type="submit" class="btn btn-success mr-2" value="submit">
		<?php } ?>
		</span>
	</form>
							 <?php } } else { ?>
								 <form method="post" class="maket_form cform<?php echo $i; ?> ">
   <span class="td"><input type="text" class="form-control st" id="" placeholder="Stock" name="stock" <?php if($stocks_d['symbol']){ ?> value="<?php echo $stocks_d['symbol']; ?>"  <?php } ?>><input type="hidden" name="persone_name" value="<?php echo $stocks_d['trader_name'];?>"><input type="hidden" name="id" value="<?php echo $stocks_d['id'];?>"></span>
		 <span class="td ck">
					<div class="cat action">
   <label>
      <input type="checkbox" name="bearish" value="1"><span>bearish</span>
   </label>
   </div>
							 </span>
							 <span class="td ck">
							  <input type="text" class="form-control st" id="" placeholder="Notes" name="notes" <?php if($stocks_d['notes']){ ?> value="<?php echo $stocks_d['symbol']; ?>"  <?php } ?>/>
							  </span>
        <span class="td submit_span">
	
		<input type="submit" class="btn btn-success mr-2" value="submit">
		
		</span>
	</form>
							<?php }?>
	</span>
	
	<button type="button" id="btnAdd<?php echo $i; ?>" onClick="reply_click(this.id,'cform<?php echo $i; ?>','cc<?php echo $i; ?>')">Copy</button>
	</div>
   <?php $i++; } ?>

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
<?php echo $pagination;?>
                   
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
	// $(document).ready(function(){
        // jQuery(".maket_form").submit(function(event) {
//jQuery('.maket_form').on('submit', function(event) {
$(document).on("submit",".maket_form",function(event){
		
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
		  return false;
            });
         //   });
          
	</script>
	<script>
 $( function() {
    var availableTags = <?php echo  $stock;?>;
    $( ".st" ).autocomplete({
      source: availableTags,
	  minLength: 1
    });
	 $.ui.autocomplete.filter = function (array, term) {
        var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(term), "i");
        return $.grep(array, function (value) {
            return matcher.test(value.label || value.value || value);
        });
    };
  } );
  $(document).ready(function(){
	var availableTags = <?php echo  $stock;?>;
    $( ".st" ).autocomplete({
      source: availableTags,
	  minLength: 1
    });
	 $.ui.autocomplete.filter = function (array, term) {
        var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(term), "i");
        return $.grep(array, function (value) {
            return matcher.test(value.label || value.value || value);
        });
    };  
});
 /*    $(document).ready(function(){
 
     $('#pagination').on('click','a',function(e){
       e.preventDefault(); 
        $('#postsList tbody').html('<img alt="male" src="https://www.houjitech.com/images/tenor.gif">');
       var pageno = $(this).attr('data-ci-pagination-page');
       loadPagination(pageno);
     });
 
     loadPagination(0);
 
     function loadPagination(pagno){
       $.ajax({
         url: '/index.php/Market/mdata/'+pagno,
         type: 'get',
         dataType: 'json',
         success: function(response){
            $('#pagination').html(response.pagination);
            createTable(response.stock_data);
         } 
       });
     }
 
     function createTable(result){
         //console.log(result[0].id);
      // sno = Number(sno);
       $('#postsList tbody').empty();
       
       for ( var i = 0, l = result.length; i < l; i++ ) {
          // console.log(index);
          // console.log(result[i].id);
          var id = result[i].id;
          var msg = result[i].message_content;
          var msg_time = result[i].message_timestamp;
          var trader_name = result[i].trader_name;
          var symbol = result[i].symbol;
         // sno+=1;
 
          var tr = "<form method='post' class='maket_form tr'><span class='td'><div class='date_persone'><span class='persone_name'>"+trader_name+"</span><span class='date'>"+msg_time+"</span></div>"+msg+"</span><span class='td'><input type='text' class='form-control st' id='' placeholder='Stock' name='stock'><input type='hidden' name='persone_name' value='"+trader_name+"'></span><span class='td'><input type='submit' class='btn btn-success mr-2' value='submit'></span></form>";
        //  tr += "<td>"+ sno +"</td>";
        //  tr += "<td><a href='"+ link +"' target='_blank' >"+ title +"</a></td>";
        //  tr += "</tr>";
          $('.add').append(tr);
  
       }
      }
      
       $('#paginationsecond').on('click','a',function(e){
       e.preventDefault(); 
        $('#postsListsecond tbody').html('<img alt="male" src="https://www.houjitech.com/images/tenor.gif">');
       var pageno = $(this).attr('data-ci-pagination-page');
       loadPaginationsecond(pageno);
     });

 

    });*/
	jQuery(document).ready(function($) {
  
  $('.lightbox_trigger').click(function(e) {
    
    //prevent default action (hyperlink)
    e.preventDefault();
    
    //Get clicked link href
    var image_href = $(this).attr("href");
    
    /*  
    If the lightbox window HTML already exists in document, 
    change the img src to to match the href of whatever link was clicked
    
    If the lightbox window HTML doesn't exists, create it and insert it.
    (This will only happen the first time around)
    */
    
    if ($('#lightbox').length > 0) { // #lightbox exists
      
      //place href as img src value
      $('#content').html('<img src="' + image_href + '" />');
        
      //show lightbox window - you could use .show('fast') for a transition
      $('#lightbox').show();
    }
    
    else { //#lightbox does not exist - create and insert (runs 1st time only)
      
      //create HTML markup for lightbox window
      var lightbox = 
      '<div id="lightbox">'  +
        '<div id="content">' + //insert clicked link's href into img src
          '<img src="' + image_href +'" />' +
        '</div>' +  
      '</div>';
        
      //insert lightbox HTML into page
      $('body').append(lightbox);
    }
    
  });
  
  //Click anywhere on the page to get rid of lightbox window
  $('body').on('click', '#lightbox', function() { //must use on, as the lightbox element is inserted into the DOM
    $('#lightbox').hide();
  });

});
/*  $(document).ready(function () {
     $('#btnAdd').click(function () {

             first_row = $('.cform');
         first_row.clone().appendTo('.cc');
     })
     }) */
	  function reply_click(clicked_id,formid,divid)
  {
        first_row = $('.'+formid+':last');
		var num = parseInt( first_row.prop("class").match(/\d+/g), 10 ) +1;
		
		
         first_row.clone().prop('class', 'maket_form cform_'+num ).appendTo('.'+divid); 
		 
         first_rows = $('.cform_'+num);
		 
		 first_rows.find('.st').attr("readonly", false);  // works
		 first_rows.find('.submit_span').html("");  // works
		 first_rows.find("input[type='hidden'][name='sid']").remove();
		 first_rows.find("input[type='checkbox'][name='bearish']").attr("checked", false);
		 first_rows.find('.submit_span').html('<input type="submit" class="btn btn-success mr-2" value="submit">');  // works

		  initialise();
  }
  function edit_click(clicked_id,formid,divid)
  {
        first_row = $('.'+formid);
		/* var num = parseInt( first_row.prop("class").match(/\d+/g), 10 ) +1;
		
		
         first_row.clone().prop('class', 'maket_form cform_'+num ).appendTo('.'+divid); 
		 
         first_rows = $('.cform_'+num); */
		 
		 first_row.find('.st').attr("readonly", false);  // works
		 first_row.find('.submit_span').html("");  // works
		 first_row.find('.submit_span').html('<input type="submit" class="btn btn-success mr-2" value="Update">');  // works

		  initialise();
  }
  function initialise(){
     var availableTags = <?php echo  $stock;?>;
    $( ".st" ).autocomplete({
      source: availableTags,
	  minLength: 1
    });
	 $.ui.autocomplete.filter = function (array, term) {
        var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(term), "i");
        return $.grep(array, function (value) {
            return matcher.test(value.label || value.value || value);
        });
    };
};
  </script>
  </body>
</html>