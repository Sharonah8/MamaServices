<?php

    $yourName = $_POST['yourName'];
    $emailAddress = $_POST['emailAddress'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $serviceType = $_POST['serviceType'];

    //Database connection
    $conn = new mysqli('localhost','root','','mamaservices');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connection_error);
    }else{
        // $sql = "INSERT INTO appointment(name, email, date, time, service) VALUES ('$yourName','$emailAddress','$date','$time','$serviceType')";
        // if (mysqli_query($conn,$sql)) 
        // {
        //      echo "Successfully Added"; 
        //     }
        // else{
        //      echo "Failed to Add"; 
        //     }
        //     mysqli_close($conn);

        $stmt = $conn->prepare("INSERT INTO appointment(name, email, date, time, service) VALUES ('$yourName','$emailAddress','$date','$time','$serviceType')");
        $stmt->execute();
        echo "Appointment Successfully booked";
        $stmt->close();
        $conn->close();
    }


?>