<?php
$title = "Modifier une annonce - Admi";

include_once("../block/header.php");

// Connexion à la BDD

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dauphineexam";


$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion

if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $id = $_POST["id"];
    $titre = $_POST["titre"];
    $contenu = mysqli_real_escape_string($conn, $_POST["contenu"]);
    $auteur = $_POST["auteur"];
    $datePublication = $_POST["date"];
    $imageUrl = mysqli_real_escape_string($conn, $_POST["image"]);

    // Requête SQL

    $sql = "UPDATE annonce SET titre='$titre', contenu='$contenu', auteur='$auteur', datePublication='$datePublication', imageUrl='$imageUrl' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "L'annonce a été modifiée !";
    } else {
        echo "Problème : " . $sql . "<br>" . $conn->error;
    }
}

?>

<div class="container">
    <h1 class="text-center">Modifier une annonce</h1>


    <form method="post" action="">
        <div class="mb-3">
            <label for="id" class="form-label">ID de l'annonce à modifier</label>
            <input type="text" class="form-control" id="id" name="id" required>
        </div>
        <div class="mb-3">
            <label for="titre" class="form-label">Nouveau titre</label>
            <input type="text" class="form-control" id="titre" name="titre" required>
        </div>
        <div class="mb-3">
            <label for="contenu" class="form-label">Nouveau contenu</label>
            <textarea class="form-control" id="contenu" name="contenu" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label for="auteur" class="form-label">Nouvel auteur</label>
            <input type="text" class="form-control" id="auteur" name="auteur" rows="5" required></input>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Nouvelle date</label>
            <input type="date" class="form-control" id="date" name="date" rows="5" required></input>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Nouvelle image</label>
            <input type="text" class="form-control" id="image" name="image" rows="5" required></input>
        </div>

        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>

<?php
include_once("../block/footer.php");
?>