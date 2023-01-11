<?php 
session_start();
include("head.php");
?>
<?php if(isset($_SESSION['login']) && $_SESSION['login']=="toto@gmail.com") :?>
        <title>Blog</title>
    </head>
    <body>
        <header>
            <div class="menu">
            <?php if(isset($_SESSION['login'])) :?>
                <a href="logout.php">Se déconnecter</a>
            <?php else : ?>
                <a href="login.php">Se connecter</a>
                <a href="inscription.php">S'inscrire</a>
            <?php endif?>
            </div>
            <h1>Titre du blog</h1>
        </header>
        <a href="blog.php">Retour</a>
        <main>
            <section>
                <h2 id="post">Les posts :</h2>
                <?php 
                    include("connexion.php");
                    $requete="SELECT * FROM posts";
                    $stmt=$db->query($requete);
                    $resultat=$stmt->fetchall(PDO::FETCH_ASSOC);
                    foreach($resultat as $post):?>
                <div class='post'>
                    <h3><?=$post["date"]?></h3>
                    <p><?=$post["text"]?></p>
                    <a href='affiche-commentaire.php?id=<?=$post["id"]?>'>Commentaires</a>
                </div>
                <?php endforeach?>
                <h2 id="user">Les utilisateurs :</h2>
                <?php 
                    include("connexion.php");
                    $requete="SELECT * FROM utilisateur";
                    $stmt=$db->query($requete);
                    $resultat=$stmt->fetchall(PDO::FETCH_ASSOC);
                    foreach($resultat as $user):?>
                <div class='post'>
                    <h3><?=$user["prenom"]." ".$user["nom"]?></h3>
                    <p><?=$user["login"]?></p>
                </div>
                <?php endforeach?>
            </section>
            <nav>
                <a href="#post">Les posts</a><br>
                <a href="#user">Les utilisateur</a><br>
            </nav>
        </main>
        <footer>

        </footer>
    </body>
    </html>
<?php else :?>
    <p>Cette page vous est inaccessible. Merci de partir</p>
    <a href="blog.php">Retour</a>
<?php endif?>