<?php 
require_once("config.php");
$error = $nom = $prenom = '';


    $usermail = isset($_POST['mail']) ? $_POST['mail'] : NULL;
    $password = isset($_POST['password']) ? $_POST['password'] : NULL;
    $categ = isset($_POST['categ']) ? $_POST['categ'] : NULL;

    if ($categ == "vendeur")
    {
        $sqlLogin="select * from vendeur where mailVendeur='$usermail' and passwordVendeur='$password'";
        $reqLogin = $idBase->query($sqlLogin);
        if($reqLogin->rowCount()>0)
        {
           $donnees = $reqLogin->fetch();
           $_SESSION['nom']=$donnees['nomVendeur'];
           $_SESSION['prenom']=$donnees['prenomVendeur'];  
           $_SESSION['login'] = true; 
           header('LOCATION: accueilVendeur.php');
        }
        else
        {
            $error=1;
        }
    }
    elseif ($categ == "client") 
    {
        $sqlLogin="select * from client where mailClient='$usermail' and passwordClient='$password' ";
        $reqLogin = $idBase->query($sqlLogin);
        if($reqLogin->rowCount()>0)
        {
            $donnees = $reqLogin->fetch();
            $_SESSION['nom']=$donnees['nomClient'];
            $_SESSION['prenom']=$donnees['prenomClient'];                      
            $_SESSION['login'] = true; 
            header('LOCATION: accueilClient.php');
        }
        else
        {
            $error=1;
        }
    }
    
    if ($error==1)
    {
        echo $error;
        ?>
        <META http-equiv="refresh" content="0.1; URL=./?&error=<?php echo $error;?>">
        <?php
    }
    

?>

