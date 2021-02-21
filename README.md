---
title: my title
author: my name
date: today
---
# Mini-projet web

## Principe
Le site est un formulaire donnant à la personne inscrite son signe astrologique ainsi que son élément en fonction de sa date de naissance. 
Un système d'envoi de mail a également été intégré (pas compatible avec toutes les boites mail : fonctionne avec une adresse ensiie.fr mais pas avec une adresse gmail.com par exemple) pour remercier l'utilisateur d'être passé sur le site.

## Structure
La structure du code a été inspiré du tp_php, on y retrouve donc les répertoires suivants :

+ des fichiers correspondant à une partie publique dans le répertoire public ;
+ un fichier index.php qui est la page principale de l’application et comprend le menu de choix ;
+ un fichier gestionSigne.php qui fait partie des contrôleurs correspondant aux différentes parties de l’application.
+ des fichiers correspondant à une partie modèle dans le répertoire src/Model :
+ un répertoire Entity contenant les classes métiers, en l’occurrence Person ;
+ un répertoire Factory qui permet de gérer le lien avec la base de données (l'utilisateur tpcurseurs a accès à notre base de données pour ce projet) ;
+ un répertoire Repository pour les requêtes à la base de données afin de créer des objets ;
+ un répertoire src/View comprenant les fichiers de la vue :
    + et notamment un fichier template.php qui sera utilisé pour créer les pages de l’application.
    + un répertoire utils permettant d’inclure les objets nécessaires au fonctionnement de l’application.

## Auteurs
Ce site a été créé par :
- Alexia Harivel 
- Barnabé Geffroy
- Clémence Clavel 
- Constant Gayet 


