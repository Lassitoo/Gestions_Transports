<?php

//la connexion avec la base de données
include "cnx.php";

//Récupération de données
$key_add=$_POST['key_add'];

if($key_add=='2020')
{
	header("location:../html/adding.html");
}
else
{
	header("location:../pe/adding_eror.html");
}
?>