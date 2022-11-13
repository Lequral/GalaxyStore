<?php 
    
    $id=$_POST["id"];
    $sql = 'SELECT * FROM Planete WHERE id=$_POST["id"]';
    echo '<a src="../statique/image/P'.$id.'.png"></a>';

	?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Aperçu de la planète</title>
    <link rel="stylesheet" href="./../../css/police.css">
    <link rel="stylesheet" href="./../../css/header+footer.css">
    <link rel="stylesheet" href="./../../css/boutique.css">
</head>

<body>

	<main>
		<h1>Nom de l'astre</h1>
		<div class="attribut noir">Vendu/Disponible à .%/</div>
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




