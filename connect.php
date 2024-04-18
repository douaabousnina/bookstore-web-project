<?php
include_once 'book.php';
session_start();
$host = 'localhost';
$dbname = 'bookini';
$user = 'root';
$pass = '';
$port = '3306';
// establish a connection
$pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $pass);
