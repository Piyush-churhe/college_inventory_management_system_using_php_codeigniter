# 🗂️ Inventory Management System (PHP - CodeIgniter)

This project is a web-based **Inventory Management System** built using the **CodeIgniter 3** PHP framework. It allows departments (like Civil, Computer, Electrical, etc.) to manage items, quantities, and categories efficiently in a simple, user-friendly interface.

---

## 📌 Features

- Department-wise item tracking
- CRUD operations for inventory entries
- Responsive and structured UI
- MVC architecture using CodeIgniter
- MySQL database integration

---

## 🛠️ Tech Stack

- **Backend:** PHP (CodeIgniter 3.x)
- **Frontend:** HTML, CSS, Bootstrap
- **Database:** MySQL
- **Other:** Apache Server (via XAMPP/WAMP)

---

## ⚙️ Requirements

- **PHP version:** 5.6 to 7.4 (CI3 is not compatible with PHP 8+)
- **MySQL:** 5.x or later
- **Web Server:** Apache (XAMPP/WAMP recommended)

> ⚠️ For PHP 8 or newer:  
> You must **upgrade this project to CodeIgniter 4** or **downgrade PHP** to 7.4 or earlier to run it without compatibility issues.

---

## 🖥️ How to Run Locally

Clone or Download

Option A: Clone using Git
git clone https://github.com/Piyush-churhe/inventory-management-system.git

Option B: Download the ZIP and extract it into your web server directory:
C:\xampp\htdocs\inventory3

- Import the Database

- Start Apache and MySQL via XAMPP or WAMP

- Open http://localhost/phpmyadmin

- Create a new database named inventory3

- Import the SQL file from:
inventory3/database/inventory3.sql

- Configure the Database

- Open the file application/config/database.php and update the following:

```
hostname: 'localhost'
username: 'root'
password: ''
database: 'inventory3'
```

- Run the Project

Visit in your browser:
http://localhost/inventory3

---

**📈 Future Improvements**

- Upgrade to CodeIgniter 4 for PHP 8+ compatibility

- Implement user authentication (login/logout)

- Add role-based access control (Admin/Staff)

- Integrate inventory reports and export options

- Add image upload feature for items

---

**📁 Folder Structure**

application/ – Main CodeIgniter MVC structure

database/ – Contains SQL dump

index.php – Entry file for CodeIgniter

---

**📄 License**

This project is for educational and non-commercial use only.
