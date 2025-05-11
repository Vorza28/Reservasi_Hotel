<?php
include '../../auth.php';
include '../layout/header.php';
require_once '../../config/Database.php';
require_once '../../models/Kamar.php';

$db = (new Database())->connect();
$kamar = new Kamar($db);

$availableTypes = $kamar->getAvailableRoomTypes();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selected_type = $_POST['tipe_kamar'];
    header("Location: form.php?tipe_kamar=" . urlencode($selected_type));
    exit;
}
?>

<style>
  .room-type-container {
    display: flex;
    gap: 2rem;
    justify-content: center;
    margin-top: 2rem;
  }
  .room-type-card {
    background-color: #1f1f1f;
    border-radius: 10px;
    padding: 1rem;
    width: 300px;
    box-shadow: 0 0 10px rgba(212, 175, 55, 0.7);
    color: #d4af37;
    cursor: pointer;
    transition: transform 0.3s ease;
  }
  .room-type-card:hover {
    transform: scale(1.05);
  }
  .room-type-card img {
    width: 100%;
    border-radius: 10px;
  }
  .room-type-title {
    font-size: 1.5rem;
    font-weight: bold;
    margin-top: 0.5rem;
  }
  .room-type-desc {
    margin-top: 0.5rem;
    font-size: 0.9rem;
    color: #ccc;
  }
  .select-button {
    margin-top: 1rem;
    background-color: #d4af37;
    color: #121212;
    border: none;
    padding: 0.5rem 1rem;
    border-radius: 5px;
    font-weight: bold;
    cursor: pointer;
    width: 100%;
  }
  .select-button:hover {
    background-color: #b9972e;
  }
</style>

<h3>Pilih Tipe Kamar</h3>
<form method="post" class="room-type-container">
  <?php if (in_array('Standart', $availableTypes)): ?>
  <div class="room-type-card">
    <img src="../../gambar/kamar02.jpg" alt="Standart Room" />
    <div class="room-type-title">Standart</div>
    <div class="room-type-desc">
      Occupancy : 2 - 3 People<br>
      Bed Type : King or twin bed<br>
      Room Size : 20 m²<br>
      Internet : Yes<br>
    </div>
    <button type="submit" name="tipe_kamar" value="Standart" class="select-button">Pilih Standart</button>
  </div>
  <?php endif; ?>
  <?php if (in_array('VIP', $availableTypes)): ?>
  <div class="room-type-card">
    <img src="../../gambar/kamar01.jpg" alt="VIP Room" />
    <div class="room-type-title">VIP</div>
    <div class="room-type-desc">
      Occupancy : 2 - 5 People<br>
      Bed Type : King and singgle bed (optional/request)<br>
      Room Size : 35 m²<br>
      Internet : Yes<br>
    </div>
    <button type="submit" name="tipe_kamar" value="VIP" class="select-button">Pilih VIP</button>
  </div>
  <?php endif; ?>
</form>
