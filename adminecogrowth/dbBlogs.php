<?php

if(isset($_POST['start'])){
	
		$start = $_POST['start'];//รับข้อมูล เลขหน้าที่จะแสดง 
		
		$length = $_POST['length']; //รับข้อมูล จำนวนที่แสดงต่อหน้า ค่าเริ่มต้นคือ 10
		
		$searchData = $_POST['search']['value'];//รับข้อมูล ช่อง Search
		
		include ('db.php');

		$searchValueResult = "";
		
		$searchValueData = mysqli_real_escape_string($mysql_db,$searchData); // Search value
		
		//Query กรณีมีการค้นหาข้อมูล
		if($searchValueData != ''){
		   $searchValueResult = " WHERE title LIKE '%".$searchValueData."%'  OR detials LIKE '%".$searchValueData."%' OR detials1 LIKE '%".$searchValueData."%' ";
		}
		
		//Query นับจำนวนข้อมูลทั้งหมด
		$t = mysqli_query($mysql_db,"SELECT COUNT(*) as total FROM blos");
		$records = mysqli_fetch_assoc($t);
		$totalRecords = $records['total'];

		//Query ข้อมูลที่จะแสดงใน DataTable
		$sql = "SELECT * FROM blos $searchValueResult LIMIT $start , $length";
		$result = mysqli_query($mysql_db, $sql);
		
		$data = array();

		if (mysqli_num_rows($result) > 0) {

		  while($row = mysqli_fetch_assoc($result)) {

			    $data[] = array(
					'title'=> $row['title'],
					'detials1'=> $row['detials1'],
				);
		  }
		}

		mysqli_close($mysql_db);

		$json_data = array(
			"draw"            => intval( $_REQUEST['draw'] ),   
			"recordsTotal"    => intval($totalRecords ),  
			"recordsFiltered" => intval($totalRecords),
			"data"            => $data   // total data array
		);

		echo json_encode($json_data);
	
}


?>