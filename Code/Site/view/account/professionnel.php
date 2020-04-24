<div>
    <ul class="nav nav-pills">
        <li><a href="?account">Mon Compte</a></li>
        <li class="active"><a href="?professionel">Professionnel</a></li>
        <li><a href="?particulier">Particulier</a></li>
    </ul>
    <?php
    include_once("view/account/owner/ownerAgreement.php");
    if (isset($_GET['newOwnerAgreement']))
    {
        if (isset($_GET['newHabitat']))
        {
            include_once("view/account/owner/newOwnerAgreementNewHabitat.php");
        }
        else if (isset($_GET['oldHabitat']))
        {
            include_once("view/account/owner/oldHabitat.php");
        }
        else
        {
            include_once("view/account/owner/newOwnerAgreement.php");
        }
    }
    else
    {
        echo '<ul class="nav nav-pills"><li><a href="?owner&newOwnerAgreement">Nouveau contrat propriétaire</a></li></ul>';
    }
    echo '</div>';