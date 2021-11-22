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


require_once "template/header.php";
?>
    <h2> Incluindo na Sala <?= $_GET["name"] ?></h2>

    <div class="input-group mb-3 col-9 ">
        <input type="text" class="form-control" placeholder="DIGITE O NÚMERO DO PATRIMÔNIO"
               aria-label="Recipient's username" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary search" data-id="<?= $_GET["id"] ?>"
                    data-name="<?= $_GET["name"] ?>" data-pesquisa="<?= $_GET["pesquisa"] ?>" type="button">Pesquisar
            </button>
        </div>
    </div>

<?php if (isset($data) && $data ) { ?>

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?= $data->numero?></h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Vestibulum at eros</li>
        </ul>
        <div class="card-body">
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
        </div>
    </div>


<?php } ?>

<?php
require_once "template/footer.php";