# Application Trucks-Mania
## Description
Fournir un site internet de service de centralisation de food trucks. Le site permettra une
recherche multicritère et la géolocalisation des food trucks.  

## Installation
1. Cloner le dépôt https://gitlab.com/internals-projects/lunel/trucks-mania.git a la racine du serveur web.
2. Mettre en place le virtualhost (exemple: http://trucks-mania.bwb).
3. Importer la base de données trucksmania.sql
4. Créer le fichier database.json dans le dossier config et le remplir avec vos informations. Exemple:
{
    "driver" : "mysql",
    "host" : "localhost",
    "port" : "3306",
    "dbname" : "trucksmania",
    "username" : "root",
    "password" : ""
}
5. Tester l'application et l'accès à la BDD avec une requette http a la racine (http://trucks-mania.bwb/), au milieu de la page, les logos des 5 derniers foodtrucks doivent défiler.
6. Vous devrez voir apparaitre le texte suivant : FRAMEWORK MVC PHP beWeb
7. Créer une clé API pour un accès aux API de Google Cloud Plateform, activer pour ce projet les API suivantes:
    Maps JavaScript API
    Places API
    Geocoding API

    Cette clé devra être remplie aux endroits adéquats

## Structure
L'application s'appuie sur le Framework framework-mvc-bwb
https://gitlab.com/fabrique-beweb/framework-mvc-bwb.git

## Fonctionnement

### Users

L'accès aux différentes fonctionnalités de l'application est dépendant du type d'utilisateur.

S'inscrire en tant que FoodTruck ou Client


#### Visiteur
Consulter une liste de FoodTrucks dans une zone géographique
Filter le résultat de la recherche par catégorie de cuisine
Consulter la carte des plats d'un FoodTruck
Géolocaliser un FoodTruck
Consulter la liste des évenements et les FoodTruck qui y participent
Consulter les avis sur un FoodTruck
Faire une demande de privatisation

#### Client
Les fonctionnalités du visiteur

Modifier son profil
Réserver un plat dans un FoodTruck
Ajouter un FoodTruck à la liste de ses favoris
Consulter la liste de ses commandes passées
Mettre en place une commande hebdomadaire automatique auprès d'un ou plusieurs FoodTruck
Laisser un avis sur un FoodTruck après une commande

#### FoodTruck
Les fonctionnalités du visiteur et du client

Se géolocaliser ou indiquer sa position selon une date
Modifier sa carte
Indiquer les évenements auxquels il participe
Consulter les avis sur ses commandes
Consulter la liste de ses commandes passées
Consulter la liste de ses commandes à venir

#### Professionnel
Les fonctionnalités du visiteur et du client

Créer un évenement et proposer aux FoodTruck d'y participer

#### Administrateur
Control total des données de l'application
Accès à une page de statistiques sur le fonctionnement de l'application
