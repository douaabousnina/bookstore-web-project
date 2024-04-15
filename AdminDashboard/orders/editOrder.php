<?php
include("../../connect.php");

if ($_SESSION['adminAuth'] !== 'yes') {
    header('location: ../../Index.php');
    exit();
}
?>

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
        <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="../photos/logo.png">
                    <h2 id="f1">Book<span id="f2">ini</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Dashboard</h3>
                </a>
                <a href="../acceuiladmin.php">
                    <span class="material-icons-sharp">
                        home
                    </span>
                    <h3>Home</h3>
                </a>
                <a href="../orders/orders.php" class="active">
                    <span class="material-icons-sharp">
                        inventory
                    </span>
                    <h3>Orders</h3>
                </a>
                <a href="../books/books.php">
                    <span class="material-symbols-outlined">
                        auto_stories
                    </span>
                    <h3>Books</h3>
                </a>
                <a href="../clients/clients.php">
                    <span class="material-icons-sharp">
                        person_outline
                    </span>
                    <h3>Users</h3>
                </a>
                <a href="../../Login/logout.php">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>

        <main>

            <a href="orders.php" class="go-back">
                <span class="material-symbols-outlined">
                    arrow_back
                </span>
                <h3>Go back</h3>
            </a>
            <?php
            $cid = $_GET['cid'];
            $bid = $_GET['bid'];
            $query = "SELECT * FROM command WHERE cid=:cid AND bid=:bid";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':cid', $cid);
            $stmt->bindParam(':bid', $bid);
            $stmt->execute();
            $arr = $stmt->fetch(PDO::FETCH_ASSOC);
            ?>
            <form class="edit-book" action="update.php" method="POST">
                <label for="cid">Client ID:</label>
                <input type="text" id="cid" name="cid" value="<?= $arr['cid'] ?>" readonly /><br />

                <label for="bid">Book ID:</label>
                <input type="text" id="bid" name="bid" value="<?= $arr['bid'] ?>" readonly><br />

                <label for="cdate">Order Date:</label>
                <input type="date" id="cdate" name="cdate" value="<?= $arr['cdate'] ?>"><br />

                <label for="state">Status:</label>
                <select id="state" name="state" placeholder="Update Status"><br />
                    <option value="Pending">Pending</option>
                    <option value="Processing">Processing</option>
                    <option value="Delivered">Delivered</option>
                </select>

                <button type="submit">Submit changes</button>

            </form>

        </main>

        <div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
                <div class="dark-mode">
                    <span class="material-icons-sharp active">
                        light_mode
                    </span>
                    <span class="material-icons-sharp">
                        dark_mode
                    </span>
                </div>

                <div class="profile">
                    <div class="info">
                        <p><b>Admin</b></p>
                    </div>
                    <div class="profile-photo">
                        <img src="../photos/profile-1.jpg">
                    </div>

                </div>
            </div>
        </div>

        <script src='Books.js'></script>
        <script src="../index.js"></script>
        <script src="../search.js"></script>
</body>

</html>