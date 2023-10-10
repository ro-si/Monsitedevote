<?php
// Vérifier si le formulaire d'inscription a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['mot_de_passe'])) {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe']; // Hash du mot de passe
    $date_inscription = date('Y-m-d H:i:s'); // Obtenez la date actuelle au format SQL

    // Connexion à la base de données
    $hostname = "localhost"; // Remplacez par l'adresse de l'hôte de la base de données
    $username = "root"; // Remplacez par votre nom d'utilisateur MySQL
    $password = ""; // Remplacez par votre mot de passe MySQL
    $database = "linkedin"; // Remplacez par le nom de votre base de données

    $conn = new mysqli($hostname, $username, $password, $database);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    // Préparation de la requête SQL
    $sql = "INSERT INTO utilisateur (nom, prenom, email, mot_de_passe, date_inscription) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Erreur de préparation de la requête : " . $conn->error);
    }

    // Bind des paramètres et exécution de la requête
    $stmt->bind_param("sssss", $nom, $prenom, $email, $mot_de_passe, $date_inscription);

    if ($stmt->execute()) {
        // Inscription réussie : afficher un message de confirmation
        echo "Inscription réussie !  Vous pouvez maintenant vous connecter <a href='connexion.php'>ici</a>.";
    } else {
        echo "Erreur lors de l'inscription : " . $stmt->error;
    }

    // Fermeture de la connexion
    $stmt->close();
    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    
   
  <div class="container">
            <section>
                <h1>INSCRIPTION</h1>
                <small>Bienvenue sur la page d'INSCRIPTION veuillez enregistrer vos coordonnées</small>
                <form action="" method="POST">
               
                <input type="text" id="nom" name="nom" placeholder="Entrez votre Nom"  required><br><br>

               
                <input type="text" id="prenom" name="prenom" placeholder="Prénom" required><br><br>

               
                <input type="email" id="email" name="email" placeholder="Email" required><br><br>

              
                <input type="password" id="mot_de_passe" name="mot_de_passe" placeholder="Mot de passe" required><br><br>

                <input type="submit" value="S'inscrire">
                </form>

                    <p>Déjà inscrit ? <a href="connexion.php">Connectez-vous ici</a></p>
            </section>
  </div>
</body>
</html>
