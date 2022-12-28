<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Step

- Step 1: Create the fresh project 
            - composer create-project laravel/laravel "your project name"
- Step 1: Create Cron Job Command Class
            - php artisan make:command StockScheduler
- Step 2: Implement Logic In Cronjob Class open the file
            - app/Console/Commands/StockScheduler.php
- Step 3: Register Cron job Command
            - above created cron job class in directory app/Console/ and open file  Kernel.php 
- Step 4: Create the Model
            - php artisan make:model Product
- Step 5: Create the table
            - php artisan make:migration create_products_table
- Step 6: Table migrate php artisan migrate 
            - Insert some testing data into the products table 
                INSERT INTO `products` (`id`, `title`, `description`, `price`, `stock`,`created_at`, `updated_at`) VALUES(1, 'Mango', 'This is a Mango. ', '0.45', 5, '2021-10-01 02:30:00', '2021-10-01 02:30:00'),
                (2, 'Banana', 'This is a Banana. ', '0.50', 10, '2021-10-01 02:30:00', '2021-10-01 02:30:00'),
                (3, 'Pear', 'This is a Pear.', '0.68', 50, '2021-10-01 02:30:00', '2021-10-01 02:30:00'),
                (4, 'Grape', 'This is a Grape.', '1.50', 2, '2021-10-01 02:30:00', '2021-10-01 02:30:00');

- Step 7: Create the blade file 
            - resources/view/mail/lowstock-report-email.blade.php 
- Step 8: Run Scheduler Command For Test
            - open your terminal and following command 
            - php artisan schedule:run
- Step 9: Run your project 
            - php artisan serve