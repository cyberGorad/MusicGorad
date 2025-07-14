<?php
// Connexion à la base de données
$conn = new mysqli("localhost", "administrateur", "motdepassesupersecurise", "BeatGorad");

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

// Vérifier si l'ID de l'image est passé dans l'URL
if(isset($_GET['id'])) {
    $image_id = $_GET['id'];

    // Requête pour récupérer le chemin de l'image à partir de la base de données
    $sql = "SELECT file_name, file_path FROM images_files WHERE id = ?"; // Modifier selon votre schéma de base de données

    // Préparation de la requête
    $prepare = $conn->prepare($sql);

    // Liaison des paramètres
    // bindParam pour lier la valeur du paramètre :id à la variable $image_id
    $prepare->bind_param("i", $image_id);

    // Exécution de la requête
    $prepare->execute();

    // Récupération des résultats
    $prepare->bind_result($image_name, $image_path);

    // Fetch du résultat
    if ($prepare->fetch()) {
        // En-têtes HTTP pour indiquer qu'il s'agit d'une image à télécharger
        header("Content-type: image/jpeg"); // Changer le type de contenu selon le format de votre image
        header("Content-Disposition: attachment; filename=\"$image_name\"");
        
        // Sortie du contenu de l'image
        readfile($image_path);
    } else {
        echo "Image non trouvée.";
    }

    // Fermeture des ressources
    $prepare->close();
} else {
    echo "Identifiant d'image non fourni.";
}

// Fermer la connexion à la base de données
$conn->close();
?>
