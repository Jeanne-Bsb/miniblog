<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session</title>
</head>
<body>
    <?php
    session_start();
    if (isset($_SESSION["login"]))
    { 
    echo "Bonjour {$_SESSION["login"]}<BR>";
    }
    $db =new PDO('mysql:host=localhost;dbname=mmiun;port=3306;charset=utf8','root', '');
    $requete="SELECT * FROM utilisateur";
    $stmt=$db->query($requete);
    $resultat=$stmt->fetchall(PDO::FETCH_ASSOC);
   /*  foreach ($resultat as $user){
        echo "<p>{$user["prenom"]} {$user["nom"]}</br>
        {$user["login"]}</br>
        {$user["mdp"]}</br>
        {$user["ville"]}</p>";
    } */
    ?>
    <table border=1>
    <tr><th>Id</th><th>Nom</th><th>Prenom</th><th>Login</th><th>Mdp</th></tr>

    <?php
    foreach ($resultat as $utilisateur){
	    echo "<tr><td>{$utilisateur["id_personne"]}</td><td>{$utilisateur["nom"]}</td><td>{$utilisateur["prenom"]}</td><td>{$utilisateur["login"]}</td><td>{$utilisateur["mdp"]}</td></tr>";
    }
    ?>
</table>
</body>
</html>