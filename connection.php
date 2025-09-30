<?php
    $serverName = "loclhost";
    $userName = "root";
    $password = "";
    $dbName = "blood_bank_system";

    if(!$con = mysqli_connect($serverName, $userName, $password, $dbName))
    {
        die("failed to connect!");
    }
?>