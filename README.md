## LIEN API

http://127.0.0.1:8000/

## INSTRUCTIONS D'INSTALLATION

A - Importer Base de Données :&nbsp;

1 - Ouvrir Terminale et créer une table avec le commande : "psql -c "create database NOM_DATABASE" avec NOM_DATABASE comme vous preferez&nbsp;

2 - Importer la base de donnée de ce folder : "psql -d NOM_DATABASE -f account.sql"

B - Config la base de donnée :
HOST = localhost&nbsp;

PORT = 5432&nbsp;

DATABASE = NOM_DATABASE (le nom que vous avez choisi)&nbsp;

USERNAME = tungduongpham&nbsp;

DB_PASSWORD=&nbsp;

C - Run API :&nbsp;

1 - Ouvrir Terminal depuis folder que vous avez pull&nbsp;

2 - Tapez "php artisan serve"&nbsp;

## Schéma de Table de donnée :

prenom varchar(20) notnull,&nbsp;

nom varchar(20) notnull,&nbsp;

email varchar(30) notnull,&nbsp;

mdp varchar(30) notnull,&nbsp;

mdp_confirme varchar(30) notnull&nbsp;


## Utilisation :

A - Pour créer un compte :
Lien : http://127.0.0.1:8000/post avec la méthode POST <br/>
Pour le Body :&nbsp;

prenom, nom, email, mdp, mdp_sure&nbsp;

tout ne doit pas être null ou empty&nbsp;

email doit suivi FILTER_VALIDATE_EMAIL (avec '@' et un lien après '@')&nbsp;

mot de passe et mot de passe confirme doit être identique.&nbsp;

Si l'email existe déjà dedans la base de donnée => EMAIL est déjà utilisé et vous ne pouvez pas l'utiliser.&nbsp;

Sinon, le compte sera enregistré dans la base de donnée.

B - Pour login le compte :&nbsp;

Lien : http://127.0.0.1:8000/login avec la méthode POST&nbsp;

Pour le Body :&nbsp;

email, mdp&nbsp;

Email ET mot de passe doit EXISTE dans la base de donnée => Correct&nbsp;

Sinon => Invalide mot de passe ou le compte n'existe pas
