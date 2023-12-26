
<?php
//la connexion avec la base de données

$con=mysqli_connect("localhost","root","","gestion_park_de_bus");
if(!$con){die("Erreur de type: " .mysqli_connect_error()); }
else "OK";



//Récupération de données

$idb=$_POST['id_bus'];
$nch=$_POST['nomch'];
$np=$_POST['nbp'];
$idp=$_POST['idp'];

$sql1= "SELECT * FROM `park` WHERE `id_park`='$idp'";
$resultat = mysqli_query($con,$sql1);
if(mysqli_num_rows($resultat)>0)
{
	
	//Insertion de données dans la BD

	$sql= "INSERT INTO `bus` (`id_bus`,`id_parc`,`nb_place`,`nom_chaufeur`) VALUES ('$idb','$idp','$np','$nch')";
	if(mysqli_query($con,$sql))
	{
		header ("location:../html/index_bus.html");
	}
	else 
	{	
		header ("location:../pe/bus.html");
	}
}
else
{
	header ("location:../pe/e_bus_park.html");
}

?>