<?php 
    require_once("config.php");
    $statut=isset($_SESSION['login']) ? $_SESSION['login'] : NULL;
    $categ=isset($_SESSION['categ']) ? $_SESSION['categ'] : NULL;
    $mail=isset($_SESSION['mail']) ? $_SESSION['mail'] : NULL;
    $id=isset($_SESSION['Id']) ? $_SESSION['Id'] : NULL;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <link href="cssIndex.css" rel="stylesheet" media="all" type="text/css"> 
  <title>Profil utilisateur - Boucherie Order</title>
  <meta charset="UTF-8">
</head>

<body>

  <?php 
  if ($statut==true)
  {
      if ($categ=="vendeur")
      {
        $redirection="Vendeur";
        ?>

        <ul class="menu">
          <li><a href=accueilVendeur.php>Accueil</a></li>
          <li><a class="active" href=profil.php>Profil</a></li>
          <li><a href=commandes.php>Commandes</a></li>
          <li><a href=produits.php>Gérer vos produits</a></li>
          <li><a href=historique.php>Historique de vos ventes</a></li>
        </ul>
<?php
      }
      else
      {
        $redirection="Client";
?>
    <ul class="menu">
      <li><a href=accueilClient.php>Accueil</a></li>
      <li><a class="active" href=profil.php>Profil</a></li>
      <li><a href=catalogue.php>Catalogue</a></li>
      <li><a href=recherche.php>Rechercher</a></li>
      <li><a href=historique.php>Historique de vos achats</a></li>
      <li><a href=panier.php>Mon Panier</a></li>
      <li><a href=achat.php>Finaliser Commande</a></li>
    </ul>
<?php
      }
 ?>




<a href="deconnexion.php"><button class="deco fixedHautDroite">Déconnexion</button></a>
<?php
  echo '<a href=accueil'.$redirection.'.php><img class="displayed" src="Pictures/Viande.png" alt="Image daccueil" style="object-position: center top;"></a>';
?>
  <br>
  <h1>Profil de <?php echo $_SESSION['prenom'].' '.$_SESSION['nom'];?></h1>
    <br>
    <br>
  <p class="PVC">Mail: <?php echo ($mail);?></p> 

  <?php
    if ($categ == "vendeur")
    {
      $requete1="SELECT * FROM vendeur where mailVendeur='$mail'";
      $result1 = $idBase->query($requete1);
      $donnees = $result1->fetch();
      $adresse=$donnees['nomFerme'];
      $nbVentes=$donnees['nbVentes'];


      $requete2="SELECT avg(note) AS moy FROM Produit WHERE IdVendeur='$id'";
      $result2 = $idBase->query($requete2);
      $tableMoy = $result2->fetch();
      $moyenne=$tableMoy['moy'];
      if ($moyenne==NULL)
      {
          $moyenne=0;
      } 

      echo '<p class="PVC">Adresse: '.$adresse.'</p>'; 
      echo '<p class="PVC">Nombre de ventes: '.$nbVentes.'</p>';
      echo '<p class="PVC">ID: '.$id.'</p>';  
      echo '<p class="PVC">Moyenne de vos notes: '.$moyenne.' (0=aucune note)</p>'; 
    }

    elseif ($categ == "client") 
    {
      // INFO Générales
      $requete1="SELECT * FROM client where mailClient='$mail'";
      $result1 = $idBase->query($requete1);
      $donnees = $result1->fetch();
      $adresse=$donnees['adresseClient'];
      $tel=$donnees['telClient'];
      
      // NB COMMANDES
      $requete2 = "SELECT COUNT(*) as nb FROM commande WHERE IdClient='$id'";
      $result2 = $idBase->query($requete2);
      $data = $result2->fetch();
      $nb = $data['nb'];

      //AFFICHAGE
      echo '<p class="PVC">Téléphone: '.$tel.'</p>';
      echo '<p class="PVC">Adresse: '.$adresse.'</p>';   
      echo '<p class="PVC">Nombre de commandes: '.$nb.'</p>';
    }
  ?>


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
