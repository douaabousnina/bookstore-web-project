<?php
    if (isset($_GET['limit'])){
        $limit = $_GET['limit'];
    }
    include '../connect.php';

    $query = "SELECT bid as id, btitle as title, bauthor as author, bcoverid as coverid, bprice as price
    FROM book 
    ORDER BY RAND()
    LIMIT $limit";
    //echo $query . "<br>";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $books = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $books['books'][] = array(
            'id' => $row['id'],
            'title' => $row['title'],
            'author' => $row['author'],
            'coverid' => $row['coverid'],
            'price' => $row['price']
        );
    }
    $result = array("status"=>1,"data" => $books);
    echo json_encode($result);
?>
