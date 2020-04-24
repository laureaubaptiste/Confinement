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
        <title>Accueil - COVID</title>
    </head>
    <body>
        <div class="row">
            <div class="logo">
                <img alt="Logo" src="img/logo.png">
                
            </div>
            <div>
                <ul class="nav nav-pills">
                    <li class="active"><a href="index.php">Accueil</a></li>
                    <li><a href="search.php">Rechercher</a></li>
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
        <div id="accueil">
            </br>
             <div><h1>TOUS UNIS CONTRE LE COVID-19</h1></div></br>
        
            <div><h1>PRINCIPE</h1></div></br>
            <div></br>
                <h4>
                    Cette plateforme permet la mise en relation des personnels soignants avec des personnes souhaitant les aider (nourriture, logement, transport, etc ...)
                </h4>
                <h4>
                    En tant que bénévole vous pouvez aider nos soignant en proposant des services, tels que: location de chambre, de course, de livraison... 
                    
                </h4>
                <h4> 
                    Il permet à vous soignants, en vous se connectant, d'accèder aux annonces qui vous intéressent. 
                </h4>

           
            </div>
        </div>
                    
        
        <!--copyright-->
        <address>
            Copyright septembre 2019,
            <a href="discoverUs.php" class="btn btn-one">Find Us</a>
            <a href="legaleNotice.php" class="btn btn-two">Legal Notice</a>
        </address>
    </body>
</html>
