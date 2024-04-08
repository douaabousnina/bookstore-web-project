<?php

//routing 

require_once 'controllers/bookController.php';

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'index':
            BookController::indexAction();
            break;
        case 'addBook':
            BookController::addBookAction();
            break;
        case 'editBook':
            BookController::editBookAction();
            break;
        case 'storeBook':
            BookController::storeBookAction();
            break;
        case 'updateBook':
            BookController::updateBookAction();
            break;
        case 'deleteBook':
            BookController::deleteBookAction();
            break;
    }
}
