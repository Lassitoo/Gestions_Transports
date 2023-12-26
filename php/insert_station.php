
<?php
//la connexion avec la base de données

$con=mysqli_connect("localhost","root","","gestion_park_de_bus");
if(!$con){die("Erreur de type: " .mysqli_connect_error()); }
else "OK";



//Récupération de données

$id_station=$_POST['id_station'];

//Insertion de données dans la BD

$sql= "INSERT INTO `station` (`id_station`) VALUES ('$id_station')";
if(mysqli_query($con,$sql))
{
	header ("location:../html/index_station.html");
}
else 
{
	header ("location:../pe/station.html");	
}

?>