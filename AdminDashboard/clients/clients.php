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
                <a href="../orders/orders.php" >
                    <span class="material-icons-sharp">
                        inventory
                    </span>
                    <h3>Orders</h3>
                </a>
                <a href="../books/index.php?action=index" >
                    <span class="material-symbols-outlined">
                        auto_stories
                    </span>
                    <h3>Books</h3>
                </a>
                <a href="../clients/clients.php" class="active">
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
            <h1>Users</h1>
            <button class="add-btn">Add user</button>
            <div class="input-group">
                <input type="search" placeholder="Search a user...">
                <span class="material-symbols-outlined">
                    search
                </span>
            </div>
            <div class="users-table">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role </th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
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
    
    <script src="Clients.js"></script>
    <script src="../index.js"></script>
    <script src="../search.js"></script>
</body>

</html>
