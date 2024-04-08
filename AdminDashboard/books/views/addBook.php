<?php 
$title = "";
ob_start(); ?>
<a href="index.php?action=index" class="go-back">
    <span class="material-symbols-outlined">
        arrow_back
    </span>
    <h3>Go back</h3>
</a>


<form class="edit-book" method="post" action="index.php?action=storeBook">
    <ul style="position:absolute; margin-top: 100px; left: 80%;">
        <?= $errors ?>
    </ul>
    <label for="bid">ID:</label>
    <input type="text" name="bid" placeholder="ID">

    <label for="bcoverid">Cover ID:</label>
    <input type="text" name="bcoverid" placeholder="Cover ID">

    <label for="btitle">Title:</label>
    <input type="text" name="btitle" placeholder="Title">

    <label for="bdescription">Description:</label>
    <input type="text" name="bdescription" placeholder="Description">

    <label for="bauthor">Author:</label>
    <input type="text" name="bauthor" placeholder="Author">

    <label for="bprice">Price:</label>
    <input type="text" name="bprice" placeholder="Price">



    <button type="submit">Add book</button>
</form>

<?php
$content = ob_get_clean();
require_once 'layout.php';