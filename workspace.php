<?php

if (!isset($_GET["class"])) {
    header('Location: blocos.php');
}
require_once "config/config.php";
require_once "src/service/ApiService.php";

$api = new ApiService();
if (isset($_GET["pesquisa"])) {
    $data = $api->get(config::uri() . "/patrimonies/" . $_GET["pesquisa"]);
}
$erro = false;
if (isset($_GET["erro"])) {
    $erro = true;
    $data = $api->get(config::uri() . "/patrimonies/" . $_GET["lastAdd"]);
}

require_once "template/header.php";
?>
    <div class="col-10 offset-1">
        <h1 class = "text-center mb-2"> Incluindo na Sala <?= $_GET["name"] ?></h1>

        <div class="input-group mb-3 col-9 ">
            <input type="text" class="form-control pesquisa-value input-lg" placeholder="DIGITE O NÚMERO DO PATRIMÔNIO"
                   aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-success  search"
                        data-class="<?= $_GET["class"] ?>" data-name="<?= $_GET["name"] ?>"
                        data-pesquisa="<?= $_GET["pesquisa"] ?>" type="button">Pesquisar
                </button>
            </div>
        </div>
    </div>
<?php if (isset($data) && $data) { ?>

    <?php if ($erro) { ?>
        <div class="alert alert-danger" role="alert">
            Houve um erro ao salvar o item <?= $data->numero ?>, por favor tente novamente, caso o erro persista procure
            a CTI
        </div>
    <?php } ?>


    <div class="col-10 offset-1">
        <div class="card col-12">
            <div class="card-body">
                <h5 class="card-title">Numero: <?= $data->numero ?></h5>
                <p class="card-text"><?= $data->descricao ?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Rótulo:</b> <?= $data->rotulo ?></li>
                <li class="list-group-item"><b>Setor Responsável:</b> <?= $data->setorResponsavel ?></li>
                <li class="list-group-item"><b>Responsável:</b> <?= $data->cargaAtual ?></li>
            </ul>
            <div class="card-body">
                <a href="<?= config::frontUri() ?>/Service.php?save=true&class=<?= $_GET['class'] ?>&item=<?= $data->numero ?>&className=<?= $_GET['name'] ?>"
                   class="btn btn-success col-12">Incluir na sala <?= $_GET['name'] ?></a>
            </div>
        </div>

    </div>
<?php } else if (isset($_GET['lastAdd'])) { ?>
    <div class="alert alert-success" role="alert">
        O item, <?= $_GET['lastAdd'] ?> foi inserido com sucesso
    </div>
<?php } ?>

<?php
require_once "template/footer.php";