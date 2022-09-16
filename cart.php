
<?php
  session_start();  
  $conn= mysqli_connect("localhost","root","root"); 
  mysqli_select_db($conn,"WEB");

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
    include ('nav.php');
?>


<!-- search-section -->
    <section class="search-results">
        <div class="product-container">
      <?php 
        $numProduit=$_GET['numProduit'];
        $numClient=$_SESSION['numClient'];

        $query="SELECT * FROM `LigneCommandes` c JOIN `Produits` p ON c.`numProduit`=p.`numProduit` WHERE c.`numClient`=$numClient";
        $result=mysqli_query($conn,$query);
        
        while($row=mysqli_fetch_assoc($result))
        {
            echo '
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">50% off</span>
                    <img src="images/'.$Produits["photo"].'" class="product-thumb" alt="">
                </div>
                <div class="product-info">
                    <h5 class="product-brand">'.$Produits['nom'].'</h5>
                    <p class="product-short-des">'.$Produits['descrip'].'</p>
                    <span class="price">$'.$Produits['prix'].'</span><span class="actual-price">$'.$Produits['prix'].'</span>
                </div>
            </div>';
        }
?>
        </div>
    </section>

<!-- footer -->
<?php
include ('footer.php');
?>