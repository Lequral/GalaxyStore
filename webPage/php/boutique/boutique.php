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
                        <h5>
                            <a href="./../boutique/boutique.php">Boutique</a>
                        </h5>
                    </li>
                    <li>
                        <h5 id="butSelected"><a href="./../identificationClient/connexion.php">Connexion</a></h5>
                    </li>';
            }
            ?>
        </ul>
    </header>

    



    <main>
        <h1 id="boutique">BOUTIQUE</h1>
        
         <!-- ici le div est pas nécessaire vu que tu as qu'un élément dedans, après tu peux regrouper le titre avec les cases stv mais c'est pas obligé. -->
        <div id="planete">
            <h2>Planètes</h2>
        </div>
            
        <div class="scroll" id="scrollP">
            <div id="allCasesP">
                <div class="case">
                    
                </div>
                
                <div class="case">
                </div>
                
                <div class="case">
                </div>
                
                <div class="case">
                </div>
                
                <div class="case">
                </div>
                
                <div class="case">
                </div>
                
                <div class="case">
                </div>
                
                <div class="case">
                </div>
                
                <div class="case">
                </div>
                
                <div class="case">
                </div>
                
                <div class="case">
                </div>
                
                <div class="case">
                </div>
                
                <div class="case">
                </div>
                
                <div class="case">
                </div>
                
                <div class="case">
                </div>
            </div>
        </div>
            
         
        <div id="etoile">
            <h2>Etoiles</h2>
        </div>

        <div class="scroll" id="scrollE">
            <div id="allCasesE">
                <div class="case"> 
                </div>
                <div class="case"> 
                </div>
                <div class="case"> 
                </div>
                <div class="case"> 
                </div>
                <div class="case"> 
                </div>
                <div class="case"> 
                </div>
                <div class="case"> 
                </div>
                <div class="case"> 
                </div>
                <div class="case"> 
                </div>
                <div class="case"> 
                </div>
                <div class="case"> 
                </div>
                <div class="case"> 
                </div>
                <div class="case"> 
                </div>
                <div class="case"> 
                </div>
                <div class="case"> 
                </div>
            </div>
        </div>
    </main>

    <footer></footer>

</body>

</html>