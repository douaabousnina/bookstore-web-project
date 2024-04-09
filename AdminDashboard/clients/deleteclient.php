<?php

$host = 'localhost';
$dbname = 'bookini';
$user = 'root';
$pass = '';
$port = '3306';

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cid = $_POST['cid'];

        $query = "DELETE FROM client WHERE cid = :cid";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':cid', $cid);
        $stmt->execute();

        header("Location: clients1.php");
        exit(); 
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
