<?php if (isset($userData)): ?>
        <h3>Utilisateur <strong><em> <?= htmlspecialchars($userData['username']) ?> </em></strong></h3>
<?php endif; ?>
<section class="user-profile">
        <img src="<?= !empty($userData['img_path']) ? htmlspecialchars($userData['img_path']) : '/Views/styles/dist/images/profil.png' ?>" alt="Image de profil">
        <div class="user-info">
            <h2><?= htmlspecialchars($userData['firstname']) . ' ' . htmlspecialchars($userData['lastname']) ?></h2>
            <p>Email: <?= htmlspecialchars($userData['email']) ?></p>
            <p>Nom d'utilisateur: <?= htmlspecialchars($userData['username']) ?></p>
            <p>Status: <?= $userData['status'] === 0 ? 'Inactif' : 'Actif' ?></p>
            <p>Rôle: <?= htmlspecialchars($userData['roles'] ?? 'Utilisateur') ?></p>
            <p>Créé le: <?= date('d/m/Y à H:i', strtotime($userData['createdat'])) ?></p>
            <p>Dernière mise à jour: <?= $userData['updatedat'] ? date('d/m/Y à H:i', strtotime($userData['updatedat'])) : 'N/A' ?></p>
            <p>Actif: <?= $userData['is_active'] ? 'Oui' : 'Non' ?></p>
        </div>
</section>
