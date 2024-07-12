
# Framework Php Construit à partir de zéro

Il s'agit d'un framework MVC simple pour construire des applications web en PHP. Il est gratuit et [open-source](LICENSE).

Ce framework est construit pour servir aussi ceux qui ne maitrise pas encore les termes techniques anglais et qui veulent vite apprendre comment un framework MVC se cronstruit, du moins la base à connaitre pour avoir une connaissance approfondie des frameworks PHP populaires tels que Laravel, Symfony ...

## Comment faire fonctionner ce framework

1. Tout d'abord, téléchargez le framework, soit directement, soit en clonant le dépot.
1. Exécutez **composer install** pour installer les dépendances du projet.
1. Configurez votre serveur web (dans WAMP, XAMPP,....) pour que le dossier **publique** soit la racine du site web.
1. Ouvrez [Application/Configuration.php](Application/Configuration.php) puis entrez les données de configuration de votre base de données.
1. Entrer l'url **http://localhost/** dans votre navigateur et Booom! le message "Bienvenu" apparait.
1. vous pouvez maintenant par vous même créez des routes, ajoutez des contrôleurs, des vues et des modèles.

## Configuration

Les paramètres de configuration sont stockés dans la classe [Application/Configuration.php](Application/Configuration.php).

Les paramètres par défaut comprennent les données de connexion à la base de données et un paramètre permettant d'afficher ou de masquer les détails des erreurs.

Vous pouvez également y ajouter vos propres paramètres de configuration.

Vous pouvez accéder aux paramètres en appelant (par exemple) : `\Application\Configuration::HOTE_OU_SE_TROUVE_MYSQL` dans votre code.
