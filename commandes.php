<!-- Un onglet « mes commandes » contiendra toute demande d’achat de l’un de ses produits nouveaux et en cours. 
Pour chaque nouvelle demande, le vendeur devra au départ, accepter ou non la demande. 
    Si elle est refusée il devra envoyer un message à l’acheteur pour lui signaler. 
    Si elle est acceptée la demande passera en étape « d’attente d’envoi du produit » et affichera l’adresse du client. 

Le vendeur devra valider l’étape à partir du moment où celui-ci a envoyé le produit, puis la demande passera en état « attente de réception » qui 
sera validée par le client et permettra de déclencher le paiement quand il aura reçu la livraison. -->

<?php 
require_once("config.php");
    $id=isset($_SESSION['Id']) ? $_SESSION['Id'] : NULL;
    $statut=isset($_SESSION['login']) ? $_SESSION['login'] : NULL;

   
  
?>
<!DOCTYPE html>
<html lang="fr">

<head>
<link href="cssIndex.css" rel="stylesheet" media="all" type="text/css"> 

<title>Commandes en cours - Boucherie Order</title>
<meta charset="UTF-8">
</head>


<body>
    <?php 
    if ($statut==true)
        {
    ?>

    <a href=accueilVendeur.php><img class="displayed" src="Pictures/Viande.png" alt="Image d'accueil" style="object-position: center top;"></a>

    <br><br><br>
    <h1>Page de gestion de vos commandes</h1>

    <ul class="menu">
    <li><a href=accueilVendeur.php>Accueil</a></li>
    <li><a href=profil.php>Profil</a></li>
    <li><a href=commandes.php class="active">Commandes</a></li>
    <li><a href=produits.php>Ajout d'un produit</a></li>
    <li><a href=Delproduit.php >Suppression d'un produit</a></li>
    <li><a href=Modifproduit.php>Modification d'un produit</a></li>
    <li><a href=historique.php>Historique de vos ventes</a></li>
    </ul>

    <a href="deconnexion.php"><button class="deco fixedHautDroite">Déconnexion</button></a>

            <!-- COMMANDES AU STADE RESERVE PAR LE CLIENT -->
        <?php
        if (isset($_POST['decliner'])) {
            $idProdSuppr = $_POST['decliner'];
            
            // Récupération du mail client à prévenir
            $sql='SELECT mailClient FROM produit inner join commande on produit.IdCommande = commande.IdCommande inner join client on commande.IdClient = client.IdClient where IdProduit='.$idProdSuppr.'';
            $req= $idBase->query($sql);
            $donnees = $req->fetch();
            $mail=$donnees['mailClient'];

            // Suppression du produit décliné (On part du principe qu'un vendeur déclinant un produit ne souhaite plus le vendre ou s'était trompé dans le produit)
            $sql="DELETE FROM `produit` WHERE `produit`.`IdProduit` =$idProdSuppr";
            $req2= $idBase->query($sql);

            echo '<p class="PVC erreur"> Commande annulée pour le produit sélectionné. Envoyez un mail à '.$mail.' si vous souhaitez préciser les raisons de votre annulation au client. Votre produit a été supprimé de la base car vous avez rejeté la commande.<p>';
        }
        $sql="SELECT * FROM  produit, commande, client WHERE produit.IdCommande = commande.IdCommande and commande.IdClient = client.IdClient and idVendeur='$id' and produit.idCommande!='0' and commande.validation='0'";
        $req= $idBase->query($sql);
        $donnees = $req->fetchAll();
        if (count($donnees) == 0) {
            ?>
            <p class="PVC erreur">Il n'y a pas de produit en attente de confirmation!</p>
        <?php 
        }
            else {
        ?>
        <div class="PVC">
        <?php
            echo"<table class='table1'><tr class='tr1'><th class='th1'>Animal</th><th class='th1'>Partie</th><th class='th1'>Poids en Kg</th><th class='th1'>Prix au Kg</th><th class='th1'>Accepter</th><th class='th1'>Décliner</th>";
            foreach ($donnees as $donnee)
            {
                echo "<tr class='tr1'>";
                    echo "<td class='td1'> $donnee[animal] </td>";        
                    echo "<td class='td1'> $donnee[partie] </td>";
                    echo "<td class='td1'> $donnee[poids] </td>";
                    echo "<td class='td1'> $donnee[prixKg] </td>";
                    echo '<td class="td1">
                            <form method="post" action="">
                                <button class=button type="submit" name="accepter" value="'.$donnee['IdProduit'].'">Accepter</button>
                            </form>';
                    echo '<td class="td1">
                            <form method="post" action="">
                                <button class=button type="submit" name="decliner" value="'.$donnee['IdProduit'].'">Décliner</button>
                            </form>
                    </td>
                </tr>';
            }
            echo"</table>";





            if (isset($_POST['accepter'])) {
                $idProd = $_POST['accepter'];

//////////////////////////////////////////////////////////////////////////////
//                Si le produit est accepté                                 //
//                On doit changer le statut du produit                      //
//                Et check si le statut global de la commande doit changer  //
//                Si la commande n'avait que ce produit: supprimée          //
//////////////////////////////////////////////////////////////////////////////
                

                $reqAccept="";
                //$accept= $idBase->query($reqAccept);


                ////////////////////////////
            }


        ?>
        </div>
        <?php } ?>



        <footer>
        <hr>
        <p class="badpage">
        Projet annuel "Boucherie Order" en développement par Pierre-baptiste COUGNENC et Thomas LEONARDON
        </p>
        </footer>

  <?php 
    }
  else
    {
  ?>

    <a href=index.php><img class="displayed" src="Pictures/Viande.png" alt="Image d'accueil" style="object-position: center top;"></a>
    <h1>Session expirée</h1>
    <br>
    <center><a href=index.php><p class="link">Retour à l'accueil</p></a></center>
    

        <footer>
        <hr>
        <p class="badpage">
        Projet annuel "Boucherie Order" en développement par Pierre-baptiste COUGNENC et Thomas LEONARDON
        </p>
        </footer>

  <?php 
    }
  ?>

</body>

</html>

<?php
?>