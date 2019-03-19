<?php
?>

<!DOCTYPE html>
<html lang="fr">

<head>
<link href="cssIndex.css" rel="stylesheet" media="all" type="text/css"> 
<link href="cssInscription.css" rel="stylesheet" media="all" type="text/css">

<title>Boucherie Order - oubli MDP</title>
<meta charset="UTF-8">
</head>


<body>
<a href=index.php><img class="displayed" src="/Pictures/Viande.png" alt="Image d'accueil" style="object-position: center top;"></a>

<br><br><br>
<h1>Page de récupération de mot de passe</h1>



<form action="recupMDP.php" method="post">
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
  <p>Mail:</p>
  <input class="texte" type="email" name="mail" value="">
  </div>


<br><br>
<center>
  <div class="button">
    <button>Valider la demande de récupération</button>
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