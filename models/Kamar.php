<?php
class Kamar {
    private $conn;
    private $table = "kamar";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $stmt = $this->conn->query("SELECT * FROM kamar");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAvailableRoomTypes() {
        $stmt = $this->conn->query("
            SELECT tipe_kamar, COUNT(*) as total_rooms
            FROM kamar
            GROUP BY tipe_kamar
        ");
        $roomTypes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $availableTypes = [];
        foreach ($roomTypes as $type) {
            $tipe_kamar = $type['tipe_kamar'];
            $total_rooms = $type['total_rooms'];

            $stmt2 = $this->conn->prepare("
                SELECT COUNT(*) as booked_rooms
                FROM reservasi r
                JOIN kamar k ON r.kamar_id = k.id
                WHERE k.tipe_kamar = ? AND r.status = 'pending'
            ");
            $stmt2->execute([$tipe_kamar]);
            $booked = $stmt2->fetch(PDO::FETCH_ASSOC)['booked_rooms'];

            if ($total_rooms > $booked) {
                $availableTypes[] = $tipe_kamar;
            }
        }
        return $availableTypes;
    }

    public function create($data) {
        $stmt = $this->conn->prepare("INSERT INTO kamar (nomor_kamar, tipe_kamar, harga_per_malam) VALUES (?, ?, ?)");
        return $stmt->execute($data);
    }

    public function update($id, $data) {
        $stmt = $this->conn->prepare("UPDATE kamar SET nomor_kamar = ?, tipe_kamar = ?, harga_per_malam = ? WHERE id = ?");
        return $stmt->execute(array_merge($data, [$id]));
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM kamar WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
