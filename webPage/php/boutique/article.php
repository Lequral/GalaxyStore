<?php
require_once("./../identificationBD.php");

/* Récup info de l'astre */
if ($_POST["type"] == "planete") {
	$sql = "SELECT * FROM planete WHERE idPl=" . $_POST["idAstre"] . ";";
} elseif ($_POST["type"] == "etoile") {
	$sql = "SELECT * FROM etoile WHERE idEt=" . $_POST["idAstre"] . ";";
}
$resultats = $bd->query($sql);

$info = get_object_vars($resultats->fetchAll(PDO::FETCH_OBJ)[0]);

/* Récup le pourcentage de part disponible */
$sqlPartager = 'SELECT idEt, 100-SUM(prct) AS "prctDispo" FROM partager WHERE idEt=' . $_POST["idAstre"] . ' GROUP BY idEt;';

$resultatsPartager = $bd->query($sqlPartager);

$pourcentDispo = get_object_vars($resultatsPartager->fetchAll(PDO::FETCH_OBJ)[0])["prctDispo"];


/* Récup les propriétaires */
if ($_POST["type"] == "planete") {
	$sqlProprio = 'SELECT pseudo, idCl FROM client WHERE idCl = ' . $info["idCl"] . ';';
} elseif ($_POST["type"] == "etoile") {
	$sqlProprio = 'SELECT pseudo, client.idCl, prct FROM client INNER JOIN partager ON client.idCl = partager.idCl WHERE idEt = ' . $_POST["idAstre"] . ';';
}
$resultatsProprio = $bd->query($sqlProprio);

/* Continuité de la connexion */
if (isset($_POST) && isset($_POST["mail"]) && isset($_POST["mdp"])) {
	$sqlU = 'SELECT idCl FROM client WHERE mail="' . $_POST["mail"] . '" AND mdp="' . $_POST["mdp"] . '";';

	$resultU = $bd->query($sqlU);


	$idUserConnected = get_object_vars($resultU->fetchAll(PDO::FETCH_OBJ)[0])["idCl"];
}

/* Fini de récup les propriétaires */
if (!empty($resultatsProprio)) {
	$proprio = $resultatsProprio->fetchAll(PDO::FETCH_OBJ);

	// test si l'utilisateur connecté est dans les proprio
	if ($_POST["type"] == "etoile" && !empty($idUserConnected)) {
		foreach ($proprio as $p) {
			$idP = get_object_vars($p)["idCl"];
			$prct = get_object_vars($p)["prct"];
			if ($idP == $idUserConnected) {
				$prctUserConnected = $prct;
			}
		}
		if (empty($prctUserConnected)) {
			$prctUserConnected = 0;
		}
	}
} else {
	$proprio = null;
}




unset($bd);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<title>Galaxy Store - Aperçu</title>
	<link rel="stylesheet" href="./../../css/police.css">
	<link rel="stylesheet" href="./../../css/header+footer.css">
	<link rel="stylesheet" href="./../../css/article.css">
</head>

<body <?php echo 'id="' . $_POST["type"] . '"';
		if ($_POST["type"] == "planete") {
			echo 'style="background-image: url(./../../statique/image/PG' . $_POST["idAstre"] . '.jpg);"';
		}
		?>>
	<div id="bg">

	</div>
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
						echo '<h2 class="noir">Disponible</h2>';
					}
				} elseif ($_POST["type"] == "etoile") {
					echo '<h2 class="noir">' . $pourcentDispo . '% Disponible</h2>';					
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
					Distance par rapport à la Terre = ' . $info["distPl"] . ' UA' . $propText;
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
						// "echo $propText;
					} else {
						$propText = null;
					}

					echo 'Masse = ' . pow(10, $info["masseEt"]) . ' Kg<br>
					Surface = ' . pow(10, $info["energie"]) . ' J<br>
					Température moyennne de surface = ' . $info["tempEt"] . ' °C<br>
					Distance par rapport à la Terre = ' . $info["distEt"] . ' UA' . $propText;
				}
				?>
			</p>
		</div>

		<div class="boutons">
			<?php
			if (isset($_POST["mail"]) && isset($_POST["mdp"])) {
				$inputCo = '<input type="text" name="mail" id="mail" class="hidden" value="' . $_POST["mail"] . '">
				<input type="text" name="mdp" id="mdp" class="hidden" value="' . $_POST["mdp"] . '">';
				
				if ($_POST["type"] == "planete") {
					// ACHETER
					if (!isset($proprio)) {
						/* Pas de propriétaire donc peut être 	 si argent...*/
						echo '<form action="./transaction.php" method="post" class="noStyle btnTransac">
								<input type="number" name="prct" id="prct" min="1" max="100" value="100">
								<input type="text" name="type" id="type" value="planete" class="hidden">
								' . $inputCo . '
								<input type="text" name="idAstre" id="idAstre" class="hidden" value="'.$_POST["idAstre"].'">
								<input type="submit" value="acheter" class="acheter">
							</form>';
					} else {
						echo '<form action="./transaction.php" method="post" class="noStyle btnTransac btnDesactive">
								<input type="number" name="prct" id="prct" min="1" max="100" value="100">
								<input type="text" name="type" id="type" value="planete" class="hidden">
								' . $inputCo . '
								<input type="text" name="idAstre" id="idAstre" class="hidden" value="'.$_POST["idAstre"].'">
								<input type="submit" value="acheter" class="acheter">
							</form>';
					}

					// VENDRE
					if (!isset($proprio)) {
						/* Pas de propriétaire 	 si argent...*/
						echo '<form action="./transaction.php" method="post" class="noStyle btnTransac btnDesactive">
								<input type="number" name="prct" id="prct" min="1" max="100" value="100">
								<input type="text" name="type" id="type" value="planete" class="hidden">
								' . $inputCo . '
								<input type="text" name="idAstre" id="idAstre" class="hidden" value="'.$_POST["idAstre"].'">
								<input type="submit" value="vendre" class="vendre">
							</form>';
					} else {
						$idProprio = get_object_vars($proprio[0])["idCl"];
						if ($idUserConnected == $idProprio) { // récup idProprio
							/* Appartient pas à l'utilisateur connecté*/
							echo '<form action="./transaction.php" method="post" class="noStyle btnTransac">
									<input type="number" name="prct" id="prct" min="1" max="100" value="100">
									<input type="text" name="type" id="type" value="planete" class="hidden">
									' . $inputCo . '
									<input type="text" name="idAstre" id="idAstre" class="hidden" value="'.$_POST["idAstre"].'">
									<input type="submit" value="vendre" class="vendre">
								</form>';
						} else {
							/* N'appartient pas à l'utilisateur connecté*/
							echo '<form action="./transaction.php" method="post" class="noStyle btnTransac btnDesactive">
									<input type="number" name="prct" id="prct" min="1" max="100" value="100">
									<input type="text" name="type" id="type" value="planete" class="hidden">
									' . $inputCo . '
									<input type="text" name="idAstre" id="idAstre" class="hidden" value="'.$_POST["idAstre"].'">
									<input type="submit" value="vendre" class="vendre">
								</form>';
						}
					}
				} elseif ($_POST["type"] == "etoile") {

					// ACHETER
					if (intval($pourcentDispo) > 0) {
						echo '<form action="./transaction.php" method="post" class="noStyle btnTransac prct">
								<input type="number" name="prct" id="prct" min="1" max="' . $pourcentDispo . '" value="' . $pourcentDispo . '">
								<input type="text" name="type" id="type" value="etoile" class="hidden">
								' . $inputCo . '
								<input type="text" name="idAstre" id="idAstre" class="hidden" value="'.$_POST["idAstre"].'">
								<input type="submit" value="acheter" class="acheter">
							</form>';
					} elseif (intval($pourcentDispo) == 0) {
						echo '<form action="./transaction.php" method="post" class="noStyle btnTransac prct btnDesactive">
								<input type="number" name="prct" id="prct" min="1" max="' . $pourcentDispo . '" value="' . $pourcentDispo . '">
								<input type="text" name="type" id="type" value="etoile" class="hidden">
								' . $inputCo . '
								<input type="text" name="idAstre" id="idAstre" class="hidden" value="'.$_POST["idAstre"].'">
								<input type="submit" value="acheter" class="acheter">
							</form>';
					}

					// VENDRE
					if (intval($prctUserConnected) > 0) {
						echo '<form action="./transaction.php" method="post" class="noStyle btnTransac prct">
								<input type="number" name="prct" id="prct" min="1" max="' . $prctUserConnected . '" value="' . $prctUserConnected . '">
								<input type="text" name="type" id="type" value="etoile" class="hidden">
								' . $inputCo . '
								<input type="text" name="idAstre" id="idAstre" class="hidden" value="'.$_POST["idAstre"].'">
								<input type="submit" value="vendre" class="vendre">
							</form>';
					} elseif (intval($prctUserConnected) == 0) {
						echo '<form action="./transaction.php" method="post" class="noStyle btnTransac prct 	btnDesactive">
								<input type="number" name="prct" id="prct" min="1" max="' . $prctUserConnected . '" value="' . $prctUserConnected . '">
								<input type="text" name="type" id="type" value="etoile" class="hidden">
								' . $inputCo . '
								<input type="text" name="idAstre" id="idAstre" class="hidden" value="'.$_POST["idAstre"].'">
								<input type="submit" value="vendre" class="vendre">
							</form>';
					}
				}
			} else {
				echo "<p>Pour intéragir, veuillez vous connecter.</p>";
			}

			?>
		</div>
	</main>



</body>

</html>