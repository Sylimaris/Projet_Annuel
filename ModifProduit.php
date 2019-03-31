<?php 
require_once("config.php");
    $id=isset($_SESSION['Id']) ? $_SESSION['Id'] : NULL;
    $statut=isset($_SESSION['login']) ? $_SESSION['login'] : NULL;

?>
<!DOCTYPE html>
<html lang="fr">

<head>
<link href="cssIndex.css" rel="stylesheet" media="all" type="text/css"> 

<title>Modification produit - Boucherie Order</title>
<meta charset="UTF-8">
</head>


<body>
    <?php 
    if ($statut==true)
        {
    ?>

    <a href=accueilVendeur.php><img class="displayed" src="Pictures/Viande.png" alt="Image d'accueil" style="object-position: center top;"></a>

    <br><br><br>
    <h1>Page de modification de vos produits</h1>

    <ul class="menu">
    <li><a href=accueilVendeur.php>Accueil</a></li>
    <li><a href=profil.php>Profil</a></li>
    <li><a href=commandes.php>Commandes</a></li>
    <li><a href=produits.php>Ajout d'un produit</a></li>
    <li><a href=Delproduit.php >Suppression d'un produit</a></li>
    <li><a href=Modifproduit.php class="active">Modification d'un produit</a></li>
    <li><a href=historique.php>Historique de vos ventes</a></li>
    </ul>

    <a href="deconnexion.php"><button class="deco fixedHautDroite">Déconnexion</button></a>


        <?php
        $sql='SELECT * FROM Produit where idVendeur='.$id.' and idCommande="0"';
        $req= $idBase->query($sql);
        $donnees = $req->fetchAll();
        if (count($donnees) == 0) {
            ?>
            <p class="PVC erreur">Vous n'avez aucun produit en vente!</p>
        <?php 
        }
            else {
        ?>
        <div class="PVC">
        <?php
            echo"<table class='table1'><tr class='tr1'><th class='th1'>Animal</th><th class='th1'>Partie</th><th class='th1'>Poids en Kg</th><th class='th1'>Prix au Kg</th><th class='th1'>Modifier</th>";
            foreach ($donnees as $donnee)
            {
                echo "<tr class='tr1'>";
                    echo "<td class='td1'> $donnee[animal] </td>";        
                    echo "<td class='td1'> $donnee[partie] </td>";
                    echo "<td class='td1'> $donnee[poids] </td>";
                    echo "<td class='td1'> $donnee[prixKg] </td>";
                    $idProduit=$donnee['IdProduit'];
                    echo '<td class="td1"><form method="post" action="FormModif.php"><button class=button type="submit" name="idModif" value="'.$idProduit.'">Modifier</button></form></td></tr>';
            }
            echo"</table>";
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
