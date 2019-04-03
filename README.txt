Titre du Projet:

Ce projet est un prototype d'Application de gestion et planification
des vols pour l'aéroport de Marseille en provins, afin de montrer le potentiel que représente une
application moderne en remplacement de l'outil vieillissant utilisé jusqu'à présent.

Comment lancé l'application:

git clone https://github.com/KevCheri/Aeroport:monDossier
En utilisant cette commande, cela va créer un répertoire appelé monDossier dans lequel sera téléchargé
le contenu du repository. Si vous souhaitez créer un répertoire spécifique, il suffit de l'indiquer en deuxième argument de la commande.

Prérequis:

Effectué la commande php bin/console d:s:u --force pour mettre en place une base de donnée.
Sinon utilisé mon export de BDD déjà créer.


Comment lançé le projet:

Une fois le projet installé, effectué la commande php bin/console server:start pour pouvoir visualiser
l'application sur le locahost.


Comment utilisé l'application:

Pour cette application, il était notifié que l'on devait avoir un responsable qui pouvait avoir un oeil sur
son aeroport, un gestionnaire qui pourra affecter les pilotes de l'aeroport à un vol, ainsi que précisé l'avion
qui effectuera ce vol en question.
Le pilote qui pourra affiché les vols qui lui seront attribués.
Et les Passagers qui peuvent s'enregistrer sur l'application, et également réserver un vol.

Dans cet application, il existe plusieurs niveaux de hiérarchie:
    - Le SUPER_ADMIN
    - Le RESPONSABLE
    - Le GESTIONNAIRE
    - Le PASSAGER

LE SUPER_ADMIN:
    En utilisant la base de donnée EXPORTER, vous avez accès à la partie SUPER_ADMIN qui a été créer directement
dans le cmd(terminal) avec fosuser --create -super admin.
En vous dirigeant vers le localhost vous serez redirigez vers une page LOGIN,
USERNAME : Kevin
PASSWORD: root
Vous serez redirigez par la suite vers le tableau de bord de l'admin, qui verra des boutons, qui vont mener à différent formulaires
qui pourront créer les différents poste de l'aéroport. Vous pouvez de vous même créer de nouveau responsable et de nouveau gestionnaire
pour pouvoir essayer la suite. L'admin à ensuite une autre tache, qui est d'aller en base de donner et activer le nouveau compte créer.
Vous pourrez voir que dans le formulaire il n'est pas demandé de PASSWORD, le password à été mit en "dur" directement dans le code, pour générer un mot de passe
par défault "azerty". En poussant ce projet, un mail sera envoyé au gestionnaire ou au responsable pour pouvoir changer le mot de passe lui même (cette fonction n'a pas été mit en place).

LE GESTIONNAIRE:
    Même principe pour le gestionnaire, qui lui accèdera à un formulaire pour la création du vol, en affectant un pilote et un avion.
Cependant l'accès à l'application pour le gestionnaire à été donner par le super-admin qui la créer en amont.
USERNAME : Onareussi
PASSWORD: azerty
Une fois sur le tableau de bord vous aurez accès au bouton qui va mené vers le formulaire qui mettra en place le nouveau vol.

LE RESPONSABLE:
    Le traitement pour un gestionnaire et un responsable est le même concernant sa création.
USERNAME:baumghartner
PASSWORD:azerty
Vous pourrez ainsi accéder au tableau de bord du responsable.

LE PASSAGER:
    Vous pouvez creer un passager en vous enregistrant sur la page /home de l'application sans aucun utilisateurs connecté.
Pour se faire, cliquez sur Enregistrer puis renseignez les informations du passager pour que l'utilisateur soit envoyé en base de donné.
Aussitôt cliquez aussitôt créer ! Vous avez désormais accès aux onglets du site, ainsi que des boutons précisant les routes sur lesquelles vous devez vous
dirigez pour effectuer les traitements.
Les onglets "Mes vols" et "reservation" ne sont pas actifs pour les autres admins du site.

Fais avec:

Ce projet à été fait avec l'aide du framework SYMFONY 4 et non symfony 2.0 comme notifié dans la consigne,
j'ai pris l'entière responsabilité de l'effectué avec la version 4 car pour moi, le métier du développeur informatique est
un métier en constante évolution, nous devons nous adapté aux nouvelles version, bien plus maniables.

J'ai également inséré du JQUERY avec datatables.net pour effectuer les paginations (dans un listing pour utilisateur).

Et du Bootstrap CDN.


Versioning

J'ai utilisé Github pour mener à bien ce projet

Autheur

CHERI-ZECOTE Kévin

Fait pour

USTS

Test d'entrée

