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
<a href="hem.html">
	<div id="logo">
		<h1>LEGO-Databasen</h1>
	</div>
</a>
</div>

<div id="searchbar">
	<form  method="GET">
		<input type="text" name="set" placeholder="Sök efter legosatser..."/>
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
	
	
	<div class="cirkeldiv" onclick="skaparna()">
		<p id="Skaparna"><br>Skaparna</p> 
	</div>
	
	
	
	<div class="cirkeldiv" onclick="sökhjälp()">
		<p id="Sökhjälp"><br>Sökhjälp</p>
	</div>
	
	
</div>
</body>
</html>
