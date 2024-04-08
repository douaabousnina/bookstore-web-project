<?php

require './models/bookModel.php';

class BookController
{
    private static $bookModel;

    //redirections:

    /**
     * @param string $view
     */
    private static function view($view, $data = NULL)
    {
        if (!is_null($data)) extract($data);
        require 'views/' . $view . '.php';
    }



    public static function indexAction()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $perPage = 50; 
        $books = BookModel::listBooks($page, $perPage);
        $totalBooks = BookModel::getTotalBooks();

        if(count($books)==0) header('location: index.php?action=index'); //cas ou l utilisateur met une valeur de page invalide manuellement

        static::view('books', [
            'books' => $books,
            'totalBooks' => $totalBooks,
            'perPage' => $perPage,
            'currentPage' => $page
        ]);
    }

    public static function addBookAction()
    {
        static::view('addBook', ['errors' => '']);
    }

    public static function editBookAction()
    {
        $book = static::getBookModel()->viewBook($_GET['bid']);
        static::view('editBook', [
            'book' => $book,
            'errors' => ''
        ]);
    }



    //actual actions hhh

    /**
     * @return bookModel
     */
    public static function getBookModel()
    {
        if (is_null(static::$bookModel))
            static::$bookModel = new BookModel();
        return static::$bookModel;
    }

    private static function validateBook($data)
    {

        $errors = '';

        // Controle de saisie
        if (!preg_match("/^\/works\/OL\d{7}W$/", $data['bid'])) {
            $errors .= '<li>Invalid book id format!</li>';
        }
        if (!(preg_match('/[A-Za-z0-9]/', $data['btitle']) && strlen($data['btitle']) < 30 && $data['btitle'] != "")) {
            $errors .= '<li>Invalid book title format!</li>';
        }
        if (!(strlen($data['bdescription']) < 200 && $data['bdescription'] != '')) {
            $errors .= '<li>Invalid description format!</li>';
        }
        if (!(strlen($data['bauthor']) < 30 && $data['bauthor'] != "")) {
            $errors .= '<li>Invalid author name!</li>';
        }
        if (!preg_match("/^OL\d{7}M$/", $data['bcoverid'])) {
            $errors .= '<li>Invalid cover id format!</li>';
        }
        if (!preg_match('/^\d+(\.\d{1,3})?$/', $data['bprice'])) {
            $errors .= '<li>Invalid price format!</li>';
        }

        //Checking uniqueness
        if(count(static::getBookModel()->where("bid",$data['bid']))==+1) $errors .= '<li>Book ID already exists!</li>';
        if(count(static::getBookModel()->where("bcoverid",$data['bcoverid']))===1) $errors .= '<li>Cover ID already exists!</li>';

        return $errors;
    }

    public static function storeBookAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errors = static::validateBook($_POST);
            
            if ($errors === '') {
                $isCreated = static::getBookModel()
                    ->setBid($_POST['bid'])
                    ->setBtitle($_POST['btitle'])
                    ->setBdescription($_POST['bdescription'])
                    ->setBauthor($_POST['bauthor'])
                    ->setBcoverid($_POST['bcoverid'])
                    ->setBprice($_POST['bprice'])
                    ->addBook();

                if ($isCreated === true) {
                    header('location: index.php?action=index');
                } else {
                    $errors .= 'Cannot add book.';
                }
            } else {
                static::view('addBook', ['errors' => $errors]);
            }
        }
    }

    public static function updateBookAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errors = static::validateBook($_POST);
            if ($errors === '') {
                $isEdited = static::getBookModel()
                    ->setBtitle($_POST['btitle'])
                    ->setBdescription($_POST['bdescription'])
                    ->setBauthor($_POST['bauthor'])
                    ->setBcoverid($_POST['bcoverid'])
                    ->setBprice($_POST['bprice'])
                    ->updateBook($_GET['bid']);
                if ($isEdited === true)
                    header('location: index.php?action=index');

                else
                    $errors .= "Cannot edit book.";
            } else {
                static::view('editBook', [
                    'errors' => $errors,
                    'book' => static::getBookModel()->viewBook($_GET['bid'])
                ]);
            }
        }
    }

    public static function deleteBookAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $isDeleted = static::getBookModel()->deleteBook($_GET['bid']);
            if ($isDeleted === true) {
                header('location: index.php?action=index');
            } else
                die("Cannot delete book.");
        }
    }
}
