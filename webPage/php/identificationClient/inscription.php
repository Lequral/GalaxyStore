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

                <h2>Inscription</h2>

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
                        <label for="mdp">
                            <h5>Mot de passe</h5>
                        </label><br>
                        <input type="password" id="mdp" required>
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

</html>