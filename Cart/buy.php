<?php
include '../connect.php';
$query = "UPDATE command SET `state` = 'processing' WHERE `state`='pending' AND cid = " . $_SESSION['id'];
$stmt = $pdo->prepare($query);
try {
    $stmt->execute();
    $result = array("status"=>1,"message" => "Confirmed Command");
} catch (Exception $e){
    $result = array("status"=>0,"message" => "Failed to confirm command");
}
echo json_encode($result);
?>