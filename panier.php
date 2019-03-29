<?php 
	require_once("config.php");
    $statut=isset($_SESSION['login']) ? $_SESSION['login'] : NULL;
	$id=isset($_SESSION['Id']) ? $_SESSION['Id'] : NULL;
	$md=isset($_SESSION['mail']) ? $_SESSION['mail'] : NULL;






    if (isset($_POST['idProduit']))
    {
      $sql4="SELECT IdCommande FROM Commande WHERE IdClient='$id'";
      $req4= $idBase->query($sql4);
      $data4 = $req4->fetch();
      $idCommande=$data4['IdCommande'];
      $sql3="UPDATE Produit SET IdCommande = '0', Statut = '0'  WHERE IdProduit = '$_POST[idProduit]'";
      $req3= $idBase->query($sql3);
      $_POST['idProduit']=null;
      header('LOCATION: panier.php');
    }

    if (isset($_POST['valider_commande']))
    {
      $sql5="UPDATE Commande SET  Validation='1' WHERE IdCommande='$_POST[valider_commande]'";
      echo "$sql5";
      $req5= $idBase->query($sql5);
      $_POST['valider_commande']=null;
      header('LOCATION: accueilClient.php');
    }

  

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <link href="cssIndex.css" rel="stylesheet" media="all" type="text/css"> 
  <title>Panier - Boucherie Order</title>
  <meta charset="UTF-8">
</head>

<body>

  <?php 
  if ($statut==true)
    {
  ?>

          <ul class="menu">
            <li><a class="active" href=accueilClient.php>Accueil</a></li>
            <li><a href=profil.php>Profil</a></li>
            <li><a href=historique.php>Historique de vos achats  //TO DO CLIENT</a>
            <li><a href=panier.php>Mon Panier</a></li>
            <li><a href=achat.php>Finaliser Commande</a></li>
          </ul>


<a href="deconnexion.php"><button class="deco fixedHautDroite">Déconnexion</button></a>

  <a href=accueilClient.php><img class="displayed" src="Pictures/Viande.png" alt="Image d'accueil" style="object-position: center top;"></a>

  <br>
  <h1>Panier de <?php echo $_SESSION['prenom'].' '.$_SESSION['nom'];?></h1>

    <br><br><br><br><br><br>


<?php 

$sql1="SELECT`IdCommande` FROM `Commande` WHERE `IdClient`='$id' AND validation='0'";
$req1= $idBase->query($sql1);
$data1 = $req1->fetch();
$idCommande=$data1['IdCommande'];

if($idCommande == NULL)
{
  $sql51="INSERT INTO Commande (IdClient) VALUES ($id)";
  $req51= $idBase->query($sql51);
  $data51 = $req51->fetch();
  $idCommande=$data51['IdCommande'];
}


$sql7="SELECT validation FROM Commande WHERE IdCommande=$idCommande";
$req7= $idBase->query($sql7);
$data7 = $req7->fetch();
$validation=$data7['validation'];


if($validation =='1')
{
  echo "<h1>Votre commande est déja en cours de validation</h1>";
}
else
{
$sql="SELECT animal, partie, poids, prixKg, type, nomFerme, Produit.IdVendeur, IdProduit, poids*prixKg AS prix FROM Produit INNER JOIN Vendeur ON Produit.IdVendeur = Vendeur.IdVendeur INNER JOIN Commande ON Produit.idCommande=Commande.idCommande WHERE Produit.idCommande=$idCommande and Statut='1' and validation='0' and note IS NULL ORDER BY prixKg, poids";
#echo $sql;
	$req= $idBase->query($sql);

  echo "<div class='PVC'>";

	echo"<table class='table1'><tr class='tr1'><th class='th1'>Animal</th><th class='th1'>Partie</th><th class='th1'>Poids</th><th class='th1'>Prix au kilo</th><th class='th1'>Prix</th><th class='th1'>Type</th><th class='th1'>Ferme</th><th class='th1'>Supprimer produit</th>";
    while ($donnees = $req->fetch())
    {
        echo "<tr class='tr1'>";
        echo "<td class='td1'> $donnees[animal]</td>";        
        echo "<td class='td1'> $donnees[partie]</td>";
        echo "<td class='td1'> $donnees[poids]Kg</td>";
        echo "<td class='td1'> $donnees[prixKg]€/Kg</td>";
        echo "<td class='td1'> $donnees[prix]€</td>";


        $datatype=$donnees['type'];
        $type="";
        if (intdiv($datatype,100)==1) {
        	$type=$type."Bio ";
        	$datatype=$datatype-100;
        }
        if (intdiv($datatype,10)==1) {
        	$type=$type."Fermier ";
        	$datatype=$datatype-10;
        }
        if($datatype%2==1){
        	$type=$type."Halal ";
        }
        echo "<td class='td1'>$type</td>";
		$sql2="SELECT avg(note) AS moy FROM `Produit` WHERE `IdVendeur`=$donnees[IdVendeur]";
		$req2= $idBase->query($sql2);
		$data2 = $req2->fetch();
		$moy = $data2['moy'];
		if ($moy==NULL)
		{
			$moy=0;
		}
		echo "<td class='td1'> $donnees[nomFerme] </td>";

        echo "<td class='td1'><form method='post' action='panier.php'>
				<input type='hidden' name='idProduit' value='$donnees[IdProduit]'>
				<input class='button' type='submit' name='submit' value='Supprimer'>
			</form></td></tr>";
    }
   	echo"</table>";
    ?>
        </br>

        <form method='post' action='panier.php'>
        <?php
        echo "<input type='hidden' name='valider_commande' value='$idCommande'>";
        ?>
        <input class='button' type='submit' name='submit' value='Valider la commande'>
        </form>

  </div>

    <?php

}

    ?>
   	  
    
    <br><br><br><br><br><br>

    <hr>
    <p class="badpage">
    Projet annuel "Boucherie Order" en développement par Pierre-Baptiste COUGNENC et Thomas LEONARDON
    </p>

  <?php 
    }
  else
    {
  ?>

    <a href=index.php><img class="displayed" src="Pictures/Viande.png" alt="Image d'accueil" style="object-position: center top;"></a>
    <h1>Session expirée</h1>
    <br>
    <center><a href=index.php><p class="link">Retour à l'accueil</p></a></center>
    <br><br><br><br><br><br>

    <hr>
    <p class="badpage">
    Projet annuel "Boucherie Order" en développement par Pierre-Baptiste COUGNENC et Thomas LEONARDON
    </p>

  <?php 
    }
  ?>

</body>

</html>

<?php
?>
