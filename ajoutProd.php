<?php 
require_once("config.php");
    $id=isset($_SESSION['Id']) ? $_SESSION['Id'] : NULL;

    $statut=isset($_SESSION['login']) ? $_SESSION['login'] : NULL;

    $animal = (isset($_POST['animal'])) ? $_POST['animal'] : NULL;
    $partie = (isset($_POST['partie'])) ? $_POST['partie'] : NULL;
  
    $prixKG = (isset($_POST['prixKG'])) ? $_POST['prixKG'] : NULL;
    $poids = (isset($_POST['poids'])) ? $_POST['poids'] : NULL;
    
    $int_Halal = intval(isset($_POST['Halal'])) ? $_POST['Halal'] : 0;
    $int_Fermier = intval(isset($_POST['Fermier'])) ? $_POST['Fermier'] : 0;
    $int_Bio = intval(isset($_POST['Bio'])) ? $_POST['Bio'] : 0;
    
    $code_type=$int_Bio+$int_Fermier+$int_Halal;

        if ($statut==true)
        {
            $requete2="INSERT INTO `produit` (`IdProduit`, `animal`, `partie`, `poids`, `prixKg`, `note`, `type`, `IdCommande`, `IdVendeur`) VALUES (NULL, '$animal', '$partie', '$poids', '$prixKG', NULL, '$code_type', '0', '$id')";
            $result2 = $idBase->query($requete2);

            if($result2) #Affichage page HTML confirmant l'ajout'
            {
                ?>
                    <!DOCTYPE html>
                    <html lang="fr">
                    <head>
                        <link href="cssIndex.css" rel="stylesheet" media="all" type="text/css"> 
                        <link href="cssInscription.css" rel="stylesheet" media="all" type="text/css">

                        <title>Produit ajouté! - Boucherie Order</title>
                        <meta charset="UTF-8">
                    </head>

                    <body>
                    

                    <ul class="menu">
                    <li><a href=accueilVendeur.php>Accueil</a></li>
                    <li><a href=profil.php>Profil</a></li>
                    <li><a href=commandes.php>Commandes</a></li>
                    <li><a href=produits.php class="active">Ajout d'un produit</a></li>
                    <li><a href=Delproduit.php >Suppression d'un produit</a></li>
                    <li><a href=Modifproduit.php>Modification d'un produit</a></li>
                    <li><a href=historique.php>Historique de vos ventes</a></li>
                    </ul>

                            <a href="deconnexion.php"><button class="deco fixedHautDroite">Déconnexion</button></a>
                            <a href=accueilVendeur.php><img class="displayed" src="Pictures/Viande.png" alt="Image d'accueil" style="object-position: center top;"></a>

                        <br><br><br>
                            <h1>Produit mis en vente!</h1>

                            <footer>
                            <hr>
                            <p class="badpage">
                            Projet annuel "Boucherie Order" en développement par Pierre-baptiste COUGNENC et Thomas LEONARDON
                            </p>
                            </footer>

                    </body>
                    </html>
            

                    <?php
            }
            else
            {
                $error=1;
                if ($error==1)
                {
                    ?>
                    <META http-equiv="refresh" content="0.1; URL=./produits.php?&error=<?php echo $error;?>">
                    <?php
                }
            }
        }
        else
        {
        ?>
                            <a href=index.php><img class="displayed" src="Pictures/Viande.png" alt="Image d'accueil" style="object-position: center top;"></a>
                            <h1>Session expirée</h1>
                            <br>
                            <center><a href=index.php><p class="link">Retour à l'accueil</p></a></center>
                            <br><br><br><br><br><br>

                            <footer>
                            <hr>
                            <p class="badpage">
                            Projet annuel "Boucherie Order" en développement par Pierre-baptiste COUGNENC et Thomas LEONARDON
                            </p>
                        </footer>

        <?php 
        }
        ?>