<?php
include '../../auth.php';
include '../layout/header.php';
require_once '../../config/Database.php';
require_once '../../models/Reservasi.php';

$db = (new Database())->connect();
$reservasi = new Reservasi($db);

$list = $_SESSION['user']['role'] === 'admin'
  ? $reservasi->getAll()
  : $reservasi->getByUser($_SESSION['user']['id']);
?>

<h4>Data Reservasi</h4>
<table class="table table-bordered">
  <thead>
    <tr><th>No</th><th>User</th><th>Kamar</th><th>Check-in</th><th>Check-out</th><th>Status</th></tr>
  </thead>
  <tbody>
    <?php foreach ($list as $i => $r): ?>
    <tr>
      <td><?= $i+1 ?></td>
      <td><?= $r['nama_user'] ?? '-' ?></td>
      <td><?= $r['nomor_kamar'] ?></td>
      <td><?= $r['tanggal_checkin'] ?></td>
      <td><?= $r['tanggal_checkout'] ?></td>
      <td><?= $r['status'] ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
