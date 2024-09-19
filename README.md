

## Installation Guide for the Laravel Application

### 1. Update Project Dependencies
   Run the following command to update the Laravel project dependencies:
   ```bash
   composer update
### 2. Install Dependencies
If not already installed, install all the required dependencies with the following command:

```bash
    composer install
### 3. Generate the Application Key
Laravel requires a unique application key for securing data. Generate this key using the following command:

``bash
php artisan key:generate
### 4. Import the Database
Import the database db-powerzone manually on your local server using a tool like phpMyAdmin or through the MySQL command line.

### 5. Start the Server
Once everything is set up, run the Laravel development server using:

```bash
php artisan serve
