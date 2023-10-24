
<?php
    require('templates/header.php');
?>
  
    <main class="medical__section">
        <section class='intro__hero'>
            <h1 class='intro__heading'>Corpo Clínico</h1>
        </section>
        <section class='team'>
            <div class='team__filter'>
                <div class='team__filter--top'>
                    <h2 class='heading__4'>Especialidades</h2>
                    <div class='container'>
                        <div class='team__search'>
                            <input class='team__search--input' type="search" id="searchInput" placeholder='Procurar'>
                            <div id="suggestionBox"></div>
                        </div>
                        <ul class='team__list px-4'>
                            <li class='list__item form-check'>
                                <input class="form-check-input custom-checkbox" type="checkbox" value="neurocirurgia" data-specialty="Neurocirurgia" id="neurocirurgiaCheckbox">
                                <label class="form-check-label" for="neurocirurgiaCheckbox">
                                    Neurocirurgia
                                </label>
                            </li>
                            <li class='list__item form-check'>
                                <input class="form-check-input custom-checkbox" type="checkbox" value="cardiologia" data-specialty="Cardiologia" id="cardiologiaCheckbox">
                                <label class="form-check-label" for="cardiologiaCheckbox">
                                    Cardiologia
                                </label>
                            </li>
                            <li class='list__item form-check'>
                                <input class="form-check-input custom-checkbox" type="checkbox" value="Dermatologia" data-specialty="Dermatologia" id="dermatologiaCheckbox">
                                <label class="form-check-label" for="dermatologiaCheckbox">
                                    Dermatologia
                                </label>
                            </li>
                            <li class='list__item form-check'>
                                <input class="form-check-input custom-checkbox" type="checkbox" value="ortopedia" data-specialty="Ortopedia" id="ortopediaCheckbox">
                                <label class="form-check-label" for="ortopediaCheckbox">
                                    Ortopedia
                                </label>
                            </li>
                            <li class='list__item form-check'>
                                <input class="form-check-input custom-checkbox" type="checkbox" value="psiquiatria" data-specialty="Psiquiatria" id="psiquiatriaCheckbox">
                                <label class="form-check-label" for="psiquiatriaCheckbox">
                                    Psiquiatria
                                </label>
                            </li>
                        </ul>
                    </div>
                <div>
                <div class='team__filter--bottom'>
                    <h2 class='heading__4'>Teleconsulta</h2>
                     <div class='list__item form-check px-5'>
                        <input class="form-check-input custom-checkbox" type="checkbox" value="teleconsulta" data-teleconsulta='1' id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Teleconsulta</label>
                     </div>
                    </div>
                </div>
                <a class="clear-search" id='clearFilters'>Limpar Filtros</a>
            </div>
            </div>
            <div class='team__view'>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
<?php

foreach ($doctors as $doctor) {


    echo '
        <div class="doctor-card" data-specialty="'. $doctor['speciality_name'] .'" data-teleconsulta="' . $doctor['teleconsultation'] . '">
            <a href="/HealthConnect/doctordetail/' .$doctor['doctor_id'].'">
                <div class="doctor-card-img">
                <img src="./imagens' . $doctor['doctor_img'] .'" alt="'. $doctor['doctor_name'] .'">
                </div>
            </a>
            <div class="doctor-card-info">
                <div class="doctor-info-wrapper">
                    <a href="/HealthConnect/doctordetail/' .$doctor['doctor_id'].'">
                        <p class="name">'. $doctor['doctor_name'] .'</p>
                    </a>
                    <div class="specialties">
                        <span class="speciality">
                            <a href="/especialidades/neurocirurgia">'.  $doctor['speciality_name'] .'</a>
                        </span>                  
                    </div>
                    <div class="specialties-by-organization">
                        <div class="wrapper">
                            <div class="organization">
                            <p>Unidades</p>
                            <div>Clínica HealthConnect</div>
                        </div>
                    </div>
                    </div>
                    <div class="doctor-card-listing-main-content">
                        <div class="interests">
                            <p class="small-sub-title">Áreas de Interesse</p>
                            <p class="list-of-interests"> '. $doctor['interest'] .' </p>
                        </div>
                    </div>
                </div>
                <div class="appointment-wrapper">
                    <div class="videoconsulta"></div>
                    <div class="appointment-button">
                        <a href="" class="btn btn--blue btn--primary btn--small" target="_blank">
                            <span>Marcar</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    ';
}
?>
                          
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php
   // require('templates/footer.php');
?>
   
</body>
</html>