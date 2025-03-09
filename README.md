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
git clone https://github.com/zulkamalazahri/myLibrary
cd myLibrary
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
  DB_DATABASE=myLibrary
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

## 📌 ISBN Validation Rules
This system enforces the following ISBN validation rules:
- **Books with the same ISBN must have the same title and author.**
- **Books with different ISBN can have the same or different titles and authors.**
- **Multiple copies of books with the same ISBN are allowed, but they must have the same title and author.**

If a book with an existing ISBN is registered but has a different title or author, the system will return an error.

Example response for an invalid book registration, same ISBN but different title and author:
```json
{
  "message": "Books with the same ISBN must have the same title and author"
}
```

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

Composer ensures that all dependencies are properly managed and versioned within your Laravel project.

---

## 📌 Running Automated Tests with PHPUnit
This project includes **PHPUnit tests** to verify API functionality.

### **1️⃣ Set Up the Test Database**
1. Create a separate test database in **phpMyAdmin** (`http://localhost/phpmyadmin`):
    - **Database Name:** `myLibrary_test`
    - **Collation:** `utf8mb4_0900_ai_ci`
2. Create and Update **`.env.testing`** file:
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
    "name": "Zul Kamal",
    "email": "zulkamal@gmail.com"
  }
  ```
- **Response:**
  ```json
  {
    "message": "Borrower registered successfully",
    "data": {
      "id": 1,
      "name": "Zul Kamal",
      "email": "zulkamal@gamil.com",
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
    "isbn": "978-0-7475-3269-8",
    "title": "I Love Programming",
    "author": "Zul Kamal"
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
- **For Manual Testing, Test the API using Postman or Insomnia**

🎉 **-- The End--** 🚀

