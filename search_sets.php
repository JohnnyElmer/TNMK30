
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
	$enframot_query= "SELECT sets.Setname, sets.SetID FROM sets
			WHERE (sets.SetID LIKE '%".$SetID."%' OR sets.Setname LIKE '%".$SetID."%')
			LIMIT ".($offset+$lim).",1";

	$query= "SELECT sets.Setname, sets.SetID from sets
			WHERE (sets.SetID LIKE '%".$SetID."%' OR sets.Setname LIKE '%".$SetID."%')
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

			   $SetID=$row['SetID'];
			   $SetName=$row['Setname'];
			   
			   print("<td><a href='http://www.student.itn.liu.se/~linsv482/projekt/parts.php?set=".$SetID."&offset=0'>".$SetID."</a></td>");
			   print("<td><a href='http://www.student.itn.liu.se/~linsv482/projekt/parts.php?set=".$SetID."&offset=0'>".$SetName."</a></td>");
			   print("</tr>\n");
		  }
		  print("</table>\n");
	 }
	 
}

$linkprevious="http://www.student.itn.liu.se/~linsv482/projekt/sets.php?set=".$originalsokning."&antal=".$lim."&offset=".($offset-$lim);
$linknext="http://www.student.itn.liu.se/~linsv482/projekt/sets.php?set=".$originalsokning."&antal=".$lim."&offset=".($offset+$lim);
?>


<button onclick="window.location.href = '<?PHP echo $linkprevious; ?>';" <?PHP if($offset<=0 || ($offset-$lim) <0) echo "disabled" ?>>Föregående</button>
<button onclick="window.location.href = '<?PHP echo $linknext; ?>';" <?PHP if($harmer<1) echo "disabled" ?>>Nästa</button>



 <?PHP
// print("<a href='http://www.student.itn.liu.se/~linsv482/projekt/hem.php?set=".$originalsokning."&offset=".($offset-20)."'>Föregående</a>");
 //print("<a href='http://www.student.itn.liu.se/~linsv482/projekt/hem.php?set=".$originalsokning."&offset=".($offset+20)."'>Nästa</a>");
 
//header("Location: index.php",true,301);
//exit();	
?>
