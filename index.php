<?php


require_once "template/header.php";
$failed = false;
if(isset($_GET['error'])){

    if($_GET['error'] == "login-failed"){
        $msg = "Erro ao realizar o Login, tente novamente, em caso de persistencia no erro procure a CTI";
    }elseif ($_GET['error'] == "nao-logado"){
        $msg = "Faça o Login para continuar";
    }
    $failed = true;
}

if(isset($_COOKIE['token'])){
    header("location: /blocos.php");
}

?>

    <div class="container">
        <div class="row">
            <?php if($failed){ ?>
                <div class="alert alert-danger" role="alert">
                    <?= $msg?>
                </div>
            <?php } ?>
            <div class="col-10 offset-1 mt-5 md-5 mr-5 ml-5 border border-success rounded">
                <h3 class="text-center mb-5 mt-5">Entrar no sistema de inventário - IFSP-SÃO CARLOS</h3>
                <div class="col-6 offset-3 mb-5">
                    <form action="/register.php">
                        <div class="mb-3 ">
                            <label for="formGroupExampleInput" class="form-label">Digite seu email</label>
                            <input type="text" name = "email" class="form-control" id="formGroupExampleInput"
                                   placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2"  class="form-label">Digite seu código</label>
                            <input type="text" class="form-control" name = "accessCode" id="formGroupExampleInput2"
                                   placeholder="Código de Acesso">
                        </div>
                        <button type = "submit" class="btn btn-success">Entrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
require_once "template/footer.php"
?>