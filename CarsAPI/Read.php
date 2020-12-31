<?php
    require('DataBase.php');

    $policies = [];
    $sql = "SELECT 'id', 'description', 'price' FROM policies";

    //Realiza la consulta, y carga los datos guardados en un vector
    //policies se convierte mas tarde en un JSON para pasarlo por API
    if($result = mysqli_query($con, $sql)){
        $i = 0;
        while($row = mysqli_fetch_assoc($result)){
            $policies[$i]['id'] = $row['id'];
            $policies[$i]['description'] = $row['description'];
            $policies[$i]['price'] = $row['price'];
            $i++;
        }
        echo json_encode($policies);
    }
    else{
        http_response_code(404);
    }
?>