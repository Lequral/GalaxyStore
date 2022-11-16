<?php
require_once("./../identificationBD.php");

if ($_POST["type"] == "planete") {
	$sql = "SELECT * FROM planete WHERE idPl=" . $_POST["idAstre"] . ";";
} elseif ($_POST["type"] == "etoile") {
	$sql = "SELECT * FROM etoile WHERE idEt=" . $_POST["idAstre"] . ";";
}
$resultats = $bd->query($sql);

$info = get_object_vars($resultats->fetchAll(PDO::FETCH_OBJ)[0]);


// Erreur ?
$sqlPartager = 'SELECT idEt, 100-SUM(prct) AS "prctDispo" FROM partager WHERE idEt=' . $_POST["idAstre"] . ' GROUP BY idEt;';

$resultatsPartager = $bd->query($sqlPartager);

$pourcentDispo = get_object_vars($resultatsPartager->fetchAll(PDO::FETCH_OBJ)[0])["prctDispo"];


if ($_POST["type"] == "planete") {
	$sqlProprio = 'SELECT pseudo, idCl FROM client WHERE idCl = ' . $info["idCl"] . ';';
} elseif ($_POST["type"] == "etoile") {
	$sqlProprio = 'SELECT pseudo, client.idCl FROM client INNER JOIN partager ON client.idCl = partager.idCl WHERE idEt = ' . $_POST["idAstre"] . ';';
}
$resultatsProprio = $bd->query($sqlProprio);

// echo("'".empty($resultatsProprio).'"');
if (!empty($resultatsProprio)) {
	$proprio = $resultatsProprio->fetchAll(PDO::FETCH_OBJ);
} else {
	$proprio = null;
}

/* Continuité de la connexion */
if (isset($_POST) && isset($_POST["mail"]) && isset($_POST["mdp"])) {
	$sqlU = 'SELECT idCl FROM client WHERE mail="' . $_POST["mail"] . '" AND mdp="' . $_POST["mdp"] . '";';

	$resultU = $bd->query($sqlU);


	$idUserConnected = get_object_vars($resultU->fetchAll(PDO::FETCH_OBJ)[0])["idCl"];
}

unset($bd);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<title>Aperçu de l'astre</title>
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
						echo '<h2>Vendu</h2>';
					} else {
						echo '<h2 class="noir">Disponible</h2>';
					}
				} elseif ($_POST["type"] == "etoile") {
					if (intval($pourcentDispo) != 0) {
						echo '<h2 class="noir">' . $pourcentDispo . '% Disponible</h2>';
					} else {
						echo '<h2>' . $pourcentDispo . '% Disponible</h2>';
					}
				} ?>
			</div>
			<p>
				<?php
				if ($_POST["type"] == "planete") {
					if (isset($proprio)) {
						$infoProp = get_object_vars($proprio[0]);
						$propText = '<br>Propriétaire : ' . $infoProp["pseudo"];
					} else {
						$propText = null;
					}


					echo 'Masse = ' . pow(10, $info["massPl"]) . ' Kg<br>
					Surface = ' . pow(10, $info["surf"]) . ' Km²<br>
					Température moyennne de surface = ' . $info["tempPl"] . ' °C<br>
					Distance par rapport à la Terre = ' . pow(10, $info["distPl"]) . 'UA' . $propText;
				} elseif ($_POST["type"] == "etoile") {
					if (isset($proprio)) {
						$propText = "<br>Propriétaire.s : ";
						foreach ($proprio as $key => $p) {
							$pseudo = get_object_vars($p)["pseudo"];
							if ($key == 0) {
								$propText = $propText . $pseudo;
							} else {
								$propText = $propText . ", " . $pseudo;
							}
						}
						// echo $propText;
					} else {
						$propText = null;
					}

					echo 'Masse = ' . pow(10, $info["masseEt"]) . ' Kg<br>
					Surface = ' . pow(10, $info["energie"]) . ' J<br>
					Température moyennne de surface = ' . $info["tempEt"] . ' °C<br>
					Distance par rapport à la Terre = ' . pow(2, $info["distEt"]) . ' UA' . $propText;
				}
				?>
			</p>
		</div>

		<div class="boutons">

			<?php
			if (isset($_POST["mail"]) && isset($_POST["mdp"])) {

				if ($_POST["type"] == "planete") {
					// Btn ACHETER
					if (!isset($proprio)) {
						/* Pas de propriétaire donc peut être 	 si argent...*/
						echo '<button class="acheter">
								<div class="bouton-main">
									<h4>ACHETER</h4>
								</div>
							</button>';
					} else {
						echo '<button class="acheter btnDesactive">
								<div class="bouton-main">
									<h4>ACHETER</h4>
								</div>
							</button>';
					}

					// Btn VENDRE
					if (!isset($proprio)) {
						/* Pas de propriétaire 	 si argent...*/
						echo '<button class="vendre btnDesactive">
								<div class="bouton-main">
									<h4>VENDRE</h4>
								</div>
							</button>';
					} else {
						$idProprio = get_object_vars($proprio[0])["idCl"];
						if ($idUserConnected == $idProprio) { // récup idProprio
							/* Appartient pas à l'utilisateur connecté*/
							echo '<button class="vendre">
								<div class="bouton-main">
									<h4>VENDRE</h4>
								</div>
							</button>';
						} else {
							/* N'appartient pas à l'utilisateur connecté*/
							echo '<button class="vendre btnDesactive">
								<div class="bouton-main">
									<h4>VENDRE</h4>
								</div>
							</button>';
						}
					}
				}elseif($_POST["type"] == "etoile") {
					// ACHETER
					echo '<button class="acheter prct">
							<div class="bouton-main">
								<h4>ACHETER</h4>
							</div>
						</button>';

					// VENDRE
					echo '<button class="vendre prct">
							<div class="bouton-main">
								<h4>VENDRE</h4>
							</div>
						</button>';
				}
			} else {
				echo "<p>Pour intéragir, veuillez vous connecter.</p>";
			}

			?>

			<!-- <button class="vendre prct">
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