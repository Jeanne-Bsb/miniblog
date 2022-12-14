<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commentaire</title>
    <link rel="stylesheet" href="style.css">
    <link rel="script" href="script.js" defer>
</head>
<body>
    <?php
    $db=new PDO('mysql:host=localhost;dbname=mmiun;port=3306;charset=utf8', 'root', '');
    /* $requete= "SELECT * FROM `posts`,`commentaire` WHERE commentaire.`post-com`=`posts`.`id` AND ;"; */
    $requete="SELECT * FROM posts";
    $stmt=$db->query($requete);
    $resultat=$stmt->fetchall(PDO::FETCH_ASSOC);
    ?>
    <header>
        <div class="menu">
            <!-- <a href="login.php"><img src="img/account_circle.svg" alt=""></a> -->
            <a href="login.php">Se connecter</a>
            <a href="inscription.php">S'inscrire</a>
        </div>
        <h1>Titre du blog</h1>
    </header>
    <main>
        <section class="profil">
        </section>
        <section class="posts">
            <h2>Posts :</h2>
            <?php
            foreach($resultat as $post){
                echo "<div class='post' id={$post["id"]}>
                        <h3>{$post["date"]}</h3>
                        <p>{$post["text"]}</p>
                    </div>";
            };
            ?>
        </section>
        <nav>
            <a href="#1">28 mai 2022, 16h22</a><br>
            <a href="#2">2 mars 2022, 8h54</a><br>
            <a href="#3">2 mars 2022, 6h31</a><br>
        </nav>
    </main>
    <footer>

    </footer>
</body>
</html>