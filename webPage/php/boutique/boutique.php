<?php
require_once("./../identificationBD.php");

$sql = "SELECT idPl, nomPl, idCl FROM planete;";

$sqlE = "SELECT idEt, nomEt FROM etoile;";

$sqlPartager = "SELECT idEt, 100-SUM(prct) FROM partager GROUP BY idEt;";


$resultats = $bd->query($sql); /* la fonction query() est spécifique au SELECT sinon pour UPDATE, DELETE... c'est exec() */

$resultatsE = $bd->query($sqlE);

$resultatsPartager = $bd->query($sqlPartager);

$planetes = $resultats->fetchAll(PDO::FETCH_OBJ);
/*print_r($planete);*/

$etoiles = $resultatsE->fetchAll(PDO::FETCH_OBJ);

$partager =$resultatsPartager->fetchAll(PDO::FETCH_OBJ);

unset($bd); /* déconnexion de la BD */
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Galaxy Store</title>
    <link rel="stylesheet" href="./../../css/police.css">
    <link rel="stylesheet" href="./../../css/header+footer.css">
    <link rel="stylesheet" href="./../../css/boutique.css">
</head>

<body>
    <header>
        <h3>GALAXY STORE</h3>
        <ul class="button">
            <!-- <h5><a href="./../../index.php">A propos de nous</a></h5>
            <h5 id="butSelected"><a href="./boutique.php">Boutique</a></h5>
            <h5><a href="./../identificationClient/connexion.php">Connexion</a></h5> -->

            
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
        <h1 id="boutique">Boutique</h1>
        
        <div id="planete">
            <h2>Planètes</h2>
        </div>
            
        <div class="scroll" id="scrollP">
            <div id="allCasesP">

            <!--template de case
            <div class="case">
                <form action="./article.php" class="noStyle" method="POST">
                    <button class="likeA" style="background-image: url(./../../statique/image/P1.png);">
                        <h4>Ando</h4>
                        <h6 class="tag">Vendu</h6>
                    </button> 
                </form>
            </div>
            -->

            <?php
            foreach ($planetes as $p) {
                $idPl = $p->idPl;
                $nomPl = $p->nomPl;
                
                if(isset($p->idCl)) {
                    $etat = "Vendu";
                    $tag = " noir";
                }else {
                    $etat = "Disponible";
                    $tag = "";
                }

                echo '
                    <div class="case">
                        <form action="./article.php" class="noStyle" method="POST">
                            <input style="display:none;" type="number" name="id" id="id" value="'.$idPl.'">
                            <input style="display:none;" type="text" name="type" id="type" value="planete">
                            <button class="likeA" style="background-image: url(./../../statique/image/P'.$idPl.'.png);"">
                                <h4>'.$nomPl.'</h4>
                                <h6 class="tag'.$tag.'">'.$etat.'</h6>
                            </button> 
                        </form>
                    </div>';
            }
            ?>

            </div>
        </div>
            
         
        <div id="etoile">
            <h2>Etoiles</h2>
        </div>

        <div class="scroll" id="scrollE">
            <div id="allCasesE">

            <?php
            foreach ($etoiles as $e) {
                $idEt = $e->idEt;
                $nomEt = $e->nomEt;
                    
                if(isset($e->idCl)) {
                    $etat = "Vendu";
                }else {
                    $etat = "Libre";
                }

                echo '
                    <div class="case">
                        <form action="./article.php" class="noStyle" method="POST">
                            <input style="display:none;" type="number" name="id" id="id" value="'.$idEt.'">
                            <input style="display:none;" type="text" name="type" id="type" value="etoile">
                            <button  class="likeA" style="background-image: url(./../../statique/image/!.png);">
                                <h4>'.$nomEt.'</h4>
                                <h6 class="tag">'.$etat.'</h6>
                            </button> 
                        </form>
                    </div>';
            }
            ?>
                
            </div>
        </div>


    </main>

    <footer></footer>

</body>
    
</html>