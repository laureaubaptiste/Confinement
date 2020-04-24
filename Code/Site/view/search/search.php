<h1>Nos coups de cœurs !</h1>
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
    $habitat = $controller->search(0, "City", date('Y-m-d'), date('Y-m-d'));
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
