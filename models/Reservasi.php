<?php
class Reservasi {
    private $conn;
    private $table = "reservasi";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $stmt = $this->conn->query("SELECT r.*, u.nama as nama_user, k.nomor_kamar FROM reservasi r
                                    JOIN users u ON r.user_id = u.id
                                    JOIN kamar k ON r.kamar_id = k.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByUser($user_id) {
        $stmt = $this->conn->prepare("SELECT r.*, k.nomor_kamar FROM reservasi r
                                      JOIN kamar k ON r.kamar_id = k.id
                                      WHERE r.user_id = ?");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->conn->prepare("INSERT INTO reservasi (user_id, kamar_id, tanggal_checkin, tanggal_checkout, status) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute($data);
    }

    public function updateStatus($id, $status) {
        $stmt = $this->conn->prepare("UPDATE reservasi SET status = ? WHERE id = ?");
        return $stmt->execute([$status, $id]);
    }
}
