<?php

if (isset($_POST['submit'])) {
   
    $cid = $_POST['cid'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $isAdmin = $_POST['isAdmin'] === 'user' ? 0 : 1 ;

    
    $host = 'localhost';
    $dbname = 'bookini';
    $user = 'root';
    $pass = '';
    $port = '3306';

    try {
        
        $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "UPDATE client SET firstname = :firstname, lastname = :lastname, email = :email, isAdmin = :isAdmin WHERE cid = :cid";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(':cid', $cid);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':isAdmin', $isAdmin );
        
        $stmt->execute();

       
        header("Location: clients.php");
        exit();
    } catch (PDOException $e) {
   
        echo "Error: " . $e->getMessage();
    }
} else {
    
    header("Location: clients.php");
    exit();
}
?>
