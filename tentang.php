<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - KostApp</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/theme.js"></script>
    <style>
        body {
            display: flex;
            min-height: 100vh;
        }
        .sidebar-tentang {
            width: 240px;
            background: var(--sidebar-bg, #2c3e50);
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            padding: 2rem 1rem 1rem 1rem;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            z-index: 10;
            height: 100vh;
            overflow-y: auto;
            box-shadow: 2px 0 8px rgba(0,0,0,0.07);
        }
        .sidebar-tentang .logo {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 2rem;
            color: #fff;
            letter-spacing: 1px;
        }
        .sidebar-tentang nav {
            width: 100%;
        }
        .sidebar-tentang ul {
            list-style: none;
            padding: 0;
            margin: 0 0 2rem 0;
            width: 100%;
        }
        .sidebar-tentang li {
            margin-bottom: 1rem;
        }
        .sidebar-tentang a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            font-size: 1rem;
            padding: 0.7rem 1rem;
            border-radius: 5px;
            display: block;
            transition: background 0.2s;
        }
        .sidebar-tentang a.active, .sidebar-tentang a:hover {
            background: rgba(255,255,255,0.15);
        }
        .sidebar-tentang .theme-toggle {
            position: static;
            margin-left: 0;
            margin-bottom: 1rem;
            background: rgba(255,255,255,0.15);
            border: none;
            box-shadow: none;
        }
        .sidebar-tentang .logout-btn {
            background: #dc3545;
            color: #fff;
        }
        .main-tentang {
            margin-left: 240px;
            width: 100%;
            min-height: 100vh;
            background: var(--bg-primary, #f5f5f5);
        }
        .hero-section {
            background: url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1200&q=80') center/cover no-repeat;
            min-height: 320px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
        }
        .hero-overlay {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(44, 62, 80, 0.55);
            z-index: 1;
        }
        .hero-content {
            position: relative;
            z-index: 2;
            color: #fff;
            text-align: center;
            padding: 3rem 1rem 2rem 1rem;
        }
        .hero-content h1 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }
        .hero-content p {
            font-size: 1.2rem;
            font-weight: 400;
            margin-bottom: 0;
        }
        @media (max-width: 900px) {
            .sidebar-tentang {
                width: 100px;
                padding: 1rem 0.5rem;
            }
            .sidebar-tentang .logo {
                font-size: 1rem;
                margin-bottom: 1rem;
            }
            .main-tentang {
                margin-left: 100px;
            }
        }
        @media (max-width: 600px) {
            body {
                flex-direction: column;
            }
            .sidebar-tentang {
                position: relative;
                width: 100%;
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
                padding: 0.5rem 1rem;
                min-height: 60px;
                height: auto;
                overflow-y: visible;
                box-shadow: none;
            }
            .sidebar-tentang nav ul {
                display: flex;
                flex-direction: row;
                gap: 0.5rem;
                margin-bottom: 0;
            }
            .sidebar-tentang li {
                margin-bottom: 0;
            }
            .main-tentang {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <aside class="sidebar-tentang">
        <div class="logo">KostApp</div>
        <nav>
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="#">Kost</a></li>
                <li><a href="tentang.php" class="active">Tentang</a></li>
                <li><a href="#">Kontak</a></li>
            </ul>
        </nav>
        <button class="theme-toggle" id="themeToggle" title="Toggle Dark Mode">
            <svg class="sun-icon" viewBox="0 0 24 24">
                <path d="M12 2.25a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM7.5 12a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM18.894 6.166a.75.75 0 00-1.06-1.06l-1.591 1.59a.75.75 0 101.06 1.061l1.591-1.59zM21.75 12a.75.75 0 01-.75.75h-2.25a.75.75 0 010-1.5H21a.75.75 0 01.75.75zM17.834 18.894a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 10-1.061 1.06l1.59 1.591zM12 18a.75.75 0 01.75.75V21a.75.75 0 01-1.5 0v-2.25A.75.75 0 0112 18zM7.758 17.303a.75.75 0 00-1.061-1.06l-1.591 1.59a.75.75 0 001.06 1.061l1.591-1.59zM6 12a.75.75 0 01-.75.75H3a.75.75 0 010-1.5h2.25A.75.75 0 016 12zM6.697 7.757a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 00-1.061 1.06l1.59 1.591z"/>
            </svg>
            <svg class="moon-icon" viewBox="0 0 24 24">
                <path d="M9.528 1.718a.75.75 0 01.162.819A8.97 8.97 0 009 6a9 9 0 009 9 8.97 8.97 0 003.463-.69.75.75 0 01.981.98 10.503 10.503 0 01-9.694 6.46c-5.799 0-10.5-4.701-10.5-10.5 0-4.368 2.667-8.112 6.46-9.694a.75.75 0 01.818.162z"/>
            </svg>
        </button>
        <a href="logout.php" class="logout-btn" style="margin-top:auto;">Logout</a>
    </aside>
    <main class="main-tentang">
        <div class="hero-section">
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <h1>Dashboard Admin KostApp</h1>
                <p>Kelola data kost, penyewa, dan pantau statistik aplikasi dengan mudah.</p>
            </div>
        </div>
        <div class="container" style="margin-top:2rem;">
            <h2 style="text-align:center; margin-bottom:2rem;">Statistik & Aktivitas</h2>
            <div class="dashboard-grid">
                <div class="card"><h2>Total Kost</h2><div class="card-content" style="text-align:center;">15</div></div>
                <div class="card"><h2>Total Penyewa</h2><div class="card-content" style="text-align:center;">10</div></div>
                <div class="card"><h2>Pendapatan</h2><div class="card-content" style="text-align:center;">Rp 12.000.000</div></div>
                <div class="card"><h2>Okkupansi</h2><div class="card-content" style="text-align:center;">80%</div></div>
            </div>
        </div>
    </main>
    <script>
    // Theme toggle for tentang page
    document.addEventListener('DOMContentLoaded', function() {
        const themeToggle = document.getElementById('themeToggle');
        const html = document.documentElement;
        themeToggle.addEventListener('click', function() {
            const currentTheme = html.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            html.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            // Update icon
            const sunIcon = themeToggle.querySelector('.sun-icon');
            const moonIcon = themeToggle.querySelector('.moon-icon');
            if (newTheme === 'dark') {
                sunIcon.style.display = 'block';
                moonIcon.style.display = 'none';
            } else {
                sunIcon.style.display = 'none';
                moonIcon.style.display = 'block';
            }
            themeToggle.style.transform = 'scale(0.9)';
            setTimeout(() => { themeToggle.style.transform = 'scale(1)'; }, 150);
        });
        // Set initial icon state
        const currentTheme = html.getAttribute('data-theme') || 'light';
        const sunIcon = themeToggle.querySelector('.sun-icon');
        const moonIcon = themeToggle.querySelector('.moon-icon');
        if (currentTheme === 'dark') {
            sunIcon.style.display = 'block';
            moonIcon.style.display = 'none';
        } else {
            sunIcon.style.display = 'none';
            moonIcon.style.display = 'block';
        }
    });
    </script>
</body>
</html> 