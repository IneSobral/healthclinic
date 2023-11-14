
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500;700&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="/script.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <!-- JQUERY UI Datepicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <!-- DataTables -->
    <link href="DataTables/datatables.min.css" rel="stylesheet">
    <script src="DataTables/datatables.min.js"></script>
    <title>HealthConnect</title>
    
</head>
<body>
    <header>
        <nav class="navbar bg-primary" data-bs-theme="dark">
            <a href="/home"><img src="/imagens/hospital-building.png" alt="" class="nav__img px-2"></a>
            <div class="nav__center">
                <ul>
                    <li class="nav__list mb-0">
                        <a href="/about/">Sobre nós</a>
                        <a href="/doctors/">Corpo clínico</a>
                        <a href="/contacts/">Contactos</a>
                    </li>
                </ul>
            </div>
            <div class="nav__rigth px-2">
                <ul>
<?php

        if(isset($_SESSION['user_id'])) {
            echo'
                <li>
                    <a href="/appointments/">Perfil</a>
                </li>
                <li>
                    <a href="/logout/">Terminar Sessão</a>
                </li>
            ';
            }
            else if (isset($_SESSION['admin_id'])) {
                echo'
                    <li>
                        <a href="/adminProfile/">Perfil do Admin</a>
                    </li>
                    <li>
                        <a href="/logout/">Terminar Sessão</a>
                    </li>
                ';
            }
            else {
                echo'
                    <li>
                        <a href="/login/">Login</a>
                    </li>
                    <li>
                        <a href="/register/">Criar Conta</a>
                    </li>
                ';

}
?>                    
                </ul>

            </div>
        </nav>
    </header>
