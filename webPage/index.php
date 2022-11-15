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
            <p>Bienvenue sur le Galaxy Store, dans notre boutique vous pourrez y trouver des planètes ou des étoiles. En ce qui concerne les étoiles, vous pourrez les partager avec d'autres propriétaires dans le but d'utiliser leur énergie. Nous tenons à vous rappeler, que toutes les planètes présentées dans la boutique ont été conçues par notre équipe :) .Nous esperons donc, qu'elles  vous conviendront. Merci </p>
        </div>
    </main>

    <footer></footer>

</body>

</html>