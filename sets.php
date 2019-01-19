<!doctype html>

<html>
	<!-- includes a file containing header and searchbar -->
	<?php include 'header_search.php'; ?>
	
<div id="tabelldiv"> <!-- div to hold a table -->
	
	<div id="tabellinneholl"> <!-- link for css -->
		<h2>Resultattabell</h2>
		<!-- includes a file that sends a question to the lego-database and creates a table with the answer -->
		<?php
		include 'search_sets.php';
		?>
	</div>
</div>

<div id="sidfot">
	<!-- includes a file containing the footer -->
	<?PHP include 'sidfot.php'; ?>		
</div>
</body>
</html>
