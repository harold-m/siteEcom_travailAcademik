<?php 
session_start();
/*class Panier{
    public function __construct(){
        if(!isset($_SESSION)){
            session_start();
        }
        if(!isset($_SESSION['panier'])){
            $_SESSION['panier']=array(); // creation panier vide
        }
    }
}*/

// creation de la session si elle n'exite pas

function creationPanier(){
    if (!isset($_SESSION['panier'])){
       $_SESSION['panier']=array();
       $_SESSION['panier']['numProduit'] = array();
       $_SESSION['panier']['qteProduit'] = array();
       $_SESSION['panier']['prixProduit'] = array();
       $_SESSION['panier']['verrou'] = false;
    }
    return true;
 }

 // Pour verifier que le panier est verrouille ou pas

 /**
 * Permet de savoir si le panier est verrouillé
 * @return booleen
 */
function isVerrouille(){
    if (isset($_SESSION['panier']) && $_SESSION['panier']['verrou'])
    return true;
    else
    return false;
 }
 // Fonctions pour ajouter des articles dans le panier

 /**
 * Ajoute un article dans le panier
 * @param string $numProduit
 * @param int $qteProduit
 * @param float $prixProduit
 * @return void
 */
function ajouterArticle($numProduit,$qteProduit,$prixProduit){
    //Si le panier existe
    if (creationPanier() && !isVerrouille())
    {
       //Si le produit existe déjà on ajoute seulement la quantité
       $positionProduit = array_search($numProduit,  $_SESSION['panier']['numProduit']);
 
       if ($positionProduit !== false)
       {
          $_SESSION['panier']['qteProduit'][$positionProduit] += $qteProduit ;
       }
       else
       {
          //Sinon on ajoute le produit
          array_push( $_SESSION['panier']['numProduit'],$numProduit);
          array_push( $_SESSION['panier']['qteProduit'],$qteProduit);
          array_push( $_SESSION['panier']['prixProduit'],$prixProduit);
       }
    }
    else
    echo "Un problème est survenu veuillez contacter l'administrateur du site.";
 }

 // Modifier un panier

 function modifierQTeArticle($numProduit,$qteProduit){
    //Si le panier existe
    if (creationPanier() && !isVerrouille())
    {
       //Si la quantité est positive on modifie sinon on supprime l'article
       if ($qteProduit > 0)
       {
          //Recharche du produit dans le panier
          $positionProduit = array_search($numProduit,  $_SESSION['panier']['numProduit']);
 
          if ($positionProduit !== false)
          {
             $_SESSION['panier']['qteProduit'][$positionProduit] = $qteProduit ;
          }
       }
       else
       supprimerArticle($numProduit);
    }
    else
    echo "Un problème est survenu veuillez contacter l'administrateur du site.";
 }


/**
 * Supprime un article du panier
 * @param $numProduit
 * @return unknown_type
 */
function supprimerArticle($numProduit){
    //Si le panier existe
    if (creationPanier() && !isVerrouille())
    {
       //Nous allons passer par un panier temporaire
       $tmp=array();
       $tmp['numProduit'] = array();
       $tmp['qteProduit'] = array();
       $tmp['prixProduit'] = array();
       $tmp['verrou'] = $_SESSION['panier']['verrou'];
 
       for($i = 0; $i < count($_SESSION['panier']['numProduit']); $i++)
       {
          if ($_SESSION['panier']['numProduit'][$i] !== $numProduit)
          {
             array_push( $tmp['numProduit'],$_SESSION['panier']['numProduit'][$i]);
             array_push( $tmp['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
             array_push( $tmp['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);
          }
 
       }
       //On remplace le panier en session par notre panier temporaire à jour
       $_SESSION['panier'] =  $tmp;
       //On efface notre panier temporaire
       unset($tmp);
    }
    else
    echo "Un problème est survenu veuillez contacter l'administrateur du site.";
 }

 // Montant global de la commande 

 /**
 * Montant total du panier
 * @return int
 */
function MontantGlobal(){
    $total=0;
    for($i = 0; $i < count($_SESSION['panier']['numProduit']); $i++)
    {
       $total += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
    }
    return $total;
 }

 // Suppression complète de panier

 function supprimePanier(){
    unset($_SESSION['panier']);
 }
/*
 * Compte le nombre d'articles différents dans le panier
 * @return int
 */
function compterArticles()
{
   if (isset($_SESSION['panier']))
   return count($_SESSION['panier']['numProduit']);
   else
   return 0;

}

?>