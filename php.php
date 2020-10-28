<?php
// chemin pour le fichier database

$pdo = new PDO ('sqlite:php.db');

// pour appeler les donnés de la table de programme
$query = $pdo -> query ('SELECT * FROM clients');

$data = $query->fetchALL(PDO::FETCH_ASSOC);

var_dump ($data);
?>