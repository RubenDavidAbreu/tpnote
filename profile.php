<?php
session_start();
require 'config.php'; // Fichier de configuration pour la connexion à la base de données
require_once 'vendor/autoload.php'; // Charger l'autoloader de Composer

// Configurer Twig
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/templates');
$twig = new \Twig\Environment($loader);

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Récupérer les données de l'utilisateur
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Mettre à jour les données de l'utilisateur
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    // ...autres champs...

    $sql = "UPDATE users SET username = ?, email = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $username, $email, $user_id);
    $stmt->execute();

    // Rediriger pour éviter la soumission multiple du formulaire
    header('Location: profile.php');
    exit();
}

// Afficher le template Twig
echo $twig->render('profile.twig', ['user' => $user]);
?>
