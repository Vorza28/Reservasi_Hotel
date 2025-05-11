<?php
include '../../auth.php';
include '../layout/header.php';
require_once '../../config/Database.php';
require_once '../../models/Kamar.php';
require_once '../../models/Reservasi.php';

$db = (new Database())->connect();
$kamar = new Kamar($db);
$reservasi = new Reservasi($db);

$tipe_kamar = $_GET['tipe_kamar'] ?? null;

$availableRooms = [];
if ($tipe_kamar) {
    $allRooms = $kamar->getAll();
    foreach ($allRooms as $room) {
        if ($room['tipe_kamar'] === $tipe_kamar) {
            // Check if room is booked
            $stmt = $db->prepare("SELECT COUNT(*) as booked FROM reservasi WHERE kamar_id = ? AND status = 'pending'");
            $stmt->execute([$room['id']]);
            $booked = $stmt->fetch(PDO::FETCH_ASSOC)['booked'];
            if ($booked == 0) {
                $availableRooms[] = $room;
            }
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        $_SESSION['user']['id'],
        $_POST['kamar_id'],
        $_POST['checkin'],
        $_POST['checkout'],
        'pending'
    ];
    $reservasi->create($data);
    echo "<div class='alert alert-success'>Reservasi berhasil!</div>";
}
?>

<h4>Buat Reservasi</h4>
<form method="post">
  <?php if ($tipe_kamar): ?>
  <div class="mb-3">
    <label>Pilih Kamar (Tipe: <?= htmlspecialchars($tipe_kamar) ?>)</label>
    <select name="kamar_id" class="form-control" required>
      <?php foreach ($availableRooms as $room): ?>
      <option value="<?= $room['id'] ?>"><?= htmlspecialchars($room['nomor_kamar']) ?> - Harga: <?= htmlspecialchars($room['harga_per_malam']) ?></option>
      <?php endforeach; ?>
      <?php if (empty($availableRooms)): ?>
      <option disabled>Tidak ada kamar tersedia untuk tipe ini</option>
      <?php endif; ?>
    </select>
  </div>
  <?php endif; ?>
  <div class="mb-3">
    <label>Nama Pemesan</label>
    <input type="text" name="nama_pemesan" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Jumlah Orang</label>
    <input type="number" name="jumlah_orang" class="form-control" min="1" required>
  </div>
  <div class="mb-3">
    <label>Check-in</label>
    <input type="date" name="checkin" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Check-out</label>
    <input type="date" name="checkout" class="form-control" required>
  </div>
  <button class="btn btn-primary">Pesan</button>
</form>
