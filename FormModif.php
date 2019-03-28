<?php
    session_start();
    $statut=isset($_SESSION['login']) ? $_SESSION['login'] : NULL;
    
    $error=null;

  if (isset($_GET["error"]))  $error=$_GET["error"];
  {
    if ($error==1)
    {
      $error="Un problème est survenu lors de la modification";
    }
  }

  $idModif= (isset($_POST['idModif'])) ? $_POST['idModif'] : NULL;
?>


<!DOCTYPE html>
<html lang="fr">

<head>
<link href="cssIndex.css" rel="stylesheet" media="all" type="text/css"> 
<link href="cssInscription.css" rel="stylesheet" media="all" type="text/css">

<title>Modification produit - Boucherie Order</title>
<meta charset="UTF-8">
</head>


<body>
<?php 
  if ($statut==true)
    {
  ?>
<a href=accueilVendeur.php><img class="displayed" src="Pictures/Viande.png" alt="Image d'accueil" style="object-position: center top;"></a>

<br><br><br>
<h1>Page de formulaire de modification du produit</h1>

<ul class="menu">
    <li><a href=accueilVendeur.php>Accueil</a></li>
    <li><a href=profil.php>Profil</a></li>
    <li><a href=commandes.php>Commandes</a></li>
    <li><a href=produits.php >Ajout d'un produit</a></li>
    <li><a href=Delproduit.php >Suppression d'un produit</a></li>
    <li><a href=Modifproduit.php class="active">Modification d'un produit</a></li>
    <li><a href=historique.php>Historique de vos ventes</a></li>
    </ul>

<a href="deconnexion.php"><button class="deco fixedHautDroite">Déconnexion</button></a>

<center>
<span class="erreur">
    <?php
      if (isset($error))
      {
        echo '<img class="displayed" src="Pictures/attention.png" alt="Image erreur" style="object-position: center top; height="42" width="42">';
        echo $error;
      }
    ?>
    <p>Attention de ne pas ajouter des modifications incohérentes, comme des ailes de boeuf par exemple!</p>
</span>
</center>

<form action="ModifEffectuee.php" method="post">
    <center>
        <div>
        <input class="RAZ" TYPE="reset" value="Vider le formulaire d'ajout">
        </div>
        <br>
    </center>

    <br>
    <input type="hidden" name="idModif" value="<?php echo $idModif;?>" />
    <div>
        Animal:
          <select id="animal" name="animal">
            <option value="Boeuf">Boeuf</option>
            <option value="Porc">Porc</option>
            <option value="Mouton">Mouton</option>
            <option value="Volaille">Volaille</option>
          </select>
    </div>

    <br> 
      
    <div>
        Partie:
            <select id="partie" name="partie">
            <option value="Animal_Entier">Animal entier</option>
            <option value="Filet">Filet</option>
            <option value="Côte">Côte</option>
            <option value="Aile">Aile</option>
            <option value="Steak">Steak</option>
            
            </select>
    </div>
      
    
    
    <div>
        <input type="checkbox" name="Halal" value="1">
        <label for="Halal">Halal</label>
    </div>

    <div>
        <input type="checkbox" name="Fermier" value="10">
        <label for="Fermier">Fermier</label>
    </div>

    <div>
        <input type="checkbox" name="Bio" value="100">
        <label for="Bio">Bio</label>
    </div>

    <div>
    prix/KG:
    <input type="number" name="prixKG" required placeholder="18,50" step="0.01" min="0">
    </div>

    <div>
    Poids:
    <input type="number" name="poids" required placeholder="1,50" step="0.01" min="0">
    </div>

      <br>
      <br>

    <center>
        <div >
        <input class="button" type="submit" name="validerProd" value="Valider le produit">
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