
<?php
require_once __DIR__ . '/../model/bdd.php';
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'] ?? '';
    $prenom = $_POST['prénom'] ?? '';
    $email = $_POST['email'] ?? '';
    $msg = $_POST['message'] ?? '';
    if ($nom && $prenom && $email && $msg) {
        try {
            $stmt = $pdo->prepare('INSERT INTO contact (nom, prenom, email, message) VALUES (:nom, :prenom, :email, :message)');
            $stmt->execute([
                ':nom' => $nom,
                ':prenom' => $prenom,
                ':email' => $email,
                ':message' => $msg
            ]);
            $message = 'Votre message a été envoyé avec succès !';
        } catch (PDOException $e) {
            $message = 'Erreur lors de l\'enregistrement : ' . $e->getMessage();
        }
    } else {
        $message = 'Veuillez remplir tous les champs.';
    }
}
?>

<h1>Contactez-nous</h1>

<?php if ($message): ?>
    <p style="color:green; font-weight:bold;"> <?= htmlspecialchars($message) ?> </p>
<?php endif; ?>

<form action="" method="post">
    <label for="nom">Nom:</label>
    <input type="text" id="nom" name="nom" required>
    <label for="prénom">Prénom:</label>
    <input type="text" id="prénom" name="prénom" required>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <label for="message">Message:</label>
    <textarea id="message" name="message" required></textarea>
    <button type="submit">Envoyer</button>
</form>

    