<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url(image/fond.jfif);
            background-size: cover;
            color: #333;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        h2 {
            color: rgb(255, 3, 255);
            margin-top: 50px;
        }
        form {
            margin-top: 20px;
            background-color: black;
            padding: 20px;
            border-radius: 10px;
            border: 5px solid  rgb(255, 3, 255);
            
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }
        form:hover{
            transition: 0.5s;
            box-shadow: 0 0 20px rgb(255, 3, 255),inset 0 0 20px rgb(255, 3, 255);
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: white;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="text"]:hover,
        input[type="email"]:hover,
        input[type="password"]:hover {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgb(255, 3, 255),inset 0 0 10px rgb(255, 3, 255);
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color:  rgb(66, 35, 66);
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-right: 10px;
        }
        input[type="submit"]:hover {
            box-shadow: 0 0 20px rgb(255, 6, 255), inset 0 0 20px rgb(255, 6, 255);
    
        }
        .privacy-policy {
            margin-top: 20px;
            text-align: left;
            padding-left: 20px; /* Ajout d'un padding pour le texte de confidentialité */
        }
        .privacy-policy input[type="checkbox"] {
            display: inline-block;
            vertical-align: middle;
            margin-right: 5px;
        }
        .other-links {
            margin-top: 20px;
        }
        .other-links a {
            text-decoration: none;
            color: #007bff;
            margin-right: 10px;
        }
        .error-message {
            color: red;
            font-weight: bold;
        }
        .success-message {
            color: green;
            font-weight: bold;
        }
        .error-password {
            color: yellow;
            font-weight: bold;
        }

        .btn__inscrire {
  border-radius: 10px;
  background-color: transparent;
  border-color:  rgb(255, 3, 255);

}

.btn__inscrire:hover {
  border-radius: 10px;
  transition: 1s;
  background-color: transparent;
  box-shadow: 0 0 20px rgb(255, 3, 255),inset 0 0 20px rgb(255, 3, 255);
  
}
    </style>
</head>
<body>

<?php

//Verification de l'entrée de l'utilisateur pour eviter les attaques XSS(Cross Site Scripting) -- injection des code javascript
function validate_input($data){
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    $data = trim($data);
    return $data;

}

$error_message = "";
$success_message = "";
$error_password= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    try{
        $username = validate_input($_POST['username']);
        $email = validate_input($_POST['email']);
        $password = validate_input($_POST['password']);
        $verify_password = validate_input($_POST['verify_password']);

    // Définition des expressions régulières pour la validation
        $username_regex = "/^[a-zA-Z0-9_]{3,20}$/"; // Le nom d'utilisateur doit contenir uniquement des lettres, des chiffres et des underscores, et être compris entre 3 et 20 caractères
        $email_regex = "/^\S+@\S+\.\S+$/"; // L'adresse e-mail doit avoir un format valide
        $password_regex = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$/"; // Le mot de passe doit contenir au moins une lettre majuscule, une lettre minuscule, un chiffre, un caractère spécial et être d'au moins 8 caractères

    // Validation des données d'entrée
    if ($password === $verify_password){ //GEStion affichage erreur password non identiques 
        $error_message = "";/*Pas d'erreur*/
    } else {
        $error_password = "Veuillez saisir les mêmes mot de passe";
    }
    if (!preg_match($username_regex, $username)) {
        $error_message = "Nom utilisateur incorrect";
    } elseif (!preg_match($email_regex, $email)) {
        $error_message = "L'adresse e-mail n'est pas valide.";
    } elseif (!preg_match($password_regex, $password)) {
        $error_message = "Le mot de passe doit contenir des chiffres et caracteres speciales";
    } else {
        // Connexion à la base de données
        $conn = new mysqli("localhost", "administrateur", "motdepassesupersecurise", "BeatGorad");

        if ($conn->connect_errno) {
            die("Impossible de se connecter");
        }

        // Vérification si le nom d'utilisateur est déjà utilisé
        $sql = "SELECT * FROM utilisateurs WHERE nom_utilisateurs='$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $error_message = "Le nom d'utilisateur est déjà utilisé. Veuillez en choisir un autre.";
        } else if ($password == $verify_password) {
            $password = md5($password);/*Algorithme d hashage plutot faible*/
            // Insertion des données dans la base de données
            $sql = "INSERT INTO utilisateurs (nom_utilisateurs, email, mot_de_passe) VALUES ('$username', '$email', '$password')";
            if ($conn->query($sql) === TRUE) {
                $success_message = "Compte créé avec succès. Veuillez vous connecter maintenant.";
            }
        }

        // Fermer la connexion
        $conn->close();
    }
        }catch(Exception $e){
            echo "erreur" .$e ->getmessage();
        }     
    }

?>

<h2>Inscription</h2>
<?php if (!empty($error_message)) : ?>
    <span class='error-message'><?php echo $error_message ."<br>" ;?></span>
<?php endif; ?>
<?php if (!empty($success_message)) : ?>
    <span class='success-message'><?php echo $success_message. "<br>"; ?></span>
<?php endif; ?>
<?php if (!empty($error_password)) : ?>
    <span class='error-password'><?php echo $error_password."<br>"; ?></span>
<?php endif; ?>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <label for="username">Nom d'utilisateur :</label>
    <input type="text" name="username" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>"><br>
    <label for="email">Email :</label>
    <input type="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"><br>
    <label for="password">Mot de passe :</label>
    <input type="password" name="password"><br>
    <label for="password">Vérifier le mot de passe:</label><br>
    <input type="password" id="password" name="verify_password" required><br>
    <input type="submit" value="S'inscrire">
    <br><br>
    <a href="login.html" id="connect">Se connecter</a>
    <a href="index.php" id="connect">Acceuil</a>
</form>
</body>
</html>
