<?php

class BookModel
{

    private $bid;
    private $btitle;
    private $bdescription;
    private $bauthor;
    private $bcoverid;
    private $bprice;


    public function getBid()
    {
        return $this->bid;
    }

    public function setBid($bid)
    {
        $pattern = "/^\/works\/OL\d{7}W$/"; // 	/works/ *7 numbers* W
        if (preg_match($pattern, $bid)) {
            $this->bid = $bid;
        } else {
            throw new InvalidArgumentException('Invalid book id format!');
        }
        return $this;
    }

    public function getBtitle()
    {
        return $this->btitle;
    }

    public function setBtitle($btitle)
    {
        if (preg_match('/[A-Za-z0-9]/', $btitle) && strlen($btitle) < 30 && $btitle != "")  // a title can only contain characters and numbers
            $this->btitle = $btitle;
        else
            throw new InvalidArgumentException('Invalid book title format!');
        return $this;
    }

    public function getBdescription()
    {
        return $this->bdescription;
    }

    public function setBdescription($bdescription)
    {
        if (strlen($bdescription) < 200 && $bdescription != "")
            $this->bdescription = $bdescription;
        else
            throw new InvalidArgumentException('Invalid book description format!');
        return $this;
    }

    public function getBauthor()
    {
        return $this->bauthor;
    }

    public function setBauthor($bauthor)
    {
        if (strlen($bauthor) < 30 && $bauthor != "")
            $this->bauthor = $bauthor;
        else
            throw new InvalidArgumentException('Invalid author name!');
        return $this;
    }

    public function getBcoverid()
    {
        return $this->bcoverid;
    }

    public function setBcoverid($bcoverid)
    {
        $pattern = "/^OL\d{7}M$/";
        if (preg_match($pattern, $bcoverid))
            $this->bcoverid = $bcoverid;
        else
            throw new InvalidArgumentException('Invalid book cover id format!');
        return $this;
    }

    public function getBprice()
    {
        return $this->bprice;
    }

    public function setBprice($bprice)
    {
        if (preg_match('/^\d+(\.\d{1,3})?$/', $bprice))
            $this->bprice = $bprice;
        else
            throw new InvalidArgumentException('Invalid price format.');
        return $this;
    }




    public static function databaseConnection()
    {
        try {
            $dsn = "mysql:host=localhost;dbname=bookini";
            $username = "root";
            $password = "";
            $pdo = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $pdo;
    }

    /**
     * @param int $page
     * @param int $perPage
     * @return array
     */
    public static function listBooks($page, $perPage)
    {
        $offset=($page-1) * $perPage;
        $sqlState = self::databaseConnection()->prepare("SELECT * FROM book LIMIT $offset, $perPage");
        $sqlState->setFetchMode(PDO::FETCH_ASSOC);
        $sqlState->execute();
        return $sqlState->fetchAll();
    }

    public static function getTotalBooks() {
        $sqlState=self::databaseConnection()->prepare("SELECT * FROM book");
        $sqlState->execute();
        return count($sqlState->fetchAll(PDO::FETCH_ASSOC));
    }

    /**
     * @param string $bid
     * @return array
     */
    public function viewBook($bid)
    {
        return self::where('bid', $bid)[0];
    }


    /**
     * @return bool
     */
    public function addBook()
    {
        $sqlState = self::databaseConnection()->prepare("INSERT INTO book (bid, btitle, bdescription, bauthor, bcoverid, bprice) VALUES (?, ?, ?, ?, ?, ?)");
        return $sqlState->execute([$this->getBid(), $this->getBtitle(), $this->getBdescription(), $this->getBauthor(), $this->getBcoverid(), $this->getBprice()]);
    }


    /**
     * @param string $bid
     * @return bool
     */
    public function deleteBook($bid)
    {
        $sqlState = self::databaseConnection()->prepare("DELETE FROM book WHERE bid=?");
        return $sqlState->execute(array($bid));
    }


    /**
     * @param string $bid
     * @param string $btitle
     * @param string $bdescription
     * @param string $bauthor
     * @param string $bcoverid
     * @param float $bprice
     * @return bool
     */
    public function updateBook($bid)
    {
        $sqlState = self::databaseConnection()->prepare("UPDATE book SET btitle=?,
                                                    bdescription=?,	
                                                    bauthor=?,
                                                    bcoverid=?,	
                                                    bprice=? WHERE bid=? ");

        return $sqlState->execute([$this->getBtitle(), $this->getBdescription(), $this->getBauthor(), $this->getBcoverid(), $this->getBprice(), $bid]);
    }

    /**
     * @param string $column
     * @param string $operator
     * @return array
     */
    public static function where($column, $value, $operator = '=')
    {
        $sqlState = self::databaseConnection()->prepare("SELECT * FROM book WHERE $column $operator ?");
        $sqlState->execute(array($value));
        $data = $sqlState->fetchAll(PDO::FETCH_ASSOC);
        if (empty($data))
            throw new Exception("No books found.");
        return $data;
    }
}
