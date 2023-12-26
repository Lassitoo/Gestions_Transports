<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../css/liste_passage.css">
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
echo "<h1>"."Liste des passage"."</h1>";
echo "<table border width='80%'>";
echo "<tr height='50px'>";
echo "<th>". "Matriculation du bus donnee". "</th>" ;
echo "<th>". "Nom station". "</th>" ;
echo "<th>". "Nombre de place du bus". "</th>" ;
echo "<th>". "Nombre de passager rester". "</th>" ;
echo "<th>". "Nombre de passager descendue". "</th>" ;
echo "<th>". "Nombre de passager monte". "</th>" ;
echo "<th class='yes'>". "Nombre de passagers transporte par le bus". "</th>" ;
echo "</tr>" ;
$sql= "SELECT * FROM `liaison_passage`";
$resultat = mysqli_query($con,$sql);
if(mysqli_num_rows($resultat)>0){
while($row=mysqli_fetch_assoc($resultat)){
	
	$a=$row['nb_monte'];
	$b=$row['nb_reste'];
	$c=($a)+($b);
	
	echo "<tr>";
	echo"<td>". $row['id_bus']."</td>"; 
	echo "<td class='oui'>".$row['id_station']."</td>";
	echo "<td>".$row['nb_place']."</td>";
	echo "<td>".$row['nb_reste']."</td>";
	echo "<td>".$row['nb_descend']."</td>";
	echo "<td>".$row['nb_monte']."</td>";
	echo "<td class='yes'>".$c."</td>";
	?>
	
<?php
	echo "</tr>";
}	
	
	
	
} 
else 
{
	echo "<tr>";
	echo "<td colspan='7'>";
	echo  "Aucun enregistrement";
	echo "</td>";
}
echo "</table>";
?>
</div>
</body>
</html>