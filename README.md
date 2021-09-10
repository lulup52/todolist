### Voici l'exercice de ToDO liste

Développé sous laravel, cette petite aplication vous permetra d'enregistrer des listes de chose a faire et de spécifier, pour cahcune d'elle, quelle tâches devront être effectuées.

### Configuratio de l'application

- Vérifier que Composer et PHP sont instalé et à jour

- Créez une nouvelle base de donnée qui servira de base à l'application

- Clonez le repo 

- A la racine, créez un fichier .env en vous servant du fichier .env.exemple comme référence et renseiginez y le DB_DATABASE (nom de la base que vous venez de créer), DB_USERNAME (un utilisateur disposant des droit complet sur votre sgbd) et le DB_PASSWORD (le mot de passe de cet utilisateur). Vérifiez également que DB_PORT contient le même port que celui que vous utilisez pour héberger vos bases de données.

- Via le terminal, rendez-vous dans le dossier racine du projet et lancer un "composer install". Puis exécutez la commande "php artisan migrate" pour initialiser la base de donnée.

- Lancez le serveur local via la commande "php artisan serv"

- Il ne vous reste plus qu'à vous rendre sur votre navigateur et taper l'adresse suivante:
http://127.0.0.1:8000/api

(note : la partie "127.0.0.1" correspond à la variable DB_HOST du fichier .env)

- Si tout c'est bien passé, vous avez maintenant accès à votre application de ToDo liste perso !

Enjoy ;)