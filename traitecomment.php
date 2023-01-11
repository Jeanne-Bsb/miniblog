<?php
session_start();
include("connexion.php");
$requete= "INSERT INTO commentaire VALUES (NULL,NOW(),:autor,:text,:post)";
echo "{$_POST["autor"]}, {$_POST["text"]}, {$_POST["post"]},";

$stmt= $db->prepare($requete);
$stmt->bindParam(':autor',$_POST["autor"] , PDO::PARAM_STR); 
$stmt->bindParam(':text',$_POST["text"] , PDO::PARAM_STR);
$stmt->bindParam(':post',$_POST["post"] , PDO::PARAM_STR);
$stmt->execute();
echo "<p>commentaire envoyé!</p>
<a href='affiche-commentaire.php?id={$_POST["post"]}'>Retour</a>";
?>