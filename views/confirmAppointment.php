<?php
    require('templates/header.php');
?>

    <main class='login__section'>  
        <div class='container__section'>
            <div class='left-slide'>
                <img src="./imagens/appointment.jpg" alt="">
            </div>
            <div class='rigth-slide'>
                <h1>Resumo da consulta marcada</h1>
                <dl>
                <dt>Consulta com:</dt>
                <dd>Dr. <?= $appointment['doctor_name'] ?></dd>
                <dt>Dia</dt>
                <dd><?=  date('d/m/Y', strtotime($appointment['schedule_date']))  ?></dd>
                <dt>Hora</dt>
                <dd><?= date('H:i', strtotime($appointment['time_slot'])) ?></dd>
            
            </dl>
            </div>
        </div>
        
    </main>
  </body>
</html>