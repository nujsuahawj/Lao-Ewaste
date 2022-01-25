<?php

if(isset($_POST['start'])){
	
		$start = $_POST['start'];//รับข้อมูล เลขหน้าที่จะแสดง 
		
		$length = $_POST['length']; //รับข้อมูล จำนวนที่แสดงต่อหน้า ค่าเริ่มต้นคือ 10
		
		$searchData = $_POST['search']['value'];//รับข้อมูล ช่อง Search
		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "laos-ewaste";//ชื่อฐานข้อมูล

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		
		// Check connection
		if (!$conn) {
		  die("Connection failed: " . mysqli_connect_error());
		}

		$searchValueResult = "";
		
		$searchValueData = mysqli_real_escape_string($conn,$searchData); // Search value
		
		//Query กรณีมีการค้นหาข้อมูล
		if($searchValueData != ''){
		   $searchValueResult = " WHERE name LIKE '%".$searchValueData."%'  OR phone LIKE '%".$searchValueData."%' OR schoolname LIKE '%".$searchValueData."%' ";
		}
		
		//Query นับจำนวนข้อมูลทั้งหมด
		$t = mysqli_query($conn,"SELECT COUNT(*) as total FROM students");
		$records = mysqli_fetch_assoc($t);
		$totalRecords = $records['total'];

		//Query ข้อมูลที่จะแสดงใน DataTable
		$sql = "SELECT * FROM transictions $searchValueResult LIMIT $start , $length";
		$result = mysqli_query($conn, $sql);
		$g = 'g';
		
		$data = array();

		if (mysqli_num_rows($result) > 0) {

		  while($row = mysqli_fetch_assoc($result)) {

			    $data[] = array(
					'studentname'=> $row['studentname'],
					'schoolname'=> $row['schoolname'],
                    'siction'=> $row['siction']. $g,
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