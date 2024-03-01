<?php

require_once 'animal.php';

class Reptile extends Animal {
    public function __construct($name, $species) {
        parent::__construct($name, $species);
    }
}

?>
