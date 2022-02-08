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
		   $searchValueResult = " WHERE name LIKE '%".$searchValueData."%'  OR phone LIKE '%".$searchValueData."%' OR schoolname LIKE '%".$searchValueData."%' ";
		}
		
		//Query นับจำนวนข้อมูลทั้งหมด
		$t = mysqli_query($mysql_db,"SELECT COUNT(*) as total FROM students");
		$records = mysqli_fetch_assoc($t);
		$totalRecords = $records['total'];

		//Query ข้อมูลที่จะแสดงใน DataTable
		$sql = "SELECT * FROM students $searchValueResult LIMIT $start , $length";
		$result = mysqli_query($mysql_db, $sql);
		$kg = 'kg';
		
		$data = array();

		if (mysqli_num_rows($result) > 0) {

		  while($row = mysqli_fetch_assoc($result)) {
			$p1 = $row['poit1'];
			$p2 = $row['poit2'];
			$p3 = $row['poit3'];
			$p4 = $row['poit4'];
			$p5 = $row['poit5'];
			$p6 = $row['poit6'];
			$p7 = $row['poit7'];
			$p8 = $row['poit8'];
			$p9 = $row['poit9'];

			$kp1 = $p1 /1000;
			$kp2 = $p2/1000;
			$kp3 = $p3/1000;
			$kp4 = $p4/1000;
			$kp5 = $p5/1000;
			$kp6 = $p6/1000;
			$kp7 = $p7/1000;
			$kp8 = $p8/1000;
			$kp9 = $p9/1000;

			$kpf1 = number_format($kp1, 3, ',', '.');
			$kpf2 = number_format($kp2, 3, ',', '.');
			$kpf3 = number_format($kp3, 3, ',', '.');
			$kpf4 = number_format($kp4, 3, ',', '.');
			$kpf5 = number_format($kp5, 3, ',', '.');
			$kpf6 = number_format($kp6, 3, ',', '.');
			$kpf7 = number_format($kp7, 3, ',', '.');
			$kpf8 = number_format($kp8, 3, ',', '.');
			$kpf9 = number_format($kp9, 3, ',', '.');

			    $data[] = array(
					'name'=> $row['name'],
                    'poit1'=> $kpf1.$kg,
					'poit2'=> $kpf2.$kg,
					'poit3'=> $kpf3.$kg,
					'poit4'=> $kpf4.$kg,
					'poit5'=> $kpf5.$kg,
					'poit6'=> $kpf6.$kg,
					'poit7'=> $kpf7.$kg,
					'poit8'=> $kpf8.$kg,
					'poit9'=> $kpf9.$kg,
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