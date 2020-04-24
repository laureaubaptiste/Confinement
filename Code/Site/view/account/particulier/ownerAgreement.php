<table>
    <tr>
        <td>Adresse</td>
        <td>Date début</td>
        <td>Date fin</td>
    </tr>
    <?php
        require_once("controller/controller.php");
        $controller = new Controller("localhost", "neigeEtSoleil", "root", "");
        $ownerAgreement = $controller->selectOwnerAgreement($_SESSION['email']);
        foreach ($ownerAgreement as $anOwnerAgreement)
        {
            echo '<tr>';
            echo '<td>' . $anOwnerAgreement['Address'] . '</td>';
            echo '<td>' . $anOwnerAgreement['Start_Date'] . '</td>';
            echo '<td>' . $anOwnerAgreement['End_Date'] . '</td>';
            echo '</tr>';
        }
    ?>
</table>
