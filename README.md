README

**LOGIN CREDENTIALS (username/password):

- User: user@gmail.com / 123456
- Moderator: moderator@gmail.com / 123456
- Admin: admin@gmail.com / 123456

**INSTALLATION

You can run it locally by following these steps:
1.  Download and install Xampp (choose the version with PHP 8.1): https://www.apachefriends.org/download.html (for MacOS, use MAMP)
2.  Download and install Composer: https://getcomposer.org/
3.  Open Xampp and start Apache & MySQL
4.  In your browser, visit http://localhost/phpmyadmin and create a new database with  collation utf8mb4_unicode_ci, then import the attached .sql file (optional)
5.  Download the source code and open it on your IDE (such as PHPStorm)
6.  Install dependencies: composer install
7.  Create env file: cp .env.example .env
8.  Update database credentials in .env file
9.  Run migration if you have not imported the sql file: php artisan migrate:fresh --seed
10.  Generate app key: php artisan key:generate
11.  Start the development server: php artisan serve
12.  You can now access the server at http://localhost:8000
