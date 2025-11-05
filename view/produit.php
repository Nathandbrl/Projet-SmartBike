

<main class="container" style="max-width:1000px; margin:2rem auto;">
    <h1>Nos vélos</h1>
    <div class="velos-grid" style="display:grid; grid-template-columns: repeat(auto-fit, minmax(250px,1fr)); gap:2rem;">
        <?php foreach ($velos as $v): ?>
            <div class="velo-card" style="border:1px solid #ddd; border-radius:10px; overflow:hidden; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
                <img src="<?= htmlspecialchars($v['photo']) ?>" alt="<?= htmlspecialchars($v['nom']) ?>" style="width:100%; height:200px; object-fit:cover;">
                <div style="padding:1rem;">
                    <h2 style="margin:0;"><?= htmlspecialchars($v['nom']) ?></h2>
                    <p style="color:#777;"><?= number_format($v['prix'], 2, ',', ' ') ?> €</p>
                    <p><?= htmlspecialchars(mb_strimwidth($v['description'], 0, 80, '...')) ?></p>
                    <div style="display:flex; justify-content:space-between;">
                        <a href="?page=produit&id=<?= $v['id'] ?>" class="btn" style="background:#555; color:white; padding:0.5rem 1rem; border-radius:5px; text-decoration:none;">Plus d’infos</a>
                        <a href="?page=commander&velo=<?= $v['id'] ?>" class="btn" style="background:#007bff; color:white; padding:0.5rem 1rem; border-radius:5px; text-decoration:none;">Commander</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>


