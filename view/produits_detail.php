

<main class="container" style="max-width:900px; margin:2rem auto;">
    <a href="?page=produits" style="text-decoration:none; color:#007bff;">← Retour à la liste</a>
    <div style="display:flex; flex-wrap:wrap; gap:2rem; margin-top:1rem;">
        <img src="assets/img/<?= htmlspecialchars($velo['photo']) ?>" alt="<?= htmlspecialchars($velo['nom']) ?>" style="width:400px; max-width:100%; border-radius:10px; object-fit:cover;">
        <div style="flex:1;">
            <h1><?= htmlspecialchars($velo['nom']) ?></h1>
            <p style="font-size:1.2em; color:#444;"><?= nl2br(htmlspecialchars($velo['description'])) ?></p>
            <p style="font-weight:bold; font-size:1.3em;"><?= number_format($velo['prix'], 2, ',', ' ') ?> €</p>
            <a href="?page=commander&velo=<?= $velo['id'] ?>" class="btn" style="background:#007bff; color:white; padding:0.7rem 1.3rem; border-radius:6px; text-decoration:none;">Commander</a>
        </div>
    </div>
</main>


