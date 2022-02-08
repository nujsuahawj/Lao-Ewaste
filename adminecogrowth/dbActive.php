<?php

if(isset($_POST['start'])){
	
		$start = $_POST['start'];//รับข้อมูล เลขหน้าที่จะแสดง 
		
		$length = $_POST['length']; //รับข้อมูล จำนวนที่แสดงต่อหน้า ค่าเริ่มต้นคือ 10
		
		$searchData = $_POST['search']['value'];//รับข้อมูล ช่อง Search
		
		define('DB_SERVER', 'localhost');
		define('DB_USERNAME', 'root');
		define('DB_PASSWORD', '');
		define('DB_NAME', 'laos-ewaste');

		// Attempt to connect to MySQL database
		$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);//ชื่อฐานข้อมูล
		
		// Check connection
		if (!$conn) {
		  die("Connection failed: " . mysqli_connect_error());
		}

		$searchValueResult = "";
		
		$searchValueData = mysqli_real_escape_string($conn,$searchData); // Search value
		
		//Query กรณีมีการค้นหาข้อมูล
		if($searchValueData != ''){
		   $searchValueResult = " WHERE studentname LIKE '%".$searchValueData."%'  OR schoolname LIKE '%".$searchValueData."%' OR detials LIKE '%".$searchValueData."%' ";
		}
		
		//Query นับจำนวนข้อมูลทั้งหมด
		$t = mysqli_query($conn,"SELECT COUNT(*) as total FROM students");
		$records = mysqli_fetch_assoc($t);
		$totalRecords = $records['total'];

		//Query ข้อมูลที่จะแสดงใน DataTable
		$sql = "SELECT * FROM transictions $searchValueResult LIMIT $start , $length";
		$result = mysqli_query($conn, $sql);
		
		$data = array();

		if (mysqli_num_rows($result) > 0) {

		  while($row = mysqli_fetch_assoc($result)) {
				$vnsiction = '';
				$nsiction = $row['siction'];
				if($nsiction == 45){
					$vnsiction = 'masks-screened';
				}
				if($nsiction == 55){
					$vnsiction = 'cotton bag';
				}
				if($nsiction == 105){
					$vnsiction = 'train ticket(103.000k-Vangvieng)';
				}
				if($nsiction == 200){
					$vnsiction = 'train ticket(198.000k-LPB)';
				}

			    $data[] = array(
					'studentname'=> $row['studentname'],
					'schoolname'=> $row['schoolname'],
					'siction'=> $vnsiction,
					'detials'=> $row['detials'],
					'updated'=> $row['created_at'],
				);
		  }
		}

		mysqli_close($conn);

		$json_data = array(
			"draw"            => intval( $_REQUEST['draw'] ),   
			"recordsTotal"    => intval($totalRecords ),  
			"recordsFiltered" => intval($totalRecords),
			"data"            => $data   // total data array
		);

		echo json_encode($json_data);
	
}


?>