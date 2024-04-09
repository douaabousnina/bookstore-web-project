<?php

require_once 'bookModel.php';


$errors="";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = BookModel::validateBook($_POST);
    if ($errors === '') {echo 'test1';
        $model = new BookModel();
        echo 'test2';
        $isEdited = $model
            ->setBtitle($_POST['btitle'])
            ->setBdescription($_POST['bdescription'])
            ->setBauthor($_POST['bauthor'])
            ->setBcoverid($_POST['bcoverid'])
            ->setBprice($_POST['bprice'])
            ->updateBook($_GET['bid']);
            echo 'test3';
        if ($isEdited === true)
            header('location: books.php');
        else
            $errors .= "Cannot edit book.";
    }
}

require_once 'editBook.php';