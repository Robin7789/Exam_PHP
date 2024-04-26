<?php
$title = "Dauphine";

include_once("block/header.php");

// Connexion à la BDD

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dauphineexam";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion

if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

// Requête SQL

$sql = "SELECT * FROM annonce ORDER BY datePublication DESC";
$result = $conn->query($sql);

?>

<div class="container">
    <h1 class="text-center"><?php echo ($title ?? "Default Title") ?></h1>
    <br>
    <br>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>

            <div class="card mb-3">
                <div class="card-header">
                    <h2 class="card-title"><?php echo $row['titre']; ?></h2>
                    <p class="card-text"><?php echo $row['auteur']; ?></p>
                </div>
                <div class="card-body">
                    <p class="card-text"><?php echo $row['datePublication']; ?></p>
                    <p class="card-text"><?php echo $row['contenu']; ?></p>
                    <img src="<?php echo $row['imageUrl']; ?>" class="card-img-top">
                    <p class="card-text">Id : <?php echo $row['id']; ?></p>
                </div>
            </div>

    <?php
        }
    } else {
        echo "<p class='text-center'>Aucune annonce n'est disponible.</p>";
    }
    ?>
</div>

<?php
include_once("block/footer.php");
?>