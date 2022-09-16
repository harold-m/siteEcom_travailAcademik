<?php 
//session_start();

include("panier.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title text-align="center">Votre panier</title>
</head>
<body>
<form action="ajouterPanier.php" method="post" name="action">

<table style="width: 500px">
    <tr>
        <td colspan="4" text-align="center">Votre panier</td>
    </tr>
    <tr>
        <td>Libellé</td>
        <td>Quantité</td>
        <td>Prix Unitaire</td>
        <td>Action</td>
    </tr>
<?php
//$_SESSION['panier']['qteProduit']+=1;
$_SESSION['panier']['numProduit']=array_push($_SESSION['panier']['numProduit'], $_POST['numProduit']);
$_SESSION['panier']['numProduit']=array_push($_SESSION['panier']['prixProduit'], $_POST['prixProduit']);

echo count($_SESSION['panier']['numProduit']);
if(creationPanier()){
    $nbreArticle = count($_SESSION['panier']['numProduit']);

    if($nbreArticle<=0){
       echo "<tr><td>Votre panier est vide <td></tr>";
    }
    else{
        for($i=0; $i<$nbreArticle; $i++){

            echo "<tr>";
            echo "<td name=\"numProduit\">".$_SESSION['panier']['numProduit'][$i]."</ td>";
            echo "<td name='qteProduit'>".$_SESSION['panier']['qteProduit'][$i]."</td>";
            echo "<td>".$_SESSION['panier']['prixProduit'][$i]."</td>";
            echo "<td><a href=\"".htmlspecialchars("panier.php?action=suppression&l=".rawurlencode($_SESSION['panier']['numProduit'][$i]))."\">XX</a></td>";
            echo "</tr>";

        }


    }
    echo "<tr><td colspan=\"2\"> </td>";
    echo "<td colspan=\"2\">";
    echo "Total : ".MontantGlobal();
    echo "</td></tr>";


    echo "<tr><td colspan=\"4\">";
    echo "<input type=\"submit\" value=\"Rafraichir\"/>";
    echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";

    echo "</td></tr>";
}

?>
</table>
</form>
    
</body>
</html>

<?php 

/*$erreur = false;

$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
if($action !== null)
{
   if(!in_array($action,array('ajout', 'suppression', 'refresh')))
   $erreur=true;

   //récuperation des variables en POST ou GET
   $l = (isset($_POST['numProduit'])? $_POST['numProduit']:  (isset($_GET['numProduit'])? $_GET['numProduit']:null )) ;
   $p = (isset($_POST['prixProduit'])? $_POST['prixProduit']:  (isset($_GET['prixProduit'])? $_GET['prixProduit']:null )) ;
   $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;

   //Suppression des espaces verticaux
   $l = preg_replace('#\v#', '',$l);
   //On vérifie que $p soit un float
   $p = floatval($p);

   //On traite $q qui peut être un entier simple ou un tableau d'entiers
    
   if (is_array($q)){
      $QteArticle = array();
      $i=0;
      foreach ($q as $contenu){
         $QteArticle[$i++] = intval($contenu);
      }
   }
   else
   $q = intval($q);
    
}

if (!$erreur){
   switch($action){
      Case "ajout":
         ajouterArticle($l,$q,$p);
         break;

      Case "suppression":
         supprimerArticle($l);
         break;

      Case "refresh" :
         for ($i = 0 ; $i < count($QteArticle) ; $i++)
         {
            modifierQTeArticle($_SESSION['panier']['libelleProduit'][$i],round($QteArticle[$i]));
         }
         break;

      Default:
         break;
   }
}*/
?>