<table border = 1>
<tr><td>IDJEU</td><td>IDENFANT</td><td>NOM</td><td>VALEUR</td></tr>
<?php
    foreach ($lesJeux AS $unJeu)
    {
        echo "<tr>  <td>" . $unJeu['IDJEU']   . "</td>
                    <td>" . $unJeu['IDENFANT']  . "</td>
                    <td>" . $unJeu['NOM']       . "</td>
                    <td>" . $unJeu['VALEUR']    . "</td>
                    </tr>";
    }
?>
</table>