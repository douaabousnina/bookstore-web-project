<?php
include '../connect.php';

if (isset($_GET['id'])){
    $id = $_GET['id'];
}

$query = "INSERT INTO command(bid, cid, cdate, state)
VALUES ('$id', 1, CURRENT_DATE(), 'pending')";
$stmt = $pdo->prepare($query);
try {
    $stmt->execute();
    $result = array("status"=>1,"message" => "Book added to cart");
} catch (Exception $e){
    $result = array("status"=>0,"message" => "Failed to add book to cart");
}
echo json_encode($result);
?>