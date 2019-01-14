<!doctype html>

<html>
<head>
	<meta charset="utf-8">
	<title>LEGO-Databasen</title>
	<link href="Lego.css" media="screen" rel="stylesheet" type="text/css"/>
	
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
<div> <a href="search.php"></a>
</div >

<div id="instruktioner">
	<h2>Såhär funkar sökfunktionen</h2>
		<p>Klicka på sökrutan och skriv in antingen ett namn på en sats (bokstäver)
		eller satsid (siffror). Du behöver inte vara orolig om du inte vet det fulla namnet
		eller id:t, du kan söka på delar av dessa.</p>
		
		<p>När du skrivit in det du vill söka på klickar du på enter på ditt keyboard och sökningen utförs, 
		resultatet kommer komma upp i formen av en tabell som går att skrolla genom. Klicka sedan på den sats
		du vill se innehållet av!</p>
		
		<p>Om du någon gång känner dig borttappad, klicka på "loggan" längst upp på sidan för att komma tillbaka
		till startsidan, eller klicka på sökhjälp för att komma tillbaka till dessa instruktioner.</p>
		
		<p>Vi hoppas att du hittar vad du letar efter, lycka till!</p>
 
</div>






<div id="sidfot">
	
<?php include 'sidfot.php'; ?>
	
</div>
</body>
</html>
