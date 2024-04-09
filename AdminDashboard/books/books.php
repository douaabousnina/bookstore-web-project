<?php
$title = "Books";
require_once 'bookModel.php';
ob_start();
?>

<div class="container" style="display: flex; justify-content: center;">
    <a class="add-btn" href="storeBook.php">Add book</a>
</div>

<div class="input-group">
    <input type="search" placeholder="Search a book...">
    <span class="material-symbols-outlined">
        search
    </span>
</div>

<div class="books-table">
    <table>
        <thead>
            <tr>
                <th>Cover</th>
                <th>Cover ID</th>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Author</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            <?php
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $perPage = 50;
            $totalBooks = BookModel::getTotalBooks();
            $numberOfPages = ceil($totalBooks / $perPage);
            $books = BookModel::listBooks($page, $perPage);
            if (count($books) == 0) header('location: index.php?action=index'); //cas ou l utilisateur met une valeur de page invalide manuellement
            foreach ($books as $book) : ?>
                <tr>
                    <td> <img class="book-cover" src=<?php echo '"https://covers.openlibrary.org/b/olid/' . $book['bcoverid'] . '-L.jpg"'; ?> alt="book" /> </td>
                    <td> <?= $book['bcoverid'] ?> </td>
                    <td> <?= $book['bid'] ?> </td>
                    <td> <?= $book['btitle'] ?> </td>
                    <td> <?= $book['bdescription'] ?> </td>
                    <td> <?= $book['bauthor'] ?> </td>
                    <td> <?= $book['bprice'] ?> </td>
                    <td class="action-btns" style=" border:none;margin-left:10px; width:50px ; display: flex;">
                        <a class="edit-btn" href='updateBook.php?bid=<?= $book['bid'] ?>'>
                            <span class="material-symbols-outlined">
                                edit
                            </span>
                        </a>

                        <a class="delete-btn" href="deleteBook.php?bid=<?= $book['bid'] ?>">
                            <span class="material-symbols-outlined">
                                delete
                            </span>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="container" style="display: flex; 
                            justify-content: center; 
                            align-items: center;">
    <div style="display: flex;">

        <?php

        for ($i = 1; $i <= $numberOfPages; $i++) {
            if ($page != $i) echo "<a href='?page=$i' style='margin:10px;'> $i </a>&nbsp;";

            else echo "<a class='active' style='background-color: var(--color-primary);
                                            color: var(--color-white);
                                            font-weight: bold;
                                            padding: 0px 5px;
                                            border-radius: var(--border-radius-1);'> $i</a>";
        }

        ?>
    </div>
</div>

<script src="../search.js"></script>

<?php
$content = ob_get_clean();
require_once 'layout.php';
