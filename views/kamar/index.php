<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: ../../login.php');
    exit;
}

include '../layout/header.php';
require_once '../../config/Database.php';
require_once '../../models/Kamar.php';

$db = (new Database())->connect();
$kamar = new Kamar($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['hapus'])) {
        $kamar->delete($_POST['hapus']);
    } elseif (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $data = [$_POST['nomor_kamar'], $_POST['tipe_kamar'], $_POST['harga']];
        $kamar->update($id, $data);
    } else {
        $data = [$_POST['nomor_kamar'], $_POST['tipe_kamar'], $_POST['harga']];
        $kamar->create($data);
    }
}

$list = $kamar->getAll();
?>

<h4>Data Kamar</h4>
<?php
$edit_id = $_GET['edit_id'] ?? null;
$edit_room = null;
if ($edit_id) {
    foreach ($list as $room) {
        if ($room['id'] == $edit_id) {
            $edit_room = $room;
            break;
        }
    }
}
?>
<form method="post" class="form-row mb-4">
  <input type="hidden" name="id" value="<?= $edit_room['id'] ?? '' ?>">
  <div class="form-group col-md-4">
    <input name="nomor_kamar" class="form-control" placeholder="Nomor Kamar" required value="<?= htmlspecialchars($edit_room['nomor_kamar'] ?? '') ?>">
  </div>
  <div class="form-group col-md-4">
    <select name="tipe_kamar" class="form-control" required>
      <option value="" disabled <?= empty($edit_room['tipe_kamar']) ? 'selected' : '' ?>>Pilih Tipe Kamar</option>
      <option value="Standart" <?= (isset($edit_room['tipe_kamar']) && $edit_room['tipe_kamar'] === 'Standart') ? 'selected' : '' ?>>Standart</option>
      <option value="VIP" <?= (isset($edit_room['tipe_kamar']) && $edit_room['tipe_kamar'] === 'VIP') ? 'selected' : '' ?>>VIP</option>
    </select>
  </div>
  <div class="form-group col-md-4">
    <input name="harga" type="number" class="form-control" placeholder="Harga per Malam" required value="<?= htmlspecialchars($edit_room['harga_per_malam'] ?? '') ?>">
  </div>
  <div class="form-group col-md-4">
    <?php if ($edit_room): ?>
      <button type="submit" name="edit" value="1" class="btn btn-primary w-100">Update</button>
      <a href="index.php" class="btn btn-secondary w-100 mt-2">Cancel</a>
    <?php else: ?>
      <button type="submit" name="create" value="1" class="btn btn-success w-100">Tambah</button>
    <?php endif; ?>
  </div>
</form>

<table class="table table-bordered">
  <thead><tr><th>No</th><th>Nomor</th><th>Tipe</th><th>Harga</th><th>Aksi</th></tr></thead>
  <tbody>
    <?php foreach ($list as $i => $k): ?>
    <tr>
      <td><?= $i+1 ?></td>
      <td><?= $k['nomor_kamar'] ?></td>
      <td><?= $k['tipe_kamar'] ?></td>
      <td><?= $k['harga_per_malam'] ?></td>
      <td>
        <form method="get" style="display:inline-block">
          <input type="hidden" name="edit_id" value="<?= $k['id'] ?>">
          <button type="submit" class="btn btn-warning btn-sm">Edit</button>
        </form>
        <form method="post" style="display:inline-block" onsubmit="return confirm('Yakin ingin menghapus kamar ini?');">
          <button name="hapus" value="<?= $k['id'] ?>" class="btn btn-danger btn-sm">Hapus</button>
        </form>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
