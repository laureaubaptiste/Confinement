<?php
    session_start();
?>
<html lang="fr">
    <head>
        <link href="css/styleSheet.css" rel="stylesheet">
        <link href="bootstrap-3.4.1-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="img/logo.png" rel="icon">
        <meta charset="UTF-8">
        <title>S'identifer - COVID</title>
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
                                include_once("view/main-nav-accueil/logInActive.php");
                            }
                        ?>
                    </ul>
                </div>
            </div>
            <div id="logIn">
                <div><center><h1>S'identifier</h1></center></div>
                <div>
                    <form action="controller/logIn.php" method="post">
                        <label><input type="email" class="form-control" name="email" id="email" placeholder="Email" required="required"></label>
                        <label><input type="password" class="form-control" name="password0" id="password0" placeholder="Mot de passe" required="required"></label>
                        <input type="submit" class="btn btn-primary btn-lg" name="register" value="Se connecter">
                    </form>
                    </div>
            </div>
            <?php
                if (isset($_GET['errorLogIn']))
                {
                    include_once("view/error/errorLogIn.php");
                }
            ?>
        </div>
    </body>
</html>
