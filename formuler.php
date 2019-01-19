<!-- information gathered is sent to sets.php, with the information being visible in the generated link -->	
<form  method="GET" action="sets.php"> 
		
		<!-- the "boxes" for entering your search and results per page -->
		<!-- $_GET['set'] "saves" what the user just searched for,
				in case they want to adjust the number of results shown per page -->
		<?PHP echo "<input type='text' name='set' placeholder='Sök efter legosatser...' value='".$_GET['set']."' />"; ?>
		 Antal resultat per sida: <input type="number" name="antal" min="1" value="5"/>
		
		<!-- sets a hidden variable used in search_sets and search_parts, the value is shown in the generated link 
			and is changed when browsing between result pages  -->
		<input type="hidden" name="offset" value="0"/>
		<input type="submit" value="Submit">
	</form>
