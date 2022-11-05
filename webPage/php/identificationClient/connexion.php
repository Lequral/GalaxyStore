<?php

function tentativeConnexion()
{
    if (empty($_POST)) { /*Y a t-il aucune valeur transmise par un formulaire */
        return [FALSE, FALSE, NULL];
    }

    // echo "<!-- essai de co -->";

    if (is_null($_POST["mail"])) { /* mail est nul ?*/
        return [FALSE, FALSE, NULL];
    }

    $mail = $_POST["mail"];
    // echo "<!-- " . "<br>mail est déf = " . $mail . "-->";

    if (is_null($_POST["mdp"])) { /* mdp est nul ?*/
        return [FALSE, FALSE, NULL];
    }

    $mdp = $_POST["mdp"];
    // echo "<!-- " . "<br>mdp est déf = " . $mdp . "-->";

    require_once("./../identificationBD.php");

    $sql = "SELECT  mail, mdp FROM client WHERE mail='$mail' AND mdp='$mdp'";

    $results = $bd->query($sql);
    // echo "results est vide ?".$results;
    $infoCompte = $results->fetchAll(PDO::FETCH_OBJ);
    unset($bd);

    if (empty($infoCompte)) {
        return [TRUE, FALSE, NULL];
    } else {
        return [TRUE, TRUE, $infoCompte];
    }
}
$resultats = tentativeConnexion();
$cUneTentativeDeConnexion = $resultats[0];
$connecte = $resultats[1];
if (isset($resultats[2])) {
    $infoCompte = get_object_vars($resultats[2][0]);/* get_object_vars($mdp) permet de transformer un object STD:Class en array/list */
}

echo "<!--tentativeDeConnexion = " . $cUneTentativeDeConnexion . "-->";
echo "<!--connecte = " . $connecte . "-->";
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
            <h5 id="butSelected"><a href="./connexion.php">Connexion</a></h5>
        </ul>
    </header>

    <main>
        <form action="<?php
                        if (!$connecte) {
                            echo "./connexion.php";
                        } else {
                            echo "./compte.php";
                        }
                        ?>" method="POST" id="connexion">
            <div class="container">

                <h2>Connexion</h2>

                <div id="interactif">

                    <div>
                        <label for="mail">
                            <?php
                            if (!$cUneTentativeDeConnexion) { /* a pas essayé de se co*/
                                echo "<h5>Mail</h5>";
                            } elseif ($cUneTentativeDeConnexion && !$connecte) { /*a essayé de se co mais c'est un échec*/
                                echo "<h5 class='error'>Mail <span>- Mail invalide/inconnu</span></h5>";
                            } else {
                                echo "<h5>Redirection...</h5>";
                            }
                            ?>
                        </label><br>
                        <input type="text" name="mail" id="mail" required value="<?php
                                                                            if ($cUneTentativeDeConnexion && $connecte) {
                                                                                echo $infoCompte["mail"];
                                                                            }
                                                                            ?>">
                    </div>
                    <div>
                        <label for="mdp">
                            <?php
                            if (!$cUneTentativeDeConnexion) {
                                echo "<h5>Mot de passe</h5>";
                            } elseif ($cUneTentativeDeConnexion && !$connecte) {
                                echo "<h5 class='error'>Mot de passe <span>- Mot de passe invalide/inconnu</span></h5>";
                            } else {
                                echo "<h5>Redirection...</h5>";
                            }
                            ?>
                        </label><br>
                        <input type="password" name="mdp" id="mdp" required value="<?php
                                                                            if ($cUneTentativeDeConnexion && $connecte) {
                                                                                echo $infoCompte["mdp"];
                                                                            }
                                                                            ?>">
                    </div>

                    <button type="submit">
                        <h5>Se connecter</h5>
                    </button>

                    <div class="small_text">
                        <p>Vous n'avez pas de compte <a href="./inscription.php" class="small_link">S'inscrire</a></p>
                    </div>

                    <?php
                    if ($connecte) {
                        echo "<script type=\"text/javascript\">window.onload=function(){document.forms['connexion'].submit();}</script>";
                    }
                    ?>

                </div>
        </form>
    </main>

    <footer></footer>

</body>

</html>