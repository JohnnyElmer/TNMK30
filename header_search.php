<head>
	<meta charset="utf-8">
	<title>LEGO-Databasen</title>
	<link href="Lego.css" media="screen" rel="stylesheet" type="text/css"/>
	<script src="script.js"></script>
</head>

<!-- onload starts as soon as webpage opens, connects to script.js -->
<body onload="showSlides()"> 
<div id="container"> <!-- contains header and home button -->
<a href="index.php">
	<div id="logo">
		<h1>LEGO-Databasen</h1>
	</div>
</a>
</div>

<div id="searchbar"> <!-- includes file that has the searchbar-->
	<?php include 'formuler.php'; ?>
</div>
