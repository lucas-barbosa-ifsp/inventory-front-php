<?php

session_start();


require_once "template/header.php";
?>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Sistema de marcação de inventário <BR>
                IFSP - SÃO CARLOS</h5>
            <form action = "/login.php" method = "get">
              <div class="form-floating mb-3">
                <input type="email" name = "email" class="form-control" id="floatingInput" placeholder="Digite seu Email">
                <label for="floatingInput">Digite seu email</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" name = "accessCode" class="form-control" id="floatingPassword" placeholder="Digite seu código de acesso">
                <label for="floatingPassword">Código de acesso</label>
              </div>

                <div class="d-grid">
                    <button class="btn btn-success btn-login text-uppercase fw-bold" type="submit">Entrar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

