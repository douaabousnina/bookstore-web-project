<?php
class Book{
    private $title;
    private $author;
    private $description;
    private $price;
    private $isbn;
    private $coverid;

    function __construct($title, $isbn, $price, $author='', $description='', $coverid='')
    {
        $this->title = $title;
        $this->author = $author;
        $this->description = $description;
        $this->price = $price;
        $this->isbn = $isbn;
        $this->coverid = $coverid;
    }

    function getTitle(){
        return $this->title;
    }

    function getAuthor(){
        return $this->author;
    }

    function getDescription(){
        return $this->description;
    }

    function getPrice(){
        return $this->price;
    }

    function getIsbn(){
        return $this->isbn;
    }

    function setTitle($title){
        $this->title = $title;
    }

    function setAuthor($author){
        $this->author = $author;
    }

    function setDescription($description){
        $this->description = $description;
    }

    function setPrice($price){
        $this->price = $price;
    }

    function setIsbn($isbn){
        $this->isbn = $isbn;
    }

    function getCover(){
        return $this->coverid;
    }

    function setCover($coverid){
        $this->coverid = $coverid;
    }
}
?>