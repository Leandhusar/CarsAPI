<?php
    function retornarConexion(){
        $connection = mysqli_connect("localhost","root","","bd1");
        return $con;
    }
?>