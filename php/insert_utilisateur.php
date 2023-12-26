<?php

//la connexion avec la base de données
include "cnx.php";

//Récupération de données
$id_user=$_POST['id_user'];
$mdp_user=$_POST['mdp_user'];
//`mdp_user`='$mdp_user'

$sql1="SELECT * FROM `utilisateur` WHERE `id_user`='$id_user'";
$resultat1= mysqli_query($con,$sql1);
if(mysqli_num_rows($resultat1)>0)
{
	$sql2="SELECT* FROM `utilisateur` WHERE `id_user`='$id_user' AND `mdp_user`='$mdp_user'";
	$resultat2= mysqli_query($con,$sql2);
	if(mysqli_num_rows($resultat2)>0)
	{
		header("location:../pe/bienvenue.html");
	}
	else
	{
		header("location:../pe/ereur_mdp.html");
	}
}
else
{
	header("location:../pe/ereur_user.html");
}
?>