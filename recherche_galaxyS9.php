<?php 
include 'session.php'; 
include 'panier.php';
?>
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
    //include ('nav.php');
?>

<!-- search-section -->
    <section class="search-results">
        <div class="product-container">
        	<?php
	       		$conn = $pdo->open();

				try{

					//$sth = $conn->prepare("SELECT * FROM Produits WHERE nom = 'Galaxy S9' ");
					$q=$_GET['q'];
					$sth = $conn->prepare(" SELECT * FROM Produits WHERE catégorie = '".$q."'OR nom = '".$q."'OR marque='".$q."'");
					$sth->execute();
					$resultat=$sth->fetchALL(PDO::FETCH_ASSOC);

 					foreach($resultat as $Produits){

				echo '	<form action="ajouterPanier.php?numProduit='.$Produits["numProduit"].'">

						<div class="product-image">
							<img src="images/'.$Produits["photo"].'" class="product-thumb" alt="">

							<button class="card-btn">Ajouter au panier</button>
						</div>
						<div class="product-info">
							<h5 class="product-brand">'.$Produits['nom'].'</h5>
							<p class="product-short-des">'.$Produits['descrip'].'</p>
							<span class="price">'.number_format($Produits['prix'], 2, '.', ' ').'€</span><span class="actual-price">$'.$Produits['prix'].'</span>
						</div>
						
						
						</form>';

					/*echo '
            			<div class="product-card">
                			<div class="product-image">
                    			<img src="images/'.$Produits["photo"].'" class="product-thumb" alt="">

                    			<a href="ajouterArticle($numProduit,$qteProduit,$prixProduit) " > 
								<button class="card-btn">Ajouter au panier</button>
								</a>
                			</div>
                			<div class="product-info">
                    			<h5 class="product-brand">'.$Produits['nom'].'</h5>
                    		<p class="product-short-des">'.$Produits['descrip'].'</p>
                    			<span class="price">'.number_format($Produits['prix'], 2, '.', ' ').'€</span><span class="actual-price">$'.$Produits['prix'].'</span>
                			</div>
            			</div>';*/
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