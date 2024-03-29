<?php
    require('templates/header.php');
?>

    <main class='login__section'>  
        <div class='container__section'>
            <div class='left-slide'>
                <img src="/imagens/select3.jpg" alt="">
            </div>
            <div class='rigth-slide'>
                <h1>Escolher consulta para cancelar</h1>
                    <table class='table table-hover table-striped '>
                        <thead>
                            <tr>
                                <th scope="col mx-2"></th>
                                <th scope="col">Dia</th>
                                <th scope="col">Médico</th>
                                <th scope="col">Hora</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
                            foreach ($appointments as $appointment) {
                                $scheduleDate = date('Y-m-d', strtotime($appointment['schedule_date']));
                                $timeSlot = date('H:i', strtotime($appointment['time_slot']));
                                $doctorName = $appointment['doctor_name'];
                                $scheduleId = $appointment['schedule_id'];
                               
                                echo '
                                    <tr data-schedule-id="' . $scheduleId . '">
                                        <td>
                                            <input type="radio" name="selected_schedule" value="' . $scheduleId . '">
                                           
                                        </td>
                                        <td>' . $scheduleDate . '</td>
                                        <td>' . $doctorName . '</td>
                                        <td>' . $timeSlot . '</td>
                                    </tr>
                                ';
                            }
?>
                        </tbody>
                    </table>
<?php
if (empty($appointments)) {
    echo '<p>Não tem nenhuma consulta marcada.</p>';
    echo '<a href="/appointments/" class="btn btn-primary mt-3">Voltar ao perfil</a>';
} else {
    echo '<a href="" class="btn btn-primary mt-3" name="removeSlot" aria-label="Remover consulta" >Cancelar Consulta</a>';
}
?>
                   
            </div>
        </div>
        
    </main>
    <script defer>
        document.addEventListener('DOMContentLoaded', () => {
            const scheduleAppointmentButton = document.querySelector('a[name="removeSlot"]');
            const radioButtons = document.querySelectorAll('input[type="radio"][name="selected_schedule"]');
           

            scheduleAppointmentButton.addEventListener('click', () => {
            
                const selectedScheduleId = getSelectedScheduleId();
                
                if (selectedScheduleId === null) {
                    
                    const availableSchedules = document.querySelectorAll('input[type="radio"][name="selected_schedule"]:checked');
                    if (availableSchedules.length === 0) {
                        return;
                    } else {
                        alert('Selecione uma consulta antes de confirmar.');
                        return;
                    }
                }
          
                fetch('/requests/', {
                        method: 'POST',
                        headers: {
                            "Content-Type":"application/x-www-form-urlencoded"
                        },
                        body: "request=cancelId&scheduleId=" + selectedScheduleId
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data)
                        alert('Consulta cancelada com sucesso');
                     
                    })
                    .catch(error => { console.error('Erro ao armazenar o ID do schedule', error);
                    });
                
            });

            function getSelectedScheduleId() {
                for (const radioButton of radioButtons) {
                    if (radioButton.checked) {
                        return radioButton.value;
                    }
                }
                return null;
            }
        });
    </script>
  </body>
</html>