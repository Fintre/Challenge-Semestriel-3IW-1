<form
    method="<?= $config["config"]["method"]??"GET" ?>"
    action="<?= $config["config"]["action"]??"" ?>"
    class="<?= $config["config"]["class"]??"" ?>"
    id="<?= $config["config"]["id"]??"" ?>">


    <?php foreach ($config["inputs"] as $name=>$configInput):?>
        <div class="input-form">
            <label for="<?= $configInput['id'] ?? '' ?>"><?= htmlspecialchars($name)?></label>
            <input
                name="<?= $name?>"
                type="<?= $configInput["type"]??"text"?>"
                id="<?= $configInput["id"]??" "?>"
                class="<?= $configInput["class"]??""?>"
                placeholder="<?= $configInput["placeholder"]??""?>"
                <?= (!empty($configInput["required"]))?"required":""?>
            ><br>
        </div>
    <?php endforeach;?>

    <input type="submit" class="<?= $submitButtonClass??"" ?>" value="<?= $config["config"]["submit"]??"Envoyer" ?>" >

    <?php if(!empty($data)) :?>
    <div class="error">
        <?php foreach ($data as $error):?>
            <li><?= $error ?></li>
        <?php endforeach;?>
    </div>
    <?php endif;?>

</form>
