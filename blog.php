<?php 
session_start();
require("model.php");
include("head.php");
?>
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
    <main>
        <?php include("profil.php")?>
        <section class="posts">
            <h2>Posts :</h2>
            <?php
            $resultat=AfficheTroisPost();
            foreach($resultat as $post) :?>
                <div class='post' id=<?=$post["id"]?>>
                    <h3><?=dateFr($post["date"])?></h3>
                    <p><?=$post["text"]?></p>
                    <a href='affiche-commentaire.php?id={$post["id"]}'>Commentaires</a>
                </div>
            <?php endforeach?>
            
            <a href="archive.php">Archives</a>
            <?php if(isset($_SESSION['login']) && $_SESSION['login']=="toto@gmail.com") :?>
            <div>
                <h2>Publier un post</h2>
                    <form action="traiteposter.php" method="post">
                        <textarea name="text" id="text" ></textarea>
                        <button>Valider</button>
                    </form>
            </div>
        <a href="admin_space.php">Gérer le blog</a>
        <?php endif?>
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