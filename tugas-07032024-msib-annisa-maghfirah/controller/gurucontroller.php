<?php
require_once '../../models/guru.php';

class ControllerGuru {
    private $db;
    private $guru_model;

    public function __construct($db) {
        $this->db = $db;
        $this->guru_model = new Guru($db);
    }

    public function tambahGuru($nama, $usia, $alamat, $no_hp, $jadwal_mengajar) {
        return $this->guru_model->tambahGuru($nama, $usia, $alamat, $no_hp, $jadwal_mengajar);
    }

    public function editGuru($id, $nama, $usia, $alamat, $no_hp, $jadwal_mengajar) {
        return $this->guru_model->editGuru($id, $nama, $usia, $alamat, $no_hp, $jadwal_mengajar);
    }

    public function hapusGuru($id) {
        return $this->guru_model->hapusGuru($id);
    }

    public function getGuruById($id) {
        return $this->guru_model->getGuruById($id);
    }

    public function getAllGuru() {
        return $this->guru_model->getAllGuru();
    }
}
?>