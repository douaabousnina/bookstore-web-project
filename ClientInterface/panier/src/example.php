<?php
$host = 'localhost';
$dbname = 'db1';
$user = 'postgres';
$pass = 'ChickenWings';
$port = '5432';
// establish a connection
$pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $pass);
// prepare a statement to be executed
$stmt = $pdo->prepare('SELECT * FROM booker');
// execute the statement
$stmt->execute();
// fetch the results
while ($row = $stmt->fetch()) {
    echo $row + "<br>";
}
// close the connection
$pdo = null;
?>