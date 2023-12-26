
<?php
//la connexion avec la base de données

$con=mysqli_connect("localhost","root","","gestion_park_de_bus");
if(!$con){die("Erreur de type: " .mysqli_connect_error()); }
else "OK";



//Récupération de données

$idp=$_POST['id_park'];
$nb=$_POST['nb_bus'];

//Insertion de données dans la BD

$sql= "INSERT INTO `park` (`id_park`,`nb_bus`) values ('$idp','$nb')";
if(mysqli_query($con,$sql))
{
	header ("location:../html/index_park.html");
}
else 
{
	header ("location:../pe/park.html");	
}

?>