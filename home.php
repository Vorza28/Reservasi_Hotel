<?php
session_start();
require_once 'config/Database.php';
require_once 'models/Kamar.php';

$db = (new Database())->connect();
$kamar = new Kamar($db);
$list = $kamar->getAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Hotel Reservasi - Home</title>
  <link href="views/layout/style.css" rel="stylesheet" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display&family=Roboto&display=swap');

    body {
      font-family: 'Roboto', sans-serif;
      background-color: #121212;
      color: #e0e0e0;
      margin: 0;
      padding: 0;
    }
    .hero {
      position: relative;
      width: 100%;
      height: 400px;
      background: url('gambar/hotel01.jpg') center center/cover no-repeat;
      display: flex;
      flex-direction: column;
      justify-content: center;
      color: #ffffff;
      padding-left: 2rem;
      font-family: 'Roboto', sans-serif;
    }
    .hero h1 {
      font-family: 'Playfair Display', serif;
      font-size: 3rem;
      margin: 0;
      font-weight: bold;
      color: #ffffff;
    }
    .hero p {
      font-family: 'Roboto', sans-serif;
      font-size: 1.25rem;
      margin-top: 0.5rem;
      max-width: 600px;
    }
    .hero .btn-book {
      margin-top: 1.5rem;
      width: max-content;
      background-color: #d4af37;
      color: #121212;
      padding: 0.75rem 1.5rem;
      border-radius: 0.25rem;
      border: none;
      cursor: pointer;
      text-decoration: none;
      font-weight: 700;
      font-family: 'Playfair Display', serif;
      transition: background-color 0.3s ease;
    }
    .hero .btn-book:hover {
      background-color: #b9972e;
    }
    
      nav .container-fluid > div {
    position: absolute !important;
    right: 1rem !important;
  }
  </style>
</head>
<body>
  <nav class="navbar" style="font-family: 'Roboto', sans-serif; background-color: #121212; color: #e0e0e0;">
    <div class="container-fluid" style="display: flex; justify-content: space-between; align-items: center;">
      <a class="navbar-brand" href="home.php" style="font-family: 'Playfair Display', serif; font-weight: 700; font-size: 1.75rem; color: #d4af37;">Shuta Hotel</a>
      <div>
        <?php if (isset($_SESSION['user'])): ?>
          <a href="logout.php" class="btn" style="background-color: #d4af37; color: #121212; font-family: 'Playfair Display', serif; font-weight: 700; border-radius: 0.25rem; padding: 0.375rem 0.75rem; text-decoration: none; cursor: pointer; transition: background-color 0.3s ease;">Logout</a>
        <?php else: ?>
          <a href="login.php" class="btn" style="background-color: #d4af37; color: #121212; font-family: 'Playfair Display', serif; font-weight: 700; border-radius: 0.25rem; padding: 0.375rem 0.75rem; text-decoration: none; cursor: pointer; transition: background-color 0.3s ease;">Login</a>
        <?php endif; ?>
      </div>
    </div>
  </nav>

  <div class="hero">
  <h1>Welcome to Shuta Hotel</h1>
  <p>Your comfort is our priority. Enjoy your stay with us.</p>
  <a href="<?php echo isset($_SESSION['user']) ? 'views/reservasi/select_type.php' : 'login.php'; ?>" class="btn-book">Book Now</a>
</div>

  <div style="display: flex; justify-content: center; margin-top: 1rem;">
    <a href="views/kamar/custom_view.php" class="btn btn-primary me-2" style="background-color: #d4af37; color: #121212; font-family: 'Playfair Display', serif; font-weight: 700; border-radius: 0.25rem; padding: 0.375rem 0.75rem; text-decoration: none; cursor: pointer; transition: background-color 0.3s ease;">Rooms</a>
  </div>

<div class="container" style="margin-top: 3rem; flex-grow: 1; font-family: 'Playfair Display', serif; color: #e0e0e0;">
  <div style="display: flex; gap: 2rem; justify-content: center; flex-wrap: wrap;">
    <div style="flex: 1 1 300px; max-width: 300px; text-align: center;">
      <img src="gambar/home01.jpg" alt="Experience 1" style="width: 100%; height: 400px; object-fit: cover; border-radius: 8px;">
      <h4 style="margin-top: 0.5rem; font-weight: 700; color: #d4af37;">Live Music</h4>
      <p style="font-size: 0.9rem; color: #ccc;">Enjoy a vibrant atmosphere with our live music performances, held regularly at the hotel lounge. Featuring talented local and international artists, our live shows create the perfect setting for relaxation and socializing. Whether you're unwinding after a busy day or looking to enhance your evening, our live music adds a special touch to your stay.</p>
    </div>
    <div style="flex: 1 1 300px; max-width: 300px; text-align: center;">
      <img src="gambar/home02.jpg" alt="Experience 2" style="width: 100%; height: auto; border-radius: 8px;">
      <h4 style="margin-top: 0.5rem; font-weight: 700; color: #d4af37;">Dine Restaurant</h4>
      <p style="font-size: 0.9rem; color: #ccc;">Experience exquisite dining at our hotel’s signature restaurant, where culinary excellence meets elegant ambiance. Our menu features a diverse selection of local and international dishes, crafted with fresh ingredients by our expert chefs. Whether it’s breakfast, lunch, or dinner, enjoy a memorable meal in a comfortable and stylish setting.</p>
    </div>
    <div style="flex: 1 1 300px; max-width: 300px; text-align: center;">
      <img src="gambar/home03.jpg" alt="Experience 3" style="width: 100%; height: auto; border-radius: 8px;">
      <h4 style="margin-top: 0.5rem; font-weight: 700; color: #d4af37;">Spa</h4>
      <p style="font-size: 0.9rem; color: #ccc;">Rejuvenate your body and mind at our luxurious spa, offering a range of treatments designed to relax, refresh, and restore. From soothing massages to revitalizing facials, our professional therapists provide personalized care in a tranquil environment. Escape the stress of daily life and indulge in a moment of pure relaxation.</p>
    </div>
  </div>
</div>
  <?php include 'views/layout/footer.php'; ?>
</body>
</html>
