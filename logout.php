<?php 
session_start();
session_destroy();
echo "<p>Vous avez bien été déconnecter</p>
<a href='blog.php'>Retour à la page principale</a>"
?>