<?php
function dbConnect(){
    return $db=new PDO('mysql:host=localhost;dbname=mmiun;port=3306;charset=utf8', 'root', '');
};
function AfficheUnPost($id){
    $requetePost="SELECT * FROM posts WHERE id = $id";
    $stmt=dbConnect()->query($requetePost);
    $data=$stmt->fetchall(PDO::FETCH_ASSOC);
    return $data;
}
function AfficheTroisPost(){
    $requetePost="SELECT * FROM posts ORDER BY date DESC LIMIT 3";
    $stmt=dbConnect()->query($requetePost);
    $data=$stmt->fetchall(PDO::FETCH_ASSOC);
    return $data;
}
function AfficheAllPost(){
    $requetePost="SELECT * FROM posts";
    $stmt=dbConnect()->query($requetePost);
    $data=$stmt->fetchall(PDO::FETCH_ASSOC);
    return $data;
}
?>