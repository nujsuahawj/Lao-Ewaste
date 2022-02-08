<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
// $mysql_db = mysqli_connect("localhost", "root", "", "laos-ewaste");
include('./adminecogrowth/db.php');
 
// Check connection
if($mysql_db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
if(isset($_REQUEST["term"])){
    // Prepare a select statement
    $sql = "SELECT * FROM students WHERE sid like ?";
    $score = 'ຄະແນນ';
    
    if($stmt = mysqli_prepare($mysql_db, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        
        // Set parameters
        $param_term = $_REQUEST["term"] . '%';
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
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
                    echo "<p>" . $sspf."&nbsp;". $score. "</p>";
                }
            } else{
                echo "<p>ID ບໍ່ຖືກຕ້ອງ!</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysql_db);
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
}
 
// close connection
mysqli_close($mysql_db);
?>