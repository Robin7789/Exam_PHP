<?php
$title = "Supprimer une annonce - Admin";

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

    // Requête SQL

    $sql = "DELETE FROM annonce WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "L'annonce a été supprimée !";
    } else {
        echo "Problème : " . $sql . "<br>" . $conn->error;
    }
}

?>

<div class="container">
    <h1 class="text-center">Supprimer une annonce</h1>

    <form method="post" action="">
        <div class="mb-3">
            <label for="id" class="form-label">ID de l'annonce à supprimer</label>
            <input type="text" class="form-control" id="id" name="id" required>
        </div>
        <button type="submit" class="btn btn-danger">Supprimer</button>
    </form>
</div>

<?php
include_once("../block/footer.php");
?>