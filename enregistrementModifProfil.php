<?php 

require_once("config.php");

 $statut=isset($_SESSION['login']) ? $_SESSION['login'] : NULL;
 $id=isset($_SESSION['Id']) ? $_SESSION['Id'] : NULL;
 $categ=isset($_SESSION['categ']) ? $_SESSION['categ'] : NULL;


$error ='';

    $usermail = (isset($_POST['mail'])) ? $_POST['mail'] : NULL;
    $password = (isset($_POST['password'])) ? $_POST['password'] : NULL;

    $prenom = (isset($_POST['prenom'])) ? $_POST['prenom'] : NULL;
    $nom = (isset($_POST['nom'])) ? $_POST['nom'] : NULL;
    $tel = (isset($_POST['tel'])) ? $_POST['tel'] : NULL;
    $adresse = (isset($_POST['adresse'])) ? $_POST['adresse'] : NULL;
    
    if ($usermail==NULL or $password==NULL or $prenom==NULL or $nom==NULL or $tel==NULL or $adresse==NULL)
    {
        $error=2;
        ?>
            <META http-equiv="refresh" content="0.1; URL=./inscriptionModif.php?&error=<?php echo $error;?>">
        <?php
    }

    elseif ($categ == "vendeur")
    {
        $requete1="SELECT * FROM vendeur where  IdVendeur != '$id' AND mailVendeur='$usermail'";
        $result1 = $idBase->query($requete1);
       
        if($result1->rowCount()>0)
        {
            $error=3;
            ?>
                <META http-equiv="refresh" content="0.1; URL=./inscriptionModif.php?&error=<?php echo $error;?>">
            <?php
        }
        else
        {
            $requete2="UPDATE `vendeur` SET `passwordVendeur` = '$password', `nomVendeur` = '$nom', `prenomVendeur` = '$prenom', `nomFerme` = '$adresse', `mailVendeur` = '$usermail' WHERE `vendeur`.`IdVendeur` = '$id'";
            $result2 = $idBase->query($requete2);

            if($result2) #Affichage page HTML confirmant la modif
            {
                ?>
                    <!DOCTYPE html>
                    <html lang="fr">
                    <head>
                        <link href="cssIndex.css" rel="stylesheet" media="all" type="text/css"> 
                        <link href="cssInscription.css" rel="stylesheet" media="all" type="text/css">

                        <title>Modification - Boucherie Order</title>
                        <meta charset="UTF-8">
                    </head>

                    <body>

                        <ul class="menu">
                        <li><a href=accueilVendeur.php>Accueil</a></li>
                        <li><a href=profil.php class="active">Profil</a></li>
                        <li><a href=commandes.php>Commandes</a></li>
                        <li><a href=produits.php >Ajout d'un produit</a></li>
                        <li><a href=Delproduit.php >Suppression d'un produit</a></li>
                        <li><a href=Modifproduit.php >Modification d'un produit</a></li>
                        <li><a href=historique.php>Historique de vos ventes</a></li>
                        </ul>

                        <a href="deconnexion.php"><button class="deco fixedHautDroite">Déconnexion</button></a>
                        <a href=accueilVendeur.php><img class="displayed" src="Pictures/Viande.png" alt="Image d'accueil" style="object-position: center top;"></a>

                        <br><br><br>
                            <h1>Compte vendeur mis à jour!</h1>
                            
                        <footer>
                            <hr>
                            <p class="badpage">
                            Projet annuel "Boucherie Order" en développement par Pierre-baptiste COUGNENC et Thomas LEONARDON
                            </p>
                        </footer>
                    </body>
                    </html>

                <?php
            }   #Fin affichage page HTML confirmant l'inscription
            else
            {
                $error=1;
            }
        }
    }
    
    
    elseif ($categ == "client") 
    {
        $requete1="SELECT * FROM client where mailClient='$usermail' AND IdClient != '$id'";
        $result1 = $idBase->query($requete1);
       
        if($result1->rowCount()>0)
        {
            $error=3;
            ?>
                <META http-equiv="refresh" content="0.1; URL=./inscriptionModif.php?&error=<?php echo $error;?>">
            <?php
        }
        else
        {
            $requete2="UPDATE `client` SET `passwordClient` = '$password', `nomClient` = '$nom', `prenomClient` = '$prenom', `adresseClient` = '$adresse', `mailClient` = '$usermail',`telClient` = '$tel' WHERE `Client`.`IdClient` = '$id'";
            $result2 = $idBase->query($requete2);

            if($result2) #Affichage page HTML confirmant l'inscription
            {
                ?>
                    <!DOCTYPE html>
                    <html lang="fr">
                    <head>
                        <link href="cssIndex.css" rel="stylesheet" media="all" type="text/css"> 
                        <link href="cssInscription.css" rel="stylesheet" media="all" type="text/css">

                        <title>Boucherie Order - COMPTE</title>
                        <meta charset="UTF-8">
                    </head>

                    <body>

                    <ul class="menu">
                    <li><a href=accueilClient.php>Accueil</a></li>
                    <li><a href=profil.php class="active">Profil</a></li>
                    <li><a href=historique.php>Historique de vos achats</a>
                    <li><a href=panier.php>Mon Panier</a></li>
                    <li><a href=achat.php>Finaliser Commande</a></li>
                    </ul>
 

                <a href="deconnexion.php"><button class="deco fixedHautDroite">Déconnexion</button></a>
                    <a href=accueilClient.php><img class="displayed" src="Pictures/Viande.png" alt="Image d'accueil" style="object-position: center top;"></a>

                    <br><br><br>
                        <h1>Compte client mis à jour!</h1>
                        
                        <footer>
                            <hr>
                            <p class="badpage">
                            Projet annuel "Boucherie Order" en développement par Pierre-baptiste COUGNENC et Thomas LEONARDON
                            </p>
                        </footer>
                    </body>
                    </html>

                <?php
            }   #Fin affichage page HTML confirmant l'inscription
            else
            {
                $error=1;
            }
        }
    }
    
    if ($error==1)
    {
        ?>
        <META http-equiv="refresh" content="0.1; URL=./inscriptionModif.php?&error=<?php echo $error;?>">
        <?php
    }
    
?>

