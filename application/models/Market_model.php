<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	 
	class Market_model extends CI_Model {
	 
		
			 
		public function __construct()
		{
		   	
			parent::__construct();
			$this->load->database();
			
		}
		public function stock_name()
		{
			$array_stock = array();
			$fierst_step_queryStr = "Select symbol from stock_info";
			$qqueryy=$this->db->query($fierst_step_queryStr);
			foreach ($qqueryy->result_array() as $stock) {
				$array_stock[] = $stock['symbol'];
			}
			$myJSON = json_encode($array_stock);
		//echo $myJSON;
//exit;
			return $myJSON;
		
		
		}
		public function stock_data()
		{
		
			$fierst_step_queryStr = "Select * from real_time_suggestion order by message_timestamp DESC limit 50";
			//$fierst_step_queryStr = "Select * from real_time_suggestion order by message_timestamp DESC ";
			
			$qqueryy=$this->db->query($fierst_step_queryStr);
			//$qquery_ar_count= $qqueryy->num_rows();
			//echo $qquery_ar_count;
			//print_r($qqueryy);
			$myJSON = $qqueryy->result_array();

			return $myJSON;
		
		
		}
		public function chart_stock_data($dates)
		{
			$sdate=strval($dates);
			$edate=strval($dates);
			//$result = "Select * from real_time_suggestion where message_timestamp between TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') order by message_timestamp DESC";
			$results = "set datestyle = 'ISO, YMD'";
			$qqueryy=$this->db->query($results);
			//	$fierst_step_queryStr = "select s.symbol, s.bearish, count(1) as cnt from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') group by s.symbol, s.bearish order by s.symbol;";
			//$fierst_step_queryStr = "select s.symbol, s.bearish,  count(s.bearish=true) as cs, count(s.bearish=false) as cd from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') group by s.symbol, s.bearish order by s.symbol;";
			//$fierst_step_queryStr = "with intermediate_result as (select s.symbol, s.bearish, count(1) as cnt from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol is not null group by s.symbol, s.bearish order by s.symbol) select  case when ir1.symbol is null then ir2.symbol else ir1.symbol end as symbol, case when ir1.bearish is null then false else ir1.bearish end as up, case when ir1.cnt is null then 0 else ir1.cnt end as up_cnt, case when ir2.bearish is null then true else ir2.bearish end as down, case when ir2.cnt is null then 0 else ir2.cnt end as down_cnt from (select  from intermediate_result where bearish is false and symbol is not null) as ir1 full outer join (select from intermediate_result where bearish is true and symbol is not null) as ir2 on ir1.symbol = ir2.symbol;";
			$fierst_step_queryStr = "with intermediate_result as (select s.symbol, s.bearish, count(1) as cnt from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol is not null group by s.symbol, s.bearish order by s.symbol)
				select 
				case when ir1.symbol is null then ir2.symbol else ir1.symbol end as symbol,
				case when ir1.bearish is null then false else ir1.bearish end as up,
				case when ir1.cnt is null then 0 else ir1.cnt end as up_cnt,
				case when ir2.bearish is null then true else ir2.bearish end as down,
				case when ir2.cnt is null then 0 else ir2.cnt end as down_cnt
				from 
				(select * from intermediate_result where bearish is false and symbol is not null) ir1 
				full outer join 
				(select * from intermediate_result where bearish is true and symbol is not null) ir2 
				on ir1.symbol = ir2.symbol;";
				//$fierst_step_queryStr = "Select * from real_time_suggestion order by message_timestamp DESC ";
			
			$qqueryy=$this->db->query($fierst_step_queryStr);
			//$qquery_ar_count= $qqueryy->num_rows();
			//echo $qquery_ar_count;
			//print_r($qqueryy);
			$myJSON = $qqueryy->result_array();

			return $myJSON;
		
		
		}	
		public function chart_stock_data_sector($dates)
		{
			$sdate=strval($dates);
			$edate=strval($dates);
		//$result = "Select * from real_time_suggestion where message_timestamp between TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') order by message_timestamp DESC";
		$results = "set datestyle = 'ISO, YMD'";
		$qqueryy=$this->db->query($results);
		//	$fierst_step_queryStr = "select s.symbol, s.bearish, count(1) as cnt from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') group by s.symbol, s.bearish order by s.symbol;";
			//$fierst_step_queryStr = "select s.symbol, s.bearish,  count(s.bearish=true) as cs, count(s.bearish=false) as cd from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') group by s.symbol, s.bearish order by s.symbol;";
			//$fierst_step_queryStr = "with intermediate_result as (select s.symbol, s.bearish, count(1) as cnt from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol is not null group by s.symbol, s.bearish order by s.symbol) select  case when ir1.symbol is null then ir2.symbol else ir1.symbol end as symbol, case when ir1.bearish is null then false else ir1.bearish end as up, case when ir1.cnt is null then 0 else ir1.cnt end as up_cnt, case when ir2.bearish is null then true else ir2.bearish end as down, case when ir2.cnt is null then 0 else ir2.cnt end as down_cnt from (select  from intermediate_result where bearish is false and symbol is not null) as ir1 full outer join (select from intermediate_result where bearish is true and symbol is not null) as ir2 on ir1.symbol = ir2.symbol;";
		$fierst_step_queryStr = "with intermediate_result as (select s2.sector, s.bearish, count(1) as cnt from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id left outer join stock_info s2 on s.symbol = s2.symbol where TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol is not null group by s2.sector, s.bearish order by s2.sector)
			select 
			case when ir1.sector is null then ir2.sector else ir1.sector end as sector,
			case when ir1.bearish is null then false else ir1.bearish end as up,
			case when ir1.cnt is null then 0 else ir1.cnt end as up_cnt,
			case when ir2.bearish is null then true else ir2.bearish end as down,
			case when ir2.cnt is null then 0 else ir2.cnt end as down_cnt
			from 
			(select * from intermediate_result where bearish is false and sector is not null) ir1 
			full outer join 
			(select * from intermediate_result where bearish is true and sector is not null) ir2 
			on ir1.sector = ir2.sector;";
		//$fierst_step_queryStr = "Select * from real_time_suggestion order by message_timestamp DESC ";
		
		$qqueryy=$this->db->query($fierst_step_queryStr);
		//$qquery_ar_count= $qqueryy->num_rows();
		//echo $qquery_ar_count;
		//print_r($qqueryy);
		$myJSON = $qqueryy->result_array();
		//print_r($myJSON);
		return $myJSON;
		
		
		}	
		public function chart_trader_data($dates,$symbol)
		{
		$sdate=strval($dates);
			$edate=strval($dates);
	//$result = "Select * from real_time_suggestion where message_timestamp between TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') order by message_timestamp DESC";
	$results = "set datestyle = 'ISO, YMD'";
	$qqueryy=$this->db->query($results);
		//	$fierst_step_queryStr = "select s.symbol, s.bearish, count(1) as cnt from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') group by s.symbol, s.bearish order by s.symbol;";
			//$fierst_step_queryStr = "select s.symbol, s.bearish,  count(s.bearish=true) as cs, count(s.bearish=false) as cd from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') group by s.symbol, s.bearish order by s.symbol;";
			//$fierst_step_queryStr = "with intermediate_result as (select s.symbol, s.bearish, count(1) as cnt from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol is not null group by s.symbol, s.bearish order by s.symbol) select  case when ir1.symbol is null then ir2.symbol else ir1.symbol end as symbol, case when ir1.bearish is null then false else ir1.bearish end as up, case when ir1.cnt is null then 0 else ir1.cnt end as up_cnt, case when ir2.bearish is null then true else ir2.bearish end as down, case when ir2.cnt is null then 0 else ir2.cnt end as down_cnt from (select  from intermediate_result where bearish is false and symbol is not null) as ir1 full outer join (select from intermediate_result where bearish is true and symbol is not null) as ir2 on ir1.symbol = ir2.symbol;";

/* $fierst_step_queryStr = "select t.trader_name, r.report_date, 'All' as sector, r.success_count, r.failure_count, r.success_percentage, r.failure_percentage from regression_statistics_by_trader2 r left join trader_info t on r.trader_id = t.trader_id where t.trader_name in (select distinct trader_name from suggestions_ref s left join real_time_suggestion r on r.id = s.rt_suggestion_id where submitted is true and bearish is false and TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol = '$symbol')
union all
select t.trader_name, r.report_date, r.sector, r.success_count, r.failure_count, r.success_percentage, r.failure_percentage from regression_statistics_by_sector2 r left join trader_info t on r.trader_id = t.trader_id where t.trader_name in (select distinct trader_name from suggestions_ref s left join real_time_suggestion r on r.id = s.rt_suggestion_id where submitted is true and bearish is false and TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol = '$symbol')
order by trader_name, sector;"; */

/*$fierst_step_queryStr ="select t.trader_name, r.report_date, 'All' as sector, r.success_count, r.failure_count, r.success_percentage, r.failure_percentage from regression_statistics_by_trader2 r left join trader_info t on r.trader_id = t.trader_id where t.trader_name in (select distinct trader_name from suggestions_ref s left join real_time_suggestion r on r.id = s.rt_suggestion_id where submitted is true and bearish is false  and TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol = '$symbol')
union all
select t.trader_name, r.report_date, r.sector, r.success_count, r.failure_count, r.success_percentage, r.failure_percentage from regression_statistics_by_sector2 r left join trader_info t on r.trader_id = t.trader_id where t.trader_name in (select distinct trader_name from suggestions_ref s left join real_time_suggestion r on r.id = s.rt_suggestion_id where submitted is true and bearish is false  and TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol = '$symbol')
order by trader_name, sector;";*/
/*$fierst_step_queryStr ="select t.trader_name, r.report_date, 'All' as sector, r.success_count, r.failure_count, r.success_percentage, r.failure_percentage from regression_statistics_by_trader2 r left join trader_info t on r.trader_id = t.trader_id where t.trader_name in (select distinct trader_name from suggestions_ref s left join real_time_suggestion r on r.id = s.rt_suggestion_id where submitted is true and bearish is false  and TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol = '$symbol')
union all
select t.trader_name, r.report_date, r.sector, r.success_count, r.failure_count, r.success_percentage, r.failure_percentage from regression_statistics_by_sector2 r left join trader_info t on r.trader_id = t.trader_id where t.trader_name in (select distinct trader_name from suggestions_ref s left join real_time_suggestion r on r.id = s.rt_suggestion_id where submitted is true and bearish is false  and TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol = '$symbol')
order by trader_name, sector;";*/

$fierst_step_queryStr ="select r.trader_name, r.message_content, s.symbol, s.bearish, st.sector, rpt.success_percentage, rpt.failure_percentage, rpt.sector_success_percentage, rpt.sector_failure_percentage from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id left join stock_info st on s.symbol = st.symbol left join trader_info t on r.author_id = t.author_id left join 
(with rpt1 as (select * from regression_statistics_by_trader2 where report_date = (select max(report_date) from regression_statistics_by_trader2)),rpt2 as (select * from regression_statistics_by_sector2 where report_date = (select max(report_date) from regression_statistics_by_sector2) and sector = (select sector from stock_info where symbol = '$symbol'))
select rpt1.trader_id, rpt1.success_percentage, rpt1.failure_percentage, rpt2.sector, rpt2.success_percentage as sector_success_percentage, rpt2.failure_percentage as sector_failure_percentage from rpt1 left join rpt2 on rpt1.trader_id = rpt2.trader_id) as rpt on t.trader_id = rpt.trader_id where r.author_id is not null and TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol ='$symbol' and s.bearish is false";
			//$fierst_step_queryStr = "Select * from real_time_suggestion order by message_timestamp DESC ";
			
		$qqueryy=$this->db->query($fierst_step_queryStr);
			//$qquery_ar_count= $qqueryy->num_rows();
			//echo $qquery_ar_count;
		//print_r($qqueryy);
		$myJSON = $qqueryy->result_array();

	return $myJSON;
		
		
		}	
		public function chart_trader_data_search($sdate,$edate,$symbol)
		{
			$sdate=strval($sdate);
			$edate=strval($edate);

	//$result = "Select * from real_time_suggestion where message_timestamp between TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') order by message_timestamp DESC";

			$results = "set datestyle = 'ISO, YMD'";
			$qqueryy=$this->db->query($results);

	//	$fierst_step_queryStr = "select s.symbol, s.bearish, count(1) as cnt from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') group by s.symbol, s.bearish order by s.symbol;";
	//$fierst_step_queryStr = "select s.symbol, s.bearish,  count(s.bearish=true) as cs, count(s.bearish=false) as cd from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') group by s.symbol, s.bearish order by s.symbol;";
	//$fierst_step_queryStr = "with intermediate_result as (select s.symbol, s.bearish, count(1) as cnt from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol is not null group by s.symbol, s.bearish order by s.symbol) select  case when ir1.symbol is null then ir2.symbol else ir1.symbol end as symbol, case when ir1.bearish is null then false else ir1.bearish end as up, case when ir1.cnt is null then 0 else ir1.cnt end as up_cnt, case when ir2.bearish is null then true else ir2.bearish end as down, case when ir2.cnt is null then 0 else ir2.cnt end as down_cnt from (select  from intermediate_result where bearish is false and symbol is not null) as ir1 full outer join (select from intermediate_result where bearish is true and symbol is not null) as ir2 on ir1.symbol = ir2.symbol;";

	/* $fierst_step_queryStr = "select t.trader_name, r.report_date, 'All' as sector, r.success_count, r.failure_count, r.success_percentage, r.failure_percentage from regression_statistics_by_trader2 r left join trader_info t on r.trader_id = t.trader_id where t.trader_name in (select distinct trader_name from suggestions_ref s left join real_time_suggestion r on r.id = s.rt_suggestion_id where submitted is true and bearish is false and TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol = '$symbol')
	union all
	select t.trader_name, r.report_date, r.sector, r.success_count, r.failure_count, r.success_percentage, r.failure_percentage from regression_statistics_by_sector2 r left join trader_info t on r.trader_id = t.trader_id where t.trader_name in (select distinct trader_name from suggestions_ref s left join real_time_suggestion r on r.id = s.rt_suggestion_id where submitted is true and bearish is false and TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol = '$symbol')
	order by trader_name, sector;"; */

	// $fierst_step_queryStr ="select t.trader_name, r.report_date, 'All' as sector, r.success_count, r.failure_count, r.success_percentage, r.failure_percentage from regression_statistics_by_trader2 r left join trader_info t on r.trader_id = t.trader_id where t.trader_name in (select distinct trader_name from suggestions_ref s left join real_time_suggestion r on r.id = s.rt_suggestion_id where submitted is true and bearish is false  and TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol = '$symbol')
	// union all
	// select t.trader_name, r.report_date, r.sector, r.success_count, r.failure_count, r.success_percentage, r.failure_percentage from regression_statistics_by_sector2 r left join trader_info t on r.trader_id = t.trader_id where t.trader_name in (select distinct trader_name from suggestions_ref s left join real_time_suggestion r on r.id = s.rt_suggestion_id where submitted is true and bearish is false  and TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol = '$symbol')
	// order by trader_name, sector;";

			$fierst_step_queryStr ="select r.trader_name, r.message_content, s.symbol, s.bearish, st.sector, rpt.success_percentage, rpt.failure_percentage, rpt.sector_success_percentage, rpt.sector_failure_percentage from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id left join stock_info st on s.symbol = st.symbol left join trader_info t on r.author_id = t.author_id left join
								(with rpt1 as (select * from regression_statistics_by_trader2 where report_date = (select max(report_date) from regression_statistics_by_trader2)),rpt2 as (select * from regression_statistics_by_sector2 where report_date = (select max(report_date) from regression_statistics_by_sector2) and sector = (select sector from stock_info where symbol = '$symbol'))
								select rpt1.trader_id, rpt1.success_percentage, rpt1.failure_percentage, rpt2.sector, rpt2.success_percentage as sector_success_percentage, rpt2.failure_percentage as sector_failure_percentage from rpt1 left join rpt2 on rpt1.trader_id = rpt2.trader_id) as rpt on t.trader_id = rpt.trader_id where r.author_id is not null and TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol ='$symbol' and s.bearish is false";

	//$fierst_step_queryStr = "Select * from real_time_suggestion order by message_timestamp DESC ";
			
			$qqueryy=$this->db->query($fierst_step_queryStr);

	//$qquery_ar_count= $qqueryy->num_rows();
	//echo $qquery_ar_count;
	//print_r($qqueryy);

			$myJSON = $qqueryy->result_array();

			return $myJSON;
		}
		public function chart_trader_data_section($dates,$symbol)
		{
		$sdate=strval($dates);
			$edate=strval($dates);
	//$result = "Select * from real_time_suggestion where message_timestamp between TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') order by message_timestamp DESC";
	$results = "set datestyle = 'ISO, YMD'";
	$qqueryy=$this->db->query($results);
		//	$fierst_step_queryStr = "select s.symbol, s.bearish, count(1) as cnt from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') group by s.symbol, s.bearish order by s.symbol;";
			//$fierst_step_queryStr = "select s.symbol, s.bearish,  count(s.bearish=true) as cs, count(s.bearish=false) as cd from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') group by s.symbol, s.bearish order by s.symbol;";
			//$fierst_step_queryStr = "with intermediate_result as (select s.symbol, s.bearish, count(1) as cnt from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol is not null group by s.symbol, s.bearish order by s.symbol) select  case when ir1.symbol is null then ir2.symbol else ir1.symbol end as symbol, case when ir1.bearish is null then false else ir1.bearish end as up, case when ir1.cnt is null then 0 else ir1.cnt end as up_cnt, case when ir2.bearish is null then true else ir2.bearish end as down, case when ir2.cnt is null then 0 else ir2.cnt end as down_cnt from (select  from intermediate_result where bearish is false and symbol is not null) as ir1 full outer join (select from intermediate_result where bearish is true and symbol is not null) as ir2 on ir1.symbol = ir2.symbol;";

/* $fierst_step_queryStr = "select t.trader_name, r.report_date, 'All' as sector, r.success_count, r.failure_count, r.success_percentage, r.failure_percentage from regression_statistics_by_trader2 r left join trader_info t on r.trader_id = t.trader_id where t.trader_name in (select distinct trader_name from suggestions_ref s left join real_time_suggestion r on r.id = s.rt_suggestion_id where submitted is true and bearish is false and TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol = '$symbol')
union all
select t.trader_name, r.report_date, r.sector, r.success_count, r.failure_count, r.success_percentage, r.failure_percentage from regression_statistics_by_sector2 r left join trader_info t on r.trader_id = t.trader_id where t.trader_name in (select distinct trader_name from suggestions_ref s left join real_time_suggestion r on r.id = s.rt_suggestion_id where submitted is true and bearish is false and TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol = '$symbol')
order by trader_name, sector;"; */

/* $fierst_step_queryStr ="select t.trader_name, r.report_date, 'All' as sector, r.success_count, r.failure_count, r.success_percentage, r.failure_percentage from regression_statistics_by_trader2 r left join trader_info t on r.trader_id = t.trader_id where t.trader_name in (select distinct trader_name from suggestions_ref s left join real_time_suggestion r on r.id = s.rt_suggestion_id where submitted is true and bearish is false  and TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol = '$symbol')
union all
select t.trader_name, r.report_date, r.sector, r.success_count, r.failure_count, r.success_percentage, r.failure_percentage from regression_statistics_by_sector2 r left join trader_info t on r.trader_id = t.trader_id where t.trader_name in (select distinct trader_name from suggestions_ref s left join real_time_suggestion r on r.id = s.rt_suggestion_id where submitted is true and bearish is false  and TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol = '$symbol')
order by trader_name, sector;"; */
/* $fierst_step_queryStr ="select t.trader_name, r.report_date, 'All' as sector, r.success_count, r.failure_count, r.success_percentage, r.failure_percentage from regression_statistics_by_trader2 r left join trader_info t on r.trader_id = t.trader_id where t.trader_name in (select distinct trader_name from suggestions_ref s left join real_time_suggestion r on r.id = s.rt_suggestion_id left join stock_info s2 on s.symbol = s2.symbol where submitted is true and bearish is false and TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s2.symbol  = 'Technology')
union all
select t.trader_name, r.report_date, r.sector, r.success_count, r.failure_count, r.success_percentage, r.failure_percentage from regression_statistics_by_sector2 r left join trader_info t on r.trader_id = t.trader_id where t.trader_name in (select distinct trader_name from suggestions_ref s left join real_time_suggestion r on r.id = s.rt_suggestion_id left join stock_info s2 on s.symbol = s2.symbol where submitted is true and bearish is false and TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and and s2.sector = 'Technology') order by trader_name, sector"; */

/*$fierst_step_queryStr ="select t.trader_name, r.report_date, 'All' as sector, r.success_count, r.failure_count, r.success_percentage, r.failure_percentage from regression_statistics_by_trader2 r left join trader_info t on r.trader_id = t.trader_id where t.trader_name in (select distinct trader_name from suggestions_ref s left join real_time_suggestion r on r.id = s.rt_suggestion_id left join stock_info s2 on s.symbol = s2.symbol where submitted is true and bearish is false and to_date(r.message_timestamp, 'yyyy-mm-dd') = '$sdate' and s2.symbol = '$symbol')
union all
select t.trader_name, r.report_date, r.sector, r.success_count, r.failure_count, r.success_percentage, r.failure_percentage from regression_statistics_by_sector2 r left join trader_info t on r.trader_id = t.trader_id where t.trader_name in (select distinct trader_name from suggestions_ref s left join real_time_suggestion r on r.id = s.rt_suggestion_id left join stock_info s2 on s.symbol = s2.symbol where submitted is true and bearish is false and to_date(r.message_timestamp, 'yyyy-mm-dd') = '$sdate' and s2.sector = '$symbol')
order by trader_name, sector;";*/

$fierst_step_queryStr ="select r.trader_name, r.message_content, s.bearish, st.sector, rpt.success_percentage, rpt.failure_percentage, rpt.sector_success_percentage, rpt.sector_failure_percentage from
real_time_suggestion r 
join suggestions_ref s on r.id = s.rt_suggestion_id
left join stock_info st on s.symbol = st.symbol
left join trader_info t on r.author_id = t.author_id
left join 
(with rpt1 as (select * from regression_statistics_by_trader2 where report_date = (select max(report_date) from regression_statistics_by_trader2)),
rpt2 as (select * from regression_statistics_by_sector2 where report_date = (select max(report_date) from regression_statistics_by_sector2) and sector = '$symbol')
select rpt1.trader_id, rpt1.success_percentage, rpt1.failure_percentage, rpt2.sector, rpt2.success_percentage as sector_success_percentage, rpt2.failure_percentage as sector_failure_percentage from rpt1 left join rpt2 on rpt1.trader_id = rpt2.trader_id) as rpt on t.trader_id = rpt.trader_id
where 
r.author_id is not null and
TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and 
st.sector ='$symbol' and 
s.bearish is false";

			//$fierst_step_queryStr = "Select * from real_time_suggestion order by message_timestamp DESC ";
			
		$qqueryy=$this->db->query($fierst_step_queryStr);
			//$qquery_ar_count= $qqueryy->num_rows();
			//echo $qquery_ar_count;
		//print_r($qqueryy);
		$myJSON = $qqueryy->result_array();

	return $myJSON;
		
		
		}
		public function chart_trader_data_two_section($dates,$symbol)
		{
		$sdate=strval($dates);
			$edate=strval($dates);
	//$result = "Select * from real_time_suggestion where message_timestamp between TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') order by message_timestamp DESC";
	$results = "set datestyle = 'ISO, YMD'";
	$qqueryy=$this->db->query($results);
		//	$fierst_step_queryStr = "select s.symbol, s.bearish, count(1) as cnt from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') group by s.symbol, s.bearish order by s.symbol;";
			//$fierst_step_queryStr = "select s.symbol, s.bearish,  count(s.bearish=true) as cs, count(s.bearish=false) as cd from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') group by s.symbol, s.bearish order by s.symbol;";
			//$fierst_step_queryStr = "with intermediate_result as (select s.symbol, s.bearish, count(1) as cnt from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol is not null group by s.symbol, s.bearish order by s.symbol) select  case when ir1.symbol is null then ir2.symbol else ir1.symbol end as symbol, case when ir1.bearish is null then false else ir1.bearish end as up, case when ir1.cnt is null then 0 else ir1.cnt end as up_cnt, case when ir2.bearish is null then true else ir2.bearish end as down, case when ir2.cnt is null then 0 else ir2.cnt end as down_cnt from (select  from intermediate_result where bearish is false and symbol is not null) as ir1 full outer join (select from intermediate_result where bearish is true and symbol is not null) as ir2 on ir1.symbol = ir2.symbol;";

/* $fierst_step_queryStr = "select t.trader_name, r.report_date, 'All' as sector, r.success_count, r.failure_count, r.success_percentage, r.failure_percentage from regression_statistics_by_trader2 r left join trader_info t on r.trader_id = t.trader_id where t.trader_name in (select distinct trader_name from suggestions_ref s left join real_time_suggestion r on r.id = s.rt_suggestion_id where submitted is true and bearish is false and TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol = '$symbol')
union all
select t.trader_name, r.report_date, r.sector, r.success_count, r.failure_count, r.success_percentage, r.failure_percentage from regression_statistics_by_sector2 r left join trader_info t on r.trader_id = t.trader_id where t.trader_name in (select distinct trader_name from suggestions_ref s left join real_time_suggestion r on r.id = s.rt_suggestion_id where submitted is true and bearish is false and TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol = '$symbol')
order by trader_name, sector;"; */

/* $fierst_step_queryStr ="select t.trader_name, r.report_date, 'All' as sector, r.success_count, r.failure_count, r.success_percentage, r.failure_percentage from regression_statistics_by_trader2 r left join trader_info t on r.trader_id = t.trader_id where t.trader_name in (select distinct trader_name from suggestions_ref s left join real_time_suggestion r on r.id = s.rt_suggestion_id where submitted is true and bearish is false  and TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol = '$symbol')
union all
select t.trader_name, r.report_date, r.sector, r.success_count, r.failure_count, r.success_percentage, r.failure_percentage from regression_statistics_by_sector2 r left join trader_info t on r.trader_id = t.trader_id where t.trader_name in (select distinct trader_name from suggestions_ref s left join real_time_suggestion r on r.id = s.rt_suggestion_id where submitted is true and bearish is false  and TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol = '$symbol')
order by trader_name, sector;"; */
/* $fierst_step_queryStr ="select t.trader_name, r.report_date, 'All' as sector, r.success_count, r.failure_count, r.success_percentage, r.failure_percentage from regression_statistics_by_trader2 r left join trader_info t on r.trader_id = t.trader_id where t.trader_name in (select distinct trader_name from suggestions_ref s left join real_time_suggestion r on r.id = s.rt_suggestion_id left join stock_info s2 on s.symbol = s2.symbol where submitted is true and bearish is false and TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s2.symbol  = 'Technology')
union all
select t.trader_name, r.report_date, r.sector, r.success_count, r.failure_count, r.success_percentage, r.failure_percentage from regression_statistics_by_sector2 r left join trader_info t on r.trader_id = t.trader_id where t.trader_name in (select distinct trader_name from suggestions_ref s left join real_time_suggestion r on r.id = s.rt_suggestion_id left join stock_info s2 on s.symbol = s2.symbol where submitted is true and bearish is false and TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and and s2.sector = 'Technology') order by trader_name, sector"; */
/*
$fierst_step_queryStr ="select t.trader_name, r.report_date, 'All' as sector, r.success_count, r.failure_count, r.success_percentage, r.failure_percentage from regression_statistics_by_trader2 r left join trader_info t on r.trader_id = t.trader_id where t.trader_name in (select distinct trader_name from suggestions_ref s left join real_time_suggestion r on r.id = s.rt_suggestion_id left join stock_info s2 on s.symbol = s2.symbol where submitted is true and bearish is true and to_date(r.message_timestamp, 'yyyy-mm-dd') = '$sdate' and s2.symbol = '$symbol')
union all
select t.trader_name, r.report_date, r.sector, r.success_count, r.failure_count, r.success_percentage, r.failure_percentage from regression_statistics_by_sector2 r left join trader_info t on r.trader_id = t.trader_id where t.trader_name in (select distinct trader_name from suggestions_ref s left join real_time_suggestion r on r.id = s.rt_suggestion_id left join stock_info s2 on s.symbol = s2.symbol where submitted is true and bearish is true and to_date(r.message_timestamp, 'yyyy-mm-dd') = '$sdate' and s2.sector = '$symbol')
order by trader_name, sector;";*/
$fierst_step_queryStr ="select r.trader_name, r.message_content, s.bearish, st.sector, rpt.success_percentage, rpt.failure_percentage, rpt.sector_success_percentage, rpt.sector_failure_percentage from
real_time_suggestion r 
join suggestions_ref s on r.id = s.rt_suggestion_id
left join stock_info st on s.symbol = st.symbol
left join trader_info t on r.author_id = t.author_id
left join 
(with rpt1 as (select * from regression_statistics_by_trader2 where report_date = (select max(report_date) from regression_statistics_by_trader2)),
rpt2 as (select * from regression_statistics_by_sector2 where report_date = (select max(report_date) from regression_statistics_by_sector2) and sector = '$symbol')
select rpt1.trader_id, rpt1.success_percentage, rpt1.failure_percentage, rpt2.sector, rpt2.success_percentage as sector_success_percentage, rpt2.failure_percentage as sector_failure_percentage from rpt1 left join rpt2 on rpt1.trader_id = rpt2.trader_id) as rpt on t.trader_id = rpt.trader_id
where 
r.author_id is not null and
TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and 
st.sector ='$symbol' and 
s.bearish is true";
			//$fierst_step_queryStr = "Select * from real_time_suggestion order by message_timestamp DESC ";
			
		$qqueryy=$this->db->query($fierst_step_queryStr);
			//$qquery_ar_count= $qqueryy->num_rows();
			//echo $qquery_ar_count;
		//print_r($qqueryy);
		$myJSON = $qqueryy->result_array();

	return $myJSON;
		
		
		}
		public function chart_trader_data_two($dates,$symbol)
		{
		$sdate=strval($dates);
			$edate=strval($dates);
	//$result = "Select * from real_time_suggestion where message_timestamp between TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') order by message_timestamp DESC";
	$results = "set datestyle = 'ISO, YMD'";
	$qqueryy=$this->db->query($results);
		//	$fierst_step_queryStr = "select s.symbol, s.bearish, count(1) as cnt from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') group by s.symbol, s.bearish order by s.symbol;";
			//$fierst_step_queryStr = "select s.symbol, s.bearish,  count(s.bearish=true) as cs, count(s.bearish=false) as cd from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') group by s.symbol, s.bearish order by s.symbol;";
			//$fierst_step_queryStr = "with intermediate_result as (select s.symbol, s.bearish, count(1) as cnt from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol is not null group by s.symbol, s.bearish order by s.symbol) select  case when ir1.symbol is null then ir2.symbol else ir1.symbol end as symbol, case when ir1.bearish is null then false else ir1.bearish end as up, case when ir1.cnt is null then 0 else ir1.cnt end as up_cnt, case when ir2.bearish is null then true else ir2.bearish end as down, case when ir2.cnt is null then 0 else ir2.cnt end as down_cnt from (select  from intermediate_result where bearish is false and symbol is not null) as ir1 full outer join (select from intermediate_result where bearish is true and symbol is not null) as ir2 on ir1.symbol = ir2.symbol;";

/* $fierst_step_queryStr = "select t.trader_name, r.report_date, 'All' as sector, r.success_count, r.failure_count, r.success_percentage, r.failure_percentage from regression_statistics_by_trader2 r left join trader_info t on r.trader_id = t.trader_id where t.trader_name in (select distinct trader_name from suggestions_ref s left join real_time_suggestion r on r.id = s.rt_suggestion_id where submitted is true and bearish is false and TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol = '$symbol')
union all
select t.trader_name, r.report_date, r.sector, r.success_count, r.failure_count, r.success_percentage, r.failure_percentage from regression_statistics_by_sector2 r left join trader_info t on r.trader_id = t.trader_id where t.trader_name in (select distinct trader_name from suggestions_ref s left join real_time_suggestion r on r.id = s.rt_suggestion_id where submitted is true and bearish is false and TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol = '$symbol')
order by trader_name, sector;"; */

/*$fierst_step_queryStr ="select t.trader_name, r.report_date, 'All' as sector, r.success_count, r.failure_count, r.success_percentage, r.failure_percentage from regression_statistics_by_trader2 r left join trader_info t on r.trader_id = t.trader_id where t.trader_name in (select distinct trader_name from suggestions_ref s left join real_time_suggestion r on r.id = s.rt_suggestion_id where submitted is true and bearish is true  and TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol = '$symbol')
union all
select t.trader_name, r.report_date, r.sector, r.success_count, r.failure_count, r.success_percentage, r.failure_percentage from regression_statistics_by_sector2 r left join trader_info t on r.trader_id = t.trader_id where t.trader_name in (select distinct trader_name from suggestions_ref s left join real_time_suggestion r on r.id = s.rt_suggestion_id where submitted is true and bearish is true  and TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol = '$symbol')
order by trader_name, sector;";*/

$fierst_step_queryStr ="select r.trader_name, r.message_content, s.symbol, s.bearish, st.sector, rpt.success_percentage, rpt.failure_percentage, rpt.sector_success_percentage, rpt.sector_failure_percentage from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id left join stock_info st on s.symbol = st.symbol left join trader_info t on r.author_id = t.author_id left join 
(with rpt1 as (select * from regression_statistics_by_trader2 where report_date = (select max(report_date) from regression_statistics_by_trader2)),rpt2 as (select * from regression_statistics_by_sector2 where report_date = (select max(report_date) from regression_statistics_by_sector2) and sector = (select sector from stock_info where symbol = '$symbol'))
select rpt1.trader_id, rpt1.success_percentage, rpt1.failure_percentage, rpt2.sector, rpt2.success_percentage as sector_success_percentage, rpt2.failure_percentage as sector_failure_percentage from rpt1 left join rpt2 on rpt1.trader_id = rpt2.trader_id) as rpt on t.trader_id = rpt.trader_id where r.author_id is not null and TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol ='$symbol' and s.bearish is false";
			//$fierst_step_queryStr = "Select * from real_time_suggestion order by message_timestamp DESC ";
			
		$qqueryy=$this->db->query($fierst_step_queryStr);
			//$qquery_ar_count= $qqueryy->num_rows();
			//echo $qquery_ar_count;
		//print_r($qqueryy);
		$myJSON = $qqueryy->result_array();

	return $myJSON;
		
		
		}
		public function chart_trader_data_two_search($sdate,$edate,$symbol)
		{
		$sdate=strval($sdate);
			$edate=strval($edate);
	//$result = "Select * from real_time_suggestion where message_timestamp between TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') order by message_timestamp DESC";
	$results = "set datestyle = 'ISO, YMD'";
	$qqueryy=$this->db->query($results);
		//	$fierst_step_queryStr = "select s.symbol, s.bearish, count(1) as cnt from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') group by s.symbol, s.bearish order by s.symbol;";
			//$fierst_step_queryStr = "select s.symbol, s.bearish,  count(s.bearish=true) as cs, count(s.bearish=false) as cd from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') group by s.symbol, s.bearish order by s.symbol;";
			//$fierst_step_queryStr = "with intermediate_result as (select s.symbol, s.bearish, count(1) as cnt from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol is not null group by s.symbol, s.bearish order by s.symbol) select  case when ir1.symbol is null then ir2.symbol else ir1.symbol end as symbol, case when ir1.bearish is null then false else ir1.bearish end as up, case when ir1.cnt is null then 0 else ir1.cnt end as up_cnt, case when ir2.bearish is null then true else ir2.bearish end as down, case when ir2.cnt is null then 0 else ir2.cnt end as down_cnt from (select  from intermediate_result where bearish is false and symbol is not null) as ir1 full outer join (select from intermediate_result where bearish is true and symbol is not null) as ir2 on ir1.symbol = ir2.symbol;";

/* $fierst_step_queryStr = "select t.trader_name, r.report_date, 'All' as sector, r.success_count, r.failure_count, r.success_percentage, r.failure_percentage from regression_statistics_by_trader2 r left join trader_info t on r.trader_id = t.trader_id where t.trader_name in (select distinct trader_name from suggestions_ref s left join real_time_suggestion r on r.id = s.rt_suggestion_id where submitted is true and bearish is false and TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol = '$symbol')
union all
select t.trader_name, r.report_date, r.sector, r.success_count, r.failure_count, r.success_percentage, r.failure_percentage from regression_statistics_by_sector2 r left join trader_info t on r.trader_id = t.trader_id where t.trader_name in (select distinct trader_name from suggestions_ref s left join real_time_suggestion r on r.id = s.rt_suggestion_id where submitted is true and bearish is false and TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol = '$symbol')
order by trader_name, sector;"; */

/*$fierst_step_queryStr ="select t.trader_name, r.report_date, 'All' as sector, r.success_count, r.failure_count, r.success_percentage, r.failure_percentage from regression_statistics_by_trader2 r left join trader_info t on r.trader_id = t.trader_id where t.trader_name in (select distinct trader_name from suggestions_ref s left join real_time_suggestion r on r.id = s.rt_suggestion_id where submitted is true and bearish is true  and TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol = '$symbol')
union all
select t.trader_name, r.report_date, r.sector, r.success_count, r.failure_count, r.success_percentage, r.failure_percentage from regression_statistics_by_sector2 r left join trader_info t on r.trader_id = t.trader_id where t.trader_name in (select distinct trader_name from suggestions_ref s left join real_time_suggestion r on r.id = s.rt_suggestion_id where submitted is true and bearish is true  and TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol = '$symbol')
order by trader_name, sector;";*/
$fierst_step_queryStr ="select r.trader_name, r.message_content, s.symbol, s.bearish, st.sector, rpt.success_percentage, rpt.failure_percentage, rpt.sector_success_percentage, rpt.sector_failure_percentage from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id left join stock_info st on s.symbol = st.symbol left join trader_info t on r.author_id = t.author_id left join 
(with rpt1 as (select * from regression_statistics_by_trader2 where report_date = (select max(report_date) from regression_statistics_by_trader2)),rpt2 as (select * from regression_statistics_by_sector2 where report_date = (select max(report_date) from regression_statistics_by_sector2) and sector = (select sector from stock_info where symbol = '$symbol'))
select rpt1.trader_id, rpt1.success_percentage, rpt1.failure_percentage, rpt2.sector, rpt2.success_percentage as sector_success_percentage, rpt2.failure_percentage as sector_failure_percentage from rpt1 left join rpt2 on rpt1.trader_id = rpt2.trader_id) as rpt on t.trader_id = rpt.trader_id where r.author_id is not null and TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol ='$symbol' and s.bearish is TRUE";
			//$fierst_step_queryStr = "Select * from real_time_suggestion order by message_timestamp DESC ";
			
		$qqueryy=$this->db->query($fierst_step_queryStr);
			//$qquery_ar_count= $qqueryy->num_rows();
			//echo $qquery_ar_count;
		//print_r($qqueryy);
		$myJSON = $qqueryy->result_array();

	return $myJSON;
		
		
		}
		public function chart_stock_data_ser($date1,$date2)
		{
		$sdate=strval($date1);
		$edate=strval($date2);
	//$result = "Select * from real_time_suggestion where message_timestamp between TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') order by message_timestamp DESC";

		$results = "set datestyle = 'ISO, YMD'";
		$qqueryy=$this->db->query($results);

	//	$fierst_step_queryStr = "select s.symbol, s.bearish, count(1) as cnt from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') group by s.symbol, s.bearish order by s.symbol;";
	//$fierst_step_queryStr = "select s.symbol, s.bearish,  count(s.bearish=true) as cs, count(s.bearish=false) as cd from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') group by s.symbol, s.bearish order by s.symbol;";
	//$fierst_step_queryStr = "with intermediate_result as (select s.symbol, s.bearish, count(1) as cnt from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol is not null group by s.symbol, s.bearish order by s.symbol) select  case when ir1.symbol is null then ir2.symbol else ir1.symbol end as symbol, case when ir1.bearish is null then false else ir1.bearish end as up, case when ir1.cnt is null then 0 else ir1.cnt end as up_cnt, case when ir2.bearish is null then true else ir2.bearish end as down, case when ir2.cnt is null then 0 else ir2.cnt end as down_cnt from (select  from intermediate_result where bearish is false and symbol is not null) as ir1 full outer join (select from intermediate_result where bearish is true and symbol is not null) as ir2 on ir1.symbol = ir2.symbol;";

	$fierst_step_queryStr = "with intermediate_result as (select trim(s.symbol) as symbol, s.bearish, count(1) as cnt from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and TO_DATE('$edate', 'YYYY MM DD') and trim(s.symbol) not in ('', '?') group by trim(s.symbol), s.bearish order by trim(s.symbol))
							select
							case when ir1.symbol is null then ir2.symbol else ir1.symbol end as symbol,
							case when ir1.bearish is null then false else ir1.bearish end as up,
							case when ir1.cnt is null then 0 else ir1.cnt end as up_cnt,
							case when ir2.bearish is null then true else ir2.bearish end as down,
							case when ir2.cnt is null then 0 else ir2.cnt end as down_cnt
							from
							(select * from intermediate_result where bearish is false and symbol is not null) ir1
							full outer join
							(select * from intermediate_result where bearish is true and symbol is not null) ir2
							on ir1.symbol = ir2.symbol;";
	//$fierst_step_queryStr = "Select * from real_time_suggestion order by message_timestamp DESC ";
			
		$qqueryy=$this->db->query($fierst_step_queryStr);

	//$qquery_ar_count= $qqueryy->num_rows();
	//echo $qquery_ar_count;
	//print_r($qqueryy);

		$myJSON = $qqueryy->result_array();

		return $myJSON;
		}

		public function chart_stock_data_ser_count($date1,$date2)
		{
			$sdate=strval($date1);
			$edate=strval($date2);

	//$result = "Select * from real_time_suggestion where message_timestamp between TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') order by message_timestamp DESC";

			$results = "set datestyle = 'ISO, YMD'";
			$qqueryy=$this->db->query($results);

	//$fierst_step_queryStr = "select s.symbol, s.bearish, count(1) as cnt from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') group by s.symbol, s.bearish order by s.symbol;";
	//$fierst_step_queryStr = "select s.symbol, s.bearish,  count(s.bearish=true) as cs, count(s.bearish=false) as cd from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') group by s.symbol, s.bearish order by s.symbol;";
	//$fierst_step_queryStr = "with intermediate_result as (select s.symbol, s.bearish, count(1) as cnt from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol is not null group by s.symbol, s.bearish order by s.symbol) select  case when ir1.symbol is null then ir2.symbol else ir1.symbol end as symbol, case when ir1.bearish is null then false else ir1.bearish end as up, case when ir1.cnt is null then 0 else ir1.cnt end as up_cnt, case when ir2.bearish is null then true else ir2.bearish end as down, case when ir2.cnt is null then 0 else ir2.cnt end as down_cnt from (select  from intermediate_result where bearish is false and symbol is not null) as ir1 full outer join (select from intermediate_result where bearish is true and symbol is not null) as ir2 on ir1.symbol = ir2.symbol;";

			$fierst_step_queryStr = "select s.bearish, count(1) as cnt from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol is not null group by s.bearish";

	//$fierst_step_queryStr = "Select * from real_time_suggestion order by message_timestamp DESC ";
			
			$qqueryy=$this->db->query($fierst_step_queryStr);
	//$qquery_ar_count= $qqueryy->num_rows();
	//echo $qquery_ar_count;
	//print_r($qqueryy);
			$myJSON = $qqueryy->result_array();

			return $myJSON;
		}

		public function chart_stock_data_new()
		{
	
	//$result = "Select * from real_time_suggestion where message_timestamp between TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') order by message_timestamp DESC";
	$results = "set datestyle = 'ISO, YMD'";
	$qqueryy=$this->db->query($results);
		//	$fierst_step_queryStr = "select s.symbol, s.bearish, count(1) as cnt from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') group by s.symbol, s.bearish order by s.symbol;";
			//$fierst_step_queryStr = "select s.symbol, s.bearish,  count(s.bearish=true) as cs, count(s.bearish=false) as cd from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') group by s.symbol, s.bearish order by s.symbol;";
			//$fierst_step_queryStr = "with intermediate_result as (select s.symbol, s.bearish, count(1) as cnt from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') and s.symbol is not null group by s.symbol, s.bearish order by s.symbol) select  case when ir1.symbol is null then ir2.symbol else ir1.symbol end as symbol, case when ir1.bearish is null then false else ir1.bearish end as up, case when ir1.cnt is null then 0 else ir1.cnt end as up_cnt, case when ir2.bearish is null then true else ir2.bearish end as down, case when ir2.cnt is null then 0 else ir2.cnt end as down_cnt from (select  from intermediate_result where bearish is false and symbol is not null) as ir1 full outer join (select from intermediate_result where bearish is true and symbol is not null) as ir2 on ir1.symbol = ir2.symbol;";
//$fierst_step_queryStr = "select s.bearish, count(1) as cnt from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where r.message_timestamp between '2022-01-01 00:00:00' and '2022-03-15 23:59:59' and s.symbol is not null group by s.bearish";
$fierst_step_queryStr = "
with intermediate_result as (select s.symbol, s.bearish, count(1) as cnt from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where r.message_timestamp between '2022-01-01' and '2022-03-15' and s.symbol is not null group by s.symbol, s.bearish order by s.symbol)
select 
case when ir1.symbol is null then ir2.symbol else ir1.symbol end as symbol,
case when ir1.bearish is null then false else ir1.bearish end as up,
case when ir1.cnt is null then 0 else ir1.cnt end as up_cnt,
case when ir2.bearish is null then true else ir2.bearish end as down,
case when ir2.cnt is null then 0 else ir2.cnt end as down_cnt
from 
(select * from intermediate_result where bearish is false and symbol is not null) ir1 
full outer join 
(select * from intermediate_result where bearish is true and symbol is not null) ir2 
on ir1.symbol = ir2.symbol";
			//$fierst_step_queryStr = "Select * from real_time_suggestion order by message_timestamp DESC ";
			
		$qqueryy=$this->db->query($fierst_step_queryStr);
			//$qquery_ar_count= $qqueryy->num_rows();
			//echo $qquery_ar_count;
		//print_r($qqueryy);
		$myJSON = $qqueryy->result_array();

	return $myJSON;
		
		
		}
		public function stock_data_count()
		{
			$fierst_step_queryStr = "Select * from real_time_suggestion";
			//$fierst_step_queryStr = "Select * from real_time_suggestion order by message_timestamp DESC ";
			
		$qqueryy=$this->db->query($fierst_step_queryStr);
			$qquery_ar_count= $qqueryy->num_rows();
			//echo $qquery_ar_count;
		//print_r($qqueryy);
		//$myJSON = $qqueryy->result_array();

	return $qquery_ar_count;
		
		
		}
		public function sector_tader_chart($trader)
		{
			
			$fierst_step_queryStr = "select t.trader_name, s.sector, r2.number_of_days, avg(r2.win_percentage) from regression_test_info2 r join regression_history_info r2 on r.regression_id = r2.regression_id left outer join trader_info t on r.trader_id = t.trader_id left outer join stock_info s on r.stock_id = s.stock_id where t.trader_name = '$trader'  group by t.trader_name, s.sector, r2.number_of_days order by r2.number_of_days asc;";
			//$fierst_step_queryStr = "select t.trader_name, s.sector, r2.number_of_days, avg(r2.win_percentage) from regression_test_info2 r join regression_history_info r2 on r.regression_id = r2.regression_id left outer join trader_info t on r.trader_id = t.trader_id left outer join stock_info s on r.stock_id = s.stock_id where t.trader_name = '$trader' group by t.trader_name, s.sector, r2.number_of_days, r2.win_percentage order by s.sector, r2.number_of_days asc;";
			//$fierst_step_queryStr = "select t.trader_name, s.sector, r2.number_of_days, avg(r2.win_percentage) from regression_test_info2 r join regression_history_info r2 on r.regression_id = r2.regression_id left outer join trader_info t on r.trader_id = t.trader_id left outer join stock_info s on r.stock_id = s.stock_id where t.trader_name = '$trader' group by t.trader_name, s.sector, r2.number_of_days, r2.win_percentage order by s.sector, r2.number_of_days asc;";
			//$fierst_step_queryStr = "Select * from real_time_suggestion order by message_timestamp DESC ";
			
		$qqueryy=$this->db->query($fierst_step_queryStr);
			//$qquery_ar_count= $qqueryy->num_rows();
			//echo $qquery_ar_count;
		//print_r($qqueryy);
		$myJSON = $qqueryy->result_array();

	return $myJSON;
		
		
		}
		public function stock_tader_chart($trader, $regression_id)
		{
			
			//$fierst_step_queryStr = "select r2.regression_id, t.trader_name, s.symbol, s.sector, r2.sell_date, r2.number_of_days, r2.sell_price, r2.win_percentage from regression_test_info2 r join regression_history_info r2 on r.regression_id = r2.regression_id left outer join trader_info t on r.trader_id = t.trader_id left outer join stock_info s on r.stock_id = s.stock_id where t.trader_name = '$trader' order by r2.number_of_days, r2.regression_id asc;";
			/* $fierst_step_queryStr = "select r2.regression_id, t.trader_name, s.symbol, s.sector, p.predict_goup, r2.sell_date, r2.number_of_days, r2.sell_price, r2.win_percentage from regression_test_info2 r join regression_history_info r2 on r.regression_id = r2.regression_id left outer join trader_info t on r.trader_id = t.trader_id left outer join stock_info s on r.stock_id = s.stock_id left outer join proposal_info p on r.proposal_id = p.proposal_id where t.trader_name = '$trader' order by r2.regression_id, r2.number_of_days asc;"; */
			//$fierst_step_queryStr = "select r2.regression_id, r.trader_name, s.symbol, s.sector, p.predict_goup, r2.sell_date, r2.number_of_days, r2.sell_price, r2.win_percentage from(select * from regression_test_info2 ri left outer join trader_info t on ri.trader_id = t.trader_id where t.trader_name = '$trader' and ri.purchase_date <= '2022-03-15' order by ri.purchase_date desc limit 10) as r join regression_history_info r2 on r.regression_id = r2.regression_id left outer join stock_info s on r.stock_id = s.stock_id left outer join proposal_info p on r.proposal_id = p.proposal_id order by r2.regression_id, r2.number_of_days asc;";
			//$fierst_step_queryStr = "with tbl1 as (select cast(r2.regression_id as varchar), t.trader_name, s.symbol, s.sector, to_char(r2.sell_date, 'yyyy-mm-dd') as sell_date, r2.number_of_days, cast(r2.sell_price as varchar), r2.win_percentage from regression_test_info2 r join regression_history_info r2 on r.regression_id = r2.regression_id left outer join trader_info t on r.trader_id = t.trader_id left outer join stock_info s on r.stock_id = s.stock_id where t.trader_name = '$trader' order by r2.regression_id, r2.number_of_days asc), tbl2 as (select null as regression_id, t.trader_name, null as symbol, s.sector, null as sell_date, r2.number_of_days, null as sell_price, avg(r2.win_percentage) from regression_test_info2 r join regression_history_info r2 on r.regression_id = r2.regression_id left outer join trader_info t on r.trader_id = t.trader_id left outer join stock_info s on r.stock_id = s.stock_id where t.trader_name = '$trader' group by t.trader_name, s.sector, r2.number_of_days order by s.sector, r2.number_of_days asc) select * from tbl1 union all select * from tbl2;";
			$fierst_step_queryStr = "select r2.regression_id, r.trader_name, s.symbol, s.sector, p.predict_goup, r2.sell_date, r2.number_of_days, r2.sell_price, r2.win_percentage from(select * from regression_test_info2 ri left outer join trader_info t on ri.trader_id = t.trader_id where t.trader_name = '$trader' and ri.purchase_date <= '2022-03-15' and  ri.regression_id = '$regression_id' order by ri.purchase_date desc) as r join regression_history_info r2 on r.regression_id = r2.regression_id left outer join stock_info s on r.stock_id = s.stock_id left outer join proposal_info p on r.proposal_id = p.proposal_id order by r2.regression_id, r2.number_of_days asc;";
			
			//$fierst_step_queryStr = "select t.trader_name, s.sector, r2.number_of_days, avg(r2.win_percentage) from regression_test_info2 r join regression_history_info r2 on r.regression_id = r2.regression_id left outer join trader_info t on r.trader_id = t.trader_id left outer join stock_info s on r.stock_id = s.stock_id where t.trader_name = '$trader' group by t.trader_name, s.sector, r2.number_of_days, r2.win_percentage order by s.sector, r2.number_of_days asc;";
			//$fierst_step_queryStr = "select t.trader_name, s.sector, r2.number_of_days, avg(r2.win_percentage) from regression_test_info2 r join regression_history_info r2 on r.regression_id = r2.regression_id left outer join trader_info t on r.trader_id = t.trader_id left outer join stock_info s on r.stock_id = s.stock_id where t.trader_name = '$trader' group by t.trader_name, s.sector, r2.number_of_days, r2.win_percentage order by s.sector, r2.number_of_days asc;";
			//$fierst_step_queryStr = "Select * from real_time_suggestion order by message_timestamp DESC ";
			
		$qqueryy=$this->db->query($fierst_step_queryStr);
			//$qquery_ar_count= $qqueryy->num_rows();
			//echo $qquery_ar_count;
		//print_r($qqueryy);
		$myJSON = $qqueryy->result_array();

	return $myJSON;
		
		
		}
		public function sector_name($trader)
		{
			//$fierst_step_queryStr = "select t.trader_name, s.sector, r2.number_of_days, avg(r2.win_percentage) from regression_test_info2 r join regression_history_info r2 on r.regression_id = r2.regression_id left outer join trader_info t on r.trader_id = t.trader_id left outer join stock_info s on r.stock_id = s.stock_id where t.trader_name = '$trader' group by t.trader_name, s.sector, r2.number_of_days, r2.win_percentage order by s.sector, r2.number_of_days asc;";
			$fierst_step_queryStr = "select sector from regression_test_info2 r join regression_history_info r2 on r.regression_id = r2.regression_id left outer join trader_info t on r.trader_id = t.trader_id left outer join stock_info s on r.stock_id = s.stock_id where t.trader_name = '$trader' group by  s.sector order by s.sector asc;";
			//$fierst_step_queryStr = "Select * from real_time_suggestion order by message_timestamp DESC ";
			
		$qqueryy=$this->db->query($fierst_step_queryStr);
			//$qquery_ar_count= $qqueryy->num_rows();
			//echo $qquery_ar_count;
		//print_r($qqueryy);
		$myJSON = $qqueryy->result_array();

	return $myJSON;
		
		
		
		}
		public function sector_name_single($trader, $sector)
		{
			//$fierst_step_queryStr = "select t.trader_name, s.sector, r2.number_of_days, avg(r2.win_percentage) from regression_test_info2 r join regression_history_info r2 on r.regression_id = r2.regression_id left outer join trader_info t on r.trader_id = t.trader_id left outer join stock_info s on r.stock_id = s.stock_id where t.trader_name = '$trader' group by t.trader_name, s.sector, r2.number_of_days, r2.win_percentage order by s.sector, r2.number_of_days asc;";
//$fierst_step_queryStr = "select r2.regression_id, s.sector,s.symbol, p.predict_goup from(select * from regression_test_info2 ri left outer join trader_info t on ri.trader_id = t.trader_id where t.trader_name = '$trader' and ri.purchase_date <= '2022-03-15' order by ri.purchase_date desc) as r join  regression_history_info r2 on r.regression_id = r2.regression_id left outer join stock_info s on r.stock_id = s.stock_id left outer join proposal_info p on r.proposal_id = p.proposal_id where s.sector = '$sector' group by r2.regression_id, s.sector, p.predict_goup, s.symbol order by r2.regression_id asc ";
			$fierst_step_queryStr = "select r2.regression_id, s.sector,s.symbol, p.predict_goup from(select * from regression_test_info2 ri left outer join trader_info t on ri.trader_id = t.trader_id where t.trader_name = '$trader' order by ri.purchase_date desc) as r join  regression_history_info r2 on r.regression_id = r2.regression_id left outer join stock_info s on r.stock_id = s.stock_id left outer join proposal_info p on r.proposal_id = p.proposal_id where s.sector = '$sector' group by r2.regression_id, s.sector, p.predict_goup, s.symbol order by r2.regression_id asc";
			
			//$fierst_step_queryStr = "select r2.regression_id, t.trader_name, s.symbol, s.sector, p.predict_goup, r2.sell_date, r2.number_of_days, r2.sell_price, r2.win_percentage from regression_test_info2 r join regression_history_info r2 on r.regression_id = r2.regression_id left outer join trader_info t on r.trader_id = t.trader_id left outer join stock_info s on r.stock_id = s.stock_id left outer join proposal_info p on r.proposal_id = p.proposal_id where t.trader_name = '$trader' and s.sector = '$sector' order by r2.regression_id, r2.number_of_days asc;";
			//$fierst_step_queryStr = "Select * from real_time_suggestion order by message_timestamp DESC ";
			
		$qqueryy=$this->db->query($fierst_step_queryStr);
			//$qquery_ar_count= $qqueryy->num_rows();
			//echo $qquery_ar_count;
		//print_r($qqueryy);
		$myJSON = $qqueryy->result_array();

	return $myJSON;
		
		
		
		}
	public function regration_id($trader)
		{
			
		//	$fierst_step_queryStr = "select r2.regression_id, s.sector from regression_test_info2 r join regression_history_info r2 on r.regression_id = r2.regression_id left outer join trader_info t on r.trader_id = t.trader_id left outer join stock_info s on r.stock_id = s.stock_id where t.trader_name = '$trader' group by r2.regression_id, s.sector order by r2.regression_id asc;";
			//$fierst_step_queryStr = "select r2.regression_id, s.sector, p.predict_goup from regression_test_info2 r join regression_history_info r2 on r.regression_id = r2.regression_id left outer join trader_info t on r.trader_id = t.trader_id left outer join stock_info s on r.stock_id = s.stock_id left outer join proposal_info p on r.proposal_id = p.proposal_id where t.trader_name = '$trader' group by r2.regression_id, s.sector, p.predict_goup order by r2.regression_id asc;";
			$fierst_step_queryStr = "select r2.regression_id, s.sector,s.symbol, p.predict_goup from(select * from regression_test_info2 ri left outer join trader_info t on ri.trader_id = t.trader_id where t.trader_name = '$trader' and ri.purchase_date <= '2022-03-15' order by ri.purchase_date desc) as r join  regression_history_info r2 on r.regression_id = r2.regression_id left outer join stock_info s on r.stock_id = s.stock_id left outer join proposal_info p on r.proposal_id = p.proposal_id group by r2.regression_id, s.sector, p.predict_goup, s.symbol order by r2.regression_id asc";
			
				//$fierst_step_queryStr = "select r2.regression_id, t.trader_name, s.symbol, s.sector, p.predict_goup, r2.sell_date, r2.number_of_days, r2.sell_price, r2.win_percentage from regression_test_info2 r join regression_history_info r2 on r.regression_id = r2.regression_id left outer join trader_info t on r.trader_id = t.trader_id left outer join stock_info s on r.stock_id = s.stock_id left outer join proposal_info p on r.proposal_id = p.proposal_id where t.trader_name = '$trader' order by r2.regression_id, r2.number_of_days asc;";
			//$fierst_step_queryStr = "select t.trader_name, s.sector, r2.number_of_days, avg(r2.win_percentage) from regression_test_info2 r join regression_history_info r2 on r.regression_id = r2.regression_id left outer join trader_info t on r.trader_id = t.trader_id left outer join stock_info s on r.stock_id = s.stock_id where t.trader_name = '$trader' group by t.trader_name, s.sector, r2.number_of_days, r2.win_percentage order by s.sector, r2.number_of_days asc;";
			//$fierst_step_queryStr = "select t.trader_name, s.sector, r2.number_of_days, avg(r2.win_percentage) from regression_test_info2 r join regression_history_info r2 on r.regression_id = r2.regression_id left outer join trader_info t on r.trader_id = t.trader_id left outer join stock_info s on r.stock_id = s.stock_id where t.trader_name = '$trader' group by t.trader_name, s.sector, r2.number_of_days, r2.win_percentage order by s.sector, r2.number_of_days asc;";
			//$fierst_step_queryStr = "Select * from real_time_suggestion order by message_timestamp DESC ";
			
		$qqueryy=$this->db->query($fierst_step_queryStr);
			//$qquery_ar_count= $qqueryy->num_rows();
			//echo $qquery_ar_count;
		//print_r($qqueryy);
		$myJSON = $qqueryy->result_array();

	return $myJSON;
		
		
		}
		public function stock_data_new($rowperpage,$row_no)
		{
	/* 		$fields = $this->db->field_data('real_time_suggestion');
print_r($fields);
foreach ($fields as $field)
{
        echo $field->name;
        echo $field->type;
        echo $field->max_length;
        echo $field->primary_key;
} */
/* $fierst_step_queryStrr = "Select * from suggestions_ref limit 50";
$qqueryyy=$this->db->query($fierst_step_queryStrr);
$myJSONn = $qqueryyy->result_array();
print_r($myJSONn); */
			//$fierst_step_queryStr = "Select * from real_time_suggestion order by message_timestamp DESC limit 50";
			$fierst_step_queryStr = "Select * from real_time_suggestion order by message_timestamp DESC LIMIT $rowperpage OFFSET $row_no";
			
		$qqueryy=$this->db->query($fierst_step_queryStr);
		//	$qquery_ar_count= $qqueryy->num_rows();
		
		//print_r($qqueryy);
		$myJSON = $qqueryy->result_array();
		return $myJSON;
		
		
		}
		public function useful_data()
		{
			/* $fierst_step_queryStr = "Select * from trader_info";
		$qqueryy=$this->db->query($fierst_step_queryStr);
		$myJSON = $qqueryy->result_array();
echo "<pre>";		
			print_r($myJSON);  
			exit; */
		//	$fierst_step_queryStr = "Select * from real_time_suggestion where submitted = true order by message_timestamp DESC";
			$fierst_step_queryStr = "select * from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where s.submitted = true order by r.message_timestamp DESC";
		$qqueryy=$this->db->query($fierst_step_queryStr);
		$myJSON = $qqueryy->result_array();
        
		return $myJSON;
		
		
		
		}public function approve_datas($apps)
		{
			if($apps == 'approve'){
				$fierst_step_queryStr = "Select * from real_time_suggestion where submitted = true and approved = true order by message_timestamp DESC";
			} else {
				$fierst_step_queryStr = "Select * from real_time_suggestion where submitted = true order by message_timestamp DESC";
			}
			
			
		$qqueryy=$this->db->query($fierst_step_queryStr);
		$myJSON = $qqueryy->result_array();

		return $myJSON;
		
		
		}
		public function datesearch(){
			$sdate=strval($_POST['date1']);
			$edate=strval($_POST['date2']);
	//$result = "Select * from real_time_suggestion where message_timestamp between TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') order by message_timestamp DESC";
	$results = "set datestyle = 'ISO, YMD'";
	$qqueryy=$this->db->query($results);
	//$result = "show datestyle;";
	$fierst_step_queryStr = "Select * from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where s.submitted = true and TO_DATE(r.message_timestamp, 'YYYY MM DD') between  TO_DATE('$sdate', 'YYYY MM DD') and  TO_DATE('$edate', 'YYYY MM DD') order by r.message_timestamp DESC";
	
	//$fierst_step_queryStr = "select * from real_time_suggestion r join suggestions_ref s on r.id = s.rt_suggestion_id where s.submitted = true order by r.message_timestamp DESC";
	//$result = "SELECT * FROM real_time_suggestion WHERE (message_timestamp, message_timestamp) OVERLAPS ($sdate::DATE, $edate::DATE);";
$qqueryy=$this->db->query($result);
		$myJSON = $qqueryy->result_array();
return $myJSON;

} 
		

	/* 	public function hj_bl()
		{
		   
$tables = $this->db->list_tables();

foreach ($tables as $table)
{
        echo $table."<br/>";
} 
 $fierst_step_queryStr = "Select * from trader_info";
		$qqueryy=$this->db->query($fierst_step_queryStr);
		$myJSON = $qqueryy->result_array();
echo "<pre>";		
			print_r($myJSON);  
			exit;
$qqueryStr = "Select * from trader_info where trader_name='".$_POST['persone_name']."'";
		$qquery = $this->db->query($qqueryStr);
		//echo "<pre>";
			$qquery_ar =$qquery->result_array(); 
			//print_r($qquery_ar);
			//exit;
		 $fierst_step_queryStr = "Select * from regression_test_info r join stock_info s on r.stock_id = s.stock_id  and r.trader_id = 88;";
		$qqueryy=$this->db->query($fierst_step_queryStr);	
			print_r( $qqueryy->result_array());  
			
			$qquery_ar_count= $qquery->num_rows();
			if($qquery_ar_count > 0) {
			$success_value = $this->config->item('success_value');
			
		    	$first_step_queryStr = "Select * from regression_test_info r join stock_info s on r.stock_id = s.stock_id where s.symbol = '".$_POST['stock']."' and r.trader_id = '".$qquery_ar[0]['trader_id']."'";
		$first_step_query = $this->db->query($first_step_queryStr);
		$first_stpe_count= $first_step_query->num_rows();
		//$first_stpe_count= 0;
		if($first_stpe_count > 0) {
			$first_step_succ_count = 0;
			foreach ($first_step_query->result_array() as $first_step_data) {
				if($first_step_data['test_result'] != 'Failure'){
					$first_step_succ_count = $first_step_succ_count + 1;
				} 
			}
            if($first_step_succ_count > 0){
				$approve_count = ($first_step_succ_count/$first_stpe_count) * 100;
				if($approve_count >= $success_value) {
					$final_result='Approved';
					$bol=1;
				} else {
					$final_result='DisApproved';
					$bol=0;
				}
			} else {
			$final_result='DisApproved';
            $bol=0;			
			}
             $second_step_up = "UPDATE real_time_suggestion SET approved = '".$bol."', submitted= '1', symbol='".$_POST['stock']."' WHERE id = '".$_POST['id']."'";
			// echo $second_step_up;
		$seond_step_up_query = $this->db->query($second_step_up);		
			//return $query->result_array();

           return $final_result;
		} else {
			$second_step_stock = "select sector from stock_info where symbol = '".$_POST['stock']."'";
		$second_step_stock_query = $this->db->query($second_step_stock);
       $second_step_stock_query_data = $second_step_stock_query->result_array();
	   $second_step_queryStr = "select * from regression_statistics_by_sector where trader_id = '".$qquery_ar[0]['trader_id']."' and sector = '".$second_step_stock_query_data[0]['sector']."'";
		$seond_step_query = $this->db->query($second_step_queryStr);
		$second_stpe_count= $seond_step_query->num_rows();
		//$second_stpe_count= 0;
	          if($second_stpe_count > 0) {
				 $second_step_query_data = $seond_step_query->result_array();
				  $approve_count = $second_step_query_data[0]['success_percentage'];
				  if($approve_count >= $success_value) {
					$final_result='Approved';
					$bol=1;
				} else {
					$final_result='DisApproved';
					$bol=0;
				}
			
		 $second_step_up = "UPDATE real_time_suggestion SET approved = '".$bol."', submitted= '1', symbol='".$_POST['stock']."' WHERE id = '".$_POST['id']."'";
		// echo $second_step_up;
		$seond_step_up_query = $this->db->query($second_step_up);
        
				return $final_result.' '.$bol;
			  } else {
				  
				  $third_step_queryStr = "select * from regression_statistics_by_trader where trader_id = '".$qquery_ar[0]['trader_id']."'";
		$third_step_query = $this->db->query($third_step_queryStr);
		$third_stpe_count= $third_step_query->num_rows();
		if($third_stpe_count > 0) {
				 $third_step_query_data = $third_step_query->result_array();
				  $approve_count = $third_step_query_data[0]['success_percentage'];
				  if($approve_count >= $success_value) {
					$final_result='Approved';
					$bol=1;
				} else {
					$final_result='DisApproved';
					$bol=0;
				}
				$second_step_up = "UPDATE real_time_suggestion SET approved = '".$bol."', submitted= '1', symbol='".$_POST['stock']."' WHERE id = '".$_POST['id']."'";
		$seond_step_up_query = $this->db->query($second_step_up);
		//echo $second_step_up;
				return $final_result;
			  } else {
				$final_result='DisApproved'; 
				$bol=0;
                 $second_step_up = "UPDATE real_time_suggestion SET approved = '".$bol."', submitted= '1', symbol='".$_POST['stock']."' WHERE id = '".$_POST['id']."'";
				 //echo $second_step_up;
		$seond_step_up_query = $this->db->query($second_step_up);				
				  return $final_result;
			  }
				}
   				
			  }
			  
        
		} else {
			$final_result = 'Trader is not found';
			return $final_result;
		}




			
		
	} */
	public function hj_bl()
		{
		   
	 /* 	    $tables = $this->db->list_tables();

foreach ($tables as $table)
{
        echo $table."<br/>";
} */
/* $fierst_step_queryStr = "Select * from trader_info";
		$qqueryy=$this->db->query($fierst_step_queryStr);
		$myJSON = $qqueryy->result_array();
echo "<pre>";		
			print_r($myJSON);  
			exit; */
			//print_r($_POST);
$qqueryStr = "Select * from trader_info where trader_name='".$_POST['persone_name']."'";
		$qquery = $this->db->query($qqueryStr);
		//echo "<pre>";
			$qquery_ar =$qquery->result_array(); 
			//print_r($qquery_ar);
			//exit;
		/* $fierst_step_queryStr = "Select * from regression_test_info r join stock_info s on r.stock_id = s.stock_id  and r.trader_id = 88;";
		$qqueryy=$this->db->query($fierst_step_queryStr);	
			print_r( $qqueryy->result_array());  */
			
			$qquery_ar_count= $qquery->num_rows();
			if($qquery_ar_count > 0) {
			$success_value = $this->config->item('success_value');
			
		    	$first_step_queryStr = "Select * from regression_test_info r join stock_info s on r.stock_id = s.stock_id where s.symbol = '".$_POST['stock']."' and r.trader_id = '".$qquery_ar[0]['trader_id']."'";
		$first_step_query = $this->db->query($first_step_queryStr);
		$first_stpe_count= $first_step_query->num_rows();
		//$first_stpe_count= 0;
		if($first_stpe_count > 0) {
			$first_step_succ_count = 0;
			foreach ($first_step_query->result_array() as $first_step_data) {
				if($first_step_data['test_result'] != 'Failure'){
					$first_step_succ_count = $first_step_succ_count + 1;
				} 
			}
            if($first_step_succ_count > 0){
				$approve_count = ($first_step_succ_count/$first_stpe_count) * 100;
				if($approve_count >= $success_value) {
					$final_result='Approved';
					$bol=1;
				} else {
					$final_result='DisApproved';
					$bol=0;
				}
			} else {
			$final_result='DisApproved';
            $bol=0;			
			}
             //$second_step_up = "UPDATE real_time_suggestion SET approved = '".$bol."', submitted= '1', symbol='".$_POST['stock']."' WHERE id = '".$_POST['id']."'";
			 if($_POST['sid']) {
				 if($_POST['bearish']){
					 $bar=1;
				 } else {
					 $bar=0;
				 }
				 $second_step_up = "UPDATE suggestions_ref SET approved = '".$bol."', submitted= '1', symbol='".$_POST['stock']."', bearish='".$bar."',notes='".$_POST['notes']."' WHERE id = '".$_POST['sid']."'";
				 
			 } else {
				 if($_POST['bearish']){
					 $bar=1;
				 } else {
					 $bar=0;
				 }
        $second_step_up = "INSERT INTO suggestions_ref(rt_suggestion_id, approved, submitted,symbol,bearish,notes) VALUES ('".$_POST['id']."', '".$bol."', '1','".$_POST['stock']."','".$bar."','".$_POST['notes']."')";
			 }
			// echo $second_step_up;
		$seond_step_up_query = $this->db->query($second_step_up);		
			//return $query->result_array();

           return $final_result;
		} else {
			$second_step_stock = "select sector from stock_info where symbol = '".$_POST['stock']."'";
		$second_step_stock_query = $this->db->query($second_step_stock);
       $second_step_stock_query_data = $second_step_stock_query->result_array();
	   $second_step_queryStr = "select * from regression_statistics_by_sector where trader_id = '".$qquery_ar[0]['trader_id']."' and sector = '".$second_step_stock_query_data[0]['sector']."'";
		$seond_step_query = $this->db->query($second_step_queryStr);
		$second_stpe_count= $seond_step_query->num_rows();
		//$second_stpe_count= 0;
	          if($second_stpe_count > 0) {
				 $second_step_query_data = $seond_step_query->result_array();
				  $approve_count = $second_step_query_data[0]['success_percentage'];
				  if($approve_count >= $success_value) {
					$final_result='Approved';
					$bol=1;
				} else {
					$final_result='DisApproved';
					$bol=0;
				}
			
		 //$second_step_up = "UPDATE real_time_suggestion SET approved = '".$bol."', submitted= '1', symbol='".$_POST['stock']."' WHERE id = '".$_POST['id']."'";
		// echo $second_step_up;
	if($_POST['sid']) {
				 if($_POST['bearish']){
					 $bar=1;
				 } else {
					 $bar=0;
				 }
		 $second_step_up = "UPDATE suggestions_ref SET approved = '".$bol."', submitted= '1', symbol='".$_POST['stock']."', bearish='".$bar."',notes='".$_POST['notes']."' WHERE id = '".$_POST['sid']."'";
				 
			 } else {

		     if($_POST['bearish']){
					 $bar=1;
				 } else {
					 $bar=0;
				 }
        $second_step_up = "INSERT INTO suggestions_ref(rt_suggestion_id, approved, submitted,symbol,bearish,notes) VALUES ('".$_POST['id']."', '".$bol."', '1','".$_POST['stock']."','".$bar."','".$_POST['notes']."')";
			 }
		$seond_step_up_query = $this->db->query($second_step_up);
        
				return $final_result.' '.$bol;
			  } else {
				  
				  $third_step_queryStr = "select * from regression_statistics_by_trader where trader_id = '".$qquery_ar[0]['trader_id']."'";
		$third_step_query = $this->db->query($third_step_queryStr);
		$third_stpe_count= $third_step_query->num_rows();
		if($third_stpe_count > 0) {
				 $third_step_query_data = $third_step_query->result_array();
				  $approve_count = $third_step_query_data[0]['success_percentage'];
				  if($approve_count >= $success_value) {
					$final_result='Approved';
					$bol=1;
				} else {
					$final_result='DisApproved';
					$bol=0;
				}
				//$second_step_up = "UPDATE real_time_suggestion SET approved = '".$bol."', submitted= '1', symbol='".$_POST['stock']."' WHERE id = '".$_POST['id']."'"; 
				if($_POST['sid']) {
					 if($_POST['bearish']){
					 $bar=1;
				 } else {
					 $bar=0;
				 }
		 $second_step_up = "UPDATE suggestions_ref SET approved = '".$bol."', submitted= '1', symbol='".$_POST['stock']."', bearish='".$bar."',notes='".$_POST['notes']."' WHERE id = '".$_POST['sid']."'";
				 
			 } else {
           if($_POST['bearish']){
					 $bar=1;
				 } else {
					 $bar=0;
				 }
        $second_step_up = "INSERT INTO suggestions_ref(rt_suggestion_id, approved, submitted,symbol,bearish,notes) VALUES ('".$_POST['id']."', '".$bol."', '1','".$_POST['stock']."','".$bar."','".$_POST['notes']."')";
			 }
				
		$seond_step_up_query = $this->db->query($second_step_up);
		//echo $second_step_up;
				return $final_result;
			  } else {
				$final_result='DisApproved'; 
				$bol=0;
               //  $second_step_up = "UPDATE real_time_suggestion SET approved = '".$bol."', submitted= '1', symbol='".$_POST['stock']."' WHERE id = '".$_POST['id']."'";
			  if($_POST['sid']) {
				 if($_POST['bearish']){
					 $bar=1;
				 } else {
					 $bar=0;
				 }
	 $second_step_up = "UPDATE suggestions_ref SET approved = '".$bol."', submitted= '1', symbol='".$_POST['stock']."', bearish='".$bar."',notes='".$_POST['notes']."' WHERE id = '".$_POST['sid']."'";
				 
			 } else {
           if($_POST['bearish']){
					 $bar=1;
				 } else {
					 $bar=0;
				 }
        $second_step_up = "INSERT INTO suggestions_ref(rt_suggestion_id, approved, submitted,symbol,bearish,notes) VALUES ('".$_POST['id']."', '".$bol."', '1','".$_POST['stock']."','".$bar."','".$_POST['notes']."')";
			 }
				 //echo $second_step_up;
		$seond_step_up_query = $this->db->query($second_step_up);				
				  return $final_result;
			  }
				}
   				
			  }
			  
        
		} else {
			$final_result = 'Trader is not found';
			return $final_result;
		}




			
		
	}
		public function stock_suggest_data($id)
		{
			$fierst_step_queryStr = "Select * from suggestions_ref where rt_suggestion_id='".$id."'";
			//$fierst_step_queryStr = "Select * from real_time_suggestion order by message_timestamp DESC ";
			
		$qqueryy=$this->db->query($fierst_step_queryStr);
			//$qquery_ar_count= $qqueryy->num_rows();
			//echo $qquery_ar_count;
		//print_r($qqueryy);
		$myJSON = $qqueryy->result_array();
		return $myJSON;
		
		}
		public function delete_stock_suggest_data()
		{
			$fierst_step_queryStr = "DELETE from suggestions_ref ";
			//$fierst_step_queryStr = "Select * from real_time_suggestion order by message_timestamp DESC ";
			
		$qqueryy=$this->db->query($fierst_step_queryStr);
			//$qquery_ar_count= $qqueryy->num_rows();
			//echo $qquery_ar_count;
		//print_r($qqueryy);
		
		
		}
	}
