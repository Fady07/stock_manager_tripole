<?php  


function creationPanier(){
if (!isset($_SESSION['panier'])){
$_SESSION['panier']=array();
$_SESSION['panier']['CodeProduit'] = array();
$_SESSION['panier']['NomProduit'] = array();
$_SESSION['panier']['QuantiteProduit'] = array();
$_SESSION['panier']['PrixProduit'] = array();
$_SESSION['panier']['chiffreDaffaire'] = array();
}
return true;
}



function ajouterArticle($CodeProduit,$NomProduit,$qteProduit,$prixProduit,$chiffreDaffaire){
//Si le panier existe
if (creationPanier())
{
//Si le produit existe déjà on ajoute seulement la quantité
$positionProduit = array_search($CodeProduit, $_SESSION['panier']['CodeProduit']);
if ($positionProduit !== false)
{
$_SESSION['panier']['QuantiteProduit'][$positionProduit] = $qteProduit ;
$_SESSION['panier']['PrixProduit'][$positionProduit] = $prixProduit ;
$_SESSION['panier']['chiffreDaffaire'][$positionProduit] = $chiffreDaffaire ;
}
else
{
//Sinon on ajoute le produit
array_push( $_SESSION['panier']['CodeProduit'],$CodeProduit);
array_push( $_SESSION['panier']['NomProduit'],$NomProduit);
array_push( $_SESSION['panier']['QuantiteProduit'],$qteProduit);
array_push( $_SESSION['panier']['PrixProduit'],$prixProduit);
array_push( $_SESSION['panier']['chiffreDaffaire'],$chiffreDaffaire);
}
}
else
echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}
?>