![separe](https://github.com/studoo-app/.github/blob/main/profile/studoo-banner-logo.png)
# Symfony TP 1 - Les controllers et les routes
[![Version](https://img.shields.io/badge/Version-2025-blue)]()
[![Niveau](https://img.shields.io/badge/Niveau-SIO2-yellow)]()

## 1. Contexte professionnel

Vous êtes développeur web junior dans une société spécialisée dans les solutions numériques pour l'enseignement supérieur. L'université de Lyon vous a confié la création d'un système de gestion moderne pour sa bibliothèque universitaire. Cette application doit permettre de :

- Consulter le catalogue des ouvrages disponibles
- Afficher les détails complets de chaque livre (auteur, genre, disponibilité, résumé)
- Permettre aux étudiants de filtrer les livres par genre littéraire ou scientifique
- Offrir une interface de consultation claire pour valoriser le patrimoine bibliographique

L'université souhaite moderniser son système d'information et a choisi Symfony pour sa robustesse et sa capacité à évoluer avec les besoins futurs. Ce premier sprint consiste à créer la structure de base du projet et les contrôleurs de consultation du catalogue.

## 2. Objectifs pédagogiques

**Compétences techniques visées :**
- Installer et configurer un projet Symfony
- Comprendre la structure d'un projet Symfony (dossiers, fichiers de configuration)
- Créer et configurer des contrôleurs
- Maîtriser le système de routage de Symfony
- Comprendre le cycle requête/réponse dans une architecture MVC
- Utiliser les annotations/attributs pour le routage
- Retourner différents types de réponses (HTML, JSON)

**Compétences transversales :**
- Autonomie dans la consultation de documentation officielle
- Organisation et structuration du code
- Résolution de problèmes techniques

## 3. Consignes détaillées

### 🚀 Phase 1 : Installation et Configuration

#### Étape 1.1 : Installation du projet Symfony
**Mission :** Créez un nouveau projet Symfony appelé `bibliotheque-universitaire`

1. Créer un nouveau projet Symfony :
   ```bash
   symfony new bibliotheque-universitaire --webapp
   cd bibliotheque-universitaire
   ```

2. Démarrez le serveur de développement et vérifiez que l'installation fonctionne
```bash
symfony serve -d
```


#### Étape 1.2 : Exploration de la structure
**Mission autonome :** Analysez l'arborescence du projet et identifiez le rôle de chaque dossier principal (src/, config/, templates/, public/)

### 🚀 Phase 2 : Premier Contrôleur - Page d'Accueil

#### Étape 2.1 : Contrôleur d'accueil
**Mission :** Créez un contrôleur `AccueilController`

**Spécifications techniques :**
- Route principale : `/` (méthode GET)
- Nom de route : `app_accueil`
- Méthode : `index()`
- Retour : réponse HTML Twig

**Code de départ :**
```php
<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    // À compléter
}
```

#### Étape 2.2 : Enrichissement de la page d'accueil
**Mission autonome :** Modifiez la méthode pour afficher :
- Le nom de la bibliothèque universitaire
- Les horaires d'ouverture (simulés)
- Un compteur fictif du nombre d'ouvrages disponibles (utilisez une variable)

### 🚀 Phase 3 : Contrôleur de Livres - Gestion du Catalogue

#### Étape 3.1 : Création du contrôleur du catalogue
**Mission :** Créez `LivreController` avec une méthode pour lister tous les livres, ou un service LivresStore mettant à
disposition les données simulées.

**Données à simuler :**
```php
$livres = [
    1 => [
        'id' => 1,
        'titre' => 'Introduction aux Algorithmes',
        'auteur' => 'Thomas H. Cormen',
        'isbn' => '978-2100545261',
        'genre' => 'informatique',
        'annee_publication' => 2010,
        'nombre_pages' => 1200,
        'disponible' => true,
        'nombre_exemplaires' => 3,
        'resume' => 'Manuel de référence couvrant les algorithmes fondamentaux et les structures de données.',
        'editeur' => 'Dunod',
        'cote' => 'INF.004.COR'
    ],
    2 => [
        'id' => 2,
        'titre' => 'Le Rouge et le Noir',
        'auteur' => 'Stendhal',
        'isbn' => '978-2070360024',
        'genre' => 'litterature',
        'annee_publication' => 1830,
        'nombre_pages' => 720,
        'disponible' => false,
        'nombre_exemplaires' => 0,
        'resume' => 'Roman emblématique du XIXe siècle suivant les ambitions de Julien Sorel.',
        'editeur' => 'Gallimard',
        'cote' => 'LIT.840.STE'
    ],
    3 => [
        'id' => 3,
        'titre' => 'Physique Quantique - Fondements et Applications',
        'auteur' => 'Michel Le Bellac',
        'isbn' => '978-2759807802',
        'genre' => 'sciences',
        'annee_publication' => 2013,
        'nombre_pages' => 450,
        'disponible' => true,
        'nombre_exemplaires' => 2,
        'resume' => 'Introduction moderne à la mécanique quantique avec applications pratiques.',
        'editeur' => 'EDP Sciences',
        'cote' => 'PHY.530.LEB'
    ]
];
```

**Spécifications :**
- Route : `/catalogue` (GET)
- Nom : `app_catalogue_liste`
- Affichage : titre, auteur, disponibilité et nombre d'exemplaires pour chaque livre

#### Étape 3.2 : Page de détail d'un livre
**Mission autonome :** Ajoutez une route `/livre/{id}` pour afficher le détail complet d'un ouvrage

**Contraintes :**
- Vérifiez que l'ID existe, sinon retournez une erreur 404
- Affichez toutes les informations du livre (titre, auteur, ISBN, résumé, etc.)
- Utilisez `createNotFoundException()` si le livre n'existe pas

### 🚀 Phase 4 : Fonctionnalités Avancées et Recherche (60 minutes)

#### Étape 4.1 : Filtrage par genre
**Mission :** Créez une route `/catalogue/genre/{genre}` qui filtre les livres par genre

**Genres disponibles :** `informatique`, `litterature`, `sciences`, `histoire`

#### Étape 4.2 : API JSON pour applications mobiles
**Mission autonome :** Ajoutez une route `/api/catalogue` qui retourne tous les livres au format JSON

**Indice :** Utilisez `JsonResponse` au lieu de `Response`

#### Étape 4.3 : Statistiques de la bibliothèque
**Mission :** Créez `/statistiques` qui affiche :
- Nombre total d'ouvrages dans le catalogue
- Répartition par genre
- Nombre de livres disponibles vs empruntés
- Auteur le plus représenté dans la collection

### 🚀 Phase 5 : Consolidation et Optimisation (35 minutes)

#### Étape 5.1 : Navigation entre sections
**Mission :** Ajoutez des liens de navigation dans vos réponses HTML :
- Lien vers l'accueil depuis toutes les pages
- Liens vers les différents genres
- Lien vers les statistiques
- Retour au catalogue depuis les pages de détail

#### Étape 5.2 : Gestion des erreurs avancée
**Mission autonome :** Améliorez la gestion d'erreurs :
- Messages d'erreur personnalisés pour les IDs de livres invalides
- Gestion des genres inexistants avec message informatif
- Affichage d'un message quand aucun livre n'est trouvé pour un genre

#### Étape 5.3 : Validation et tests complets
**Mission :** Testez manuellement toutes vos routes :
- Vérifiez l'accès à chaque page
- Testez les liens de navigation
- Validez l'affichage des données
- Corrigez les éventuels bugs

## 5. Ressources utiles

### Documentation officielle
- [Installation Symfony](https://symfony.com/doc/current/setup.html)
- [Contrôleurs](https://symfony.com/doc/current/controller.html)
- [Routage](https://symfony.com/doc/current/routing.html)
- [Réponses HTTP](https://symfony.com/doc/current/components/http_foundation.html#response)
