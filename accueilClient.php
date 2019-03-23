<?php 
    session_start();
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
  <li><a class="active" href=profil.php>Profil</a></li>
  <li><a href=catalogue.php>Catalogue</a></li>
  <li><a href=recherche.php>Rechercher</a></li>
  <li><a href=historique.php>Historique de vos achats</a>
  <li><a href=panier.php>Mon Panier</a>
  <li><a href=achat.php>Finaliser Commande</a>
</li>
</ul>

<a href="deconnexion.php"><button class="deco fixedHautDroite">Déconnexion</button></a>

  <a href=accueilClient.php><img class="displayed" src="Pictures/Viande.png" alt="Image d'accueil" style="object-position: center top;"></a>

  <br>
  <h1>Page Client de <?php echo $_SESSION['prenom'].' '.$_SESSION['nom'];?></h1>

  

                    <!-- profil client -->

                    <!-- consulter catalogue (ajouter/modifier/supprimer panier) -->

                    <!-- acheter + noter vendeurs (d-->

                    <!-- consulter historique -->

    <br><br><br><br><br><br>
    <p class="PVC">Class PVC, s'affiche bien à droite du menu    </p>
    <p class="PVC">Penser à ajouter un produit aléatoire pour remplir ici    </p>
    <p class="PVC">WIP</p>
    <p class="PVC">WIP</p>
    <br><br><br><br><br><br>
    <br><br><br><br><br><br>
    <br><br><br><br><br><br>
    <br><br><br><br><br><br>
    <br><br><br><br><br><br>
    <br><br><br><br><br><br>
    <br><br><br><br><br><br>

    <hr>
    <p class="badpage">
    Projet annuel "Boucherie Order" en développement par Pierre-baptiste COUGNENC et Thomas LEONARDON
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
    Projet annuel "Boucherie Order" en développement par Pierre-baptiste COUGNENC et Thomas LEONARDON
    </p>

  <?php 
    }
  ?>

</body>

</html>

<?php
?>
