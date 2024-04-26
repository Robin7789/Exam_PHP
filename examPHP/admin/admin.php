<?php
$title = "Admin";

include_once("../block/header.php");
?>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Admin</h1>
        <br>
        <br>
        <div class="row justify-content-center mt-3">
            <div class="col-auto">
                <div>
                    <button type="button" class="btn btn-primary btn-lg mx-3" onclick="location.href='ajouter.php'">Ajouter</button>
                    <button type="button" class="btn btn-primary btn-lg mx-3" onclick="location.href='modifier.php'">Modifier</button>
                    <button type="button" class="btn btn-primary btn-lg mx-3" onclick="location.href='supprimer.php'">Supprimer</button>
                </div>
            </div>
        </div>
    </div>
</body>
<br>
<br>
<br>

<?php
include_once("../block/footer.php");
?>