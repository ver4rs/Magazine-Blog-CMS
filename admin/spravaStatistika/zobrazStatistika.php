<?php

# UKAZANIE VSETKYCH CLANKOV,  UZIVATELOV KTORY NAPISALI CLANKY

# POCET VYSLEDKOV
if (is_numeric($_SESSION['level_id']) AND $_SESSION['level_id'] == 4) {


	# STATISTIKA ONLINE
?>
<div class="form">
	<h3>Štatistika</h3>
<?php

# ONLINE UZIVATELIA
	$poradie = 0;
	$typ1 = 1; //online uzivatel
	$typ2 = 2; // online host
	$online = mysql_query('SELECT o.online_id, online_ip, online_cas, o.user_id, online_vyber, u.user_id, u.meno, u.email
							FROM online o JOIN user u ON o.user_id = u.user_id
							WHERE online_vyber ="' . mysql_real_escape_string($typ1) . '"
							ORDER BY online_cas DESC');

	if (mysql_num_rows($online) != '0') {
		?>
			<table cellspacing="0">
				<tr><th>Online uživatelia</th></tr>
			   	<tr><th>Poradie</th><th>Meno</th><th>Email</th><th>ip adresa</th><th>čas</th></tr>
		<?php
		while ($riadok = mysql_fetch_assoc($online)) {
			extract($riadok);

			$poradie = $poradie +1;
			$clanok_date = $online_cas;
			require 'admin/komponenty/datum_a_cas/datumCas.php';

			?>
				<tr>
					<td><?php echo htmlspecialchars($poradie); ?></td>
					<td><?php echo htmlspecialchars($meno); ?></td>
					<td><?php echo htmlspecialchars($email); ?></td>
					<td><?php echo htmlspecialchars($online_ip); ?></td>
					<td><?php echo htmlspecialchars($datum_den . '.' . $datum_mesiac . '.' . $datum_rok . '        ' . $cas_hodina . ':' . $cas_minuta . ':' . $cas_sekunda); ?></td>
				</tr>
			<?php
		}

			?>
			</table>
			</br>
		<?php

	}
	else {
		?>
		<h3>Online nikto</h3>
		<?php
	}
	mysql_free_result($online);



	#****************************************************************************************************



	$poradie = 0;
	$typ1 = 1; //online uzivatel
	$typ2 = 2; // online host
	$online = mysql_query('SELECT online_id, online_ip, online_cas, user_id, online_vyber
							FROM online
							WHERE online_vyber ="' . mysql_real_escape_string($typ2) . '"
							ORDER BY online_cas DESC LIMIT 0,100');

	if (mysql_num_rows($online) != '0') {
		?>
			<table cellspacing="0">
				<tr><th>Online hostia</th></tr>
			   	<tr><th>Poradie</th><th>ip adresa</th><th>čas</th></tr>
		<?php
		while ($riadok = mysql_fetch_assoc($online)) {

			extract($riadok);
			$poradie = $poradie +1;
			$clanok_date = $online_cas;
			require 'admin/komponenty/datum_a_cas/datumCas.php';

			?>

			    <tr>
			    	<td><?php echo htmlspecialchars($poradie); ?></td>
			    	<td><?php echo htmlspecialchars($online_ip); ?></td>
			    	<td><?php echo htmlspecialchars($datum_den . '.' . $datum_mesiac . '.' . $datum_rok . '      ' . $cas_hodina . ':' . $cas_minuta . ':' . $cas_sekunda); ?></td>
			    </tr>


			<?php

		}
		?>
			</table>

		<?php
	}
	else {
		?>
		<h3>Nikto nieje online</h3>
		<?php
	}
	mysql_free_result($online);




	?>
	</div>

	<?php

}


?>
