<?php
//la connexion avec la base de données
$con=mysqli_connect("localhost","root","","gestion_park_de_bus");
if(!$con){die("Erreur de type" .mysqli_connect_error()); }
else "OK";
?>