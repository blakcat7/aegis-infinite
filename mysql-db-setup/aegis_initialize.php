<?php
/*  Purpose of this script is to check if the DB exists or not
 *  if not then the DB will be created on your localhost
 *  Along with the DB all the tables will also be imported from .sql file
 *  However, if the db does exists, and if you are trying to update, you will have to DROP the old database, and then run this script
 *  NOTE: Usage if this script is not important, you can simply import the sql file in your database.
 */
$hostname = 'localhost';
$port = '3306';                 // MAKE SURE PORT IS CORRECT
$username = 'root';
$password = '';
$db = 'aegis';
$file = 'aegis.sql';
$mysqli = new mysqli($hostname,$username,$password); 
if($mysqli->connect_error){
    die("Connection Failed: ".$mysqli->connect_error);
}
// Select DB
if(mysqli_select_db($mysqli, $db)){    
    
    echo 'DB '.$db.' Exists';
    die();
    
}else{
    
    // Create DB
    echo 'Couldn\' find \''.$db.'\' DB';
    echo '... Creating DB';
    $mysqli->query('CREATE DATABASE '.$db);
    
    if(!mysqli_select_db($mysqli, $db)){
        
        echo '... Unable to select '.$db.' ... terminating setup!';
        die();
    
    }else{     
          
        // Import
        $source = file_get_contents($file);
        if(mysqli_multi_query($mysqli, $source)){
            echo '... DB setup success';
        }else{
            echo '... DB setup failed';
        }
   
    }
}
$mysqli->close();
?>