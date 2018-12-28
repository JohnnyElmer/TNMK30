
<?php
	
// Anslut til LEGOdatabasen 
 $conn = mysqli_connect("mysql.itn.liu.se","lego","","lego");
 if(mysqli_errno($conn)) {
  die("<p>MySQL error:</p>\n<p>" . mysqli_error($conn) . "</p>\n</body>\n</html>\n");
 }
	
$SetID =  $_GET['set'];
if($SetID!="")
{
	$query= "SELECT inventory.Quantity, inventory.ItemTypeID, inventory.ItemID, inventory.SetID, colors.ColorID,colors.Colorname, parts.Partname, sets.Setname 
			FROM (((parts INNER JOIN inventory ON parts.PartID=inventory.ItemID) 
			INNER JOIN colors ON colors.ColorID=inventory.ColorID) 
			INNER JOIN sets 
			ON sets.SetID=inventory.SetID) 
			WHERE (inventory.SetID LIKE '%".$SetID."%' OR sets.Setname LIKE '%".$SetID."%') 
			AND inventory.ItemTypeID='P' 
			LIMIT 20";
	 
	 $contents = mysqli_query($conn, $query);
		
	echo "antal rader ".mysqli_num_rows($contents);
	 if(mysqli_num_rows($contents) == 0)
	 {
	  print("<p>No parts in inventory for this set.</p>\n");
	 } 
	 
	else
	{
		 
		// Skriver ut tabell 
		  print("<p>Parts in set:</p>");
		  print("<table>\n<tr>");
		  print("<th>Quantity</th>");
		  print("<th>File name</th>");
		  print("<th>Picture</th>");
		  print("<th>Color</th>");
		  print("<th>Set ID</th>");
		  print("<th>Set Name</th>");
		  print "</tr>\n";
		  
		// While funktionen som skriver ut i rätt ordning
		  while($row = mysqli_fetch_array($contents))
		  {
			   print("<tr>");
			   $Quantity = $row['Quantity'];
			   print("<td>$Quantity</td>");
			  
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
			  
			   print("<td>$filename</td>");
			   if($hasimg==TRUE)
				print("<td><img src=\"$prefix$filename\" alt=\"Part $ItemID\"/></td>");
			   else
					print('<td><img src="'.$filename.'" alt="'.$ItemID.'"/></td>');
			   $Colorname = $row['Colorname'];
			   $Partname = $row['Partname'];
			   print("<td>$Colorname</td>");
			   print("<td><a href='http://www.student.itn.liu.se/~linsv482/projekt/hem.php?set=".$SetID."'>".$SetID."</a></td>");
			   print("<td>$SetName</td>");
			   print("</tr>\n");
		  }
		  print("</table>\n");
	 }
	 
}
 
 
 
 
 
//header("Location: hem.php",true,301);
//exit();	
?>
