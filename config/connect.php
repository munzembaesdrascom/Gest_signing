<?php
$hostname = '127.0.0.1';   // L'hôte de la base de données
$username = 'root'; // Votre nom d'utilisateur MySQL
$password = 'Henrysef'; // Votre mot de passe MySQL
$database = 'Gest_Sign'; // Le nom de votre base de données

try {
    $pdo = new PDO("mysql:host=$hostname;port=3306;dbname=$database;charset=utf8mb4", $username, $password);
    // Configurez les options PDO si nécessaire
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
