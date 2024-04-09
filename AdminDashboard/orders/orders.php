<?php
    include("../../connect.php")
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
                <a href="#">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>

        <main>
            <h1>Orders</h1>
            <div class="input-group">
                <input type="search" placeholder="Search an order...">
                <span class="material-symbols-outlined">
                    search
                </span>
            </div>
            <div class="recent-orders">
                <table>
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>User</th>
                            <th>Book Name</th>
                            <th>Book ID</th>
                            <th>Order Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $stmt = $pdo->prepare("SELECT c.* , b.*,u.* FROM command c,book b,client u WHERE c.bid = b.bid AND c.cid = u.cid");
                            $stmt->execute();
                            $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            if(!$arr) exit('No Orders Yet');
                            else{
                                foreach($arr as $row){
                                    ?>
                                    <tr>
                                        <td><?= $row['cid'] ?></td>
                                        <td><?= $row['firstname'] ?></td>
                                        <td><?= $row['btitle'] ?></td>
                                        <td><?= $row['bid'] ?></td>
                                        <td><?= $row['cdate'] ?></td>
                                        <td><?= $row['state'] ?></td>
                                        <td class="action-btns">
                                        <div style="display: inline-flex;">
                                        <button class="edit-btn" onClick="location.href='editOrder.php?cid=<?= $row["cid"] ?>&bid=<?= $row["bid"] ?>'">
                                            <span class="material-symbols-outlined">
                                                edit
                                            </span>
                                        </button>
                                        <form method="POST" action="delete.php">
                                            <input type="hidden" name="cid" value="<?= $row["cid"] ?>">
                                            <input type="hidden" name="bid" value="<?= $row["bid"] ?>">
                                            <button onClick="return confirm('Are you sure you want to delete this order')" type="submit" class="delete-btn" name="delete-order" >
                                                <span class="material-symbols-outlined">
                                                    delete
                                                </span>
                                            </button>
                                        </form>
                                        </div>
                                        </td>
                                    <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>       
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
    <script src="../index.js"></script>
    <script src="../search.js"></script>
</body>

</html>