create database ShopEasy;
use ShopEasy;

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(100) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    name VARCHAR(100),
    total_points INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO users (email, password_hash, name, total_points) VALUES
('amine@gmail.com', '$2y$10$hashamine', 'Amine', 150),
('salma@gmail.com', '$2y$10$hashsalma', 'Salma', 320),
('youssef@gmail.com', '$2y$10$hashyoussef', 'Youssef', 80);


CREATE TABLE points_transactions (
   id INT PRIMARY KEY AUTO_INCREMENT,
   user_id INT NOT NULL,
   type ENUM('earned', 'redeemed', 'expired') NOT NULL,
   amount INT NOT NULL,
   description VARCHAR(255),
   balance_after INT NOT NULL,
   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
   FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
INSERT INTO points_transactions 
(user_id, type, amount, description, balance_after) VALUES
(1, 'earned', 100, 'Inscription sur la plateforme', 100),
(1, 'earned', 50, 'Achat produit', 150),

(2, 'earned', 200, 'Achat premium', 200),
(2, 'earned', 120, 'Offre spéciale', 320),

(3, 'earned', 100, 'Achat produit', 100),
(3, 'redeemed', 20, 'Réduction commande', 80);

CREATE TABLE rewards (
   id INT PRIMARY KEY AUTO_INCREMENT,
   name VARCHAR(100) NOT NULL,
   points_required INT NOT NULL,
   description TEXT,
   stock INT DEFAULT -1 -- -1 = unlimited
);
INSERT INTO rewards (name, points_required, description, stock) VALUES
('Bon de réduction 10%', 100, 'Réduction de 10% sur votre prochaine commande', -1),
('Livraison gratuite', 50, 'Livraison gratuite pour une commande', 20),
('Carte cadeau 50 MAD', 300, 'Carte cadeau valable 50 MAD', 10);
