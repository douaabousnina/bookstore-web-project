<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $cid=$_POST['cid'];
        $bid=$_POST['bid'];
        $cdate=$_POST['cdate'];
        $state=$_POST['state'];


        try {
            $query = "UPDATE command AS c SET cdate = :cdate,state= :state WHERE c.cid =:cid AND c.bid = :bid";
            $stmt = $pdo -> prepare($query);
            $stmt->bindParam(':cid',$cid);
            $stmt->bindParam(':bid',$bid);
            $stmt->bindParam(':cdate',$cdate);
            $stmt->bindParam(':state',$state);
            $stmt->execute();
            $pdo = null;
            header("Location: orders.php");
        }catch (PDOException $e){
            die("Query failed: " . $e->getMessage());
        }

    }
?>