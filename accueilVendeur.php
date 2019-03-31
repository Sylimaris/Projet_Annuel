<?php 
    session_start();
    $statut=isset($_SESSION['login']) ? $_SESSION['login'] : NULL;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <link href="cssIndex.css" rel="stylesheet" media="all" type="text/css"> 
  <title>Page principale vendeur - Boucherie Order</title>
  <meta charset="UTF-8">
</head>

<body>

  <?php 
  if ($statut==true)
    {
  ?>


  <ul class="menu">
      <li><a href=accueilVendeur.php class="active">Accueil</a></li>
      <li><a href=profil.php>Profil</a></li>
      <li><a href=commandes.php>Commandes</a></li>
      <li><a href=produits.php>Ajout d'un produit</a></li>
      <li><a href=Delproduit.php >Suppression d'un produit</a></li>
      <li><a href=Modifproduit.php>Modification d'un produit</a></li>
      <li><a href=historique.php>Historique de vos ventes</a></li>
  </ul>

<a href="deconnexion.php"><button class="deco fixedHautDroite">Déconnexion</button></a>

  <a href=accueilVendeur.php><img class="displayed" src="Pictures/Viande.png" alt="Image d'accueil" style="object-position: center top;"></a>

  <br>
  <h1>Bonjour <?php echo $_SESSION['prenom'].' '.$_SESSION['nom'];?></h1>

    <br><br><br><br><br><br>
    <p class="PVC">
    <?php
        $day = date ('w');
        $month = date('m');
        $nd = date ('d');
        $annee = date ('Y');
        $heure = date ('H\:i');
        $JoursSemaine = array("Dimanche ","Lundi ","Mardi ","Mercredi ","Jeudi ","Vendredi ","Samedi ");
        $jour = $JoursSemaine[$day];
        $Mois = array(
              "01" => " Janvier ",
              "02" => " Février ",
              "03" => " Mars ",
              "04" => " Avril ",
              "05" => " Mai ",
              "06" => " Juin ",
              "07" => " Juillet ",
              "08" => " Août ",
              "09" => " Septembre ",
              "10" => " Octobre ",
              "11" => " Novembre ",
              "12" => " Décembre ");
          $mois = $Mois[$month];
      echo 'Aujourd\'hui, nous sommes le ' .$jour .$nd .$mois .$annee. ' et il est '.$heure;?>
      </p>
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
