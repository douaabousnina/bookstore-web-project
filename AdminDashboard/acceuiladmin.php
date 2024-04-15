<?php
include("../connect.php");

if ($_SESSION['adminAuth'] !== 'yes') {
    header('location: ../Index.php');
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
    <link rel="stylesheet" href="../AdminDashboard/styles/acceuil.css">
    <title>Admin Dashboard</title>
</head>

<body>

    <div class="container">
        <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="../AdminDashboard/photos/logo.png">
                    <h2 id="f1">Book<span id="f2">ini</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="#">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Dashboard</h3>
                </a>
                <a href="#" class="active">
                    <span class="material-icons-sharp">
                        home
                    </span>
                    <h3>Home</h3>
                </a>
                <a href="../AdminDashboard/orders/orders.php">
                    <span class="material-icons-sharp">
                        inventory
                    </span>
                    <h3>Orders</h3>
                </a>
                <a href="../AdminDashboard/books/books.php">
                    <span class="material-symbols-outlined">
                        auto_stories
                    </span>
                    <h3>Books</h3>
                </a>
                <a href="../AdminDashboard/clients/clients.php">
                    <span class="material-icons-sharp">
                        person_outline
                    </span>
                    <h3>Users</h3>
                </a>
                <a href="../Login/logout.php">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>

        <main>
            <h1>Home</h1>
            <!-- Home -->
            <div class="home">
                <div class="sales">
                    <div class="status">
                        <div class="info">
                            <h3>Monthly Sales</h3>
                            <h1>$5,024</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <p>+81%</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="visits">
                    <div class="status">
                        <div class="info">
                            <h3>Site Visit</h3>
                            <h1>24,981</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <p>-48%</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="searches">
                    <div class="status">
                        <div class="info">
                            <h3>Searches</h3>
                            <h1>14,147</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <p>+21%</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="queue">
                    <div class="status">
                        <div class="info">
                            <h3>Pending Orders</h3>
                            <h1>63</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <p>63</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="recent-orders">
                <h2>Recent Orders</h2>
                <table>
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>User</th>
                            <th>Book Name</th>
                            <th>Book ID</th>
                            <th>Order Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stmt = $pdo->prepare("SELECT c.* , b.*,u.* FROM command c,book b,client u  WHERE c.bid = b.bid AND c.cid = u.cid LIMIT 3");
                        $stmt->execute();
                        $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        if (!$arr) exit('No Orders Yet');
                        else {
                            foreach ($arr as $row) {
                        ?>
                                <tr>
                                    <td><?= $row['cid'] ?></td>
                                    <td><?= $row['firstname'] ?></td>
                                    <td><?= $row['btitle'] ?></td>
                                    <td><?= $row['bid'] ?></td>
                                    <td><?= $row['cdate'] ?></td>
                                    <td><?= $row['state'] ?></td>
                            <?php
                            }
                        }
                            ?>
                    </tbody>
                </table>
                <a href="../AdminDashboard/orders/orders.php">Show All</a>
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
                        <img src="../AdminDashboard/photos/profile-1.jpg">
                    </div>
                    <div class="reminders">
                        <div class="header">
                            <h2>Reminders</h2>
                            <span class="material-icons-sharp">
                                notifications_none
                            </span>
                        </div>

                        <div class="notification">
                            <div class="icon">
                                <span class="material-icons-sharp">
                                    volume_up
                                </span>
                            </div>
                            <div class="content">
                                <div class="info">
                                    <h3>Meeting</h3>
                                    <small class="text_muted">
                                        08:00 AM
                                    </small>
                                </div>
                                <span class="material-icons-sharp">
                                    more_vert
                                </span>
                            </div>
                        </div>

                        <div class="notification deactive">
                            <div class="icon">
                                <span class="material-icons-sharp">
                                    edit
                                </span>
                            </div>
                            <div class="content">
                                <div class="info">
                                    <h3>Analyse our Site</h3>
                                    <small class="text_muted">
                                        14:00 PM
                                    </small>
                                </div>
                                <span class="material-icons-sharp">
                                    more_vert
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <script src="index.js"></script>
</body>

</html>