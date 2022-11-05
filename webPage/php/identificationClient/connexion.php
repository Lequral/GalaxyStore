<?php
function tentativeConnexion()
{
    if (empty($_POST)) { /*Y a t-il aucune valeur transmise par un formulaire */
        return [FALSE, FALSE];
    }

    echo "<!-- essai de co -->";

    if (is_null($_POST["mail"])) { /* mail est nul ?*/
        return [FALSE, FALSE];
    }

    $mail = $_POST["mail"];
    echo "<!-- " . "<br>mail est déf = " . $mail . "-->";

    if (is_null($_POST["mdp"])) { /* mdp est nul ?*/
        return [FALSE, FALSE];
    }

    $mdp = $_POST["mdp"];
    echo "<!-- " . "<br>mdp est déf = " . $mdp . "-->";

    require_once("./../identificationBD.php");

    $sql = "SELECT  pseudo,	mail, argent, mdp FROM client WHERE mail='$mail' AND mdp='$mdp'";

    $results = $bd->query($sql);
    // echo "results est vide ?".$results;
    $infoCompte = $results->fetchAll(PDO::FETCH_OBJ);
    unset($bd);

    if (empty($infoCompte)) {
        return [TRUE, FALSE];
    } else {
        return [TRUE, TRUE];
    }
}
$valeurs = tentativeConnexion();
$cUneTentativeDeConnexion = $valeurs[0];
$connecte = $valeurs[1];    
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
        <form action="./connexion.php" method="POST">
            <div class="container">

                <h2>Connexion
                    <?php
                    echo "tentativeDeConnexion = " . $cUneTentativeDeConnexion . "<br>";
                    echo "connecte = " . $connecte;
                    ?>
                </h2>

                <div id="interactif">

                    <div>
                        <label for="mail">
                            <?php
                            if ($cUneTentativeDeConnexion && !$connecte) { /*a essayé de se co mais c'est un échec*/
                                echo "<h5 class='error'>Mail <span>- Mail ou mot de passe invalide</span></h5>";
                            } else {
                                echo "<h5>Mail</h5>";
                                // header('Location: ./compte.php');
                                // sinon quitte
                                // exit();
                            }
                            ?>
                        </label><br>
                        <input type="text" name="mail" id="mail" required>
                    </div>
                    <div>
                        <label for="mdp">
                            <?php
                            if ($cUneTentativeDeConnexion && !$connecte) {
                                echo "<h5 class='error'>Mot de passe <span>- Mail ou mot de passe invalide</span></h5>";
                            } else {
                                echo "<h5>Mot de passe</h5>";
                                // header('Location: ./compte.php');
                                // sinon quitte
                                // exit();
                            }
                            ?>
                        </label><br>
                        <input type="password" name="mdp" id="mdp" required>
                    </div>

                    <button type="submit">
                        <h5>Se connecter</h5>
                    </button>

                    <div class="small_text">
                        <p>Vous n'avez pas de compte <a href="./inscription.php" class="small_link">S'inscrire</a></p>
                    </div>

                </div>
        </form>
    </main>

    <footer></footer>

</body>

</html>