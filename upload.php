<?php
// Configuration de la base de données
$servername = "localhost";
$username = "administrateur";
$password = "motdepassesupersecurise";
$database = "BeatGorad";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Vérifier si le formulaire a été soumis
if(isset($_POST['submit'])){
    // Vérifier si un fichier a été sélectionné
    if(isset($_FILES['file'])){
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_type = $_FILES['file']['type'];
        
        // Définir le répertoire de destination pour le téléchargement
        $upload_directory = "upload/";
        // Déplacer le fichier téléchargé vers le répertoire de destination
        $file_path = $upload_directory . $file_name;
        if(move_uploaded_file($file_tmp, $file_path)){
            // Insérer le chemin du fichier dans la base de données
            $sql = "INSERT INTO mp3_files (file_name,file_path) VALUES ('$file_name','$file_path')";
            if ($conn->query($sql) === TRUE) {
                echo "Le fichier a été téléchargé avec succès et enregistré dans la base de données.";
            } else {
                echo "Erreur: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Erreur lors du téléchargement du fichier.";
        }
    } else {
        echo "Aucun fichier n'a été sélectionné.";
    }
}

// Fermer la connexion à la base de données
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de fichier</title>
</head>
<body>
    <h2>Upload de fichier</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <button type="submit" name="submit">Envoyer</button>
    </form>
</body>
</html>
