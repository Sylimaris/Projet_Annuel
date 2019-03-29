<?php 
    require_once("config.php");
    $statut=isset($_SESSION['login']) ? $_SESSION['login'] : NULL;
    $categ=isset($_SESSION['categ']) ? $_SESSION['categ'] : NULL;
    $mail=isset($_SESSION['mail']) ? $_SESSION['mail'] : NULL;
    $id=isset($_SESSION['Id']) ? $_SESSION['Id'] : NULL;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <link href="cssIndex.css" rel="stylesheet" media="all" type="text/css"> 
  <title>historique - Boucherie Order</title>
  <meta charset="UTF-8">
</head>

<body>

  <?php 
  if ($statut==true)
  {
      if ($categ=="vendeur")
      {
        $redirection="Vendeur";
        ?>

      <ul class="menu">
      <li><a href=accueilVendeur.php>Accueil</a></li>
      <li><a href=profil.php>Profil</a></li>
      <li><a href=commandes.php>Commandes</a></li>
      <li><a href=produits.php>Ajout d'un produit</a></li>
      <li><a href=Delproduit.php >Suppression d'un produit</a></li>
      <li><a href=Modifproduit.php>Modification d'un produit</a></li>
      <li><a href=historique.php class="active">Historique de vos ventes</a></li>
      </ul>
<?php
      }
      else
      {
        $redirection="Client";
?>
    <ul class="menu">
      <li><a href=accueilClient.php>Accueil</a></li>
      <li><a  href=profil.php>Profil</a></li>
      <li><a href=historique.php class="active">Historique de vos achats</a></li>
      <li><a href=panier.php>Mon Panier</a></li>
      <li><a href=achat.php>Finaliser Commande</a></li>
    </ul>
<?php
      }
 ?>


<a href="deconnexion.php"><button class="deco fixedHautDroite">Déconnexion</button></a>
<?php
  echo '<a href=accueil'.$redirection.'.php><img class="displayed" src="Pictures/Viande.png" alt="Image daccueil" style="object-position: center top;"></a>';
?>
  <br>
  <h1>Historique de <?php echo $_SESSION['prenom'].' '.$_SESSION['nom'];?></h1>
    <br>
    <br>
 





  <?php
    if ($categ == "vendeur")
    {
      $requete1="SELECT * FROM produit AS p inner join commande as c ON p.IdCommande = c.IdCommande WHERE IdVendeur='$id' and note IS NOT NULL";
      $req= $idBase->query($requete1);
        $donnees = $req->fetchAll();
        if (count($donnees) == 0) {
            ?>
            <p class="PVC erreur">Votre historique est vide!</p>
        <?php 
        }
            else {
        ?>
        <div class="PVC">
        <?php
            echo"<table class='table1'><tr class='tr1'><th class='th1'>Animal</th><th class='th1'>Partie</th><th class='th1'>Somme reçue</th><th class='th1'>Client</th><th class='th1'>Date</th>";
            foreach ($donnees as $donnee)
            {
                echo "<tr class='tr1'>";
                    echo "<td class='td1'> $donnee[animal] </td>";        
                    echo "<td class='td1'> $donnee[partie] </td>";

                    $prix_total=$donnee['prixKg']*$donnee['poids'];
                    echo "<td class='td1'> $prix_total </td>";

                    $idClient=$donnee['IdClient'];
                    $reqClient="SELECT mailClient FROM client where IdClient ='$idClient'";

                    $req2= $idBase->query($reqClient);
                    $donneeMail = $req2->fetch();
                    $mailClient=$donneeMail['mailClient'];
                    echo "<td class='td1'> $mailClient </td>";

                    $today = $donnee['datePaiement'];
                    echo "<td class='td1'> $today </td>";

                echo "</tr>";
            }
            echo"</table>";
        ?>
        </div>
        <?php } 
    }
    
    elseif ($categ == "client") 
    {
        #$requete1="SELECT * FROM produit AS p inner join commande as c ON p.IdCommande = c.IdCommande inner join client as cli ON c.IdClient = cli.IdClient WHERE IdClient = '$id'";



        $requete1="SELECT * FROM Commande WHERE validation=3 and IdClient=$id";
        $req= $idBase->query($requete1);
        $donnees = $req->fetchAll();
        if (count($donnees) == 0) {
            ?>
            <p class="PVC erreur">Votre historique est vide!</p>
        <?php 
        }
            else {
        ?>
        <div class="PVC">
        <?php
            echo"<table class='table1'><tr class='tr1'><th class='th1'>Numero de la commande</th><th class='th1'>Date du paiement</th><th class='th1'>Somme payé</th>";
            foreach ($donnees as $donnee)
            {
                echo "<tr class='tr1'>";
                    echo "<td class='td1'> $donnee[IdCommande] </td>";        
                    echo "<td class='td1'> $donnee[datePaiement] </td>";
                    echo "<td class='td1'> $donnee[prix] € </td>";
                echo "</tr>";
            }
            echo"</table>";
        ?>
        </div>
        <?php } 

// Le client valide la commande et le système via le site envoie un message auprès de chaque
// vendeur correspondant au produit que le client a signifié. Le système produira par la suite une
// facture (au format PDF) qui contiendra le nom des vendeurs, chaque produit vendu ainsi que
// la somme à régler individuellement et le total.
// Une fois la somme réglée, le client recevra une grille de notation correspondant à chaque
// produit qu’il aura commandé, il devra via un système d’étoile juger de la qualité de chaque
// produit, ainsi que de la disponibilité du vendeur.
//A FINIR
        // $req= $idBase->query($requete1);
        //   $donnees = $req->fetchAll();
        //   if (count($donnees) == 0) {
        
    }
  ?>


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
