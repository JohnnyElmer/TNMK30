<!doctype html>

<html>
<head>
	<meta charset="utf-8">
	<title>LEGO-Databasen</title>
	<link href="Lego.css" media="screen" rel="stylesheet" type="text/css"/>
	<script src="buttons.js"></script>
</head>
<body>
<div id="container">
<a href="hem.php">
	<div id="logo">
		<h1>LEGO-Databasen</h1>
	</div>
</a>
</div>

<div id="searchbar">
	<?php include 'formuler.php'; ?>
</div>
<div id="tabelldiv">
	<p>Lego är det bästa jag vet.</p>
	<div id="tabellinneholl">
		<p>Resultattabell</p>
		<?php
		include 'search.php';
		
		?>
	</div>
</div>

<div id="sidfot">
	
	
	
	<a href ="skaparna.html" style="display:block;">
	<div class="cirkeldiv" >
		<p id="Skaparna"><br>Skaparna</p> 
	</div>
	</a>
	
	<a href="help.html" style="display:block;">
	<div class="cirkeldiv" >
		<p id="Sökhjälp"><br>Sökhjälp</p>
	</div>
	</a>
	
	
	
	
</div>
</body>
</html>
