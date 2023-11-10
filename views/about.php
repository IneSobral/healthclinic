
<?php
    require('templates/header.php');
?>

    <main class="main">
      <div class="about__section">
        <div class='intro__hero'>
            <h1 class='intro__heading'>Sobre nós</h1>
        </div>
        <article class='container mt-5'>
            <h2 class='heading__3'>A Nossa Missão</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Est, repudiandae! Lorem ipsum dolor sit amet.</p>
            <p>Soluta, amet expedita! Possimus illum asperiores, libero quam quo dignissimos quisquam dolore facilis iste ducimus sunt est.</p>
            <p>Lorem ipsum dolor sit amet consectetur.</p>
        </article>

        <article class='container mt-5'>
            <h2 class='heading__3'>Os Nossos Valores</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Est, repudiandae! Lorem ipsum dolor sit amet.</p>
            <p>Soluta, amet expedita! Possimus illum asperiores, libero quam quo dignissimos quisquam dolore facilis iste ducimus sunt est.</p>
            <p>Lorem ipsum dolor sit amet consectetur.</p>
        </article>
        <div class=card__section>
            <div class="card text-white bg-primary mb-2 w-25" style="max-width: 18rem;">
                <div class="card-header text-center">Total de Espacialidades</div>
                    <div class="card-body text-center">
                    <h5 class="card-title"><?= $specialties?></h5>
                </div>
            </div>
            <div class="card text-white bg-primary mb-2 w-25" style="max-width: 18rem;">
                <div class="card-header text-center">Total de Médicos</div>
                    <div class="card-body text-center">
                    <h5 class="card-title"><?= $doctors ?></h5>
                </div>
            </div>
        </div>
      </div>
    </main>

<?php
   //require('templates/footer.php');
?>
</body>
</html>