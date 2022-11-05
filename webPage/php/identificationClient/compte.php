<?php
print_r($_POST);
$mail = $_POST["mail"];
$mdp = $_POST["mdp"];

// require_once("./../identificationBD.php");

// $sql = "SELECT pseudo, argent FROM client WHERE mail='$mail' AND mdp='$mdp'";

// $results = $bd->query($sql);

// $infoCompte = $results->fetchAll(PDO::FETCH_OBJ);
// unset($bd);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Galaxy Store</title>
    <link rel="stylesheet" href="./../../css/police.css">
    <link rel="stylesheet" href="./../../css/header+footer.css">
    <link rel="stylesheet" href="./../../css/connexion.css">
</head>

<body>
    <header>
        <h3>GALAXY STORE</h3>
        <ul class="button">
            <h5><a href="./../../index.php">A propos de nous</a></h5>
            <h5><a href="./../boutique/boutique.php">Boutique</a></h5>
            <h5 id="butSelected"><a href="./compte.php">Mon compte</a></h5>
        </ul>
    </header>

    <main>
        <form action="./compte.php" method="POST">
            <div class="container">

                <h2>Mon compte</h2>

                <div id="interactif">

                    <div>
                        <label for="pseudo">
                            <h5>Pseudo</h5>
                        </label><br>
                        <input type="text" id="pseudo" required>
                    </div>
                    <div>
                        <label for="mail">
                            <h5>Mail</h5>
                        </label><br>
                        <input type="text" id="mail" required>
                    </div>
                    <div>
                        <label for="argent">
                            <h5>Argent</h5>
                        </label><br>
                        <input type="number" id="argent" required>
                    </div>
                    <div>
                        <label for="mdp">
                            <h5>Mot de passe</h5>
                        </label><br>
                        <input type="password" id="mdp" required>
                    </div>

                    <button type="submit">
                        <h5>Modifier</h5>
                    </button>
                </div>
        </form>
    </main>

    <footer></footer>

</body>

</html>