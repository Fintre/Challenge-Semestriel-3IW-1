<h3>Réglages</h3>
<section class="settings-bloc">
    <div class="setting-content">
    <?php if (isset($settings)): ?>
        <?php foreach ($settings as $setting): ?>
            <li><strong><?php echo htmlspecialchars($setting['clé']); ?> : </strong> <?php echo htmlspecialchars($setting['valeur']); ?></li>
        <?php endforeach; ?>
    <?php endif; ?>
    </div>
</section>
<section class="section5-page-add">
    <button class="button button-primary">Lancer le site</button>
    <button class="button button-danger">Supprimer le site le site</button>
</section>



