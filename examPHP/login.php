<?php
require_once("utils/databaseManager.php");

$title = "Login";

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["username"], $_POST["password"])) {

    $pdo = connectDB();

    $response = $pdo->prepare("SELECT username, password FROM utilisateur WHERE username = :username AND password = :password");
    $response->execute([
        ":username" => $_POST["username"],
        ":password" => $_POST["password"]
    ]);

    $username = $response->fetch();

    if ($username !== false) {

        session_start();
        $_SESSION["username"] = $_POST["username"];

        header("Location: http://localhost/EXAMPHP/admin/admin.php");
    } else {
        $errors["global"] = "Identifiants incorrects !";
    }
}

include_once("block/header.php");
?>

<div class="container">
    <h1 class="text-center my-4"><?php echo ($title) ?></h1>

    <form method="POST" action="login.php" class="needs-validation" novalidate>

        <div class="mb-3">
            <label for="username" class="form-label">Nom d'utilisateur</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <?php
        if (isset($errors["global"])) {
            echo ("<div class='alert alert-danger'>" .
                $errors["global"] . "</div>");
        }
        ?>

        <button type="submit" class="btn btn-primary">Se Connecter</button>
    </form>
</div>

<?php
include_once("block/footer.php");
?>