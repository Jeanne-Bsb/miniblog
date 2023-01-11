<?php
    session_start();

include("connexion.php");
    $db->query('SET NAMES utf8');

    $requete="SELECT * FROM utilisateur WHERE login=:login";
    $stmt=$db->prepare($requete);
    $stmt->bindParam(':login',$_GET["login"],PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowcount()==1){
        $resultat=$stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($_GET["pwd"],$resultat["mdp"])){
            echo "SUPER !!! vous etes connecté";
            $_SESSION["login"]=$_GET["login"];
            $_SESSION["id"]=$resultat["id_personne"];
            echo '<br><a href="blog.php">retour</a>';
        } else {header ('Location:login.php?err=mdp');}
    
    } else {}
?>