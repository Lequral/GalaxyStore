<?php

function tentativeInscription()
{
    if (empty($_POST)) { /*Y a t-il aucune valeur transmise par un formulaire */
        return [FALSE, FALSE];
    }

    // echo "<!-- essai de co -->";

    if (is_null($_POST["pseudo"])) { /* pseudo est nul ?*/
        return [FALSE, FALSE];
    }

    $pseudo = $_POST["pseudo"];
    // echo "<!-- " . "<br>pseudo est déf = " . $pseudo . "-->";

    if (is_null($_POST["mail"])) { /* mail est nul ?*/
        return [FALSE, FALSE];
    }

    $mail = $_POST["mail"];
    // echo "<!-- " . "<br>mail est déf = " . $mail . "-->";

    if (is_null($_POST["mdp"])) { /* mdp est nul ?*/
        return [FALSE, FALSE];
    }

    $mdp = $_POST["mdp"];
    // echo "<!-- " . "<br>mdp est déf = " . $mdp . "-->";

    require_once("./../identificationBD.php");

    $sql = "SELECT mail, mdp FROM client WHERE mail='$mail' AND mdp='$mdp'";

    $results = $bd->query($sql);
    
    $infoCompte = $results->fetchAll(PDO::FETCH_OBJ);

    unset($bd);

    if (empty($infoCompte)) {
        return [TRUE, TRUE];
    } else {
        return [TRUE, FALSE];
    }
}
$resultats = tentativeInscription();
$cUneTentativedInscription = $resultats[0];
$compteDispo = $resultats[1];

echo "<!--cUneTentativedInscription = " . $cUneTentativedInscription . "-->";
echo "<!--compteDispo = " . $compteDispo . "-->";
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
            <h5 id="butSelected"><a href="./inscription.php">Inscription</a></h5>
        </ul>
    </header>

    <main>
        <form action="./inscription.php" method="POST">
            <div class="container">

                <h2>
                    <?php
                    if(!$cUneTentativedInscription) {
                        echo "Inscription";
                    }else{
                        if($compteDispo) {
                            //inscription
                            echo "Inscription...";
                        }else {
                            echo "Indentifiant.s invalide.s";
                        }
                    }
                    ?>
                </h2>

                <div id="interactif">

                    <div>
                        <label for="pseudo">
                            <h5>Pseudo</h5>
                        </label><br>
                        <input type="text" id="pseudo" name="pseudo" required>
                    </div>
                    <div>
                        <label for="mail">
                            <h5>Mail</h5>
                        </label><br>
                        <input type="text" id="mail" name="mail" required>
                    </div>
                    <div>
                        <label for="mdp">
                            <h5>Mot de passe</h5>
                        </label><br>
                        <input type="password" id="mdp" name="mdp" required>
                    </div>

                    <button type="submit">
                        <h5>S'inscrire</h5>
                    </button>
                    
                    <div class="small_text">
                        <p>Vous avez déjà un compte <a href="./connexion.php" class="small_link">Se connecter</a></p>
                    </div>
                </div>
        </form>
    </main>

    <footer></footer>

</body>

<script>
    /* Le input password est focus, on peut voir le contenu.*/
    var i=document.querySelector("input[type=password]");i.addEventListener("focusin",e=>{e.target.setAttribute("type","text");});i.addEventListener("focusout",e=>{e.target.setAttribute("type", "password");});
</script>

</html>