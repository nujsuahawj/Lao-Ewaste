<?php

if(isset($_POST['start'])){
	
		$start = $_POST['start'];//รับข้อมูล เลขหน้าที่จะแสดง 
		
		$length = $_POST['length']; //รับข้อมูล จำนวนที่แสดงต่อหน้า ค่าเริ่มต้นคือ 10
		
		$searchData = $_POST['search']['value'];//รับข้อมูล ช่อง Search
		
		include 'db.php';

		$searchValueResult = "";
		
		$searchValueData = mysqli_real_escape_string($mysql_db,$searchData); // Search value
		
		//Query กรณีมีการค้นหาข้อมูล
		if($searchValueData != ''){
		   $searchValueResult = " WHERE name LIKE '%".$searchValueData."%'  OR phone LIKE '%".$searchValueData."%' OR schoolname LIKE '%".$searchValueData."%' OR sid LIKE '%".$searchValueData."%' ";
		}
		
		//Query นับจำนวนข้อมูลทั้งหมด
		$t = mysqli_query($mysql_db,"SELECT COUNT(*) as total FROM students");
		$records = mysqli_fetch_assoc($t);
		$totalRecords = $records['total'];

		//Query ข้อมูลที่จะแสดงใน DataTable
		$sql = "SELECT * FROM students $searchValueResult LIMIT $start , $length";
		$result = mysqli_query($mysql_db, $sql);
		
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

			  $sp1 = $p1*0.7/100;
			  $sp2 = $p2*0.08/100;
			  $sp3 = $p3*0.07/100;
			  $sp4 = $p4*0.06/100;
			  $sp5 = $p5*0.03/100;
			  $sp6 = $p6*0.02/100;
			  $sp7 = $p7*0.01/100;
			  $sp8 = $p8*0.01/100;
			  $sp9 = $p9*0.01/100;

			  $ssp = $sp1 + $sp2 + $sp3 + $sp4 + $sp5 + $sp6 + $sp7 + $sp8 +$sp9;

			  $sspf = number_format($ssp, 3, ',', '.');

			    $data[] = array(
					'name'=> $row['name'],
					'phone'=> $row['phone'],
					'schoolname'=> $row['schoolname'],
                    		'sid'=> $row['sid'],
					'poit'=> $sspf,
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