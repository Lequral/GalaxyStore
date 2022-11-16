<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Galaxy Store - Transaction</title>
    <link rel="stylesheet" href="./../../css/police.css">
    <link rel="stylesheet" href="./../../css/header+footer.css">
    <link rel="stylesheet" href="./../../css/transaction.css">
</head>

<body>
    <header>
        <h3>GALAXY STORE</h3>
        <ul class="button">

            <?php
            if (isset($_POST) && isset($_POST["mail"]) && isset($_POST["mdp"])) { /*si connecté*/
                echo '<li>
                        <form action="./../../index.php" method="post" class="noStyle">
                            <input type="text" name="mail" value="' . $_POST["mail"] . '" class="hidden"></input>
                            <input type="password" name="mdp" value="' . $_POST["mdp"] . '" class="hidden"></input>
                            <button type="submit" class="likeA">
                                <h5>
                                    A propos de nous
                                </h5>
                            </button>
                        </form>
                    </li>
                    <li>
                        <form action="./boutique.php" method="post" class="noStyle">
                            <input type="text" name="mail" value="' . $_POST["mail"] . '" class="hidden"></input>
                            <input type="password" name="mdp" value="' . $_POST["mdp"] . '" class="hidden"></input>
                            <button type="submit" class="likeA">
                                <h5>
                                    Boutique
                                </h5>
                            </button>
                        </form>
                    </li>
                    <li>
                    <form action="./../identificationClient/compte.php" method="post" class="noStyle">
                        <input type="text" name="mail" value="' . $_POST["mail"] . '" class="hidden"></input>
                        <input type="password" name="mdp" value="' . $_POST["mdp"] . '" class="hidden"></input>
                        <button type="submit" class="likeA">
                            <h5>
                                Mon compte
                            </h5>          
                        </button>
                    </form>
                </li>';
            } else {
                echo '<li>
                        <h5>
                            <a href="./../../index.php">A propos de nous</a>
                        </h5>
                    </li>
                    <li>
                        <h5>
                            <a href="./boutique.php">Boutique</a>
                        </h5>
                    </li>
                    <li>
                        <h5><a href="./../identificationClient/connexion.php">Connexion</a></h5>
                    </li>';
            }
            ?>
        </ul>
    </header>

    <main>
        <div class="content">
            <h3>Transaction</h3>
            <p>
                Suite aux crises économiques et sociales, nous recontrons des difficultés temporelles et financières, c'est pourquoi nous ne sommes pas en mesure d'achever cette transaction. Vous pouvez toutefois disposer de nos autres services et nous nous excusons du désagrément. Merci de votre compréhension.
            </p>
            <form action="./article.php" method="post" class="noStyle">
                <input type="text" name="idAstre" id="idAstre" value="<?php echo $_POST["idAstre"]; ?>" class="hidden">
                <input type="text" name="type" id="type" value="<?php echo $_POST["type"]; ?>" class="hidden">
                <input type="text" name="mail" id="mail" value="<?php echo $_POST["mail"]; ?>" class="hidden">
                <input type="text" name="mdp" id="mdp" value="<?php echo $_POST["mdp"]; ?>" class="hidden">
                <button type="submit"><h5>Retour à l'article</h5></button>
            </form>
        </div>
    </main>

    <footer></footer>

</body>

</html>