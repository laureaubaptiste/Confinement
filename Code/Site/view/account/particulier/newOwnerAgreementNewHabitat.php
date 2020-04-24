<table>
    <form action="controller/newOwnerAgreementNewHabitat.php" method="post">
        <tr>
            <td><label><input name="address" placeholder="Adresse" required="required" type="text"></label></td>
            <td><label><input name="balconySurface" placeholder="Surface du balcon" required="required" type="number"></label></td>
            <td><label><input name="capacity" placeholder="Capacité" required="required" type="number"></label></td>
        </tr>
        <tr>
            <td><label><input name="city" placeholder="Ville" required="required" type="text"></label></td>
            <td><label><input name="exposure" placeholder="Exposition" required="required" type="text"></label></td>
            <td><label><input name="livingSpace" placeholder="Espace habitable" required="required" type="number"></label></td>
        </tr>
        <tr>
            <td><label><input name="postalCode" placeholder="Code postal" required="required" type="number"></label></td>
            <td><label><input name="trackDistance" placeholder="Distance piste" required="required" type="number"></label></td>
            <td><label><input name="type" placeholder="Type" required="required" type="text"></label></td>
        </tr>
        <tr>
            <td><label>Date début<input name="startDate" placeholder="Date début" required="required" type="date"></label></td>
            <td><input name="photo" required="required" type="file"></td>
            <td><label><input hidden="hidden" name="endDate" placeholder="Date fin" type="date"></label></td>
            <td><a href="?owner">Annuler</a></td><td><input type="submit" value="Confirmer"></td>
        </tr>
    </form>
</table>
<?php
if (isset($_GET['errorDate']))
{
    include_once("view/error/errorDate.php");
}
else if (isset($_GET['errorNewHabitat']))
{
    include_once("view/error/errorNewHabitat.php");
}
