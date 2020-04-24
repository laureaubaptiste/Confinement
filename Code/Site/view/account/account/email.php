<table>
    <form action="controller/update0.php" method="post">
        <tr><td colspan="2"><label><input name="email" placeholder="Email" type="email"></label></td></tr>
        <tr>
            <td><label><input name="newEmail0" placeholder="Nouvel email " type="email"></label></td>
            <td><label><input name="newEmail1" placeholder="Confirmer nouvel email" type="email"></label></td>
        </tr>
        <tr>
            <td><label><input name="password0" placeholder="Mot de passe" type="password"></label></td>
            <td><label><input name="password1" placeholder="Confirmer mot de passe" type="password"></label></td>
        </tr>
        <tr>
            <td><a href="account.php">Annuler</a></td>
            <td><label><input type="submit" value="Confirmer"></label></td>
        </tr>
    </form>
    <?php
        if (isset($_GET['errorEmail']))
        {
            include_once("view/error/errorEmail.php");
        }
        else if (isset($_GET['errorEmails']))
        {
            include_once("view/error/errorEmails.php");
        }
    ?>
</table>
