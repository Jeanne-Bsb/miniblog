<?php 
session_start();
require("model.php");
include("head.php");
?>
    <title>Commentaire</title>
</head>
<body>
    <?php
    include("connexion.php")
    ?>
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
    <a href="blog.php">< Retour</a>
    <main>
        <section class="profil">
        </section>
        <section class="posts">
            <h2>Post :</h2>
            <?php
            $numero= $_GET["id"];
            $resultatPost=AfficheUnPost($numero);
            foreach($resultatPost as $post):?>
                <div class='post' id=<?=$post["id"]?>>
                    <h3><?=$post["date"]?></h3>
                    <p><?=$post["text"]?></p>
            <?php endforeach?>
            <section class="coms">
                <?php
                $requete="SELECT * FROM commentaire,utilisateur WHERE postcom = $numero AND id_personne=autor";
                $stmt=$db->query($requete);
                $resultat=$stmt->fetchall(PDO::FETCH_ASSOC);
                foreach($resultat as $com){
                    echo "<div class='com' id={$com["idcom"]}>
                            <h3>{$com["datecom"]} {$com["prenom"]} {$com["nom"]}</h3>
                            <p>{$com["textcom"]}</p>
                        </div>";
                };
            ?>
            
            </section>
            <section class="post">
                <h3>Poster un commentaire :</h3>
                <?php
                if(isset($_SESSION["login"])) :?>
                    <form action="traitecomment.php" method="post">
                    <textarea name="text" id="text" ></textarea>
                    <input type="hidden" id="autor" name="autor" value="<?php echo $_SESSION['id']?>">
                    <input type="hidden" id="post" name="post" value="<?php echo $numero?>">
                    <button>Publier</button>
                    </form>
                <?php else : ?>
                    <a href="login.php">Se connecter</a>
                    <p>OU</p>
                    <a href="inscription.php">S'inscrire</a>
                <?php endif?>
            </section>
            </div>
            
        </section>
        <nav>
        </nav>
    </main>
    <footer>

    </footer>
</body>
</html>