<!doctype html>

<html>
	<!-- includes a file containing header and searchbar -->
  <?php include 'header_search.php'; ?>
	
<div id="tabelldiv">
	<p>Lego är det bästa jag vet.</p>
	<div id="tabellinneholl">
		<h2>Resultattabell</h2>
	<!-- includes file with database question related to parts. returns result -->	
    <?php
		include 'search_parts.php';
		
		?>
	</div>
</div>

<div id="sidfot">	
  <!-- includes a file containing the footer -->	
	<?php include 'sidfot.php'; ?>		
</div>
</body>
</html>
