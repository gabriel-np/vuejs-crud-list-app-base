<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "scotchbox";

try {
    $id = $_GET['id'];
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = " DELETE FROM dev_list WHERE id='$id' ";
    $conn->exec($sql);
    echo "Task deleted.";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
$conn = null;
?>
