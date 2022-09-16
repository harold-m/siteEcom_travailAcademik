<?php
	session_start();
    $conn= mysqli_connect("localhost","root","root"); 
	mysqli_select_db($conn,"WEB");
	
	$idCommande=$_GET['numProduit'];
	$numClient=$_SESSION['numClient'];

	$query1="SELECT * FROM `LigneCommandes` WHERE `numProduit` LIKE '$numProduit' AND `numClient` LIKE '$numClient'";
	$result1=mysqli_query($connection,$query1);
		
	if(mysqli_num_rows($result1)==0)
	{
		$query="INSERT INTO `LigneCommandes` (`numProduit`, `numClient`) VALUES ('$numProduit', '$numClient')";
		if(mysqli_query($conn,$query))
		{
			echo"Success";
		}
		else
		{
			echo "error!";
		}
	}
	elseif(mysqli_num_rows($result1)==1)
	{
		echo"Success again";
	}
	else
	{
		echo "Some Error Occured";
	}
	
?>