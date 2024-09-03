# Mossy Frost
### *This website project was developed to fulfill the requirements of the final examination for the Web Programming Basics course.* ###
Mossy Frost is a beverage store website designed for managing menu items, user data, orders, and messages. 

## Technologies Used
- **PHP**: Server-side scripting language.
- **MySQL**: Database management system.
- **JavaScript**: Frontend interactivity.
- **HTML/CSS**: Structuring and styling of web pages.

## Features
- **User Management**: Registration, login, and profile management for customers.
- **Menu Management**: Add, update, and delete beverage items including descriptions, prices, and images.
- **Order Management**: Customers can place orders, manage order statuses, and view their order history.
- **Messaging System**: Customers can send messages to the store, and admins can view and respond to these messages.
- **Admin Panel**: Admins can manage all aspects of the store, including users, menus, orders, and messages.

## Installation
1. **Clone the repository**:
   ```bash
   git clone https://github.com/handikatriarlan/mossy-frost.git
2. **Navigate to the project directory**:
   ```bash
   cd mossy-frost
3. **Set up the database**:
     - Log in to your MySQL server (using a tool like phpMyAdmin or the MySQL command line).
     - Create a new database named db_mossyfrost.
     - Import the [SQL](db_mossyfrost.sql) into db_mossyfrost database.
     - Update the database configuration in the PHP files as needed.
4. **Start a local server**:
   - Use tools like XAMPP, WAMP, Laragon, or any other PHP local server.
   - Place the project directory in the server's root directory (e.g., `htdocs` for XAMPP or `www` for Laragon).
   - Start the server and navigate to `http://localhost/mossy-frost` in your browser.

## Usage
   - **For Customers**: Browse, order drinks, and send messages to admin.
   - **For Admins**: manage inventory, track orders, and handle customer communications.

## License
This project is licensed under the [MIT License](LICENSE).
