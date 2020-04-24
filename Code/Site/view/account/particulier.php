<div>
    <ul class="nav nav-pills">
        <li><a href="?account">Mon Compte</a></li>
        <li><a href="?professionnel">Professionnel</a></li>
        <li  class="active"><a href="?particulier">Particulier</a></li>
    </ul>
    <?php
    include_once("view/account/customer/customerAgreement.php");
    echo '<ul class="nav nav-pills"><li><a href="search.php">Nouveau contrat client</a></li></ul>';
    echo '</div>';
