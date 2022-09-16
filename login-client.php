<?php
session_start();

	$conn= mysqli_connect("localhost","root","root"); 
	mysqli_select_db($conn,"ProjetWeb");
	
	try{
		if((isset($_POST['email'])&&isset($_POST['motDePasse']))){
		

			$email=$_POST['email'];
			$motDePasse=$_POST['motDePasse'];
			
	
			$query= "SELECT * FROM Clients WHERE email='$email' AND motDePasse='$motDePasse'";
	
			//running the search in DB and storing in $result
			
			$result=mysqli_query($conn,$query);
	
			//function to return the number of rows in $result
	
			//$num_rows=mysqli_num_rows($result);
	
			$isConnected = false;
	
			if(mysqli_num_rows($result)==1)
				{
					$isConnected=true;

					$row=mysqli_fetch_assoc($result);
					$_SESSION["nom"]=$row['nom'];
					$_SESSION["email"]=$row['email'];
					$_SESSION["numClient"]=$row['numClient'];

					
	
					header('location: home.php');

				}else{
					header('location: signup.php');

				}

		}

	}

	catch(PDOException $e){
		echo " Insert your registred email and mdp: " . $e->getMessage();
}
	
	
	

?>
