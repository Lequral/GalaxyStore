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
    <link rel="stylesheet" href="./../../css/boutique2.css">
</head>

<body>

	<div>
		nom
		masse
		surface
		température

	</div>


	
   

</body>
</html>




