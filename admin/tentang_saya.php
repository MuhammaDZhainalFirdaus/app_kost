<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ../login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Saya - Admin KostApp</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/theme.js"></script>
    <style>
        .profile-card {
            max-width: 420px;
            margin: 3rem auto 2rem auto;
            background: var(--bg-secondary, #fff);
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.10);
            padding: 2.5rem 2rem 2rem 2rem;
            text-align: center;
            position: relative;
        }
        .profile-card img {
            width: 110px;
            height: 110px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid var(--header-gradient, #667eea);
            margin-bottom: 1.2rem;
        }
        .profile-card h2 {
            margin: 0 0 0.5rem 0;
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--text-primary);
        }
        .profile-card .role {
            color: var(--text-secondary);
            font-size: 1rem;
            margin-bottom: 1rem;
        }
        .profile-card p {
            color: var(--text-primary);
            font-size: 1.05rem;
            margin-bottom: 1.2rem;
        }
        .profile-card .contact {
            color: var(--text-secondary);
            font-size: 0.98rem;
            margin-bottom: 0.5rem;
        }
        .profile-card .contact a {
            color: var(--btn-primary-gradient, #667eea);
            text-decoration: none;
        }
        .profile-card .contact a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <div class="container">
        <div class="profile-card">
            <img src="https://ui-avatars.com/api/?name=Admin+Kost&background=667eea&color=fff&size=220" alt="Foto Admin">
            <h2>Muhammad Zhainal Firdaus</h2>
            <div class="role">Admin & Pengembang KostApp</div>
            <p>Selamat datang di dashboard Tentang Saya! Saya adalah pengelola aplikasi KostApp. Silakan hubungi saya jika ada pertanyaan, kritik, atau saran terkait aplikasi ini.</p>
            <div class="contact">Email: <a href="mailto:zhainal@example.com">zhainal@example.com</a></div>
            <div class="contact">WhatsApp: <a href="https://wa.me/6281234567890" target="_blank">+62 812-3456-7890</a></div>
        </div>
    </div>
</body>
</html> 