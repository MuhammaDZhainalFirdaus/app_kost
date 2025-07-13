<?php
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    if ($user === 'admin' && $pass === 'admin123') {
        $_SESSION['login'] = true;
        header('Location: admin/dashboard.php');
        exit;
    } else {
        $error = 'Username atau password salah!';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin Kost</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container" style="max-width:400px;margin-top:100px;">
        <h2 style="text-align:center;">Login Admin</h2>
        <?php if ($error): ?><div style="color:red; text-align:center; margin-bottom:1rem;"> <?= $error ?> </div><?php endif; ?>
        <form method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required autofocus>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button class="btn btn-primary" type="submit" style="width:100%;margin-top:1rem;">Login</button>
        </form>
    </div>
</body>
</html> 