<?php
    //Se agregan reponse headers, habilitando los metodos PUT, GET, POST y DELETE
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
    //Se crean las credenciales para el acceso a la base de datos
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'cars_db');

    function connect(){
        //Se conecta a la base de datos con las credenciales cargadas
        $connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        
        //Si hay un error al conectarse a la base de datos se muestra el mensaje
        //de error antes de terminar el proceso
        if(mysqli_connect_errno($connect)){
            die("Failed to connect:" . mysqli_connect_error());
        }

        mysqli_set_charset($connect, "utf8");
        return $connect;
    }

    $con = connect();
?>