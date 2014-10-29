<?php

require_once(__DIR__ . "/../model/database.php"); //opens database code in mdoel folder

$connection = new mysqli($host, $username, $password); //uses mysqli to create the connection

if($connection->connect_error) {
    die("Error: " . $connection->connect_error); //kills code so nothing appears if there's no connection
}

$exists = $connection->select_db($database); //selects database

if(!$exists) {
   $query = $connection->query("CREATE DATABASE $database");

   if($query) {
       echo "Successfully created databse: " . $database; //runs this code if the database is successful (if it exists)
   }
}
else{
    echo "database already exists.";
}


$connection->close();