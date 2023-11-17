<?php
    require('templates/header.php');
?>
  <main class='detail__section'>
    <div class='container'>
        <div class='doctor-card'>
          <div class="doctor-card-img">
            <img src="/imagens<?= $doctor["doctor_img"] ?>" alt="<?= $doctor["doctor_name"] ?>">
          </div>
          <div class="doctor-card-info">
              <div class="specialties-by-organization">
                <h1 class="name"><?= $doctor["doctor_name"] ?></h1>            
                <div class="wrapper">
                  <div class="specialties">
                    <span class="speciality">
                        <a href=""><?= $doctor["speciality_name"] ?></a> 
                    </span>
                   </div>
                </div>
            </div>
            <div class="languages">
              <h2 class="heading__4">Idiomas</h2>
              <p><?= $doctor["languages"] ?></p>
            </div>
            <div class="doctor-card-info-bottom d-flex align-items-center">
              <a href="/login/" class="btn btn--blue btn-primary btn-size-regular"><span> Marcar </span></a>
            </div>
          </div>
        </div>
        <article class="doctor-info-content m-3 py-3">
            <div class="info-box">
                <h3 class='heading__2'>Áreas de interesse</h3>
                <p><?= $doctor["interest"] ?></p>
                <h3 class='heading__2'>Consultas</h3>
                <p>Consulta de <?= $doctor["speciality_name"] ?></p>
            </div>
            <div class="curriculum-box">
                <h3 class='heading__2'>Breve CV</h3>
                <p><?= $doctor["brief_cv"] ?></p>
            </div>
            <div>
                <h3 class='heading__2'>Horários</h3>
                <p><?= $doctor["available_day"] ?></p>
                <p>9:00 às 18:00</p>
            </div>
        </article>
    </div>
  </main>