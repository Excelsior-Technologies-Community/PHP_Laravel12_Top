# PHP_Laravel12_Top

## Project Description

PHP_Laravel12_Top is a lightweight Laravel 12 application that monitors your server and PHP environment in real-time.
It displays information like PHP version, Laravel version, memory usage, peak memory, disk usage, and operating system in a terminal-style UI.


## Features

- Displays PHP version

- Displays Laravel version

- Shows Operating System info

- Displays Memory Usage and Peak Memory Usage

- Displays Disk Free and Total Space

- Modern terminal-style design using CSS

- Optional authentication/dashboard integration

- Fully compatible with Laravel 12



## Technologies Used

1. PHP 8.x – Server-side language

2. Laravel 12 – PHP framework

3. Blade – Laravel templating engine

4. HTML5 & CSS3 – Frontend design

5. MySQL (optional) – For authentication data

6. Bootstrap (optional) – For UI scaffolding if auth is added



---



## Installation Steps


---


## STEP 1: Create Laravel 12 Project

### Open terminal / CMD and run:

```
composer create-project laravel/laravel PHP_Laravel12_Top "12.*"

```

### Go inside project:

```
cd PHP_Laravel12_Top

```

#### Explanation:

This command installs a fresh Laravel 12 application named PHP_Laravel12_Top and moves into the project directory to start development.




## STEP 2: Database Setup (Optional)

### Update database details:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel12_top
DB_USERNAME=root
DB_PASSWORD=

```

### Create database in MySQL / phpMyAdmin:

```
Database name: laravel12_top

```

### Run Migrations

```
php artisan migrate

```


#### Explanation:

This step connects Laravel with MySQL and creates required default tables like migrations, users, etc., inside the laravel12_top database.





## STEP 3: Install Authentication UI

### Install Laravel UI package:

```
composer require laravel/ui

```

### Generate authentication scaffolding::

```
php artisan ui bootstrap --auth
npm install
npm run dev

```

#### Explanation:

This installs login, register, password reset functionality with Bootstrap-based frontend UI. (Optional if you want authentication features.)





## STEP 4: Modify Routes

### Open routes/web.php and update:

```
<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return view('top', [
        'php_version' => phpversion(),
        'laravel_version' => app()->version(),
        'os' => PHP_OS,
        'memory_usage' => round(memory_get_usage() / 1024 / 1024, 2) . ' MB',
        'memory_peak' => round(memory_get_peak_usage() / 1024 / 1024, 2) . ' MB',
        'disk_free' => round(disk_free_space("/") / 1024 / 1024 / 1024, 2) . ' GB',
        'disk_total' => round(disk_total_space("/") / 1024 / 1024 / 1024, 2) . ' GB',
    ]);

});

```

#### Explanation:

This route loads the Laravel TOP Monitor page and passes real-time system information like PHP version, memory usage, and disk space to the Blade view.





## STEP 5: Home Controller

### Generate:

```
php artisan make:controller HomeController

```

### Then open: app/Http/Controllers/HomeController.php

```
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }
}

```


#### Explanation:

This controller is only needed if authentication is used. It manages the dashboard page for logged-in users.





## STEP 6: Blade Views

### resources/views/top.blade.php

```
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laravel 12 TOP Monitor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        /* General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Fira Code', monospace;
        }

        body {
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            color: #00ff99;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #00ff99;
            margin-bottom: 30px;
            font-size: 2.2rem;
            text-shadow: 0 0 10px #00ff99;
        }

        .dashboard {
            background: rgba(0, 0, 0, 0.85);
            border: 2px solid #00ff99;
            border-radius: 15px;
            padding: 30px 40px;
            width: 100%;
            max-width: 600px;
            box-shadow: 0 0 20px rgba(0, 255, 153, 0.3);
            animation: fadeIn 1s ease-in-out;
        }

        .info-box {
            background: rgba(0, 255, 153, 0.05);
            border-left: 5px solid #00ff99;
            padding: 15px 20px;
            margin-bottom: 15px;
            font-size: 1rem;
            transition: 0.3s all;
        }

        .info-box:hover {
            background: rgba(0, 255, 153, 0.15);
            transform: translateX(5px);
        }

        .label {
            color: #00ffaa;
            font-weight: 500;
        }

        .value {
            color: #ffffff;
            font-weight: 700;
        }

        /* Footer */
        .footer {
            text-align: center;
            margin-top: 25px;
            color: #00ff99;
            font-size: 0.85rem;
            opacity: 0.7;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

    <div class="dashboard">
        <h1>Laravel 12 TOP Monitor</h1>

        <div class="info-box">
            <span class="label">PHP Version:</span>
            <span class="value">{{ $php_version }}</span>
        </div>

        <div class="info-box">
            <span class="label">Laravel Version:</span>
            <span class="value">{{ $laravel_version }}</span>
        </div>

        <div class="info-box">
            <span class="label">Operating System:</span>
            <span class="value">{{ $os }}</span>
        </div>

        <div class="info-box">
            <span class="label">Memory Usage:</span>
            <span class="value">{{ $memory_usage }}</span>
        </div>

        <div class="info-box">
            <span class="label">Peak Memory Usage:</span>
            <span class="value">{{ $memory_peak }}</span>
        </div>

        <div class="info-box">
            <span class="label">Disk Free Space:</span>
            <span class="value">{{ $disk_free }}</span>
        </div>

        <div class="info-box">
            <span class="label">Total Disk Space:</span>
            <span class="value">{{ $disk_total }}</span>
        </div>

        <div class="footer">
            Laravel TOP Monitor &copy; {{ date('Y') }} | Realtime System Info
        </div>
    </div>

</body>

</html>

```


#### Explanation:

This Blade file displays system information in a terminal-style design using dynamic variables passed from the route.





## STEP 7: Run The Project

### Open new terminal:

```
npm run dev

```

### Run:

```
php artisan serve

```

### Open in browser:

```
http://localhost:8000

```


#### Explanation:

npm run dev compiles frontend assets (if authentication UI is installed), and php artisan serve starts the Laravel development server.



## Expected Output:


<img width="1919" height="950" alt="Screenshot 2026-03-03 152538" src="https://github.com/user-attachments/assets/b9849277-c503-4e2d-8f29-f6a8d582730d" />


---

# Project Folder Structure:

```
PHP_Laravel12_Top/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── (optional - not required for basic TOP view)
│   │   └── Middleware/
│   └── Models/
│
├── bootstrap/
│
├── config/
│
├── database/
│   ├── migrations/
│   ├── factories/
│   └── seeders/
│
├── public/
│   ├── index.php
│   └── favicon.ico
│
├── resources/
│   ├── views/
│   │   └── top.blade.php
│   ├── css/
│   └── js/
│
├── routes/
│   └── web.php
│
├── storage/
│
├── tests/
│
├── .env
├── artisan
├── composer.json
├── package.json
└── README.md
```
