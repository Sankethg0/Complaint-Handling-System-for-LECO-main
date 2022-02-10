<?php

    require 'connection.php';

    if(isset($_POST['viewcomplaint'])){
        $db = new DbConnect;
        $conn = $db->connect();
        $stmt = $conn->prepare("SELECT * FROM `complaint`");
        $stmt->execute();
        $vcomplaint = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($vcomplaint);
    }

?>