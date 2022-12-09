<?php 
session_start();
?>

<html>
<head>
	<meta charset="UTF-8">
</head>

<body>
<?php	if (isset($_SESSION["login"]))
{ 
echo "Bonjour {$_SESSION["login"]}<BR>";
}
?>
	<form action="traiteinscrit.php">
		
		<p>Saisissez votre login :<INPUT type=text name="login"> 

	<p>Saisissez votre nom :<INPUT type=text name="nom"> 
	<p>Saisissez votre prenom :<INPUT type=text name="prenom"> 

		<BR>

		 <p>et votre passwd :<input type="password" name="pwd">
		 	
		<input type=submit value= "OK">
</form>
</body>