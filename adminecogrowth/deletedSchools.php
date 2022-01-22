<?php

include("db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM schools WHERE id = $id";
  $result = mysqli_query($mysql_db, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'student Removed Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: School.php');
}

?>
