
<?php
//la connexion avec la base de données

$con=mysqli_connect("localhost","root","","gestion_park_de_bus");
if(!$con){die("Erreur de type: " .mysqli_connect_error()); }
else "OK";



//Récupération de données

$id_bus=$_POST['id_bus'];
$id_station=$_POST['id_station'];
$nb_monte=$_POST['nb_monte'];
$nb_descend=$_POST['nb_descend'];
$nb_reste=$_POST['nb_reste'];
$nb_place=$_POST['nb_place'];

//Verfication de lexistence de $id_bus dans la BD bus
$sql1= "SELECT * FROM `bus` WHERE `id_bus`='$id_bus'";
$resultat1 = mysqli_query($con,$sql1);
if(mysqli_num_rows($resultat1)>0)
{
	//Verfication de lexistence de id_station dans la BD bus
	$sql3= "SELECT * FROM `station` WHERE `id_station`='$id_station'";
	$resultat1 = mysqli_query($con,$sql3);
	if(mysqli_num_rows($resultat1)>0)
	{
		//Verfication de l'autenticite $nb_place dans la BD bus
		$sql2= "SELECT * FROM `bus` WHERE `nb_place`='$nb_place' AND `id_bus`='$id_bus'";
		$resultat2 = mysqli_query($con,$sql2);
		if(mysqli_num_rows($resultat2)>0)	
		{	
			if((($nb_place)<($nb_reste)) || (($nb_place)<($nb_monte)) || (($nb_place)<($nb_descend)))
			{
				header("location:../pe/e_passage1.html");
			}
			else if(($nb_place)<(($nb_monte)+($nb_reste)))
			{
				header("location:../pe/e_passage2.html");
			}
			else if(($nb_place)<(($nb_descend)+($nb_reste)))
			{
				header("location:../pe/e_passage3.html");
			}
			else
			{
				//Insertion de données dans la BD liaison_passage si les condition de verification sont respecter

				$sql= "INSERT INTO `liaison_passage` (`id_bus`,`id_station`,`nb_monte`,`nb_descend`,`nb_reste`,`nb_place`) VALUES ('$id_bus','$id_station','$nb_monte','$nb_descend','$nb_reste','$nb_place')";
				if(mysqli_query($con,$sql))
				{
					header("location:liste_passage.php");
				}
			}
		}
		else
		{
			header("location:../pe/e_bus_place.html");
		}
	}
	else
	{
		header("location:../pe/e_station_passage.html");
	}
}
 else
 {
	header("location:../pe/e_bus_passage.html");
 }


?>