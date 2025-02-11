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
<header>
        <div class="header">
        <a href="search.php" class="lien_header">Site dynamique en PHP</a>
        <a href="logout.php" class="Bouton_deconnection">Se déconnecter</a>
        </div>
    </header>
<?php
    session_start();
    if (isset($_SESSION['login']) && isset($_SESSION['pwd'])){


    
$id=$_GET["id"];
$adherent=mysqli_fetch_assoc(mysqli_query($link,"SELECT * FROM `adherent` WHERE `id` = $id"));
$nom = $adherent["nom"];
$prenom = $adherent["prenom"];
$dateNaissance = $adherent["dateNaissance"];
?>
<main>
    <h1>Modifier élément</h1>
    <form action="#" method="POST">
        <label for="nom">Nom :</label>
        <textarea name="nom" id="nom" required><?php echo $nom; ?></textarea>
        <label for="prenom">Prénom :</label>
        <textarea name="prenom" id="prenom" required><?php echo $prenom; ?></textarea>
        <label for="DateNaissance">Date de naissance :</label>
        <input type="date" name="DateNaissance" id="DateNaissance" required value="<?php echo $dateNaissance; ?>">
        <input type="submit" value="Modifier">
    </form>
    <?php 
    if(!empty($_POST)){
    mysqli_query($link,"UPDATE `adherent` SET `nom`='".$_POST["nom"]."',`prenom`='".$_POST["prenom"]."',`dateNaissance`='".$_POST["DateNaissance"]."' WHERE id = ". $id);
    }}
    ?>
</main>
<?php
else{
    echo 'Vous n\'êtes pas autorisé à consulter cette page, <strong> veuillez vous identifer !!! </strong>';
    echo "<br> <br> Vous serez redirigé dans 5secondes. Sinon cliquez sur le lien <a href='index.html'>Formulaire de connexion</a>";
    header("refresh:5;url=index.html");
}
?>
</body>
</html>