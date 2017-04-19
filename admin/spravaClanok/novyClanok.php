<?php

# CLANOK NOVA VYTVORENIE

if ($_SERVER['PHP_SELF'] == '/admin/spravaClanok/novyClanok.php') {
	header('Location: ../../prihlas.php');
	exit();
}


function novyClanok() {


if ($_GET['nova'] == 'clanok') {
	# CLANOK




	#ZOBRAZENIE SEKCIE
	$zobrazSekcia = mysql_query('SELECT menu_id, menu_nazov FROM menu
								WHERE menu_rodic_id =0
								ORDER BY menu_id DESC ');

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
		<h3 id="formtitul">Napísať článok</h3>
		<?php    // napisanie chyby alebo naopak
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
					</td>
		</form>
					<td>
						<div id='preview' style="float:right;">
						</div>
					</td>
				</tr>
			</table>

		<!--  POZOR  -->

		<form action="admin/spravaClanok/clanokForm.php" enctype="multipart/form-data" method="post">
			<table>
				<tr>
					<td>Nadpis článku: </td>
					<td><input type="text" name="clanok_titul" id="clanok_titul" onkeypress="return imposeMaxLength(event, this, 66);" style="width: 300px"  maxlength="66" cols="150"></td>
				</tr>
				<tr>
					<td>Popis článku: </td>
					<td><textarea name="clanok_perex"  rows="5" cols="50" onkeypress="return imposeMaxLength(event, this, 240);"></textarea></td>
				</tr>
				<tr>
					<td>Menu: </td>
					<td>
						<select name="sekcia" id="sekcia" multiple="multiple" cols="100" rows="20">
					<?php
					if (mysql_num_rows($zobrazSekcia) != FALSE) {
						while ($riadok = mysql_fetch_array($zobrazSekcia)) {

					?>
						<option value="0" disabled="disabled" ><?php echo $riadok['menu_nazov']; ?></option>


					<?php
							$prik = 'SELECT menu_id, menu_nazov, menu_rodic_id
									FROM menu
									WHERE menu_rodic_id ="' . mysql_real_escape_string($riadok['menu_id']) . '"
									ORDER BY menu_nazov ASC';
							$prik1 = mysql_query($prik)or die(mysql_error());

							if (mysql_num_rows($prik1) != FALSE) {
								while ($riadok1 = mysql_fetch_array($prik1)) {
					?>
						<option  value="<?php echo $riadok1['menu_id']; ?>"><?php echo $riadok1['menu_nazov']; ?></option>
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
				?>
				<tr>
					<td>Dátum:</td>
					<td><input type="datetime-local" name="damumvybraty"></td>
				</tr>
				<?php
					}
				?>
				<tr>
					<td>Text: </td>
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

//$initialValue = '<p>Napiste nieco</p>';

/*
if(strlen($content2) > 0){
    $initialValue = $content2;
}
*/
// Create first instance.
$code = $CKEditor->editor("content", $initialValue);
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo $code;
?>
					</td>
				</tr>
				<tr>
					<td> </td>
					<td><input type="submit" id="napisclanok" value="Uložiť článok" name="odoslinovyclanok"/></td>
					<input type="hidden" name="uzivatel_id" value="<?php echo $_SESSION['user_id']; ?>">

				</tr>
			</table>
		</form>
	</div>
	<?php



}
else {
	# NEVYBRAL MOZNOST, KLAME
	header('Location: spravaClanok.php');
	exit();
}


}


?>
