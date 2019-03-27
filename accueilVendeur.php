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
    <li><a href=profil.php>Profil //TO DO : modif données</a></li>
    <li><a href=commandes.php>Commandes //TO DO</a></li>
    <li><a href=produits.php>Ajout d'un produit //TO DO: prix des autres du meme type</a></li>
    <li><a href=Delproduit.php >Suppression d'un produit</a></li>
    <li><a href=Modifproduit.php>Modification d'un produit //TO DO</a></li>
    <li><a href=historique.php>Historique de vos ventes //TO DO</a></li>
    </ul>

<a href="deconnexion.php"><button class="deco fixedHautDroite">Déconnexion</button></a>

  <a href=accueilVendeur.php><img class="displayed" src="Pictures/Viande.png" alt="Image d'accueil" style="object-position: center top;"></a>

  <br>
  <h1>Page Vendeur de <?php echo $_SESSION['prenom'].' '.$_SESSION['nom'];?></h1>

  

                    <!-- profil vendeur (avec notation) -->

                    <!-- consulter commandes (accepter/refuser) -->

                    <!-- consulter produits en ventes : MODIFIER / AJOUTER / SUPPRIMER -->

                    <!-- consulter historique -->

    <br><br><br><br><br><br>
    <p class="PVC">Class PVC, s'affiche bien à droite du menu</p>
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
