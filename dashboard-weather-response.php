
<?php
	//include connection file 
	include('connection.php');
	$db = new dbObj();
	$connString =  $db->getConnstring();
     
 
	$params = $_REQUEST;
	
	$action = isset($params['action']) != '' ? $params['action'] : '';
	$smpCls = new Sample($connString);
 
	switch($action) {
	  
	 default:
	 $smpCls->getSample($params);
	 return;
	 
	}
	
	class Sample {
	protected $conn;
	protected $data = array();
	function __construct($connString) {
		$this->conn = $connString;
	}
	
	public function getSample($params) {
	
		$this->data = $this->getRecords($params);
		
		echo json_encode($this->data);
	}
	  
	function getRecords($params) {
		$rp = isset($params['rowCount']) ? $params['rowCount'] : 10;
		
		if (isset($params['current'])) { $page  = $params['current']; } else { $page=1; };  
        $start_from = ($page-1) * $rp;
		
		$sql = $sqlRec = $sqlTot = $where = '';
		
		if( !empty($params['searchPhrase']) ) {   
			$where .=" WHERE ";
			$where .=" ( pgid LIKE '".$params['searchPhrase']."%' ";    
			$where .=" OR pgproject LIKE '".$params['searchPhrase']."%' ";

			$where .=" OR pgname LIKE '".$params['searchPhrase']."%' )";
	   }
	   // getting total number records without any search
		$sql = "SELECT * FROM weather";
		$sqlTot .= $sql;
		$sqlRec .= $sql;
		
		//concatenate search sql if value exist
		if(isset($where) && $where != '') {

			$sqlTot .= $where;
			$sqlRec .= $where;
		}
		if ($rp!=-1)
		$sqlRec .= " LIMIT ". $start_from .",".$rp;
		
		
		$qtot = mysqli_query($this->conn, $sqlTot) or die("error to fetch tot sample data");
		$queryRecords = mysqli_query($this->conn, $sqlRec) or die("error to fetch sample data");
		
		while( $row = mysqli_fetch_assoc($queryRecords) ) { 
			$data[] = $row;
		}

		$json_data = array(
			"current"            => intval($params['current']), 
			"rowCount"            => 10, 			
			"total"    => intval($qtot->num_rows),
			"rows"            => $data   // total data array
			);
		
		return $json_data;
	}
	 
	
	 
}
?> 