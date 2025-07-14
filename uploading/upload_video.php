<?php
// Configuration de la base de données
$servername = "localhost";
$username = "root";
$password = "";
$database = "database";

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
      
        
        // Insérer le chemin du fichier dans la base de données
        $sql = "INSERT INTO mp4_files (video_name) VALUES ('$file_name')";
        if ($conn->query($sql) === TRUE) {
            echo "Le fichier a été téléchargé avec succès et enregistré dans la base de données.";
        } else {
            echo "Erreur: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Aucun fichier n'a été sélectionné.";
    }
}

// Fermer la connexion à la base de données
$conn->close();
?>

