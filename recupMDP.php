<?php 
require_once("config.php");
$error = $nom = $categ = $username = $usersurname = $password = $userError = $passError = '';


    $usermail = isset($_POST['mail']) ? $_POST['mail'] : NULL;
    $nom = isset($_POST['nom']) ? $_POST['nom'] : NULL;
    $categ = isset($_POST['categ']) ? $_POST['categ'] : NULL;


    if ($categ == "vendeur")
    {
        $sqlLogin="select passwordVendeur from vendeur where mailVendeur='$usermail' and nomVendeur='$nom'";
        $result = $idBase->query($sqlLogin);
        if($result->rowCount()>0)
        {
           ?>
                <!DOCTYPE html>
                <html lang="fr">
                <head>
                    <link href="cssIndex.css" rel="stylesheet" media="all" type="text/css"> 
                    <link href="cssInscription.css" rel="stylesheet" media="all" type="text/css">

                    <title>Boucherie Order - oubli MDP</title>
                    <meta charset="UTF-8">
                </head>

                <body>
                <a href=index.php><img class="displayed" src="Pictures/Viande.png" alt="Image d'accueil" style="object-position: center top;"></a>

                <br><br><br>
                    <h1>Votre mot de passe:</h1>
                    <h2>
                        <?php 
                        while ($donnees = $result->fetch())
                        {
                            echo "<TH> $donnees[passwordVendeur] </TH>";                         
                        }
                        ?>                    
                    </h2>
                    <br>
                <center>
                <span class="erreur">
                Faites attention à ne pas perdre de nouveau votre mot de passe
                </span>
                </center>
                <br><br><br><br>

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
        }
    }
    elseif ($categ == "client") 
    {
        $sqlLogin="select passwordClient from client where mailClient='$usermail' and nomClient='$nom' ";
        $result = $idBase->query($sqlLogin);
        if($result->rowCount()>0)
        {
            ?>
            <!DOCTYPE html>
            <html lang="fr">
            <head>
                <link href="cssIndex.css" rel="stylesheet" media="all" type="text/css"> 
                <link href="cssInscription.css" rel="stylesheet" media="all" type="text/css">

                <title>Boucherie Order - oubli MDP</title>
                <meta charset="UTF-8">
            </head>

            <body>
            <a href=index.php><img class="displayed" src="Pictures/Viande.png" alt="Image d'accueil" style="object-position: center top;"></a>

            <br><br><br>
                <h1>Votre mot de passe:</h1>
                <h2>
                    <?php 
                        while ($donnees = $result->fetch())
                            {
                                echo "<TH> $donnees[passwordClient] </TH>";                         
                            }
                    ?>
                </h2>
                <br>
                <center>
                <span class="erreur">
                Faites attention à ne pas perdre de nouveau votre mot de passe
                </span>
                </center>
            <br><br><br>

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
        }
    }
   
    
    if ($error==1)
    {
        ?>
        <META http-equiv="refresh" content="0.1; URL=./OubliMDP.php?&error=<?php echo $error;?>">
        <?php
    }
    

?>
