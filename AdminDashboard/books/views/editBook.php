<?php
$title="";
ob_start();
?>

<a href="index.php?action=index" class="go-back">
    <span class="material-symbols-outlined">
        arrow_back
    </span>
    <h3>Go back</h3>
</a>

<ul style="position: absolute;
            margin-top: 100px;
            left: 80%;">
    
    <?= $errors ?>
</ul>

<form class="edit-book" method="post" action="index.php?action=updateBook&bid=<?= $book['bid'] ?>">

    <label for="bid">ID:</label>
    <input type="text" name="bid" value="<?= $book['bid'] ?>">

    <label for="bcoverid">Cover ID:</label>
    <input type="text" name="bcoverid" value="<?= $book['bcoverid'] ?>">

    <label for="btitle">Title:</label>
    <input type="text" name="btitle" value="<?= $book['btitle'] ?>">

    <label for="bdescription">Description:</label>
    <input type="text" name="bdescription" value="<?= $book['bdescription'] ?>">

    <label for="bauthor">Author:</label>
    <input type="text" name="bauthor" value="<?= $book['bauthor'] ?>">

    <label for="bprice">Price:</label>
    <input type="text" name="bprice" value="<?= $book['bprice'] ?>">

    <button type="submit" name="update-btn">Submit changes</button>
</form>

<?php
$content = ob_get_clean();
require_once 'layout.php';