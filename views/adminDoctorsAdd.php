<?php
    require('templates/header.php');

?>
    <main class="admin__section" >
        <h1 class='heading__2'>Gestão de médicos > <u>Inserir novo médico</u></h1>
        <div class="bg-shape"> 
            <form method="post" action="/adminDoctorsAdd" class='formAdmin form-register'enctype="multipart/form-data">
            <h2 class='heading__3 text-center'>Inserir novo médico</h2>
<?php 
     if( isset($message)) {
        echo '<p role="alert" class="alert alert-success">' . $message . '</p>';
    }
?>
                <div class="form-group row">
                    <label>
                        Name
                        <input type="text" name="doctor_name">
                    </label>
                </div>
                <div class="form-group row">
                    <label>
                        Foto de perfil
                        <input type="file" name="doctor_img" accept="imagens/*">
                    </label>
                </div>
                <div class="form-group row">
                    <label>
                        Interesses
                        <input type="text" name="interest" >
                    </label>
                </div>
                <div class="form-group row">
                    <label>
                        Languages
                        <input type="text" name="languages">
                    </label>
                </div>
                <div class="form-group row">
                    <label>
                        Descrição
                        <textarea name="brief_cv"></textarea>
                    </label>
                </div>
                <div class="form-group row checkbox">
                    <label>
                        Teleconsulta
                        <input type="checkbox" name="teleconsultation">
                    </label>
                </div>
                <div class="form-group ">
                    <label>
                        Email
                        <input type="text" name="doctor_email">
                    </label>
                </div>
                <div class="form-group ">
                    <label>
                        Dias de consulta
                        <input type="text" name="available_day">
                    </label>
                </div>
                <div class="form-group ">
                <label>Especialidade
                    <select name="specialty_id">
                        <?php
                        foreach ($specialties as $speciality) {
                            echo '<option value="' . $speciality["specialty_id"] . '">' . $speciality["speciality_name"] . '</option>';
                        }
                        ?>
                    </select>
                </label>
            </div>
                <div>
                    <button type="submit" name="create" class='btn btn-primary special-btn' value="create">Inserir</button>
                </div>
            </form>
        </div>
       
   
    </main>

<?php
    require('templates/footer.php');
?>
</body>
</html>