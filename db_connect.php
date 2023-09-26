
<?php 
    // Parametre de connection a la base de donnée
    $serveur = "localhost";  // Serveur MySQL local
    $user = "root";         // Nom d'utilisateur
    $password = "";         // Mot de pass
    $dbname = "simplonbd";      // Nom de la base de donnée

    // Connexion à la base de donnée
    try{
        $connexion = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$password);
    }catch(PDOException $e){
        
    }

?>