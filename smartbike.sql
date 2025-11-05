CREATE TABLE velos (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    description TEXT,
    prix DECIMAL(10, 2) NOT NULL,
    photo VARCHAR(255),
    date_ajout TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE commandes (
    id SERIAL PRIMARY KEY,
    velo_id INTEGER REFERENCES velos(id) ON DELETE CASCADE,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    message TEXT,
    date_commande TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO velos (nom, description, prix, photo) VALUES
('BikeOne', 
 'Velo de ville, autonomie : 50km, moteur : 250W. Parfait pour la ville !', 
 1299.00, 
 'https://images.unsplash.com/photo-1571068316344-75bc76f77890?w=400'),

('Bike22', 
 'VTT, moteur : 350W, autonomie : 80km, suspension avant et arrière. Parfait pour long trajet !', 
 1899.00, 
 'https://images.unsplash.com/photo-1532298229144-0ec0c57515c7?w=400'),

('BikeFirst', 
 'Entré de gamme. Fiable, économique, autonomie : 40km, moteur : 250W. Idéal pour débuter en vélo électrique.', 
 899.00, 
 'https://images.unsplash.com/photo-1485965120184-e220f721d03e?w=400'),

('Bike5', 
 'Le tout dernier model! Technologie de pointe, moteur : 500W, autonomie : 120km, écran LCD connecté, GPS intégré. Le vélo de demain !', 
 2499.00, 
 'https://images.unsplash.com/photo-1559348349-86f1f65817fe?w=400');

 CREATE INDEX idx_velos_date ON velos(date_ajout DESC);
CREATE INDEX idx_commandes_date ON commandes(date_commande DESC);
CREATE INDEX idx_commandes_velo ON commandes(velo_id);

SELECT * FROM velos ORDER BY date_ajout DESC;