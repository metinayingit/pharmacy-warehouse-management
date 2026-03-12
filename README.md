# 🏥 Pharmacy Warehouse Management System

## 📖 About The Project
This project is a web-based **Pharmacy Inventory and Staff Management System** developed as a practical learning exercise. It focuses on applying the core principles of dynamic web development, relational database management (CRUD operations), and secure Role-Based Access Control (RBAC). 

The system provides a clean, responsive, and user-friendly interface for managing pharmaceutical stocks, tracking expiry dates, and authorizing staff members based on their specific roles.

## ✨ Key Features
* **Role-Based Access Control (RBAC):** Three distinct authorization levels (Admin, Pharmacist, Technician) with securely restricted access.
* **Real-Time Inventory Management:** Dynamic inline-editing powered by AJAX for instant stock and price updates without page reloads.
* **Smart Alerts:** Automated visual warnings for critical stock levels (under 10 units) to prevent shortages.
* **Live Search & Filtering:** Lightning-fast, client-side filtering by medicine name or serial number.
* **Modern UI/UX:** A responsive, Single Page Application (SPA) feel with custom modal forms and toast notifications.

## 💻 Tech Stack
* **Backend:** PHP 8+ (PDO for secure database interactions)
* **Frontend:** HTML5, CSS3, Vanilla JavaScript
* **Database:** MySQL
* **Architecture:** AJAX-driven asynchronous operations

## 🚀 Installation & Setup Guide
To run this project locally on your machine, follow these steps:

1. **Clone the repository:**
   ```bash
   git clone [https://github.com/metinayingit/pharmacy-warehouse-management.git](https://github.com/metinayingit/pharmacy-warehouse-management.git)
   ```

2. **Environment Setup:** Ensure you have a local server environment installed (like XAMPP, WAMP, or MAMP).

3. **Move Files:** Move the cloned project folder to your local server's root directory (e.g., `htdocs` for XAMPP).

4. **Database Setup:**
   * Open phpMyAdmin (`http://localhost/phpmyadmin`).
   * Create a new database named `pharmacy_db`.
   * Import the provided `pharmacy_db.sql` file into this database.

5. **Configuration:** If your local MySQL credentials differ from the defaults, update the `php/db.php` file:
   ```php
   private $host = "localhost";
   private $db_name = "pharmacy_db";
   private $username = "root"; 
   private $password = "";     
   ```

6. **Run:** Open your browser and navigate to the project folder (e.g., `http://localhost/pharmacy-warehouse-management`).

## 🧪 Test Credentials
You can use the following default accounts to explore different user roles:

| Role | Username | Password | Permissions |
| :--- | :--- | :--- | :--- |
| **Admin** | `admin` | `1234` | Full access (Inventory & Staff Management) |
| **Pharmacist** | `metin` | `1234` | Manage inventory (Add, Edit, Delete) |
| **Technician** | `tech` | `1234` | View inventory & Update stock counts only |

## ⚠️ Usage & Disclaimer
* **Open Source:** You are completely free to fork, use, modify, and reference this code for your own learning or portfolio projects.
* **Security Notice:** Built primarily to demonstrate fundamental backend mechanics, this system intentionally lacks advanced production-level security measures (e.g., password hashing, CSRF tokens). It is *not recommended* for deployment in real-world production environments without implementing these security enhancements.
* **Mock Data:** All medicine records, prices, and stock levels included in the `.sql` file are sample data generated purely for demonstration purposes. They do not represent real pharmaceutical information.

## 👨‍💻 Author
**Metin Ayın**
* Website: [metinayin.com](https://metinayin.com)
* LinkedIn: [Metin AYIN](https://linkedin.com/in/metinayin)

---
*Released under the MIT License.*