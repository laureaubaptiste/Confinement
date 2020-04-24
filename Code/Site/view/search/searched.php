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
    require_once("controller/controller.php");
    $controller = new Controller("localhost:8889", "neigeEtSoleil", "root", "root");
    if (!$_GET['capacity'])
    {
        $_GET['capacity'] = 0;
    }
    if (!$_GET['city']) {
        $_GET['city'] = "City";
    }
    if (!$_GET['endDate'])
    {
        $_GET['endDate'] = date('Y-m-d');
    }
    if (!$_GET['startDate']) {
        $_GET['startDate'] = date('Y-m-d');
    }
    $habitat = $controller->search($_GET['capacity'], $_GET['city'], $_GET['endDate'], $_GET['startDate']);
    foreach ($habitat as $aHabitat)
    {
        echo '<tr>';
        echo '<td>' . $aHabitat['Address'] . '</td>';
        echo '<td>' . $aHabitat['Balcony_Surface'] . '</td>';
        echo '<td>' . $aHabitat['Capacity'] . '</td>';
        echo '<td>' . $aHabitat['City'] . '</td>';
        echo '<td>' . $aHabitat['Exposure'] . '</td>';
        echo '<td>' . $aHabitat['Living_Space'] . '</td>';
        echo '<td>' . $aHabitat['Postal_Code'] . '</td>';
        echo '<td>' . $aHabitat['Track_Distance'] . '</td>';
        echo '<td>' . $aHabitat['Type'] . '</td>';
        echo '</tr>';
    }
    ?>
</table>
