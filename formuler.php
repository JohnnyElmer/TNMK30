	<form  method="GET" action="sets.php">
		<?PHP echo "<input type='text' name='set' placeholder='Sök efter legosatser...' value='".$_GET['set']."' />"; ?>
		 Antal resultat per sida: <input type="number" name="antal" min="1" value="5"/>
		<input type="hidden" name="offset" value="0"/>
		<input type="submit" value="Submit">
	</form>
