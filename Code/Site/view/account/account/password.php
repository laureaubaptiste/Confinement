<table>
    <form action="controller/update0.php" method="post">
        <tr><td colspan="2"><label><input name="password" placeholder="Password" type="password"></label></td></tr>
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
    if (isset($_GET['errorPassword']))
    {
        include_once("view/error/errorPassword.php");
    }
    else if (isset($_GET['errorPasswords']))
    {
        include_once("view/error/errorPasswords.php");
    }
    ?>
</table>
