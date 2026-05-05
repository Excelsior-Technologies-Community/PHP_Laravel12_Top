<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laravel 12 TOP Monitor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Auto Refresh -->
    <meta http-equiv="refresh" content="10">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
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
            transition: 0.3s;
        }

        /* DARK MODE */
        body.dark {
            background: #000;
            color: #00ff99;
        }

        /* MAIN CARD */
        .dashboard {
            background: rgba(0, 0, 0, 0.85);
            border: 2px solid #00ff99;
            border-radius: 15px;
            padding: 60px 30px 30px 30px;
            width: 100%;
            max-width: 650px;
            box-shadow: 0 0 20px rgba(0, 255, 153, 0.3);
            position: relative;
        }

        body.dark .dashboard {
            background: rgba(20, 20, 20, 0.95);
        }

        /* TITLE */
        .header {
            text-align: center;
            margin-bottom: 25px;
        }

        .header h1 {
            font-size: 2rem;
            text-shadow: 0 0 10px #00ff99;
        }

        /* DARK MODE BUTTON TOP RIGHT */
        .toggle-btn {
            position: absolute;
            top: 15px;
            right: 15px;
            padding: 8px 12px;
            background: #00ff99;
            border: none;
            cursor: pointer;
            font-weight: bold;
            border-radius: 5px;
            z-index: 1000;
        }

        /* INFO BOX */
        .info-box {
            background: rgba(0, 255, 153, 0.05);
            border-left: 5px solid #00ff99;
            padding: 15px;
            margin-bottom: 12px;
            transition: 0.3s;
        }

        .info-box:hover {
            transform: translateX(5px);
            background: rgba(0, 255, 153, 0.15);
        }

        .label {
            color: #00ffaa;
            font-weight: 500;
        }

        .value {
            color: #ffffff;
            font-weight: bold;
        }

        /* FOOTER */
        .footer {
            text-align: center;
            margin-top: 20px;
            opacity: 0.7;
            font-size: 0.85rem;
        }
    </style>
</head>

<body>

    <div class="dashboard">

        <!--TOP RIGHT BUTTON -->
        <button class="toggle-btn" onclick="toggleDarkMode()">
            🌙 Dark
        </button>

        <!-- TITLE -->
        <div class="header">
            <h1>Laravel 12 TOP Monitor</h1>
        </div>

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

        <div class="info-box">
            <span class="label">System Uptime:</span>
            <span class="value">{{ $uptime }}</span>
        </div>

        <div class="footer">
            Laravel TOP Monitor © {{ date('Y') }} | Live System Monitoring
        </div>

    </div>

    <script>
        function toggleDarkMode() {
            document.body.classList.toggle('dark');
        }
    </script>

</body>

</html>