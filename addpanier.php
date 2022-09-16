<?php include 'DBConnection.php'; ?>

<?php
$conn = $pdo->open();

try{
   
    if(isset($_GET['numProduit'])){
        $val=$_GET['numProduit'];
        $sth=$conn->prepare(" SELECT * FROM Produits WHERE numProduit='".$val."' ");
        $sth->execute();
        //echo 'bonjour';
        $resultat=$sth->fetchALL(PDO::FETCH_ASSOC);
        

        foreach($resultat as $result){
            echo /*$result['nom'];*/
            ' <div class="product-card">
                			<div class="product-image">
                    			<img src="images/'.$result["photo"].'" class="product-thumb" alt="ou est image">
								<a href="pagepaiement.php">
                    			<button class="card-btn">acheter ce produit</button>
								</a>
                			</div>

                			<div class="product-info">
                    			<h5 class="product-brand">'.$result['nom'].'</h5>
                    			<p class="product-short-des">'.$result['descrip'].'</p>
                    			<span class="price">$'.$result['prix'].'</span><span class="actual-price">$'.$Produits['prix'].'</span>
                			</div>
            	</div>';
            
        }
    
    }

}
catch(PDOException $e){

        echo "Connectez vous à la bdd" . $e->getMessage();
    }
    $pdo->close();

?>