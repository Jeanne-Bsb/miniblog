<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Identifiant</title>
</head>
<body>
    <?php 
    session_start();
    ?>
    <?php	if (isset($_SESSION["login"]))
    { 
    echo "Bonjour {$_SESSION["login"]}<BR>"; 
    }
    ?>
    <form action="traitelogin.php" method="get">
        <label for="login">Adresse mail :</label>
        <input type="text" id="login" name="login"></br>
        <?php 
	        if (isset($_GET["err"]) && $_GET["err"]=="login") { echo "ATTENTION MAUVAIS LOGIN";}
		?></br>
        <label for="mdp">Mot de passe:</label>
        <input type="text" id="mdp" name="pwd"></br>
        <?php 
	        if (isset($_GET["err"]) && $_GET["err"]=="mdp") { echo "ATTENTION MAUVAIS MOT DE PASSE";}
		?>
        <input type="submit">
    </form>
</body>
</html>