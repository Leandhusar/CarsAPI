<?php
    require('DataBase.php');

    //Obtiene los datos cargados en POST
    $postdata = file_get_contents("php://input");

    if(isset($postdata) && !empty($postdata)){
        //Extrae los datos del JSON, y se validan
        $request = json_decode($postdata);
        if(trim($request->number) === '' || (float)$request->amount < 0){
            return http_response_code(400);
        }   

        $number = mysqli_real_escape_string($con, trim($request->number));
        $amount = mysqli_real_escape_string($con, (int)$request->amount);   
        //Creardatos utilizando los policies
        $sql = "INSERT INTO `policies`(`id`,`description`,`price`) VALUES (null,'{$description}','{$price}')";  
        if(mysqli_query($con,$sql)){
            http_response_code(201);
            $policy = [
              'description' => $description,
              'price' => $price,
              'id' => mysqli_insert_id($con)
            ];
            echo json_encode($policy);
        }
        else{
            http_response_code(422);
        }
    }
?>