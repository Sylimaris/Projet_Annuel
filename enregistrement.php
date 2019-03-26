<?php 
require_once("config.php");
$error = $usermail = $categ = $password = $prenom = $nom = $tel = $adresse ='';

    $usermail = (isset($_POST['mail'])) ? $_POST['mail'] : NULL;
    $password = (isset($_POST['password'])) ? $_POST['password'] : NULL;
    $categ = (isset($_POST['categ'])) ? $_POST['categ'] : NULL;
    $prenom = (isset($_POST['prenom'])) ? $_POST['prenom'] : NULL;
    $nom = (isset($_POST['nom'])) ? $_POST['nom'] : NULL;
    $tel = (isset($_POST['tel'])) ? $_POST['tel'] : NULL;
    $adresse = (isset($_POST['adresse'])) ? $_POST['adresse'] : NULL;
    
    if ($usermail==NULL or $password==NULL or $prenom==NULL or $nom==NULL or $tel==NULL or $adresse==NULL)
    {
        $error=2;
        ?>
            <META http-equiv="refresh" content="0.1; URL=./inscription.php?&error=<?php echo $error;?>">
        <?php
    }

    elseif ($categ == "vendeur")
    {
        $requete1="SELECT * FROM vendeur where mailVendeur='$usermail'";
        $result1 = $idBase->query($requete1);
       
        if($result1->rowCount()>0)
        {
            $error=3;
            ?>
                <META http-equiv="refresh" content="0.1; URL=./inscription.php?&error=<?php echo $error;?>">
            <?php
        }
        else
        {
            $requete2="INSERT INTO `vendeur` (`IdVendeur`, `passwordVendeur`, `nomVendeur`, `prenomVendeur`, `nomFerme`, `mailVendeur`, `nbVentes`) VALUES (NULL, '$password', '$nom', '$prenom', '$adresse', '$usermail',  '0')";
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
                    <a href=index.php><img class="displayed" src="Pictures/Viande.png" alt="Image d'accueil" style="object-position: center top;"></a>

                    <br><br><br>
                        <h1>Compte vendeur créé!</h1>
                        
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
    
    
    elseif ($categ == "acheteur") 
    {
        $requete1="SELECT * FROM client where mailClient='$usermail'";
        $result1 = $idBase->query($requete1);
       
        if($result1->rowCount()>0)
        {
            $error=3;
            ?>
                <META http-equiv="refresh" content="0.1; URL=./inscription.php?&error=<?php echo $error;?>">
            <?php
        }


        else
        {
            $requete2="INSERT INTO `client` (`IdClient`, `passwordClient`, `nomClient`, `prenomClient`, `mailClient`, `telClient`, `adresseClient`) VALUES (NULL, '$password', '$nom', '$prenom', '$usermail', '$tel', '$adresse')";
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
                    <a href=index.php><img class="displayed" src="Pictures/Viande.png" alt="Image d'accueil" style="object-position: center top;"></a>

                    <br><br><br>
                        <h1>Compte client créé</h1>
                        
                        <footer>
    <hr>
    <p class="badpage">
    Projet annuel "Boucherie Order" en développement par Pierre-baptiste COUGNENC et Thomas LEONARDON
    </p>
</footer>
                    </body>
                    </html>

                <?php
            } #Fin affichage page HTML confirmant l'inscription
            else
            {
                $error=1;
            }
        }
    }
    
    if ($error==1)
    {
        ?>
        <META http-equiv="refresh" content="0.1; URL=./inscription.php?&error=<?php echo $error;?>">
        <?php
    }
    
?>

