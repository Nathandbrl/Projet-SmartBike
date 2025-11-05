<section class="accueil">
    <h1>Bienvenue chez SmartBike 🚴</h1>

    <?php if ($dernierVelo): ?>
        <div class="dernier-velo">
            <h2>Notre dernière nouveautée :</h2>
            <h3><?= htmlspecialchars($dernierVelo['nom']) ?></h3>
            <img src="<?= htmlspecialchars($dernierVelo['photo']) ?>" alt="Photo du vélo" width="300">
            <p><strong>Prix :</strong> <?= number_format($dernierVelo['prix'], 2, ',', ' ') ?> €</p>
        </div>
    <?php else: ?>
        <p>Aucun vélo n'a encore été ajouté.</p>
    <?php endif; ?>
</section>
