<?php
try {
    $pdo = new PDO("pgsql:host=localhost;dbname=smartbike", "postgres", "Vaillant");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie à PostgreSQL!\n";
    
    // Tester si la base existe
    $result = $pdo->query("SELECT current_database()")->fetch();
    echo "Base de données actuelle : " . $result[0] . "\n";
    
    // Vérifier les droits
    $result = $pdo->query("SELECT has_database_privilege('postgres', 'smartbike', 'CONNECT')")->fetch();
    echo "L'utilisateur a-t-il les droits de connexion ? " . ($result[0] ? 'Oui' : 'Non') . "\n";
    
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage() . "\n";
    
    // Plus de détails sur l'erreur
    echo "\nDétails de la connexion tentée :\n";
    echo "- Host : localhost\n";
    echo "- Database : smartbike\n";
    echo "- User : postgres\n";
    echo "- Password : [masqué]\n";
}