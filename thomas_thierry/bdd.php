<?php
try {
    $bdd = new PDO('mysql:dbname=thomas;host=localhost;charset=utf8', 'root', '');
} catch (PDOException $e) {
    echo 'Impossible de se connecter : ' . $e->getMessage();
}
?>
