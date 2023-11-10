
<?php
    require('templates/header.php');
?>

    <main class="user__section">
        <div class='intro__hero'>
            <h1 class='intro__heading'>Área Reservada</h1>
        </div>
        <article class='container mt-5'>
            <h2 class='heading__3'>Informação pessoal</h2>
            <h3 class='heading__4'>Nome - <span class='info'> <?= $userData["user_name"] ?></span></h3>
            <h3 class='heading__4'>Email - <span class='info'> <?= $userData["user_email"] ?></span></h3>
            <h3 class='heading__4'>Contacto telefónico - <span class='info'> <?= $userData["user_contact"] ?></span></h3>
            <h2 class='heading__3 pt-3'>Morada fiscal</h2>
            <h3 class='heading__4'>Rua - <span class='info' id="street_name" data-field="street_name"> <?= $userData["street_name"] ?></span></h3>
            <h3 class='heading__4'>Cidade - <span class='info' id="city"  data-field="city"> <?= $userData["city"] ?></span></h3>
            <h3 class='heading__4'>Código-postal - <span class='info' id="zip_code"  data-field="zip_code"> <?= $userData["zip_code"] ?></span></h3>
            <h3 class='heading__4'>País - <span class='info' id="country" data-field="country"> <?= $userData["country"] ?></span></h3>

            <button type='button' id="updateAddressBtn" class="btn btn-primary mt-3">Alterar Morada</button>


            <form action="/userprofile/" method="POST" style="display: none;">
                <label for="street_name">Rua:</label>
                <input type="text" name="street_name" id="street_name"><br>
                
                <label for="city">Cidade:</label>
                <input type="text" name="city" id="city"><br>

                <label for="zip_code">Código-postal:</label>
                <input type="text" name="zip_code" id="zip_code"><br>
                
                <label for="country">País:</label>
                <input type="text" name="country" id="country"><br>
                
                <button type="submit" name="update_profile" value="Atualizar Perfil"  class="btn btn-primary mt-3">Salvar Morada</button>
            </form>

            
        </article>
        <a href="/appointments/">Voltar ao início</a>

      
        
    </main>


<script>
   document.getElementById('updateAddressBtn').addEventListener('click', () => {

        document.getElementById('updateAddressBtn').style.display = 'none';
        document.querySelector('form').style.display = 'block';

        document.getElementById('saveAddressBtn').addEventListener('click', function () {
            window.location.reload();

        });

   })  
</script>
</body>
</html>