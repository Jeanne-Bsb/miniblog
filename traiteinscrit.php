<?php
session_start();
include("connexion.php")

$requete= "INSERT INTO utilisateur VALUES (NULL,:nom,:prenom,:login,:mdp)";

$stmt= $db->prepare($requete);
$stmt->bindParam(':login',$_GET["login"] , PDO::PARAM_STR); 
$stmt->bindParam(':nom',$_GET["nom"] , PDO::PARAM_STR); 
$stmt->bindParam(':prenom',$_GET["prenom"] , PDO::PARAM_STR);

$hash= password_hash($_GET["pwd"],PASSWORD_DEFAULT);
$stmt->bindParam(':mdp',$hash , PDO::PARAM_STR); 
$stmt->execute();
echo "L inscription s est bien deroulee<br>
";
?>