# ShopEasy – Système de Points de Fidélité 🎯

## 📌 Description
**ShopEasy** est une application web en PHP destinée à gérer un système de points de fidélité pour les utilisateurs.  
Les utilisateurs peuvent :
- Gagner des points lors de leurs achats
- Consulter leur solde et l’historique de leurs points
- Échanger leurs points contre des récompenses  

Le projet applique les bonnes pratiques de développement : architecture MVC, Front Controller, routage propre, Composer et Twig.  

---

## 🎯 Objectifs du projet
- Gérer les utilisateurs et leurs points de fidélité  
- Consulter l'historique des transactions de points  
- Gérer les récompenses et les échanges  
- Construire une application modulaire, maintenable et évolutive  
- Permettre une future intégration facile avec des partenaires ou des applications mobiles  

---

## 🧱 Technologies utilisées
- **PHP 8.3**  
- **Composer** pour la gestion des dépendances  
- **Twig** comme moteur de templates  
- **MySQL** pour la base de données  
- **Apache** avec `.htaccess` pour les URLs propres  
- **Git & GitHub** pour le versioning  

---

## 📁 Structure complète du projet
LOYALITY/
│
├── public/
│ ├── index.php # Front Controller
│ └── .htaccess # URLs propres
│
├── src/
│ ├── Core/
│ │ └── Router.php # Gestion du routage
│ ├── Controllers/ # Contrôleurs MVC
│ │ ├── AuthController.php
│ │ ├── DashboardController.php
│ │ ├── PointsController.php
│ │ └── RewardsController.php
│ └── Models/ # Modèles pour la base de données
│ ├── User.php
│ ├── PointsTransaction.php
│ └── Reward.php
│
├── views/
│ ├── layouts/
│ │ └── base.twig
│ ├── auth/
│ │ ├── login.twig
│ │ └── register.twig
│ ├── dashboard/
│ │ └── index.twig
│ ├── points/
│ │ └── history.twig
│ └── rewards/
│ └── catalog.twig
│
├── vendor/ # Dépendances Composer
├── composer.json
├── composer.lock
└── README.md

---

## 🗄️ Base de données MySQL

```sql
CREATE DATABASE ShopEasy;
USE ShopEasy;

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(100) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    name VARCHAR(100),
    total_points INT DEFAULT 0,
    createdat TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE points_transactions (
   id INT PRIMARY KEY AUTO_INCREMENT,
   user_id INT NOT NULL,
   type ENUM('earned', 'redeemed', 'expired') NOT NULL,
   amount INT NOT NULL,
   description VARCHAR(255),
   balance_after INT NOT NULL,
   createdat TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
   FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE rewards (
   id INT PRIMARY KEY AUTO_INCREMENT,
   name VARCHAR(100) NOT NULL,
   points_required INT NOT NULL,
   description TEXT,
   stock INT DEFAULT -1 -- -1 = illimité
);
Exemple d’insertion
INSERT INTO users (email, password_hash, name) VALUES
('salma@example.com', 'hashpassword1', 'Salma'),
('youssef@example.com', 'hashpassword2', 'Youssef');

INSERT INTO rewards (name, points_required, description, stock) VALUES
('Bon de 5$', 500, 'Réduction de 5$ sur votre prochain achat', 10),
('Livraison gratuite', 1000, 'Profitez de la livraison gratuite', -1);
🌐 Routage et Front Controller

Front Controller : public/index.php

Exemples de routes :
/            → Home page
/login       → AuthController::login()
/register    → AuthController::register()
/dashboard   → DashboardController::index()
/points/history → PointsController::history()
/rewards/redeem/3 → RewardsController::redeem(3)
URLs propres gérées via .htaccess (rewrite rules)

🖼️ Twig – Moteur de templates

Tous les fichiers HTML sont dans views/

Aucune logique métier dans les templates

Exemple minimal :
{% extends 'layouts/base.twig' %}

{% block content %}
<h1>Bienvenue {{ user.name|capitalize }} !</h1>
<p>Solde de points : {{ user.total_points }}</p>
{% endblock %}
🗓️ Planification du projet
Jour	Tâches principales
Jour 1	Fondations du projet (Git, Composer, Twig, Front Controller, routage, URLs propres)
Jour 2	Création des controllers et des routes principales
Jour 3	Base de données et modèles (CRUD utilisateurs)
Jour 4	Gestion des points et transactions
Jour 5	Gestion des récompenses et échanges
Jour 6	Sécurité, tests, finalisation
👩‍💻 Réalisé par

Salma GTU – Étudiante en développement informatique

📜 Licence

Projet académique – usage pédagogique uniquement.