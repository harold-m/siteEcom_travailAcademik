
<?php

	Class Database{
	
		private $server = "mysql:host=localhost;dbname=ProjetWeb";
		private $username = "root";
		private $password = "root";
		private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
		protected $conn;
		
		public function open(){
			try{
				$this->conn = new PDO($this->server, $this->username, $this->password, $this->options);
				return $this->conn;
				
			}
			catch (PDOException $e){
				echo "There is some problem in connection: " . $e->getMessage();
			}
	
		}
	
		public function close(){
			$this->conn = null;
		}
		/*public function ajouterClient(){

			"INSERT INTO Clients (numClient, email, motDePasse, nom, prenom, ville, adresse, telephone) VALUES
			(".$_POST['email'].", ".$_POST['motDePasse'].", ".$_POST['nom'].",".$_POST['prenom'].",".$_POST['ville'].",
				".$_POST['adresse'].", ".$_POST['telephone'].")";
		}*/

	}

	$pdo = new Database();
	
?>