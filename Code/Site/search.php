<?php
session_start();
?>
<html lang="fr">
    <head>
        <link href="css/styleSheet.css" rel="stylesheet">
        <link href="bootstrap-3.4.1-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="img/logo.png" rel="icon">
        <meta charset="UTF-8">
        <link href="jquery-ui/css/smoothness/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css"/>
        <title>Rechercher - COVID</title>
    </head>
    <body>
        <div class="row">
            <div class="logo">
                <img alt="Logo" src="img/logo.png">
                
            </div>
            <div>
                <ul class="nav nav-pills">
                    <li><a href="index.php">Accueil</a></li>
                    <li class="active"><a href="search.php">Rechercher</a></li>
                    
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
        <div id="search">
            <div>
                <div><h1>Rechercher</h1></div>
                <form action="controller/search.php" method="post">
                    <div>
                        <label><input type="text" class="form-control" name="ville" id="lieux" placeholder="Lieux"></label>
                        <label><input type="text" class="form-control" name="service" id="service" placeholder="Service"></label>
                        <label><input type="number" class="form-control" name="capacite" id="personne" placeholder="Nombre de personnes"></label>
                    <div>
                    </div>
                        <label>Date de départ<input type="date" class="form-control" name="startDate" id="dateDepart" placeholder="Date départ"></label>
                        <label>Date d'arrivée<input type="date" class="form-control" name="endDate" id="dateArrive" placeholder="Date arrivée"></label>
                        <label><input type="submit" class="btn btn-primary" name="reseach" id="reseach" value="Rechercher"></label>
                    </div>
                </form>
                <?php
                if (isset($_GET['search']))
                {
                    include_once("view/search/searched.php");
                }
                else
                {
                    include_once("view/search/search.php");
                }
                ?>
            </div>
        </div>
        <script type="application/javascript" src="jquery-ui/js/jquery-1.9.1.js"></script>
        <script type="application/javascript" src="jquery-ui/js/jquery-ui-1.10.3.custom.js"></script>
        <script type="application/javascript" src="jquery-ui/js/jquery.ui.datepicker-fr.js"></script>
        <script type="application/javascript">
            $(document).ready(function() {
                $( "#dateArrive" ).datepicker({
                    defaultDate: "+1w",
                    numberOfMonths: 2,
                    changeMonth: true,
                    changeYear: true,
                    yearRange: '-1:+1',
                    maxDate: '+1Y',
                    onClose: function( selectedDate ) {
                        $( "#date_fin" ).datepicker( "option", "minDate", selectedDate );
                    }
                });
                $( "#dateDepart" ).datepicker({
                    defaultDate: "+1w",
                    numberOfMonths: 2,
                    changeMonth: true,
                    changeYear: true,
                    maxDate: '+2Y',
                    onClose: function( selectedDate ) {
                        $( "#date_debut" ).datepicker( "option", "maxDate", selectedDate );
                    }
                });
            });
        </script>

    </body>
</html>
