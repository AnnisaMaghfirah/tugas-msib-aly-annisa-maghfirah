<?php
class Guru {
    private $db;

    public function __construct() {
        $dsn = "mysql:host=localhost;dbname=mvcmengaji";
        $username = 'root';
        $password = '';

        try {
            $this->db = new PDO($dsn, $username, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Koneksi ke database gagal: " . $e->getMessage();
            die();
        }
    }

    public function getAllGuru() {
        $query = "SELECT * FROM guru";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function tambahGuru($nama, $usia, $alamat, $no_hp, $jadwal_mengajar) {
        $query = "INSERT INTO guru (nama, usia, alamat, no_hp, jadwal_mengajar) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$nama, $usia, $alamat, $no_hp, $jadwal_mengajar]);
    }

    public function editGuru($id, $nama, $usia, $alamat, $no_hp, $jadwal_mengajar) {
        $query = "UPDATE guru SET nama=?, usia=?, alamat=?, no_hp=?, jadwal_mengajar=? WHERE id=?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$nama, $usia, $alamat, $no_hp, $jadwal_mengajar, $id]);
    }

    public function hapusGuru($id) {
        $query = "DELETE FROM guru WHERE id=?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$id]);
    }

    public function getGuruById($id) {
        $query = "SELECT * FROM guru WHERE id=?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
?>