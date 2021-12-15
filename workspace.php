<?php

if (!isset($_GET["class"])) {
    header('Location: blocos.php');
}
require_once "config/cookies.php";
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
        <div class="row text-center "><a href="/blocos.php" class="btn btn-success col-3 mb-3">Voltar</a></div>
        <h1 class="text-center mb-2"> Incluindo na Sala <?= $_GET["name"] ?></h1>
        <div class = "btn btn-success show-patrimony-form mb-3">Adicionar item sem patrimonio</div>
        <div class="input-group mb-3 col-9 find-patrimony ">
            <input type="text" class="form-control pesquisa-value input-lg" placeholder="DIGITE O NÚMERO DO PATRIMÔNIO"
                   aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-success  search"
                        data-class="<?= $_GET["class"] ?>" data-name="<?= $_GET["name"] ?>"
                        data-pesquisa="<?= $_GET["pesquisa"] ?>" type="button">Pesquisar
                </button>
            </div>
        </div>

        <div class="mb-3 col-12 patrimony-form hidden">
            <form action="Service.php"
                  method="get">
                <span> Digite a descrição mais completa possível</span>
                <textarea name="descricao" class="form-control add-patrimony-value"
                          placeholder="DIGITE A DESCRIÇÃO DO PATRIMONIO"
                          aria-label="Recipient's username" aria-describedby="basic-addon2">
                </textarea>
                <input type = "hidden" name = "add-patrimony" value="true">
                <input type = "hidden" name = "class" value="<?= $_GET["class"] ?>">
                <input type = "hidden" name = "className" value="<?= $_GET["name"] ?>">

                <button type="submit" class="btn btn-outline-success add-patrimony mt-2">
                    Adicionar
                </button>

            </form>
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
<?php } else if(isset($_GET['pesquisa'])) { ?>
    <div class="alert alert-danger" role="alert">
        Nenhum item foi encontrado com o valor inserido
    </div>
<?php } ?>

<?php
require_once "template/footer.php";