<?php
// Connexion à la base de données MySQL
$conn = new mysqli("localhost", "administrateur", "motdepassesupersecurise", "database");

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    // Chemin temporaire de l'image téléchargée
    $imageTmpPath = $_FILES["image"]["tmp_name"];
    
    // Nom de l'image
    $imageName = $_FILES["image"]["name"];
    
    // Récupérer l'extension de l'image
    $imageExtension = strtolower(pathinfo($imageName,PATHINFO_EXTENSION));

    // Vérifier si l'extension est valide (ajoutez les extensions supplémentaires si nécessaire)
    if($imageExtension != "jpg" && $imageExtension != "png") {
        echo "Seules les images de type JPG et PNG sont autorisées.";
    } else {
        // Lire le contenu de l'image
        $imageData = file_get_contents($imageTmpPath);

        // Convertir les données de l'image en une chaîne base64
        $imageBase64 = base64_encode($imageData);

        // Requête SQL pour insérer l'image dans la base de données
        $sql = "INSERT INTO images_files (image_name, image_extension, image_data) VALUES ('$imageName', '$imageExtension', '$imageBase64')";

        if ($conn->query($sql) === TRUE) {
            echo "Image insérée avec succès.";
        } else {
            echo "Erreur lors de l'insertion de l'image: " . $conn->error;
        }
    }
} else {
    echo "Aucune image sélectionnée ou erreur lors du téléchargement.";
}

// Fermer la connexion
$conn->close();
?>
