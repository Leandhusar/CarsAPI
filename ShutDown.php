<?php 
    header('Access-Control-Allow-Origin: *'); 
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
    require("Connection.php");
    $connection = returnConnection();
    
    mysqli_query($connection, "delete from cars where ID=$_GET[ID]");
    
    class Result{}

    $response = new Result();
    $response->result = 'OK';
    $response->message = 'Car Deleted';

    header('Content-Type: application/json');
    echo json_encode($response);  
?>