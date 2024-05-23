# voyage

Vous trouverez un dossier react pour le front et un autre symfony pour le back

cahier des cahrge du brief

Votre application va être composée de plusieurs couches.
Vous avez la partie accessible par le grand public sur internet, qui sera construite grâce à Next et
React.
De l’autre côté, vous aurez la partie d’administration qui sera gérée directement avec Symfony.
Vous devrez donc construire à la fois la partie administration, et la partie API, qu’utilisera Next pour
hydrater ses vues.
1. Contexte
Vous devez construire un site qui présente les différents voyages que l’agence cliente propose. Ce
site accessible au tout public servira à présenter les voyages, permettra de les cherches par
catégories, par pays et par durée. Il sera possible au visiteur de prendre contact via un formulaire, en
choisissant le voyage qui l’intéresse pour être recontacté ultérieurement par l’agence.
De leur côté les administrateurs pourront gérer les voyages, en ajouter, les modifier ou les
supprimer. Il pourront également voir toutes les demandes de contact, et en changer le statut (non
lue, en cours, annulée, acceptée).
2. API
Le serveur front pourra appeler l’API pour afficher les informations relatives aux différents voyages
proposés par l’agence.
Aucun ajout, modification ou suppression ne pourra être réalisé par API sur les voyages.
Les prises de contact seront envoyées par API.
3. Administration
La partie administration, accessible directement depuis l’adresse du serveur back, sera construite
avec symfony et twig. Elle ne sera accessible que par les utilisateurs avec un rôle admin ou éditeur.
Les admins pourront faire toutes les actions possibles sur les voyages, les utilisateurs et les prises de
contact.
Les éditeurs ne pourront que créer de nouveaux voyages, et modifier ou supprimer ceux qu’ils ont
déjà créé. Ils pourront toutefois voir ceux des autres, sans pouvoir les modifier ou supprimer.
Depuis l’espace des éditeurs, ils pourront choisir de filtrer les voyages pour ne voir que les leurs.
Chaque utilisateur quelque soit son rôle pourra modifier son compte (nom, prénom, mail, téléphone,
mot de passe).
4. Interface grand public
Conçue avec Next + React, l’interface accessible à tous sera sur un autre serveur. Lui seul aura le
droit de contacter l’API du serveur back.
Cette interface devra mettre en valeur les voyages, présenter rapidement sur la page d’accueil les
derniers voyages, l’agence, et inviter à une prise de contact.
Une seconde page, pour voir la liste de tous les voyages, permettra de les cherches par catégories,
par pays et par durée.
Une troisième page permettra de prendre contact avec les gestionnaires du site.
Enfin, chaque voyage aura sa propre page, qui le présentera en détail.
5. Technique
• Les mots de passes sont chiffrés.
• L’API n’est accessible que par le site front.
• L’administration ne sera accessible qu’aux admins et éditeurs connectés.
• Les éditeurs auront des accès restreints par rapport aux admins. Ils ne pourront que voir tous
les voyages, éditer et supprimer les leurs, en créer de nouveaux.
6. Options
• Paginer les résultats pour la liste des voyages, à 12 par page.
• Les éditeurs peuvent voir les prises de contact liées à leurs voyages.
• Les admins et les éditeurs peuvent répondre aux prises de contact depuis l’interface. Cela
envoie un mail à la personne intéressée.
• Les utilisateurs peuvent se connecter depuis le site front. Depuis ce site, ils peuvent :
◦ voir/modifier/supprimer leur compte.
◦ Voir les réponses et répondre à ses prises de contact.
