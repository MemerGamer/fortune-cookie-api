# Fortune Cookie API

A simple API that returns random fortunes from a database. Built with Symfony and Doctrine ORM, and designed to be lightweight and easy to set up.

---

## **Getting Started**

### **Prerequisites**

- PHP 8.1+
- Composer
- SQLite (or any other database you prefer)

### **1. Clone the Repository**

First, clone the repository to your local machine:

```bash
git clone https://github.com/MemerGamer/fortune-cookie-api.git
cd fortune-cookie-api
```

### **2. Install Dependencies**

Run Composer to install all the required dependencies:

```bash
composer install
```

### **3. Set .env Variables and Create the Database**

Copy the `.env.example` file to `.env` and update the necessary variables in it.

```bash
cp .env.example .env
```

This project uses **SQLite** by default. To create the database, run the following command:

```bash
php bin/console doctrine:database:create
```

Alternatively, if you're using a different database (e.g., MySQL or PostgreSQL), configure the connection in the `.env` file.

### **4. Run Migrations**

Once the database is created, you need to run the migrations to create the necessary tables:

```bash
php bin/console doctrine:migrations:migrate
```

### **5. Load Fixtures (Optional)**

You can load sample fortune messages into the database using the following command:

```bash
php bin/console doctrine:fixtures:load
```

This will insert a few predefined fortunes into the database.

### **6. Start the Symfony Server**

Now, you can start the Symfony server:

```bash
php -S 127.0.0.1:8000 -t public
```

Alternatively, if you're using **Apache** or **Nginx**, make sure your server is configured to point to the `public/` directory.

---

## **API Endpoints**

### **GET /fortune**

Returns a random fortune from the database.

**Response (Example):**

```json
{
  "success": true,
  "fortune": "A great adventure awaits you."
}
```

---

## **Troubleshooting**

- If you encounter issues with the database connection, check your `.env` file and ensure the connection parameters are correct.
- Ensure the `pdo_sqlite` (or appropriate database driver) is installed for PHP.

---

That's it! Now you have your own fortune cookie API running. 🍪🎉

---
