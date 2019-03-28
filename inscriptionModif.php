<?php
 session_start();
 $statut=isset($_SESSION['login']) ? $_SESSION['login'] : NULL;
 $id=isset($_SESSION['Id']) ? $_SESSION['Id'] : NULL;
 $categ=isset($_SESSION['categ']) ? $_SESSION['categ'] : NULL;

  $error=null;

  if (isset($_GET["error"]))  $error=$_GET["error"];
  {
    if ($error==1)
    {
      $error="Un problème est survenu lors de l'inscription";
    }
    elseif ($error==2)
    {
      $error="Il faut remplir tous les champs";
    }
    elseif ($error==3)
    {
      $error="ADRESSE MAIL DEJA UTILISEE PAR UN AUTRE UTILISATEUR";
    }
  }
?>


<!DOCTYPE html>
<html lang="fr">

<head>
<link href="cssIndex.css" rel="stylesheet" media="all" type="text/css"> 
<link href="cssInscription.css" rel="stylesheet" media="all" type="text/css">

<title>Modification Inscription - Boucherie Order</title>
<meta charset="UTF-8">
</head>


<body>
<?php 
  if ($statut==true)
    {
        if($categ=='vendeur')
        {
?>

            <ul class="menu">
                <li><a href=accueilVendeur.php>Accueil</a></li>
                <li><a href=profil.php class="active">Profil</a></li>
                <li><a href=commandes.php>Commandes</a></li>
                <li><a href=produits.php >Ajout d'un produit</a></li>
                <li><a href=Delproduit.php >Suppression d'un produit</a></li>
                <li><a href=Modifproduit.php >Modification d'un produit</a></li>
                <li><a href=historique.php>Historique de vos ventes</a></li>
            </ul>

            <a href="deconnexion.php"><button class="deco fixedHautDroite">Déconnexion</button></a>
            <a href=accueilVendeur.php><img class="displayed" src="Pictures/Viande.png" alt="Image d'accueil" style="object-position: center top;"></a>
          
        <?php
        }
        if($categ=='client')
        {
        ?>
            
            <ul class="menu">
            <li><a class="active" href=accueilClient.php>Accueil</a></li>
            <li><a href=profil.php>Profil</a></li>
            <li><a href=historique.php>Historique de vos achats</a>
            <li><a href=panier.php>Mon Panier</a></li>
            <li><a href=achat.php>Finaliser Commande</a></li>
            </ul>


<a href="deconnexion.php"><button class="deco fixedHautDroite">Déconnexion</button></a>

<a href=accueilClient.php><img class="displayed" src="Pictures/Viande.png" alt="Image d'accueil" style="object-position: center top;"></a>

        <?php
        }
        ?>

<br><br><br>
<h1>Page de modification d'inscription</h1>
<h2>Il vous faudra tout re-remplir afin d'éviter toute erreur</h2>
<center>
<p class="erreur">[vous ne pouvez pas changer votre compte de catégorie VENDEUR/CLIENT]</p>
</center>


<center>
<span class="erreur">
    <?php
      if (isset($error))
      {
        echo '<img class="displayed" src="Pictures/attention.png" alt="Image erreur" style="object-position: center top; height="42" width="42">';
        echo $error;
      }
    ?>
</span>
</center>

<form action="enregistrementModifProfil.php" method="post">
  <center>
<div>
<input class="RAZ" TYPE="reset" value="Vider le formulaire">
</div>
    <br>
</center>
<br>

  <div>
    <p>Nom d'utilisateur:</p>
    <input class="texte" type="text" name="nom" value="" required>
  </div>

<br>


  <div>
  <p>Prénom d'utilisateur:</p>
  <input class="texte" type="text" name="prenom" value="" required>
  </div>

<br>



  <div>
  <p>Mot de passe:</p>
  <input class="texte" type="password" name="password" value="" required>
  </div>

<br>


  <div>
  <p>Mail:</p>
  <input class="texte" type="email" name="mail" value="" required>
  </div>

<br>

  <div>
    <p>Tel:</p>
  <input class="texte" type="text" name="tel" value="" required>
  </div>

<br>

<div>
<p>Adresse:</p>
  <TEXTAREA class="texte" name="adresse" rows=4 cols=40 required>Entrez votre adresse (client) ou nom de ferme (vendeur)</TEXTAREA>
</div>

<br>
<center>
  <div >
  <input class="button" type="submit" name="valider" value="Valider l'inscription">
  </div>
</center>


</form>

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