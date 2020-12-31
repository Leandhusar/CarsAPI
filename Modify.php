<?php 
    header('Access-Control-Allow-Origin: *'); 
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

    $json = file_get_contents('php://input');
    $params = json_decode($json);

    require("Connection.php");
    $connection = returnConnection();

    mysqli_query($connection, "update cars set Description='$params->Description', 
                Price=$params->Price where ID=$params->ID");
    
    class Result {}

    $response = new Result();
    $response->result = 'OK';
    $response->message = 'Data Modified';

    header('Content-Type: application/json');
    echo json_encode($response);  
?>