<?php
    include('../../connect.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $cid=$_POST['cid'];
        $bid=$_POST['bid'];
        try {
            $query = "DELETE FROM command WHERE bid = :bid AND cid = :cid";
            $stmt = $pdo -> prepare($query);
            $stmt->bindParam(':cid', $cid);
            $stmt->bindParam(':bid', $bid);
            $stmt->execute();
            $pdo = null;
            header("Location: orders.php");
        }catch (PDOException $e){
            die("Query failed: " . $e->getMessage());
        }
    }
?>