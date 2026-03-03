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