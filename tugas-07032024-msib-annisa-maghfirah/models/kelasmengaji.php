<?php
class KelasMengaji {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getDaftarKelas() {
        $query = "SELECT * FROM kelasmengaji";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>