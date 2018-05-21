<?php 

class JDBQueryResult {
	private $_results = array();

	public function __construct(){}

	public function __set($var,$val){
		$this->_results[$var] = $val;
	}
	
	public function __get($var){  
		if (isset($this->_results[$var])){
			return $this->_results[$var];
		}
		else {
			return null;
		}
	}
}

class JDB {

	public function __construct(){}

	public function getAgency(){
		$sql = "SELECT DISTINCT agency_name FROM jtbl_jobs where datediff(current_date,closing_date) <= 120 ORDER BY agency_name ASC;"; //- internal 1 day
		return $this->query($sql);
	}

	public function getRegion(){
		$sql = "SELECT id, region_name FROM jtbl_region";
		return $this->query($sql);
	}

	public function getJobs(){
		$sql = "SELECT * FROM jtbl_jobs where datediff(current_date,closing_date) <= 120";
		return $this->query($sql);
	}

	// public function filterJobs($position,$agency,$region){
	// 	$condition = "";
	// 	if (!empty($position)){
	// 		$condition = " and position_title like '%".mysql_escape_string($position)."%'";
	// 	}
	// 	if (!empty($agency)){
	// 		$condition = $condition . " and agency_name = '$agency'";
	// 	}
	// 	if (!empty($region)){
	// 		$condition = $condition . " and region_name = '$region'";
	// 	}

	// 	$sql = "SELECT * FROM jtbl_jobs where datediff(current_date,closing_date) <= 120 $condition";
	// 	return $this->query($sql);
	// }
	// public function detailJobs($id){
	// 	$sql = "SELECT * FROM jtbl_jobs where id = $id";
	// 	return $this->query($sql);
	// }

	private function dbconnect() {
		$conn = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)
		or die ("<br/>Could not connect to MySQL server");

		mysql_select_db(DB_DB,$conn)
		or die ("<br/>Could not select the indicated database");

		return $conn;
	}

	private function query($sql){

		$this->dbconnect();

		$res = mysql_query($sql);

		if ($res){
			if (strpos($sql,'SELECT') === false){
				return true;
			}
		} 
		else {
			if (strpos($sql,'SELECT') === false){
				return false;
			}
			else {
				return null;
			}
		}

		$results = array();

		while ($row = mysql_fetch_array($res)){
			$result = new JDBQueryResult();
			foreach ($row as $k=>$v){
				$result->$k = $v;
			}
	
			$results[] = $result;
		}
		return $results;
  	}  
}
 
?>
