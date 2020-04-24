<table>
    <form action="?customer&newCustomerAgreement&search" method="post">
        <tr>
            <td><label><input name="capacity" placeholder="Capacité" required="required" type="number"></label></td>
            <td><label><input name="city" placeholder="Ville" required="required" type="text"></label></td>
            <td><a href="?customer">Annuler</a></td><td><input type="submit" value="Rechercher"></td>
        </tr>
    </form>
</table>
<table>
    <tr>
        <td>Adresse</td>
        <td>Surface balcon</td>
        <td>Capacité</td>
        <td>Ville</td>
        <td>Exposition</td>
        <td>Espace habitable</td>
        <td>Code Postal</td>
        <td>Distance piste</td>
        <td>Type</td>
    </tr>
    <?php
    if (isset($_GET['search']))
    {
        require_once("controller/controller.php");
        $controller = new Controller("localhost", "neigeEtSoleil", "root", "");
        $search = $controller->search($_POST);
        foreach ($search as $aSearch)
        {
            echo '<tr>';
            echo '<td>' . $aSearch['Address'] . '</td>';
            echo '<td>' . $aSearch['Balcony_Surface'] . '</td>';
            echo '<td>' . $aSearch['Capacity'] . '</td>';
            echo '<td>' . $aSearch['City'] . '</td>';
            echo '<td>' . $aSearch['Exposure'] . '</td>';
            echo '<td>' . $aSearch['Living_Space'] . '</td>';
            echo '<td>' . $aSearch['Postal_Code'] . '</td>';
            echo '<td>' . $aSearch['Track_Distance'] . '</td>';
            echo '<td>' . $aSearch['Type'] . '</td>';
            echo '</tr></table>';
        }
    }
