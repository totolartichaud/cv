<?php
if(isset($_POST['enregistrermoi'])) {
  $inject = $bdd->prepare("UPDATE moi SET prenom = ?, nom = ?, date_de_naissance = ?, travail = ?, mail = ?, numero = ?, qui_je_suis = ? WHERE id = 1");
  $inject->execute([
    $_POST['prenom'],
    $_POST['nom'],
    $_POST['datedenaissance'],
    $_POST['travail'],
    $_POST['mail'],
    $_POST['numero'],
    $_POST['quijesuis']
  ]);
}

if(isset($_POST['ajoutercompetence'])) {
  $inject = $bdd->prepare("INSERT INTO competences(nom) VALUES(?)");
  $inject->execute([
    $_POST['nom']
  ]);
}

if(isset($_POST['ajouterprojet'])) {
  $inject = $bdd->prepare("INSERT INTO projets(nom, description) VALUES(?, ?)");
  $inject->execute([
    $_POST['nom'],
    $_POST['description']
  ]);
}

if(isset($_POST['ajouterformation'])) {
  if(empty($_POST['datediplome'])) {
    $datediplome = null;
  } else {
    $datediplome = $_POST['datediplome'];
  }
  $inject = $bdd->prepare("INSERT INTO formations(nom, date_diplome, etablissement) VALUES(?, ?, ?)");
  $inject->execute([
    $_POST['nom'],
    $datediplome,
    $_POST['etablissement']
  ]);
}

if(isset($_POST['ajouterexperience'])) {
  if(empty($_POST['datefin'])) {
    $datefin = null;
  } else {
    $datefin = $_POST['datefin'];
  }
  $inject = $bdd->prepare("INSERT INTO experiences(nom, date_debut, date_fin, etablissement) VALUES(?, ?, ?, ?)");
  $inject->execute([
    $_POST['nom'],
    $_POST['datedebut'],
    $datefin,
    $_POST['etablissement']
  ]);
}

foreach($_POST as $key => $value) {
  if(explode('-', $key)[0] == 'enregistrercompetence') {
    $inject = $bdd->prepare("UPDATE competences SET nom = ? WHERE id = ?");
    $inject->execute([
      $_POST['nom'],
      explode('-', $key)[1]
    ]);
  }
  if(explode('-', $key)[0] == 'enregistrerprojet') {
    $inject = $bdd->prepare("UPDATE projets SET nom = ?, description = ? WHERE id = ?");
    $inject->execute([
      $_POST['nom'],
      $_POST['description'],
      explode('-', $key)[1]
    ]);
  }
  if(explode('-', $key)[0] == 'enregistrerformation') {
    $inject = $bdd->prepare("UPDATE formations SET nom = ?, date_diplome = ?, etablissement = ? WHERE id = ?");
    $inject->execute([
      $_POST['nom'],
      $_POST['datediplome'],
      $_POST['etablissement'],
      explode('-', $key)[1]
    ]);
  }
  if(explode('-', $key)[0] == 'enregistrerexperience') {
    $inject = $bdd->prepare("UPDATE experiences SET nom = ?, date_debut = ?, date_fin = ?, etablissement = ? WHERE id = ?");
    $inject->execute([
      $_POST['nom'],
      $_POST['datedebut'],
      $_POST['datefin'],
      $_POST['etablissement'],
      explode('-', $key)[1]
    ]);
  }
  if(explode('-', $key)[0] == 'supprimercompetence') {
    $inject = $bdd->prepare("DELETE FROM competences WHERE id = ?");
    $inject->execute([
      explode('-', $key)[1]
    ]);
  }
  if(explode('-', $key)[0] == 'supprimerprojet') {
    $inject = $bdd->prepare("DELETE FROM projets WHERE id = ?");
    $inject->execute([
      explode('-', $key)[1]
    ]);
  }
  if(explode('-', $key)[0] == 'supprimerformation') {
    $inject = $bdd->prepare("DELETE FROM formations WHERE id = ?");
    $inject->execute([
      explode('-', $key)[1]
    ]);
  }
  if(explode('-', $key)[0] == 'supprimerexperience') {
    $inject = $bdd->prepare("DELETE FROM experiences WHERE id = ?");
    $inject->execute([
      explode('-', $key)[1]
    ]);
  }
  if(explode('-', $key)[0] == 'supprimermail') {
    $inject = $bdd->prepare("DELETE FROM mailbox WHERE id = ?");
    $inject->execute([
      explode('-', $key)[1]
    ]);
  }
}
?>
