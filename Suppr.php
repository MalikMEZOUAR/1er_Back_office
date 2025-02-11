<?php

include_once("lien_bdd.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['id'])) {
    $id = htmlentities($_POST['id']);
    $query = "DELETE FROM `adherent` WHERE `id` = $id";
    mysqli_query($link, $query);
}
?>