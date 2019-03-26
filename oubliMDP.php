<?php
  $error=null;

  if (isset($_GET["error"]))  $error=$_GET["error"];
  {
    if ($error==1)
    {
      $error="Nom d'utilisateur ou mail non reconnus, récupération échouée..";
    }
  }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
<link href="cssIndex.css" rel="stylesheet" media="all" type="text/css"> 
<link href="cssInscription.css" rel="stylesheet" media="all" type="text/css">

<title>Mot de passe oublié - Boucherie Order</title>
<meta charset="UTF-8">
</head>


<body>
<a href=index.php><img class="displayed" src="Pictures/Viande.png" alt="Image d'accueil" style="object-position: center top;"></a>

<br><br><br>
<h1>Page de récupération de mot de passe</h1>
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

<form action="recupMDP.php" method="post">

<div>
<input class="RAZ" TYPE="reset" value="Vider le formulaire">
</div>
    <br>

<br>

  <div>
    <p>Nom de famille</p>
    <input class="texte" type="text" name="nom" value="">
  </div>

<br>


  <div>
  <p>Mail:</p>
  <input class="texte" type="email" name="mail" value="">
  </div>


<br>

<div>
    <p>Catégorie:<br><br>
      <label class="container" for="vendeur">Vendeur
        <input type="radio" id="vendeur" name="categ" value="vendeur">
      </label>

      <label class="container" for="client">Client
        <input type="radio" id="client" name="categ" value="client" checked>
      </label>
    </p>
</div>

  <div>
  <input class="button" type="submit" name="valider" value="Récupérer mon mot de passe">
  </div>



</form>
</center>
 <br><br><br>

 <footer>
    <hr>
    <p class="badpage">
    Projet annuel "Boucherie Order" en développement par Pierre-baptiste COUGNENC et Thomas LEONARDON
    </p>
</footer>
</body>

</html>

<?php
?>