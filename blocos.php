<?php
//setcookie("token", "", -3600);
//setcookie("email", "", -3600);
//die();
if (isset($_GET["bloco"])) {
    header('Location: classes.php?bloco=' . $_GET["bloco"]);
}
require_once "config/config.php";
require_once "config/cookies.php";
require_once "src/service/ApiService.php";



$api = new ApiService();

$blocos = $api->get(config::uri() . "/blocos");


require_once "template/header.php";
?>


    <div class="row text-center"><a href="/" class="btn btn-success col-2"><span class="glyphicon glyphicon-menu-left"
                                                                                 aria-hidden="true"></span> Voltar</a>
        <h2 class="col-8">Escolha um bloco para iniciar o trabalho</h2></div>

    <div class="row">

        <?php foreach ($blocos as $bloco) { ?>
            <div class="col-6 tile tile-bloco" data-id="<?= $bloco->id ?>">
                <?= $bloco->nome ?>
            </div>
        <?php } ?>

    </div>


<?php
require_once "template/footer.php";