<?php ob_start();
$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "godpro";
$db['db_name'] = "teamwork";

foreach($db as $key => $value){
define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST, DB_USER,DB_PASS,DB_NAME);

// if($connection) {
// echo "Database connected";
// }

// $connection = mysqli_connect('localhost', 'root', 'godpro', 'cms');  
// if($connection) {
//     die("Database connected");
// }

