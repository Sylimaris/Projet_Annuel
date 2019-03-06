<?php
?>

<!DOCTYPE html>
<html lang="fr">

<head>
<link href="cssIndex.css" rel="stylesheet" media="all" type="text/css"> 
<link href="cssInscription.css" rel="stylesheet" media="all" type="text/css">

<title>Boucherie Order - inscription</title>
<meta charset="UTF-8">
</head>


<body>
<a href=index.php><img class="displayed" src="/Pictures/Viande.png" alt="Image d'accueil" style="object-position: center top;"></a>

<br><br><br>
<h1>Page d'inscription</h1>



<form action="enregistrement.php" method="post">
  <center>
<div>
<input class="RAZ" TYPE="reset" value="Vider le formulaire">
</div>
    <br>
</center>
<br>

  <div>
    <p>Nom d'utilisateur:</p>
    <input class="texte" type="text" name="nom" value="">
  </div>

<br>


  <div>
  <p>Prénom d'utilisateur:</p>
  <input class="texte" type="text" name="prenom" value="">
  </div>

<br>



  <div>
  <p>Mot de passe:</p>
  <input class="texte" type="password" name="password" value="">
  </div>

<br>


  <div>
  <p>Mail:</p>
  <input class="texte" type="email" name="mail" value="">
  </div>

<br>

  <div>
    <p>Tel:</p>
  <input class="texte" type="text" name="tel" value="">
  </div>

<br>

<div>
<p>Adresse:</p>
  <TEXTAREA class="texte" name="adresse" rows=4 cols=40>Entrez votre adresse (client) ou nom de ferme (vendeur)</TEXTAREA>
</div>

<br>

<div>
<p>Catégorie:</p>

  <label class="container" for="vendeur">Vendeur
  <input type="radio" id="vendeur" name="categ" value="vendeur"
         checked>
  </label>

  <label class="container" for="acheteur">Acheteur
  <input type="radio" id="acheteur" name="categ" value="acheteur">
  </label>
</div>

<br><br>
<center>
  <div class="button">
    <button>Valider l'inscription</button>
  </div>
</center>


</form>

 <br><br><br><br><br><br>

 <hr>
 <p class="badpage">
Projet annuel "Boucherie Order" en développement par Pierre-baptiste COUGNENC et Thomas LEONARDON
 </p>
</body>

</html>

<?php
?>