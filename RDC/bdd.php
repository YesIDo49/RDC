<?php


try {
    $db = new PDO("mysql:host=localhost;dbname=update_file", "root", "root");
} catch (PDOException $e) {
    die("Erreur connexion : " . $e->getMessage());
}