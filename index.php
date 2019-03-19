<?php
?>

<!DOCTYPE html>
<html lang="fr">

<head>
<link href="cssIndex.css" rel="stylesheet" media="all" type="text/css"> 

<title>Boucherie Order</title>
<meta charset="UTF-8">
</head>


<body>
<img class="displayed" src="/Pictures/Viande.png" alt="Image d'accueil" style="object-position: center top;">

<br><br><br>

<h2>Vous êtes client : Commandez vos produits frais avec beaucoup d'options!</h2>
<br>
<h2>Vous êtes agriculteur : Vendez vos lots aux consommateur au meilleur prix, en évitant des intermédiaires coûteux!</h2>
<br><br>

<center>

<form action="connexion.php" method="post">
  <div>
  Nom d'utilisateur:
    <br>
  <input type="text" name="username" value="">
</div>
    <br>
<div>
  Mot de passe:
    <br>
  <input type="password" name="password" value="">
</div>
    <br>

  <button>Se connecter</button>
  </form> 
    <br><br><br>
  <a href="inscription.php"><button>S'inscrire</button></a>
    <br><br><br>
  <a href="OubliMDP.php"><button>Mot de passe oublié </button></a>
    <br><br><br>
</div>
</center>



 <br><br><br><br><br><br>

 <hr>
 <p class="badpage">
Projet annuel "Boucherie Order" en développement par Pierre-baptiste COUGNENC et Thomas LEONARDON
 </p>
</body>

</html>

<?php
?>