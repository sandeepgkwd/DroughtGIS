
<?php
	//include connection file 	
	include('connection.php');
		 
			 
     
		if(isset($_SESSION['suid'])){
		 
		$uid=$_SESSION['suid'];
			$uid = mysqli_real_escape_string($con, $uid);
			 
		}else{
			 // i will add code here
			
		}
	
	  
	$db = new dbObj();
	$connString =  $db->getConnstring();

	$params = $_REQUEST;
	
	$action = isset($params['action']) != '' ? $params['action'] : '';
	$smpCls = new Sample($connString);

	switch($action) {
	 case 'add':
		$smpCls->insertSample($params);
	 break;
	 case 'edit':
		$smpCls->updateSample($params);
	 break;
	 case 'delete':
		$smpCls->deleteSample($params);
	 break;
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
	function insertSample($params) {
		$data = array();;
		
		//$p=$_FILES['pgphoto']['name'];
					
		$sql = "INSERT INTO project (pname,pdetail, uid ) VALUES('" . $params["pname"] . "','" . $params["pdetail"] . "','" . $uid. "');  ";
		echo $result = mysqli_query($this->conn, $sql) or die("error to insert sample data");
		
	}
	
	
	function getRecords($params) {
		$rp = isset($params['rowCount']) ? $params['rowCount'] : 10;
		
		if (isset($params['current'])) { $page  = $params['current']; } else { $page=1; };  
        $start_from = ($page-1) * $rp;
		
		$sql = $sqlRec = $sqlTot = $where = '';
		
		if( !empty($params['searchPhrase']) ) {   
			$where .=" WHERE ";
			$where .=" ( pid LIKE '".$params['searchPhrase']."%' ";    
			$where .=" OR pname LIKE '".$params['searchPhrase']."%' ";

			$where .=" OR pdetail LIKE '".$params['searchPhrase']."%' )";
	   }
	   
	   // getting total number records without any search
		$sql = "SELECT pid, pname, pdetail FROM project";
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
	function updateSample($params) {
	//echo"<h1>Hello hi</h1>";
		$data = array();
		//print_R($_POST);die;
		$sql = "update project set pname = '" . $params["edit_pname"] . "', pdetail='" . $params["edit_pdetail"] . "' WHERE pid='".$_POST["edit_pid"]."'";
		
		echo $result = mysqli_query($this->conn, $sql) or die("error to update employee data");
	}
	
	function deleteSample($params) {
		$data = array();
		//print_R($_POST);die;
		$sql = "delete from project WHERE pid='".$params["id"]."'";
		
		echo $result = mysqli_query($this->conn, $sql) or die("error to delete sample data");
	}
}
?>
	