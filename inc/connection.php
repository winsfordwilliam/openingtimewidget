<?php

//connection to the database
try{
$db = new PDO("sqlite:" .__DIR__ ."/openingtime.db");
$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}CATCH(Exception $e){
    echo "Unable to connect to the database";
    //error messaging
    //echo "\n";
    //echo $e -> getMessage();
    exit;
}