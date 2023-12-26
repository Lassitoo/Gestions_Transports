<?php 
$id=$_GET['delete_id'];
include "cnx.php";
$sql= "delete  from bus where id_bus='$id' ";
$resultat = mysqli_query($con,$sql);

	
	if($resultat)
	{
		header("Location: liste_bus.php");
	}
	else
	{
		echo "Erreur";
	}

	?>