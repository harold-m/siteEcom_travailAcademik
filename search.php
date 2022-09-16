<?php include 'session.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results for </title>

<link rel="stylesheet" href="css/home.css">
<link rel="stylesheet" href="css/search.css">

</head>
<body>


<!-- nav -->
<?php
    include ('nav.php');
?>


<!-- search-section -->
    <section class="search-results">
        <div class="product-container">
        <?php
			$conn = $pdo->open();

			try{
	       			if(isset($_GET["produit"]) AND !empty($_GET["produit"])){

						$valeur=$_GET["produit"];
						$sth = $conn->prepare("SELECT DISTINCT * FROM Produits WHERE catégorie LIKE '%$valeur%' 
						OR nom LIKE '%$valeur%' OR marque LIKE '%$valeur%' ");
						$sth->execute();
						$resultat=$sth->fetchALL(PDO::FETCH_ASSOC);


					 foreach($resultat as $Produits){

						echo '
            			<div class="product-card">
                			<div class="product-image">
                    			<span class="discount-tag">50% off</span>
                    			<img src="images/'.$Produits["photo"].'" class="product-thumb" alt="">
								<a href="ajouterPanier.php?nom='.$Produits["nom"].'">
                    			<button class="card-btn">add to cart</button>
								</a>
                			</div>
                			<div class="product-info">
                    			<h5 class="product-brand">'.$Produits['nom'].'</h5>
                    			<p class="product-short-des">'.$Produits['descrip'].'</p>
                    			<span class="price">$'.$Produits['prix'].'</span><span class="actual-price">$'.$Produits['prix'].'</span>
                			</div>
            			</div>';
         			   }
					}
					else{
						echo"pas de reponse";
					}

					}
					catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
					}
					

					$pdo->close();

	       		?> 

        </div>
    </section>


<!-- footer -->
<?php
include ('footer.php');
?>