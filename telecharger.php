<?php
// Connexion à la base de données
$conn = new mysqli("localhost", "administrateur", "motdepassesupersecurise", "BeatGorad");

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

// Vérifier si l'ID du fichier MP3 est passé dans l'URL
if(isset($_GET['id'])) {
    $file_id = $_GET['id'];

    // Requête pour récupérer le chemin du fichier à partir de la base de données
    $sql = "SELECT file_name, file_path FROM mp3_files WHERE id = ?"; // Modifier selon votre schéma de base de données

    // Préparation de la requête
    $prepare = $conn->prepare($sql);

    // Liaison des paramètres
    // bindParam pour lier la valeur du paramètre :id à la variable $file_id
    $prepare->bind_param("i", $file_id);

    // Exécution de la requête
    $prepare->execute();

    // Récupération des résultats
    $prepare->bind_result($file_name, $file_path);
    // -> association méthode objet 

    // Fetch du résultat
    if ($prepare->fetch()) {
        // En-têtes HTTP pour indiquer qu'il s'agit d'un fichier MP3 à télécharger
        header("Content-type: audio/mpeg");
        header("Content-Disposition: attachment; filename=\"$file_name\"");
        
        // Sortie du contenu du fichier
        readfile($file_path);
    } else {
        echo "Fichier non trouvé.";
    }

    // Fermeture des ressources
    $prepare->close();
} else {
    echo "Identifiant de fichier non fourni.";
}

// Fermer la connexion à la base de données
$conn->close();
?>
