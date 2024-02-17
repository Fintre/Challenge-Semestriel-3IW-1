<form
    method="<?= $config["config"]["method"]??"GET" ?>"
    action="<?= $config["config"]["action"]??"" ?>"
    class="<?= $config["config"]["class"]??"" ?>"
    id="<?= $config["config"]["id"]??"" ?>">


    <?php foreach ($config["inputs"] as $name => $configInput): ?>
        <?php if ($configInput["type"] != "hidden"): ?>
            <div class="input-form">
                <label for="<?= $configInput['id'] ?? '' ?>"><?= htmlspecialchars($name) ?></label>
                <input
                    name="<?= $name ?>"
                    type="<?= $configInput["type"] ?? "text" ?>"
                    id="<?= $configInput["id"] ?? " " ?>"
                    class="<?= $configInput["class"] ?? "" ?>"
                    placeholder="<?= $configInput["placeholder"] ?? "" ?>"
                    <?= (!empty($configInput["required"])) ? "required" : "" ?>
                ><br>
            </div>
        <?php else: ?>
            <input
                type="hidden"
                name="<?= $name ?>"
                id="<?= $configInput["id"] ?? " " ?>"
                class="<?= $configInput["class"] ?? "" ?>"
                placeholder="<?= $configInput["placeholder"] ?? "" ?>"
                value="<?= htmlspecialchars($configInput["value"] ?? '') ?>"
                <?= (!empty($configInput["required"])) ? "required" : "" ?>
            >
        <?php endif; ?>
    <?php endforeach; ?>

    <input type="submit" class="<?= $submitButtonClass??"" ?>" value="<?= $config["config"]["submit"]??"Envoyer" ?>" >

    <?php if(!empty($dataError)) :?>
    <div class="error">
        <?php foreach ($dataError as $error):?>
            <li><?= $error ?></li>
        <?php endforeach;?>
    </div>
    <?php endif;?>

    <?php if(!empty($dataSuccess)) :?>
    <div class="success">
        <?php foreach ($dataSuccess as $success):?>
            <li><?= $success ?></li>
        <?php endforeach;?>
    </div>
    <?php endif;?>

</form>
