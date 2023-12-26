<?php

$id=$_GET['edit_id'];
include "cnx.php";
$sql= "select * from bus where id_bus='$id' ";
$resultat = mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($resultat);


if(isset($_POST['btn-save']))
{
	$a = $_POST['id_bus'];
	$b = $_POST['idp'];
	$c = $_POST['nbp'];
	$d = $_POST['nomch'];
	
	$sql= "update  bus set id_bus='$a', id_parc='$b', nb_place='$c', nom_chaufeur='$d' where id_bus='$id'";
	$resultat = mysqli_query($con,$sql);
	if($resultat)
	{
		header("Location: liste_bus.php");
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
<link rel="stylesheet" type="text/css" href="../css/busp.css" />
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
			<label for="num">Numero D'imatriculation</label>
			<input type="text" id="numi" name="id_bus"  value ="<?php print($row['id_bus']); ?>" required>
			<label for="nomch">Nom du chaufeur</label>
			<input type="text" id="nomch" name="nomch"  value ="<?php print($row['nom_chaufeur']); ?>" required>
			<label for="nbp">Nombre de place</label>
			<input type="text" id="ndp" name="nbp"  value ="<?php print($row['nb_place']); ?>" required>
			<label for="idp">Numero du parc</label>
			<input type="text" id="idp" name="idp"  value ="<?php print($row['id_parc']); ?>" required>
			<input type="submit" value="Modifier" name="btn-save">

			<br>
		</form>
	</div>
</div>
</body>
</html>
