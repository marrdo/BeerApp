<?php
$servername = "localhost";
$username = "beerapp";
$password = "root";
$dbname = "beerapp";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    
    $stmt = $conn->query("SELECT * FROM Users");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print_r($rows);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
