<?php require_once('bdd.php'); ?>
<?php require_once('modifier.php');
session_start();
require_once('requetes.php');
setlocale (LC_TIME, 'fr_FR.utf8','fra');
date_default_timezone_set("Europe/Paris");

if(!isset($_SESSION['user'])) {
  if(isset($_POST['connexion'])) {
    if($_POST['user'] == 'thomas' && $_POST['mdp'] == 'thomas33') {
      $_SESSION['user'] = $_POST['user'];
    }
  }
} else {
  if(isset($_POST['deconnexion'])) {
    session_unset();
    session_destroy();
  }
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
  <body class="text-white d-flex flex-column">
    <?php if(isset($_SESSION['user'])) { ?>
      <h1 class="text-center my-3">Dashboard</h1>
      <form method="post">
        <button class="btn bg-white text-dark-blue d-table mx-auto mb-3" type="submit" name="deconnexion">Déconnexion</button>
      </form>
      <article class="bg-dark-blue p-5">
        <h2>Moi</h2>
        <?php if(isset($_POST['modifiermoi'])) { ?>
          <form class="form-inline w-75" action="admin.php" method="post">
            <ul class="list-unstyled mt-3 w-100">
                <li><span class="font-weight-bold">Prénom : </span><input class="form-control" type="text" name="prenom" value="<?php echo $moi['prenom'] ?>"></li>
                <li class="mt-2"><span class="font-weight-bold">Nom : </span><input class="form-control" type="text" name="nom" value="<?php echo $moi['nom'] ?>"></li>
                <li class="mt-2"><span class="font-weight-bold">Date de naissance : </span><input class="form-control" type="text" name="datedenaissance" value="<?php echo $moi['date_de_naissance'] ?>"></li>
                <li class="mt-2"><span class="font-weight-bold">Travail : </span><input class="form-control" type="text" name="travail" value="<?php echo $moi['travail'] ?>"></li>
                <li class="mt-2"><span class="font-weight-bold">Mail : </span><input class="form-control" type="text" name="mail" value="<?php echo $moi['mail'] ?>"></li>
                <li class="mt-2"><span class="font-weight-bold">Numéro : </span><input class="form-control" type="text" name="numero" value="<?php echo $moi['numero'] ?>"></li>
                <li class="mt-2"><span class="font-weight-bold">Qui je suis : </span><textarea class="form-control w-100" name="quijesuis"><?php echo $moi['qui_je_suis'] ?></textarea></li>
            </ul>
            <button class="btn btn-success" type="submit" name="enregistrermoi">Enregistrer</button>
          </form>
        <?php } else { ?>
          <ul class="list-unstyled mt-3">
              <li><span class="font-weight-bold">Prénom : </span><?php echo $moi['prenom'] ?></li>
              <li class="mt-2"><span class="font-weight-bold">Nom : </span><?php echo $moi['nom'] ?></li>
              <li class="mt-2"><span class="font-weight-bold">Date de naissance : </span><?php echo $moi['date_de_naissance'] ?></li>
              <li class="mt-2"><span class="font-weight-bold">Travail : </span><?php echo $moi['travail'] ?></li>
              <li class="mt-2"><span class="font-weight-bold">Mail : </span><?php echo $moi['mail'] ?></li>
              <li class="mt-2"><span class="font-weight-bold">Numéro : </span><?php echo $moi['numero'] ?></li>
              <li class="mt-2"><span class="font-weight-bold">Qui je suis : </span><?php echo $moi['qui_je_suis'] ?></li>
          </ul>
          <form action="admin.php" method="post">
            <button class="btn btn-primary" type="submit" name="modifiermoi">Modifier</button>
          </form>
        <?php } ?>
      </article>
      <div class="d-flex flex-wrap flex-md-nowrap">
        <article class="p-5 w-100">
          <h2>Compétences</h2>
          <ul class="list-unstyled mt-3">
            <?php foreach ($competences as $competence) { ?>
              <li class="mt-2">
                <?php if(isset($_POST['modifiercompetence-'.$competence['id']])) { ?>
                  <form class="form-inline" action="admin.php" method="post">
                    <input class="form-control" type="text" name="nom" value="<?php echo $competence['nom'] ?>">
                    <button class="btn btn-success ml-2" type="submit" name="enregistrercompetence-<?php echo $competence['id'] ?>">Enregistrer</button>
                  </form>
                <?php } else { ?>
                  <form action="admin.php" method="post">
                    <?php echo $competence['nom'] ?>
                    <button class="btn btn-primary ml-2" type="submit" name="modifiercompetence-<?php echo $competence['id'] ?>">Modifier</button>
                    <button class="btn btn-danger" type="submit" name="supprimercompetence-<?php echo $competence['id'] ?>">Supprimer</button>
                  </form>
                <?php } ?>
              </li>
            <?php }
            if(isset($_POST['ajoutcompetence'])) { ?>
              <form class="form-inline mt-2" action="admin.php" method="post">
                <input class="form-control" type="text" name="nom" placeholder="Nom de la compétence">
                <button class="btn btn-success ml-2" type="submit" name="ajoutercompetence">Ajouter</button>
              </form>
            <?php }  else { ?>
              <form class="form-inline mt-2" action="admin.php" method="post">
                <button class="btn btn-info" type="submit" name="ajoutcompetence">Ajouter une compétence</button>
              </form>
            <?php } ?>
          </ul>
        </article>

        <article class="bg-dark-blue p-5 w-100">
          <h2>Projets</h2>
          <ul class="list-unstyled mt-3">
            <?php foreach ($projets as $projet) { ?>
              <li class="mt-2">
                <?php if(isset($_POST['modifierprojet-'.$projet['id']])) { ?>
                  <form action="admin.php" method="post">
                    <input class="form-control" type="text" name="nom" value="<?php echo $projet['nom'] ?>">
                    <textarea class="form-control mt-2" name="description" placeholder="Description ou vide"><?php echo $projet['description'] ?></textarea>
                    <button class="btn btn-success mt-2" type="submit" name="enregistrerprojet-<?php echo $projet['id'] ?>">Enregistrer</button>
                  </form>
                <?php } else { ?>
                  <form action="admin.php" method="post">
                    <span class="font-weight-bold"><?php echo $projet['nom'] ?></span>
                    <p><?php echo $projet['description'] ?></p>
                    <button class="btn btn-primary" type="submit" name="modifierprojet-<?php echo $projet['id'] ?>">Modifier</button>
                    <button class="btn btn-danger" type="submit" name="supprimerprojet-<?php echo $projet['id'] ?>">Supprimer</button>
                  </form>
                <?php } ?>
              </li>
            <?php }
            if(isset($_POST['ajoutprojet'])) { ?>
              <form class="mt-2" action="admin.php" method="post">
                <input class="form-control" type="text" name="nom" placeholder="Nom du projet">
                <textarea class="form-control mt-2" name="description" placeholder="Description ou vide"></textarea>
                <button class="btn btn-success mt-2" type="submit" name="ajouterprojet">Ajouter</button>
              </form>
            <?php }  else { ?>
              <form class="form-inline mt-2" action="admin.php" method="post">
                <button class="btn btn-info" type="submit" name="ajoutprojet">Ajouter un projet</button>
              </form>
            <?php } ?>
          </ul>
        </article>
      </div>

      <div class="d-flex flex-wrap flex-md-nowrap">
        <article class="bg-dark-blue p-5 w-100">
          <h2>Formations</h2>
          <ul class="list-unstyled mt-3">
            <?php foreach ($formations as $formation) { ?>
              <li class="mt-2">
                <?php if(isset($_POST['modifierformation-'.$formation['id']])) { ?>
                  <form action="admin.php" method="post">
                    <input class="form-control" type="text" name="nom" value="<?php echo $formation['nom'] ?>">
                    <input class="form-control mt-2" type="text" name="datediplome" placeholder="Date en format 2019-05-21 ou vide si pas encore obtenu" value="<?php echo $formation['date_diplome'] ?>">
                    <input class="form-control mt-2" type="text" name="etablissement" value="<?php echo $formation['etablissement'] ?>">
                    <button class="btn btn-success mt-2" type="submit" name="enregistrerformation-<?php echo $formation['id'] ?>">Enregistrer</button>
                  </form>
                <?php } else { ?>
                  <form action="admin.php" method="post">
                    <span class="font-weight-bold"><?php echo $formation['nom'] ?></span>
                      <?php
                      if($formation['date_diplome'] !== null) { ?>
                        <p class="m-0 font-italic"><?php echo $formation['date_diplome'] ?></p>
                      <?php } else { ?>
                        <p class="m-0 font-italic"><?php echo "Pas de date de diplôme" ?></p>
                      <?php }
                      ?>
                    <p><?php echo $formation['etablissement'] ?></p>
                    <button class="btn btn-primary" type="submit" name="modifierformation-<?php echo $formation['id'] ?>">Modifier</button>
                    <button class="btn btn-danger" type="submit" name="supprimerformation-<?php echo $formation['id'] ?>">Supprimer</button>
                  </form>
                <?php } ?>
              </li>
            <?php }
            if(isset($_POST['ajoutformation'])) { ?>
              <form class="mt-2" action="admin.php" method="post">
                <input class="form-control" type="text" name="nom" placeholder="Nom du projet">
                <input class="form-control mt-2" type="text" name="datediplome" placeholder="Date en format 2019-05-21 ou vide si pas encore obtenu">
                <input class="form-control mt-2" type="text" name="etablissement" placeholder="Etablissement">
                <button class="btn btn-success mt-2" type="submit" name="ajouterformation">Ajouter</button>
              </form>
            <?php }  else { ?>
              <form class="form-inline mt-2" action="admin.php" method="post">
                <button class="btn btn-info" type="submit" name="ajoutformation">Ajouter une formation</button>
              </form>
            <?php } ?>
          </ul>
        </article>

        <article class="p-5 w-100">
          <h2>Expériences</h2>
          <ul class="list-unstyled mt-3">
            <?php foreach ($experiences as $experience) { ?>
              <li class="mt-2">
                <?php if(isset($_POST['modifierexperience-'.$experience['id']])) { ?>
                  <form action="admin.php" method="post">
                    <input class="form-control" type="text" name="nom" value="<?php echo $experience['nom'] ?>">
                    <input class="form-control mt-2" type="text" name="datedebut" placeholder="Date en format 2019-05-21" value="<?php echo $experience['date_debut'] ?>">
                    <input class="form-control mt-2" type="text" name="datefin" placeholder="Date en format 2019-05-21 ou vide si en cours" value="<?php echo $experience['date_fin'] ?>">
                    <input class="form-control mt-2" type="text" name="etablissement" value="<?php echo $experience['etablissement'] ?>">
                    <button class="btn btn-success mt-2" type="submit" name="enregistrerexperience-<?php echo $experience['id'] ?>">Enregistrer</button>
                  </form>
                <?php } else { ?>
                  <form action="admin.php" method="post">
                    <span class="font-weight-bold"><?php echo $experience['nom'] ?></span>
                      <?php
                      if($experience['date_fin'] !== null) { ?>
                        <p class="m-0 font-italic"><?php echo "Du ".$experience['date_debut']." au ".$experience['date_fin'] ?></p>
                      <?php } else { ?>
                        <p class="m-0 font-italic"><?php echo "Du ".$experience['date_debut']." à aujourd'hui" ?></p>
                      <?php }
                      ?>
                    <p><?php echo $experience['etablissement'] ?></p>
                    <button class="btn btn-primary" type="submit" name="modifierexperience-<?php echo $experience['id'] ?>">Modifier</button>
                    <button class="btn btn-danger" type="submit" name="supprimerexperience-<?php echo $experience['id'] ?>">Supprimer</button>
                  </form>
                <?php } ?>
              </li>
            <?php }
            if(isset($_POST['ajoutexperience'])) { ?>
              <form class="mt-2" action="admin.php" method="post">
                <input class="form-control" type="text" name="nom" placeholder="Nom du projet">
                <input class="form-control mt-2" type="text" name="datedebut" placeholder="Date en format 2019-05-21">
                <input class="form-control mt-2" type="text" name="datefin" placeholder="Date en format 2019-05-21 ou vide si en cours">
                <input class="form-control mt-2" type="text" name="etablissement" placeholder="Etablissement">
                <button class="btn btn-success mt-2" type="submit" name="ajouterexperience">Ajouter</button>
              </form>
            <?php }  else { ?>
              <form class="form-inline mt-2" action="admin.php" method="post">
                <button class="btn btn-info" type="submit" name="ajoutexperience">Ajouter une expérience</button>
              </form>
            <?php } ?>
          </ul>
        </article>
      </div>

      <article class="p-5">
        <h2>Mes messages</h2>
        <ul class="list-unstyled mt-3">
          <?php foreach ($mails as $mail) { ?>
            <form action="admin.php" method="post">
              <h4><?php echo $mail['titre'] ?></h4>
              <p>De <?php echo $mail['mail'] ?> le <?php echo date('d/m/Y \à H:i', strtotime($mail['date'])) ?></p>
              <p><?php echo $mail['message'] ?></p>
              <button class="btn btn-danger d-block mx-auto" type="submit" name="supprimermail-<?php echo $mail['id'] ?>">Supprimer</button>
            </form>
          <?php } ?>
        </ul>
      </article>
    <?php } else { ?>
      <form class="w-75 p-5 mx-auto" method="post">
        <input class="form-control mt-2" type="text" name="user" placeholder="User">
        <input class="form-control mt-2" type="password" name="mdp" placeholder="mdp">
        <button class="btn mt-2 bg-white text-dark-blue mx-auto d-table" type="submit" name="connexion">Connexion</button>
      </form>
    <?php } ?>
  </body>
</html>
