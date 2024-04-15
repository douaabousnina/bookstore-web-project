<?php

session_start();


if ($_SESSION['adminAuth'] !== 'yes') {
    header('location: ../Index.php');
    exit();
}
