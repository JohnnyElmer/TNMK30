<!doctype html>
<html>
<?php
// Anslut til LEGOdatabasen 
 $conn = mysqli_connect("mysql.itn.liu.se","lego","","lego");
 if(mysqli_errno($conn)) {
  die("<p>MySQL error:</p>\n<p>" . mysqli_error($conn) . "</p>\n</body>\n</html>\n");
 }
	
$SetID =  $_GET['set'];
	
 // Fråga efter delarna hämtar ut dem
 $contents = mysqli_query($conn, "SELECT inventory.Quantity, inventory.ItemTypeID, inventory.ItemID,
 				inventory.ColorID, colors.Colorname, parts.Partname, sets.Setname, 
				FROM inventory, parts, colors 
				WHERE inventory.SetID='$SetID'
				OR sets.Setname= '$SetID'
				AND inventory.ItemTypeID='P' 
				AND inventory.ItemID=parts.PartID 
				AND inventory.ColorID=colors.ColorID");
	
 if(mysqli_num_rows($contents) == 0) {
  print("<p>No parts in inventory for this set.</p>\n");
 } 
else {
 
// Skriver ut tabell 
  print("<p>Parts in set:</p>");
  print("<table>\n<tr>");
  print("<th>Quantity</th>");
  print("<th>File name</th>");
  print("<th>Picture</th>");
  print("<th>Color</th>");
  print("<th>Part name</th>");
  print "</tr>\n";
  
// While funktionen som skriver ut i rätt ordning
  while($row = mysqli_fetch_array($contents)) {
   print("<tr>");
   $Quantity = $row['Quantity'];
   print("<td>$Quantity</td>");
  
// Bestäm filnamnet för en bild som är 80x60 pixlar, helst i JPG-format.
   $prefix = "http://www.itn.liu.se/~stegu76/img.bricklink.com/";
   $ItemID = $row['ItemID'];
   $ColorID = $row['ColorID'];
   
// Fråga databasen för att se vilka filer som finns !
   $imagesearch = mysqli_query($conn, "SELECT * FROM images WHERE ItemTypeID='P' AND ItemID='$ItemID' AND ColorID=$ColorID");
  
// Frågan returnera en rad 
   $imageinfo = mysqli_fetch_array($imagesearch);
  
   if($imageinfo['has_jpg']) { // Använd JPG om den finns
	 $filename = "P/$ColorID/$ItemID.jpg";
   } else if($imageinfo['has_gif']) { // Använd GIF om JPG inte tillgägligt 
	 $filename = "P/$ColorID/$ItemID.gif";
   } else { // Om ingen format finns skriv ut text 
	 $filename = "noimage_small.png";
   }
  
   print("<td>$filename</td>");
   print("<td><img src=\"$prefix$filename\" alt=\"Part $ItemID\"/></td>");
   $Colorname = $row['Colorname'];
   $Partname = $row['Partname'];
   print("<td>$Colorname</td>");
   print("<td>$Partname</td>");
   print("</tr>\n");
  }
  print("</table>\n");
 }

?>
  </html>
