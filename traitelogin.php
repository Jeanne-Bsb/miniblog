<?php
    session_start();

    $db =new PDO('mysql:host=localhost;dbname=mmiun;port=3306;charset=utf8','root', '');
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
            echo '<br><a href="affiche_utilisateur.php">afficher les utilisateurs</a>';
        } else {header ('Location:login.php?err=mdp');}
    
    } else {}
?>