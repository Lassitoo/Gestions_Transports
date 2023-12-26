<?php
//la connexion avec la base de données

$con=mysqli_connect("localhost","root","","gestion_park_de_bus");
if(!$con){die("Erreur de type: " .mysqli_connect_error()); }
else "OK";



//Récupération de données

$idc=$_POST['id_carnet'];
$idb=$_POST['id_bus'];

//Verfication de lexistence de $idbus dans la BD bus
$sql1= "SELECT * FROM `bus` WHERE `id_bus`='$idb'";
$resultat = mysqli_query($con,$sql1);
if(mysqli_num_rows($resultat)>0)
{

	//Insertion de données dans la BD
	$sql= "INSERT INTO `carnet_ticket` (`id_carnet`,`id_bus`) VALUES ('$idc','$idb')";
	if(mysqli_query($con,$sql))
	{
		header ("location:../html/index_carnet.html");
	}
	else
	{
		header ("location:../pe/carnet.html");
	}
	
}
 else
 {
	header("location:../pe/e_bus_carnet.html");
 }
?>