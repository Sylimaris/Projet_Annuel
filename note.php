<?php 
	require_once("config.php");
     $statut=isset($_SESSION['login']) ? $_SESSION['login'] : NULL;
	   $id=isset($_SESSION['Id']) ? $_SESSION['Id'] : NULL;
	   $md=isset($_SESSION['mail']) ? $_SESSION['mail'] : NULL;



    if (isset($_POST['valide_note']))
    {
      $note="'$_POST[notation]'";
      $sql4="UPDATE Produit SET note=$note WHERE IdProduit='$_POST[valide_note]'";
      $req4= $idBase->query($sql4);
      header('LOCATION: note.php');
    }


?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <link href="cssIndex.css" rel="stylesheet" media="all" type="text/css"> 
  <title>Notation Produits - Boucherie Order</title>
  <meta charset="UTF-8">
</head>

<body>

  <?php 
  if ($statut==true)
    {
  ?>

          <ul class="menu">
            <li><a href=accueilClient.php>Accueil</a></li>
            <li><a href=profil.php>Profil</a></li>
            <li><a href=historique.php>Historique de vos achats</a>
            <li><a href=panier.php>Mon Panier</a></li>
            <li><a href=achat.php>Finaliser Commande</a></li>
            <li><a href=note.php class="active">Noter produits</a></li>
          </ul>


<a href="deconnexion.php"><button class="deco fixedHautDroite">Déconnexion</button></a>

  <a href=accueilClient.php><img class="displayed" src="Pictures/Viande.png" alt="Image d'accueil" style="object-position: center top;"></a>

  <br>
  <h1>Notation Produits de <?php echo $_SESSION['prenom'].' '.$_SESSION['nom'];?></h1>

    <br><br><br><br><br><br>


<?php 

$sql1="SELECT * FROM Produit as p inner join Commande as c on p.IdCommande=c.IdCommande WHERE note is null and statut ='2' and IdClient=$id and c.validation='3'";
$req1= $idBase->query($sql1);

$testvide = $req1->fetchAll();
if (count($testvide) == 0) {
    ?>
    <p class="PVC erreur">Vous n'avez aucun produit à évaluer!</p>
<?php 
}

else {

echo "<div class='PVC'>";
echo"<table class='table1'><tr class='tr1'><th class='th1'>Animal</th><th class='th1'>Partie</th><th class='th1'>Poids</th><th class='th1'>Prix au Kilo</th><th class='th1'>Type</th><th class='th1'>Date du paiement</th><th class='th1'>Noter produit</th><th class='th1'>Valider</th>";

while ($donnees = $req1->fetch())
    {
      echo "<tr class='tr1'>";
        echo "<td class='td1'> $donnees[animal]</td>";        
        echo "<td class='td1'> $donnees[partie]</td>";
        echo "<td class='td1'> $donnees[poids]Kg</td>";
        echo "<td class='td1'> $donnees[prixKg]€/Kg</td>";


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

        echo "<td class='td1'> $donnees[datePaiement]</td>";

          echo"<form method='post' action='note.php'>";
          ?>
          <td class='td1'> <input type="number" name="notation" value="notation" min="0" max="5" required></td>
          <?php

          echo "<td class='td1'>
          <input type='hidden' name='valide_note' value='$donnees[IdProduit]'>
          <input class='button' type='submit' name='submit' value='valider'>
          </form>
        </td>
      </tr>";
      echo "$donnees[IdProduit]";
    }
  echo"</table>";
  echo "</div>";


?>
   	  
    
    <br><br><br><br><br><br>

    <hr>
    <p class="badpage">
    Projet annuel "Boucherie Order" en développement par Pierre-Baptiste COUGNENC et Thomas LEONARDON
    </p>

  <?php 
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
