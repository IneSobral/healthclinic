<?php
    require('templates/header.php');
?>

    <main class='login__section'>  
        <div class='container__section'>
            <div class='left-slide'>
                <img src="./imagens/historic.jpg" alt="">
            </div>
            <div class='rigth-slide mx-2'>
                <h1>Histórico de consultas</h1>
                <table class='table table-bordered table-light'>
                    <thead>
                        <tr>
                            <th>Médico</th>
                            <th>Dia</th>
                            <th>Hora</th>
                        </tr>
                    </thead>
                    <tbody>
<?php foreach ($history as $appointment) { 
?>
                            <tr>
                                <td>Dr. <?= $appointment['doctor_name'] ?></td>
                                <td><?= date('d/m/Y', strtotime($appointment['schedule_date'])) ?></td>
                                <td><?= date('H:i', strtotime($appointment['time_slot'])) ?></td>
                            </tr>
<?php } 
?>
                    </tbody>
                </table>
                <a href="./appointments" class='btn btn-primary'>Voltar ao perfil</a>
            </div>
        </div>
        
    </main>
  </body>
</html>