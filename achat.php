<?php 
	require_once("config.php");
    $statut=isset($_SESSION['login']) ? $_SESSION['login'] : NULL;
	$id=isset($_SESSION['Id']) ? $_SESSION['Id'] : NULL;
	$md=isset($_SESSION['mail']) ? $_SESSION['mail'] : NULL;
  	
  	$boolean="";

  if (isset($_POST['payer_commande']))
    {
    	$today = date("y-m-d");
		$sql2="UPDATE Commande SET validation=3, datePaiement= '$today', prix = (SELECT sum(prixKg*poids) FROM Produit WHERE Produit.IdCommande='$_POST[payer_commande]') where Commande.IdCommande='$_POST[payer_commande]'";
		$req2= $idBase->query($sql2);
    	$_POST['payer_commande']=null;
    	header('LOCATION: achat.php');

    }

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <link href="cssIndex.css" rel="stylesheet" media="all" type="text/css"> 
  <title>Finaliser Achat - Boucherie Order</title>
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
            <li><a href=note.php>Noter produits</a></li>
          </ul>


	<a href="deconnexion.php"><button class="deco fixedHautDroite">Déconnexion</button></a>

  <a href=accueilClient.php><img class="displayed" src="Pictures/Viande.png" alt="Image d'accueil" style="object-position: center top;"></a>

  <br>
  <h1>Finaliser les achats de <?php echo $_SESSION['prenom'].' '.$_SESSION['nom'];?></h1>

    <br><br><br><br><br><br>


    <?php 

	$sql1="SELECT`IdCommande` FROM `Commande` WHERE `IdClient`='$id' AND validation='2'";
	$req1= $idBase->query($sql1);
	$data1 = $req1->fetch();
	$idCommande=$data1['IdCommande'];

	if($idCommande==NULL)
	{
		echo"<h1>Votre commande n'a pas encore été validée par nos vendeurs"; 
	}
	else
	{

	$sql4="SELECT sum(prixKg*poids) as prix FROM Produit WHERE IdCommande=$idCommande";
	$req4= $idBase->query($sql4);
	$data4 = $req4->fetch();
	$prixtotal=$data4['prix'];

  echo "<div class='PVC'>";


 	echo "<form method='post' action='achat.php'>
    	<input type='hidden' name='payer_commande' value='$idCommande'>
        <input class='button' type='submit' name='submit' value='Payer $prixtotal €'>
        </form>";
 		


    }
    echo "</div>";
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














