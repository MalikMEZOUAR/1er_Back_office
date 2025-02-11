<!DOCTYPE html>
<html lang="fr">
<?php
include_once("lien_bdd.php");
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site dynamique en php</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    session_start();
    if (isset($_SESSION['login']) && isset($_SESSION['pwd'])){
    
    ?>
<header>
        <div class="header">
        <a href="search.php" class="lien_header">Site dynamique en PHP</a>
        <a href="logout.php" class="Bouton_deconnection">Se déconnecter</a>
        </div>
    </header>
<main>
    <div class="titre">
        <h1>Rechercher élément</h1>
        <a href="ajouter.php" class="btn-ajouter">Ajouter un élément</a>
    </div>
    <form action="#" method="POST">
        <label for="nom">Nom :</label>
        <textarea name="nom" id="nom" required></textarea>
        <input class="btn_envoyer" type="submit" value="Envoyer">
    </form>
    <div class="result">
        <div class="titre_result">
            <p>
                ID
            </p>
            <p>
                Nom
            </p>
            <p>
                Prenom
            </p>
            <p>
                Date de Naissance
            </p>
            <p>
                Modification
            </p>
            <p>
                Suppression
            </p>
        </div>
        <?php
        if(!empty($_POST)){
            $nom = htmlentities($_POST["nom"]);
        $query1 = mysqli_query($link,"SELECT * FROM `adherent` WHERE `nom` = '$nom'");
            if (!empty($nom) ){
                while ($adherent=mysqli_fetch_assoc($query1)){
                    echo 
                    "<div> 
                        <p>".$adherent['id']."</p>
                        <p>".$adherent['nom']."</p>
                        <p>".$adherent['prenom']." </p>
                        <p>". $adherent['dateNaissance'] ."</p>
                        <a href='modifier.php?id=".$adherent['id']."' class='lien_objet'>Modifier</a>
                        <input type='button' class='btn_suppr' value='Supprimer' onclick='Supprimer(" . $adherent['id'] . ")'>
                    </div>";
                }
            }
        }
        ?>
    </div>
</main>
<script>
    function Supprimer(id) {
        if (confirm("Êtes-vous sûr de vouloir supprimer cet élément ?")) {
            fetch('Suppr.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'id=' + id
            });
        }
    }
</script>
<?php
}
    else{
        echo 'Vous n\'êtes pas autorisé à consulter cette page, <strong> veuillez vous identifer !!! </strong>';
        echo "<br> <br> Vous serez redirigé dans 5secondes. Sinon cliquez sur le lien <a href='index.html'>Formulaire de connexion</a>";
        header("refresh:5;url=index.html");
    }
    ?>
</body>
</html>