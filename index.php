<?php
  $error=$erreur=null;

  if (isset($_GET["error"]))  $error=$_GET["error"];
  {
    if ($error==1)
    {
      $error="Nom d'utilisateur ou mot de passe incorrect ou catégorie erronnée<br>Connexion échouée..";
    }
  }

  if (isset($_POST['valider']))
  {
    
    $password = htmlspecialchars($_POST['password']);
    $mail = htmlspecialchars($_POST['mail']);

    if ((empty($password)) and (empty($mail)))
      $erreur = 'Tous les champs sont vides';
    elseif (empty($mail))
      $erreur = 'Champ mail vide';
    elseif (empty($password))
      $erreur = 'Champ password vide';
    
  }

  if ((isset($_POST['valider'])) and (!isset($erreur)))
  {
    session_start();
    $_SESSION['mail'] = $_POST['mail'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['categ'] = $_POST['categ'];
    header("Location: connect.php");
  }
  else
  {
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <link href="cssIndex.css" rel="stylesheet" media="all" type="text/css"> 
  <title>Boucherie Order</title>
  <meta charset="UTF-8">
</head>


<body>
  <img class="displayed" src="Pictures/Viande.png" alt="Image d'accueil" style="object-position: center top;">

  <br><br><br>

  <h2>Vous êtes client : Commandez vos produits frais avec beaucoup d'options!</h2>
  <br>
  <h2>Vous êtes agriculteur : Vendez vos lots aux consommateur au meilleur prix, en évitant des intermédiaires coûteux!</h2>
  <br><br>

  <center>
  <div>

  <span class="erreur">
    <?php
      if (isset($erreur))
      {
        echo '<img class="displayed" src="Pictures/attention.png" alt="Image erreur" style="object-position: center top; height="42" width="42">';
        echo $erreur;
      }
      if (isset($error))
      {
        echo '<img class="displayed" src="Pictures/attention.png" alt="Image erreur" style="object-position: center top; height="42" width="42">';
        echo $error;
      }
    ?>
  </span>

        
    <form action="" method="post">
        <br>
        <br>
      Mail utilisateur:
        <br>
      <input type="text" name="mail">
        <br>
        <br>
      Mot de passe:
        <br>
      <input type="password" name="password">
        <br>
      
      <div>

        <p><u>Catégorie</u> :

        <label class="container" for="vendeur">Vendeur
        <input type="radio" id="vendeur" name="categ" value="vendeur">
        </label>

        <label class="container" for="client">Client
        <input type="radio" id="client" name="categ" value="client" checked>
        </label>
        </p>
      </div>

        <br>
      
      <input class="button" type="submit" name="valider" value="Se connecter">


    </form> 

    
      <br><br>
    <a href="inscription.php"><button class="button">S'inscrire</button></a>
      <br><br><br>
    <a href="OubliMDP.php"><button class="button">Mot de passe oublié</button></a>
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
  }
?>