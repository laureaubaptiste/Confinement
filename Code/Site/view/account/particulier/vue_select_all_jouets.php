<table border = 1>
<tr><td>IDJOUET</td><td>IDENFANT</td><td>NOM</td><td>VALEUR</td></tr>
<?php
    foreach ($lesJouets AS $unJouet)
    {
        echo "<tr>  <td>" . $unJouet['IDJOUET']     . "</td>
                    <td>" . $unJouet['IDENFANT']    . "</td>
                    <td>" . $unJouet['NOM']         . "</td>
                    <td>" . $unJouet['VALEUR']      . "</td>
                    </tr>";
    }
?>
</table>