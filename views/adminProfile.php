<?php
    require('templates/header.php');

?>
    <main class="appointment__section">
        <div class="container__section mb-3">
            <div class='left-slide'>
                <img src="/imagens/appointment.jpg" alt="" >
            </div>
            <div class='rigth-slide'>
                <h1 class='text-center'>Área de administrador</h1>
                <p>Bem-vindo <?= $adminProfile['name']?>!</p>
                <p>Por favor, utilize as opções abaixo para iniciar a operação pretendida.</p>

                <div class='appointment__menu'>
                    <a href="/" class='btn btn-primary'>Adicionar médico</a>
                    <a href="/" class='btn btn-primary'>Apagar médico</a>
                </div>
            </div>
        </div>
    </main>

<?php
    //require('templates/footer.php');
?>
</body>
</html>