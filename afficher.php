<?php 
	require('./db_connect.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Affichage des participants</title>
    <link rel="stylesheet" href="./afficher.css">
    <link rel="stylesheet" href="./tetepied.css">
</head>

<body>
    <header>
        <nav>
            <label class="logo">Simplon Côte d'Ivoire</label>
            <a href="./ajout.php">Ajouter un participant</a>
        </nav>
    </header>
    <section class="principale">
        <main class="table">
            <?php
                $sql = "SELECT * FROM participants";
                $result = $connexion->prepare($sql);
                $result->execute();
                $nombre = $result->rowCount();
            ?>
            <section class="table__header">
                <h1>Les participants</h1>
                <p>Nombre de participants  : <span><?php echo "$nombre"?></span></p>
            </section>
            <section class="table__body">
                <table>
                    <thead>
                        <tr>
                            <th title="id"> ID </th>
                            <th title="Nom"> Nom </th>
                            <th title="Prenoms"> Prenoms </th>
                            <th title="Contat"> Telephone </th> 
                            <th title="email"> E-mail </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                           $requete = "SELECT * from participants";
                           $resultat = $connexion->prepare($requete);
                           $resultat->execute();
                           $results = $resultat->fetchAll();

                           foreach ($results as $user) {
                               echo("
                                   <tr>
                                       <td> $user[id] </td>
                                       <td> $user[nom] </td>
                                       <td> $user[prenom]</td>
                                       <td> $user[contact] </td>
                                       <td> $user[email] </td>
                                   </tr>
                               ");
                           }
                           ?>
                    </tbody>
                </table>
            </section>

        </main>
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
            <span class="copyright_text">Copyright &#169; 2023 <a href="#">Simplon Côte d'Ivoire.</a>Tous droits réservés</span>
            <span class="policy_terms">
              <a href="#">Politique de confidentialité</a>
              <a href="#">Sécurité</a>
            </span>
          </div>
        </div>
    </footer>
</body>

</html>