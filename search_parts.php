
<?php
	
$offset= $_GET['offset'];
$lim=$_GET['antal'];
$totalt=0;

if($offset<0)
{
	$offset=0;
}
	
if($lim<1 || $lim=="")
{	
		$lim=5;
}	
	
// Anslut til LEGOdatabasen 
 $conn = mysqli_connect("mysql.itn.liu.se","lego","","lego");
 if(mysqli_errno($conn)) {
  die("<p>MySQL error:</p>\n<p>" . mysqli_error($conn) . "</p>\n</body>\n</html>\n");
 }
	
$SetID =  $_GET['set'];
$originalsokning=$SetID;
if($SetID!="")
{	
	$enframot_query= "SELECT inventory.Quantity, inventory.ItemTypeID, inventory.ItemID, inventory.SetID, colors.ColorID,colors.Colorname, parts.Partname, sets.Setname  
			FROM (((parts INNER JOIN inventory ON parts.PartID=inventory.ItemID) 
			INNER JOIN colors ON colors.ColorID=inventory.ColorID) 
			INNER JOIN sets 
			ON sets.SetID=inventory.SetID) 
			WHERE inventory.SetID ='".$SetID."'
			AND inventory.ItemTypeID='P' 
			LIMIT ".($offset+$lim).",1";

	$query= "SELECT inventory.Quantity, inventory.ItemTypeID, inventory.ItemID, inventory.SetID, colors.ColorID,colors.Colorname, parts.Partname, sets.Setname  
			FROM (((parts INNER JOIN inventory ON parts.PartID=inventory.ItemID) 
			INNER JOIN colors ON colors.ColorID=inventory.ColorID) 
			INNER JOIN sets 
			ON sets.SetID=inventory.SetID) 
			WHERE inventory.SetID ='".$SetID."'
			AND inventory.ItemTypeID='P' 
			LIMIT ".$offset.",".$lim;
			
	 
	$contents = mysqli_query($conn, $query);
	$harnesta=mysqli_query($conn, $enframot_query);
	
$harmer=mysqli_num_rows($harnesta);
$totalt=mysqli_num_rows($contents);

	echo "Visar resultat nummer ".$offset." till ".($offset+$totalt).". Har nästa: ".$harmer;

	
	 if($totalt == 0)
	 {
	  print("<p>No parts in inventory for this set.</p>\n");
	 } 
	 
	else
	{
		 
		// Skriver ut tabell 
		  print("<p>Parts in set:</p>");
		  print("<table>\n<tr>");	
		  print("<th>Picture</th>");		  
		  print("<th>Set ID</th>");
		  print("<th>Part Name</th>");
		  print("<th>Quantity</th>");
		  print("<th>Color</th>");
		  print "</tr>\n";
		  
		
		// While funktionen som skriver ut i rätt ordning
		  while($row = mysqli_fetch_array($contents))
		  {
			  
			// Bestäm filnamnet för en bild som är 80x60 pixlar, helst i JPG-format.
			   $prefix = "http://www.itn.liu.se/~stegu76/img.bricklink.com/";
			   $ItemID = $row['ItemID'];
			   $ColorID = $row['ColorID'];
			   $SetID=$row['SetID'];
			   $SetName=$row['Setname'];
			   
			// Fråga databasen för att se vilka filer som finns !
			   $imagesearch = mysqli_query($conn, "SELECT * FROM images WHERE ItemTypeID='P' AND ItemID='$ItemID' AND ColorID=$ColorID");
			  
			// Frågan returnera en rad 
			   $imageinfo = mysqli_fetch_array($imagesearch);  
			   $hasimg=FALSE;
				  
			   if($imageinfo['has_jpg']) { // Använd JPG om den finns
				 $filename = "P/$ColorID/$ItemID.jpg";
				 $hasimg=TRUE;
			   }
			   else if($imageinfo['has_gif'])
			   { // Använd GIF om JPG inte tillgägligt 
				 $hasimg=TRUE;
				 $filename = "P/$ColorID/$ItemID.gif";
			   }
			   else
			   { // Om ingen format finns skriv ut text 
				 $hasimg=FALSE;
				 $filename = "noimage_small.png";
			   }
			  print("<tr>");
			   if($hasimg==TRUE)
				print("<td><img src=\"$prefix$filename\" alt=\"Part $ItemID\"/></td>");
			   else
					print('<td><img src="'.$filename.'" alt="'.$ItemID.'"/></td>');
			   $Colorname = $row['Colorname'];
			   $Partname = $row['Partname'];
			   
			   print("<td><a href='http://www.student.itn.liu.se/~linsv482/projekt/sets.php?set=".$SetID."&offset=0'>".$SetID."</a></td>");
			   print("<td>$Partname</td>");
			   
			  
			   $Quantity = $row['Quantity'];
			   print("<td>$Quantity</td>");
			   
			   print("<td>$Colorname</td>");

			   print("</tr>\n");
		  }
		  print("</table>\n");
	 }
	 
}

$linkprevious="http://www.student.itn.liu.se/~linsv482/projekt/parts.php?set=".$originalsokning."&antal=".$lim."&offset=".($offset-$lim);
$linknext="http://www.student.itn.liu.se/~linsv482/projekt/parts.php?set=".$originalsokning."&antal=".$lim."&offset=".($offset+$lim);
?>


<button onclick="window.location.href = '<?PHP echo $linkprevious; ?>';" <?PHP if($offset<=0 || ($offset-$lim) <0) echo "disabled" ?>>Föregående</button>
<button onclick="window.location.href = '<?PHP echo $linknext; ?>';" <?PHP if($harmer<1) echo "disabled" ?>>Nästa</button>



 <?PHP
// print("<a href='http://www.student.itn.liu.se/~linsv482/projekt/hem.php?set=".$originalsokning."&offset=".($offset-20)."'>Föregående</a>");
 //print("<a href='http://www.student.itn.liu.se/~linsv482/projekt/hem.php?set=".$originalsokning."&offset=".($offset+20)."'>Nästa</a>");
 
//header("Location: hem.php",true,301);
//exit();	
?>
