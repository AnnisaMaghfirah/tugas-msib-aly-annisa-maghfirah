<?php
require_once 'animal.php';

class Mammal extends Animal {
    public function sound() {
        return "Some mammals make various sounds";
    }
}
?>
