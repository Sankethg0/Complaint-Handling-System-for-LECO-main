<?php
require 'connection.php';

if(isset($_POST['complain_submit'])){				//Lecturer Upload LectureNotes into the database
	
		
  $lec_intdrop = $_POST['comp_type'];
      $lec_moduledrop3 = $_POST['description'];
      $name = $_POST['photo'];
      $module_desc = $_POST['status'];
      $lec_id = $_POST['lid'];

      $file_new_name ="0";
  
 


      $db = new DbConnect;
  $sql = "INSERT INTO `lecnotes`(`intake`, `relmID`, `name`, `module_desc`, `module_file`, `lec_id`) VALUES (" . $lec_intdrop . "," . $lec_moduledrop3 . ",\"" . $name . "\",\"" . $module_desc . "\",\"" . $file_new_name . "\"," . $lec_id . ");";

  echo $sql;

  if(!$conn = $db->connect()){
    echo'<script language="javascript">
        window.alert("SQL ERROR. Please check the SQL code ")
        </script>';
        exit();
  }
  else{
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    echo '<script language="javascript">
        window.location.href = "../adm_view_timetable.html"
        window.alert("New Time Table Created !")
        </script>';
        exit();
    }


?>
 //Update
 <?php

// php update data in mysql database using PDO

?>