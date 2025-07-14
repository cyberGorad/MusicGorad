<?php
// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connexion à la base de données
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $dbname = "database";

    // Connexion à la base de données
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);
    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }

    // Nombre d'essais autorisés
    $num_attempts = 5;
    // Récupération du nombre d'essais déjà effectués
    $attempt_count = isset($_POST['attempt_count']) ? $_POST['attempt_count'] : 0;

    function verifier_utilisateurs($conn, $username, $password)
    {
        // Requête SQL pour vérifier les informations d'identification de l'utilisateur
        $sql = "SELECT * FROM utilisateurs WHERE nom_utilisateurs='$username' AND mot_de_passe='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Utilisateur trouvé, connexion réussie
            echo "Connexion réussie !";
            // Ajout du lien vers connection.html
            echo '<br><a href="connexion.html">Aller à la page de connexion</a>';
            return true; // Utilisateur trouvé
        } else {
            // Aucun utilisateur trouvé avec les informations d'identification fournies
            echo "Identifiants incorrects. Veuillez réessayer.";
            echo '<br><a href="inscription.html">Créer un compte si vous n\'en avez pas encore</a>';
            return false; // Utilisateur non trouvé
        }
    }

    if ($attempt_count < $num_attempts) {
        $attempt_count++;
        // Si la connexion réussit, pas besoin de vérifier à nouveau
        if (!verifier_utilisateurs($conn, $username, $password)) {
            // Ajout du compteur d'essais dans le formulaire pour le renvoyer lors de la prochaine tentative
            echo "<form method='POST' action='" . $_SERVER['PHP_SELF'] . "'>";
            echo "<input type='hidden' name='attempt_count' value='$attempt_count'>";
            echo "<input type='hidden' name='username' value='$username'>";
            echo "Nom d'utilisateur: <input type='text' name='username' value='$username'><br>";
            echo "Mot de passe: <input type='password' name='password'><br>";
            echo "<input type='submit' value='Réessayer'>";
            echo "</form>";
        }
    } else {
        echo "Vous avez dépassé le nombre maximal d'essais. Veuillez réessayer plus tard.";
        // Ajout du lien vers la page de connexion
        echo '<br><a href="connexion.html">Retour à la page de connexion</a>';
    }

    // Fermeture de la connexion à la base de données
    $conn->close();
}
?>
