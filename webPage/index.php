<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Galaxy Store</title>
    <link rel="stylesheet" href="./css/police.css">
    <link rel="stylesheet" href="./css/header+footer.css">
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>
    <header>
        <h3>GALAXY STORE</h3>
        <ul class="button">

            <?php
            if (isset($_POST) && isset($_POST["mail"]) && isset($_POST["mdp"])) { /*si connecté*/
                echo '<li>
                        <h5 id="butSelected">
                            A propos de nous
                        </h5>
                    </li>
                    <li>
                        <form action="./php/boutique/boutique.php" method="post" class="noStyle">
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
                    <form action="./php/identificationClient/compte.php" method="post" class="noStyle">
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
                        <h5 id="butSelected">
                            <a href="./../../index.php">A propos de nous</a>
                        </h5>
                    </li>
                    <li>
                        <h5>
                            <a href="./php/boutique/boutique.php">Boutique</a>
                        </h5>
                    </li>
                    <li>
                        <h5><a href="./php/identificationClient/connexion.php">Connexion</a></h5>
                    </li>';
            }
            ?>
        </ul>
        <div id="bgHeader"></div>
    </header>

    <main>
        <h1>A propos de nous</h1>
        <div>
            <p>Bienvenue sur le Galaxy Store, dans notre boutique, vous pourrez trouver différents astres telles que des planètes et des étoiles. En ce qui concerne les étoiles, vous pourrez acheter des parts dans le but d'utiliser l'énergie qui leur est associés. Nous tenons à vous rappeler, que tous les visuels présentés sur notre site ont été conçus par notre équipe :) .Nous espérons donc, qu'ils vous conviendront. Merci </p>
        </div>
    </main>

    <footer></footer>

</body>

</html>