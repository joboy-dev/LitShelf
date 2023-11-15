

# LitShelf Online Library Management System

LitShelf is a web-based library management system that allows users to explore, discover, and immerse themselves in the world of books. It's designed to provide a seamless experience for managing book collections, borrowing, and staying informed about new books.

## Features

1. **Discover New Reads:**
   - Use the intuitive search and explore feature to find your next favorite book.

2. **Manage Your Borrowings:**
   - Keep track of the books you've borrowed and manage due dates effortlessly.

3. **Stay Informed:**
   - Receive updates on new arrivals, upcoming releases, and special events.

## Getting Started

To run the LitShelf Online Library Management System on your local machine, follow these steps:

1. Clone the repository: `git clone https://github.com/joboy-dev/LitShelf.git`
2. Configure the database settings in `utils/conn.php`.
3. Add `uploads` folder in the root directory of the project. Very important.
4. Import the SQL schema from `litshelf_schema.sql` into your database.
5. Start your web server(xampp preferably).
6. Add this path to environment variables on your PC: `C:\xampp\php`. `C:\xampp` should be the directory you installed xampp in.
7. Run this command in your terminal to start the PHP Development server: `php -S localhost:8000`.8000 can be any port number of your choice.
8. On your browser, enter `localhost:8000` in the search bar and the website will start up.

## Technologies Used

- **Frontend:**
  - HTML, CSS, JavaScript
  - PHP for server-side rendering

- **Backend:**
  - MySQL for the database