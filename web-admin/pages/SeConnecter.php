<?php
// Établir une connexion à la base de données (à adapter selon votre configuration)
$host = 'localhost';
$dbName = 'ecom_database';
$user = 'root';
$password = '';
$dsn = "mysql:host=$host;dbname=$dbName;charset=utf8mb4";

try {
  $pdo = new PDO($dsn, $user, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Erreur de connexion à la base de données : " . $e->getMessage();
  exit();
}

// Récupérer les valeurs saisies par l'utilisateur
$email = $_POST['EMAIL_ADMIN'];
$password = $_POST['PASSWORD'];

// Effectuer la requête pour récupérer les informations d'utilisateur correspondant à l'e-mail saisi
$query = $pdo->prepare("SELECT * FROM administratrice WHERE EMAIL_ADMIN = :email");
$query->bindParam(':email', $email);
$query->execute();
$user = $query->fetch(PDO::FETCH_ASSOC);


if (!empty($user) && $user['PASSWORD'] == $password && $user['EMAIL_ADMIN'] == $email) {
  session_start();
  $_SESSION['EMAIL_ADMIN'] = $email;
  header('Location: ../index.php');
  exit();
} else {
  header('Location: login.php?error=true');
  exit();
}



?>
