<?php 
session_start();
include("head.php");
?>
    <title>Blog</title>
</head>
<body>
    <?php
    include("connexion.php");
    $requete="SELECT * FROM posts ORDER BY date DESC";
    $stmt=$db->query($requete);
    $resultat=$stmt->fetchall(PDO::FETCH_ASSOC);
    ?>
    <header>
        <div class="menu">
        <?php if(isset($_SESSION['login']) && $_SESSION['login'] !== null) :?>
            <a href="logout.php">Se déconnecter</a>
        <?php else : ?>
            <a href="login.php">Se connecter</a>
            <a href="inscription.php">S'inscrire</a>
        <?php endif?>
        </div>
        <h1>Titre du blog</h1>
    </header>
    <a href="blog.php">< Retour</a>
    <main>
        <section class="profil">
            <div class="photo"></div>
            <h2>Name</h2>
            <p>Logoden biniou. C’haier Gwaien. Degemer glac’har. Porzh flourañ. Ar Releg-Kerhuon Nazer. Talvezout hegarat. Roazhon merenn. Buhez froud. Ker bodet. Kuit bloaz.</p>
            <h3>Join me on</h3>
            <ul>
                <li><div class="icon"></div>Instagram</li>
                <li><div class="icon"></div>Linkedin</li>
                <li><div class="icon"></div>Github</li>
                <li><div class="icon"></div>By mail</li>
            </ul>
        </section>
        <section class="posts">
            <h2>Posts :</h2>
            <?php
            foreach($resultat as $post){
                echo "<div class='post' id={$post["id"]}>
                        <h3>{$post["date"]}</h3>
                        <p>{$post["text"]}</p>
                        <a href='affiche-commentaire.php?id={$post["id"]}'>Commentaires</a>
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