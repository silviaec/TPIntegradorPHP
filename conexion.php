<?php
$hostname = 'localhost';
$database = 'tpintegrador';
$username = 'root';
$pass = '';

    try{
        $con = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
        //print "Conexión con la base de datos realizada con éxito";
    }
    catch(PDOExeption $e){
        print "¡No se pudo conectar con el servidor!: ".$e->getMessage();
        die();
    }
    
?>
