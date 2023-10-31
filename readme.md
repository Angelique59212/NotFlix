**Vous êtes responsable du développement d'une plateforme de streaming vidéo similaire à Netflix ici NotFlix.**

L'application permettra aux utilisateurs de visionner des films et des séries télévisées en fonction de leur abonnement.

Vous devez mettre en place un système de contrôle d'accès solide pour gérer les privilèges des utilisateurs en fonction de leur abonnement et de leur rôle dans la plateforme.

**Tâches à effectuer :**

- _Concevez une base de données pour stocker les informations sur les utilisateurs, les vidéos, les abonnements et les historiques de visionnage._

- _Implémentez un système d'authentification permettant aux utilisateurs de s'inscrire, de se connecter et de se déconnecter._

- _Crud des vidéos_

- _Définissez trois types d'utilisateurs : "utilisateur gratuit", "utilisateur premium" et "administrateur"._


- Utilisez des "voters" pour contrôler l'accès aux vidéos en fonction du type d'abonnement de l'utilisateur.

    -Par exemple, les utilisateurs gratuits ne peuvent accéder qu'à un contenu limité, tandis que les utilisateurs premium ont accès à l'intégralité de la bibliothèque de vidéos.

- Mettez en place des restrictions pour limiter le nombre de périphériques sur lesquels un utilisateur peut regarder simultanément du contenu en fonction de son abonnement.

- Personnalisez les messages d'erreur pour éviter d'afficher des informations sensibles aux utilisateurs non autorisés ou des redirections.

Livrables attendus :

Un système d'authentification fonctionnel avec différents niveaux de privilèges pour les utilisateurs.

L'implémentation de "voters" Symfony pour contrôler l'accès au contenu en fonction des abonnements des utilisateurs.

Des exemples de restrictions mises en place pour limiter l'accès au contenu en fonction du type d'abonnement.