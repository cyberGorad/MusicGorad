<?php
// Connexion à la base de données
$conn = new mysqli("localhost", "root", "", "database");

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}


$id = 1; //id test de telechargement

// Requête pour récupérer le nom du fichier MP3 avec l'ID spécifié
$sql = "SELECT file_name FROM mp3_files WHERE id = $id"; // Modifier selon votre schéma de base de données

// Exécution de la requête
$result = $conn->query($sql);

// Vérifier si un résultat est retourné
if ($result->num_rows > 0) {
    // Récupérer le nom du fichier MP3
    $row = $result->fetch_assoc();
    $file_name = $row['file_name'];

    // Afficher le lien de téléchargement pour le fichier MP3
    echo "<a href='telecharger.php?id=$id'>$file_name</a>";
} else {
    echo "Aucun fichier MP3 trouvé avec l'ID $id.";
}

// Fermer la connexion à la base de données
$conn->close();
?>
