<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pharmacy Warehouse Management System</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="shortcut icon" href="img/logo.png" />
</head>

<body>
    <?php include 'php/session_check.php'; ?>

    <script src="js/main.js"></script>

    <script>
        window.addEventListener('load', function () {
            if (!window.location.hash) {
                window.location.hash = '#home';
            }
        });
    </script>

    <nav class="navbar">
        <div class="nav-header">
            <img src="img/logo.png" alt="PHARMACY" class="nav-logo">
            <span class="hamburger" onclick="toggleMenu()">☰</span>
        </div>
        <ul id="nav-menu">
            <li><a href="#home" onclick="toggleMenu()">HOME</a></li>

            <?php if ($role === 'admin' || $role === 'pharmacist' || $role === 'technician'): ?>
                <li id="inventory-btn"><a href="#inventory_stock" onclick="toggleMenu()">INVENTORY & STOCK</a></li>
            <?php endif; ?>

            <?php if ($role === 'admin'): ?>
                <li id="staff-btn"><a href="#staff_management" onclick="toggleMenu()">STAFF MANAGEMENT</a></li>
            <?php endif; ?>

            <li><a href="#about" onclick="toggleMenu()">ABOUT</a></li>

            <li id="login-menu-item" style="<?php echo $isLoggedIn ? 'display:none;' : ''; ?>"
                onclick="showLoginForm(); toggleMenu();"><a href="#">LOGIN</a></li>
            <li id="logout-menu-item" style="<?php echo $isLoggedIn ? '' : 'display:none;'; ?>" onclick="toggleMenu()">
                <a href="php/logout.php">LOGOUT</a></li>
        </ul>
    </nav>

    <div class="pages" id="home">
        <div class="welcome-container">
            <h1>Pharmacy Warehouse Management System</h1>
            <p class="subtitle">An educational project for basic inventory and stock tracking.</p>

            <div class="simple-info">
                <p>Built as a hands-on learning exercise, this project demonstrates the fundamentals of dynamic web
                    development. It explores key concepts such as database operations (CRUD) and Role-Based Access
                    Control (RBAC) within a functional interface.</p>

                <div class="test-credentials">
                    <h3>🧪 Test Credentials</h3>
                    <p>You can use the following accounts to explore different user roles:</p>
                    <ul>
                        <li><strong>Admin:</strong> Username: <code>admin</code> | Password: <code>1234</code> <em>(Full
                                access & staff management)</em></li>
                        <li><strong>Pharmacist:</strong> Username: <code>metin</code> | Password: <code>1234</code>
                            <em>(Add/delete/edit inventory)</em></li>
                        <li><strong>Technician:</strong> Username: <code>tech</code> | Password: <code>1234</code>
                            <em>(Only stock updates allowed)</em></li>
                    </ul>
                </div>

                <div class="tech-stack">
                    <h3>💻 Tech Stack</h3>
                    <p>PHP • JavaScript • HTML • CSS • MySQL</p>
                </div>

                <div class="usage-notice">
                    <h3>📄 Usage & Disclaimer</h3>
                    <p>
                        This is an open-source educational project. You are completely free to fork, use, modify, and
                        reference this code for your own learning or portfolio projects.
                        <br><br>
                        <strong>⚠️ Important Note:</strong> Since this system was built to demonstrate fundamental
                        backend mechanics, it does not include advanced security measures (such as password hashing or
                        CSRF protection). It is <em>not recommended</em> to be used in real-world production
                        environments without further security enhancements.
                    </p>
                    <p style="margin-top: 15px;">
                        <strong>💊 Mock Data:</strong> All medicine records, prices, and stock levels in the database
                        are sample data generated purely for demonstration purposes. They do not represent real
                        pharmaceutical information, pricing, or medical advice.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <?php if ($role === 'admin' || $role === 'pharmacist' || $role === 'technician'): ?>
        <div class="pages" id="inventory_stock">
            <div class="box-header">
                <h2 style="color: #111827;">Inventory & Stock Management</h2>
                <div class="search-container">
                    <input type="text" class="search-input live-search" placeholder="Search by name or serial no...">
                    <?php if ($role === 'admin' || $role === 'pharmacist'): ?>
                        <button class="btn-add-floating" onclick="showAddMedicineForm()" title="Add New Product">+</button>
                    <?php endif; ?>
                </div>
            </div>

            <div class="table-container">
                <table class="medicines-table">
                    <thead>
                        <tr>
                            <th width="5%">IMAGE</th>
                            <th width="15%">NAME</th>
                            <th width="10%">SERIAL NO</th>
                            <th width="8%">STOCK</th>
                            <th width="8%">PRICE ($)</th>
                            <th width="14%">EXPIRY DATE</th>
                            <th width="30%">DESCRIPTION</th>
                            <th width="10%">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include 'php/list_medicines.php'; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($role === 'admin'): ?>
        <div class="pages" id="staff_management">
            <div style="max-width: 1300px;">
                <div class="box-header">
                    <h2 style="color: #111827;">Staff Management</h2>
                    <button class="btn-add-floating" style="margin-top: 15px;" onclick="showAddUserForm()"
                        title="Add New Staff">+</button>
                </div>

                <div class="table-container">
                    <table class="medicines-table" style="width: 100%;">
                        <tr>
                            <th width="10%">ID</th>
                            <th width="35%">STAFF USERNAME</th>
                            <th width="25%">PASSWORD</th>
                            <th width="20%">ROLE / PERMISSION</th>
                            <th width="10%">ACTIONS</th>
                        </tr>
                        <?php include 'php/list_users.php'; ?>
                    </table>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="pages" id="about">
        <div class="about-container">
            <h2>Metin AYIN</h2>

            <div class="social-badges">
                <a href="https://github.com/metinayingit" target="_blank" class="badge-btn github">
                    <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                        </path>
                    </svg>
                    GitHub
                </a>

                <a href="https://linkedin.com/in/metinayin" target="_blank" class="badge-btn linkedin">
                    <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                        <rect x="2" y="9" width="4" height="12"></rect>
                        <circle cx="4" cy="4" r="2"></circle>
                    </svg>
                    LinkedIn
                </a>
            </div>
        </div>
    </div>

    <div id="addMedicineModal" class="modal">
        <form id="addMedicineForm" class="modal-content animate" action="php/add_item.php" method="post"
            enctype="multipart/form-data">
            <div class="imgcontainer">
                <h2 style="color:#111827; margin:0; font-size: 20px;">Add New Medicine</h2>
                <span onclick="hideAddMedicineForm()" class="close" title="Close">&times;</span>
            </div>
            <div class="container" style="padding-top: 15px;">
                <label><b>Medicine Image:</b></label>
                <input type="file" name="file" class="filebtn" required>

                <label><b>Medicine Name:</b></label>
                <input type="text" name="name" class="textbox" placeholder="e.g. Aspirin" required>

                <label><b>Serial Number:</b></label>
                <input type="text" name="serial_number" class="textbox" placeholder="e.g. 278646" required>

                <div style="display:flex; gap:15px;">
                    <div style="flex:1;">
                        <label><b>Stock:</b></label>
                        <input type="number" name="stock" class="textbox" value="0" required>
                    </div>
                    <div style="flex:1;">
                        <label><b>Price ($):</b></label>
                        <input type="number" step="0.01" name="price" class="textbox" value="0.00" required>
                    </div>
                </div>

                <label><b>Expiry Date:</b></label>
                <input type="date" name="expiry_date" class="textbox" required>

                <label><b>Description:</b></label>
                <textarea name="description" class="textbox" style="height:80px; resize:none;" required></textarea>

                <button class="btn-submit" type="submit" name="add_item">ADD TO INVENTORY</button>
            </div>
        </form>
    </div>

    <div id="addUserModal" class="modal">
        <form id="addUserForm" class="modal-content animate" action="php/add_user.php" method="post">
            <div class="imgcontainer">
                <h2 style="color:#111827; margin:0; font-size: 20px;">Add New Staff</h2>
                <span onclick="hideAddUserForm()" class="close" title="Close">&times;</span>
            </div>
            <div class="container" style="padding-top: 15px;">
                <label><b>Username:</b></label>
                <input type="text" name="username" class="textbox" placeholder="e.g. johndoe" required>

                <label><b>Password:</b></label>
                <input type="password" name="password" class="textbox" placeholder="Enter temporary password" required>

                <label><b>Role / Permission:</b></label>
                <select name="role" class="textbox" style="cursor:pointer;" required>
                    <option value="admin">Admin (Full System Access)</option>
                    <option value="pharmacist">Pharmacist (Full Inventory Access)</option>
                    <option value="technician" selected>Technician (Only Stock Update)</option>
                </select>

                <button class="btn-submit" type="submit" name="add_user">ADD TO SYSTEM</button>
            </div>
        </form>
    </div>

    <div id="deleteModal" class="modal">
        <div class="modal-content animate" style="width: 400px; padding: 30px; text-align: center;">
            <span onclick="closeDeleteModal()" class="close"
                style="position:absolute; right:15px; top:10px;">&times;</span>
            <h2 style="color: #ef4444; margin-bottom: 15px;">Confirm Deletion</h2>
            <p id="deleteModalText" style="margin-bottom: 20px; font-size: 15px; color: #374151;"></p>

            <input type="text" id="deleteConfirmInput" class="textbox" placeholder="Type here to confirm"
                autocomplete="off">
            <input type="hidden" id="deleteTargetId">
            <input type="hidden" id="deleteTargetType">
            <input type="hidden" id="deleteTargetRef">

            <button id="deleteConfirmBtn" style="width: 100%; margin-top: 15px;" onclick="executeDelete()">PERMANENTLY
                DELETE</button>
        </div>
    </div>

    <div id="loginModal" class="modal">
        <form id="loginForm" class="modal-content animate" action="php/auth.php" method="post">
            <div class="imgcontainer">
                <h2 style="color:#111827; margin:0; font-size: 20px;">Staff Login</h2>
                <span onclick="hideLoginForm()" class="close" title="Close Modal">&times;</span>
            </div>
            <div class="container" style="padding-top: 20px;">
                <label><b>Username:</b></label>
                <input type="text" name="username" class="textbox" required>

                <label><b>Password:</b></label>
                <input type="password" name="password" class="textbox" required>

                <button class="btn-submit" type="submit" name="login">LOGIN TO SYSTEM</button>
            </div>
        </form>
    </div>

    <div id="toast"
        style="visibility: hidden; min-width: 250px; background-color: #333; color: #fff; text-align: center; border-radius: 8px; padding: 16px; position: fixed; z-index: 9999; right: 30px; bottom: 30px; font-size: 16px; box-shadow: 0 4px 12px rgba(0,0,0,0.15); opacity: 0; transition: opacity 0.5s, bottom 0.5s;">
    </div>

    <script>
        function showToast(message, color = "#333") {
            var toast = document.getElementById("toast");
            toast.innerHTML = message;
            toast.style.backgroundColor = color;
            toast.style.visibility = "visible";
            toast.style.opacity = "1";
            toast.style.bottom = "50px";
            setTimeout(function () {
                toast.style.opacity = "0";
                toast.style.bottom = "30px";
                setTimeout(() => { toast.style.visibility = "hidden"; }, 500);
            }, 3000);
        }

        window.addEventListener('load', function () {
            if (window.location.hash === '#login_success') {
                showToast("Welcome back, " + currentUser + "!", "#10b981");
                window.location.hash = '#home';
            }
            else if (window.location.hash === '#login_failed') {
                showToast("Invalid username or password!", "#ef4444");
                showLoginForm();
                window.location.hash = '#home';
            }
            else if (window.location.hash === '#logout') {
                showToast("Logged out successfully. Goodbye!", "#3b82f6");
                window.location.hash = '#home';
            }
        });
    </script>
</body>

</html>