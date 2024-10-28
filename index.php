<?php
session_start();

// Verifica se o usuário está logado, caso contrário, redireciona para a tela de login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redireciona para a página de login com uma mensagem
    header('Location: auth/login.php?error=not_logged_in'); // Passando um parâmetro de erro
    exit;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gerenciador de Jogos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">NOME DO JOGO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Pagina Inicial</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Suporte</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Area do Administrador</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled">Em Breve!!</a>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <!--<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">-->
            <!--<button class="btn btn-outline-success" type="submit">Search</button>-->
            <span class="btn btn-warning"><a id="btn_sair" href="auth/logout.php">Sair</a></span>
          </form>
        </div>
      </div>
    </nav>

    <div class="container my-5">
      <h1>Gerenciador de Jogos</h1>
      <div class="col-lg-8 px-0">
        <p class="fs-5">Ainda não tem o jogo? <a href="https://getbootstrap.com/">Clique aqui</a></p>
        <p>O jogo é totalmente gratuito, bora jogar?!</p>

        <hr class="col-1 my-4">

        <a href="https://getbootstrap.com" class="btn btn-primary">Download Windows</a>
        <a href="https://github.com/twbs/examples" class="btn btn-secondary">View other Versions</a>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="main.js"></script>
  </body>
</html>
