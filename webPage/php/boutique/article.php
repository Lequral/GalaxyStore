<?php
require_once("./../identificationBD.php");

$sql = "SELECT * FROM planete;";

$sqlE = "SELECT * FROM etoile;";


$resultats = $bd->query($sql); 

$resultatsE = $bd->query($sqlE);

$planetes = $resultats->fetchAll(PDO::FETCH_OBJ);


$etoiles = $resultatsE->fetchAll(PDO::FETCH_OBJ);

unset($bd); 

$id = $_POST["id"];
$sql = 'SELECT * FROM Planete WHERE id=$_POST["id"]';
echo '<a src="../statique/image/P' . $id . '.png"></a>';

?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<title>Aperçu de la planète</title>
	<link rel="stylesheet" href="./../../css/police.css">
	<link rel="stylesheet" href="./../../css/header+footer.css">
	<link rel="stylesheet" href="./../../css/article.css">
</head>

<body id="planete">
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
                        <h5 id="butSelected">
                            Boutique
                        </h5>
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
                        <h5 id="butSelected">
                            <a href="./../boutique/boutique.php">Boutique</a>
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
		<h1>Nom de l'astre</h1>
		<div class="attribut"><h2 class="noir">Vendu</h2><h2>80% Disponible</h2></div>
		<p>
			Description...
			masse
			taille
			distance
		</p>
		<ul class="boutons">
			<li class="acheter prct">
				<div class="bouton-main">ACHETER</div>
			</li>
			<li class="vendre prct">
				<div class="bouton-main">ACHETER</div>
			</li>
			<li class="acheter">
				<div class="bouton-main">ACHETER</div>
			</li>
			<li class="vendre">
				<div class="bouton-main">ACHETER</div>
			</li>
		</ul>
	</main>



</body>

</html>