<?php
$link = mysqli_connect('mysql-mezouar.alwaysdata.net', 'mezouar', '***', 'mezouar_club'); 
if (!$link) {
    die("Connexion échouée : " . mysqli_connect_error());
}
?>