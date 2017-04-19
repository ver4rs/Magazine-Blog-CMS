<?php

#NACITANIE SEKCIE A KATEGORIE

if ($_SERVER['PHP_SELF'] == '/admin/spravaClanok/zmenClanok.php') {
	header('Location: ../../prihlas.php');
	exit();
}


function zmenClanok() {

$upravUrl = $_GET['uprav']; //menu_url


# OVERENIE Ci NEKLAME , URL ZADA SAM
$clanokOverenie = mysql_query('SELECT clanok_id, clanok_url, uzivatel_id FROM clanky WHERE uzivatel_id="' . mysql_real_escape_string($_SESSION['user_id']) . '" AND clanok_url ="' . mysql_real_escape_string($upravUrl) . '" ');

if (mysql_num_rows($clanokOverenie) == '0') {
	# NAPISAL HO DO URL, SKUSA PODRAZ
	if (is_numeric($_SESSION['level_id']) AND $_SESSION['level_id'] < 3) { //editacia vlastnych clankov
		$error = 'To nieje váš článok';
		header('Location: spravaClanok.php&error=' . $error);
		exit();
	}
}
mysql_free_result($clanokOverenie);


# NACITANIE UDAJOV JEDNEHO CLANKU A ZOBRAZENIE DO FORMY
$clanok1 = mysql_query('SELECT clanok_id ,clanok_date, clanok_url, clanok_text, clanok_obrazok, clanok_titul, clanok_pocet, clanok_paci, clanok_nepaci, c.clanok_perex, m.menu_rodic_id, m.menu_nazov , c.uzivatel_id, u.user_id, u.meno, m.menu_url, meno_url, m.menu_id, c.menu_id
            FROM clanky c JOIN user u ON c.uzivatel_id = u.user_id
                        JOIN menu m ON c.menu_id = m.menu_id
                    WHERE clanok_url = "' . mysql_real_escape_string($upravUrl) . '"
                    ORDER BY clanok_date DESC ');

if (mysql_num_rows($clanok1) != '0') {
	$clanok = mysql_fetch_array($clanok1);

		# SEKCIA KU CLANKU
		$sekciaClanokZisti = mysql_query('SELECT menu_id, menu_nazov, menu_rodic_id FROM menu
										WHERE menu_id ="' . mysql_real_escape_string($clanok['menu_rodic_id']) . '" ');
		$sekciaClanok = mysql_fetch_array($sekciaClanokZisti);
		mysql_free_result($sekciaClanokZisti);

	//***************************************************************

	/*     zobrazenie     sekcie     */
	$zobrazSekcia = mysql_query('SELECT menu_id, menu_nazov FROM menu
								WHERE menu_rodic_id =0
								ORDER BY menu_id DESC ');

	/*        zobrazenie uzivatelov                */
	if (is_numeric($_SESSION['level_id']) AND $_SESSION['level_id'] == 4) {
		$zobrazUzivatel = mysql_query('SELECT user_id, meno FROM user ORDER BY meno ASC');
	}
	/*                  koniec uzivatel                  */
	?>


	<!--  upload obrazok   -->
	<script type="text/javascript" src="js/uploadImage/jquery.min.js"></script>
	<script type="text/javascript" src="js/uploadImage/jquery.form.js"></script>

	<script type="text/javascript" >
	 $(document).ready(function() {

	            $('#obrazokUloz').live('change', function()			{
				           $("#preview").html('');
				    $("#preview").html('<img src="js/uploadImage/loader.gif" alt="Uploading...."/>');
				$("#imageform").ajaxForm({
							target: '#preview'
			}).submit();

				});
	        });
	</script>
	<!--  koniec upload obrazok   -->


	<div class="form">
		<h3 id="formtitul">Zmena článku</h3>
		<?php
			if (isset($_GET['error'])) {
				echo '<p id="formerror">' . $_GET['error'] . '</p>';
			}
			else {

			}
		?>
		<form id="imageform" method="post" enctype="multipart/form-data" action='admin/spravaClanok/novyObrazok.php'>
			<table>
				<tr>
					<td>
						<label for="upAva">Avatar upload:</label>
			 			<input type="file" name="obrazokUloz" id="obrazokUloz" />
			 			<p style="color: red; font-style: 10px;">Pokial nevyberiete obrázok tak zostane predošli.</br>Davajte POZOR!</p>
					</td>
		</form>
					<td>
						<div id='preview' style="float:right;">
						</div>
					</td>
				</tr>
			</table>

		<!--   POZZOR   -->

		<form action="admin/spravaClanok/clanokForm.php" enctype="multipart/form-data" method="post">
			<table>
				<tr>
					<td>Nadpis článku:</td>
					<td><input type="text" name="clanok_titul" id="clanok_titul" value="<?php echo htmlspecialchars($clanok['clanok_titul']); ?>" onkeypress="return imposeMaxLength(event, this, 66);" maxlength="66" style="width: 300px"></td>
				</tr>
				<tr>
					<td>Popis článku:</td>
					<td><textarea name="clanok_perex" rows="10" cols="50" onkeypress="return imposeMaxLength(event, this, 255);"><?php echo htmlspecialchars($clanok['clanok_perex']); ?></textarea></td>
				</tr>
				<?php
					if (is_numeric($_SESSION['level_id']) AND $_SESSION['level_id'] == 4) {
				?>
				<tr>
					<td>Pridal:</td>
					<td>
						<select name="uzivatel" id="uzivatel" multiple="multiple" cols="30" rows="5">
						<?php

							if (mysql_num_rows($zobrazUzivatel) != FALSE) {
								while ($riadok_uziv = mysql_fetch_array($zobrazUzivatel)) {
						?>
							<option
						<?php
									if ($riadok_uziv['user_id'] == $clanok['uzivatel_id']) {
										echo ' selected="selected" ';
									}
						?>
						 	value="<?php echo $riadok_uziv['user_id']; ?>"><?php echo $riadok_uziv['meno']; ?></option>
						<?php
								}
							}
							mysql_free_result($zobrazUzivatel);
						?>
						</select>
					</td>
				</tr>
				<?php
					}
				?>
				<tr>
					<td>Menu: </td>
					<td>
						<select name="sekcia" id="sekcia" multiple="multiple" cols="100" rows="7">
					<?php
					if (mysql_num_rows($zobrazSekcia) != FALSE) {
						while ($riadok1 = mysql_fetch_array($zobrazSekcia)) {

					?>
						<option value="0" disabled="disabled"><?php echo $riadok1['menu_nazov']; ?></option>


					<?php
							$prik = 'SELECT menu_id, menu_nazov, menu_rodic_id
									FROM menu
									WHERE menu_rodic_id ="' . mysql_real_escape_string($riadok1['menu_id']) . '"
									ORDER BY menu_nazov ASC';
							$prik1 = mysql_query($prik)or die(mysql_error());

							if (mysql_num_rows($prik1) != FALSE) {
								while ($riadok = mysql_fetch_array($prik1)) {
					?>
							<option
					<?php
									if ($riadok['menu_id'] == $clanok['menu_id']) {
										echo ' selected="selected"';
									}
					?>
						 value="<?php echo $riadok['menu_id']; ?>"><?php echo $riadok['menu_nazov']; ?></option>
					<?php
								}
							}
						}
					}

					?>


						</select>
						<?php
							mysql_free_result($zobrazSekcia);
							mysql_free_result($prik1);
						?>
					</td>
				</tr>
				<?php
					if (is_numeric($_SESSION['level_id']) AND $_SESSION['level_id'] > 2) {

						$clanokDatum = substr(str_replace(' ', 'T', htmlspecialchars($clanok['clanok_date'])), 0, -(strlen(str_replace(' ', 'T', htmlspecialchars($clanok['clanok_date'])) - strrpos($clanokDatum, ':'))-1));

				?>
				<tr>
					<td>Dátum:</td>
					<td><input type="datetime-local" name="datumvybraty" value="<?php echo $clanokDatum; ?>"></td>
				</tr>
				<?php
					}
				?>
				<tr>

				<tr>
					<td>Text:</td>
					<td>
<?php

include('admin/komponenty/ckeditor/ckeditor/ckeditor.php');

// Create class instance.
$CKEditor = new CKEditor();

// Do not print the code directly to the browser, return it instead
$CKEditor->returnOutput = false;

// Path to CKEditor directory, ideally instead of relative dir, use an absolute path:
//   $CKEditor->basePath = '/ckeditor/'
// If not set, CKEditor will try to detect the correct path.
$CKEditor->basePath = 'admin/komponenty/ckeditor/ckeditor/';

// Set global configuration (will be used by all instances of CKEditor).
$CKEditor->config['width'] = 570;

// Change default textarea attributes
$CKEditor->textareaAttributes = array("cols" => 120, "rows" => 40);

// The initial value to be displayed in the editor.
$initialValue = '<p>Napiste nieco</p>';
if(strlen($clanok['clanok_text']) > 0){
    $initialValue = $clanok['clanok_text'];
}
// Create first instance.
$code = $CKEditor->editor("content", $initialValue);
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo $code;
?>
					</td>
				</td>
				<tr>
					<td> </td>
					<td><input type="submit" id="register"  name="odoslizmenclanok" value="Uložiť zmeny"/></td>
					<input type="hidden" name="clanok_url" value="<?php echo $clanok['clanok_url']; ?>">
					<input type="hidden" name="clanok_id" value="<?php echo $clanok['clanok_id']; ?>">
					<input type="hidden" name="clanok_datum" value="<?php echo $clanok['clanok_date']; ?>">
					<input type="hidden" name="clanok_obrazok" value="<?php echo $clanok['clanok_obrazok']; ?>">
					<input type="hidden" name="user_idStary" value="<?php echo $clanok['uzivatel_id']; ?>">
				</tr>
			</table>
		</form>
	</div>
	<?php

}
mysql_free_result($clanok1);



}



?>
