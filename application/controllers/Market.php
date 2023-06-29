<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Market extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 function __construct()
{
    parent::__construct();
$this->load->helper('url');
$this->load->model("market_model", "market_data");
  $this->load->library('pagination');

}
	public function index($rowno=0)
	{
	//	$data['stock_data'] = $this->market_data->stock_data();
		$data['stock']=$this->market_data->stock_name();
		$data['count']=$this->market_data->stock_data_count();
		//print_r($data['count']);
		$allcount = $data['count'];
		$rowperpage = 50;
		if($rowno != 0){
          $rowno = ($rowno-1) * $rowperpage;
        }
		 $data['stock_data'] = $this->market_data->stock_data_new($rowperpage,$rowno);
		 
	
		  $config['base_url'] = base_url().'/index.php/Market/index';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;
 
 
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item next"><span class="page-link">';
        $config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close']  = '</span></li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
 
        $data['pagination'] = $this->pagination->create_links();
		//print_r($data['stock_data']);
		//exit;
		$this->load->view('market',$data);
	}
	public function mdata($rowno=0)
	{
	
		 $rowperpage = 10;
 
        if($rowno != 0){
          $rowno = ($rowno-1) * $rowperpage;
        }
		
		 $allcount = 100;
		 $data['stock_data'] = $this->market_data->stock_data_new($rowperpage,$rowno);
		 
	
		  $config['base_url'] = base_url().'post/loadRecord';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;
 
 
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close']  = '</span></li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
 
        $data['pagination'] = $this->pagination->create_links();
        $data['result'] = $data['result'];
        $data['row'] = $rowno;
		echo json_encode($data);
	}
	public function useful()
	{
		
		//$data['stock_data'] = $this->market_data->tablelist();
		//exit;
		$data['stock_data'] = $this->market_data->useful_data();
		$data['stock']=$this->market_data->stock_name();
		//$data['stock']=$this->market_data->stock_name();
		$this->load->view('useful',$data);
		//$this->load->view('market',$data);
	}
	public function linestock()
	{
		//echo $_REQUEST['trader'];
		//exit;
		//$data['trad']=$this->market_data->sector_tader_chart($_REQUEST['trader']);
		$data['sec']=$this->market_data->regration_id($_REQUEST['trader']);
		$data['secc']=$this->market_data->sector_name($_REQUEST['trader']);
		//echo "<pre>";
	//print_r($data);
		$this->load->view('linestock_chart', $data);
		//$this->load->view('market',$data);
	}
	public function test()
	{
		return $_REQUEST['cat'];
		//$this->load->view('market',$data);
	}
	public function line()
	{
		//echo $_REQUEST['trader'];
		//exit;
		//$data['trad']=$this->market_data->sector_tader_chart($_REQUEST['trader']);
		$data['sec']=$this->market_data->sector_name($_REQUEST['trader']);
		//echo "<pre>";
	//print_r($data);
		$this->load->view('line_chart', $data);
		//$this->load->view('market',$data);
	}
	public function market_chart()
	{
		//$data['stock_data'] = $this->market_data->chart_stock_data();
	//	$data['stock_dataa'] = $this->market_data->chart_stock_data_new();
	//	echo "<pre>";
	//	print_r($data['stock_dataa']);
		$data['stock_data'] = '';
		$days=7;
		$format='d/m/Y';
		  $m = date("m"); $de= date("d"); $y= date("Y");
    $dateArray = array();
    for($i=0; $i<=$days-1; $i++){
       // $dateArray[] = '"' . date($format, mktime(0,0,0,$m,($de-$i),$y)) . '"'; 
        $dates = date($format, mktime(0,0,0,$m,($de-$i),$y)) ; 
    }
   
		//print_r($data['stock_data']);
		$this->load->view('market_chart',$data);
		//$this->load->view('market',$data);
	}
	public function market_chart_sector()
	{
		
		//$data['stock_data'] = $this->market_data->chart_stock_data();
	//	$data['stock_dataa'] = $this->market_data->chart_stock_data_new();
	//	echo "<pre>";
	//	print_r($data['stock_dataa']);
		$data['stock_data'] = '';
		$days=7;
		$format='d/m/Y';
		  $m = date("m"); $de= date("d"); $y= date("Y");
    $dateArray = array();
    for($i=0; $i<=$days-1; $i++){
       // $dateArray[] = '"' . date($format, mktime(0,0,0,$m,($de-$i),$y)) . '"'; 
        $dates = date($format, mktime(0,0,0,$m,($de-$i),$y)) ; 
    }
   
		//print_r($data['stock_data']);
		
		$this->load->view('market_chart_sector',$data);
		//$this->load->view('market',$data);
	}
	public function market_data()
	{
		$response = $this->market_data->hj_bl();
	  echo $response;
	}
	public function approve_data()
	{
		$apps = $_POST['PdtStatus'];
		$response = $this->market_data->approve_datas($apps);
		$tdata='<div class="tr"><span class="td"><strong>Message</strong></span><span class="td"><strong>Stock</strong></span><span class="td"></span></div>';
		 foreach ($response as $stocks_d) { 
		$tdata.='<form method="post" class="maket_form tr"><span class="td"><div class="date_persone"><span class="persone_name">'.$stocks_d['trader_name'].'</span><span class="date">'.$stocks_d['message_timestamp'].'></span></div>'.$stocks_d['message_content'].'</span><span class="td"><input type="text" class="form-control st" id="" placeholder="Stock" name="stock"><input type="hidden" name="persone_name" value="'.$stocks_d['trader_name'].'"><input type="hidden" name="id" value="'.$stocks_d['id'].'"></span><span class="td submit_span"></span></form>';
		 }
	  echo $tdata;
	}
	public function date_search()
	{
		$dat1 = $_POST['date1'];
		$datt2 = $_POST['date2'];
		//$phpdate = strtotime( $dat1 );
		//$response = $this->market_data->tablelist();
//$mysqldate = date( 'Y-m-d', $phpdate );
		 $response = $this->market_data->datesearch();
		$tdata='<div class="tr"><span class="td"><strong>Message</strong></span><span class="td"><strong>Stock</strong></span><span class="td"></span></div>';
		 foreach ($response as $stocks_d) { 
            if($stocks_d['approved'] == 1) { $ap = "Approved"; } else { $ap = "DisApproved";  } 
			if($stocks_d['symbol']){ $st= $stocks_d['symbol'];  $rd="readonly";  }
		$tdata.='<form method="post" class="maket_form tr"><span class="td"><div class="date_persone"><span class="persone_name">'.$stocks_d['trader_name'].'</span><span class="date">'.$stocks_d['message_timestamp'].'></span></div>'.$stocks_d['message_content'].'</span><span class="td"><input type="text" class="form-control st" id="" placeholder="Stock" name="stock" value='.$st.' '.$rd.'><input type="hidden" name="persone_name" value="'.$stocks_d['trader_name'].'"><input type="hidden" name="id" value="'.$stocks_d['id'].'"></span><span class="td submit_span">'.$ap.'</span></form>';
		 } 
	  echo $tdata;
	}
} 