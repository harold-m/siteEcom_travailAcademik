<?php


	$conn= mysqli_connect("localhost","root","root"); 
	mysqli_select_db($conn,"ProjetWeb");	
	if(!(isset($_POST['nom'])&&isset($_POST['prenom'])&&isset($_POST['email'])&&isset($_POST['ville'])&&isset($_POST['adresse'])&&isset($_POST['telephone'])))
  	{
        echo "Some Error occured 1!";
  	} else {
		  	
	//fetch the user data
	$nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
	$email=$_POST['email'];
	$motDePasse=$_POST['motDePasse'];
    $ville=$_POST['ville'];
    $adresse=$_POST['adresse'];
    $telephone=$_POST['telephone'];

	//check for already registerd user
	$query1="SELECT * FROM Clients WHERE email='.$email.'";
	$result1=mysqli_query($conn,$query1);
	if(mysqli_num_rows($result1)==0)
	{
		//push data to the DB
		$query="INSERT INTO Clients (nom, prenom, email, motDePasse, ville, adresse, telephone) 
		VALUES ('$nom', '$prenom', '$email', '$motDePasse', '$ville', '$adresse', '$telephone')";
		if (mysqli_query($conn,$query))
		{
			//redirect
			$_SESSION['nom']=$nom;
            $_SESSION['prenom']=$prenom;
			$_SESSION['email']=$email;
            $_SESSION['ville']=$ville;
            $_SESSION['adresse']=$adresse;
            $_SESSION['telephone']=$telephone;

			$query1="SELECT * FROM Clients WHERE email = '.$email.' AND motDePasse='.$motDePasse.'";
			$result1=mysqli_query($conn,$query1);
			$row1=mysqli_fetch_assoc($result1);
			$_SESSION['numClient']=$row1['numClient'];
			header('Location: home.php');
		}
		else
		{
			echo "Some Error occured 3!";
		}
	}

	}



?>