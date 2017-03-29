<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Ludothèque</title>
    </head>


    <body>
        <?php
        $array = array(
            "foo" => "bar",
            "bar" => "foo",
        );
        ?>



        <table>
            <tr>
                <td>nom cle</td>
                <td>nom valeur</td>
            </tr>
            <?php
            foreach ($array as $key => $value) {
                include '_old/tr.php';
            }
            ?>


        </table>

    </body>
</html>

