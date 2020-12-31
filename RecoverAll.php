<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

    require("Connection.php");
    $connection = returnConnection();

    $registers = mysqli_query($connection, "select ID, Description, Price from cars");
    $vec = [];

    while($register = mysqli_fetch_array($registers)){
        $vec[] = $register;
    }

    $cad = json_encode($vec);
    echo $cad;
    header('Content-Type: application/json');
?>