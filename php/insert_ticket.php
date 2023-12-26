
<?php
//la connexion avec la base de données

$con=mysqli_connect("localhost","root","","gestion_park_de_bus");
if(!$con){die("Erreur de type: " .mysqli_connect_error()); }
else "OK";



//Récupération de données

$id_tickets=$_POST['id_tickets'];
$id_carnet=$_POST['id_carnet'];
$etat=$_POST['etat'];
$prix=$_POST['prix'];

$sql1= "SELECT * FROM `carnet_ticket` WHERE `id_carnet`='$id_carnet'";
$resultat= mysqli_query($con,$sql1);
if(mysqli_num_rows($resultat)>0)
{
	//Insertion de données dans la BD

	$sql= "INSERT INTO `tickets` (`id_tickets`,`id_carnet`,`etat`,`prix`) VALUES ('$id_tickets','$id_carnet','$etat','$prix')";
	if(mysqli_query($con,$sql))
	{
		header ("location:../html/index_ticket.html");
	}
	else 
	{
		header ("location:../pe/tickets.html");
	}
}
else
{
	header("location:../pe/e_carnet_ticket.html");
}
?>