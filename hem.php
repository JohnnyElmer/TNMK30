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
	<form action="search.php"  method="GET">
		<input type="text" name="set" placeholder="Sök efter legosatser..."/>
		<input type="hidden" value="0" name="offset"/>
	</form>
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
	
	
	<div class="cirkeldiv" >
	<a href ="skaparna.html">
		<p id="Skaparna"><br>Skaparna</p> 
	</a>
	</div>
	
	
	
	<div class="cirkeldiv" >
	<a href="help.html">
		<p id="Sökhjälp"><br>Sökhjälp</p>
	</a>
	</div>
	
	
</div>
</body>
</html>
