<?php


$menu = mysql_query('SELECT menu_id, menu_nazov, menu_url, menu_rodic_id
                        FROM menu
                        WHERE menu_rodic_id = 0
                        ORDER BY menu_id ASC');


?>


<div id="nav">
    <ul>
<?php
if (mysql_num_rows($menu) != '0') {
    while ($riadok = mysql_fetch_array($menu)) {

        ?>



    <li><a href="<?php echo $urlStranka . htmlspecialchars('menu.php?menu=' . $riadok['menu_url']); ?>"><?php echo htmlspecialchars($riadok['menu_nazov']); ?></a>

<?php
    $id_rodica = $riadok['menu_id'];
    $rodina = mysql_query('SELECT menu_id, menu_nazov, menu_url, menu_rodic_id
                    FROM menu
                    WHERE menu_rodic_id ="' . mysql_real_escape_string($id_rodica) . '"
                     ORDER BY menu_id ASC');
if (mysql_num_rows($rodina) != '0') {
                ?>
                <ul>
                <?php
    while ($rod = mysql_fetch_array($rodina)) {
        ?>

                    <li><a href="<?php echo $urlStranka . htmlspecialchars('menu.php?menu=' . $riadok['menu_url'] . '/' . $rod['menu_url']); ?>"><?php echo htmlspecialchars($rod['menu_nazov']); ?></a></li>



        <?php
    }
    mysql_free_result($rodina);
    ?>
                    </ul>
    </li>
    <?php
}

    }
    mysql_free_result($menu);
}
else {
    ?>
    <li><a href="#">Este nemate vytvorene menu</a>

    </li>
    <?php
}

?>

</ul>
</div>
