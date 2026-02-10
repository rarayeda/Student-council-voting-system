<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "voting";

try {
    $connect = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    echo "error :" . $e->getMessage();
}
