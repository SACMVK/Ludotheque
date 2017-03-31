<table>
    <tr>
        <td>nom cle</td>
        <td>nom valeur</td>
    </tr>
    <?php if (!empty($array)) : ?>
        <?php foreach ($array as $key => $value) : ?> 
            <tr>
                <td>
                    <?= $key ?>
                </td>
                <td>
                    <?= $value ?>
                </td> 
            </tr>
        <?php endforeach; ?> 
    <?php else : ?>
        <tr><td>Aucun résultat</td></tr>';
    <?php endif; ?>
</table>



