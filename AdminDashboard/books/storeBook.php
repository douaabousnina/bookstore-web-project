<?php
require_once 'bookModel.php';


$errors = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = BookModel::validateBook($_POST);

    //Checking uniqueness
    if (count(BookModel::where("bid", $data['bid'])) == +1) $errors .= '<li>Book ID already exists!</li>';
    if (count(BookModel::where("bcoverid", $data['bcoverid'])) === 1) $errors .= '<li>Cover ID already exists!</li>';

    
    if ($errors === '') {
        $model = new BookModel();
        $isCreated = $model
            ->setBid($_POST['bid'])
            ->setBtitle($_POST['btitle'])
            ->setBdescription($_POST['bdescription'])
            ->setBauthor($_POST['bauthor'])
            ->setBcoverid($_POST['bcoverid'])
            ->setBprice($_POST['bprice'])
            ->addBook();

        if ($isCreated === true) {
            header('location: books.php');
        } else {
            $errors .= 'Cannot add book.';
        }
    }
}


require_once 'addBook.php';