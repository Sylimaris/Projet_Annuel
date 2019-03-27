<?php 
  	require_once("config.php");
    $statut=isset($_SESSION['login']) ? $_SESSION['login'] : NULL;
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
            <li><a href=recherche.php>Rechercher</a></li>
            <li><a href=historique.php>Historique de vos achats</a>
            <li><a href=panier.php>Mon Panier</a></li>
            <li><a href=achat.php>Finaliser Commande</a></li>
          </ul>
 

  <a href="deconnexion.php"><button class="deco fixedHautDroite">Déconnexion</button></a>

  <a href=accueilClient.php><img class="displayed" src="Pictures/Viande.png" alt="Image d'accueil" style="object-position: center top;"></a>

  <br>
  <h1>Page Client de <?php echo $_SESSION['prenom'].' '.$_SESSION['nom'];?></h1>


    <br><br><br><br><br><br>
  <div class="PVC">
    <ul>
      <li>
        <form>
          <select id="animal" name="animal">
            <option value="Boeuf">Boeuf</option>
            <option value="Porc">Porc</option>
            <option value="Mouton">Mouton</option>
            <option value="Volaille">Volaille</option>
          </select>
        </form>
      </li>
      <li>
        <form>
          <select id="partie" name="partie">
            <option value="Animal_Entier">Animal_Entier</option>
            <option value="Filet">Filet</option>
            <option value="Côte">Côte</option>
            <option value="Aile">Aile</option>
            <option value="Steak">Steak</option>
          </select>
        </form>
      </li>
    </ul>



    <label class="container" for="Bio">Bio
    <input type="checkbox" id="Bio" name="categ" value="Bio">
    </label>
    <label class="container" for="Fermier">Fermier
    <input type="checkbox" id="Fermier" name="categ" value="Fermier">
    </label>
    <label class="container" for="Halal">Halal
    <input type="checkbox" id="Halal" name="categ" value="Halal">
    </label>
  </div>
  <br><br><br><br><br><br>
  <?php 
  $animal="'Porc'";
  $partie="'cote'";
  $prixKgmin="'9'";
  $recherche=" and animal=".$animal." and partie=".$partie." and poids >=".$prixKgmin;
  $sql="SELECT * FROM Produit where idCommande=0 and note IS NULL ".$recherche." ORDER BY prixKg, poids";
  $req= $idBase->query($sql);
  ?>
  <div class="PVC">
    <?php

echo"<table class='table1'><tr class='tr1'><th class='th1'>Animal</th><th class='th1'>Partie</th><th class='th1'>Poids en Kg</th><th class='th1'>Prix au Kg</th><th class='th1'>Moyenne du vendeur</th><th class='th1'>Ajouter au panier</th>";
while ($donnees = $req->fetch())
{
    echo "<tr class='tr1'>";
    echo "<td class='td1'> $donnees[animal] </td>";        
    echo "<td class='td1'> $donnees[partie] </td>";
    echo "<td class='td1'> $donnees[poids] </td>";
    echo "<td class='td1'> $donnees[prixKg] </td>";
$sql2="SELECT avg(note) AS moy FROM `Produit` WHERE `IdVendeur`=$donnees[IdVendeur]";
$req2= $idBase->query($sql2);
$data = $req2->fetch();
$moy = $data['moy'];
if ($moy==NULL)
{
  $moy=0;
}
    echo "<td class='td1'>".$moy."</td>";
    echo "<td class='td1'><input class=button type='submit' name='valider' value='Ajouter'></td></tr>";
}
 echo"</table>";
?>

  </div>
  <br><br><br><br><br><br>
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

</body>

</html>

<?php
?>
