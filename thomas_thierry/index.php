<?php require_once('bdd.php'); ?>
<?php require_once('requetes.php');
setlocale (LC_TIME, 'fr_FR.utf8','fra');
date_default_timezone_set("Europe/Paris");

if(isset($_POST['envoyermail'])) {
  $requete = $bdd->prepare("INSERT INTO mailbox(mail, titre, message, date) VALUES (?, ?, ?, ?)");
  $requete->execute([
    $_POST['mail'],
    $_POST['titre'],
    $_POST['message'],
    date('Y-m-d H:i:s')
  ]);
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CV <?php echo $moi['prenom']." ".$moi['nom']; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body class="text-white d-flex flex-column text-center">
    <header class="bg-dark-blue p-4">
      <h1 class="text-center"><?php echo $moi['prenom']." ".$moi['nom']; ?></h1>
      <nav class="nav justify-content-center">
        <a class="nav-link" href="#presentation">Présentation</a>
        <a class="nav-link" href="#quijesuis">Qui je suis ?</a>
        <a class="nav-link" href="#competences">Compétences</a>
        <a class="nav-link" href="#formations">Formations</a>
        <a class="nav-link" href="#experiences">Expériences</a>
        <a class="nav-link" href="#projets">Projets</a>
        <a class="nav-link" href="#contact">Contact</a>
      </nav>
    </header>
    <article class="h-40 w-100 d-flex justify-content-center align-items-center flex-wrap flex-md-nowrap py-4" id="presentation">
      <figure class="h-100 m-0 w-100">
        <img class="border-top border-bottom border-white" src="thomas.jpg" alt="Photo de Thomas Thierry" />
      </figure>
      <article class="w-100 py-3">
        <h2 class="mb-3">Informations personnelles</h2>

        <div class="card mx-auto text-dark" style="width: 18rem;">
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><?php echo $moi['travail'] ?></li>
            <li class="list-group-item"><?php echo "Né le ".strftime("%e %B %Y", strtotime($moi['date_de_naissance']))." (".$moi['age']." ans)" ?></li>
            <li class="list-group-item"><?php echo $moi['mail'] ?></li>
            <li class="list-group-item"><?php echo $moi['numero'] ?></li>
          </ul>
        </div>
      </article>
    </article>
    <article class="h-20 w-100 px-5 bg-dark-blue py-4" id="quijesuis">
      <h2>Qui je suis ?</h2>
      <p class="mb-0 px-5"><?php echo $moi['qui_je_suis']; ?></p>
    </article>
    <article class="h-40 w-100 d-flex justify-content-center align-items-center flex-wrap flex-md-nowrap py-4" id="competences">
      <article class="w-100 p-3">
        <h2 class="mb-3">Compétences</h2>

        <div class="card mx-auto text-dark" style="width: 18rem;">
          <ul class="list-group list-group-flush">
            <?php foreach ($competences as $competence) { ?>
              <li class="list-group-item"><?php echo $competence['nom'] ?></li>
            <?php } ?>
          </ul>
        </div>
      </article>
      <figure class="h-100 m-0 w-100">
        <img class="border-top border-bottom border-white" src="thomas.jpg" alt="Photo de Thomas Thierry" />
      </figure>
    </article>
    <article class="w-100 p-5 bg-dark-blue" id="formations">
      <h2 class="mb-3">Formations</h2>
      <div class="d-flex flex-wrap align-items-center justify-content-center">
        <?php foreach ($formations as $formation) { ?>
          <div class="card text-dark ml-2 mt-2" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title"><?php echo $formation['nom']; ?></h5>
              <p class="card-text mb-1 font-italic">
                <?php
                if($formation['date_diplome'] !== null) {
                  echo "Diplômé le ".$formation['date_diplome'];
                } else {
                  echo "En cours";
                }
                ?>
              </p>
              <p class="card-text"><?php echo $formation['etablissement'] ?></p>
            </div>
          </div>
        <?php } ?>
      </div>
    </article>
    <article class="w-100 p-5" id="experiences">
      <h2 class="mb-3">Expériences</h2>
      <div class="d-flex flex-wrap align-items-center justify-content-center">
        <?php foreach ($experiences as $experience) { ?>
          <div class="card text-dark ml-2 mt-2" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title"><?php echo $experience['nom']; ?></h5>
              <p class="card-text mb-1 font-italic">
                <?php
                echo "De ".$experience['date_debut'];
                if($experience['date_fin'] !== null) {
                  echo " à ".$experience['date_fin'];
                } else {
                  echo " jusqu'à aujourd'hui";
                }
                ?>
              </p>
              <p class="card-text"><?php echo $experience['etablissement'] ?></p>
            </div>
          </div>
        <?php } ?>
      </div>
    </article>
    <article class="w-100 p-5 bg-dark-blue" id="projets">
      <h2 class="mb-3">Projets</h2>
      <div class="d-flex flex-wrap align-items-center justify-content-center">
        <?php foreach ($projets as $projet) { ?>
          <div class="card text-dark ml-2 mt-2" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title"><?php echo $projet['nom']; ?></h5>
              <?php
              if($projet['description'] !== null) { ?>
                <p class="card-text"><?php echo $projet['description'] ?></p>
              <?php }
              ?>
            </div>
          </div>
        <?php } ?>
      </div>
    </article>
    <article class="w-100 p-5" id="contact">
      <h2 class="mb-3">Contact</h2>
      <form class="w-75 mx-auto" method="post" action="index.php">
        <input class="form-control" type="text" name="mail" placeholder="Votre mail">
        <input class="form-control mt-2" type="text" name="titre" placeholder="Titre de votre message">
        <textarea class="form-control mt-2" name="message" placeholder="Votre message"></textarea>
        <button class="btn btn-light bg-white mt-2" type="submit" name="envoyermail">Envoyer</button>
      </form>
    </article>
  </body>
</html>
