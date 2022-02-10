<?php
require 'connection.php';


if(isset($_POST['complaint_submit'])){
	
      
      $comp_type = $_POST['comp_type'];
      $description = $_POST['description'];
      $uid=$_POST['lid_uid'];
      $location=$_POST['location'];
      $db = new DbConnect;
      $sql ="INSERT INTO `complaint`(`UID`, `comp_type`, `description`,`Loaction`) VALUES (" . $uid . "," . $comp_type . ",\"" . $description . "\",\"".$location."\");";
      echo $sql;

  if(!$conn = $db->connect()){
    echo'<script language="javascript">
        window.alert("SQL ERROR. Please check the SQL code ")
        </script>';
        exit();
  }
  else{
    $stmt= $conn->prepare($sql);
    $stmt->execute();
    echo '<script language="javascript">
        window.location.href = "../userDash.html"
        window.alert("Compliant Successfully added !")
        </script>';
    exit();
    }
}

?>
