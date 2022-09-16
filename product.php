<?php include 'session.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product  </title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/product.css">


</head>
<body>


<!-- nav -->
<?php
    include ('nav.php');
?>

<section class="product-details">
    <div class="image-slider"></div>
    

    <div class="details">
    <?php
			$conn = $pdo->open();

			try{
	       			if(isset($_GET["Produit"]) AND !empty($_GET["Produit"])){

						$valeur=$_GET["Produit"];
						$sth = $conn->prepare("SELECT DISTINCT * FROM Produits WHERE catégorie LIKE '%$valeur%' 
						OR nom LIKE '%$valeur%' OR marque LIKE '%$valeur%' ");
						$sth->execute();
						$resultat=$sth->fetchALL(PDO::FETCH_ASSOC);

						echo '
            			<div class="product-card">
                			<div class="product-image">
                    			<span class="discount-tag">50% off</span>
                    			<img src="images/'.$Produits["photo"].'" class="product-thumb" alt="">
								/* <a href="add-cart.php?nom='.$nom.'" class="card-btn"> Add to Cart </a> */
                    			<button href="add-cart.php?nom='.$nom.'" class="card-btn">add to cart</button>
                			</div>
                			<div class="product-info">
                    			<h5 class="product-brand">'.$Produits['nom'].'</h5>
                    			<p class="product-short-des">'.$Produits['descrip'].'</p>
                    			<span class="price">'.number_format($Produits['prix'], 2, '.', ' ').'€</span><span class="actual-price">$'.$Produits['prix'].'</span>
                			</div>
            			</div>';
                       }
                }
                catch(PDOException $e){
                    echo "There is some problem in connection: " . $e->getMessage();
                }
            

            $pdo->close();

           ?> 

        <p class="product-sub-heading">select size</p>

        <input type="radio" name="s" checked hidden id="s-size">
        <label for="s-size" class="size-radio-btn check">s</label>
        <input type="radio" name="m" hidden id="m-size">
        <label for="m-size" class="size-radio-btn">m</label>
        <input type="radio" name="l" hidden id="l-size">
        <label for="l-size" class="size-radio-btn">l</label>
        <input type="radio" name="xl" hidden id="xl-size">
        <label for="xl-size" class="size-radio-btn">xl</label>
        <input type="radio" name="xxl" hidden id="xxl-size">
        <label for="xxl-size" class="size-radio-btn">xxl</label>

        <button class="btn cart-btn">add to cart</button>
        <button class="btn">add to wishlist</button>

    </div>


</section>














    <script src="js/product.js"></script>

<!-- footer -->
<?php
include ('footer.php');
?>