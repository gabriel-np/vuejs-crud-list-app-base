<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "scotchbox";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $conn->prepare(" SELECT id, description, date_added, completed FROM dev_list ");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as &$v) {
      $v['description'] = utf8_encode($v['description']);
    }
    print json_encode($result);
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
$conn = null;
?>
