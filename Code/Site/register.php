<?php
session_start();
?>
<html lang="fr">
    <head>
        <link href="css/styleSheet.css" rel="stylesheet">
        <link href="bootstrap-3.4.1-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="img/logo.png" rel="icon">
        <meta charset="UTF-8">
        <title>S'inscrire - COVID</title>
    </head>
    <body>
        <div>
            <div class="row">
                <div class="logo">
                    <img alt="Logo" src="img/logo.png">
                
                </div>
                <div>
                    <ul class="nav nav-pills">
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="search.php">Rechercher</a></li>
                        <?php
                        if (isset($_SESSION['email']) && isset($_SESSION['password']))
                        {
                            include_once("view/main-nav-accueil/loggedIn.php");
                        }
                        else
                        {
                            include_once("view/main-nav-accueil/registerActive.php");
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div id="register">
                <div><center><h1>S'inscrire</h1></center></div>
                <div>
                    <form action="controller/register.php" method="post">
                        <label><input type="email" class="form-control" name="email" id="email" placeholder="Email" required="required"></label>
                        <label><input type="password" class="form-control" name="password0" id="password0" placeholder="Mot de passe" required="required"></label>
                        <label><input type="password" class="form-control" name="password1" id="password1" placeholder="Confirmer mot de passe" required="required"></label>
                        <label><input type="text" class="form-control" name="firstName" id="firstName" placeholder="Prénom" required="required"></label>
                        <label><input type="text" class="form-control" name="lastName" id="lastName" placeholder="Nom de famille" required="required"></label>
                        <label><input type="text" class="form-control" name="address" id="address" placeholder="Adresse" required="required"></label>
                        <label><input type="text" class="form-control" name="city" id="city" placeholder="Ville" required="required"></label>
                        <label><input type="number" class="form-control" name="postalCode" id="postalCode" placeholder="Code postal" required="required"></label>
                        
                        <input type="submit" class="btn btn-primary btn-lg" name="register" value="S'inscrire">
                    </form>
                </div>
                <?php
                if (isset($_GET['errorPasswords']))
                {
                    include_once("view/error/errorPasswords.php");
                }
                else if (isset($_GET['errorRegister']))
                {
                    include_once("view/error/errorRegister.php");
                }
                ?>
            </div>
        </div>
    </body>
</html>
