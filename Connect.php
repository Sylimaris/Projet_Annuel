<?php 
require_once("config.php");
$error = $username = $usersurname = $password = $userError = $passError = '';


    $usermail = isset($_SESSION['mail']) ? $_SESSION['mail'] : NULL;
    $password = isset($_SESSION['password']) ? $_SESSION['password'] : NULL;
    $categ = isset($_SESSION['categ']) ? $_SESSION['categ'] : NULL;


    #TEST
    // $usermail = 'thomas.lanos@optPyke.fr';
    // $password = 'lanos4ever';
    // $categ = 'client'; 

    if ($categ == "vendeur")
    {
        $sqlLogin="select * from vendeur where mailVendeur='$usermail' and passwordVendeur='$password'";
        $reqLogin = $idBase->query($sqlLogin);
        if($reqLogin->rowCount()>0)
        {
            $_SESSION['login'] = true; 
            #header('LOCATION: pute.html');
            echo"VENDEUR"; 
            die();
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
            $_SESSION['login'] = true; 
            #header('LOCATION: pute.html');
            echo"CLIENT"; 
            die();
        }
        else
        {
            $error=1;
        }
    }
    session_destroy();
    
    if ($error==1)
    {
        echo $error;
        ?>
        <META http-equiv="refresh" content="0.1; URL=./?&error=<?php echo $error;?>">
        <?php
    }
    

?>

