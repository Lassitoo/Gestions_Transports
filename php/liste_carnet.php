<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../css/liste_carnet.css">
</head>

<body>

<div class="menu">
	<div class="p1">
		Gestion de transport..
	</div>
	<ul>
		<li class="mo"><a class="ac" href="../html/acceuil.html">Acceuil</a></li>
		<li><a>Park</a>
			<ul>
				<li><a href="../html/cher_park.html">Recuperer</a></li>				
				<li><a href="../html/index_park.html">Ajouter</a></li>
			</ul></li>
		<li><a>Bus</a>
			<ul>
				<li><a href="../html/cher_bus.html">Recuperer</a></li>				
				<li><a href="../php/liste_bus.php">Lister</a></li>
				<li><a href="../html/index_bus.html">Ajouter</a></li>
				<li><a href="../html/cher_revenue.html">Revenue</a></li>
			</ul></li>		
		<li><a>Carnet</a>
			<ul>
				<li><a href="../php/liste_carnet.php">Lister</a></li>
				<li><a href="../html/index_carnet.html">Ajouter</a></li>
			</ul></li>			
		<li><a>Ticket</a>
			<ul>
				<li><a href="../php/liste_ticket.php">Lister</a></li>
				<li><a href="../html/index_ticket.html">Ajouter</a></li>
			</ul></li>
		<li><a>Passage</a>
			<ul>
				<li><a href="../php/liste_passage.php">Lister</a></li>
				<li><a href="../html/index_passage.html">Ajouter</a></li>
			</ul></li>
	</ul>
</div>

<div class="beb">
<?php
include "cnx.php";

//Affichage de données
echo "<h1>"."Liste des carnets"."</h1>";
echo "<table border width='80%'>";
echo "<tr height='50px'>";
echo "<th>". "Numero du carnet". "</th>" ;
echo "<th>". "Numero de matricule du bus". "</th>" ;
echo "</tr>";
$sql= "SELECT * FROM `carnet_ticket`";
$resultat = mysqli_query($con,$sql);
if(mysqli_num_rows($resultat)>0){
while($row=mysqli_fetch_assoc($resultat)){
	echo "<tr>";
	echo"<td>". $row['id_carnet']."</td>"; 
	echo "<td>".$row['id_bus']."</td>";
	
	?>
<?php
	echo "</tr>";
}	
	
	
	
} else 
{
	echo "<tr>";
	echo "<td colspan='2'>";
echo  "Aucun enregistrement";
echo "</td>";
}
echo "</table>";
?>
</div>
</body>
</html>