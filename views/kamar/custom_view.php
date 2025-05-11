<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Hotel Reservasi - Kamar</title>
  <link href="../layout/style.css" rel="stylesheet" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display&family=Roboto&display=swap');

    body {
      background-color: #121212;
      color: #e0e0e0;
      font-family: 'Roboto', sans-serif;
      margin: 0;
      padding: 2rem;
    }
    h2 {
      color: #d4af37;
      margin-bottom: 0.5rem;
      font-family: 'Playfair Display', serif;
      font-weight: 700;
      font-size: 2.5rem;
    }
    p.description {
      max-width: 700px;
      margin-bottom: 2rem;
      color: #ccc;
      font-family: 'Roboto', sans-serif;
      font-size: 1rem;
      line-height: 1.6;
    }
    .room-container {
      display: flex;
      gap: 2rem;
      justify-content: center;
      flex-wrap: wrap;
    }
    .room-card {
      background-color: #2c2c2c;
      border-radius: 8px;
      width: 350px;
      padding: 1rem;
      box-sizing: border-box;
      box-shadow: 0 0 10px rgba(187, 134, 252, 0.5);
      color: #e0e0e0;
    }
    .room-card img {
      width: 100%;
      border-radius: 6px;
      margin-bottom: 1rem;
    }
    .room-card h3 {
      margin: 0 0 0.5rem 0;
      color: #d4af37;
      font-family: 'Playfair Display', serif;
      font-weight: 700;
      font-size: 1.5rem;
    }
    .room-card p {
      font-size: 0.9rem;
      line-height: 1.4;
      color: #ccc;
      font-family: 'Roboto', sans-serif;
    }
    .btn, .btn-book {
      background-color: #d4af37 !important; /* Gold color */
      color: #121212 !important;
      border: none !important;
      font-weight: 700 !important;
      font-family: 'Playfair Display', serif !important;
      transition: background-color 0.3s ease !important;
    }
    .btn:hover, .btn-book:hover {
      background-color: #b9972e !important; /* Darker gold */
      color: #121212 !important;
    }
  </style>
</head>
<body>
  <h2 style="text-align: center;">Accommodation</h2>
  <p class="description" style="text-align: center; margin-left: auto; margin-right: auto; max-width: 700px;">
    A true reflection of sophisticated Balinese hospitality, each room type is designed with modern convenience in mind, inspired by the rich culture of the island. Choose to have a quality rest in one of the rooms with a balcony or terrace to take in the surrounding views.
  </p>
  <div class="room-container">
    <div class="room-card">
      <img src="../../gambar/kamar01.jpg" alt="Standart Room" />
      <h3>Standart</h3>
      <p>
        Immerse yourself in the enchanting ambiance of Balinese design with our exquisitely designed standart rooms. Overlooking the lush, serene forest, each room offers a perfect retreat for relaxation and tranquility.
      </p>
    </div>
    <div class="room-card">
      <img src="../../gambar/kamar02.jpg" alt="VIP Room" />
      <h3>VIP</h3>
      <p>
        Experience the epitome of luxury and serenity in our VIP rooms, available in one- and two-bedroom configurations. Each room boasts a private balcony, offering breathtaking views of the jungle and the soothing sounds of birds and the river.
      </p>
    </div>
  </div>
</body>
</html>
