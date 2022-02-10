<?php


if(isset($_POST['login_btn'])){

    require 'connection.php';

    $username=$_POST['username'];
    $password=$_POST['password'];
    
    if(empty($username) | empty($password)){
        echo '<script language="javascript">
            window.alert("Enter the Login Information");
            window.location.href="../index.html";
        </script>';
    }else{
        $sql = "SELECT * FROM login WHERE username=\"" . $username . "\"";
        $db = new DbConnect;

        if(!$conn = $db->connect()){
            echo '<script language="javascript">
            window.alert(SQL Error");
            window.location.href="../index.html";
            </script>';
            exit();
        }else{
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            if($result = $stmt->fetchAll(PDO::FETCH_ASSOC)){

                $passwordveri;
                $ID;
                $status;

                foreach($result as $rows){
                    $passwordveri = $rows['password'];
                    $ID = $rows['LID'];
                    $status = $rows['type'];
                }

                $pwdcheck=false;

                if($password==$passwordveri){
                    $pwdcheck=true;  
                }

                if($pwdcheck==false){
                    echo'<script language="javascript">
                    window.alert("You enetered a Wrong password")
                    window.location.href="../index.html"
                    </script>';
                    exit();
                }else if($pwdcheck==true){
                    switch ($status) {
                        case 1:
                                $sql1="SELECT * FROM `admin` WHERE LID = " . $ID . "";
                                $stmt1=$conn->prepare($sql1);
                                $stmt1->execute();
                                if($result1=$stmt1->fetchAll(PDO::FETCH_ASSOC)){
                                    $name;
                                    foreach($result1 as $rows){
                                        $name=$rows['Name'];
                                        $email=$rows['Email'];
                                        $add=$rows['AID'];                        //store username and email

                                        
                                    }
                                    echo '<script language="javascript">
                                        localStorage.setItem("Name","'.$name.'");
                                        localStorage.setItem("Email","'.$email.'");
                                        localStorage.setItem("Admin","'.$add.'");
                                        window.alert("Login Successful");
                                        window.location.href="../adminDash.html";
                                        </script>'; 
                                        exit();

                                }
                                
                                break;
                        case 2:
                            $sql1="SELECT * FROM `user` WHERE LID = " . $ID . "";
                            $stmt1=$conn->prepare($sql1);
                            $stmt1->execute();
                            if($result1=$stmt1->fetchAll(PDO::FETCH_ASSOC)){
                                $name;
                                foreach($result1 as $rows){
                                    $name=$rows['Name'];                        //store username and email
                                    $email=$rows['Email'];
                                    $user=$rows['UID'];
                                    
                                }
                                echo '<script language="javascript">
                                    localStorage.setItem("Name","'.$name.'");
                                    localStorage.setItem("Email","'.$email.'");
                                    localStorage.setItem("UID",'.$user.');
                                    window.alert("Login Successful");
                                    window.location.href="../userDash.html";
                                    </script>'; 
                                    exit();

                            }
                            
                            break;
                            default :
                                echo " System Error";
                                exit();
                    }
                }
            } 
        }
    }
}
?>