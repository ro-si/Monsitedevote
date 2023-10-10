<?php

session_start();

$serveur = "localhost"; // Adresse du serveur de base de données
$username = "root"; // Nom d'utilisateur de la base de données
$password = ""; // Mot de passe de la base de données
$dbname = "linkedin"; // Nom de la base de données

try {
    // Create connection using PDO
    $conn = new PDO("mysql:host=$serveur;dbname=$dbname", $username, $password);
    
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $mot_de_passe = $_POST["mot_de_passe"];

        // Requête pour vérifier les informations de connexion
        $requete = $conn->prepare("SELECT * FROM utilisateur WHERE email = :email");
        $requete->bindParam(":email", $email);
        $requete->execute();
        $utilisateur = $requete->fetch(PDO::FETCH_ASSOC);

        if ($utilisateur && $mot_de_passe == $utilisateur["mot_de_passe"]) {
            $_SESSION["utilisateur_id"] = $utilisateur["id"];
            header("Location: location.php"); // Assurez-vous que le nom du fichier est correct
            exit();
        } else {
            $messageErreur = "Email ou mot de passe incorrect";
        }
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Connexion</title>
    <style>
        body{
    background-color:rgba(46, 134, 215, 0.5);
 }
 .container {
    width: 400px; 
     margin: 0 auto;
     text-align: center;
     background-color: white;
    padding-left: 30px;
    padding-right: 30px;
    padding-top: 20px; 
     border-radius: 10px; 
     border: 1px solid #ccc;
     border-radius: 5px; 
}
input[type="email"],
input[type="password"] {
    width: 100%;
    border-radius: 3px; 
	border: none;
	border-bottom: 1px solid rgba(46, 134, 215, 0.5);
	background: none;
	outline: none;
	padding: 10px 5px;
	margin-bottom: 20px;
	color: #090808;
}
input[type="submit"] {
    background-color: #0073e6;
    color: #fff;
    border: none;
   
    padding-top: 0.5rem;
      padding-bottom: 0.5rem;
    border-radius: 2px;
    cursor: pointer;
} 
input[type="submit"]:hover{
    color: #040404;
    border-radius: 8px;
    background-color: rgb(51, 115, 225);
    padding: 8px ;
}
.ree{
    font-family: Arial, Helvetica, sans-serif;
    text-align: center;
 }
 .ree h1{
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

 }
  small{
    color: darkgray;
    font-size: 0.5rem;
 }

    </style>
</head>
<body>
    <div class="container">
        <section>
            <h2>Connexion</h2>

            <?php if (isset($messageErreur)) { ?>
                <p style="color: red;"><?php echo $messageErreur; ?></p>
            <?php } ?>
            <form action="" method="POST">
                
                <input type="email" id="email" name="email" placeholder="Email" required><br><br>

                <input type="password" id="mot_de_passe" name="mot_de_passe" placeholder="Mot de passe " required><br><br>

                <input type="submit" value="Se Connecter">
            </form>
            <p>Vous n'avez pas de compte!<a href="enregister.php">Inscrivez-vous ici</a></p>
        </section>
    </div>
</body>
</html>
