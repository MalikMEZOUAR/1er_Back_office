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
    <h1>Ajouter élément</h1>
    <form action="#" method="POST">
        <label for="nom">Nom :</label>
        <textarea name="nom" id="nom" required></textarea>
        <label for="prenom">Prénom :</label>
        <textarea name="prenom" id="prenom" required></textarea>
        <label for="DateNaissance">Date de naissance :</label>
        <input type="date" name="DateNaissance" id="DateNaissance" required>
        <input type="submit" value="Envoyer">
    </form>
    <?php 
    if (!empty($_POST)){
        $nom = htmlentities($_POST["nom"]);
        $prenom = htmlentities($_POST["prenom"]);
        $DateNaissance = htmlentities($_POST["DateNaissance"]);
        $query = "INSERT INTO `adherent`(`nom`, `prenom`, `dateNaissance`) VALUES ('$nom','$prenom','$DateNaissance')";
    } 
    if (!empty($nom) && !empty($prenom) && !empty($DateNaissance)){
        mysqli_query($link, $query);
    }
?>
</main>
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