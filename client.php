<?php

class Client {
    private $firstname;
    private $lastname;
    private $email;
    private $cid;

    public function __construct($cid,$firstname, $lastname, $email) {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->cid = $cid;

    }

    public function getcid() {
        return $this->cid;
    }

    public function getFirstname() {
        return $this->firstname;
    }


    public function getLastname() {
        return $this->lastname;
    }

    public function getEmail() {
        return $this->email;
    }
}
