<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "scotchbox";

try {
    $task = $_GET['task'];
    $d = $_GET['date'];
    $date = date('Y-m-d H:i:s', $d);
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password,
      array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
    );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = " INSERT INTO dev_list (description, date_added) VALUES ('$task', '$date') ";
    $conn->exec($sql);
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
$conn = null;
?>
