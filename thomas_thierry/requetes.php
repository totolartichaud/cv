<?php
$moi = $bdd->query("SELECT *, FLOOR(DATEDIFF(CURRENT_DATE(), date_de_naissance)/365) AS age FROM moi WHERE id = 1");
$moi = $moi->fetch(PDO::FETCH_ASSOC);

$competences = $bdd->query("SELECT * FROM competences");
$competences = $competences->fetchAll();

$projets = $bdd->query("SELECT * FROM projets");
$projets = $projets->fetchAll();

$formations = $bdd->query("SELECT * FROM formations");
$formations = $formations->fetchAll();

$experiences = $bdd->query("SELECT * FROM experiences");
$experiences = $experiences->fetchAll();

$mails = $bdd->query("SELECT * FROM mailbox");
$mails = $mails->fetchAll();
?>
