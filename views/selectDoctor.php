<?php
    require('templates/header.php');
?>

    <main class='login__section'>
        <div class='container__section'>
            <div class='left-slide'>
                <img src="./imagens/selectTime.jpg" alt="">
            </div>
            <div class='rigth-slide'>
                <h1>Marcação online de consultas</h1>
                <h2 class='heading__4'> Escolher Especialidade: </h2>
                <select name="specialty" id="specialtySelect">
                    <option value="">Selecione</option>
<?php

        foreach($specialties as $specialty) {
            echo "<option
                     value='". intval($specialty['specialty_id']) ."'>".$specialty['speciality_name']."
                </option>";
        }
?>
                <input type="hidden" id='selectedSpecialty' name='selectedSpecialty'>
                </select>
                <select name="doctor" id="doctorSelect">
                    <option value="">Selecione um médico</option>
                </select>
                <a href='./selectTime' class='btn btn-primary mt-3'>Seguinte</a>
            </div>
        </div>
    </main>
    <script>
        
//SELECT DOCTOR DROPDOWN - FETCH
let selectElement = document.getElementById("specialtySelect");
let doctorSelect = document.getElementById("doctorSelect"); 
let selectedSpecialty = document.getElementById("selectedSpecialty");

function fetchDoctors(specialtyId) {
    fetch('./request.php?specialtyId=' + specialtyId)
        .then(response => response.json())
        .then(data => {
            doctorSelect.innerHTML = '<option value="">Selecione um médico</option>';

            data.forEach(doctor => {
                let option = document.createElement("option");
                option.value = doctor.doctor_id;
                option.textContent = doctor.doctor_name;
                doctorSelect.appendChild(option);
            });
        })
        .catch(error => { console.error('Erro ao procurar médico'); });
}

doctorSelect.addEventListener("change", () => {
    const selectedDoctorId = doctorSelect.value;

    fetch('./requestDoctor.php?doctorId=' + selectedDoctorId)
        .then(response => response.json())
        .catch(error => { console.error('Erro ao armazenar o ID do médico');
         });
});

selectElement.addEventListener("change", () => {
    const selectedOption = selectElement.options[selectElement.selectedIndex];
    const selectedId = selectedOption.value;

    if (selectedId) {
        fetchDoctors(selectedId);
    } else {
        doctorSelect.innerHTML = '<option value="">Selecione um médico</option>';
    }
});

    </script>
  </body>
</html>