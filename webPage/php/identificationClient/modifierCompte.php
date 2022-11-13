<?php
$typeModif = $_POST["submit"];

$idCl = $_POST["idCl"];

if ($typeModif == "modifier") {
    $pseudo = $_POST["pseudo"];
    $mail = $_POST["mail"];
    $argent = $_POST["argent"];
    $mdp = $_POST["mdp"];

    $sql = "UPDATE client SET pseudo='$pseudo', mail='$mail', argent=$argent, mdp='$mdp' WHERE idCl=$idCl;";
} elseif ($typeModif == "supprimer") {

    $sql = "DELETE FROM client WHERE idCl=$idCl;";
}
// echo $sql;

require_once("./../identificationBD.php");

$nb = $bd->exec($sql); /* Nb de modif/suppresion */
unset($bd);
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
        <!--<ul class="button">

            <h5><a href="./../../index.php">A propos de nous</a></h5>
            <h5><a href="./../boutique/boutique.php">Boutique</a></h5>
            <h5 id="butSelected"><a href="./compte.php">Mon compte</a></h5>
        </ul>-->
    </header>

    <main>
        <form action="./compte.php" method="POST">
            <div class="container">

                <h2><?php

                    if ($typeModif == "supprimer") {
                        if ($nb == 1) {
                            echo "Suppresion effectuée";
                        } else if ($nb == 0) {
                            echo "Aucune suppresion";
                        }
                    } elseif ($typeModif == "modifier") {
                        if ($nb > 0) {
                            echo "Modification.s effectuée.s";
                        } else {
                            echo "Aucune modification";
                        }
                    }
                    ?></h2>

                <div id="interactif">
                    <?php
                    if ($typeModif == "modifier") {
                        // echo '<input style="display: none;" type="number" name="idCl" id="idCl" value=' . $idCl . '>';
                        // echo '<input style="display: none;" type="text" id="pseudo" name="pseudo" required value="'.$pseudo.'">';
                        echo '<input style="display: none;" type="text" id="mail" name="mail" required value="' . $mail . '">';
                        // echo '<input style="display: none;" type="number" id="argent" name="argent" required value="'.$argent.'">';
                        echo '<input style="display: none;" type="password" id="mdp" name="mdp" required value="' . $mdp . '">';
                    }

                    if ($typeModif == "supprimer") {
                        echo '<a class="small_link" id="smallA" href="./../../index.php">Retour à l\'accueil</a>';
                    } elseif ($typeModif == "modifier") {
                        echo '<button type="submit"><h5>Retour à la page compte</h5></button>';
                    }
                    ?>
                </div>
        </form>
    </main>

    <footer></footer>

</body>

</html>