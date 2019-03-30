<?php 
  	require_once("config.php");
    $statut=isset($_SESSION['login']) ? $_SESSION['login'] : NULL;
    $id=isset($_SESSION['Id']) ? $_SESSION['Id'] : NULL;
    $mail=isset($_SESSION['mail']) ? $_SESSION['mail'] : NULL;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <link href="cssIndex.css" rel="stylesheet" media="all" type="text/css"> 
  <title>Page principale client - Boucherie Order</title>
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
  <h1>Page Client de <?php echo $_SESSION['prenom'].' '.$_SESSION['nom'];?></h1>


  <div class="PVC">
    <ul>
      <li>
        <form method='post' action='accueilClient.php'>
          <select id="animal" name="animal">
            <option value="Boeuf">Boeuf</option>
            <option value="Porc">Porc</option>
            <option value="Mouton">Mouton</option>
            <option value="Volaille">Volaille</option>
          </select>
      </li>
      <br>
      <li>
          <select id="partie" name="partie">
            <option value="Animal_Entier">Animal entier</option>
            <option value="Filet">Filet</option>
            <option value="Côte">Côte</option>
            <option value="Aile">Aile</option>
            <option value="Collier">Collier</option>
            <option value="Steak">Steak</option>
          </select>
      </li>
    </ul>

    <br><br>
    Quantité minimum: <input type="number" name="quantity" value="quantity" min="1" required>
    <br>
    <br>
    Catégorie: 
    <label class="container" for="Bio">Bio
    <input type="checkbox" id="Bio" name="Bio" value="Bio">
    </label>
    <label class="container" for="Fermier">Fermier
    <input type="checkbox" id="Fermier" name="Fermier" value="Fermier">
    </label>
    <label class="container" for="Halal">Halal
    <input type="checkbox" id="Halal" name="Halal" value="Halal">
    </label>
      <br>
      <br>
  Ferme: <input type="text" name="ferme" value="">
  <br>
  <br>
		<input class="button" type='submit' name='Rechercher' value='Rechercher'>
    <br>
    <br>
  </form>

  <br>

  <?php 
 $recherche="";
 $producteur="*";
 if (isset($_POST['Rechercher']))
 {
   $animal="'$_POST[animal]'";
   $partie="'$_POST[partie]'";
   $poidsmin="'$_POST[quantity]'";
   if ($_POST['ferme']!=""){
     $producteur="= '$_POST[ferme]'";
   }
   else{
     $producteur="IS NOT NULL";
   }
   if (isset($_POST['Halal']))
   {
     $etiquette="1";
   }
   else
   {
     $etiquette="0";
   }
   if (isset($_POST['Fermier']))
   {
     $etiquette="1$etiquette";
   }
   else
   {
     $etiquette="0$etiquette";
   }
   if (isset($_POST['Bio']))
   {
     $etiquette="'1$etiquette'";
   }
   else
   {
     $etiquette='\'0'.$etiquette.'\'';
   }
   echo $etiquette;
 
   $recherche=" and animal=$animal and partie=$partie and poids >=$poidsmin and type=$etiquette and nomFerme $producteur";
   echo $recherche;
 }

 
 $sql="SELECT animal, partie, poids, prixKg, type, nomFerme, Produit.IdVendeur, IdProduit FROM Produit inner join Vendeur ON Produit.IdVendeur = Vendeur.IdVendeur where idCommande='0' and note IS NULL ".$recherche." ORDER BY prixKg, poids";
  $req= $idBase->query($sql);
  ?>
    <?php

echo"<table class='table1'><tr class='tr1'><th class='th1'>Animal</th><th class='th1'>Partie</th><th class='th1'>Poids en Kg</th><th class='th1'>Prix au Kg</th><th class='th1'>Type</th><th class='th1'>Ferme</th><th class='th1'>Moyenne du vendeur</th><th class='th1'>Ajouter au panier</th>";
while ($donnees = $req->fetch())
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

$sql2="SELECT avg(note) AS moy FROM `Produit` WHERE `IdVendeur`=$donnees[IdVendeur]";
$req2= $idBase->query($sql2);
$data = $req2->fetch();
$moy = $data['moy'];
if ($moy==NULL)
{
  $moy=0;
}
    echo "<td class='td1'> $donnees[nomFerme] </td>";
    echo "<td class='td1'>".$moy."</td>";
    echo "<td class='td1'><form method='post' action='accueilClient.php'>
    <input type='hidden' name='idProduit' value='$donnees[IdProduit]'>
    <input class='button' type='submit' name='submit' value='Ajouter'>
  </form></td></tr>";

  }
 echo"</table>";


 if (isset($_POST['idProduit']))
 {
     $sql4="SELECT IdCommande FROM Commande WHERE IdClient='$id' AND validation='0'";
     $req4= $idBase->query($sql4);
     $data4 = $req4->fetch();
     $idCommande=$data4['IdCommande'];

     if($idCommande == NULL)
     {
         $sql5="INSERT INTO Commande (IdClient) VALUES ($id)";
         $req5= $idBase->query($sql5);
         $req4= $idBase->query($sql4);
         $data4 = $req4->fetch();
         $idCommande=$data4['IdCommande'];
     }

     $sql3="UPDATE Produit SET IdCommande = '$idCommande', Statut='1' WHERE IdProduit = '$_POST[idProduit]'";
     $req3= $idBase->query($sql3);
     $_POST['idProduit']=null;
     header('LOCATION: accueilClient.php');
 }
     ?>

  </div>
  <br><br><br><br><br><br>
  <footer>
      <hr>
      <p class="badpage">
      Projet annuel "Boucherie Order" en développement par Pierre-Baptiste COUGNENC et Thomas LEONARDON
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
      <br><br><br><br><br><br>

      <footer>
      <hr>
      <p class="badpage">
      Projet annuel "Boucherie Order" en développement par Pierre-Baptiste COUGNENC et Thomas LEONARDON
      </p>
      </footer>

      <?php 
    }
  ?>

</body>

</html>

<?php
?>
