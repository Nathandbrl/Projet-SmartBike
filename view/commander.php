<?php

if (session_status() === PHP_SESSION_NONE) session_start();

$old = $_SESSION['old'] ?? [];
$errors = $_SESSION['errors'] ?? [];
$success = $_SESSION['success'] ?? null;


unset($_SESSION['old'], $_SESSION['errors'], $_SESSION['success']);



?>

<main class="container" style="max-width:800px;margin:2rem auto;">
    <h1>Commander</h1>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul>
            <?php foreach ($errors as $err): ?>
                <li><?= htmlspecialchars($err) ?></li>
            <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if ($success): ?>
        <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

    <form method="post" action="?page=commander" novalidate>
        <div class="form-group" style="margin-bottom:1rem;">
            <label for="velo_id">Vélo</label>
            <select id="velo_id" name="velo_id" required style="width:100%;padding:0.5rem;">
                <option value="">-- Choisir un vélo --</option>
                <?php foreach ($bikes as $v): 
                    $sel = (isset($old['velo_id']) && (int)$old['velo_id'] === (int)$v['id']) ? 'selected' : '';
                ?>
                    <option value="<?= (int)$v['id'] ?>" <?= $sel ?>>
                        <?= htmlspecialchars($v['nom']) ?> — <?= number_format((float)$v['prix'], 2, ',', ' ') ?> €
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group" style="margin-bottom:1rem;">
            <label for="nom">Nom</label>
            <input id="nom" name="nom" type="text" required value="<?= htmlspecialchars($old['nom'] ?? '') ?>" style="width:100%;padding:0.5rem;">
        </div>

        <div class="form-group" style="margin-bottom:1rem;">
            <label for="prenom">Prénom</label>
            <input id="prenom" name="prenom" type="text" required value="<?= htmlspecialchars($old['prenom'] ?? '') ?>" style="width:100%;padding:0.5rem;">
        </div>

        <div class="form-group" style="margin-bottom:1rem;">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" required value="<?= htmlspecialchars($old['email'] ?? '') ?>" style="width:100%;padding:0.5rem;">
        </div>

        <div class="form-group" style="margin-bottom:1rem;">
            <label for="message">Message (optionnel)</label>
            <textarea id="message" name="message" rows="5" style="width:100%;padding:0.5rem;"><?= htmlspecialchars($old['message'] ?? '') ?></textarea>
        </div>

        <div style="text-align:right;">
            <button type="submit" class="btn btn-primary" style="padding:0.6rem 1.2rem;">Commander</button>
        </div>
    </form>
</main>


