<?php
    $dbserver = 'localhost';
    $dbusername = 'Faust';
    $dbpassword = 'Phu0ng95crA';
    $dbname = 'mxh12a2';

    $connect = new mysqli($dbserver, $dbusername, $dbpassword, $dbname);
    $connect->set_charset("utf8mb4");
    if ($connect->connect_error) {
        die($connect->connect_error);
    }
?>