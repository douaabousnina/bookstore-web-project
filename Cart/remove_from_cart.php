<?php
include '../connect.php';
$id = '';
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
$query = "DELETE FROM command WHERE cid = ". $_SESSION['id'] . " AND bid = '" . $id . "'";
$stmt = $pdo->prepare($query);
try {
    $stmt->execute();
    $result = array("status"=>1,"message" => "Book removed from cart");
} catch (Exception $e){
    $result = array("status"=>0,"message" => "Failed to remove book from cart");
}
echo json_encode($result);
?>