## LIEN API

http://127.0.0.1:8000/

## INSTRUCTIONS D'INSTALLATION

A - Importer Base de Données :
1 - Ouvrir Terminale et créer une table avec le commande : "psql -c "create database NOM_DATABASE" avec NOM_DATABASE comme vous preferez
2 - Importer la base de donnée de ce folder : "psql -d NOM_DATABASE -f account.sql"

B - Config la base de donnée :
HOST = localhost
PORT = 5432
DATABASE = NOM_DATABASE (le nom que vous avez choisi)
USERNAME = tungduongpham
DB_PASSWORD=

C - Run API :
1 - Ouvrir Terminal depuis folder que vous avez pull
2 - Tapez "php artisan serve"

## Schéma de Table de donnée :

prenom varchar(20) notnull,
nom varchar(20) notnull,
email varchar(30) notnull,
mdp varchar(30) notnull,
mdp_confirme varchar(30) notnull

## Utilisation :

A - Pour créer un compte :
Lien : http://127.0.0.1:8000/post avec la méthode POST
Pour le Body :
prenom, nom, email, mdp, mdp_sure
tout ne doit pas être null ou empty
email doit suivi FILTER_VALIDATE_EMAIL (avec '@' et un lien après '@')
mot de passe et mot de passe confirme doit être identique.
Si l'email existe déjà dedans la base de donnée => EMAIL est déjà utilisé et vous ne pouvez pas l'utiliser.
Sinon, le compte sera enregistré dans la base de donnée.

B - Pour login le compte :
Lien : http://127.0.0.1:8000/login avec la méthode POST
Pour le Body :
email, mdp
Email ET mot de passe doit EXISTE dans la base de donnée => Correct
Sinon => Invalide mot de passe ou le compte n'existe pas
