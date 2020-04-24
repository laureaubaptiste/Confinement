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
        <td>Date début</td>
        <td>Date fin</td>
    </tr>
    <?php
        require_once("controller/controller.php");
        $controller = new Controller("localhost", "neigeEtSoleil", "root", "");
        $customerAgreement = $controller->selectCustomerAgreement($_SESSION['email']);
        foreach ($customerAgreement as $aCustomerAgreement)
        {
            echo '<tr>';
            echo '<td>' . $aCustomerAgreement['Address'] . '</td>';
            echo '<td>' . $aCustomerAgreement['Balcony_Surface'] . '</td>';
            echo '<td>' . $aCustomerAgreement['Capacity'] . '</td>';
            echo '<td>' . $aCustomerAgreement['City'] . '</td>';
            echo '<td>' . $aCustomerAgreement['Exposure'] . '</td>';
            echo '<td>' . $aCustomerAgreement['Living_Space'] . '</td>';
            echo '<td>' . $aCustomerAgreement['Postal_Code'] . '</td>';
            echo '<td>' . $aCustomerAgreement['Track_Distance'] . '</td>';
            echo '<td>' . $aCustomerAgreement['Type'] . '</td>';
            echo '<td>' . $aCustomerAgreement['Start_Date'] . '</td>';
            echo '<td>' . $aCustomerAgreement['End_Date'] . '</td>';
            echo '</tr>';
        }
    ?>
</table>
