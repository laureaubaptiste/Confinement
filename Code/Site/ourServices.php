<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <link href="css/styleSheet.css" rel="stylesheet" type="text/css">
        <link href="bootstrap-3.4.1-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="img/logo.png" rel="icon">
        <link href="jquery-ui/css/smoothness/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css"/>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-with, initial-scale=1.0">
        <title>Nos Services - COVID</title>
    </head>
    <body>
        <div class="row">
            <div class="logo">
                <img alt="Logo" src="img/logo.png">
                
            </div>
            <div>
                <ul class="nav nav-pills">
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="search.php">Rechercher</a></li>
                    <li class="active"><a href="ourServices.php">Nos Services</a></li>
                    <?php
                    if (isset($_SESSION['email']) && isset($_SESSION['password']))
                        {

                            include_once("view/main-nav-accueil/loggedIn.php");
                        }
                        else
                        {
                            include_once("view/main-nav-accueil/logInRegister.php");
                        }
                    ?>
                    
                </ul>
            </div>
        </div>
    </body>
</html>
