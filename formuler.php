	<form  method="GET" action="sets.php"> <!-- information gathered is sent to sets.php -->
		
		<!-- the "boxes" for entering your search and results per page -->
		<?PHP echo "<input type='text' name='set' placeholder='Sök efter legosatser...' value='".$_GET['set']."' />"; ?>
		 Antal resultat per sida: <input type="number" name="antal" min="1" value="5"/>
		
		<!-- sets a hidden variable used in search_sets and search_parts  -->
		<input type="hidden" name="offset" value="0"/>
		<input type="submit" value="Submit">
	</form>
