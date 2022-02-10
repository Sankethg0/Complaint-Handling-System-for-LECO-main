<?php
require 'connection.php';

if(isset($_POST['update']))
{ 
    $cid=$_POST['id'];
    $db= new DbConnect;
    $sql = "UPDATE `complaint` SET `status`=1 WHERE `CID`=$cid"; 
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
            window.location.href = "notyetattended.php"
            window.alert("Compliant Successfully Finished !")
            </script>';
        exit();
        }
}
?>