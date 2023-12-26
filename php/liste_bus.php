<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../css/liste_bus.css">
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
	echo "<h1>"."Liste des BUS"."</h1>";
	echo "<table border width='80%'>";
	echo "<tr height='50px'>";
	echo "<th>". "Matriculation". "</th>" ;
	echo "<th>". "Nom du chaufeur". "</th>" ;
	echo "<th>". "Nombre de place". "</th>" ;
	echo "<th>". "Numero du parc". "</th>" ;
	echo "<th colspan='2' class='requet'>". "Requete". "</th>"."</tr>" ;
	$sql= "select * from bus ";
	$resultat = mysqli_query($con,$sql);
	if(mysqli_num_rows($resultat)>0){
	while($row=mysqli_fetch_assoc($resultat)){
		echo "<tr>";
		echo"<td>". $row['id_bus']."</td>"; 
		echo "<td>".$row['nom_chaufeur']."</td>";
		echo "<td>".$row['nb_place']."</td>";
		echo "<td>".$row['id_parc']."</td>";
		?>
		<td align="center" class="req1">
					<a href="modifier.php?edit_id=<?php print($row['id_bus']); ?>" >
					<font color ="white">Modifier <?php //echo "<img src='trash.png'>"; ?></font></a>
					</td>
					<td align="center" class="req2">
					<a href="supprimer.php?delete_id=<?php print($row['id_bus']); ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer  ?')">
					<font color ="white">Supprimer <?php //echo "<img src='trash.png'>"; ?></font></a>
					
					</td>
		  <?php
		echo "</tr>";
	}	
		
		
		
	} else 
	{
		echo "<tr>";
		echo "<td colspan='5'>";
	echo  "Aucun enregistrement";
	echo "</td>";
	}
	echo "</table>";
	?>
</div>
</body>
</html>