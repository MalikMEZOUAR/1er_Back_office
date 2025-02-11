<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification de login</title>
</head>
<body>
    <?php
    define("LOGIN","toto");
    define("PASSWORD","1234");

    if(isset($_POST['login']) && isset($_POST['pwd'])){
        if (LOGIN == $_POST['login'] && PASSWORD == $_POST['pwd']){
            session_start();
            $_SESSION["login"]=$_POST["login"];
            $_SESSION["pwd"]=$_POST["pwd"];
            header('location: search.php');
        }
        else{
            echo '<body onLoad="alert(\'Membre non reconnu...\')">';
            echo "<br><br>Vous serez redirigé dans 5secondes. Sinon cliquez sur le lien <a href='index.html'>Formulaire de connexion</a>";
            header("refresh:5;url=form.html");
        }
    }
    else{
        echo 'Vous n\'êtes pas autorisé à consulter cette page, <strong> veuillez vous indentifier !!! </strong> ';
        header("refresh:5; url=index.html");
    }
    ?>
</body>
</html>