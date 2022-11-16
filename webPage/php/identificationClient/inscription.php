<?php

if (empty($_POST)) { /*Y a t-il aucune valeur transmise par un formulaire */
    $resultats = [FALSE, FALSE];
} else {

    if (is_null($_POST["pseudo"])) { /* pseudo est nul ?*/
        $resultats = [FALSE, FALSE];
    } else {

        $pseudo = $_POST["pseudo"];

        if (is_null($_POST["mail"])) { /* mail est nul ?*/
            $resultats = [FALSE, FALSE];
        } else {

            $mail = $_POST["mail"];

            if (is_null($_POST["mdp"])) { /* mdp est nul ?*/
                $resultats = [FALSE, FALSE];
            } else {

                $mdp = $_POST["mdp"];

                require_once("./../identificationBD.php");

                $sql = "SELECT mail, mdp FROM client WHERE mail='$mail' AND mdp='$mdp'";

                $results = $bd->query($sql);

                $compte = $results->fetchAll(PDO::FETCH_OBJ);
                
                if (empty($compte)) {
                    $resultats = [TRUE, TRUE];
                } else {
                    $resultats = [TRUE, FALSE];
                }
            }
        }
    }
}


$cUneTentativedInscription = $resultats[0];
$compteDispo = $resultats[1];

echo "<!--cUneTentativedInscription = " . $cUneTentativedInscription . "-->";
echo "<!--compteDispo = " . $compteDispo . "-->";

$nb = 0;

if ($cUneTentativedInscription && $compteDispo) {

    $sql = 'INSERT INTO client(`pseudo`, `mail`, `argent`, `mdp`) VALUES ("' . $_POST["pseudo"] . '", "' . $_POST["mail"] . '", 0, "' . $_POST["mdp"] . '");';

    // echo $sql;

    $nb = $bd->exec($sql);
    // echo "nb =" . $nb;

}

unset($bd);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Galaxy Store - Inscription</title>
    <link rel="stylesheet" href="./../../css/police.css">
    <link rel="stylesheet" href="./../../css/header+footer.css">
    <link rel="stylesheet" href="./../../css/connexion.css">
</head>

<body>
    <header>
        <h3>GALAXY STORE</h3>
        <ul class="button">
            <li>
                <h5><a href="./../../index.php">A propos de nous</a></h5>
            </li>
            <li>
                <h5><a href="./../boutique/boutique.php">Boutique</a></h5>
            </li>
            <li>
                <h5 id="butSelected"><a href="./inscription.php">Inscription</a></h5>
            </li>
        </ul>
    </header>

    <main>
        <form action="./inscription.php" method="POST">
            <div class="container">

                <h2>
                    <?php
                    if (!$cUneTentativedInscription) {
                        echo "Inscription";
                    } else {
                        if ($compteDispo) {
                            //inscription
                            if ($nb >= 1) {
                                echo "Inscription réussie";
                            } elseif ($nb == 0) {
                                echo "Echec de l'inscription";
                            }
                        } else {
                            echo "Inscription";
                        }
                    }
                    ?>
                </h2>

                <div id="interactif">

                    <div <?php
                            if ($nb > 0) { /* Si inscription réussie */
                                echo 'style="display: none;"';
                            }
                            ?>>
                        <label for="pseudo">
                            <?php
                            if ($cUneTentativedInscription && !$compteDispo) {
                                echo '<h5 class="error">Pseudo <span>- Pseudo invalide</span></h5>';
                            } else {
                                echo '<h5>Pseudo</h5>';
                            }
                            ?>
                        </label><br>
                        <input type="text" id="pseudo" name="pseudo" required>
                    </div>
                    <div <?php
                            if ($nb > 0) {
                                echo 'style="display: none;"';
                            }
                            ?>>
                        <label for="mail">
                            <?php
                            if ($cUneTentativedInscription && !$compteDispo) {
                                echo '<h5 class="error">Mail <span>- Mail invalide</span></h5>';
                            } else {
                                echo '<h5>Mail</h5>';
                            }
                            ?>
                        </label><br>
                        <input type="text" id="mail" name="mail" required>
                    </div>
                    <div <?php
                            if ($nb > 0) {
                                echo 'style="display: none;"';
                            }
                            ?>>
                        <label for="mdp">
                            <?php
                            if ($cUneTentativedInscription && !$compteDispo) {
                                echo '<h5 class="error">Mot de passe <span>- Mot de passe invalide</span></h5>';
                            } else {
                                echo '<h5>Mot de passe</h5>';
                            }
                            ?>
                        </label><br>
                        <input type="password" id="mdp" name="mdp" required>
                    </div>

                    <button type="submit" <?php
                                            if ($nb > 0) {
                                                echo 'style="display: none;"';
                                            }
                                            ?>>
                        <h5>S'inscrire</h5>
                    </button>

                    <div class="small_text" <?php
                                            if ($nb > 0) {
                                                echo 'style="display: none;"';
                                            }
                                            ?>>
                        <p>Vous avez déjà un compte <a href="./connexion.php" class="small_link">Se connecter</a></p>
                    </div>

                    <?php
                    if ($nb > 0) {
                        echo '<a href="./connexion.php" class="small_link" style="text-align:center;">Se connecter</a>';
                    }
                    ?>
                </div>
        </form>
    </main>

    <footer></footer>

</body>

<script>
    /* Le input password est focus, on peut voir le contenu.*/
    var i = document.querySelector("input[type=password]");
    i.addEventListener("focusin", e => {
        e.target.setAttribute("type", "text");
    });
    i.addEventListener("focusout", e => {
        e.target.setAttribute("type", "password");
    });
</script>

</html>