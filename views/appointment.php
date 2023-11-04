<?php
    require('templates/header.php');

?>
    <main class="appointment__section">
        <div class="container__section">
            <div class='left-slide'>
                <img src="../imagens/appointment.jpg" alt="missing" >
            </div>
            <div class='rigth-slide'>
                <h1>Marcação de Consultas</h1>
                <p>Bem-vindo! Neste portal poderá efetuar marcações online de atos clínicos.</p>
                <p>Por favor, utilize as opções abaixo para iniciar a operação pretendida.</p>

                <div class='appointment__menu'>
                    <a href="./selectDoctor" class='btn btn-primary'>Marcar Consulta</a>
                    <a href="" class='btn btn-primary'>Anular Consulta</a>
                    <a href="" class='btn btn-primary'>Ver histórico</a>
                    <a href="./userprofile" class='btn btn-primary'>Ver perfil</a>
                </div>
            </div>
        </div>
    </main>

<?php
    //require('templates/footer.php');
?>
</body>
</html>