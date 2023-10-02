<?php
    $servername = "DESKTOP-SF7OLNN\SQLEXPRESS";
    $connectionInfo = array("Database"=>"gate-pass","UID"=>"sa","PWD"=>"12345","CharacterSet" => "UTF-8");
    $con =sqlsrv_connect($servername,$connectionInfo);

    if($con) {
        // echo "connection established.<br />";
        
    }else{
        echo "connection could not be established.<br/>";
        die(print_r( sqlsrv_errors(), true));
        
    }
?>