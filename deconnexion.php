<?php
require_once("config.php");
$id=isset($_SESSION['Id']) ? $_SESSION['Id'] : NULL;
$categ = (isset($_POST['categ'])) ? $_POST['categ'] : NULL;
$panier = (isset($_POST['panier'])) ? $_POST['panier'] : NULL;
if($categ=="client")
{
    if($panier)
    {
        $requete="Update produit set IdCommande='0'where IdCommande= (SELECT produit.IdCommande FROM  (select * from produit) as p inner join commande on p.IdCommande = commande.IdCommande inner Join client on commande.IdClient = client.IdClient where p.IdCommande = commande.IdCommande and commande.IdClient=$id)";
        $reqDeco = $idBase->query($requete);
    }
}
session_destroy();
header('LOCATION: index.php?&deco=1');
exit;
?>