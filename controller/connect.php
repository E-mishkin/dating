<?php

//Connect to db
$username = 'emishkin_grcuser';
$password = 'jenekusa123';
$hostname = 'localhost';
$database = 'emishkin_grc';

$cnxn = mysqli_connect($hostname, $username, $password, $database);

//Test connection
if ($cnxn) {
    echo "<p>Connected!</p>";
} else {
    echo mysqli_connect_error();
}
