###### ###### ###### ###### ###### ######
# Faire une todo list avec PHP et MySQL #
###### ###### ###### ###### ###### ######

*  `Dans phpMyAdmin, créez une nouvelle BDD todos et créez une nouvelle table todo avec les champs id, name, content, done (true/false). (EN SQL) `

* ` Dans PHP, créez un nouveau dossier todos. `

* `Dans ce dossier, créez les fichiers index.php, create.php, update.php, update_status.php, delete.php. `

* `Le fichier index.php récupérera les todos de votre BDD et les affichera sous forme de liste. `

* ` Chaque ligne affichée doit avoir des boutons d'action "Modifier", "Supprimer" et "Terminer" `

*  `Le fichier create.php affichera un formulaire POST de création d'un todo, et permettra de traiter les infos envoyées par ce dernier pour les insérer en BDD `

*  `Le fichier update.php affichera un formulaire POST de modification d'un todo, déjà rempli avec les données correspondantes et permettra également de traiter les infos pour les modifier en BDD `

* ` Le fichier delete.php n'a pas d'affichage, il traite juste la suppression d'un todo grâce un id passé en query param. `

* ` Après un create, update ou delete, il faut une redirection automatique vers index.php `