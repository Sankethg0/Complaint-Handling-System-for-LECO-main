<?php

if(isset($_POST['update']))
{
    
    try {
        $pdoConnect = new PDO("mysql:host=localhost;dbname=lecodb","root","");
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        exit();
    }  
    $status_update = $_POST['status_update']; 
    $update = [
        'status'=>$status_update
    ];
    // mysql query to Update data
    $sql = 'UPDATE complaint SET status=:status';
    $stmt=$pdoConnect->prepare($sql);
    $stmt->bindParam(':status',$update['status'],PDO::PARAM_INT);

    //$query = "UPDATE `complaint` SET `status`=".$status_update."";

    
    if($stmt->execute())
    {   
        echo '<script language="javascript">
        window.alert("Updated");
        window.location.href="processingComplaints.php";
        </script>';
    }else{
        echo '<script language="javascript">
        window.alert("Could not Update");
        window.location.href="processingComplaints.php";
        </script>';
    }
}
?>