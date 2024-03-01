<?php
require_once 'bird.php';
require_once 'mammal.php';
require_once 'reptile.php';

// Membuat beberapa instance objek untuk berbagai jenis binatang
$animals = [
    new Bird("Elang", "Burung"),
    new Mammal("Harimau", "Mamalia"),
    new Bird("Merpati", "Burung"),
    new Mammal("Gajah", "Mamalia"),
    new Bird("Pinguin", "Burung"),
    new Mammal("Singa", "Mamalia"),
    new Bird("Merak", "Burung"),
    new Mammal("Kuda", "Mamalia"),
    new Reptile("Kadal", "Reptil"),
    new Reptile("Ular", "Reptil")
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Information</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Informasi Binatang</h2>
    <table>
        <tr>
            <th>Nama Binatang</th>
            <th>Jenis Binatang</th>
        </tr>
        <?php foreach ($animals as $animal): ?>
        <tr>
            <td><?php echo $animal->getName(); ?></td>
            <td><?php echo $animal->getSpecies(); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
