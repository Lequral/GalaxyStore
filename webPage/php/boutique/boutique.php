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
        <h1 id="boutique">BOUTIQUE</h1>
        
         <!-- ici le div est pas nécessaire vu que tu as qu'un élément dedans, après tu peux regrouper le titre avec les cases stv mais c'est pas obligé. -->
        <div id="planete">
            <h2>Planètes</h2>
        </div>
            
        <div class="scroll" id="scrollP">
            <div id="allCasesP">
                <div class="case">
                    <form action="./boutique2.php" method="POST">
                        <h4>Ando</h4>
                        <button id="1">
                            <img src="../../statique/image/P1.png" width="100%">
                        </button>
                            
                    </form>
                    
                </div>
                
                <div class="case">
                    <form action="./boutique2.php" method="POST">
                        <h4>Ando</h4>
                        <button id="2">
                            <img src="../../statique/image/P2.png" width="100%">
                        </button>
                            
                    </form>
                    
                </div>
                
                <div class="case">
                    <form action="./boutique2.php" method="POST">
                        <h4>Bracca</h4>
                        <button id="3">
                            <img src="../../statique/image/P3.png" width="90%">
                        </button>
                        
                    </form>
                    
                </div>
                
                <div class="case">
                    <form action="./boutique2.php" method="POST">
                        <h4>Chandrila</h4>
                        <button id="4">
                            <img src="../../statique/image/P4.png" width="100%">
                        </button>
                        
                    </form>
                    
                </div>
                
                <div class="case">
                    <form action="./boutique2.php" method="POST">
                        <h4>Corellia</h4>
                        <button id="5">
                            <img src="../../statique/image/P5.png" width="100%">
                        </button>
                        
                    </form>
                    
                </div>
                
                <div class="case">
                    <form action="./boutique2.php" method="POST">
                        <h4>Dathomir</h4>
                        <button id="6">
                            <img src="../../statique/image/P6.png" width="100%">
                        </button>
                        
                    </form>
                    
                </div>
                
                <div class="case">
                    <form action="./boutique2.php" method="POST">
                        <h4>Exegol</h4>
                        <button id="7">
                            <img src="../../statique/image/P7.png" width="100%">
                        </button>
                        
                    </form>
                    
                </div>
                
                <div class="case">
                    <form action="./boutique2.php" method="POST">
                        <h4>Ilum</h4>
                        <button id="8">
                            <img src="../../statique/image/P8.png" width="100%" >
                        </button>
                        
                    </form>
                    
                </div>
                
                <div class="case">
                    <form action="./boutique2.php" method="POST">
                        <h4>Kamino</h4>
                        <button id="9">
                            <img src="../../statique/image/P9.png" width="100%">
                        </button>

                    </form>
                   
                </div>
                
                <div class="case">
                    <form action="./boutique2.php" method="POST">
                        <h4>Kijimi</h4>
                        <button id="10">
                            <img src="../../statique/image/P10.png" width="100%" >
                        </button>
                    </form>
                    
                </div>
                
                <div class="case">
                    <form action="./boutique2.php" method="POST">
                        <h4>Malastare   </h4>
                        <button id="11">
                            <img src="../../statique/image/P11.png" width="100%">
                        </button>
                    </form>
                    
                </div>
                
                <div class="case">
                    <form action="./boutique2.php" method="POST">
                        <h4>Mimban  </h4>
                        <button id="12">
                            <img src="../../statique/image/P12.png" width="100%">
                        </button>
                    </form>
                    
                </div>
                
                <div class="case">
                    <form action="./boutique2.php" method="POST">
                        <h4>Onderon     </h4>
                        <button id="13">
                            <img src="../../statique/image/P13.png" width="100%">
                        </button>
                    </form>
                    
                </div>
                
                <div class="case">
                    <form action="./boutique2.php" method="POST">
                        <h4>Scarif</h4>
                        <button id="14">
                            <img src="../../statique/image/P14.png" width="100%">
                        </button>
                    </form>
                
                </div>
                
                <div class="case">
                    <form action="./boutique2.php" method="POST">
                        <h4>Teth</h4>
                        <button id="15">
                            <img src="../../statique/image/P15.png" width="100%" >
                        </button>
                    </form>
                    
                </div>
            </div>
        </div>
            
         
        <div id="etoile">
            <h2>Etoiles</h2>
        </div>

        <div class="scroll" id="scrollE">
            <div id="allCasesE">
                <a href="./boutique2.php">
                    <div class="case">
                        <h4>Anza</h4>
                        <img href="../statique/image/P.php?id=nombre">
                    </div>  
                </a>
                <a href="./boutique2.php">
                    <div class="case">
                        <h4>Ardos</h4>
                        <img href="../statique/image/P.php?id=nombre">
                    </div>  
                </a>
                <a href="./boutique2.php">
                    <div class="case">
                        <h4>Corell</h4>
                        <img href="../statique/image/P.php?id=nombre">
                    </div>  
                </a>
                <a href="./boutique2.php">
                    <div class="case">
                        <h4>Garnib</h4>
                        <img href="../statique/image/P.php?id=nombre">
                    </div>  
                </a>
                <a href="./boutique2.php">
                    <div class="case">
                        <h4>Kessa</h4>
                        <img href="../statique/image/P.php?id=nombre">
                    </div>  
                </a>
                <a href="./boutique2.php">
                    <div class="case">
                        <h4>Ropagi</h4>
                        <img href="../statique/image/P.php?id=nombre">
                    </div>  
                </a>
                <a href="./boutique2.php">
                    <div class="case">
                        <h4>Sokor</h4>
                        <img href="../statique/image/P.php?id=nombre">
                    </div>  
                </a>
                <a href="./boutique2.php">
                    <div class="case">
                        <h4>Yavin</h4>
                        <img href="../statique/image/P.php?id=nombre">
                    </div>  
                </a>
                <a href="./boutique2.php">
                    <div class="case">
                        <h4>Adhara</h4>
                        <img href="../statique/image/P.php?id=nombre">
                    </div>  
                </a>
                <a href="./boutique2.php">
                    <div class="case">
                        <h4>Alya</h4>
                        <img href="../statique/image/P.php?id=nombre">
                    </div>  
                </a>
                <a href="./boutique2.php">
                    <div class="case">
                        <h4>Izar</h4>
                        <img href="../statique/image/P.php?id=nombre">
                    </div>  
                </a>
                <a href="./boutique2.php">
                    <div class="case">
                        <h4>Nashira</h4>
                        <img href="../statique/image/P.php?id=nombre">
                    </div>  
                </a>
                <a href="./boutique2.php">
                    <div class="case">
                        <h4>Ogma</h4>
                        <img href="../statique/image/P.php?id=nombre">
                    </div>  
                </a>
                <a href="./boutique2.php">
                    <div class="case">
                        <h4>Polaris</h4>
                        <img href="../statique/image/P.php?id=nombre">
                    </div>  
                </a>
                <a href="./boutique2.php">
                    <div class="case">
                        <h4>Soleil</h4>
                        <img href="../statique/image/P.php?id=nombre">
                    </div>  
                </a>
            </div>
        </div>

        
        

        
    

    </main>

    <footer></footer>

</body>
    
</html>