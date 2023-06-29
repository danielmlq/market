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

}
	public function index()
	{
		$data['stock_data'] = $this->market_data->stock_data();
		$data['stock']=$this->market_data->stock_name();
		//print_r($data['stock_data']);
		//exit;
		$this->load->view('market',$data);
	}
	public function market_data()
	{
		$response = $this->market_data->hj_bl();
	  echo $response;
	}
}