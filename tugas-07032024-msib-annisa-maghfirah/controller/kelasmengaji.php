<?php
require_once '../models/kelasmengaji.php';

$kelas_model = new KelasMengaji($koneksi); // Gunakan koneksi yang sudah dibuat
$daftar_kelas = $kelas_model->getDaftarKelas();

require_once '../../views/kelasmengaji/index.php';
?>