<?php
session_start();
include("connexion.php");
$requete= "INSERT INTO posts VALUES (NULL,NOW(),:text,0)";

$stmt= $db->prepare($requete);
$stmt->bindParam(':text',$_POST["text"] , PDO::PARAM_STR);
$stmt->execute();
echo "post publier!";
?>