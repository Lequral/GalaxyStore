<?php
require_once("./../identificationBD.php");

if ($_POST["type"] == "planete") {
	$sql = "SELECT * FROM planete WHERE idPl=" . $_POST["id"] . ";";
} elseif ($_POST["type"] == "etoile") {
	$sql = "SELECT * FROM etoile WHERE idEt=" . $_POST["id"] . ";";
}

$resultats = $bd->query($sql);

$info = get_object_vars($resultats->fetchAll(PDO::FETCH_OBJ)[0]);

if (isset($_POST) && isset($_POST["mail"]) && isset($_POST["mdp"])) {
	$sqlU = 'SELECT idCl FROM client WHERE mail=' . $_POST["mail"] . ' AND mdp=' . $_POST["mdp"];
	$resultU = $bd->query($sql);

	$idU = $resultU->fetchAll(PDO::FETCH_OBJ);

	echo "idCl = " . $idU;
}

unset($bd);
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

<body id="<?php echo $_POST["type"]; ?>">
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
		<div id="content">
			<h1><?php
				if ($_POST["type"] == "planete") {
					echo $info["nomPl"];
				} elseif ($_POST["type"] == "etoile") {
					echo $info["nomEt"];
				}
				?></h1>
			<div class="attribut">
				<?php
				if ($_POST["type"] == "planete") {
					if (isset($info["idCl"])) {
						echo '<h2 class="noir">Vendu</h2>';
					} else {
						echo '<h2>Disponible</h2>';
					}
				} elseif ($_POST["type"] == "etoile") {

					echo '<h2>Disponible</h2>';
				} ?>
			</div>
			<p>
				<?php
				if ($_POST["type"] == "planete") {
					echo 'Masse = ' . pow(10, $info["massPl"]) . ' Kg<br>
					Surface = ' . pow(10, $info["surf"]) . ' Km²<br>
					Température moyennne de surface = ' . $info["tempPl"] . ' °C<br>
					Distance par rapport à la Terre = ' . pow(10, $info["distPl"]) . 'UA';
				} elseif ($_POST["type"] == "etoile") {
				}
				?>
			</p>
		</div>

		<div class="boutons">
			<!-- <button class="acheter prct">
				<div class="bouton-main">
					<h4>ACHETER</h4>
				</div>
			</button>
			<button class="vendre prct">
				<div class="bouton-main">
					<h4>VENDRE</h4>
				</div>
			</button> -->
			<!-- <button class="acheter">
						<div class="bouton-main">
							<h4>ACHETER</h4>
						</div>
					</button>

			<button class="vendre">
				<div class="bouton-main">
					<h4>VENDRE</h4>
				</div>
			</button> -->
		</div>
	</main>



</body>

</html>