<?php
    require('templates/header.php');
?>

    <main class='login__section'>  
        <div class='container__section'>
            <div class='left-slide'>
                <img src="./imagens/select3.jpg" alt="">
            </div>
            <div class='rigth-slide'>
                <h1>Marcação online de consultas</h1>
<?php
    if(empty($_SESSION['selectedDoctorId'])) {
        echo '<p role="alert">Médico não selecionado, volte ao início</p>';
    }
    else {
       
?>
                    <table id="consultationTable" class='table table-hover table-striped '>
                        <p>Data: <input type="text" id="datepicker"></p>
                        <thead>
                            <tr>
                                <th scope="col mx-2">Selecionar</th>
                                <th scope="col">Dia</th>
                                <th scope="col">Hora</th>
                            </tr>
                        </thead>

                        <tbody>
<?php
                            foreach ($schedules as $schedule) {
                                $scheduleDate = date('Y-m-d', strtotime($schedule['schedule_date']));
                                $timeSlot = date('H:i', strtotime($schedule['time_slot']));
                                $scheduleId = $schedule['schedule_id'];
                                echo '
                                    <tr data-schedule-id="' . $scheduleId . '" data-schedule-date="' . $scheduleDate . '">
                                        <td>
                                            <input type="radio" name="selected_schedule" scope="row" value="' . $scheduleId . '">
                                           
                                        </td>
                                        <td>' . $scheduleDate . '</td>
                                        <td>' . $timeSlot . '</td>
                                    </tr>
                                ';
                            }
?>
                        </tbody>
                    </table>
                    <a  href="./confirmAppointment" class='btn btn-primary mt-3' name="removeSlot" aria-label="Remover consulta" >Agendar Consulta</a>
<?php
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
                if (selectedScheduleId) {

                    fetch('./requestSchedule.php?scheduleId=' + selectedScheduleId)
                    .then(response => response.json())
                    .then(data => {
                        console.log(data)
                        alert('Consulta marcada com sucesso');
                     
                    })
                    .catch(error => { console.error('Erro ao armazenar o ID do schedule', error);
                    });
                } else {
                    alert('Selecione uma consulta antes de confirmar.');
                }
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
    <script>
         $(function() {
            const datePicker = $("#datepicker");
            datePicker.datepicker({
                minDate: 0,
                maxDate: "+1M",
                dateFormat: 'dd/mm/yy',
                onSelect: function (dateText, inst) {
                    const selectedDate = $.datepicker.formatDate('yy-mm-dd', datePicker.datepicker('getDate'));
                    updateAvailableSchedules(selectedDate);
                }
            });

            function updateAvailableSchedules(selectedDate) {
                const rows = document.querySelectorAll('#consultationTable tbody tr');
                rows.forEach(row => {
                    const scheduleDate = row.getAttribute('data-schedule-date');
                    if (scheduleDate === selectedDate) {
                        row.style.display = 'table-row';  
                    } else {
                        row.style.display = 'none';  
                    }
                });
            }
        });
    </script>
  </body>
</html>