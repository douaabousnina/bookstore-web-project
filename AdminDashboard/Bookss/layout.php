<?php include 'include/config.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="../styles/style.css">
    <title>Admin Dashboard</title>
</head>

<body>

    <div class="container">

        <?php include_once 'include/sidebar.php'; ?>

        <main>
            <h1><?= $title ?></h1>
            <?= $content ?>
        </main>

    </div>

    <?php include_once 'include/rightsection.php'; ?>

    <script src="../index.js"></script>

</body>

</html>