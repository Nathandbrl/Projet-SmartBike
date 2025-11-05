<?php
class Commande
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    
    public function create(int $veloId, string $nom, string $prenom, string $email, ?string $message): int
    {
        $sql = "INSERT INTO commandes (velo_id, nom, prenom, email, message) 
                VALUES (:velo_id, :nom, :prenom, :email, :message) RETURNING id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':velo_id', $veloId, PDO::PARAM_INT);
        $stmt->bindValue(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':message', $message, PDO::PARAM_STR);

        if (!$stmt->execute()) {
            $err = $stmt->errorInfo();
            var_dump($err);
            die("Erreur lors de l'insertion");
            throw new Exception('Erreur en base : ' . ($err[2] ?? 'unknown'));
        }
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int)$res['id'];
    }
}
