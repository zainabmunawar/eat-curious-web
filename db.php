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

function filtration($data)
{
    foreach ($data as $key => $value) {
        if (is_array($value)) {
            $data[$key] = filtration($value); // Recursive filtration for nested arrays
        } elseif (is_string($value)) {
            $value = trim($value);  // Removes whitespace
            $value = stripslashes($value); // Removes backslashes
            $value = strip_tags($value); // Strips HTML/PHP tags
            $value = htmlspecialchars($value); // Converts special characters
            $data[$key] = $value;
        }
    }
    return $data;
}

function insert($sql, $values, $datatypes)
{
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) { //prepare statement here $sql => "INSERT INTO features(name) VALUES (?)";
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values); //=>Links the placeholders in $sql to the actual values in $values.(...$values=>Splat Operator)
        if (mysqli_stmt_execute($stmt)) {  //=>Executes the prepared statement with the bound values
            $res = mysqli_stmt_affected_rows($stmt); //Retrieves the number of affected rows after executing the statement
            mysqli_stmt_close($stmt); //Closing the Statement
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query cannot be executed - Insert");
        }
    } else {
        die("Query cannot be prepared - Insert");
    }
}


 ?>
