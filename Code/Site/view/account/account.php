<div>
    <ul class="nav nav-pills">
        <li class="active"><a href="?account">Mon Compte</a></li>
        <li><a href="?professionnel">Professionnel</a></li>
        <li><a href="?particulier">Particulier</a></li>
    </ul>
    <table>
        <?php
        echo '<tr><td>Email</td><td>' . $_SESSION['email'] . '</td><td><a href="?account&email"><img alt="pencil" src="img/pencil.png"></a></td></tr>';
        echo '<tr><td>Password</td><td>***************</td><td><a href="?account&password"><img alt="pencil" src="img/pencil.png"></a></td></tr>';
        echo '<tr><td>Prénom</td><td>' . $_SESSION['firstName'] . '</td><td><a href="?account&firstName"><img alt="pencil" src="img/pencil.png"></a></td></tr>';
        echo '<tr><td>Nom de famille</td><td>' . $_SESSION['lastName'] . '</td><td><a href="?account&lastName"><img alt="pencil" src="img/pencil.png"></a></td></tr>';
        echo '<tr><td>Date de naissance</td><td>' . $_SESSION['birthDate'] . '</td><td><a href="?account&birthDate"><img alt="pencil" src="img/pencil.png"></a></td></tr>';
        echo '<tr><td>Adresse</td><td>' . $_SESSION['address'] . '</td><td><a href="?account&address"><img alt="pencil" src="img/pencil.png"></a></td></tr>';
        echo '<tr><td>Ville</td><td>' . $_SESSION['city'] . '</td><td><a href="?account&city"><img alt="pencil" src="img/pencil.png"></a></td></tr>';
        echo '<tr><td>Numéro de téléphone</td><td>' . $_SESSION['phoneNumber'] . '</td><td><a href="?account&phoneNumber"><img alt="pencil" src="img/pencil.png"></a></td></tr>';
        echo '<tr><td>Code postal</td><td>' . $_SESSION['postalCode'] . '</td><td><a href="?account&postalCode"><img alt="pencil" src="img/pencil.png"></a></td></tr>';
        echo '</table>';
        if (isset($_GET['email']))
        {
            include_once("account/email.php");
        }
        else if (isset($_GET['password']))
        {
            include_once("account/password.php");
        }
        else if (isset($_GET['firstName']))
        {
            include_once("account/firstName.php");
        }
        else if (isset($_GET['lastName']))
        {
            include_once("account/lastName.php");
        }
        else if (isset($_GET['birthDate']))
        {
            include_once("account/birthDate.php");
        }
        else if (isset($_GET['address']))
        {
            include_once("account/address.php");
        }
        else if (isset($_GET['city']))
        {
            include_once("account/city.php");
        }
        else if (isset($_GET['phoneNumber']))
        {
            include_once("account/phoneNumber.php");
        }
        else if (isset($_GET['postalCode']))
        {
            include_once("account/postalCode.php");
        }
        echo '</div>';