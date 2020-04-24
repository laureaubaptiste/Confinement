<table>
    <form action="controller/oldHabitat.php" method="post">
        <tr>
            <td>
                <select name="address">
                    <?php
                        require_once("controller/controller.php");
                        $controller = new Controller("localhost", "neigeEtSoleil", "root", "");
                        $oldHabitat = $controller->selectOldHabitat($_SESSION['email']);
                        foreach ($oldHabitat as $anOldHabitat)
                        {
                            echo '<option value="' . $anOldHabitat['Address'] . '">' . $anOldHabitat['Address'] . '</option>';
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr><td><label><input name="startDate" placeholder="Date début" type="date"></label></td></tr>
        <tr><td><label><input hidden="hidden" name="endDate" placeholder="Date fin" type="date"></label></td></tr>
        <tr><td><a href="?owner">Annuler</a></td><td><input type="submit" value="Confirmer"></td></tr>
    </form>
</table>
<?php
    if (isset($_GET['errorDate']))
    {
        include_once("view/error/errorDate.php");
    }
