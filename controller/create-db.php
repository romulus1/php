<?php

require_once(__DIR__ . "/../model/database.php"); //opens database code in mdoel folder

$connection = new mysqli($host, $username, $password); //uses mysqli to create the connection

if($connection->connect_error) { //creates an if statement and runs the code if the connection is not avialable
    die("<p>Error: " . $connection->connect_error . "</p>"); //kills code so nothing appears if there's no connection
}

$exists = $connection->select_db($database); //selects database

if(!$exists) { //if statement checks if server exists
   $query = $connection->query("CREATE DATABASE $database"); //adds database to the query

   if($query) { //if statement echo out code if the database exists
       echo "<p>Successfully created databse: " . $database . "</p>"; //runs this code if the database is successful (if it exists)
   }

}
else{ //else runs if database already exists
    echo "<p>database already exists.</p>"; //runs if database exists
}

$query = $connection->query("CREATE TABLE posts (" //creates table
        . "id int(11) NOT NULL AUTO_INCREMENT," //creates ids
        . "title varchar(285) NOT NULL,"
        . "post text NOT NULL,"
        . "PRIMARY KEY (id))");

if($query) {
    echo "successfully create table: posts"; //echos if it checks the query id and it exists
}
else{
    echo "<p>$connection->error</p>"; //checks if there's an error and prints it out as a paragraph
}

$connection->close(); //close connection with the server
