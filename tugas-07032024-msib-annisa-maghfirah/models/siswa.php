<?php

class Siswa {
    private $db;

    public function __construct() {
        $dsn = "mysql:host=localhost;dbname=mvcmengaji";
        $username = 'root';
        $password = '';
        $this->db = new PDO($dsn, $username, $password);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getAllSiswa() {
        $query = "SELECT * FROM siswa";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function tambahSiswa($nama, $umur, $alamat, $no_hp) {
        $query = "INSERT INTO siswa (nama, umur, alamat, no_hp) VALUES (:nama, :umur, :alamat, :no_hp)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":nama", $nama);
        $stmt->bindParam(":umur", $umur);
        $stmt->bindParam(":alamat", $alamat);
        $stmt->bindParam(":no_hp", $no_hp);
        return $stmt->execute();
    }

    public function editSiswa($id, $nama, $umur, $alamat, $no_hp) {
        $query = "UPDATE siswa SET nama = :nama, umur = :umur, alamat = :alamat, no_hp = :no_hp WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":nama", $nama);
        $stmt->bindParam(":umur", $umur);
        $stmt->bindParam(":alamat", $alamat);
        $stmt->bindParam(":no_hp", $no_hp);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    public function hapusSiswa($id) {
        $query = "DELETE FROM siswa WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
?>