<?php
require_once 'animal.php';

class Bird extends Animal {
    public function sound() {
        return "Chirp chirp!";
    }
}
?>
