<?php

session_start();

require_once('./db_connect.php');

if (isset($_POST['ajout'])) {
    if (
        empty($_POST['nom']) ||
        empty($_POST['prenom']) ||
        empty($_POST['numero']) ||
        empty($_POST['email'])
         
    ) {
        $Erreur = "Veuillez remplir tous les champs";
    } else {

       $nom = htmlspecialchars($_POST['nom']);
       $prenom = htmlspecialchars($_POST['prenom']);
       $numero = htmlspecialchars($_POST['numero']);
       $email = htmlspecialchars($_POST['email']);

       $req = "INSERT INTO participants(nom, prenom, contact, email) VALUES (?, ?, ?, ?)";
       $prepare = $connexion->prepare($req);
       $prepare->execute(array($nom, $prenom, $numero, $email));
       header('Location:./afficher.php');

        
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'un participant</title>
    <link rel="stylesheet" href="./ajout.css">
    <link rel="stylesheet" href="./tetepied.css">
</head>

<body>
    <header>
        <nav>
            <label class="logo">Simplon Côte d'Ivoire</label>
            <a href="./afficher.php">Voir les participants</a>
        </nav>
    </header>

    <section>
        <form action="" method="post">
            <h1>Enregistrement d'un participant</h1>

            <?php
            if (isset($Erreur)) {
                echo ("<p class='Erreur'>" . $Erreur . "</p> ");
            }
            ?>

        
            <div class="nom" id="nom">
                <label for="nom"> Nom </label>
                <input type="text" placeholder="Votre Nom" name="nom">
            </div>
            <div class="prenom" id="prenom">
                <label for="prenom"> Prénoms </label>
                <input type="text" name="prenom" placeholder="Votre Prénoms">
            </div>
            </div>
            <div class="numero" id="numero">
                <label for="numero"> Numéro de téléphone </label>
                <input type="tel" placeholder="Numéro de téléphone" name="numero">
            </div>
            <div class="email" id="email">
                <label for="email"> E-mail </label>
                <input type="email" placeholder="exemple@gamil.com" name="email">
            </div>
            <div class="bass">
                <button type="submit" name="ajout">Enregistrer</button>
            </div>
        </form>
    </section>


    <footer>
        <div class="content">
            <div class="top">
                <div class="logo-details">
                    <span class="logo_name">Simplon Côte d'Ivoire</span>
                </div>
                <div class="media-icons">
                    <a href="#"><img src="./image/facebook.png" alt="facebook"></a>
                    <a href="#"><img src="./image/Twitter.png" alt="Twitter"></a>
                    <a href="#"><img src="./image/instagrame.png" alt="instagram"></a>
                    <a href="#"><img src="./image/youtube.png" alt="youtube"></a>
                </div>
            </div>
        </div>
        <div class="bottom-details">
            <div class="bottom_text">
                <span class="copyright_text">Copyright &#169; 2023 <a href="#">Simplon CI.</a>Tous droits réservés</span>
                <span class="policy_terms">
                    <a href="#">Politique de confidentialité</a>
                    <a href="#">Sécurité</a>
                </span>
            </div>
        </div>
    </footer>

</body>

</html>