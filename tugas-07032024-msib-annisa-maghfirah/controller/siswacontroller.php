<?php
require_once 'models/siswa.php';

class SiswaController {
    public function index() {
        $siswa_model = new Siswa();
        $data['siswa'] = $siswa_model->getAllSiswa();
        require_once 'views/siswa/index.php';
    }

    public function tambah() {
        // Logika untuk menambahkan siswa
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Proses tambah siswa
        } else {
            require_once 'views/siswa/tambah.php';
        }
    }

    public function edit($id) {
        // Logika untuk mengedit siswa berdasarkan ID
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Proses edit siswa
        } else {
            $siswa_model = new Siswa();
            $data['siswa'] = $siswa_model->getSiswaById($id);
            require_once 'views/siswa/edit.php';
        }
    }

    public function hapus($id) {
        // Logika untuk menghapus siswa berdasarkan ID
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Proses hapus siswa
        } else {
            $siswa_model = new Siswa();
            $data['siswa'] = $siswa_model->getSiswaById($id);
            require_once 'views/siswa/hapus.php';
        }
    }
}
?>