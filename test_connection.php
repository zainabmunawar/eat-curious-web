<?php
$hname = 'localhost';
$uname = 'root';
$pass = '';
$db = 'restaurant';

$con = new mysqli($hname, $uname, $pass, $db);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} else {
    echo "Database connection successful!";
}
?>