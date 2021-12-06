<?php

if (isset($_GET["bloco"])) {
    header('Location: classes.php?bloco='.$_GET["bloco"]);
}
require_once "config/config.php";
require_once "src/service/ApiService.php";

$api = new ApiService();

$blocos = $api->get(config::uri() . "/blocos");



require_once "template/header.php";
?>



    <div class="row">

        <?php foreach ($blocos as $bloco) { ?>
            <div class="col-6 tile tile-bloco" data-id = "<?= $bloco->id ?>">
                <?= $bloco->nome ?>
            </div>
        <?php } ?>

    </div>


<?php
require_once "template/footer.php";