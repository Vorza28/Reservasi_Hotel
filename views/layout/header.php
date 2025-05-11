<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shuta Hotel</title>
  <link href="../layout/style.css" rel="stylesheet">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display&family=Roboto&display=swap');
    body {
      font-family: 'Roboto', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #121212;
      color: #e0e0e0;
    }
    .navbar-brand {
      font-family: 'Playfair Display', serif;
      font-weight: 700;
      font-size: 1.75rem;
    }
    .btn {
      background-color: #d4af37 !important;
      color: #121212 !important;
      border: none !important;
      font-weight: 700 !important;
      font-family: 'Playfair Display', serif !important;
      transition: background-color 0.3s ease !important;
      padding: 0.375rem 0.75rem !important;
      border-radius: 0.25rem !important;
      text-decoration: none !important;
      cursor: pointer !important;
    }
    .btn:hover {
      background-color: #b9972e !important;
      color: #121212 !important;
    }
    
      nav .container-fluid > div {
    position: absolute !important;
    right: 1rem !important;
  }
  </style>
</head>
<body>
<nav class="navbar">
  <div class="container-fluid" style="display: flex; justify-content: space-between; align-items: center;">
    <a class="navbar-brand" href="/hotel-reservasi/home.php" style="color: #d4af37; font-family: 'Playfair Display', serif; font-weight: 700;">Shuta Hotel</a>
    <div>
      <?php if (isset($_SESSION['user'])): ?>
        <a href="../../logout.php" class="btn">Logout</a>
      <?php else: ?>
        <a href="/hotel-reservasi/login.php" class="btn">Login</a>
      <?php endif; ?>
    </div>
  </div>
</nav>
<?php
$hide_nav = false;
if (isset($_SESSION['user']) && in_array($_SESSION['user']['role'], ['user', 'admin'])) {
    $hide_nav = true;
}
if (in_array(basename($_SERVER['PHP_SELF']), ['user.php', 'admin.php'])) {
    $hide_nav = true;
}
?>

<link href="../layout/style-fix.css" rel="stylesheet">
<div class="<?php echo (in_array(basename($_SERVER['PHP_SELF']), ['user.php', 'admin.php'])) ? 'container container-dashboard' : 'container'; ?>">
