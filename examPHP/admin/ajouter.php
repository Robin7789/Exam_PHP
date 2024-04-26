<?php
$title = "Ajouter une annonce - Admin";

include_once("../block/header.php");

// Connexion à la base BDD

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dauphineexam";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion

if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titre = $_POST["titre"];
    $contenu = mysqli_real_escape_string($conn, $_POST["contenu"]);
    $auteur = $_POST["auteur"];
    $datePublication = $_POST["date"];
    $imageUrl = mysqli_real_escape_string($conn, $_POST["image"]);

    //Requête SQL

    $sql = "INSERT INTO annonce (titre, contenu, auteur, datePublication, imageUrl) VALUES ('$titre', '$contenu', '$auteur', '$datePublication', '$imageUrl')";

    if ($conn->query($sql) === TRUE) {
        echo "L'annonce a été ajoutée !";
    } else {
        echo "Problème : " . $sql . "<br>" . $conn->error;
    }
}

?>

<div class="container">
    <h1 class="text-center">Ajouter une annonce</h1>

    <form method="post" action="">
        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" required>
        </div>
        <div class="mb-3">
            <label for="contenu" class="form-label">Contenu</label>
            <textarea class="form-control" id="contenu" name="contenu" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label for="auteur" class="form-label">Auteur</label>
            <input type="text" class="form-control" id="auteur" name="auteur" rows="5" required></input>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" rows="5" required></input>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" class="form-control" id="image" name="image" rows="5" required></input>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>

<?php
include_once("../block/footer.php");
?>