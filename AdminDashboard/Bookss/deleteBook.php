<?php

require_once 'bookModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $isDeleted = BookModel::deleteBook($_GET['bid']);
    if ($isDeleted === true) {
        header('location: books.php');
    } else
        die("Cannot delete book.");
}
