# 📚 Library Management API

## 📌 Overview
This is a **RESTful API** for a **Library Management System**, built using **Laravel**. It allows users to:
- Register borrowers
- Register books
- View all books
- Borrow books
- Return books

## 🚀 Installation & Setup
### 1️⃣ **Clone the Repository** (If hosted on GitHub)
```sh
git clone https://github.com/yourusername/library-api.git
cd library-api
```

### 2️⃣ **Install Dependencies**
```sh
composer install
```

### 3️⃣ **Configure Environment**
- Copy `.env.example` to `.env`:
  ```sh
  cp .env.example .env
  ```
- Update database details in `.env`:
  ```env
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=library_db
  DB_USERNAME=root
  DB_PASSWORD=
  ```

### 4️⃣ **Run Migrations**
```sh
php artisan migrate
```

### 5️⃣ **Start the Server**
```sh
php artisan serve
```
Your API will now be available at: `http://127.0.0.1:8000/api`

---

## 📌 Managing Dependencies with Composer
This project uses **Composer** as a package manager to handle dependencies.

### **Installing Dependencies**
Run the following command to install all required packages:
```sh
composer install
```

### **Updating Dependencies**
To update all dependencies to the latest versions:
```sh
composer update
```

### **Installing Additional Packages**
If you need to install a new package, use:
```sh
composer require package-name
```
For example, to install Guzzle (HTTP client for Laravel):
```sh
composer require guzzlehttp/guzzle
```

Composer ensures that all dependencies are properly managed and versioned within your Laravel project.

---

## 📌 Running Automated Tests with PHPUnit
This project includes **PHPUnit tests** to verify API functionality.

### **1️⃣ Set Up the Test Database**
1. Create a separate test database in **phpMyAdmin** (`http://localhost/phpmyadmin`):
    - **Database Name:** `myLibrary_test`
    - **Collation:** `utf8mb4_general_ci`
2. Update **`.env.testing`** file:
   ```env
   APP_ENV=testing
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=myLibrary_test
   DB_USERNAME=root
   DB_PASSWORD=
   ```
3. Run migrations for the test database:
   ```sh
   php artisan migrate --env=testing
   ```

### **2️⃣ Run PHPUnit Tests**
To execute all tests, run:
```sh
php artisan test
```
If you want to run a specific test (e.g., `BorrowerTest`):
```sh
php artisan test --filter BorrowerTest
```
✅ If all tests pass, you will see output like this:
```
PASS  Tests\Feature\BorrowerTest
✓ Borrower can be registered

PASS  Tests\Feature\BookTest
✓ Book can be registered

PASS  Tests\Feature\BorrowTest
✓ Borrow a book
```
---

## 📌 API Endpoints
### Base URL: `http://127.0.0.1:8000/api`

### **1️⃣ Register a Borrower**
- **Endpoint:** `POST /borrowers`
- **Request Body:**
  ```json
  {
    "name": "John Doe",
    "email": "john@example.com"
  }
  ```
- **Response:**
  ```json
  {
    "message": "Borrower registered successfully",
    "data": {
      "id": 1,
      "name": "John Doe",
      "email": "john@example.com",
      "created_at": "2024-03-07T12:00:00.000000Z",
      "updated_at": "2024-03-07T12:00:00.000000Z"
    }
  }
  ```

### **2️⃣ Register a Book**
- **Endpoint:** `POST /books`
- **Request Body:**
  ```json
  {
    "isbn": "978-3-16-148410-0",
    "title": "Laravel for Beginners",
    "author": "Jane Doe"
  }
  ```

### **3️⃣ Get All Books**
- **Endpoint:** `GET /books`
- **Response:**
  ```json
  [
    {
      "id": 1,
      "isbn": "978-3-16-148410-0",
      "title": "Laravel for Beginners",
      "author": "Jane Doe"
    }
  ]
  ```

### **4️⃣ Borrow a Book**
- **Endpoint:** `POST /borrow`
- **Request Body:**
  ```json
  {
    "borrower_id": 1,
    "book_id": 1
  }
  ```

### **5️⃣ Return a Book**
- **Endpoint:** `POST /return`
- **Request Body:**
  ```json
  {
    "borrower_id": 1,
    "book_id": 1
  }
  ```

---

## ✅ **Next Steps**
- **Test the API using Postman or Insomnia**
- **Deploy the API if needed** (e.g., Laravel Forge, Heroku, DigitalOcean)

🎉 **Enjoy building with Laravel!** 🚀

