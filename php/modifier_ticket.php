<?php

$id=$_GET['edit_id'];
include "cnx.php";
$sql= "select * from tickets where id_tickets='$id' ";
$resultat = mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($resultat);


if(isset($_POST['btn-save']))
{
	$a = $_POST['id_tickets'];
	$b = $_POST['id_carnet'];
	$c = $_POST['etat'];
	$d = $_POST['prix'];
	
	$sql= "update  tickets set id_tickets='$a', id_carnet='$b', etat='$c', prix='$d' where id_tickets='$id'";
	$resultat = mysqli_query($con,$sql);
	if($resultat)
	{
		header("Location: liste_ticket.php");
	}
	else
	{
		echo "Erreur";
		
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>bus</title>
<link rel="stylesheet" type="text/css" href="../css/ticket.css" />
<meta charset="UTF-8" >
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
				<li><a href="cher_revenue.html">Revenue</a></li>
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
	<div class="cont">
		<h3>Modifier un bus</h3>
		<form method="post"  >
			<label for="numt">Numero du ticket</label>
			<input type="text" id="numt" name="id_tickets"  value ="<?php print($row['id_tickets']); ?>" required readonly>
			<label for="numc">Numero du carnet</label>
			<input type="text" id="numc" name="id_carnet"  value ="<?php print($row['id_carnet']); ?>" required readonly>
			<label for="eta">Etat</label>
			<select id="eta" name="etat" >
			<option value="disponible">Disponible</option>
			<option value="vendue">Vendue</option>
			</select>
			<label for="prx">Prix</label>
			<input type="text" id="prx" name="prix"  value ="<?php print($row['prix']); ?>" required readonly>
			<input type="submit" value="Modifier" name="btn-save">

			<br>
		</form>
	</div>
</div>
</body>
</html>
