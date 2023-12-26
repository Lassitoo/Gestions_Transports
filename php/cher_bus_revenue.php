<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../css/liste_revenue.css">
</head>

<body>
<div class="menu">
	<div class="p1">
		Gestion de transport..
	</div>
	<ul>
		<li class="mo"><a class="ac" href="../html/acceuil.html">Acceuil</a></li>
		<li><a>Park</a>
			<ul>
				<li><a href="../html/cher_park.html">Recuperer</a></li>				
				<li><a href="../html/index_park.html">Ajouter</a></li>
			</ul></li>
		<li><a>Bus</a>
			<ul>
				<li><a href="../html/cher_bus.html">Recuperer</a></li>				
				<li><a href="../php/liste_bus.php">Lister</a></li>
				<li><a href="../html/index_bus.html">Ajouter</a></li>
				<li><a href="../html/cher_revenue.html">Revenue</a></li>
			</ul></li>		
		<li><a>Carnet</a>
			<ul>
				<li><a href="../php/liste_carnet.php">Lister</a></li>
				<li><a href="../html/index_carnet.html">Ajouter</a></li>
			</ul></li>			
		<li><a>Ticket</a>
			<ul>
				<li><a href="../php/liste_ticket.php">Lister</a></li>
				<li><a href="../html/index_ticket.html">Ajouter</a></li>
			</ul></li>
		<li><a>Passage</a>
			<ul>
				<li><a href="../php/liste_passage.php">Lister</a></li>
				<li><a href="../html/index_passage.html">Ajouter</a></li>
			</ul></li>
	</ul>
</div>

<div class="beb">
<?php
//la connexion avec la base de données
include "cnx.php";

//Récupération de données
$id_bus=$_POST['id_bus'];
$r='vendue';

//Affichage les données de recherche
echo "<h1>"."Le Revenue du bus"."</h1>";
echo "<table border width='80%'>";
echo "<tr height='50px'>";
echo "<th>". "Matriculation". "</th>" ;
echo "<th>". "Revenue". "</th>"."</tr>" ;
$sql1= "SELECT * FROM `carnet_ticket` WHERE `id_bus`='$id_bus'";
$resultat1 = mysqli_query($con,$sql1);
if(mysqli_num_rows($resultat1)>0)
{
	while($row1=mysqli_fetch_assoc($resultat1))
	{
		$id_carnet=$row1['id_carnet'];
		
		$sql2="SELECT SUM(`prix`) FROM `tickets` WHERE `id_carnet`='$id_carnet' AND `etat`='$r'";
		$resultat2=mysqli_query($con,$sql2);
		if(mysqli_num_rows($resultat2)>0)
		{
			while($row2=mysqli_fetch_assoc($resultat2))
			{
				$b=$row2['SUM(`prix`)'];
				
				//mise a jour du revenue d'un carnet
				$sqla="DELETE FROM `revenue_carnet` WHERE `idc`='$id_carnet'";
				if(mysqli_query($con,$sqla))
				{
					$sql3="INSERT INTO `revenue_carnet` (`idc`,`rv1`,`idb`) VALUES ('$id_carnet','$b','$id_bus')";
					if(mysqli_query($con,$sql3))
					{
						$sql4="SELECT SUM(`RV1`) FROM `revenue_carnet` WHERE `idb`='$id_bus'";
						$resultat3=mysqli_query($con,$sql4);
						if(mysqli_num_rows($resultat3)>0)
						{
							while($row3=mysqli_fetch_assoc($resultat3))
							{
								$c=$row3['SUM(`RV1`)'];
								
								//mise a jour revenue d'un bus
								$sqlb="DELETE FROM `revenue_bus` WHERE `idbus`='$id_bus'";
								if(mysqli_query($con,$sqlb))							
								{
									$sql4="INSERT INTO `revenue_bus` (`idbus`,`rv2`) VALUES ('$id_bus','$c')";
									if(mysqli_query($con,$sql4))
									{
										//affichage du revenue
										echo "<tr>"."<td>"."$id_bus"."</td>";
										echo "<td>"."$c"." UM"."</td>"."</tr>"."</table>";
									}
								}	
							}
						}
					}
				}
			}
		}
		else
		{
			header("location:../pe/e_revenue_carnet.html");
		}
		?>
		
		<?php
	}	
} 
else 
{
	header("location:../pe/e_revenue_bus.html");
}
?>
</div>
</body>
</html>