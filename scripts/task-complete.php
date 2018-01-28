<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "scotchbox";

try {
    $id = $_GET['id'];
    $completed = $_GET['completed'];
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = " UPDATE dev_list SET completed='$completed' WHERE id='$id' ";
    $conn->exec($sql);
    echo "Task completed";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
$conn = null;
?>
