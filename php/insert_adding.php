<?php

//la connexion avec la base de données
include "cnx.php";

//Récupération de données
$id_user=$_POST['id_user'];
$mdp_user=$_POST['mdp_user'];

$sql= "INSERT INTO `utilisateur` (`id_user`,`mdp_user`) VALUES ('$id_user','$mdp_user')";
if(mysqli_query($con,$sql))
{
	header ("location:../index.html");
}
else 
{	
	header ("location:../pe/ereur_add.html");
}
?>