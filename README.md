Repository Github du projet : https://github.com/Lequral/GalaxyStore

#### Nom de la base de donnée PhpMyAdmin : "galaxyDatabase"

## Commandes pour insérer dans la BD les données des :

#### Planètes

INSERT INTO Planete(nomPl,massPl,surf,tempPl,distPl, idCl) VALUES("Agamar",18,9,-51,82,NULL),("Ando",30,19,70,87,5),("Bracca",15,6,-7,71,10),("Chandrila",30,16,-12,17,8),("Corellia",22,12,-54,89,6),("Dathomir",18,17,23,26,4),("Exegol",19,10,42,74,NULL),("Ilum",19,6,-77,37,3),("Kamino",28,16,-53,46,1),("Kijimi",30,16,16,98,NULL),("Malastare",20,19,22,48,7),("Mimban",19,8,-41,54,5),("Onderon",21,17,23,33,14),("Scarif",29,18,-27,14,11),("Teth",20,11,-3,100,NULL);

#### Clients

INSERT INTO Client(pseudo,mail,argent,mdp) VALUES("Tibo","lucie24@childrenofthesyrianwar.com", 0,"e!6$ej0i{f&"),("Noah","lpauwels@gtkesh.com", 5810,"t.S(HjmBRW%"),("Louis","lara.marchal@tubidu.com", 815,"Mp4(qd]oJ9"),("Victoria","nijs.nina@unair.nl", 9470, "s,H-}=o^c=,5zBsrAas"),("Lander","fgoffin@hs-gilching.de", 2300,"MX:42G$O0ZSp=M,f7"),("Mats","devos.lily@spacepush.org", 273,"}{f/_-JV;lPy%,"),("Lowie","qverhelst@startupers.tech", 50,"=?5p^?iuD2"),("Pierre","mboivin@pamulang.ga", 5907,".GW$mPwy_$["),("Michèle","christine81@band-freier.de", 694,"g}uf|Jo1YC"),("Franck","dteixeira@mphaotu.com", 226,"dD*eeN-FG"),("Éric","alexandria90@gasssmail.com", 79282,"g#RBbkxxy"),("Maurice","blondel.thibaul@imaanpharmacy.com", 701,"d27mzlo-4KD3"),("Thérèse","julien.coulon@jagomail.com",10344000,"N-L7t=SX{kwSGa:9c"),("Gérard","clemonnier@pontualcontabilidade.org",9400,";CjMDm+/OtkPm^"),("Sabine","dasilva.laurenc@hongsaitu.com", 1014,"t/|fy;l~}~5*4Ie");

#### Partager

INSERT INTO PARTAGER VALUES(1, 2, 3),(5, 1, 72),(10, 1, 16),(3, 1, 8),(1, 1, 1),(15, 2, 77),(11, 2, 10),(10, 2, 13),(12, 3, 61),(9, 4, 1),(13, 3, 7),(9, 3, 3),(5, 2, 35),(10, 4, 15),(2, 3, 12),(14, 4, 1),(2, 4, 2),(5, 4, 2),(10, 5, 82),(8, 5, 9),(2, 5, 9),(3, 6, 23),(14, 6, 62),(1, 6, 6),(13, 6, 7),(10, 6, 1),(5, 6, 1),(1, 7, 11),(5, 3, 9),(5, 7, 24),(8, 7, 46),(6, 4, 9),(15, 7, 1),(11, 8, 7),(6, 8, 44),(6, 7, 12),(7, 8, 31),(2, 8, 5),(4, 8, 1),(5, 9, 3),(10, 9, 81),(7, 9, 6),(11, 9, 1),(9, 9, 2),(12, 10, 5),(9, 11, 3),(2, 11, 2),(8, 11, 2),(1, 11, 1),(11, 11, 2),(15, 12, 45),(12, 12, 11),(4, 12, 34),(1, 12, 3),(13, 12, 7),(9, 13, 2),(8, 13, 6),(11, 14, 57),(2, 14, 36),(5, 14, 5),(10, 14, 2),(14, 15, 19);

#### Etoiles

INSERT INTO Etoile(nomEt,masseEt,energie,tempEt,distEt) VALUES("Anza", 42, 28, 67872, 840),("Ardos", 26, 37, 64628, 135),("Corell", 45, 20, 20522, 552),("Garnib", 42, 36, 60576, 814),("Kessa", 33, 24, 13497, 147),("Ropagi", 31, 24, 8858, 84),("Sokor", 30, 43, 5383, 475),("Yavin", 47, 30, 103677, 500),("Adhara", 43, 46, 74904, 778),("Alya", 35, 41, 68071, 203),("Izar", 29, 45, 46069, 45),("Nashira", 32, 46, 128984, 280),("Ogma", 46, 37, 85890, 83),("Polaris", 38, 25, 91284, 112),("Soleil", 30, 26, 5774, 8);
